<?php

namespace App\Http\Controllers\AccountPanel;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Deposit;
use App\Models\DepositBonus;
use App\Models\DepositQueue;
use App\Models\ExchangeRateLog;
use App\Models\Notification;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use App\Models\UserVideo;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $user = Auth::user();
        $walletArray = Wallet::where('user_id', $user->id)->get();
        $wallets = $walletArray->chunk(4);

        $withdraw_type = TransactionType::where('name', 'withdraw')->first();
        $partner_type = TransactionType::where('name', 'partner')->first();
        $dividend_type = TransactionType::where('name', 'dividend')->first();
        $accruals_ids = [];
        array_push($accruals_ids, $partner_type->id, $dividend_type->id);
        $period_graph = $this->getPeriodDays(7);
        $withdraws_week = [];
        $accruals_week = [];

        $currentRank = DepositBonus::find($user->userCurrentRank()->deposit_bonus_id ?? null);
        $nextRank = DepositBonus::where('personal_turnover', '>', $currentRank->personal_turnover)
            ->where('total_turnover', '>', $currentRank->total_turnover)->first();

        $rankPercentage = 100;

        if (!is_null($nextRank)) {
            $userTotalStat = $user->referrals_invested_total + $user->personal_turnover;
            $nextRankTotalStat = $nextRank->personal_turnover + $nextRank->total_turnover;

            $rankPercentage = ($userTotalStat / $nextRankTotalStat ) * 100;
        }

        $walletsStats = [];
        foreach ($walletArray as $wallet) {
            $walletsStats[$wallet->id] = cache()->remember('wallets_stats_'.$user->id . '_' . $wallet->id, now()->addMinutes(60), function () use ($wallet, $dividend_type, $partner_type) {
                $startDate = now()->subDays(10);
                $dividends = [];

                while (true) {
                    $nextDay = $startDate->addDay();

                    $dividends[] = Transaction::where(function ($q) use ($dividend_type, $partner_type) {
                        $q->where('type_id', $dividend_type->id)
                            ->orWhere('type_id', $partner_type->id);
                    })
                        ->where('wallet_id', $wallet->id)
                        ->where('created_at', '>=', $startDate)
                        ->where('created_at', '<=', $nextDay)
                        ->where('approved', 1)
                        ->sum('main_currency_amount');

                    if ($nextDay > now()) {
                        break;
                    }

                    $startDate = $nextDay;
                }

                return $dividends;
            });
        }

        foreach ($period_graph as $period) {
            $accruals_week[$period['start']->format('Y-m-d')] = cache()->remember('accruals_week_' . $period['start']->format('Y-m-d').'-'.$user->id, now()->addMinutes(60), function () use ($accruals_ids, $user, $period) {
                return Transaction::where('user_id', $user->id)->whereIn('type_id', $accruals_ids)->where('approved', 1)->whereBetween('created_at', [
                    $period['start'],
                    $period['end'],
                ])->sum('main_currency_amount');
            });
            $withdraws_week[$period['start']->format('Y-m-d')] = cache()->remember('withdraws_week_' . $period['start']->format('Y-m-d').'-'.$user->id, now()->addMinutes(60), function () use ($withdraw_type, $user, $period) {
                return Transaction::where('user_id', $user->id)->where('type_id', $withdraw_type->id)->where('approved', 1)->whereBetween('created_at', [
                    $period['start'],
                    $period['end'],
                ])->sum('main_currency_amount');
            });
        }
        $deposit = Deposit::where('user_id', $user->id)->where('datetime_closing', '>', Carbon::now())->where('active', true)->get();
        $total_revenue = 0;
        foreach ($deposit as $item) {
            /** @var Transaction $depositTransaction */
            $depositTransaction = Transaction::where('deposit_id', $item->id)
                ->where('type_id', TransactionType::getByName('create_dep')->id)
                ->first();

            if (null !== $depositTransaction) {
                $total_revenue += $depositTransaction->main_currency_amount / 100 * $item->daily;
            }
        }

        $userYieldChartData = [];

        foreach ($accruals_week as $date => $value) {
            $userYieldChartData[] = [
                'date' => $date,
                'replenishment' => $value,
                'withdrawals' => $withdraws_week[$date]
            ];
        }

        $countries_stat = User::where('country', '!=', null)->select(['country as name'])->groupBy(['country'])->get();
        $countries_stat->map(function ($country) {
            $country->count = cache()->remember('dshb.country_stat_count_' . $country->name, now()->addMinutes(60), function () use ($country) {
                return User::where('country', $country->name)->count();
            });
        });

        $countries_stat = $countries_stat->sortByDesc('count')->take(7);

        $countries_stat = $countries_stat->keyBy('name');

        return view('adminos.pages.dashboard', [
            'transactions' => Transaction::with('type', 'currency', 'paymentSystem')->where('user_id', $user->id)->orderByDesc('created_at')->limit(5)->get(),
            'wallets' => $wallets,
            /* 'deposits' => Deposit::where('user_id', $user->id)->orderByDesc('created_at')->paginate(5),*/
            'period_graph' => $period_graph,
            'withdraws_week' => $withdraws_week,
            'accruals_week' => $accruals_week,
            'total_revenue' => $total_revenue,
            'countries_stat' => $countries_stat,
            'users_videos' => UserVideo::where('approved', true)->orderByDesc('created_at')->limit(20)->get(),
            'walletsStats' => $walletsStats,
            'currentRank' => $currentRank,
            'nextRank' => $nextRank,
            'rankPercentage' => $rankPercentage,
            'user' => $user,
            'userYieldChartData' => $userYieldChartData
        ]);
    }

    public function sendMoney(Request $request) {
        $request->validate(
            [
            'user' => 'required',
            'amount' => 'required',
            'wallet_id' => 'required|uuid',
        ],
            [
                'user.required' => 'Поле :attribute обязательно',
                'wallet_id.required' => 'Поле :attribute обязательно',
                'amount.uuid' => 'Поле :attribute должно быть действительного UUID'
            ]
        );
        $request_user = $request->get('user');
        $user = Auth::user();
        $recipient_user = User::where('login', $request_user)->orWhere('email', $request_user)->first();
        if ($recipient_user === null){
            return back()->with('short_error', 'Такого пользователя не существует!');
        }
        if ($user->id === $recipient_user->id) {
            return back()->with('short_error', 'Нельзя переводить самому себе!');
        }
        $amount = abs($request->get('amount'));
        $wallet = Wallet::where('user_id', $user->id)
            ->where('id', $request->get('wallet_id'))
            ->firstOrFail();
        if ($wallet->balance < $amount) {
            return back()->with('short_error', 'Недостаточно средств!');
        }

        $recipient_user_wallet = Wallet::where('user_id', $recipient_user->id)
            ->where('currency_id', $wallet->currency_id)
            ->first();
        if (empty($recipient_user_wallet)) {
            return back()->with('short_error', 'У пользователя нет кошелька с указанной валютой!');
        }

        $commission = TransactionType::getByName('transfer_out')->commission;
        DB::beginTransaction();
        try {
            $wallet->update(['balance' => $wallet->balance - $amount - $amount * $commission * 0.01]);
            $recipient_user_wallet->update(['balance' => $recipient_user_wallet->balance + $amount - $amount * $commission * 0.01]);

            if (Transaction::transferMoney($wallet, $amount, $user, $recipient_user)) {

                $notification_data = [
                    'notification_name' => 'Перевод средств',
                    'amount' => $amount . $wallet->currency->symbol,
                    'user' => $recipient_user,
                    'from_user' => Auth::user(),
                ];
                Notification::sendNotification($notification_data, 'new_transfer_in');
                $notification_data = [
                    'notification_name' => 'Перевод средств',
                    'amount' => $amount . $wallet->currency->symbol,
                    'user' => Auth::user(),
                    'to_user' => $recipient_user,
                ];
                Notification::sendNotification($notification_data, 'new_transfer_out');

                DB::commit();
                return back()->with('short_success', 'Средства успешно переведены пользователю ' . $recipient_user->name . '!');
            } else {
                throw new \Exception('Не удалось создать перевод');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return back()->with('short_error', 'Ошибка! ' . $exception->getMessage());
        }
    }

    public function getPeriodDays($days = 7) {
        $period = [];
        for ($i = 0, $j = $days; $j >= $i; $j--) {
            $period[$j]['start'] = Carbon::now()->startOfDay()->subDay($j);
            if (Carbon::now() < Carbon::now()->endOfDay()->subDay($j)) {
                $period[$j]['end'] = Carbon::now();
            } else {
                $period[$j]['end'] = Carbon::now()->endOfDay()->subDay($j);
            }

        }
        return $period;
    }

    public function storeUserVideo(Request $request) {
        $video = $request->get('video');
        if (!strlen($video) > 0) {
            return back()->with('short_error', 'Поле "Ссылка на видео" обязательно для заполнения!');
        }

        $user_video = new UserVideo();
        $user_video->link = htmlspecialchars($video);
        $user_video->user_id = Auth::user()->id;

        if ($user_video->save()) {
            return back()->with('short_success', 'Ваше видео передано в обработку!');
        }
        return back()->with('short_error', 'Не удалось загрузить!');
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Console\Command;

class SetReferralsCaches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'referrals-caches:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update some referrals caches';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /** @var User $user */
        foreach (User::orderBy('referrals_invested_total', 'asc')->get() as $user) {
            $this->info('work with user '.$user->login);

            cache()->forget('referrals.array.' . $user->id);

            cache()->put('referrals.array.' . $user->id, $user->getAllReferralsInArray(), now()->addHours(3));
            $all_referrals = cache()->get('referrals.array.' . $user->id);

            cache()->remember('reftree.'.$user->id, now()->addHours(3), function() use ($user) {
                return $this->getChildrens($user, 7);
            });

            $walletArray = Wallet::where('user_id', $user->id)->get();

            $partner_type = TransactionType::where('name', 'partner')->first();
            $dividend_type = TransactionType::where('name', 'dividend')->first();

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

            cache()->remember('partner_name.'.$user->id, now()->addHours(3), function() use ($user) {
                return $user->partner->name ?? 'undefined';
            });

            if (!empty($all_referrals)) {
                foreach ($all_referrals as $referral) {
                    if (is_array($referral)) {
                        $this->warn('is array');
                        continue 2;
                    }

                    /** @var User $referral */
                    $referral = User::find($referral->id);

                    cache()->forget('user.total_invested_' . $user->id);
                    $invested = $referral->invested();

                    $this->info('invested '.$invested);

                    cache()->forget('user.referral_accruals' . $user->id);
                    $referralAccruals = $referral->referral_accruals($user);
                    $this->info('referral accruals '.$referralAccruals);

                    cache()->forget('user.deposit_accruals' . $user->id);
                    $depositAccruals = $referral->deposits_accruals();
                    $this->info('deposit accruals '.$depositAccruals);

                    $this->comment('work with ref '.$referral->login);
//                    cache()->forget('us.referrals.' . $referral->id);
                    cache()->put('us.referrals.' . $referral->id, $referral->getAllReferrals(false, 1, 1), now()->addHours(3));
                    $this->info('referrals count '.count(cache()->get('us.referrals.' . $referral->id)['referrals'] ?? []));
                }
            }

            $this->info('get referrals for '.$user->login);
//            cache()->forget('us.referrals.' . $user->id);
            cache()->put('us.referrals.' . $user->id, $user->getAllReferrals(false, 1, 1), now()->addHours(3));
            $this->info('us referrals count '.count(cache()->get('us.referrals.' . $user->id)['referrals'] ?? []));
        }

        return Command::SUCCESS;
    }

    /**
     * @param User $user
     * @param int $limit
     * @return array
     */
    private function getChildrens(User $user, $limit = 3) {
        if ($limit === 0) {
            return [];
        }
        if (empty($user)) {
            return [];
        }

        $referrals = [];
        $referrals['name'] = $user->login;
        if (!$user->hasReferrals()) {
            return $referrals;
        }

        foreach ($user->referrals()->wherePivot('line', 1)->get() as $r) {
            $referral = $this->getChildrens($r, $limit - 1);
            $referrals['children'][] = $referral;
        }
        return $referrals;
    }
}

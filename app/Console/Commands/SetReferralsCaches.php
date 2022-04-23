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
        $start = now();
        /** @var User $user */
        foreach (User::orderBy('referrals_invested_total', 'asc')->get() as $user) {
            $this->info('work with user '.$user->login);

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

            if (!cache()->has('user.total_invested_' . $user->id)) {
                $invested = $user->invested();

                $this->info('invested ' . $invested);
            }

            if ($user->partner) {
                $referralAccruals = $user->referral_accruals($user->partner);
                $this->info('referral accruals '.$referralAccruals);
            }

            if (!cache()->has('user.deposit_accruals' . $user->id)) {
                $depositAccruals = $user->deposits_accruals();
                $this->info('deposit accruals ' . $depositAccruals);
            }
        }

        $this->warn(now()->diffInSeconds($start));
        $this->warn(now()->diffInMinutes($start));

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

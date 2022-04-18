<?php

namespace App\Jobs;

use App\Models\Transaction;
use App\Models\TransactionType;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateReferralAccruals implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $transaction;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->transaction->wallet->user ?? null;
        $partner = $user->partner ?? null;

        if ($partner && $user) {
            cache()->forget('user.referral_accruals' . $user->id);
            return cache()->remember('user.referral_accruals' . $user->id, now()->addMinutes(180), function () use ($user, $partner) {
                $partnerTypeId = TransactionType::getByName('partner')->id;

                $wallets = $partner->wallets()
                    ->get()
                    ->pluck('id');

                return $user->transactions()
                    ->where('type_id', $partnerTypeId)
                    ->whereIn('source', $wallets)
                    ->sum('main_currency_amount');
            });
        }
    }
}

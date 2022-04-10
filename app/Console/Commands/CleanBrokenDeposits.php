<?php

namespace App\Console\Commands;

use App\Models\Deposit;
use App\Models\Rate;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use App\Models\UserDepositBonus;
use Illuminate\Console\Command;

class CleanBrokenDeposits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:broken_deposits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '...';

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
        foreach (Deposit::whereIn('rate_id', [Rate::find('6bc97540-8fd8-11ec-b7e4-db2f3edf8124'), Rate::find('85c01e50-8fd8-11ec-a788-eb2570b4b705')])->get() as $deposit) {
            foreach (Transaction::where('deposit_id', $deposit->id)->where('type_id', TransactionType::getByName('dividend')->id)->get() as $transaction) {
                $this->info('transaction '.$transaction->id);
                $transaction->delete();
            }
        }

        return Command::SUCCESS;
    }
}

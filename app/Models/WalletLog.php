<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletLog extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'wallets_log';

    /**
     * @var string[]
     */
    protected $fillable = [
        'wallet_id',
        'old_value',
        'new_value'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    /**
     * @param Wallet $wallet
     * @param $old_value
     * @param $new_value
     * @return void
     */
    public static function setWalletLog(Wallet $wallet, $old_value, $new_value)
    {
        self::create([
            'wallet_id' => $wallet->id,
            'old_value' => $old_value,
            'new_value' => $new_value
        ]);
    }
}

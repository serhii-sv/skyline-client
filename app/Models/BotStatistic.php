<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotStatistic extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'bot_statistic';

    /**
     * @var string[]
     */
    protected $fillable = [
        'bot_name',
        'date',
        'value'
    ];

    const LIMO = 'limo';
    const MONO = 'mono';
    const NERO = 'nero';
    const OSKAR = 'oskar';
    const NFT = 'nft';
    const IDO = 'ido';

    const BOT_LIST = [
        self::LIMO,
        self::MONO,
        self::NERO,
        self::OSKAR,
        self::NFT,
        self::IDO
    ];
}

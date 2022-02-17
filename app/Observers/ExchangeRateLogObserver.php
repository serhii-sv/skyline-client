<?php

namespace App\Observers;

use App\Models\ExchangeRateLog;
use App\Models\Setting;

class ExchangeRateLogObserver
{
    /**
     * @param ExchangeRateLog $log
     */
    public function created(ExchangeRateLog $log)
    {
        if ($log->rate_id == (Setting::where('s_key', 'sky_to_usd')->first()->id ?? null)) {
            Setting::setValue('usd_to_sky', (1 / (float) $log->new_rate));
        }
    }
}

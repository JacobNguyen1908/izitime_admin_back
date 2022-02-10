<?php

use App\Models\Company_setting;
use Carbon\Carbon;

/**
* Get first day of current week according to company settings
*
*/
if (! function_exists('get_first_day_of_current_week')) {
    function get_first_day_of_current_week()
    {
        $companySettings = Company_setting::first()->first_day_of_week;
        $currentDay = Carbon::now()->dayOfWeek;
        $difference = $companySettings <= $currentDay ? $companySettings - $currentDay  : $companySettings - ($currentDay + 7);
        $res = Carbon::now()->addDays($difference);
        return $res;
    }
}




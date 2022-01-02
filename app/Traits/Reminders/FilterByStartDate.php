<?php

namespace App\Traits\Reminders;

use Illuminate\Support\Carbon;

trait FilterByStartDate {
    use AddsToDates;
     /**
     * Takes a array of reminders and a filter it by tagret date 
     * if target date intersects with reminder range
     *
     * @param  $target date, $reminders
     * @return $reminders
     */
    public function filterByStartDate($target_date, $reminders) {
        return $reminders->filter(function ($reminder) use($target_date) {
            // if target date == start_date we return it
            if($target_date->equalTo(Carbon::create($reminder->start_date))) {
                return true;
            }
            else {
                // then it's repeated  repeated ,so we check if it intersects with target_date
                    //check if target date intersects with reminder repeates
                $date = Carbon::create($reminder->start_date);
                while($date->lessThanOrEqualTo($target_date)) {
                    $date = $this->addPeriod($date, $reminder->repeating_type, $reminder->repeating_number);
                    if($date->equalTo($target_date)){
                        return true;
                    }
                }
            }
            // reminder doesn't exist on target date
            return false;
        });
    }
}
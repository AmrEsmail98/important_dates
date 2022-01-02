<?php

namespace App\Traits\Reminders;
trait AddsToDates {
    public function addPeriod($date, $repeating_type, $repeating_number) {
        return $date->{$this->additionMethods[$repeating_type]}($repeating_number);
    }

    private $additionMethods = [
        'addWeeks',
        'addMonths',
        'addYears',
    ];
}
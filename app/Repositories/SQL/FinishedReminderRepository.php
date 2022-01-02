<?php

namespace App\Repositories\SQL;

use App\Models\FinishedReminder;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\IFinishedReminderRepository;

class FinishedReminderRepository extends AbstractModelRepository implements IFinishedReminderRepository
{
    /**
     * @param Country $model
     */
    public function __construct(FinishedReminder $FinishedReminder) {
        parent::__construct($FinishedReminder);
    }

    public function getReminders($user_id, $date, $category = null, $member = null){
        return $this->model::client($user_id)
        ->date($date)
        ->category($category)
        ->members($member)
        ->with('reminder')
        ->paginate();
    }

}

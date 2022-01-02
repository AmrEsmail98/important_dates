<?php 

namespace App\Repositories\Contracts;


interface IFinishedReminderRepository extends IModelRepository {
    public function getReminders($user_id, $date, $category = null, $member = null);
}
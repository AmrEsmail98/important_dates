<?php

namespace App\Repositories\Contracts;


interface IReminderRepository extends IModelRepository {
    public function getByUserId($user_id,$target_date, $categoty = null, $member = null);
    public function endReminder($id, $date);
    public function deleteSecificDate($id, $date);
    public function markAsDone($id, $date,$status = 0);
}

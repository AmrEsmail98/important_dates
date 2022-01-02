<?php

namespace App\Repositories\SQL;

use App\Models\Reminder;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use App\Repositories\SQL\AbstractModelRepository;
use App\Repositories\Contracts\IReminderRepository;

class ReminderRepository extends AbstractModelRepository implements IReminderRepository
{
    /**
     * @param Reminder $model
     */
    public function __construct(Reminder $model) {
        parent::__construct($model);
    }

    /**
     * return all active reminders
     */
    public function getAll($active = true, $filters = [], $paginate = 15){
        return $this->model->isActive($active)
        ->with(['client', 'deletedReminders','finishedReminders', 'notificationTypes'])
        ->get();
    }
 
     public function getByUserId($user_id,$target_date, $categoty = null, $members = null) {
       return Reminder::belongsToClient($user_id)
       ->isActive(true)
       ->category($categoty)
       ->members($members)
       ->hasStartdateOrRepeated($target_date)
       ->beforeEndDate($target_date)
       ->notDeleted($target_date)
       ->with(['client', 'color', 'category', 'finishedReminders', 'notificationTypes', 'members', 'attachments'])
       ->get();
     }
 
     /**
      * Create an array of reminders.
      *
      * @param  $reminders data
      * @return \App\Models\Reminder
      */
     public function store($reminders) {
         $newReminders = [];
         foreach ($reminders as $reminder) {
             // store reminder
             $created_reminder = Parent::store(Arr::except($reminder, ['members', 'notifications']));
             //store notifications
             $reminder['notifications'] && $notifications = $this->prepareNotifications($reminder['notifications']);
             $created_reminder->notificationTypes()->createMany($notifications);
             //store members
             $reminder['members'] && $created_reminder->members()->attach($reminder['members']);
             //store attachments
             if(isset($reminder['attachments'])){
                 foreach ($reminder['attachments'] as $attachment) {
                     $path = $attachment->store("reminders/$created_reminder->id");
                     $created_reminder->attachments()->create(['name' => $path]);
                 }
             }
             $newReminders[] =  $created_reminder;
         }
 
         return $newReminders;
     }

     public function update($id, $data) {
        Parent::update($id, $data);
        $reminder = $this->find($id);
        if($data['members']){
            $reminder->members()->delete();
            $reminder->members()->attach($data['members']);
        }

        if($data['notifications']){
            $reminder->members()->delete();
            $reminder->members()->attach($data['members']);
        }

        if($data['notifications']){
           $reminder->notificationTypes()->delete();
           $notifications =  $this->prepareNotifications($data['notifications']);
           $reminder->notificationTypes()->createMany($notifications);
        }
        return $reminder;
     }
 
     public function endReminder($id, $date) {
        $reminder = $this->find($id);
        return $reminder->updated_at(['end_date' => Carbon::create($date)->subDay()]);
     }
 
     public function deleteSecificDate($id, $date) {
        $reminder = $this->find($id);
        return $reminder->deletedReminders()->create(['date' => $date]);
     }
 
     public function markAsDone($id, $date, $status = 0) {
         return $this->find($id)->finishedReminders->create(['status' => $status, 'date' => $date]);
     }

     private function prepareNotifications($notifications) {
       return collect($notifications)->map(function($days){
            return ['number_of_dayes_before' => $days];
        })->toArray();
     }
}

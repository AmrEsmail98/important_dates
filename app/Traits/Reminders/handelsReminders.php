<?php

namespace App\Traits\Reminders;

use App\Notifications\ClientReminderNotificaton;
use Illuminate\Support\Carbon;

trait handlesReminders {
    public function handleReminders() {
        $today = now()->today();
       foreach ($this->reminders as $reminder) {
           $due_date = Carbon::create($reminder->start_date);
           $end_date = $reminder->end_date ?  Carbon::create($reminder->end_date) : null;
          // 1 handle due reminders
          if($due_date->equalTo(now()->today())){
              //mark it as done 
              $this->reminderRepository->markAsDone($reminder->id, $today);

              //update reminder status
              //   case 1- it doesn't have any more repeates
              if(! $reminder->repeated){
                //reminder gets inActivated we continue to next iteration
                $this->inActivate($reminder->id);
                continue;
              }
              //case 2 - it has more repeates
              $deletedReminders = $reminder->deletedReminders->pluck('date');
              $markedAsDone = $reminder->finishedReminders->pluck('date');

              $due_date = $this->updateStatus($reminder->id, $due_date, $end_date, $reminder->repeating_type,
                $reminder->repeating_number, $deletedReminders, $markedAsDone);
              //if the reminder gets inActivated we continue to next iteration
              if(! $due_date){
                continue;
              }
          }

          // handle due notifications
          $notifications_dayes_before = $reminder->notificationTypes->pluck('number_of_dayes_before');
          foreach ($notifications_dayes_before as $dayes_before) {
             if($today->addDays($dayes_before)->equalTo($due_date) ){
                 //send notification
                 $reminder->user->notify(new ClientReminderNotificaton($reminder));
             }
          }
       }
    }


    public function inActivate($id) {
        $this->reminderRepository->update($id, ['active' => false]);
    }

      /**
     * returns false when reminder gets inactivated or the due_date if it gets updated
     */
    public function updateStatus($id, $due_date, $end_date, $repeating_type, $repeating_number, $deleted, $markedAsDone) {
        $due_date = $this->addPeriod($due_date, $repeating_type, $repeating_number);
        if($end_date) {
             if( $due_date->greaterThan($end_date) ){
                 $this->inActivate($id);
                 return false;
             }
        }
        else {
         // chech if reminder deleted at this date or marked as done
         if(in_array($due_date, $deleted) || in_array($due_date, $markedAsDone)){
             return $this->updateStatus($id, $due_date, $end_date, $repeating_type, $repeating_number, $deleted, $markedAsDone);
         }
         // update reminder due date
         $this->reminderRepository->update($id, ['start_date' => $due_date]);
         return $due_date;
        }
     }
}
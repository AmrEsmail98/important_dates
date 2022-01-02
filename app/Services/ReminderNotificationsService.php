<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use App\Notifications\ClientReminderNotificaton;
use App\Repositories\Contracts\IReminderRepository;

class ReminderNotificationsService {
    private $reminders;

    public function __construct(IReminderRepository $reminderRepository) {
        $this->reminders = $reminderRepository->getAll();
    }                                                                                                                                                                                                                                                                                                                                   

    public function notify() {
        foreach ($this->reminders as $reminder) {
            $today = now()->today();
            $due_date = Carbon::create($reminder->start_date);
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
}
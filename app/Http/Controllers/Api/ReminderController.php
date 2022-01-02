<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReminderRequest;
use App\Http\Requests\SearchReminders;
use App\Http\Requests\UpdateReminderRequest;
use App\Http\Resources\ReminderResource;
use App\Traits\Reminders\FilterByStartDate;
use App\Http\Resources\FinishedReminderResource;
use App\Repositories\Contracts\IReminderRepository;
use App\Repositories\Contracts\IFinishedReminderRepository;

class ReminderController extends Controller
{
    use ApiResponser, FilterByStartDate;
    protected $reminderRepository, $finishedReminderRepo;
    public function __construct(IReminderRepository $reminderRepository, IFinishedReminderRepository $finishedReminderRepo) {
        $this->reminderRepository = $reminderRepository;
        $this->finishedReminderRepo = $finishedReminderRepo;
    }

    public function myReminders(SearchReminders $request) {
        return 'shit';
        $user = auth()->user();
        if($request->date){
            $date = Carbon::create($request->date);
            //case 1 - target date before user created date
            if($date->lessThan($user->created_at)){
                return $this->remindersListResponse();
            }
             // case 2 -  if target date before today we look in history table
            if($date->lessThan(now()->today())){
                $reminders = $this->finishedReminderRepo->getReminders($user->id, $date, $request->category, $request->member);
                $reminders = FinishedReminderResource::collection($reminders);
                return $this->remindersListResponse($reminders);
            }
        }

         // case 3 target date >= today
         $target_date = $date ?? now()->today();
         $reminders = $this->reminderRepository->getByUserId($user->id,$target_date, $request->category, $request->members);
         //filter out reminders that doesn't intersect with target date
         $reminders = ReminderResource::collection($this->filterByStartDate($target_date, $reminders));
         return $this->remindersListResponse($reminders);
    }


    public function store(ReminderRequest $request) {
        $reminders =  $request->validated()['reminders'];
        $reminders =  $this->reminderRepository->store($reminders);
        return $this->success(
            ['reminders' => ReminderResource::collection($reminders)],
            'Reminders Created Successfully'
        );
    }

    public function update(UpdateReminderRequest $request, $id) {
       $data = $request->all();
       $reminder = $this->reminderRepository->update($id, $data);
       return $this->success(
        ['reminder' => new ReminderResource($reminder)],
        'Reminder Updated Successfully'
    );
    }

    public function show($id) {
        $reminder = new ReminderResource($this->reminderRepository->find($id));
        return $this->success(
            ['reminder' => $reminder],
            'Reminders Created Successfully'
        );
    }


   
    public function endReminder($id, $date) {
        $this->reminderRepository->endReminder($id, $date);
        return $this->success(null, 'Reminders Deleted Successfully!');
    }


    public function deleteSecificDate($id, $date) {
        $this->reminderRepository->deleteSecificDate($id, $date);
        return $this->success(null, 'Reminder Deleted Successfully!');
    }

    public function markAsDone($id, $date) {
       $this->reminderRepository->markAsDone($id, $date, 1);
       return $this->success(null, 'Reminder Marked As Done Successfully!');
    }

    public function remindersListResponse($reminders = []) {
        return $this->success($reminders, 'List of reminders');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reminder;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReminderResource;
use App\Repositories\Contracts\IReminderRepository;



class ReminderController extends Controller
{
    protected $reminderRepository;
    public function __construct(IReminderRepository $reminderRepository)
    {
        $this->reminderRepository = $reminderRepository;
    }

    public function index()
    {
        // $reminders = $this->reminderRepository->getAll();
        $reminders = $this->reminderRepository->search();
        $reminders = ReminderResource::collection($reminders);


        return view('admin.reminders.index', compact('reminders'));
    }
}

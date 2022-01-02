<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReminderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'category' => new CategoryResource($this->category),
            'color' => $this->color ? new ColorResource($this->color) : new ColorResource($this->category->color),
            'start_date' => $this->start_date,
            'notes' => $this->notes,
            'repeated' => $this->repeated,
            'repeates_Type' => $this->repeating_type,
            'repeates_number' => $this->repeating_number,
            'end_date' => $this->end_date,  
            'members' => MemberResource::collection($this->members),
            'notifications' => ReminderNotificationResource::collection($this->notificationTypes),
            'attachment' => $this->reminder_attachments,
            'status' => $this->finishedReminders->where('date', $request->date)->pluck('reminder_status')->first()
        ];
    }
}

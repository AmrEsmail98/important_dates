<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReminderNotificationResource extends JsonResource
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
            'notification_in_days' => $this->number_of_dayes_before,
            'notification_text' => 
            ($this->number_of_dayes_before % 7 == 0) ?  
            $this->number_of_dayes_before / 7 . ' Weeks before' :
            $this->number_of_dayes_before . ' Dayes before',
        ];
    }
}

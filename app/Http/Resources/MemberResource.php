<?php

namespace App\Http\Resources;

use App\Http\Resources\ProfileSettingResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'country_id' => $this->country->id,
            'client' => ProfileSettingResource::collection($this->whenLoaded('client')),
            'member_type_id' => $this->member_type_id,
        ];
    }
}

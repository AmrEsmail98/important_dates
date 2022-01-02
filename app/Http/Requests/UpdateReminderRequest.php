<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\Contracts\IReminderRepository;

class UpdateReminderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(IReminderRepository $reminderRepository)
    {
        $reminder_id = $this->route->parameter('id');
        $reminder = $reminderRepository->find($reminder_id);
        return $reminder->client_id = $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'start_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:' . now()->format('Y-m-d')],
            'category_id' => 'required|exists:categories,id',
            'color_id' => 'nullable|exists:colors,id',
            'repeated' => 'required|boolean',
            'repeating_type' => 'required_if:repeated,true|integer|between:0,2|exclude_if:repeated,false',
            'repeating_number' => 'required_if:repeated,true|integer|min:1|exclude_if:repeated,false',
            'end_date' => ['nullable', 'date_format:Y-m-d', "after:start_date", 'exclude_if:repeated,false'],
            'members'=> 'nullable|array',
            'members.*' => [ Rule::exists('members', 'id')->where('client_id', $this->user()->id) ],
            'notifications' => 'nullable|array',
            'notifications.*' => 'integer|min:0',
            'attachments' => 'nullable|array',
            'attachments.*' => 'mimes:jpg,bmp,png,gif,jpeg,svg,mp4,flv,3gp,avi,mp3,mpeg|max:2048',
        ];
    }
}

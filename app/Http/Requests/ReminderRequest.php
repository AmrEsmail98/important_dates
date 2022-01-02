<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ReminderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reminders' => 'required|array',
            'reminders.*.title' => 'required|string|max:255',
            'reminders.*.notes' => 'nullable|string',
            'reminders.*.start_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:' . now()->format('Y-m-d')],
            'reminders.*.category_id' => 'required|exists:categories,id',
            'reminders.*.color_id' => 'nullable|exists:colors,id',
            // repeating
            'reminders.*.repeated' => 'required|boolean',
            'reminders.*.repeating_type' => 'required_if:repeated,true|integer|between:0,2|exclude_if:reminders.*.repeated,false',
            'reminders.*.repeating_number' => 'required_if:repeated,true|integer|min:1|exclude_if:reminders.*.repeated,false',
            'reminders.*.end_date' => ['nullable', 'date_format:Y-m-d', "after:reminders.*.start_date", 'exclude_if:reminders.*.repeated,false'],
            // members
            'reminders.*.members' => 'nullable|array',
            'reminders.*.members.*' => [ Rule::exists('members', 'id')->where('client_id', $this->user()->id) ],  
            //notifications
            'reminders.*.notifications' => 'nullable|array',
            'reminders.*.notifications.*' => 'integer|min:0',
            // attachments         
            'reminders.*.attachments' => 'nullable|array',
            'reminders.*.attachments.*' => 'mimes:jpg,bmp,png,gif,jpeg,svg,mp4,flv,3gp,avi,mp3,mpeg|max:2048',
        ];
    }
}

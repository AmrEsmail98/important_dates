<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email'=>'required|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'image'=>'nullable|image|max:512|mimes:jpg,png,jpeg',
            'gender' => 'required|in:M,F',
            'birthday' => 'nullable|date_format:Y-m-d|before:today',
            'country_id' => 'required|exists:countries,id',
            'client_id' => 'required|exists:clients,id',
            'member_type_id' => 'required|exists:member_types,id',
        ];
    }
}

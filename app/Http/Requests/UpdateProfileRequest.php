<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'email'=>'required|unique:users,email' . $this->client,
            'phone'=>'required|unique:users,phone',
            'image'=>'nullable|image|max:512|mimes:jpg,png,jpeg',
            'gender' => 'required|in:M,F',
            'birthday' => 'required|before:now',
            'country_id' => 'required|exists:countries,id',
        ];
    }
}

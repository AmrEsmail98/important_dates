<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterationRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'image' => 'image|nullable',
            'email' => 'required|email|max:255',
            'phone' => 'required|digits:11',
            'gender' => 'in:M,F',
            'birthday' => 'required|before:now',
            'password' => 'required|string|min:5|max:255|confirmed',
            'country_id' => 'required|exists:countries,id',
        ];
    }
}

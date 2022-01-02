<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'first_name'=>"required",
            'last_name'=>"required",
            'email'=>"required|unique:users,email," . $this->admin,
            'phone'=>"required|unique:users,phone," . $this->admin,
            'image'=>'nullable|image|max:512|mimes:jpg,png,jpeg',
            'password'=>'required|string|min:8|max:255|confirmed',
        ];
    }
}

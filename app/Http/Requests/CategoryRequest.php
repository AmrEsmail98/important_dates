<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules() {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
            'image' => 'nullable|image|max:512|mimes:jpg,png,jpeg',
            'color_id' => 'required|exists:colors,id',
        ];
    }


    public function attributes()
    {
        return [
            'Color' => 'color_id'
        ];
    }
}

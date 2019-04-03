<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|min:4|max:30',
            'password' => 'required|min:6|max:30',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Username is required',
            'name.min' => 'The Username must have at least 4 characters',
            'name.max' => 'The Username must have at most 30 characters',
            'parent_id.required'  => 'Parent Category is require',
        ];
    }
}

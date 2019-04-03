<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required|min:4|max:30',
            'password' => 'required|min:6|max:30',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required',
            'username.min' => 'The Username must have at least 4 characters',
            'username.max' => 'The Username must have at most 30 characters',
            'password.required'  => 'Password is required',
            'password.min' => 'The Password must have at least 4 characters',
            'password.max' => 'The Password must have at most 30 characters',
        ];
    }
}

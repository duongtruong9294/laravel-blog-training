<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|min:5|max:50',
            'email' => 'required',
            'password' => 'required|min:5|max:50',
            'fullname' => 'required|min:5|max:50',
            'address' => 'required|min:5|max:50',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required',
            'username.min' => 'Name must have at least 5 characters',
            'username.max' => 'Name must have at most 50 characters',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must have at least 5 characters',
            'password.max' => 'Password must have at most 50 characters',
            'fullname.required' => 'Fullname is required',
            'fullname.min' => 'Fullname must have at least 5 characters',
            'fullname.max' => 'Fullname must have at most 50 characters',
            'address.required' => 'Address is required',
            'address.min' => 'Address must have at least 5 characters',
            'address.max' => 'Address must have at most 50 characters',
        ];
    }
}

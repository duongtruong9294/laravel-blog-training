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
            'name' => 'required|min:10|max:255',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must have at least 10 characters',
            'name.max' => 'Name must have at most 255 characters',
            'category_id.required'  => 'Parent Category is require',
            'image.mimes' => 'Picture extension is jpeg,png,jpg,gif,svg',
            'image.max' => 'Image must have at most 2048 characters',
            'description.required' => 'Description is required'
        ];
    }
}

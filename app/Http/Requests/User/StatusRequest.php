<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends FormRequest
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
            'status'    => 'nullable|max:5000|regex:/^[a-zA-Z0-9\-\@\#\.\,\_\+\-\?\!\/ ]*$/',
            'capture'   => 'required|min:25',
            'photos'    => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'status.max' => 'Hello, your status is maximum',
            'status.regex' => 'Invalid characters',
            'photos.image' => 'Invalid image extensions',
            'photos.mimes' => 'Invalid image extension',
        ];
    }
}

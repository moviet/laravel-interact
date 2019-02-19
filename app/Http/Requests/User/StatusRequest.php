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
            'status'    => 'max:5000',
            'capture'   => 'required|min:25|max:55',
            'photos'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'status.max' => 'Hello, your status is maximum',
            'photos.image' => 'Image extension invalid',
            'photos.mimes' => 'Image extension invalid',
        ];
    }
}

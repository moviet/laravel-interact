<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PhotoProfileRequest extends FormRequest
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
            'profile'  => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'profile.image' => 'Image extension invalid',
            'profile.mimes' => 'Image extension invalid',        
        ];
    }
}

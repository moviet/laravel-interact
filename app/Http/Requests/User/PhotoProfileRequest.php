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
            'detect'  => 'nullable',
            'profile'  => 'nullable|mimes:jpeg,png,jpg|image|max:10240',
        ];
    }

    public function messages()
    {
        return [
            'profile.mimes' => 'Invalid image extension',       
        ];
    }
}

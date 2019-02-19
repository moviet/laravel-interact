<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class JoinRequest extends FormRequest
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
            'name'                   => 'required|string|max:80|regex:/^[a-zA-Z ]*$/',
            'email'                  => 'required|string|email|max:255',
            'password'               => 'required|string|min:8',
            'password_confirmation'  => 'required|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.regex'        => 'Invalid Name Characters',
            'email.email'       => 'Email Address Invalid',
            'password.min'      => 'Password Minimum 8 Characters',
        ];
    }
}

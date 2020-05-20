<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string|max:80|regex:/^[a-zA-Z ]*$/',
            'email'     => 'required|string|email|max:255',
            'division'  => 'required|string|max:20',
            'message'   => 'required|string|regex:/^[a-zA-Z0-9 ?!@\/\/\&\$\.\,\_\+]*$/|min:10|
                            max:6000',
        ];
    }

    public function messages()
    {
        return [
            'name.regex'        => 'Invalid Characters',
            'email.required'    => 'Email Address Is Required',
            'message.regex'     => 'Your message characters are messy',
        ];
    }
}

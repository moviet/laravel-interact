<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'name'  => 'required|string|max:50|regex:/^[a-zA-Z0-9 \-\_\#\@]*$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Please enter an user name", 
            'name.regex' => "Invalid characters",      
        ];
    }
}

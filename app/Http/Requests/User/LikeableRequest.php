<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LikeableRequest extends FormRequest
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
            'id'       => 'required|integer',
            'status'   => 'required|string:max:10',
            'token'    => 'required|string|regex:/^[0-9\-]*$/',
            'like'     => 'integer',
        ];
    }
}

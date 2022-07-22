<?php

namespace App\Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:4',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed|min:4',
            'password_confirmation' => 'required|min:4',
            'username'=>'required|unique:admins',

        ];
    }


}

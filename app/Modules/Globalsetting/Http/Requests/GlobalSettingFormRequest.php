<?php

namespace App\Modules\Globalsetting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GlobalSettingFormRequest extends FormRequest
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
        switch ($this->method()) {

            case 'POST':
                return [
                    'organisation_name' => 'required',


                ];
            case 'PUT':
                return [
                    'organisation_name' => 'required',


                ];
            default:
                break;
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'file_name.required' => 'A Banner image is required',
            'file_name.mimes' => 'Only JPEG,PNG and JPG allowed',
        ];
    }
}

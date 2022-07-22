<?php

namespace App\Modules\Pages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageFormRequest extends FormRequest
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
                    'title' => 'required ',



                ];
            case 'PUT':
                return [
                    'title' => 'required' ,


                ];
            default:
                break;
        }
    }
}

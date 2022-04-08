<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionFormRequest extends FormRequest
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
            'ref' => [
                'required',
                'string',
                'max:191',
            ],
            'title' => [
                'required',
                'string',
                'max:191',
            ],
            'down_payment' => [
                'required',
                'numeric',
                'min:0',
                'max:100',
            ],
        ];
    }
}

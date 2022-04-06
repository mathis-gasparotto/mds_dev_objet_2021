<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientFormRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:191',
            ],
            'email' => [
                'email',
                'nullable',
                'max:191',
            ],
            'phone' => [
                'string',
                'nullable',
                'max:191',
            ],
            'address' => [
                'required',
                'string',
                'max:191',
            ],
            'siret' => [
                'required',
                'string',
                'max:191',
            ],
        ];
    }
}

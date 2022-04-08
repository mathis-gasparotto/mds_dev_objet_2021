<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionLineFormRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'max:191',
            ],
            'quantity' => [
                'required',
                'integer',
                'min:0',
            ],
            'unit_price' => [
                'required',
                'numeric',
                'min:0',
            ],
            'unit' => [
                'string',
                'nullable',
            ],
        ];
    }
}

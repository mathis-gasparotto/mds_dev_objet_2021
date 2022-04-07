<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserFormRequest extends FormRequest
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
                'required',
                'email',
                'max:191',
                Rule::unique('users')
                    ->ignore(Auth::user()),
            ],
            'contact_email' => [
                'required',
                'email',
                'max:191',
            ],
            'phone' => [
                'required',
                'string',
                'max:191',
            ],
            'address' => [
                'required',
                'string',
            ],
            'bank_account_owner' => [
                'required',
                'string',
                'max:191',
            ],
            'bank_domiciliation' => [
                'required',
                'string',
                'max:191',
            ],
            'bank_rib' => [
                'required',
                'string',
                'max:191',
            ],
            'bank_iban' => [
                'required',
                'string',
                'max:191',
            ],
            'bank_bic' => [
                'required',
                'string',
                'max:191',
            ],
            'company_name' => [
                'required',
                'string',
                'max:191',
            ],
            'company_siret' => [
                'required',
                'string',
                'max:191',
            ],
            'company_ape' => [
                'required',
                'string',
                'max:191',
            ],
        ];
    }
}

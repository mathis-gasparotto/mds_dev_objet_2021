<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserFromDashboardFormRequest extends FormRequest
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
            'avatar_url' => [
                'required',
                'max:191',
                'url',
                ],
        ];
    }
}

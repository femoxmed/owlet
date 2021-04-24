<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDealerRequest extends FormRequest
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
            'logo' => 'sometimes'|'mimes:png,gif,jpeg',
            'email' => 'required'|'string'|'email'|'max:255'|'unique:users',
            'password' => 'required'|'string'|'min:3'|'confirmed',
            'first_name' => 'required'|'string'|'max:60',
            'last_name' => 'required'|'string'|'max:60',
            'company_name' => 'required'|'string'|'max:60',
            'is_company' => 'required'|'boolean',
            'phone' => 'required'|'string',
            'alternative_number'|'required'|'string',
            'email' => 'required'|'string',
            // 'verified_at' => 'required'|'string'
        ];
    }
}

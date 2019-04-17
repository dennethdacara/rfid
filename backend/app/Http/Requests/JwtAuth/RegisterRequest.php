<?php

namespace App\Http\Requests\JwtAuth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'given_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }
}

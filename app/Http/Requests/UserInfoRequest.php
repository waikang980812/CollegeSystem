<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' =>['required'],
            'birthdate' => ['required', 'before:today'],
            'address' => ['required'],
            'gender' => ['required'],
            'contactno' => ['required','min:8'],
        ];
    }
    public function messages()
    {
        return [
             'contactno.required' => 'Contact number field is required',
            'birthdate.before' => 'Invalid birth date',
        ];
    }
}

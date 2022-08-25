<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'title' => 'required|unique:roles|max:255',
            'description' => 'required|min:2',
        ];
    }
}

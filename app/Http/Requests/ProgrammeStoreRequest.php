<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgrammeStoreRequest extends FormRequest
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
            'name' => 'required|unique:programmes|max:255',
            'description' => 'required|min:5',
             'mer' => 'required|min:5',
             'courseinfo' => 'required|min:5',
             'duration' => 'required|digits_between:1,10',
        ];
    }
}

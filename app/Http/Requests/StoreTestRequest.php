<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestRequest extends FormRequest
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
            'name' => 'required|max:64',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Test Name can\'t be empty. Please be serious!',
            'name.max' => 'Test name too long. It shouln\'t exceed 64 characters.'
        ];
    }
}

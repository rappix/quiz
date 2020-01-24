<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUanswerRequest extends FormRequest
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
            'question_id' => 'required',
            'answer_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'question_id.required' => 'Please select an answer.',
            'answer_id.required' => 'Please select an answer.'
        ];
    }
}

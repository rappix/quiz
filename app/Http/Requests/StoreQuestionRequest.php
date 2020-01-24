<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'answer' => 'required|nullable|array|min:3',
            'correct' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Question can\'t be empty, there is no sense :S',
            'name.max' => 'Test name too long. It shouln\'t exceed 64 characters.',
            'answer.min' => 'You need at least 3 answers.',
            'answer.*.required' => 'You need at least 3 answers.',
            'correct.required' => 'You need to mark correct answer.'
        ];
    }
}

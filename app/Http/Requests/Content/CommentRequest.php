<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'title' => [
                'required',
                // 'min:30',
                'max:50',
            ],
            'content' => [
                'required',
                // 'min:50',
                'max:1000',
            ],
        ];
    }

    /**
     * custom message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => '必須項目です。',
            'max' => ':max 文字以内で入力してください。',
            'min' => ':min 文字以上で入力してください。',
        ];
    }
}

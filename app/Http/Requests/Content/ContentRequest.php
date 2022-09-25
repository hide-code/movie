<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
                'max:50',
            ],
            'comment' => [
                'required',
                'max:1000',
            ],
            'category_ids' =>[
                'required',
                'exists:categories,id',
            ],
            'avatar' => [
                'required',
                'image',
                // 'mimes:jpeg, png, jpg',
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
            'exists' => 'カテゴリが存在しません。',
            'title.required' => 'タイトルは必須です',
            'content.required' => 'コンテントは必須です',
            'avatar.required' => 'アバターは必須です',
            'category_ids.required' => 'カテゴリーは必須です',
            'max' => ':max 文字以内で入力してください。',
            'image' => '画像ファイルを選択してください。',
            'avatar.max' => 'ファイル容量が:max KBを超えています。',
            'mimes' => "指定された拡張子（PNG/JPG）ではありません。",
        ];
    }
}

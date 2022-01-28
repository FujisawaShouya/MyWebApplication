<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'required|max: 30',
            'platform' => 'required',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'ゲームタイトルを記入してください',
            'title.max' => 'ゲームタイトルは30文字以内で記入してください',
            'platform.required' => '機種を選択してください'
        ];
    }
}
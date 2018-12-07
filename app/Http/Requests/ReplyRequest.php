<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        return [
            'content' => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'content.min' => '请至少输入2个字符',
            'content.required' => '不能提交空评论',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'           => 'required|min:4|max:100',
            'email'          => 'required|email',
            'subject'        => 'required|min:6|max:100',
            'comments'       => 'required|min:10|max:300'
        ];
    }
}

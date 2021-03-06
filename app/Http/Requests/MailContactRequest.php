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
            'name'           => 'required|max:100',
            'email'          => 'required',
            'subject'        => 'required|max:100',
            'comments'       => 'required|max:300'
        ];
    }
}

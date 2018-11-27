<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'                  => 'required|min:4|max:100',
            'message'                 => 'required|min:5|max:300',
            'type'                 => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'                    => 'O título é obrigatório!',
            'message.required'                  => 'O campo de mensagem é obrigatório!',
            'type.required'                     => 'O campo tipo é obrigatório!',
        ];
    }
}

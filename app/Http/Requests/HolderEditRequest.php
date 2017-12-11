<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HolderEditRequest extends FormRequest
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
            'name'                  => 'required|min:4|max:100',
            'email'                 => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                  => 'O nome é obrigatório!',
            'name.min'                       => 'O nome deve ter no mínimo 4 caracteres!',
            'name.max'                       => 'O nome deve ter no máximo 100 caracteres!',
            'email.required'                 => 'O campo e-mail é obrigatório!',
            'email.email'                    => 'O campo e-mail deve conter um e-mail válido!',
        ];
    }
}

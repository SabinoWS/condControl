<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CondominiumEditRequest extends FormRequest
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
            'name'      => 'required|min:4|max:100',
            'address'   => 'required|min:5|max:150',
            'number'    => 'required|numeric',
            'telephone' => 'required|numeric',
            'manager'   => 'required|email|exists:users,email',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'O nome é obrigatório.',
            'name.min'           => 'O nome deve ter no mínimo 4 caracteres!',
            'name.max'           => 'O nome deve ter no máximo 100 caracteres!',

            'address.required'   => 'O endereço é obrigatório.',
            'address.min'        => 'O endereço deve ter no mínimo 5 caracteres!',
            'address.max'        => 'O endereço deve ter no máximo 150 caracteres!',

            'number.required'    => 'O número é obrigatório.',
            'number.numeric'     => 'O número deve conter apenas digitos!',

            'telephone.required' => 'O telefone é obrigatório.',
            'telephone.numeric'  => 'O telefone deve conter apenas digitos!',

            'manager.required'   => 'O campo síndico é obrigatório.',
            'manager.email'      => 'O campo síndico deve ser um e-mail válido.',
            'manager.exists'     => 'E-mail não registrado.',
        ];
    }
}

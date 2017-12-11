<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleEditRequest extends FormRequest
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
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|max:12',
            'password_confirmation' => 'required|same:password_confirmation'
        ];
    }

    public function messages()
    {
        return [
            'name.required'                  => 'O nome é obrigatório!',
            'name.min'                       => 'O nome deve ter no mínimo 4 caracteres!',
            'name.max'                       => 'O nome deve ter no máximo 100 caracteres!',
            'email.unique'                   => 'Este e-mail já está em uso!',
            'email.required'                 => 'O campo e-mail é obrigatório!',
            'email.email'                    => 'O campo e-mail deve conter um e-mail válido!',
            'password.required'              => 'O campo senha é obrigatório!',
            'password.min'                   => 'O campo senha deve ter no mínimo 6 caracteres!',
            'password.max'                   => 'O campo senha deve ter no máximo 12 caracteres!',
            'password_confirmation.required' => 'O campo de confirmação de senha é obrigatório!',
            'password_confirmation.same'     => 'O campo confirmação deve ser igual ao campo de senha!',
        ];
    }
}

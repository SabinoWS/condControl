<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalEditRequest extends FormRequest
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
            'name'                 => 'required|min:4|max:100',
            'description'          => 'required|min:4|max:100',
            'capacity'             => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'O nome é obrigatório!',
            'name.min'             => 'O nome deve ter no mínimo 4 caracteres!',
            'name.max'             => 'O nome deve ter no máximo 100 caracteres!',
            'description.required' => 'A descrição é obrigatório!',
            'description.min'      => 'A descrição deve ter no mínimo 4 caracteres!',
            'description.max'      => 'A descrição deve ter no máximo 100 caracteres!',
            'capacity.required'    => 'A capacidade é obrigatório!',
        ];
    }
}

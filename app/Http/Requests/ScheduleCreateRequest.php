<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleCreateRequest extends FormRequest
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

    public function rules()
    {
        return [
            'reservation_date'                  => 'required|date|after:today',
        ];
    }

    public function messages()
    {
        return [
            'reservation_date.required'                  => 'A data é obrigatória!',
            'reservation_date.date'                  => 'A data deve ser válida!',
            'reservation_date.after'                  => 'A data deve ser posterior a data de hoje!',
        ];
    }
}

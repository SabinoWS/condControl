<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueSchedule;
use Carbon\Carbon;

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
        $this->reservation_date = Carbon::createFromFormat('d/m/Y', $this->reservation_date);
        return [
            'reservation_date' => ['required', 'date', 'after:today',
            new UniqueSchedule($this->local_id)
            ],
        ];
    }

    public function messages()
    {
        return [
            'reservation_date.required'                  => 'A data é obrigatória!',
            'reservation_date.date'                  => 'A data deve ser válida!',
            'reservation_date.after'                  => 'A data deve ser posterior à data de hoje!',
            'reservation_date.unique'                  => 'Esta data já está reservada!',
        ];
    }

}

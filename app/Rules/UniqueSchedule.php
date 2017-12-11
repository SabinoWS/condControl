<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UniqueSchedule implements Rule
{
    private $localId;

    public function __construct($localId)
    {
        $this->localId = $localId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $date = Carbon::createFromFormat('d/m/Y', $value);
        $day = $date->year.$date->month.$date->day;

        $search = DB::table('local_schedules')
            ->select('*')
            ->where('local_id', '=', $this->localId)
            ->where('day', '=', $day);

        if($search->get()->count() > 0)
            return false;
        else
            return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Esta data já está agendada.';
    }
}

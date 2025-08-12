<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class HolidayDuty extends Model
{
    protected $table = 'holiday_duties';

    protected $fillable = ['employee_id', 'holiday_type','duty_date','reason', 'is_approved'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

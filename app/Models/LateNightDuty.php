<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LateNightDuty extends Model
{
    public $table = 'late_night_duties';

    protected $fillable = [
        'employee_id',
        'duty_date',
        'from_time',
        'to_time',
        'reason',
        'transport_required',
    ];

    protected $casts = [
        'duty_date' => 'date',
        'from_time' => 'datetime:H:i',
        'to_time' => 'datetime:H:i',
        'transport_required' => 'boolean',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

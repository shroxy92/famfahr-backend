<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraDuty extends Model
{
    protected $table = 'extra_duties';
    protected $fillable = [
        'employee_id',
        'extra_date',
        'start_time',
        'end_time',
        'task_description',
        'approved_by_lead',
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'emp_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvanceSalary extends Model
{
    protected $table = 'advance_salary';

    protected $fillable = [
        'employee_id',
        'date',
        'salary',
        'reason',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}

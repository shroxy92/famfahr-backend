<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentLead extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentLeadFactory> */
    use HasFactory;

    protected $table = 'department_leads';

    protected $fillable = [
        'employee_id',
        'department_id',
    ];

    protected $hidden = [];



    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

//    public function role()
//    {
//        return $this->belongsTo(Role::class, 'role_id', 'id');
//    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}

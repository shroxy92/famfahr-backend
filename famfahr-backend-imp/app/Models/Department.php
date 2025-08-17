<?php

namespace App\Models;

use App\Services\EmployeeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];

    public function employees()
    {
        return $this->belongsToMany(Department::class,'department_employee');

    }
    public function department_leads()
    {
        return $this->hasOne(DepartmentLead::class);
    }

}

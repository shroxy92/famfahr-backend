<?php

namespace App\Models;

use App\Services\EmployeeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];

    public function department_leads()
    {
        return $this->belongsTo(DepartmentLead::class);
    }

}

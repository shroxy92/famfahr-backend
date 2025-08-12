<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'middle_name',
        'date_of_birth',
        'gender',
        'marital_status',
        'nationality',
        'religion',
        'blood_group',
        'rf_id',
        'father_name',
        'mother_name',
        'spouse_name',
        'phone',
        'emergency_contact',
        'email',
        'present_address',
        'permanent_address',
        'mailing_address',
        'postal_code',
        'nid_name',
        'joining_date',
        'designation',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'joining_date' => 'date',
    ];

    /**
     * Get the user associated with the employee.
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class,'department_employee');

    }
    public function user()
    {
        return $this->hasOne(User::class, 'emp_id', 'employee_id');
    }
}

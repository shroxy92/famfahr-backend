<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanClaim extends Model
{
    protected $table = 'loan_claim';
    protected $fillable = [
        'employee_id',
        'amount',
        'payment_method',
        'duration_months',
        'start_month',
        'start_year',
        'purpose',
    ];

    // Relationship to User (if employee is a user)
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}

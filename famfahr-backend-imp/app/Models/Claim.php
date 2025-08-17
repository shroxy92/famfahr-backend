<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'category',
        'amount',
        'from_date',
        'to_date',
        'description',
        'attachment',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}

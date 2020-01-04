<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryPart extends Model
{
    protected $fillable  = [
        'salary_id',
        'amount',
        'payer_id'
    ];

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }
}
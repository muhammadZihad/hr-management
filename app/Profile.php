<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'country',
        'user_id',
        'city',
        'dob',
        'age',
        'naitonal_id',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
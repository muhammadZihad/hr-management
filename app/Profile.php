<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'country_id',
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
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
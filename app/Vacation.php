<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    protected $fillable =[
        'from', 'to', 'description','user'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}

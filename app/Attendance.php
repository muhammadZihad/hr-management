<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['date'];
    public function users(){
        return $this->belongsToMany('App\User');
    }
}

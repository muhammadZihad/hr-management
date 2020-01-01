<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['date'];
    public function users(){
        return $this->belongsToMany('App\User')->withPivot('check_in','check_out','check_in_status','check_out_status');
    }
}

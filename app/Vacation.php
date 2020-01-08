<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    protected $fillable =[
        'from', 'to', 'description','user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

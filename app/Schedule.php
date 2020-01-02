<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'leader_id',
        'title',
        'status',
        'description',
        'from',
        'to'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function hasUser($id)
    {
        return in_array($id, $this->users->pluck('id')->toArray());
    }
}
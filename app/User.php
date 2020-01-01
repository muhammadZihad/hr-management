<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Attendance;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function attendances()
    {
        return $this->belongsToMany('App\Attendance')->withPivot('check_in');
    }


    public function isCheckedIn()
    {
        $user_id = auth()->user()->id;
        $cdate = Carbon::now('+6:00')->toDateString();
        $user = User::find($user_id)->attendances();
        if ($user) {
            if ($user->where('date', $cdate)->first() != null) {
                return User::find($user_id)->attendances()->where('date', $cdate)->firstOrFail()->pivot->check_in;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
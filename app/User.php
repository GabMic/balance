<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    protected $with = ['type', 'activity', 'tasks', 'budget'];

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

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function type()
    {
        return $this->hasMany(Type::class)->orderBy('name', 'asc');
    }

    public function budget()
    {
        return $this->hasMany(Budget::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function isAdmin(){
        return $this->admin;
    }

    public function activityForToday($day = null){
        return $this->activity()->whereMonth('paid_at', Carbon::now()->month)->whereDay('paid_at', $day)->get();
    }
    public function activityForThisMonth(){
        return $this->activity()->whereMonth('paid_at', Carbon::now()->month)->get();
    }
}

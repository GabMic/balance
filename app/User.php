<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

    public function activity()
    {
        return $this->hasMany(Activity::class)->whereMonth('paid_at', Carbon::now()->month)->sum('amount');
    }

    public function type()
    {
        return $this->hasMany(Type::class);
    }

    public function budget()
    {
        return $this->hasMany(Budget::class)->whereMonth('created_at', Carbon::now()->month)->latest()->pluck('budget')->first();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class)->where('done', false)->get();
    }
}

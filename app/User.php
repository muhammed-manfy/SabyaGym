<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    // able to know if the user is administrator we use this method : auth()->user->isAdmin()
    public function isAdmin()
    {
        return $this->admin == 1;
    }

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }

    public function trainee()
    {
        return $this->hasOne('App\Trainee');
    }

    public function coach()
    {
        return $this->hasOne('App\Coach');
    }

    public function cleaner()
    {
        return $this->hasOne('App\Cleaner');
    }
}

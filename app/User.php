<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Group;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }

    public function groupUser()
    {
        return $this->hasMany('App\Models\GroupUser');
    }

    public function task()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function exercises()
    {
        return $this->hasMany('App\Models\Exercise');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Group extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'group_image',
        'subject_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function groupUser()
    {
        return $this->hasMany('App\Models\GroupUser');
    }

    public function exercises()
    {
        return $this->hasMany('App\Models\Exercise');
    }
}

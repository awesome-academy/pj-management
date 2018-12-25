<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'start_date',
        'end_date',
        'user_id',
        'group_id',
    ];

    public function task()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
    ];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

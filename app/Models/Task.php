<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'link',
        'file',
        'exercise_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function exercise()
    {
        return $this->belongsTo('App\Models\Exercise');
    }
}

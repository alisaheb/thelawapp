<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tasks()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }

    public function notification()
    {
        return $this->hasMany('App\Notification');
    }

}

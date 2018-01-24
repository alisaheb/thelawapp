<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }

    public function userby()
    {
        return $this->belongsTo('App\User', 'comment_by');
    }

    public function userto()
    {
        return $this->belongsTo('App\User', 'comment_to');
    }
}

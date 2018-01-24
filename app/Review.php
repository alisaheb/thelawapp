<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class Review extends Model
{
    protected $fillable = ['task_id','user_id','reviews','rating'];
 	
 	public function tasks() {
        return $this->hasMany('App\Task', 'user_id','user_id');
    }

    public function users() {
        return $this->belongsTo('App\User', 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminToLawyer extends Model
{
    protected $table = 'payment_lawapp_to_lawyer';

    public function user()
    {
        return $this->belongsTo('App\User', 'payment_to');
    }

    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }
}

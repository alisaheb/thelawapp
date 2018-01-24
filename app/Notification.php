<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    /*public function task()
    {
        return $this->belongsTo('App\Task','task_id');
    }*/

    public function task()
    {
        return $this->belongsTo('App\Task', 'href');
    }

    public function bid()
    {
        return $this->hasOne('App\Bid', 'href');
    }

    public function userby()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }

    public function userto()
    {
        return $this->belongsTo('App\User', 'recipient_id');
    }

    

}

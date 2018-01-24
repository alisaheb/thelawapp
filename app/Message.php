<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //

    public function messageby()
    {
        return $this->belongsTo('App\User', 'message_by');
    }

    public function messageto()
    {
        return $this->belongsTo('App\User', 'message_to');
    }


}

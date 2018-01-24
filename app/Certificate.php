<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = ['name','extension','user_id'];


     public function getUser(){
        return $this->belongsTo('App\User');
    }
}

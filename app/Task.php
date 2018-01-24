<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;

class Task extends Model
{
    //

    public function notification()
    {
        return $this->hasOne('App\Notification');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function review()
    {
        return $this->hasMany('App\Review','task_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function userdetails()
    {
        return $this->belongsTo('App\User', 'user_details');
    }

    public function asignee()
    {
        return $this->belongsTo('App\User', 'assigned_to');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

    public function getDateOfCompletionAttribute($value)
    {
        return date('d-M-y', strtotime($value));
    }

    public function getLastDateAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    public function setDateOfIncidentAttribute($value)
    {
        $this->attributes['date_of_incident'] = date('Y-m-d', strtotime($value));
    }

    public function setLastDateAttribute($value)
    {
        $this->attributes['last_date'] = date('Y-m-d', strtotime($value));
    }
}

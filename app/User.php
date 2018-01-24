<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password','type','lname','fname','email_verify','profile_completion'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function payments()
    {
        return $this->hasMany('App\PaymentToLawapp');
    }

    public function paidtolawyers()
    {
        return $this->hasMany('App\AdminToLawyer');
    }

    public function task()
    {
        return $this->hasMany('App\Task');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

    public function portfolios()
    {
        return $this->hasMany('App\Portfolio');
    }

    public function getFnameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = date('Y-m-d', strtotime($value));

    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }


    public function getDobAttribute($value)
    {
        return date('M-d-Y', strtotime($value));
    }

    public function getCertificate(){
        return $this->hasMany('App\Certificate');
    }

    public function pendingCertificate(){
        return $this->hasMany('App\Certificate')->where('approved',-1);
    }

}

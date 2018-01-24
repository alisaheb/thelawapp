<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentToLawapp extends Model
{
    protected $table = 'payment_to_lawapp';


    public function user()
    {
        return $this->belongsTo('App\User', 'payment_by');
    }

    public function user_to()
    {
        return $this->belongsTo('App\User', 'payment_to');
    }

    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }
}

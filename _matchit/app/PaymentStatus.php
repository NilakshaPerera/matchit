<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    protected $table = 'payment_status';
    protected $fillable = ['name']; 

    public function payment(){
        return $this->belongsTo('App\Payment','payment_status_id');
    }
}

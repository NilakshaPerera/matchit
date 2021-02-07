<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $table = 'payments';
   protected $fillable =['users_id','payment_status_id','date','amount','reference_no'];

   public function user(){
   return $this ->belongsTo ('App\Payment','users_id');
   }
    public function PaymentStatus(){

   return $this ->belongsTo('App\PaymentStatus','payment_status_id');
    }

}


				
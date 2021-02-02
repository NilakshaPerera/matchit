<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $table = 'payments';
   protected $fillable =['users_id','payment_status_id','date','amount','reference_no'];
}

				
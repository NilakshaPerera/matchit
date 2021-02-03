<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasBooking extends Model
{
    protected $table = 'user_has_bookings';
    protected $fillable = ['users_id','bookings_id'];

    public function user(){
        return $this ->belongsTo('App\User','users_id');
    }
    public function booking(){
        return $this ->belongsTo('App\Booking','bookings_id');
    }
}

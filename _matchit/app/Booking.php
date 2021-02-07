<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "bookings";
    protected $fillable = ['users_id', 'events_id', 'channel_id', 'payments_id', 'date'];

    public function userHasBooking(){
        return $this->hasMany('App\UserHasBooking', 'bookings_id');
    }
}

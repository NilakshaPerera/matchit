<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table ='events';
    protected $fillable = ['event_types_id', 'banner' ,'name','price','date', 'venue'];

    public function eventType(){
        return $this->belongsTo('App\EventType', 'event_types_id');
    }
}

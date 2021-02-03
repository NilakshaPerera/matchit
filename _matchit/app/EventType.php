<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $table = 'event_types';
    protected $fillable = ['name']; 

    public function event(){
        return $this->belongsTo('App\Event','event_types_id');
    }
}

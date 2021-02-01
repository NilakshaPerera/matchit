<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table ='events';
    protected $fillable = ['event_types_id','name','price','date'];
}

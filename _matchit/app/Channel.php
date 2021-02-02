<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channels';
    protected $fillable = ['name']; 

    public function user(){
        return $this->hasOne('App\User', 'channels_id');
    }
}

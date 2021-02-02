<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = ['name'];

    public function user(){
        return $this->hasOne('App\User', 'status_id');
    }
}

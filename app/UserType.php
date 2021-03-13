<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = "user_types";
    protected $fillable = ['name', 'fee'];

    public function user(){
        return $this->hasOne('App\User', 'user_types_id');
    }


}

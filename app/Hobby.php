<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $table = 'hobbies';
    protected $fillable = ['name'];

    public function userHasHobby(){
        return $this->hasMany('App\UserHasHobby', 'hobbies_id');
    }
   

}

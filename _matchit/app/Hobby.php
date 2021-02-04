<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $table = 'hobbies';
    protected $fillable = ['name'];

    public function userhashobby(){
        return $this->hasMany('App\UserHasHobby', 'hobbies_id');
    }
   

}

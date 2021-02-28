<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasHobby extends Model
{
    protected $table = 'user_has_hobbies';
    protected $fillable = ['users_id','hobbies_id'];

    public function user(){
        return $this ->belongsTo('App\User','users_id');
    }
    public function hobby(){
        return $this ->belongsTo('App\Hobby','hobbies_id');
    }

}

 
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasHobby extends Model
{
    protected $table = 'users_has_bobbies';
    protected $fillable = ['users_id','hobbies_id'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersHasPersonalityDetail extends Model
{
    protected $table = 'users_has_personality_details';
    protected $fillable = ['users_id', 'personality_details_id'];
}

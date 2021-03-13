<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalityDetail extends Model
{
    protected $table = 'personality_details';
    protected $fillable = ['name'];

    public function usershaspersonalitydetail(){
        return $this->hasMany('App\UsersHasPersonalityDetail', 'personality_details_id');
    }
}

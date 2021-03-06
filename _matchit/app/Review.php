<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['name'];

    public function userHasReview(){
        return $this->hasMany('App\UserHasReview', 'reviews_id');
    }
}

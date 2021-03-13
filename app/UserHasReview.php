<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasReview extends Model
{
    protected $table = 'user_has_reviews';
    protected $fillable = ['users_id','reviews_id'];

    public function user(){
        return $this ->belongsTo('App\User','users_id');
    }
    public function review(){
        return $this ->belongsTo('App\Review','reviews_id');
    }
}

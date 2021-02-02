<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasReview extends Model
{
    protected $table = 'users_has_reviews';
    protected $fillable = ['users_id','reviews_id'];
}

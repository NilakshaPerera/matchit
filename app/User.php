<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'roles_id', 'name', 'email', 'phone' , 'password', 'dob', 'gender' , 'prefered_gender', 'address', 'user_types_id', 'channels_id', 'status_id', 'profile_pic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role', 'roles_id');
    }

    public function payment(){
        return $this->hasMany('App\Payment', 'users_id');
    }

    public function userType(){
        return $this->belongsTo('App\UserType' , 'user_types_id');
    }

    public function channel(){
        return $this->belongsTo('App\Channel', 'channels_id');
    }

    public function status(){
        return $this->belongsTo('App\Status', 'status_id');
    }

    public function userhashobby(){
        return $this->hasMany('App\UserHasHobby', 'users_id');
    }

    public function userhasbooking(){
        return $this->hasMany('App\UserHasBooking', 'users_id');
    }

    public function userhasreview(){
        return $this->hasMany('App\UserHasReview', 'users_id');
    }

    public function usershaspersonalitydetail(){
        return $this->hasMany('App\UsersHasPersonalityDetail', 'users_id');
    }
   
}
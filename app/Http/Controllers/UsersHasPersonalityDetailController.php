<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersHasPersonalityDetail;

class UsersHasPersonalityDetailController extends Controller
{
  
    /**
     * Created At : 9/3/2021
     * Created By : Nilaksha 
     * Summary : Create User has hobbies record
     *
     * @param [type] $params
     * @return void
     */
    public function create($params){
        UsersHasPersonalityDetail::create($params);
    }

    /**
     * Created At : 9/3/2021
     * Created By : Nilaksha 
     * Summary : Delete User has hobbies records
     *
     * @param [type] $userId
     * @return void
     */
    public function delete($userId){
        UsersHasPersonalityDetail::where('users_id', $userId)->delete();
    }
}

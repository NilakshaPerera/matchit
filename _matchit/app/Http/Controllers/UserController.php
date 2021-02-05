<?php

namespace App\Http\Controllers;
use App\Role;
use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use Auth;

class Usercontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if( Auth::user()->roles_id == AppServiceProvider::Client ){
            return view('site.user');
        }else{
            return view('admin.users.user');
        }

        $roles = role::all();
        
        return view('admin.client.index')
            ->withRoles($roles);
            
    }
}
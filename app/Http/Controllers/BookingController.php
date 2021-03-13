<?php

namespace App\Http\Controllers;
use App\Providers\AppServiceProvider;
use App\Event;
use App\User;
use App\Role;
use App\Booking;
use Mail;

use Illuminate\Http\Request;
class BookingController extends Controller
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
        $events = Event::all();
        $users = User::where('roles_id', AppServiceProvider::Client)->get();
        $roles = Role::all();
        return view('admin.bookings.index')
        ->withEvents($events)
        ->withUsers($users)
        ->withRoles($roles);
    }


    


    /**
     * Created By : Nilaksha
     * Created At : 9/3/2021
     * Summary Creates a booking
     *
     * @param [type] $params
     * @return void
     */
    public function create($params){
       return Booking::create($params);
    }
}
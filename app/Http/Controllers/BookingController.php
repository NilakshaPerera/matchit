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

     /**
     * Created By : Mujitha
     * Created At : 20/2/2021
     * Summary: load the data to dropdown
     *
     * @param [type] $params
     * @return void
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
     * Created By : Mujitha
     * Created At : 15/3/2021
     * Summary Creates a booking
     *
     * @param [type] $params
     * @return void
     */
    public function sendeventdetails(Request $request){

        $user = User::where('id', $request['user_id'])->first();
        if(!$user){ return ['success' => false, 'data' => "Invalid user"]; }
        $event = Event::where('id', $request['event_types_id'])->first();
        
        try{

            Mail::send('admin.emails.bookingrequest', ['user' => $user , 'event' => $event], function($message) use($user) {
                $message->to($user->email)
                ->subject('Event Registration!!!');
            });

            return back()->with('success', "Email has successfully send to " . $user->name);
    
        }catch(\Exception $e){

            // check for failures
            return back()->with('error', "There is an issue with client's email address, unable to send email");
        
        }
    }

    /**
     * Created By : Nilaksha
     * Created At : 9/3/2021
     * Summary Creates a booking
     *
     * @param [type] $params
     * @return enum
     */
    public function create($params){
       return Booking::create($params);
    }
}
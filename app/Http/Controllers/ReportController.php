<?php

namespace App\Http\Controllers;

use App\Event;
use App\Payment;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Usercontroller;

class ReportController extends Controller
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
     * Created By : Nilakhsa 
     * Created At : 28/02/2021
     * Summary : Loads templates by selected report type
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)

    {
        $template = "";


        switch($request['type']){
            case AppServiceProvider::EventSchedule:
                    $events = Event::all();
                    $template = view('admin.reports.templates.eventschedule')->withEvents($events)->render();
                break;
            case AppServiceProvider::Income: 
                $payments = Payment::all();  
                $template = view('admin.reports.templates.income')->withPayments($payments)->render();
                break;
            case AppServiceProvider::MemberMatches:
                $data = $this->getMemberMatches();
                $template = view('admin.reports.templates.membermatches')->withData($data)->render();
                break;
            case AppServiceProvider::Payments:
                $payments = Payment::all();
                $template = view('admin.reports.templates.payments')->withPayments($payments)->render();
                break;
            case AppServiceProvider::Overdueletter:
                $payments = Payment::all();
                $template = view('admin.reports.templates.overdueletter')->withPayments($payments)->render();
                break;
            case AppServiceProvider::Pastevents:
                $events = Event::all();
                $template = view('admin.reports.templates.pastevents')->withEvents($events)->render();
                break;
            default:
                    $template = "";
                break;
        }
        return view('admin.reports.index')->withTemplate($template)->withType($request['type']);
    }
      
    /**
     * Created by:Nivetha
     * Created at 2021-03-07
     * Summary : Get successful member matches
     * 
     * @return void
     */
    public function getMemberMatches(){
        
        $users = User::where('roles_id', AppServiceProvider::Client)->get();
        $matches = [];
        foreach($users as $user){

            $match = [];
            $match['user_id'] = $user->id;
            $match['name'] = $user->name;
            $match['matches'] = (new Usercontroller())->getMatches($user->id, 50);

            array_push($matches, $match);

        }
        return $matches;
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function get(Request $request){

    }

}
 
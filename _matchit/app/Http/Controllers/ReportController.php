<?php

namespace App\Http\Controllers;

use App\Event;
use App\Payment;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;

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
                    $template = view('admin.reports.templates.eventschedule')->render();
                break;
            case AppServiceProvider::Income:
                $events = Event::all();
                $template = view('admin.reports.templates.income')->withEvents($events)->render();
                break;
            case AppServiceProvider::MemberMatches:
                $template = view('admin.reports.templates.membermatches')->render();
                break;
            case AppServiceProvider::Payments:
                $payments = Payment::all();
                $template = view('admin.reports.templates.payments')->withPayments($payments)->render();
                break;
            default:
                    $template = "";
                break;
        }
        return view('admin.reports.index')->withTemplate($template)->withType($request['type']);
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
 
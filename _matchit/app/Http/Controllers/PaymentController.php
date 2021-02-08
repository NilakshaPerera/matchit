<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use Auth;

class PaymentController extends Controller
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
    public function index(Request $request)
    {
     
        if (Auth::user()->roles_id == AppServiceProvider::Client) {  
            
            // $uesr['user'] = $request['user'];
            // $uesr['type'] = $request['type'];
            // $uesr['id'] = $request['id'];
            // dd( $uesr);
            
            return view('site.payment');
        } else {
            abort(404);
        }
    }

}

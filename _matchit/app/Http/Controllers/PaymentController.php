<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use Auth;
use App\User;
use App\Event;

class PaymentController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = User::where('id', $request['user'])->first();
        $id = ($request['id'])? $request['id'] : 0;
        if ($user && ($user->roles_id == AppServiceProvider::Client)) {  

            $price = 0;

            switch($request['type']){
                case 'event':

                    if( $event = Event::where('id', $id  )->first()   ){
                        $price = $event->price;
                    }else{
                        abort(404);
                    }          

                    break;
                case 'membership':
                    $price = $user->userType->price;
                    break;
                default:
                        abort(404);
                    break;
            }
            
            return view('site.payment')
                    ->withPrice($price)
                    ->withId($id)
                    ->withPayType($request['type']);
        } else {
            abort(404);
        }
    }


    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request){


    }

}

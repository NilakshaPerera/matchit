<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use Auth;
use App\User;
use App\Event;
use Illuminate\Validation\Rule;
use Cartalyst\Stripe\Stripe;
use App\Payment;
use App\Booking;
use DB;
use Mail;
use App\Http\Controllers\Usercontroller;
use Carbon\Carbon;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\DB as FacadesDB;

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
     * Created At : 8/2/2021
     * Created By : Nilaksha 
     * Summary : Load payment window
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = User::where('id', $request['user'])->first();
        $id = ($request['id']) ? $request['id'] : 0;
        if ($user && ($user->roles_id == AppServiceProvider::Client)) {

            $price = 0;

            switch ($request['type']) {
                case 'event':

                    if ($event = Event::where('id', $id)->first()) {

                        $today = Carbon::now();
                        $expireDate = Carbon::createFromFormat('Y-m-d', $event->date);
                        $difference = $today->diffInDays($expireDate, false); 

                        if ($difference < 0) {
                            abort(404);
                        }

                        $price = $event->price;
                    } else {
                        abort(404);
                    }

                    break;
                case 'membership':
                    $userController = new Usercontroller();
                    $price = $userController->getMembershipDues($user->id);
                    if(!$price){
                        abort(404);
                    }
                    break;
                default:
                    abort(404);
                    break;
            }

            return view('site.payment')
                ->withPrice($price)
                ->withId($id)
                ->withPayType($request['type'])
                ->withUser($user);
        } else {
            abort(404);
        }
    }
    /**
     * Created At : 14/3/2021
     * Created By : Imesha
     * Summary : view due payments
     *
     * @param Request $request
     * @return void
     */
    public function getAll(Request $request)
    {
        $users = User::where('roles_id', AppServiceProvider::Client)->get();
        return view('admin.payment.index')
        ->withUsers($users);
    }
   
    /**
     * Created At : 15/3/2021
     * UpdateCreated By : Imesha
     * Summary : Dispatches the due payment notification for passed user ID 
     *
     * @param Request $request
     * @return void
     */
    public function sendDueMembershipNotification(Request $request){

        $user = User::where('id', $request['user-id'])->first();
        if(!$user){ return ['success' => false, 'data' => "Invalid user"]; }

        $due = (new UserController())->getMembershipDues($user->id);

        Mail::send('admin.emails.paymentrequest', ['user' => $user , 'due' => $due], function($message) use($user) {
            $message->to($user->email)
            ->subject('Reminder to Pay Membership Dues');
        });

        return ['success' => true, 'data' => "You sent a notification to " . $user->name];

    }

    /**
     * Created At : 14/2/2021
     * Created By : Nilaksha 
     * Summary : Make payment
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {

        $idValidatoin = '';
        if ($request['paytype'] == 'event') {
            $idValidatoin = 'exists:events,id';
        }

        $request->validate([
            'user' => 'required|exists:users,id',
            'card_number' => 'required',
            'card_expiry' => ['required', 'regex:/^(0[1-9]|1[0-2])\/([1-9][0-9])$/'],
            'card_cvc' => ['required', 'regex:/^([0-9][0-9][0-9])$/'],
            'price' => 'required|min:1',
            'paytype' => ['required',  Rule::in(['event', 'membership']),],
            'id' => $idValidatoin
        ]);

        $price = 0;

        $user = User::where('id', $request['user'])->first();
        $id = ($request['id']) ? $request['id'] : 0;
        switch ($request['paytype']) {
            case 'event':
                if ($event = Event::where('id', $id)->first()) {
                    $price = $event->price;
                } else {
                    abort(404);
                }
                break;
            case 'membership':
                $userController = new Usercontroller();
                $price = $userController->getMembershipDues($user->id);
                if(!$price){
                    abort(404);
                }
                break;
        }

        $cardExp = explode('/', $request['card_expiry']);
        $stripe = Stripe::make(config('services.stripe.secret'));

        try {

            DB::beginTransaction();

            $order_no = (int) Payment::max('id') + 1;
            $order_ref = 'MATCHIT-' . str_pad($order_no, 5, '0', STR_PAD_LEFT);

            $result = '';

            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request['card_number'],
                    'exp_month' => $cardExp[0],
                    'exp_year' => 20 . $cardExp[1],
                    'cvc' => $request['card_cvc'],
                ],
            ]);

            // Create Customer with token
            $customer = $stripe->customers()->create([
                'description' => 'Customer : ' . $user->email,
                'email' => $user->email,
                'source' => $token['id'],
            ]);

            // Remove the card from charge API and let charge happens on the default card
            $result = $stripe->charges()->create([
                'currency' => "GBP",
                'amount' => $price,
                'description' => 'Order : ' . $order_ref,
                'customer' => $customer['id'],
            ]);

            if ($result['status'] == 'succeeded') {
                $message = "Your payment was successfully recieved.";

                $payment = Payment::create([
                    'users_id' => $user->id,
                    'payment_status_id' => 1,
                    'date' => date('y-m-d'),
                    'amount' => $price,
                    'reference_no' => $order_ref
                ]);

                if ($request['paytype'] == 'event') {

                    $bookingController = new BookingController();
                    $bookingController->create([
                        'users_id' => $user->id,
                        'events_id' => $request['id'],
                        'channel_id' => 5,
                        'payments_id' => $payment->id,
                        'date' => date('y-m-d'),
                    ]);
                }

                DB::commit();

                return redirect('/')->with(['paymentSuccess' => $message]);
            } else {
                DB::rollback();
                $messageErr = 'Payment failed!. Please try again.';
            }
        } catch (Exception $e) {
            DB::rollback();
            $messageErr = "Payment failed : " . $e->getMessage();
        } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
            DB::rollback();
            $messageErr = "Card detail invalid : " . $e->getMessage();
        } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            DB::rollback();
            $messageErr = "Some data is mising : " . $e->getMessage();
        }

        return back()->with(['paymentError' => $messageErr])->withInput();
    }
}

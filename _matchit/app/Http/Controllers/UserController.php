<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use App\Hobby;
use App\PersonalityDetail;
use App\UsersHasPersonalityDetail;
use Auth;
use App\Channel;
use App\Status;
use App\User;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserTypesController;
use App\Http\Controllers\UserHasHobbyController;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;


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
     * Created At : 16/1/2021
     * Created By : Nilaksha  
     * Summary : Loads the user profile page for the client user and loads the user create page to the admin users
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userTypeController = new UserTypesController();
        if (Auth::user()->roles_id == AppServiceProvider::Client) {

            return view('site.user')
                ->withUser(Auth::user())
                ->withHobbies(Hobby::all())
                ->withPersonalityDetails(PersonalityDetail::all())
                ->withUserTypes($userTypeController->get());
        } else {

            return view('admin.client.index')
                ->withRoles(Role::all())
                ->withUserTypes($userTypeController->get())
                ->withChannels(Channel::all())
                ->withStatus(Status::all());
        }
    }

    /**
     * Created At : 16/2/2021
     * Created By : Nilaksha  
     * Summary : Shows printable invoice for a given payment record
     *
     * @param Request $request
     * @return void
     */
    public function showInvoice(Request $request)
    {

        $payment = Payment::where('id', $request['id'])->where('users_id', Auth::user()->id)->first();
        $isEvent = ($payment->event) ? true : false;
        return view('site.invoice')
            ->withPayment($payment)
            ->withIsEvent($isEvent);
    }

    /**
     * Created At : 16/2/2021
     * Created By : Nilaksha  
     * Summary : Shows user opted in events
     *
     * @param Request $request
     * @return void
     */
    public function events(Request $request)
    {

        $eventController = new EventController();
        $events = $eventController->getAll();

        $payments = Payment::where('users_id', Auth::user()->id)
            ->whereHas('booking', function ($query) {
                $query->where('id', '!=', null);
            })
            ->get();

        return view('site.user-events')->withEvents($events)->withPayments($payments);
    }

    /**
     * Created At : 24/2/2021
     * Created By : Nilaksha  
     * Summary : Shows user membership status and payments made
     *
     * @param Request $request
     * @return void
     */
    public function membership(Request $request)
    {

        $payments = Payment::where('users_id', Auth::user()->id)
            ->whereDoesntHave('booking')
            ->get();
        $dues = $this->getMembershipDues(Auth::user()->id);

        return view('site.user-membership')
            ->withPayments($payments)
            ->withDues($dues)
            ->withLastMembershipPayment($this->getLastPaymentDate(Auth::user()->id));
    }

    /**
     * Created At : 28/2/2021
     * Created By : Nilaksha  
     * Summary : Gets membership mayment made date
     *
     * @param [type] $clientId
     * @return void
     */
    public function getLastPaymentDate($clientId)
    {

        $user = User::where('id', $clientId)->where('roles_id', AppServiceProvider::Client)->first();

        if (!$user) {
            return "This user is not a client or the user doesnt exist";
        }

        $payment = Payment::where('users_id', $user->id)
            ->whereDoesntHave('booking')
            ->latest('date')
            ->first();

        return ($payment) ? $payment->date : 'N/A';
    }

    /**
     * Created At : 24/2/2021
     * Created By : Nilaksha  
     * Summary : Get dues by users ID . returns the payment due by dates
     *
     * @return void
     */
    public function getMembershipDues($userId)
    {

        $user = User::where('id', $userId)->first();
        $totalPaymentsMade = Payment::where('users_id', $userId)
            ->whereDoesntHave('booking')
            ->sum('amount');

        $joinedDate = Carbon::createFromFormat('Y-m-d H:s:i', $user->created_at);
        $today = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
        $monthsSpan = $joinedDate->diffInMonths($today);

        $dueMembershipAmmount = ($monthsSpan * $user->userType->fee);

        if ($dueMembershipAmmount >  $totalPaymentsMade) {
            return ($dueMembershipAmmount -  $totalPaymentsMade);
        }

        return 0;
    }

    /**
     * Created At : 6/2/2021
     * Created By : Nivetha 
     * Summary : shows store form for clients
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try {
            $dateValidation = ['required', 'date'];

            if ($request['roles_id'] && ($request['roles_id'] == AppServiceProvider::Client)) {
                array_push($dateValidation, 'before:-50 years');
            }

            $request->validate([
                'roles_id' => 'required|exists:roles,id',

                'address' => 'required|string',
                'channels_id' => 'required|exists:channels,id',
                'status_id' => 'required|exists:status,id',

                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'phone' => ['required', 'digits:12'],
                'dob' => $dateValidation,
                'users_types_id' => ['required', 'exists:user_types,id'],
            ], [
                'dob.before' => "The birthday must be a date before 50 years.",

            ]);

            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'roles_id' => $request['roles_id'],
                'password' => Hash::make($request['password']),
                'dob' => $request['dob'],
                'user_types_id' => $request['users_types_id'],
                'status_id' => $request['status_id'],
                'channels_id' => $request['channels_id'],
                'address' => $request['address'],
            ]);

            return redirect()->back()->with('message', 'User Created Successfully!');
        } catch (Exception $ex) {

            Log::error($ex);
            return redirect()->back()->with('error', 'Something went wrong :(');
            $roles = role::all();
        }
    }


    /**
     * Created At : 5/2/2012
     * Created By : Nivetha 
     * Summary : shows edit form for user
     *
     * @param [type] $id
     * @return void
     */
    public function edit(Request $request)
    {
        $user = User::where('id', $request['id'])->first();
        $userTypeController = new UserTypesController();
        return view('admin.client.edit')
            ->withUser($user)
            ->withRoles(Role::all())
            ->withUserTypes($userTypeController->get())
            ->withChannels(Channel::all())
            ->withStatus(Status::all())
            ->withHobbies(Hobby::all())
            ->withPersonalityDetails(PersonalityDetail::all());
    }

    /**
     * Created At : 5/2/2021
     * Created By : Nilaksha 
     * Summary : saves updated data for a particular user
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $emailValidation =  ['required', 'string', 'email', 'max:255'];
            $oldPasswordValidatoin = [];
            $passwordValidation = [];

            $currentUser = (Auth::user()->roles_id == AppServiceProvider::Client) ? Auth::user() : (User::where('id', $request['user_id'])->first());

            if (!$currentUser) {
                return redirect()->back()->with('error', 'Invalid user');
            }

            if ($currentUser->email != $request['email']) {
                array_push($emailValidation, 'unique:users');
            }

            if ($request['old_password']) {
                array_push($passwordValidation, 'required', 'string', 'min:8', 'confirmed');
                array_push($oldPasswordValidatoin, 'userpassword:' . $currentUser->id);
            }

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => $emailValidation,
                'phone' => ['required', 'max:12'],
                'address' => ['required', 'max:1000'],
                'birthday' => ['required', 'date', 'before:-50 years'],
                'user_type' => ['exists:user_types,id'],
                'old_password' => $oldPasswordValidatoin,
                'password' => $passwordValidation,
                'hobby-details' => ['required'],
                'personality-details' => ['required'],
                'interests' => ['required'],
                'gender' => ['required'],
                'profile-pic' => [],                

            ], [
                'birthday.before' => "The birthday must be a date before 50 years.",
                'old_password.userpassword' => "The old password is incorrect.",
                'hobby-details.required' => 'The hobby details field is required.',
                'personality-details.required' => 'The personality details field is required.',
            ]);

            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'dob' => $request['birthday'],
                'address' => $request['address'],
                'prefered_gender' => $request['interests'],
                'gender' => $request['gender'],
            ];

            if ($request['user_type']) {
                $data['user_types_id'] = $request['user_type'];
            }

            if ($request['channels_id']) {
                $data['channels_id'] = $request['channels_id'];
            }

            if ($request['status_id']) {
                $data['status_id'] = $request['status_id'];
            }

            if ($request['old_password']) {
                $data['password'] = Hash::make($request['password']);
            }

            $logoImage = $request->file('profile-pic');
            if ($logoImage) {  
                $folderName = time() . '-' . rand();
                $fileName = time() . '-' . rand();
                $fileExtension = $logoImage->getClientOriginalExtension();
                Storage::disk('local')->putFileAs('public/pp/'. $folderName .'/', $logoImage, $fileName . '.' . $fileExtension);
                $logoImage = 'storage/pp/'. $folderName .'/' . $fileName . '.' . $fileExtension;

                $data['profile_pic'] = $logoImage;
            }
           
            User::where('id', $currentUser->id)->update($data);

            $userHasHobbyController = new UserHasHobbyController();
            $userHasHobbyController->delete($currentUser->id);

            foreach ($request['hobby-details'] as $hobbyDetail) {
                $userHasHobbyController->create([
                    'users_id' => $currentUser->id,
                    'hobbies_id' => $hobbyDetail,
                ]);
            }

            UsersHasPersonalityDetail::where('users_id', $currentUser->id)->delete();
            foreach ($request['personality-details'] as $personDetail) {
                UsersHasPersonalityDetail::create([
                    'users_id' => $currentUser->id,
                    'personality_details_id' => $personDetail,
                ]);
            }

            DB::commit();

            return redirect()->back()->with('message', 'Profile Updated Successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
            return redirect()->back()->with('error', 'Something went wrong :(');
        }
    }

    /**
     * Created At : 6/2/2021
     * Created By : Dulan
     * Summary : Read client details
     *
     * @param Request $request
     * @return void
     */
    public function all(Request $request)
    {
        return view('admin.client.view')
        ->withUsers(User::all());
    }

  
   /**
     * Created At : 5/3/2021
     * Created By : Nilaksha 
     * Summary : Show matches page to the user page
     *
     * @param Request $request
     * @return void
     */
    public function showMatches(Request $request){
        if (Auth::user()->roles_id == AppServiceProvider::Client) {

            return view('site.user-matches')
                ->withMatches($this->getMatches(Auth::user()->id ))
                ->withDues($this->getMembershipDues(Auth::user()->id));
        }else{
            abort(404);
        }
    }


    /**
     * Created At : 2/3/2021
     * Created By : Nilaksha 
     * Summary : Get matches of a passed client ID
     *
     * @param [type] $uesrId
     * @param [type] $minScore
     * @return void
     */
    public function getMatches($uesrId, $minScore = 0)
    {
        $currentUser = User::where('id', $uesrId)->where('roles_id', AppServiceProvider::Client)->first();  

        if ($currentUser) {

            $users = User::where('id', '!=', $uesrId)->where('roles_id', AppServiceProvider::Client)->get();

            $currentUserPersonalityDetails = ($currentUser->usershaspersonalitydetail) ? $currentUser->usershaspersonalitydetail->pluck('personality_details_id')->toArray() : [];
            $currentUserHobbyDetails = ($currentUser->userhashobby) ? $currentUser->userhashobby->pluck('hobbies_id')->toArray() : [];

            $matches = [];

            foreach ($users as $user) {

                $score = 0;
                $matchData['gender_score'] = 0;
                $matchData['region_score'] = 0;
                $matchData['personality_score'] = 0;
                $matchData['hobby_score'] = 0;
                $matchData['age_score'] = 0;

                // Preferred gender 10%
                if ($user->prefered_gender == AppServiceProvider::GenderEveryone || ($currentUser->gender ==  $user->prefered_gender && $currentUser->prefered_gender ==  $user->gender) ) {
                    $score += 10;
                    $matchData['gender_score'] = 10;
                } else {
                    continue;
                }

                // Region 10%
                if ($currentUser->user_types_id == $user->user_types_id) {
                    $score += 10;
                    $matchData['region_score'] = 10;
                }

                // personality details 30%
                $currentUserPersonalityDetailsMatches = [];
                $userPersonalityDetails = ($user->usershaspersonalitydetail) ? $user->usershaspersonalitydetail->pluck('personality_details_id')->toArray() : [];

                if (count($currentUserPersonalityDetails) > 0 && count($userPersonalityDetails) > 0) {
                    foreach ($currentUserPersonalityDetails as $cpd) {
                        if (in_array($cpd, $userPersonalityDetails)) {
                            array_push($currentUserPersonalityDetailsMatches, $cpd);
                        }
                    }

                    if (count($currentUserPersonalityDetailsMatches) > 0) {
                        $personalityScore = (100 / (count($currentUserPersonalityDetails)) * (count($currentUserPersonalityDetailsMatches))) * 0.3;
                        $score += $personalityScore;
                        $matchData['personality_score'] = $personalityScore;
                    }
                }

                // hobby details 40%
                $currentUserHobbyDetailsMatches = [];
                $userHobbyDetails = ($user->userhashobby) ? $user->userhashobby->pluck('hobbies_id')->toArray() : [];

                if (count($currentUserHobbyDetails) > 0 && count($userHobbyDetails) > 0) {
                    foreach ($currentUserHobbyDetails as $chd) {
                        if (in_array($chd, $userHobbyDetails)) {
                            array_push($currentUserHobbyDetailsMatches, $chd);
                        }
                    }

                    if (count($currentUserHobbyDetailsMatches) > 0) {
                        $hobbyScore = (100 / (count($currentUserHobbyDetails)) * (count($currentUserHobbyDetailsMatches))) * 0.4;
                        $score += $hobbyScore;
                        $matchData['hobby_score'] = $hobbyScore;
                    }
                }

                // Dob 10% is given if the user is within 3 years under or over     
                $userDob = new Carbon($currentUser->dob);
                $currentUserDob = new Carbon($user->dob);
                $difference = $userDob->diffInYears($currentUserDob, true);
                if ($difference < 5) {
                    $matchData['age_score'] = (10 - ($difference * 2));
                    $score += (10 - ($difference * 2));
                }

                if ($score >= $minScore) {
                    $matchData['total_score'] = $score;
                    $matchData['userId'] = $user->id;
                    $matchData['profile_pic'] = url('/') . '/' . $user->profile_pic;
                    $matchData['name'] = $user->name;
                    $matchData['email'] = $user->email;
                    $matchData['phone'] = $user->phone;
                    $matchData['gender'] = $user->gender;
                    $matchData['dob'] = $user->dob;
                    $matchData['prefered_gender'] = $user->prefered_gender;
                    $matchData['region'] = $user->userType->name;
                    $matchData['personalityIds'] = $currentUserPersonalityDetailsMatches;
                    $matchData['personality'] = (count($currentUserPersonalityDetailsMatches) > 0) ? PersonalityDetail::whereIn('id', $currentUserPersonalityDetailsMatches)->pluck('name')->toArray() : [];
                    $matchData['hobbyIds'] = $currentUserHobbyDetailsMatches;
                    $matchData['hobby'] = (count($currentUserHobbyDetailsMatches) > 0) ? Hobby::whereIn('id', $currentUserHobbyDetailsMatches)->pluck('name')->toArray() : [];
                    array_push($matches, $matchData);
                }
            }

            usort($matches, function($key = 'total_score'){
                return function ($a, $b) use ($key) {
                    return strnatcmp($a[$key], $b[$key]);
                };        
            });

            return [
                'success' => true,
                'data' => $matches
            ];
        } else {
            return [
                'success' => false,
                'data' => 'Invalid user ID'
            ];
        }
    }
}

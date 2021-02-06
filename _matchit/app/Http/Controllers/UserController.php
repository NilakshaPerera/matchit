<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use App\Hobby;
use App\PersonalityDetail;
use App\UserType;
use App\UserHasHobby;
use App\UsersHasPersonalityDetail;
use Auth;

use App\Channel;
use App\Status;
use App\User;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->roles_id == AppServiceProvider::Client) {

            return view('site.user')
                ->withUser(Auth::user())
                ->withHobbies(Hobby::all())
                ->withPersonalityDetails(PersonalityDetail::all())
                ->withUserTypes(UserType::all());
        } else {
          
            return view('admin.client.index')
                ->withRoles(Role::all())
                ->withUserTypes(UserType::all())
                ->withChannels(Channel::all())
                ->withStatus(Status::all());
        }
        
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
        try{

        
        $dateValidation = ['required', 'date'];

        if($request['roles_id'] && ( $request['roles_id'] == AppServiceProvider::Client))
        {
            array_push($dateValidation, 'before:-50 years');
        }
       
        $request->validate([
            'roles_id' => 'required|exists:roles,id',
            
            'address' => 'required|string',
            'channels_id' => 'required|exists:channels,id',
            'status_id'=> 'required|exists:status,id',

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'digits:12'],
            'dob' => $dateValidation,
            'users_types_id' => ['required', 'exists:user_types,id'],
        ],[
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
            'status_id'=> $request['status_id'],
            'channels_id'=> $request['channels_id'],
            'address'=> $request['address'],
        ]);


        return redirect()->back()->with('message', 'User Created Successfully!');
    } catch (Exception $ex) {
       
        Log::error($ex);
        return redirect()->back()->with('error', 'Something went wrong :(');
        $roles = role::all();

    }

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
     * Created By : Nilaksha 
     * Summary : shows edit form for user
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
    }

    /**
     * Created At : 5/2/2021
     * Created By : Nilaksha 
     * Summary : saved data for user
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

            if (Auth::user()->email != $request['email']) {
                array_push($emailValidation, 'unique:users');
            }

            if ($request['old_password']) {
                array_push($passwordValidation, 'required', 'string', 'min:8', 'confirmed');
                array_push($oldPasswordValidatoin, 'userpassword:' . Auth::user()->id);
            }

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => $emailValidation,
                'phone' => ['required', 'digits:12'],
                'address' => ['required', 'max:1000'],
                'birthday' => ['required', 'date', 'before:-50 years'],
                'user_type' => ['required', 'exists:user_types,id'],
                'old_password' => $oldPasswordValidatoin,
                'password' => $passwordValidation,
            ], [
                'birthday.before' => "The birthday must be a date before 50 years.",
                'old_password.userpassword' => "The old password is incorrect.",
            ]);

            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'dob' => $request['birthday'],
                'address' => $request['address'],
                'user_types_id'  => $request['user_type'],
                'status_id' => 1,
            ];

            if ($request['old_password']) {
                $data['password'] = Hash::make($request['password']);
            }

            User::where('id', $request['id'])->update($data);
            UserHasHobby::where('users_id', Auth::user()->id)->delete();

            foreach ($request['hobby-details'] as $hobbyDetail) {
                UserHasHobby::create([
                    'users_id' => Auth::user()->id,
                    'hobbies_id' => $hobbyDetail,
                ]);
            }

            UsersHasPersonalityDetail::where('users_id', Auth::user()->id)->delete();
            foreach ($request['personality-details'] as $personDetail) {
                UsersHasPersonalityDetail::create([
                    'users_id' => Auth::user()->id,
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
}

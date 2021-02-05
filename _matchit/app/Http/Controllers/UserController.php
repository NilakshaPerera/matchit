<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use App\Hobby;
use App\PersonalityDetail;
use App\UserType;
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
        if (Auth::user()->roles_id == AppServiceProvider::Client) {

            return view('site.user')
                ->withUser(Auth::user())
                ->withHobbies(Hobby::all())
                ->withPersonalityDetails(PersonalityDetail::all())
                ->withUserTypes(UserType::all());
        } else {
            return view('admin.users.user');
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
     * Created At : 5/2/2012
     * Created By : Nilaksha 
     * Summary : saved data for user
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        try {

            $emailValidation =  ['required', 'string', 'email', 'max:255'];
            $oldPasswordValidatoin = [];
            $passwordValidation = [];

            if (Auth::user()->email != $request['email']) {
                array_push($emailValidation, 'unique:users');
            }

            if ($request['old_password']) {
                array_push($passwordValidation, 'required', 'string', 'min:8', 'confirmed');
                array_push($oldPasswordValidatoin, 'userpassword:'. Auth::user()->id);
            }

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => $emailValidation,
                'phone' => ['required', 'digits:12'],
                'birthday' => ['required', 'date', 'before:-50 years'],
                'user_type' => ['required', 'exists:user_types,id'],
                'old_password' => $oldPasswordValidatoin,
                'password' => $passwordValidation,
            ], [
                'birthday.before' => "The birthday must be a date before 50 years.",
                'old_password.userpassword' => "The old password is incorrect.",
            ]);





            return redirect()->back()->with('message', 'Profile Updated Successfully!');

        } catch (Exception $ex) {
            Log::error($ex);
            return redirect()->back()->with('error', 'Something went wrong :(');
        }
    }
}

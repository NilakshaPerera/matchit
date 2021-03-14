<?php

namespace App\Http\Controllers;

use App\Hobby;
use Illuminate\Http\Request;
class HobbiesController extends Controller
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

    public function index()
    {
        return view('admin.hobby.index')->withHobbies(Hobby::all());
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:hobbies,name',
        ]);

        Hobby::create([
            'name' => $request['name'],
        ]);

        return redirect()->back()->with('message', 'Hobby Created Successfully!');
        
    }

    public function edit(Request $request)
    {
        $hobby = Hobby::where('id', $request['id'])->first();
        return view('admin.hobby.edit')
            ->withHobby($hobby);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:hobbies,name',
        ]);

        Hobby::where('id', $request['id'])->update([
            'name' =>  $request['name']
        ]);

        return redirect()->back()->with('message', 'Hobby Updated Successfully!');
    }
}
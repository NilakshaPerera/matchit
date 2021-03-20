<?php

namespace App\Http\Controllers;

use App\PersonalityDetail;
use Illuminate\Http\Request;
class PersonalityDetailController extends Controller
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
     * Created At : 23/02/2021
     * Created By : Mujitha 
     * Summary : Shows personality in personality index
     *
     * @param Request $request
     * @return void
     */
    public function index()
    {
        return view('admin.personality.index')->withPersonalities(PersonalityDetail::all());
    }

    /**
     * Created At : 23/02/2021
     * Created By : Mujitha 
     * Summary : Create new personality
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:personality_details,name',
        ]);

        PersonalityDetail::create([
            'name' => $request['name'],
        ]);

        return redirect()->back()->with('message', 'Personality Detail Created Successfully!');
        
    }

    /**
     * Created At : 23/02/2021
     * Created By : Mujitha 
     * Summary : Display personality when click edit button
     *
     * @param Request $request
     * @return void
     */
    public function edit(Request $request)
    {
        $personality = PersonalityDetail::where('id', $request['id'])->first();
        return view('admin.personality.edit')
            ->withPersonality($personality);
    }

    /**
     * Created At : 23/02/2021
     * Created By : Mujitha 
     * Summary : Update personality
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:personality_details,name',
        ]);

        PersonalityDetail::where('id', $request['id'])->update([
            'name' =>  $request['name']
        ]);

        return redirect()->back()->with('message', 'Personality Detail Updated Successfully!');
    }
}
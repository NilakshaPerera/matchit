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

    /**
     * Created At : 02/03/2021
     * Created By : Imesha 
     * Summary : Shows hobbies in hobby index
     *
     * @param Request $request
     * @return void
     */
    public function index()
    {
        return view('admin.hobby.index')->withHobbies(Hobby::all());
    }

    /**
     * Created At : 02/03/2021
     * Created By : Imesha 
     * Summary : Create new hobby
     *
     * @param Request $request
     * @return void
     */
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

    /**
     * Created At : 02/03/2021
     * Created By : Imesha 
     * Summary : Display hobbies when click edit button
     *
     * @param Request $request
     * @return void
     */
    public function edit(Request $request)
    {
        $hobby = Hobby::where('id', $request['id'])->first();
        return view('admin.hobby.edit')
            ->withHobby($hobby);
    }

    /**
     * Created At : 02/03/2021
     * Created By : Imesha 
     * Summary : Update Hobbies
     *
     * @param Request $request
     * @return void
     */
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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventType;

class EventTypeController extends Controller
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
     * Created At : 14/2/2021
     * Created By : Dulan 
     * Summary : Shows eventType in eventType index
     *
     * @param Request $request
     * @return void
     */
    public function index()
    {
        return view('admin.eventtype.index')->withEventTypes(EventType::all());
    }


    /**
     * Created At : 14/2/2021
     * Created By : Dulan 
     * Summary : Create new EventType
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:event_types,name',
        ]);

        EventType::create([
            'name' => $request['name'],
        ]);

        return redirect()->back()->with('message', 'Event Type Created Successfully!');
    }

    /**
     * Created At : 14/2/2021
     * Created By : Dulan 
     * Summary : Display EventType when click edit button
     *
     * @param Request $request
     * @return void
     */
    public function edit(Request $request)
    {
        $eventType = EventType::where('id', $request['id'])->first();
        return view('admin.eventtype.edit')
            ->withEventType($eventType);
    }

    /**
     * Created At : 14/2/2021
     * Created By : Dulan 
     * Summary : Update EventType
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:event_types,name',
        ]);

        EventType::where('id', $request['id'])->update([
            'name' =>  $request['name']
        ]);

        return redirect()->back()->with('message', 'Event Type Updated Successfully!');
    }
}

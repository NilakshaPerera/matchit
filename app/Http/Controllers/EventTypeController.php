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

    public function index()
    {
        return view('admin.eventtype.index')->withEventTypes(EventType::all());
    }


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

    public function edit(Request $request)
    {
        $eventType = EventType::where('id', $request['id'])->first();
        return view('admin.eventtype.edit')
            ->withEventType($eventType);
    }

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

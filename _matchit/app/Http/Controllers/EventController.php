<?php

namespace App\Http\Controllers;

use App\EventType;
use App\Event;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;

use Illuminate\Support\Facades\DB;


class EventController extends Controller
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
        $eventTypes = EventType::all();
        $events = Event::all();
        return view('admin.events.index')
            ->withEventTypes($eventTypes)
            ->withEvents($events);
    }

    /**
     * Created By : Nilaksha 
     * Created At : 4/2/2021
     * Summary : Store events in the datatable
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|max:255',
                'banner' => 'required|file',
                'event_types_id' => 'required|exists:event_types,id',
                'price' => 'required|numeric',
                'date' => 'required|date',
                'venue' => 'required|string',
            ]);

            $folderName = time() . '-' . rand();
            $fileName = time() . '-' . rand();

            $eventImage = $request->file('banner');

            $fileExtension = $eventImage->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/events/' . $folderName . '/', $eventImage, $fileName . '.' . $fileExtension);
            $eventImage = 'storage/events/' . $folderName . '/' . $fileName . '.' . $fileExtension;

            Event::create([
                'name' =>  $request['name'],
                'banner' =>  $eventImage,
                'event_types_id' => $request['event_types_id'],
                'price' => $request['price'],
                'date' => $request['date'],
                'venue' => $request['venue'],
            ]);

            return redirect()->back()->with('message', 'Event Created Successfully!');
    
        }catch(Exception $ex){
            Log::error($ex);
            return redirect()->back()->with('error', 'Something went wrong :(');
        }

    }
     /**
    * Created At : 3/1/2021
    * Created By : Nivetha 
    * Summary : shows edit form for events
    *
    * @param [type] $id
    * @return void
    */
    public function edit(Request $request)
    {
        $event = Event::where('id', $request['id'])->first();
        return view ('admin.events.edit')
            ->withEvent($event)
            ->withEventTypes(EventType::all());
            
    }

    public function update(Request $request)
    {

    try {
        DB::beginTransaction();
        $event = Event::where('id', $request['id'])->first();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'event_type' => ['required', 'exists:event_types,id'],
            'date' => ['required', 'date'],
            'price' => ['required','numeric'],
            'venue' => ['required', 'string'],

        ]);
            $data = [
            'name' => $request['name'],
            'event_types_id'  => $request['event_type'],
            'date' => $request['date'],
            'price' => $request['price'],
            'venue' => $request['venue'],
            ];

            Event::where('id', $event->id)->update($data);

            DB::commit();

            return redirect()->back()->with('message', 'Event Updated Successfully!');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
            return redirect()->back()->with('error', 'Something went wrong :(');
        }
    }

    /**
     * Created At : 7/2/2021
     * Created By : Nivetha
     * Summary : Read event details
    *
    * @param Request $request
    * @return void
    */    
    public function all(Request $request){

        return view('admin.events.view')
        ->withEvents(Event::all()) ;        
    }




}

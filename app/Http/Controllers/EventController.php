<?php
use App\Event;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function new_event(Request $request)
    {
        
        $data = new Event;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->date_happen = $request->date_happen;
        $data->save();
        $request->session()->flash('status_event','New Event Added');
        return back();
    }
}

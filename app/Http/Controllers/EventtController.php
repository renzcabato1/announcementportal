<?php

namespace App\Http\Controllers;
use App\Eventt;
use Illuminate\Http\Request;

class EventtController extends Controller
{
    //
    public function new_event(Request $request)
    {
        $attachment = $request->file('image_background');
        $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
        $name = time().'_'.$original_name;
        
        $attachment->move(public_path().'/upload_event/', $name);
        $file_name = '/upload_event/'.$name;
        $ext = pathinfo(storage_path().$file_name, PATHINFO_EXTENSION);
        $data = new Eventt;
        $data->title = $request->title;
        $data->image_path = $file_name;
        $data->description = $request->description;
        $data->date_happen = $request->date_happen;
        $data->add_by = auth()->user()->id;
        $data->save();
        $request->session()->flash('status','New Event Added');
        return back();
    }
    public function edit_event(Request $request, $id)
    {
        $data = Eventt::findOrfail($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->date_happen = $request->date_happen;
        $data->save();
        $request->session()->flash('status','Successfully Updated');
        return back();
    }
    public function delete_event(Request $request, $id)
    {
        $data = Eventt::findOrfail($id);
        $data->delete();
        $request->session()->flash('status','Successfully Deleted Event');
        return back();
    }
}

<?php

namespace App\Http\Controllers;
use App\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    //
    public function new_forum(Request $request)
    {
        $data = new Forum;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->add_by = auth()->user()->id;
        $data->save();
        $request->session()->flash('submit','4');
        $request->session()->flash('status_forum','New Forum Added');
        return back();
    }
    public function delete_forum(Request $request,$id)
    {
        $data = Forum::findOrFail($id);
        $data->delete();
        $request->session()->flash('submit','4');
        $request->session()->flash('status_forum','Successfully Delete forum!');
        return back();
    }
    public function edit_forum (Request $request,$id)
    {
        $data = Forum::findOrFail($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        $request->session()->flash('submit','4');
        $request->session()->flash('status_forum','Successfully Updated !');
        return back();
    }
}

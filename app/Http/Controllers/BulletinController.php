<?php

namespace App\Http\Controllers;
use App\Bulletin;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    //
    public function add_bulletin(Request $request)
    {
        $attachment = $request->file('attachment');
        $original_name = $attachment->getClientOriginalName();
        $name = time().'_'.$attachment->getClientOriginalName();
        $attachment->move(public_path().'/upload_pdf/', $name);
        $file_name = '/upload_pdf/'.$name;
        $data = new Bulletin;
        $data->title           = $request->title;
        $data->file_path       = $file_name;
        $data->file_name       = $original_name;
        $data->add_by          = auth()->user()->id;
        $data->save();
        $request->session()->flash('status_bulletin','Successfully Store New File');
        return back();
    }
    public function delete_bulletin(Request $request,$id)
    {
        $data = Bulletin::findOrFail($id);
        $data->delete();
        $request->session()->flash('submit','3');
        $request->session()->flash('status_bulletin','Successfully Delete Bulletin!');
        return back();
    }
}

<?php

namespace App\Http\Controllers;
use App\Headline;
use Illuminate\Http\Request;

class HeadlineController extends Controller
{
    //
    public function add_headline(Request $request)
    {
        $attachment = $request->file('attachment');
        $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
        $name = time().'_'.$original_name;
        
        $attachment->move(public_path().'/upload_headline/', $name);
        $file_name = '/upload_headline/'.$name;
        $ext = pathinfo(storage_path().$file_name, PATHINFO_EXTENSION);
        $type='image';
        
        $data = new Headline;
        $data->tile_url        = $file_name;
        $data->add_by          = auth()->user()->id ;
        $data->remove          = 0 ;
        $data->type            = $type ;
        $data->subject            = $request->subject ;
        $data->save();
        // $request->session()->flash('submit','2');
        $request->session()->flash('satus_headline','Successfully Store Image');
        return back();
    }
    public function remove_headline(Request $request, $id)
    {
        $data = Headline::findOrfail($id);
        $data->remove = 1;
        $data->save();
        $request->session()->flash('submit','2');
        $request->session()->flash('satus_headline','Successfully Remove Image/Video');
        return back();
        
    }
}

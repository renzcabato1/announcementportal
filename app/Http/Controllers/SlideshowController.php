<?php

namespace App\Http\Controllers;
use App\Slideshow;
use Illuminate\Http\Request;

class SlideshowController extends Controller
{
    //
    public function change_description(Request $request)
    {
        $data = Slideshow::first();
        $data->description = $request->description;
        $data->save();
        $request->session()->flash('submit','3');
        $request->session()->flash('status_description','Successfully Updated');
        return back();
    }
}

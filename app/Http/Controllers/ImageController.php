<?php

namespace App\Http\Controllers;
use App\Image;  
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function delete_image(Request $request,$id)
    {
        $image = Image::findorfail($id);
        $image->delete();
        $request->session()->flash('status','Successfully Deleted!');
        return back();   
    }
}

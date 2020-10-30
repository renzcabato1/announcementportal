<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function change_welcome_message(Request $request)
    {
        
        $data = Setting::first();
        $data->welcome_message = $request->welcome_message;
        $data->save();
        $request->session()->flash('status','Successfully Updated');
        return back();
    }
}

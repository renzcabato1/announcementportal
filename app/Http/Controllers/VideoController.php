<?php

namespace App\Http\Controllers;
use App\Video;
use App\Role_user;
use App\Employee;
use Storage;
use URL;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function new_video(Request $request)
    {
        $attachment = $request->file('attachment');
        $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
        $name = time().'_'.$original_name;
        
        $attachment->move(public_path().'/upload_headline/', $name);
        $file_name = '/upload_headline/'.$name;
        

        $frame = $request->file('frame');
        $original_name_frame = str_replace(' ', '',$frame->getClientOriginalName());
        $name_frame = time().'_'.$original_name_frame;
        
        $frame->move(public_path().'/upload_headline/', $name_frame);
        $file_name_frame = '/upload_headline/'.$name_frame;


        $data = new Video;
        $data->video_path        = $file_name;
        $data->video_frame        = $file_name_frame;
        $data->add_by          = auth()->user()->id ;
        $data->video_name            = $request->subject ;
        $data->save();
        // $request->session()->flash('submit','2');
        $request->session()->flash('satus_headline','Successfully Store Video');
        return back();
    }
    public function videos ()
    {
        $name = Employee::where('user_id',auth()->user()->id)
        ->leftJoin('hr_portal.department_employee as department_employee','employees.id','=','department_employee.employee_id')
        ->leftJoin('hr_portal.departments as departments','department_employee.department_id','=','departments.id')
        ->select('employees.*','departments.name as department_name')
        ->first();
        $role = Role_user::where('user_id',auth()->user()->id)->first();

        $videos = Video::get();
        return view('videos',array(
            'name' => $name,
            'role' => $role,
            'color' => 180,
            'videos' => $videos,
        ));
    }
    public function new_channel(Request $request)
    {
        $attachment = $request->file('attachment');
        $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
        $name = time().'_'.$original_name;
        
        $attachment->move(public_path().'/upload_video/', $name);
        $file_name = '/upload_video/'.$name;
        


        $data = new Video;
        $data->location        = $request->channel_name;
        $data->video_path        = $file_name;
        $data->save();
        $request->session()->flash('satus_headline','Successfully Store Video');
        return back();
    }

    public function edit_channel (Request $request,$video_id)
    {
        $data = Video::findOrfail($video_id);
        $attachment = $request->file('attachment');
        $original_name = str_replace(' ', '',$attachment->getClientOriginalName());
        $name = time().'_'.$original_name;
        
        $attachment->move(public_path().'/upload_video/', $name);
        $file_name = '/upload_video/'.$name;
        $data->location        = $request->channel_name;
        $data->video_path        = $file_name;
        $data->save();
        $request->session()->flash('satus_headline','Successfully Store Video');
        return back();
        
    }
    public function view_video (Request $request, $video_id)
    {
        $data = Video::findOrfail($video_id);

        
        return view('view_video',array(
            'data' => $data,
        ));
    }
}

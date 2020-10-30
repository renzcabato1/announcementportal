<?php

namespace App\Http\Controllers;
use App\Portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    //
    
    public function new_portal(Request $request)
    {
       
        $background_image = $request->file('background_image');
        $name_background_image = time().'_'.$background_image->getClientOriginalName();
        $background_image->move(public_path().'/portal_images/', $name_background_image);
        $file_name_bg = '/portal_images/'.$name_background_image;

        $icon_image = $request->file('icon_image');
        $name_icon_image = time().'_'.$icon_image->getClientOriginalName();
        $icon_image->move(public_path().'/portal_images/', $name_icon_image);
        $file_name_ic = '/portal_images/'.$name_icon_image;

        $data = new Portal;
        $data->title_portal =  $request->title;
        $data->link_portal =  $request->link;
        $data->image_background =  $file_name_bg;
        $data->image_icon =  $file_name_ic;
        $data->add_by = auth()->user()->id;
        $data->save();
        
        $request->session()->flash('submit','2');
        $request->session()->flash('status_portal','Successfully Enter New Portal!');
        return back();
    }
    public function delete_portal(Request $request,$id)
    {
        $data = Portal::findOrFail($id);
        $data->delete();
        
        $request->session()->flash('submit','2');
        $request->session()->flash('status_portal','Successfully Delete Portal!');
        return back();
    }
    public function save_update_portal(Request $request,$id)
    {
        if(($request->hasfile('background_image')) && ($request->hasfile('icon_image')))
        { 
            $background_image = $request->file('background_image');
            $name_background_image = time().'_'.$background_image->getClientOriginalName();
            $background_image->move(public_path().'/portal_images/', $name_background_image);
            $file_name_bg = '/portal_images/'.$name_background_image;
    
            $icon_image = $request->file('icon_image');
            $name_icon_image = time().'_'.$icon_image->getClientOriginalName();
            $icon_image->move(public_path().'/portal_images/', $name_icon_image);
            $file_name_ic = '/portal_images/'.$name_icon_image;
            $data = Portal::findOrFail($id);
            $data->title_portal = $request->title;
            $data->link_portal = $request->link;
            $data->image_background =  $file_name_bg;
            $data->image_icon =  $file_name_ic;
            $data->save();
    
        }
        else if($request->hasfile('background_image'))
        {
            $background_image = $request->file('background_image');
            $name_background_image = time().'_'.$background_image->getClientOriginalName();
            $background_image->move(public_path().'/portal_images/', $name_background_image);
            $file_name_bg = '/portal_images/'.$name_background_image;
    
            $data = Portal::findOrFail($id);
            $data->title_portal = $request->title;
            $data->link_portal = $request->link;
            $data->image_background =  $file_name_bg;
            $data->save();
        }
        else if($request->hasfile('icon_image'))
        {
         
  
    
            $icon_image = $request->file('icon_image');
            $name_icon_image = time().'_'.$icon_image->getClientOriginalName();
            $icon_image->move(public_path().'/portal_images/', $name_icon_image);
            $file_name_ic = '/portal_images/'.$name_icon_image;
            $data = Portal::findOrFail($id);
            $data->title_portal = $request->title;
            $data->link_portal = $request->link;
            $data->image_icon =  $file_name_ic;
            $data->save();
        }
        else
        {   
            $data = Portal::findOrFail($id);
            $data->title_portal = $request->title;
            $data->link_portal = $request->link;
            $data->save();
        }
       
        // 
        
        $request->session()->flash('submit','2');
        $request->session()->flash('status_portal','Successfully Updated Portal!');
        return back();
    }
}

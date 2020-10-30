<?php

namespace App\Http\Controllers;
use App\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    //
    public function delete_attachment(Request $request,$id)
    {
        $attachment = Attachment::findorfail($id);
        $attachment->delete();
        $request->session()->flash('status','Successfully Deleted!');
        return back();
    }
}

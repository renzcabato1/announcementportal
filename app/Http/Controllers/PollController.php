<?php

namespace App\Http\Controllers;
use App\Poll;
use App\Poll_choice;
use App\Poll_vote;
use Illuminate\Http\Request;

class PollController extends Controller
{
    //
    public function new_poll(Request $request)
    {
        $data = new Poll;
        $data->title = $request->title;
        $data->date_happen  = $request->date_happen;
        $data->add_by  = auth()->user()->id;
        $data->save();

        foreach($request->choices as $choice)
        {
            $data1 = new Poll_choice;
            $data1->poll_id = $data->id;
            $data1->choice = $choice;
            $data1->save();
        }
        
        $request->session()->flash('submit','4');
        $request->session()->flash('status_polls','Successfully added new Poll');
        return back();
    }
    public function delete_poll(Request $request, $id)
    {
        $data = Poll::findOrfail($id);
        $data->delete();
        
        $request->session()->flash('submit','4');
        $request->session()->flash('status_polls','Successfully Deleted Poll');
        return back();
    }
    public function vote_poll(Request $request, $id)
    {
        
        $data = new Poll_vote;
        $data->poll_choices_id = $request->choice;
        $data->vote_by = auth()->user()->id;
        $data->poll_id = $id;
        $data->save();
        
        $request->session()->flash('submit','4');
        $request->session()->flash('status_polls','Successfully Voted for '.$request->title);
        return back();

    }
    public function change_vote_poll(Request $request, $id)
    {
        $data = Poll_vote::where('poll_id',$id)->where('vote_by',auth()->user()->id)->first();
        $data->poll_choices_id = $request->choice;
        $data->save();
        
        $request->session()->flash('submit','4');
        $request->session()->flash('status_polls','Successfully Change Vote '.$request->title);
        return back();
    }
}

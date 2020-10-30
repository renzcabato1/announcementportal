<?php

namespace App\Http\Controllers;
use App\CancelResignation;
use App\UploadPdf;
use App\Account;
use App\ManageUser;
use Illuminate\Http\Request;
use URL;
use App\Notifications\CancelResignationNotif;
use App\Notifications\CancelResignationHr;
class CancelResignationController extends Controller
{
    //
    public function cancel_resignation(Request $request)
    {

        $attachment = $request->file('attachment');
        $name = time().'_'.$attachment->getClientOriginalName();
        $attachment->move(public_path().'/upload_pdf/', $name);

        $file_name = URL::asset('/upload_pdf/'.$name);
        $id = UploadPdf::where('user_id',auth()->user()->id)->where('cancel','=',null)->first();
        $new_request = new CancelResignation;
        $new_request->upload_pdf_id = $id->id;
        $new_request->upload_attach_cancel   = $file_name;
        $new_request->remarks = $request->cancel_resignation;
        $new_request->status = $request->null;
        $new_request->save();
        $supervisor = ManageUser::where('user_id',auth()->user()->id)
        ->leftJoin('hr_portal.users as users','manage_users.approver_id','=','users.id')
        ->select('users.email','users.name')
        ->get();
        foreach($supervisor as $visor)
        {
            $visor->notify(new CancelResignationNotif($visor));
        }
        $accounts = Account::where('role_id', 'like', '%4%')
        ->leftJoin('hr_portal.users as users','accounts.user_id','=','users.id')
        ->select('users.*')
        ->get();
        // dd($accounts);
        foreach($accounts as $account)
        {
            $account->notify(new CancelResignationHr($account));
        }

        $request->session()->flash('status_resignation','Already Sent your Cancellation Request!');
        return back();
    }
}

<?php

namespace App\Http\Controllers;
use App\Letter;
use Illuminate\Http\Request;
use URL;
use App\Employee;use App\View;
use App\Eventt;
use App\Headline;
use App\Video;
use App\Bulletin;
use App\ManageUser;
use App\Poll;
use App\PersonalInfo;
use App\User;
use App\UploadPdf;
use App\Notifications\UploadLetter;
use App\Notifications\UploadResignation;
class UploadPdfController extends Controller
{
    
    public function upload_pdf(Request $request)
    {
        // dd($request->all());
        $resignaccount = UploadPdf::where('user_id','=',auth()->user()->id)->where('cancel','=',null)->where('type','!=','Transfer')->first();
        if($resignaccount == null)
        {
            $upload_pdf = new UploadPdf;
            $upload_pdf->user_id = auth()->user()->id;
            $upload_pdf->action_by = auth()->user()->id;
            $upload_pdf->last_day = $request->last_day;
            $upload_pdf->type = "Resign";
            $upload_pdf->save();
            $id = $upload_pdf->id;
        }
        else
        {
            $id = $resignaccount->id;
        }
        $user = auth()->user();
        $supervisor = ManageUser::where('user_id',auth()->user()->id)
        ->leftJoin('hr_portal.users as users','manage_users.approver_id','=','users.id')
        ->select('users.email','users.name')
        ->get();
        
        $personal_info_data = PersonalInfo::where('user_id',auth()->user()->id)->first();
        if($personal_info_data == null)
        {
        $personal_info = new PersonalInfo;
        $personal_info->user_id = auth()->user()->id;
        $personal_info->email_add = $request->personal_email;
        $personal_info->mailing_address =  $request->mailing_address;
        $personal_info->landline = $request->landline;
        $personal_info->phone_number_landline =  $request->personal_landline;
        $personal_info->phone_number_mobile = $request->personal_mobile;
        $personal_info->last_date =  $request->last_day;
        $personal_info->last_date_work = $request->last_day_work;
        $personal_info->save();
        }
        else
        {
            $personal_info = PersonalInfo::where('user_id',auth()->user()->id)->first();
            $personal_info->email_add = $request->personal_email;
            $personal_info->mailing_address =  $request->mailing_address;
            $personal_info->landline = $request->landline;
            $personal_info->phone_number_landline =  $request->personal_landline;
            $personal_info->phone_number_mobile = $request->personal_mobile;
            $personal_info->last_date =  $request->last_day;
            $personal_info->last_date_work = $request->last_day_work;
            $personal_info->save();
        }
        if($request->hasFile('attachment'))
        {
        $attachment = $request->file('attachment');
        $original_name = $attachment->getClientOriginalName();
        $name = time().'_'.$attachment->getClientOriginalName();
        $attachment->move(public_path().'/upload_pdf/', $name);
        $file_name = URL::asset('/upload_pdf/'.$name);
        $data = new Letter;
        $data->upload_pdf_url   = $file_name;
        $data->upload_pdf_name  = $original_name;
        $data->upload_pdf_id    = $id;
        $data->save();
        $user->notify(new UploadResignation());
            foreach($supervisor as $visor)
            {
                $visor->notify(new UploadLetter($visor,$user,$request));
            }
        }
        $request->session()->flash('status_resignation','Successfully Uploaded your resignation!');
        return back();
    }
    public function resigned_view()
    {
        $name = Employee::where('user_id',auth()->user()->id)
        ->leftJoin('company_employee','employees.id','company_employee.employee_id')
        ->leftJoin('companies','company_employee.company_id','companies.id')
        ->leftJoin('department_employee','employees.id','department_employee.employee_id')
        ->leftJoin('departments','department_employee.department_id','departments.id')
        ->leftJoin('employee_location','employees.id','employee_location.employee_id')
        ->leftJoin('locations','employee_location.location_id','locations.id')
        ->select('employees.*','companies.name as company_name','departments.name as department_name','locations.name as location_name')
        ->first();

        $count_view_headlines = View::where('seen_by',auth()->user()->id)->where('type','headlines')->first();
        $count_view_bulletin = View::where('seen_by',auth()->user()->id)->where('type','bulletin')->first();
        $count_view_polls = View::where('seen_by',auth()->user()->id)->where('type','polls')->first();
        $count_view_events = View::where('seen_by',auth()->user()->id)->where('type','events')->first();

        $upcomming_events = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','desc')->get();
        $upcomming_eventsa = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','asc')->get();
        $past_events = Eventt::whereDate('date_happen','<=',date('Y-m-d'))->orderBy('date_happen','desc')->get();
        if($count_view_headlines)
        {
            $count_headlines = Headline::where('updated_at','>',$count_view_headlines->created_at)->count();
            $count_video = Video::where('updated_at','>',$count_view_headlines->created_at)->count();
        }
        else
        {
            $count_headlines = Headline::count();
            $count_video = Video::count();
        }
        if($count_view_bulletin)
        {
            $count_bulletin = Bulletin::where('updated_at','>',$count_view_bulletin->created_at)->count();
        }
        else
        {
            $count_bulletin = Bulletin::count();
        }
        if($count_view_polls)
        {
            $count_polls= Poll::where('updated_at','>',$count_view_polls->created_at)->count();
        }
        else
        {
            $count_polls = Poll::count();
        }
        if($count_view_events)
        {
            $count_events= Eventt::where('updated_at','>',$count_view_events->created_at)->count();
        }
        else
        {
            $count_events = Eventt::count();
        }

        $personal_info = PersonalInfo::where('user_id',auth()->user()->id)->first();

        return view('clearance_view',array(
            'name' => $name,
            'count_headlines' => $count_headlines,
            'count_video' => $count_video,
            'count_bulletin' => $count_bulletin,
            'count_polls' => $count_polls,
            'count_events' => $count_events,
            'upcomming_eventsa' => $upcomming_eventsa,
            'personal_info' => $personal_info,
            'color' => 180,
        )
        );
    }
}

<?php

namespace App\Http\Controllers;
use App\Eventt;
use App\Headline;
use App\Video;
use App\Bulletin;
use App\ManageUser;
use App\Poll;
use App\PersonalInfo;
use App\Employee;
use App\Accountability;
use App\EmployeeAccountability;
use App\Billing;
use App\BillUpload;
use App\View;
use App\AssignHead;
use App\ExcessUsage;
use App\Notifications\ForApprovalNotif;
use App\Notifications\VerifiedNotif;
use App\User;
use DB;
use App\UploadPdf;
use Illuminate\Http\Request;

class AccountabilityController extends Controller
{
    //
    public function globebilling ()
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

        $employee_bu_head = AssignHead::with('employee_head_info')->where('employee_id',auth()->user()->employee()->id)->where('head_id',4)->first();

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

        $accountability = EmployeeAccountability::
        with('inventory_info')->
        where('user_id',auth()->user()->id)->get();
        $bill = [];

        foreach($accountability as $key => $acc)
        {
            
            $billings = BillUpload::with('upload_info','excessusage')->where('content','like','%'.$acc->inventory_info->service_number.'%')->orderBy('created_at','desc')->get();
            $bill[] = $billings; 

        }
    
        $for_approval = ExcessUsage::with('bill_upload_info')->
        where('approver_id',auth()->user()->id)->where('status','=','Pending')->count();
       


        return view('accountabilities',array(
            'name' => $name,
            'count_headlines' => $count_headlines,
            'count_video' => $count_video,
            'count_bulletin' => $count_bulletin,
            'count_polls' => $count_polls,
            'count_events' => $count_events,
            'upcomming_eventsa' => $upcomming_eventsa,
            'color' => 180,
            'accountabilities' =>  $accountability,
            'bill' =>  $bill,
            'employee_bu_head' =>  $employee_bu_head,
            'for_approval' => $for_approval,
        )
        );
    }
    public function submit_excess(Request $request,$id)
    {
        $existing_data = ExcessUsage::where('bill_upload_id',$id)->first();
        if($existing_data == null)
        {
            $excess_usage = new ExcessUsage;
            $excess_usage->bill_upload_id = $id;
            $excess_usage->approver_id = $request->approver_id;
            $excess_usage->official_business = $request->official_business;
            $excess_usage->personal_expense = $request->personal_expense;
            $excess_usage->remarks = $request->reason;
            $excess_usage->created_by = $request->approver_id;
            $excess_usage->status = "Pending";
            $excess_usage->save();
        }
        else
        {
            $existing_data->approver_id = $request->approver_id;
            $existing_data->official_business = $request->official_business;
            $existing_data->personal_expense = $request->personal_expense;
            $existing_data->remarks = $request->reason;
            $existing_data->created_by = auth()->user()->id;
            $existing_data->status = "Pending";
            $existing_data->save();
        }
        $total = $request->personal_expense+$request->official_business;
        $user = User::where('id',$request->approver_id)->first();
        // dd($user);
        $user->notify(new ForApprovalNotif($request,$total));
        $request->session()->flash('status','Successfully Submitted');
        return back();
    }
    public function for_approval(Request $request)
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

        $employee_bu_head = AssignHead::with('employee_head_info')->where('employee_id',auth()->user()->employee()->id)->where('head_id',4)->first();

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

        $for_approval = ExcessUsage::with('bill_upload_info')->
        where('approver_id',auth()->user()->id)->where('status','=','Pending')->get();
       
    
        return view('for_approval',array(
            'name' => $name,
            'count_headlines' => $count_headlines,
            'count_video' => $count_video,
            'count_bulletin' => $count_bulletin,
            'count_polls' => $count_polls,
            'count_events' => $count_events,
            'upcomming_eventsa' => $upcomming_eventsa,
            'color' => 180,
            'for_approval' =>  $for_approval,
        )
        );
    }
    public function verify_excess (Request $request, $id)
    {
        $existing_data = ExcessUsage::where('id',$id)->first();
        // dd($existing_data);
        // $existing_data->approver_id = $request->approver_id;
        $existing_data->official_business_verified = $request->official_business;
        $existing_data->personal_expense_verified = $request->personal_expense;
        $existing_data->approver_remarks = $request->reason;
        $existing_data->date_verified = date('Y-m-d');
        $existing_data->status = "Verified";
        $existing_data->save();

        $total = $request->personal_expense+$request->official_business;
        $user = User::where('id',$existing_data->created_by)->first();
        // dd($user);
        $user->notify(new VerifiedNotif());
        $request->session()->flash('status','Successfully Verified');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\View;
use App\Eventt;
use App\Headline;
use App\Video;
use App\Bulletin;
use App\Poll;
use App\Comp;
use App\Dept;
use App\InfoEmployee;
use App\LimitSurvey;
use App\SurveyChoice;
use App\SurveySubChoice;
use App\SurveySubSubChoice;
use App\SurveySubSubSubChoice;
use App\SurveySubSubSubSubChoice;

class SurveyLimitController extends Controller
{
    //
    public function survey(Request $request)
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
        $upcomming_eventsa = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','asc')->get();
        $company = Comp::orderBy('name','asc')->get();
        $departments = Dept::orderBy('name','asc')->get();
      
        return view('survey_hr',array(
            'name' => $name,
            'upcomming_eventsa' => $upcomming_eventsa,
            'color' => 180,
            'companies' => $company,
            'departments' => $departments,
        )
        );
    }
    public function surveyRnD()
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
        $upcomming_eventsa = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','asc')->get();
        $company = Comp::orderBy('name','asc')->get();
        $departments = Dept::orderBy('name','asc')->get();
        return view('survey_rnd',array(
            'name' => $name,
            'upcomming_eventsa' => $upcomming_eventsa,
            'color' => 180,
            'companies' => $company,
            'departments' => $departments,
        )
        );
    }
    public function surveyHr()
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
        $upcomming_eventsa = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','asc')->get();
        $company = Comp::orderBy('name','asc')->get();
        $departments = Dept::orderBy('name','asc')->get();
      
        return view('survey_hr',array(
            'name' => $name,
            'upcomming_eventsa' => $upcomming_eventsa,
            'color' => 180,
            'companies' => $company,
            'departments' => $departments,
        )
        );
    }
    public function add_survey(Request $request)
    {
        // dd($request->all());
        // dd(json_decode($request->answer1));
        $info = New InfoEmployee;
        $info->user_id = auth()->user()->id;
        $info->department = $request->department;
        $info->location = $request->location;
        $info->status = $request->status;
        $info->save();
        foreach($request->question as $key => $question)
        {
            $questionDetails = new LimitSurvey;
            $questionDetails->description= $question;
            $questionDetails->employee_answer = $request->answer[$key];
            $questionDetails->user_id = auth()->user()->id;
            $questionDetails->save();
        }
         
        
        
        $request->session()->flash('messsage_survey','Thank you so much and we appreciate you help in answering these questions! Stay safe, always wear your mask and observe social distancing!');
        return redirect('/');
    }
    public function view_report()
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

        return view('survey_report',array(
            'name' => $name,
            'upcomming_eventsa' => $upcomming_eventsa,
            'color' => 180,
        )
        );
    }
    public function reports ()
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
        $reports = InfoEmployee::with('surveys','info.EmployeeCompany','info.EmployeeDepartment','info.EmployeeLocation')->get();
        $upcomming_eventsa = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','asc')->get();
        $company = Comp::orderBy('name','asc')->get();
        $departments = Dept::orderBy('name','asc')->get();
        return view('reports',array(
            'name' => $name,
            'color' => 180,
            'upcomming_eventsa' => $upcomming_eventsa,
            'reports' => $reports,
            // 'companies' => $company,
            // 'departments' => $departments,
        )
        );
    }
}

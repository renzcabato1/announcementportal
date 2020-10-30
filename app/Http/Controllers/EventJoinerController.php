<?php

namespace App\Http\Controllers;
use App\EventJoiner;
use Illuminate\Http\Request;
use PDF;
use App\Eventt;
class EventJoinerController extends Controller
{
    //
    public function join_event(Request $request,$event_id)
    {
        $event_joiner = new EventJoiner;
        $event_joiner->event_id = $event_id;
        $event_joiner->user_id = auth()->user()->id;
        $event_joiner->save();
        $request->session()->flash('status','Successfully join');
        return back();
    }
    public function view_joiner($event_id)
    {
        $event_joiner = EventJoiner::where('event_id',$event_id)
        ->leftJoin('hr_portal.employees','event_joiners.user_id','employees.user_id')
        ->leftJoin('hr_portal.company_employee','employees.id','company_employee.employee_id')
        ->leftJoin('hr_portal.companies','company_employee.company_id','companies.id')
        ->leftJoin('hr_portal.department_employee','employees.id','department_employee.employee_id')
        ->leftJoin('hr_portal.departments','department_employee.department_id','departments.id')
        ->leftJoin('hr_portal.employee_location','employees.id','employee_location.employee_id')
        ->leftJoin('hr_portal.locations','employee_location.location_id','locations.id')
        ->select('employees.first_name','employees.last_name','companies.name as company_name','departments.name as department_name','locations.name as location_name')
        ->get();

        $event_title = Eventt::findOrfail($event_id);

        $pdf = PDF::loadView('view_joiner',array
        (
            'event_joiner' => $event_joiner,
            'event_title' => $event_title,
        )); 
        return $pdf->stream('joiner.pdf');
    }
}

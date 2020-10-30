<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Announcement;
use App\Image;
use App\Role_user;
use App\Attachment;
use App\Account;
use App\Portal;
use App\Bulletin;
use App\Forum;
use App\Eventt;
use App\Setting;
use App\Slideshow;
use Carbon\Carbon;
use App\Poll;
use App\Poll_choice;
use App\Poll_vote;
use App\Headline;
use App\User;
use App\Letter;
use App\UploadPdf;
use App\Video;
use App\View;
use App\UploadVideo;
use App\EventJoiner;
// use App\{
//     Employee,
//     Announcement,

// };

use DB;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //
    public function announcement_view()
    {
        
        $monthtoday = date('m');
        $date_today = date('Y-m-d');
        $name_of_month =  date(('F'),strtotime($date_today));
        $today = date('m-d');
        $employees = Employee::whereMonth('birthdate', '=', $monthtoday)
        ->where('status','Active')
        ->leftJoin('users', 'employees.user_id', '=', 'users.id')
        ->select('employees.*', 'users.name AS birthday_name')
        ->orderByRaw('DAYOFMONTH(birthdate)')
        ->orderBy('birthday_name', 'asc')
        ->get();

        $announcements = DB::select('call p_announcements(\''.$date_today.'\')');//need to change for the future
        $roles = Role_user::where('user_id',auth()->user()->id)->get(['role_id']);
        $id_of_announcement = array_pluck($announcements, 'id');
        $images = Image::whereIn('announcement_id',$id_of_announcement)->get();
        $attachments = Attachment::whereIn('announcement_id',$id_of_announcement)->get();
        $accounts = Account::whereIn('announcement_id',$id_of_announcement) 
        ->groupBy('seen_by','announcement_id')
        ->get(['seen_by','announcement_id']);

        $id_of_accounts = array_unique(array_pluck($accounts, 'seen_by'));
        $employees_avatar = Employee::whereIn('user_id', $id_of_accounts)
        ->leftJoin('users','employees.user_id','=','users.id')
        ->select('users.name as employee_name','employees.id','employees.user_id')
        ->get();

        $id_of_images = array_pluck($images, 'announcement_id');
        $id_of_attachments = array_pluck($attachments, 'announcement_id');
        $id_of_seen_by = array_pluck($accounts, 'announcement_id');
        $employees_avatar_id = array_pluck($employees_avatar, 'user_id');
        $employees_birthday = collect($employees)->toArray(); 
    
        return view('welcome',array
        ( 
            'employees' => $employees,
            'today' => $today,
            'announcements' => $announcements,
            'images' => $images,
            'attachments' => $attachments,
            'id_of_images' => $id_of_images,
            'id_of_attachments' => $id_of_attachments,
            'roles' => $roles,
            'name_of_month' => $name_of_month,
            'accounts' => $accounts,
            'employees_avatars' => $employees_avatar,
            'id_of_accounts' => $id_of_accounts,
            'id_of_seen_by' => $id_of_seen_by,
            'employees_avatar_id' => $employees_avatar_id,
        )); 
    }
    public function new_announcement(Request $request)
    {
        
        $this->validate(request(),[
            'image.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'attachment.*'  => 'max:100000',    
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date',
            ]    
        ); 
        
        $data = new Announcement;
        
        $data->start_date   = $request->start_date;  
        $data->end_date     = $request->end_date;  
        $data->title        = $request->title;  
        $data->description  = $request->description;     
        $data->post_by      = auth()->user()->id;
        $data->delete_na    = 0;
        $data->save();
        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $original_name = $image->getClientOriginalName();
                $name = time().'_'.$image->getClientOriginalName();
                $image->move(public_path().'/upload_images/', $name);
                
                $file_name = '/upload_images/'.$name;
                
                $data1 = new Image;
                $data1->announcement_id = $data->id;
                $data1->file_path       = $file_name;
                $data1->file_name       = $original_name;
                $data1->save();
            }
        }
        if($request->hasfile('attachment'))
        {
            foreach($request->file('attachment') as $attachment)
            {
                $original_name = $attachment->getClientOriginalName();
                $name = time().'_'.$attachment->getClientOriginalName();
                $attachment->move(public_path().'/upload_attachments/', $name); 
                $file_name = '/upload_attachments/'.$name; 
                $data2 = new Attachment;
                $data2->announcement_id = $data->id;
                $data2->file_path       = $file_name;
                $data2->file_name       = $original_name;
                $data2->save();
            }
        }

        $request->session()->flash('status','Successfully Posted!');
        return back();
    }
    public function delete_announcement(Request $request,$id)
    {
        $announcement = Announcement::findorfail($id);
        $date = date('Y-m-d h:m:s');

        $announcement->delete_na = 1;
        $announcement->delete_date = $date;
        $announcement->save();
        $request->session()->flash('status','Successfully Deleted!');
        return back();

    }
    public function edit_announcement($id)
    {
        $announcement = Announcement::findorfail($id);
        $monthtoday = date('m');
        $date_today = date('Y-m-d');
        $name_of_month =  date(('F'),strtotime($date_today));
        $today = date('m-d');

        $images = Image::where('announcement_id',$id)->get();
        $attachments = Attachment::where('announcement_id',$id)->get();
        $employees = Employee::whereMonth('birthdate', '=', $monthtoday)
        ->leftJoin('users', 'employees.user_id', '=', 'users.id')
        ->select('employees.*', 'users.name AS birthday_name')
        ->orderByRaw('DAYOFYEAR(birthdate)')
        ->orderBy('birthday_name', 'asc')
        ->get();
        return view('edit_announcement',array
        (
            'announcement' => $announcement,
            'name_of_month' => $name_of_month,
            'employees' => $employees,
            'today' => $today,
            'images' => $images,
            'attachments' => $attachments,
            
        )); 
    }
    public function save_edit_announcement(Request $request,$id)
    {
        $this->validate(request(),[
            'image.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'attachment.*'  => 'max:100000',    
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date',
            ]    
        ); 
        
        $data = Announcement::findorfail($id);
        $data->start_date   = $request->start_date;  
        $data->end_date     = $request->end_date;  
        $data->title        = $request->title;  
        $data->description  = $request->description;     
        $data->post_by      = auth()->user()->id;
        $data->delete_na    = 0;
        $data->save();
        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $original_name = $image->getClientOriginalName();
                $name = time().'_'.$image->getClientOriginalName();
                $image->move(public_path().'/upload_images/', $name);
                
                $file_name = '/upload_images/'.$name;
                
                $data1 = new Image;
                $data1->announcement_id = $data->id;
                $data1->file_path       = $file_name;
                $data1->file_name       = $original_name;
                $data1->save();
            }
        }
        if($request->hasfile('attachment'))
        {
            foreach($request->file('attachment') as $attachment)
            {
                $original_name = $attachment->getClientOriginalName();
                $name = time().'_'.$attachment->getClientOriginalName();
                $attachment->move(public_path().'/upload_attachments/', $name); 
                $file_name = '/upload_attachments/'.$name; 
                $data2 = new Attachment;
                $data2->announcement_id = $data->id;
                $data2->file_path       = $file_name;
                $data2->file_name       = $original_name;
                $data2->save();
            }
        }

        $request->session()->flash('status','Successfully Updated!');
        return back();
    }
    public function home_page()
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
        
        $monthtoday = date('m');
        $date_today = date('Y-m-d');
        $date_minimum = date('Y-m-d\TH:i');
        $name_of_month =  date(('F'),strtotime($date_today));
        $today = date('m-d');
        $employees = Employee::whereMonth('birthdate', '=', $monthtoday)
        ->where('status','Active')
        ->leftJoin('users', 'employees.user_id', '=', 'users.id')
        ->select('employees.*', 'users.name AS birthday_name')
        ->orderByRaw('DAYOFYEAR(birthdate)')
        ->orderBy('birthday_name', 'asc')
        ->get();

        $role = Role_user::where('user_id',auth()->user()->id)->first();
        $employees_birthday = collect($employees)->toArray(); 
        $welcome = Setting::first();
        $slideshow = Slideshow::first();

        $portals = Portal::orderBy('title_portal','asc')->get();        
        $bulletins = Bulletin::orderBy('created_at','desc')->get();
        $forums = Forum::orderBy('created_at','desc')->get();
        $events = Eventt::whereDate('date_happen','>=',$date_today)->orderBy('created_at','desc')->get();
        $polls = Poll::whereDate('date_happen','>=',$date_today)->orderBy('created_at','desc')->get();
        $date_a = date('Y-m-d', strtotime('-1 week', strtotime($date_today)));
        $headlines = Headline::whereDate('created_at','>=',$date_a)->where('remove',0)->orderBy('created_at','desc')
        ->get();

        $headlines_array = collect($headlines->pluck('add_by'))->toArray();
        $users = User::whereIn('id',$headlines_array)->get();
        $users_array = collect($users)->toArray();
        
        $polls_id = Poll::orderBy('created_at','desc')->get()->pluck('id');
        $polls_id = collect($polls_id)->toArray(); 
        $poll_choices = Poll_choice::whereIn('poll_id',$polls_id)->get();
        $poll_choices_id = Poll_choice::whereIn('poll_id',$polls_id)->get()->pluck('id');
        $poll_choices_id = collect($poll_choices_id)->toArray();
        $poll_votes = DB::table('poll_votes')
        ->whereIn('poll_choices_id',$poll_choices_id)
        ->select(DB::raw('count(*) as num'),'poll_votes.poll_choices_id','poll_votes.poll_id')
        ->groupBy('poll_choices_id','poll_id')
        ->get();

        $poll_votes_a = Poll_vote::whereIn('poll_id',$polls_id)->where('vote_by',auth()->user()->id )->get();
        $poll_votes_vote = Poll_vote::whereIn('poll_id',$polls_id)->where('vote_by',auth()->user()->id )->get()->pluck('poll_id');
        $poll_votes_vote = collect($poll_votes_vote)->toArray(); 

        $resigned = UploadPdf::where('user_id','=',auth()->user()->id)
        ->leftJoin('cancel_resignations','upload_pdfs.id','=','cancel_resignations.upload_pdf_id')
        ->leftJoin('letters','upload_pdfs.id','=','letters.upload_pdf_id')
        ->leftJoin('surveys','upload_pdfs.id','=','surveys.upload_pdf_id')
        ->select('upload_pdfs.id as upload_pdfs_id','surveys.id as survey_id','surveys.upload_pdf_id as server_upload_pdf_id','surveys.*','upload_pdfs.*','cancel_resignations.*','letters.id as letters_id','letters.upload_pdf_name as letters_pdf_name','letters.upload_pdf_url as pdf_url')
        ->orderBy('cancel_resignations.id','desc')
        ->orderBy('upload_pdfs.id','desc')
        ->orderBy('letters_id','desc')
        ->where('cancel','=',null)
        ->first();
        
        // dd($resigned);
        // dd($resigned);
        return view('home_announcement',array(
            'name' => $name,
            'portals' => $portals,
            'welcome' => $welcome,
            'bulletins' => $bulletins,
            'slideshow' => $slideshow,
            'forums' => $forums,
            'events' => $events,
            'date_minimum' => $date_minimum,
            'name_of_month' => $name_of_month,
            'employees' => $employees,
            'today' => $today,
            'date_today' => $date_today,
            'polls' => $polls,
            'poll_choices' => $poll_choices,
            'poll_votes' => $poll_votes,
            'poll_votes_vote' => $poll_votes_vote,
            'poll_votes_a' => $poll_votes_a,
            'headlines' => $headlines,
            'role' => $role,
            'users' => $users_array,
            'resigned' => $resigned,
        ));
    }
    public function portal_links()
    {
        $name = Employee::where('user_id',auth()->user()->id)
        ->leftJoin('hr_portal.department_employee as department_employee','employees.id','=','department_employee.employee_id')
        ->leftJoin('hr_portal.departments as departments','department_employee.department_id','=','departments.id')
        ->select('employees.*','departments.name as department_name')
        ->first();

        $role = Role_user::where('user_id',auth()->user()->id)->first();
        $portals = Portal::orderBy('id','asc')->get();        
        $count_view_headlines = View::where('seen_by',auth()->user()->id)->where('type','headlines')->first();
        $count_view_bulletin = View::where('seen_by',auth()->user()->id)->where('type','bulletin')->first();
        $count_view_polls = View::where('seen_by',auth()->user()->id)->where('type','polls')->first();
        $count_view_events = View::where('seen_by',auth()->user()->id)->where('type','events')->first();
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
        
        $upcomming_events = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','asc')->get();
        // dd($count_video+$count_headlines);
        return view('portal_links',array(
            'name' => $name,
            'portals' => $portals,
            'role' => $role,
            'count_headlines' => $count_headlines,
            'count_video' => $count_video,
            'count_bulletin' => $count_bulletin,
            'count_polls' => $count_polls,
            'count_events' => $count_events,
            'upcomming_eventsa' => $upcomming_events,
            'color' => 180,
        ));
    }
    public function headlines()
    {
        $name = Employee::where('user_id',auth()->user()->id)
        ->leftJoin('hr_portal.department_employee as department_employee','employees.id','=','department_employee.employee_id')
        ->leftJoin('hr_portal.departments as departments','department_employee.department_id','=','departments.id')
        ->select('employees.*','departments.name as department_name')
        ->first();

        $date_today = date('Y-m-d');
        $headline_view = View::where('type','=','headlines')->where('seen_by','=',auth()->user()->id)->first();
        if($headline_view)
        {   
            $headline_view->seen_time_date = date('Y-m-d H:i:s');
            $headline_view->save();
        }
        else
        {
            $new_headline_view = new View;
            $new_headline_view->type = 'headlines';
            $new_headline_view->seen_by = auth()->user()->id;
            $new_headline_view->seen_time_date = date('Y-m-d H:i:s');
            $new_headline_view->save();
        }
        $count_view_headlines = View::where('seen_by',auth()->user()->id)->where('type','headlines')->first();
        $count_view_bulletin = View::where('seen_by',auth()->user()->id)->where('type','bulletin')->first();
        $count_view_polls = View::where('seen_by',auth()->user()->id)->where('type','polls')->first();
        $count_view_events = View::where('seen_by',auth()->user()->id)->where('type','events')->first();
        if($count_view_headlines)
        {
            $count_headlines = Headline::where('updated_at','>',$count_view_headlines->created_at)->count();
            $count_video = UploadVideo::where('updated_at','>',$count_view_headlines->created_at)->count();
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
        
        $role = Role_user::where('user_id',auth()->user()->id)->first();
        $date_a = date('Y-m-d', strtotime('-1 week', strtotime($date_today)));
        $headlines = Headline::whereDate('created_at','>=',$date_a)->where('remove',0)->orderBy('created_at','desc')
        ->get();
        $headlines_array = collect($headlines->pluck('add_by'))->toArray();
        $users = User::whereIn('id',$headlines_array)->get();
        $users_array = collect($users)->toArray();
        $upcomming_events = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','asc')->get();
        $videos = UploadVideo::orderBy('id','desc')->get();
        return view('headlines',array(
            'name' => $name,
            'date_today' => $date_today,
            'headlines' => $headlines,
            'role' => $role,
            'users' => $users_array,
            'videos' => $videos,
            'count_headlines' => $count_headlines,
            'count_video' => $count_video,
            'count_bulletin' => $count_bulletin,
            'count_polls' => $count_polls,
            'count_events' => $count_events,
            'upcomming_eventsa' => $upcomming_events,
            'color' => 180,
        ));
    }
    public function bulletins()
    {
        $date_today = date('Y-m-d');
        $name = Employee::where('user_id',auth()->user()->id)
        ->leftJoin('hr_portal.department_employee as department_employee','employees.id','=','department_employee.employee_id')
        ->leftJoin('hr_portal.departments as departments','department_employee.department_id','=','departments.id')
        ->select('employees.*','departments.name as department_name')
        ->first();
        $bulletin_view = View::where('type','=','bulletin')->where('seen_by','=',auth()->user()->id)->first();
        if($bulletin_view)
        {   
            $bulletin_view->seen_time_date = date('Y-m-d H:i:s');
            $bulletin_view->save();
        }
        else
        {
            $new_bulletin_view= new View;
            $new_bulletin_view->type = 'bulletin';
            $new_bulletin_view->seen_by = auth()->user()->id;
            $new_bulletin_view->seen_time_date = date('Y-m-d H:i:s');
            $new_bulletin_view->save();
        }
        
        $count_view_headlines = View::where('seen_by',auth()->user()->id)->where('type','headlines')->first();
        $count_view_bulletin = View::where('seen_by',auth()->user()->id)->where('type','bulletin')->first();
        $count_view_polls = View::where('seen_by',auth()->user()->id)->where('type','polls')->first();
        $count_view_events = View::where('seen_by',auth()->user()->id)->where('type','events')->first();
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
        $role = Role_user::where('user_id',auth()->user()->id)->first();
        $date_a = date('Y-m-d', strtotime('-1 week', strtotime($date_today)));
        $bulletins = Bulletin::whereDate('created_at','>=',$date_a)->orderBy('created_at','desc')->get();
        $upcomming_events = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','asc')->get();
        return view('bulletins',array(
            'name' => $name,
            'bulletins' => $bulletins,
            'role' => $role,
            'count_headlines' => $count_headlines,
            'count_video' => $count_video,
            'count_bulletin' => $count_bulletin,
            'count_polls' => $count_polls,
            'count_events' => $count_events,
            'upcomming_eventsa' => $upcomming_events,
            'color' => 180,
            
        ));
    }
    public function polls()
    {
        $name = Employee::where('user_id',auth()->user()->id)
        ->leftJoin('hr_portal.department_employee as department_employee','employees.id','=','department_employee.employee_id')
        ->leftJoin('hr_portal.departments as departments','department_employee.department_id','=','departments.id')
        ->select('employees.*','departments.name as department_name')
        ->first();

        $role = Role_user::where('user_id',auth()->user()->id)->first();
        $polls = Poll::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('created_at','desc')->get();
        $polls_id = Poll::orderBy('created_at','desc')->get()->pluck('id');
        $polls_id = collect($polls_id)->toArray(); 
        $poll_choices = Poll_choice::whereIn('poll_id',$polls_id)->get();
        $poll_choices_id = Poll_choice::whereIn('poll_id',$polls_id)->get()->pluck('id');
        $poll_choices_id = collect($poll_choices_id)->toArray();
        $poll_votes = DB::table('poll_votes')
        ->whereIn('poll_choices_id',$poll_choices_id)
        ->select(DB::raw('count(*) as num'),'poll_votes.poll_choices_id','poll_votes.poll_id')
        ->groupBy('poll_choices_id','poll_id')
        ->get(); 
        $poll_collect = collect($poll_votes)->toArray();

        $polls_view = View::where('type','=','polls')->where('seen_by','=',auth()->user()->id)->first();
        if($polls_view)
        {   
            $polls_view->seen_time_date = date('Y-m-d H:i:s');
            $polls_view->save();
        }
        else
        {
            $new_polls_view= new View;
            $new_polls_view->type = 'polls';
            $new_polls_view->seen_by = auth()->user()->id;
            $new_polls_view->seen_time_date = date('Y-m-d H:i:s');
            $new_polls_view->save();
        }
        
        $poll_votes_a = Poll_vote::whereIn('poll_id',$polls_id)->where('vote_by',auth()->user()->id )->get();
        $poll_votes_vote = Poll_vote::whereIn('poll_id',$polls_id)->where('vote_by',auth()->user()->id )->get()->pluck('poll_id');
        $poll_votes_vote = collect($poll_votes_vote)->toArray(); 
        $count_view_headlines = View::where('seen_by',auth()->user()->id)->where('type','headlines')->first();
        $count_view_bulletin = View::where('seen_by',auth()->user()->id)->where('type','bulletin')->first();
        $count_view_polls = View::where('seen_by',auth()->user()->id)->where('type','polls')->first();
        $count_view_events = View::where('seen_by',auth()->user()->id)->where('type','events')->first();
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
        $upcomming_events = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','asc')->get();
        return view('polls',array(
            'name' => $name,
            'role' => $role,
            'polls' => $polls,
            'poll_choices' => $poll_choices,
            'poll_votes' => $poll_votes,
            'poll_votes_vote' => $poll_votes_vote,
            'poll_votes_a' => $poll_votes_a,
            'poll_collect' => $poll_collect,
            'date_today' => date('Y-m-d'),
            'count_headlines' => $count_headlines,
            'count_video' => $count_video,
            'count_bulletin' => $count_bulletin,
            'count_polls' => $count_polls,
            'count_events' => $count_events,
            'upcomming_eventsa' => $upcomming_events,
            'color' => 180,
        ));
    }
    public function events()
    {
        $name = Employee::where('user_id',auth()->user()->id)
        ->leftJoin('hr_portal.department_employee as department_employee','employees.id','=','department_employee.employee_id')
        ->leftJoin('hr_portal.departments as departments','department_employee.department_id','=','departments.id')
        ->select('employees.*','departments.name as department_name')
        ->first();

        $role = Role_user::where('user_id',auth()->user()->id)->first();
        
        $events_view = View::where('type','=','events')->where('seen_by','=',auth()->user()->id)->first();
        if($events_view)
        {   
            $events_view->seen_time_date = date('Y-m-d H:i:s');
            $events_view->save();
        }
        else
        {
            $events_view_view= new View;
            $events_view_view->type = 'events';
            $events_view_view->seen_by = auth()->user()->id;
            $events_view_view->seen_time_date = date('Y-m-d H:i:s');
            $events_view_view->save();
        }
        $count_view_headlines = View::where('seen_by',auth()->user()->id)->where('type','headlines')->first();
        $count_view_bulletin = View::where('seen_by',auth()->user()->id)->where('type','bulletin')->first();
        $count_view_polls = View::where('seen_by',auth()->user()->id)->where('type','polls')->first();
        $count_view_events = View::where('seen_by',auth()->user()->id)->where('type','events')->first();

        $upcomming_events = Eventt::whereDate('date_happen','>=',date('Y-m-d'))
        ->get();
        $upcomming_events_id = collect($upcomming_events->pluck('id'))->toArray(); 
        $event_joiners  = EventJoiner::whereIn('event_id',$upcomming_events_id)->get();
        // dd($event_joiners);
        $upcomming_eventsa = Eventt::whereDate('date_happen','>=',date('Y-m-d'))->orderBy('date_happen','asc')->get();
        $past_events = Eventt::whereDate('date_happen','<=',date('Y-m-d'))->orderBy('date_happen','desc')->take(3)->get();
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
        return view('events',array(
            'name' => $name,
            'role' => $role,
            'count_headlines' => $count_headlines,
            'count_video' => $count_video,
            'count_bulletin' => $count_bulletin,
            'count_polls' => $count_polls,
            'count_events' => $count_events,
            'past_events' => $past_events,
            'upcomming_events' => $upcomming_events,
            'upcomming_eventsa' => $upcomming_eventsa,
            'event_joiners' => $event_joiners,
            'color' => 180,
        )
        );
    }
}

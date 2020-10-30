<div class='events_body' id ='events_body'>
	<div class='row header_events ' style='background-color:#fffbea;border-bottom-left-radius:40%;border-bottom-right-radius:40%;'>
		<div class='col-2 '>
            <img src="{{URL::asset('login_css/MyPortal1.png')}}"  alt="Logo" class="img-fluid">
		</div>
		<div class='col-7 profile_header'>
			<img src="{{'http://10.96.4.40:8441/hrportal/public/id_image/employee_image/'.$name->id.'.png'}}" class='rounded-circle  profile_h'  >
			<p class='whole_name' style='color:#03703d'><i>{{auth()->user()->name}}</i></p>
		</div>
		<div class='col-3 count_down'>
            {{-- <span class='count_down_text' style='color:#ecc638;' id='count_down_1'></span> --}}
		</div>
	</div>
	<div style='height:10vh;' class=' '>
	</div>
	<div class='row events_bottom'>
		<div class='col-3 vl_events  events_spacing' style='margin-left:20px;'>
            <p class='events_text'><b>FORUM</b> 
                {{-- <a href="#"  title='New Forum' data-toggle="modal" data-target="#new_forum" > 
                <span class="glyphicon glyphicon-plus" style='color:darkgreen;font-size:50%;'></span>
            </a>	 --}}
            @if(session()->has('status_forum'))<span style='color:green;font-size:50%;' class="label label-success"> {{session()->get('status_forum')}}</span>@endif
            @include('new_forum')
        </p>
        @foreach($forums as $forum)
        <div class="a">
            <span class='events_text_inside'>{{$forum->title}}
                {{-- <a href='#' title='edit' data-toggle="modal" data-target="#edit_forum{{$forum->id}}" ><span  class="glyphicon glyphicon-edit " style="color:#1ac6ff;font-size:50%;"></span></a>
                <a href='remove-forum/{{$forum->id}}' onclick='show()' title='remove'><span  class="glyphicon glyphicon-remove" style="color:red;font-size:50%;"></span></a> --}}
            </span><br>
            <span class='events_text_inside' style='color:black;'>{{$forum->description}}</span>
        </div>
        @include('edit_forum')
        @endforeach
    </div>
    <div class='col-3 vl_events'>
        <p class='events_text'><b>EVENTS</b> 
            {{-- <a href="#"  title='New Forum' data-toggle="modal" data-target="#new_event" > 
                <span class="glyphicon glyphicon-plus" style='color:darkgreen;font-size:50%;'></span>
            </a>	 --}}
            @if(session()->has('status_event'))<span style='color:green;font-size:50%;' class="label label-success"> {{session()->get('status_event')}}</span>@endif
            @include('new_event')
        </p>
        @foreach($events as $event)
        <div class="a">
            <span class='events_text_inside'>Title: {{$event->title}}
                {{-- <a href='#' title='edit' data-toggle="modal" data-target="#edit_event{{$event->id}}" ><span  class="glyphicon glyphicon-edit " style="color:#1ac6ff;font-size:50%;"></span></a>
                <a href='remove-event/{{$event->id}}' onclick='show()' title='remove'><span  class="glyphicon glyphicon-remove" style="color:red;font-size:50%;"></span></a> --}}
            </span><br>
            <span class='events_text_inside' style='color:black;'>When: {{date("F j, Y, g:i a",strtotime($event->date_happen))}}</span>
            <br>
            <span class='events_text_inside' style='color:black;'>Description: {{$event->description}}</span>
        </div>
        @include('edit_event')
        <br>
        @endforeach
    </div>
    <div class='col-3 vl_events'>
        <p class='events_text'><b>POLLS</b> 
            {{-- <a href="#"  title='New Polls' data-toggle="modal" data-target="#new_polls" > 
            <span class="glyphicon glyphicon-plus" style='color:darkgreen;font-size:50%;'></span> --}}
        </a>	
        @if(session()->has('status_polls'))<span style='color:green;font-size:50%;' class="label label-success"> {{session()->get('status_polls')}}</span>@endif
        @include('new_polls')
    </p>
    @foreach($polls as $poll)
    <div class="a">
        <span class='events_text_inside'>Title: {{$poll->title}}
            {{-- <a href='#' title='edit' data-toggle="modal" data-target="#poll_event{{$poll->id}}" ><span  class="glyphicon glyphicon-edit " style="color:#1ac6ff;font-size:50%;"></span></a> --}}
            {{-- <a href='remove-poll/{{$poll->id}}' onclick='show()' title='remove'><span  class="glyphicon glyphicon-remove" style="color:red;font-size:50%;"></span></a> --}}
        </span><br>
        <span class='events_text_inside' style='color:black;'>When: {{date("F j, Y",strtotime($poll->date_happen))}}</span><br>
        <span class='events_text_inside' style='color:black;'><b>Choices:</b>
            @php 
                $result =  in_array($poll->id,$poll_votes_vote); 
            @endphp
            @if($result == false)
            <a data-toggle="modal" data-target="#vote_choice{{$poll->id}}" style='color:white;font-size:50%;' class="label label-info">vote </a>
            @include('vote_choice')
            @else
            <a data-toggle="modal" data-target="#changevote{{$poll->id}}" style='color:white;font-size:50%;' class="label label-warning">change vote </a>
             @include('change_vote_choice')
            @endif
        </span>
        <br> 
        @foreach($poll_choices as $poll_choice)
        @if($poll_choice->poll_id == $poll->id)
        <span class='events_text_inside' style='color:black;'><i>{{$poll_choice->choice}}</i> - 
            @foreach($poll_votes as $poll_vote) 
            @if($poll_vote->poll_choices_id == $poll_choice->id) 
            {{$poll_vote->num}}
            @endif 
            @endforeach
        </span> 
        <br>
        @endif
        @endforeach
    </div>
    <br>
    @endforeach
</div>
<div class='col-2 vl_events'>
    <p class='events_text'><b>Birthday Celebrants!</b></p>
    <div class="a">
        <span class='events_text_inside'>{{date('F d', strtotime($date_today))}}</span><br>
        @foreach($employees as  $employee)
        @if(date('m-d', strtotime($employee->birthdate)) == $today) 
        <span class='events_text_inside' style='color:black;'>{{$employee->birthday_name}}</span><br>
        @endif
        @endforeach
    </div>
</div>
</div>
<div class='footer company_a ' >
    <div class='container'>
        <div class='row justify-content-md-center' style='margin:0px;margin-top:7px; '>
            <span class='company' >La Filipina Uy Gongco Group of Companies &nbsp;<a href="{{ route('logout') }}"  onclick="logout(); show();" >
                <span class="caption" style='border-left:1px solid #fff;'> &nbsp; Log Out</span>
            </a>
            @if(Auth::user())
            <form id="logout-form"  action="{{ route('logout') }}"  method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
        </span>
    </div>
</div>
</div>
</div>
<script>
    function logout(){
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }
</script>

@extends('layouts.app2')
@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
        <div class="d-flex order-0">
            <span class=""  id="menu-toggle"><span class='dashboard'>Dashboard</span></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        
        <div class="navbar-collapse collapse justify-content-center order-2" id="navbarSupportedContent" style='color:grey'>
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link " href="{{ url('/portal-links') }}" onclick = "show()"><span class=''>Portal Links </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/headlines') }}" onclick = "show()"><span >Headlines</span><span class="badge">@if(($count_headlines+$count_video != 0)){{$count_headlines+$count_video}}@endif</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/bulletin') }}" onclick = "show()"><span >Bulletin</span><span class="badge">@if(($count_bulletin != 0)){{$count_bulletin}}@endif</span></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/forum') }}" onclick = "show()"><span class=''>Forum</span><span class="badge"></span></a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/polls') }}" onclick = "show()"><span >Polls</span><span class="badge">@if(($count_polls != 0)){{$count_polls}}@endif</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/events') }}" onclick = "show()"><span class='active_active'>Events</span><span class="badge">@if(($count_events != 0)){{$count_events}}@endif</span></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/birthdays') }}" onclick = "show()"><span class=''>Birthdays</span></a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link notification"  href="{{ url('/clearance') }}" onclick = "show()"><span class=''>Clearance</span></a>
                </li>
                @if(auth()->user()->billing() != null)
                <li class="nav-item">
                    <a class="nav-link notification"  href="{{ url('/globe-billing') }}" onclick = "show()"><span class=''>Billing</span></a>
                </li>
                @endif
            </ul>
        </div>
        <span class="navbar-text small text-truncate text-right order-1 order-md-last" style="margin:0px;padding:0px;padding-right:14px;"> <img style='height:30px' src="{{URL::asset('/images/MYPORTAL_logo.png')}}" class='img-fluid' alt="AVATAR" class=''></span>
    </nav>
    <div class="container-fluid">
        @if(session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session()->get('status')}}!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class='row'>
            <div class="col-md-8  overflow-auto" style='max-height:80vh;min-height:80vh;padding-top:10px;'>
                <h3 class="mb-3">Upcoming Events @if($role != null)@if($role->role_id != 2)<button type="button" class="btn btn-outline-success" title='New Eventin' data-toggle="modal" data-target="#new_event" >+ New Event</button>@include('new_headline')@endif @endif</h3>
                <div class='row'>
                    @foreach($upcomming_events as $upcomming_event)
                    <div class='col-md-12 col-xl-4 col-sm-12'>
                        <div class=' p-2 m-1 border rounded'  >
                            <a href='#' data-toggle="modal" data-target="#event_modal{{$upcomming_event->id}}">
                                <figure class="figure">
                                    <img src="{{URL::asset($upcomming_event->image_path)}}" class="figure-img img-fluid rounded" style='width:100%;height:200px' alt="Image">
                                    <figcaption class="figure-caption text-left" style='color :#139C18;'><b>Title: {{str_limit($upcomming_event->title,20)}}</b></figcaption>
                                    <figcaption class="figure-caption text-left" style='color :#139C18;'>When: {{date('M. d, Y h:i A',strtotime($upcomming_event->date_happen))}}</figcaption>
                                    <figcaption class="figure-caption text-left" style='color :#139C18;'>Description: {{str_limit($upcomming_event->description,18)}}</figcaption>
                                </figure>
                            </a>
                        </div>
                        @if($upcomming_event->add_by == auth()->user()->id)
                            <a  href='remove-event/{{$upcomming_event->id}}' class='delete' title='remove' onclick='show()'>Delete</a>
                         @endif
                    </div>
                    @include('event_modal')
                    @endforeach
                </div>
            </div>
            <div class='col-md-1' style='padding-top:5vh;'>
                <div  style='border-right:2px solid #139C18;padding-top:2px;min-height:80vh;opacity:.4;'>
                </div>
            </div>
            <div class="col-md-3 overflow-auto" style='max-height:80vh;min-height:80vh;padding-top:10px;'>
                <h3 class="mb-3">Past Events</h3>
                @foreach($past_events as $past_event)
                {{-- <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{URL::asset($past_event->image_path)}}" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div> --}}
                @if($past_event->image_path != null)
                <figure class="figure border  p-2 rounded" style='color:#139C18;'>
                    <img src="{{URL::asset($past_event->image_path)}}" class="figure-img img-fluid rounded" style='width:100%;height:250px' alt="Image">
                    <figcaption class="figure-caption text-left "><b>Title: {{$past_event->title}}</b></figcaption>
                    <figcaption class="figure-caption text-left">When: {{date('M. d, Y h:i A',strtotime($past_event->date_happen))}}</figcaption>
                    <figcaption class="figure-caption text-left">Description: {{$past_event->description}}</figcaption>
                </figure>
                @else
                <figure class="figure border  p-2 rounded" style='color:#139C18;'>
                    <img src="{{URL::asset('no_image_available.png')}}" class="figure-img img-fluid rounded" style='width:100%;height:250px' alt="Image">
                    <figcaption class="figure-caption text-left"  style='color:#139C18;'><b>Title: {{$past_event->title}}</b></figcaption>
                    <figcaption class="figure-caption text-left"  style='color:#139C18;'>When: {{date('M. d, Y h:i A',strtotime($past_event->date_happen))}}</figcaption>
                    <figcaption class="figure-caption text-left"  style='color:#139C18;'>Description: {{$past_event->description}}</figcaption>
                </figure>
                @endif
                @endforeach
            </div>
        </div>
        @include('new_event')
    </div>
</div>
@endsection

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
                    <a class="nav-link notification" href="{{ url('/headlines') }}" onclick = "show()"><span class='active_active'>Headlines</span>@if(($count_headlines+$count_video != 0)){{$count_headlines+$count_video}}@endif</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/bulletin') }}" onclick = "show()"><span class=''>Bulletin</span><span class="badge"></span><span class="badge">@if(($count_bulletin != 0)){{$count_bulletin}}@endif</span></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/forum') }}" onclick = "show()"><span class=''>Forum</span><span class="badge"></span></a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/polls') }}" onclick = "show()"><span class=''>Polls</span><span class="badge">@if(($count_polls != 0)){{$count_polls}}@endif</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/events') }}" onclick = "show()"><span class=''>Events</span><span class="badge">@if(($count_events != 0)){{$count_events}}@endif</span></a>
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
        @include('error')
        @if(session()->has('satus_headline'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session()->get('satus_headline')}}!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class='row'  >
            <div class="col-md-7 overflow-auto" style='max-height:80vh;min-height:80vh;padding-top:10px;'>
                <h3 class="mb-3 bread">Headlines @if($role != null)@if($role->role_id != 2)<button type="button" class="btn btn-outline-success" title='New Headline' data-toggle="modal" data-target="#new_headline" >+ New Image</button>@include('new_headline')@endif @endif</h3>
                <section class="ftco-section-2">
                    <div class="photograhy">
                        <div class="row no-gutters">
                            @foreach ($headlines as $headline)
                            @php
                            $key = array_search($headline->add_by, array_column($users, 'id'));
                            @endphp
                            <div class="col-md-3 image" style='padding: 0px 10px 10px 10px;'>
                                <a href="{{URL::asset($headline->tile_url)}}" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url({{url($headline->tile_url)}});">
                                    <div class="overlay"></div>
                                    <div class="text text-center">
                                        <h6>Subject: {{$headline->subject}}</h6>
                                        <span class="tag">Post By : {{$users[$key]['name']}}</span>
                                    </div>
                                </a>
                                @if($role != null)
                                    @if($role->role_id != 2)
                                        @if($headline->add_by == auth()->user()->id)
                                            <a  href='remove-headline/{{$headline->id}}' class='delete' title='remove' onclick='show()'>x</a>
                                        @endif
                                    @endif
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <div class='col-md-1' style='padding-top:5vh;'>
                <div  style='border-right:2px solid #139C18;padding-top:2px;min-height:80vh;opacity:.4;'>
                </div>
            </div>
            <div class="col-md-4 overflow-auto"  style='max-height:80vh;padding-top:10px;'>
                <h3 class="mb-3 bread">Videos @if($role != null)@if($role->role_id != 2)<button type="button" class="btn btn-outline-success" title='New Video' data-toggle="modal" data-target="#new_video" >+ New Video</button>@endif @endif</h3>
                <div class="row">
                    @foreach($videos as $video)
                        <div class='col-md-8'>
                            <video  class='col-md-12' poster="{{URL::asset($video->video_frame)}}" controls>
                                <source src="{{URL::asset($video->video_path)}}" type="video/mp4">
                            </video>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('new_video')
@endsection

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
                    <a class="nav-link notification" href="{{ url('/bulletin') }}" onclick = "show()"><span class='active_active'>Bulletin</span><span class="badge">@if(($count_bulletin != 0)){{$count_bulletin}}@endif</span></a>
                </li>
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
        @if(session()->has('status_bulletin'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session()->get('status_bulletin')}}!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class='row'  >
            <div class="col-md-12 overflow-auto" style='max-height:80vh;min-height:80vh;padding-top:10px;'>
                <h3 class="mb-3">Bulletins @if($role != null) @if($role->role_id != 2)<button type="button" class="btn btn-outline-success" title='New Bulletin' data-toggle="modal" data-target="#new_bulletin" >+ New Bulletin</button>@include('new_headline')@endif @endif</h3>
                <div class='row'>
                    @foreach($bulletins as $bulletin)
                    <div class="col-md-4">
                    <p align='center'><a href='{{ url($bulletin->file_path) }}' target='_' ><button type="button" class="btn btn-outline-info" > View</button> </a>@if($bulletin->add_by == auth()->user()->id)<a  href='remove-bulletin/{{$bulletin->id}}' onclick='show()' title='remove'  ><button type="button" class="btn btn-outline-danger" > Delete</button> </a>@endif</p>
                    
                        <embed  style='padding: 0px 10px 10px 10px;' height=350 width='100%' src="{{ url($bulletin->file_path) }}" frameborder="2">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('new_bulletin')
    </div>
    @endsection
    
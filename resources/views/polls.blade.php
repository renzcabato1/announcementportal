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
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/polls') }}" onclick = "show()"><span class='active_active'>Polls</span><span class="badge">@if(($count_polls != 0)){{$count_polls}}@endif</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/events') }}" onclick = "show()"><span class=''>Events</span><span class="badge">@if(($count_events != 0)){{$count_events}}@endif</span></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/birthdays') }}" onclick = "show()"><span class=''>Birthdays</span></a>
                </li> --}}
                @if(auth()->user()->resign() != null)
                <li class="nav-item">
                    <a class="nav-link notification"  href="{{ url('/clearance') }}" onclick = "show()"><span class=''>Clearance</span><span  style='background-color:transparent;color:red'>*</span></a>
                </li>
                @endif
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
        <div class='row'  >
            <div class="col-md-12 overflow-auto" style='max-height:80vh;min-height:80vh;padding-top:10px;padding-left:10px;'>
                <h3 class="mb-3">Polls @if($role != null) @if($role->role_id != 2)<button type="button" class="btn btn-outline-success" title='New Poll' data-toggle="modal" data-target="#new_polls" >+ New Poll</button>@include('new_headline')</h3>@endif @endif
                @include('new_polls')
                <div class='row'>
                        @foreach($polls as $poll)
                        <div class="col-md-3 rounded-lg" style='margin-left:20px;border:1px solid black;'  >
                                <div class="row">
                                    <div class='col-11'>
                                        <h3>
                                            Poll: {{$poll->title}}
                                        </h3>    
                                    </div>
                                    <div class='col-1'>
                                            <h3>
                                                    @if($poll->add_by == auth()->user()->id)
                                                    <a href='remove-poll/{{$poll->id}}' onclick='show()' title='remove'><span  class="glyphicon glyphicon-remove" style="color:green;">X</span></a>
                                                    @endif<br>
                                            </h3>    
                                        </div>
                                </div>  
                                <div class="row">
                                        <div class='col-12'>
                                            <h5>
                                                    When : {{date("F j, Y",strtotime($poll->date_happen))}} 
                                            </h5>
                                        </div>
                                </div>   
                                <b>Choices:</b>@php 
                                $result =  in_array($poll->id,$poll_votes_vote); 
                                @endphp
                                @if($result == false)
                                <button data-toggle="modal" data-target="#vote_choice{{$poll->id}}" class="btn btn-success btn-sm">vote</button>
                                @include('vote_choice')
                                @else
                                <button data-toggle="modal" data-target="#changevote{{$poll->id}}"  class="btn btn-success btn-sm">change vote</button>
                                @include('change_vote_choice')
                                @endif
                                <br>
                                @foreach($poll_choices as $poll_choice)
                                    @if($poll_choice->poll_id == $poll->id)
                                        @php
                                            $sum = 0;
                                            $key = array_search($poll_choice->id, array_column($poll_collect, 'poll_choices_id'));
                                            $keys = array_keys(array_column($poll_collect, 'poll_id'), $poll_choice->poll_id);
                                            foreach($poll_votes as $poll_vote)
                                            {
                                                if($poll_vote->poll_id == $poll->id)
                                                {
                                                    $sum = $sum + $poll_vote->num;
                                                }
                                                else 
                                                {
                                                    $sum = $sum;
                                                }
                                            }
                                            if(($sum != 0)&& ($key !== false))
                                            {
                                                $result = round(($poll_votes[$key]->num/$sum),2)*100;
                                            } 
                                        @endphp
                                        @if($key !== false)
                                            {{$poll_choice->choice}} -  ({{$poll_votes[$key]->num}} - vote/s)
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {{$result}}%;color:black"  aria-valuemin="0" aria-valuemax="100">{{$result}}%</div>
                                            </div>
                                        @else
                                            {{$poll_choice->choice}} - (0 - vote/s)
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 0%;color:black" aria-valuemin="0" aria-valuemax="100">0%</div>
                                            </div>
                                        @endif
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    
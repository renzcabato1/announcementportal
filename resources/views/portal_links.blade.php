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
                    <a class="nav-link " href=""><span class='active_active'>Portal Links </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/headlines') }}" onclick = "show()"><span class=''>Headlines</span><span class="badge">@if(($count_headlines+$count_video != 0)){{$count_headlines+$count_video}}@endif</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification"  href="{{ url('/bulletin') }}" onclick = "show()"><span class=''>Bulletin</span><span class="badge">@if(($count_bulletin != 0)){{$count_bulletin}}@endif</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/polls') }}" onclick = "show()"><span class=''>Polls</span><span class="badge">@if(($count_polls != 0)){{$count_polls}}@endif</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification" href="{{ url('/events') }}" onclick = "show()"><span class=''>Events</span><span class="badge">@if(($count_events != 0)){{$count_events}}@endif</span></a>
                </li>
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
        <style>
            input[type="text"],
            select.form-control {
                background: transparent;
                border: none;
                border-bottom: 1px solid #139C18;
                -webkit-box-shadow: none;
                box-shadow: none;
                border-radius: 0;
            }
            
            input[type="text"]:focus,
            select.form-control:focus {
                -webkit-box-shadow: none;
                box-shadow: none;
            }
            input[type="text"]::placeholder
            {
                font-size: 14px;

            }
        </style>
         @if(session()->has('messsage_survey'))
         <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
             <strong style='font-size:24px;'>{{session()->get('messsage_survey')}}!</strong> 
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         @endif
        <div class='col-md-12'>
            <div class="md-form mt-5 mb-5 col-md-3 " style='margin:auto;'>
                <input class="form-control" id="Search" onkeyup="myFunction()"  type="text" placeholder="Search" aria-label="Search">
            </div>
        </div>
       
        <div class='row mt-2 overflow-auto' style='max-height:75vh'>
            @foreach($portals as $key => $portal)
            
            <div class='col-md-2 text-center text-dark my-3 target'   id='linha' >
                <a href='{{$portal->link_portal}}' target='{{$key+1}}' class="text-dark ">
                    <img src='{{URL::asset($portal->image_icon)}}' class="figure-img img-fluid rounded " style='width:100px;height:100px;'><br>
                    {{$portal->title_portal}}
                </a>
            </div>
            
            @endforeach
        </div>
        
    </div>
    
    
</div>
<script>
    function myFunction() {
        var input = document.getElementById("Search");
        var filter = input.value.toLowerCase();
        var nodes = document.getElementsByClassName('target');
        
        for (i = 0; i < nodes.length; i++) {
            if (nodes[i].innerText.toLowerCase().includes(filter)) {
                nodes[i].style.display = "";
            } else {
                nodes[i].style.display = "none";
            }
        }
    }
    
</script>
@endsection

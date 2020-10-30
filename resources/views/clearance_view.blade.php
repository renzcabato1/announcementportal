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
                    <a class="nav-link notification" href="{{ url('/headlines') }}" onclick = "show()"><span>Headlines</span>@if(($count_headlines+$count_video != 0)){{$count_headlines+$count_video}}@endif</span></a>
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
                    <a class="nav-link notification"  href="{{ url('/clearance') }}" onclick = "show()" ><span class='active_active' >Clearance</span></a>
                </li>
            </ul>
        </div>
        <span class="navbar-text small text-truncate text-right order-1 order-md-last" style="margin:0px;padding:0px;padding-right:14px;"> <img style='height:30px' src="{{URL::asset('/images/MYPORTAL_logo.png')}}" class='img-fluid' alt="AVATAR" class=''></span>
    </nav>
    <div class="container-fluid">
        <div class='row'>
            <div class='col-md-6 mt-4'>
                <div class='row '>
                    <div class='col-md-offset-8 text-center  ' style='margin:auto' >
                        <div>
                                @if(session()->has('status_resignation'))<span style='color:green;font-size:150%;margin:auto;width:100%;text-align:center;display:inline-block;' class="label label-success"> {{session()->get('status_resignation')}}</span><br>@endif
                                
                            <h3 class="mt-4 text-center" style='color:green' ></h3>
                            <br><h1>STEP 1</h1>
                            <span style='color:green;font-size:18px;margin-bottom: 20px;'>Please input the needed information below so can get in touch with you for updates on your clearance.</span> <br>
                            <button title='Upload Resignation' data-toggle="modal" data-target="#add-resignation" class="btn btn-success"  >Upload Resignation</button><br>
                            <span style='margin-left:15px;margin-right:15px;'><b style='color:red;font-size:10px;'>*Please note that the Offboarding System is not a substitute for one-on-one discussion with your immediate superior on your intended resignation. Please make sure that the letter you will upload reflects the effectivity date of the resignation and has been duly signed and approved.</b></span>
                        
                            @include('add_information')
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-6 mt-4'>
                <div class='row '>
                    <div class='col-md-offset-8 text-center  ' style='margin:auto' >
                        {{-- {{dump(auth()->user()->resign())}} --}}
                        @if(auth()->user()->resign())
                            <div class=''>
                                @if(session()->has('status_survey'))<span style='color:green;font-size:150%;margin:auto;width:100%;text-align:center;display:inline-block;' class="label label-success"> {{session()->get('status_survey')}}</span><br>@endif
                                @if(auth()->user()->resign()->survey_id)
                                <h1>STEP 2</h1>
                                <span style='color:green;font-size:24px;'>You successfully submitted your Exit Interview! </span>
                                <div style='margin:auto;width:100%;text-align:center;display:inline-block;'>
                                    <br>
                                    <button title='Survey' data-toggle="modal" data-target="#view_survey" class="btn btn-success"  >View Survey</button>
                                </div>
                                @include('view_survey')
                                @else
                                <br><h1>STEP 2</h1>
                                <span style='color:green;font-size:18px;margin-bottom: 20px;'>We value your feedback and commit to protecting its confidentiality. <br>
                                    Please take time to answer the exit survey
                                    </span><br>
                                    
                                    <button title='Survey' data-toggle="modal" data-target="#survey" class="btn btn-success"  >Take Survey</button><br>
                                    <span style='color:red;font-size:15px;'><i><b>Please note that your responses will not be visible to your immediate superior, department heads or any of the clearing departments. <br>Responses will be collected and processed confidentially.</b></i></span>
                                @endif
                                @include('survey')
                            </div>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
        @if(auth()->user()->resign())
        <div class='row  mt-5'>
                <div class='col-md-8 text-center border ' style='margin:auto' >
                        <span style='color:green;font-size:16px;margin-bottom: 20px;'>Thank you.</span><br>
                        <span style='color:green;font-size:16px;margin-bottom: 20px;'>The details you provided will be subject to confirmation by your immediate superior. Once confirmed, your clearance shall be routed. Please regularly check your e-mail for updates. Kindly check and settle all your accountabilities before your last day of employment.Any unsettled accountabilities shall be deducted from your accrued wages, or any kind of compensation due
                                to you.</span><br>
                </div>
        </div>
        @endif
        
    </div>
</div>
@endsection

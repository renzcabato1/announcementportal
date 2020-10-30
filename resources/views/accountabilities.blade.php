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
                    <a class="nav-link notification"  href="{{ url('/clearance') }}" onclick = "show()" ><span class='' >Clearance</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link notification"  href="{{ url('/globe-billing') }}" onclick = "show()"><span class='active_active'>Billing</span></a>
                </li>
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
        <div class='row'  >
            <div class="col-md-4 ml-3 overflow-auto" style='max-height:80vh;min-height:80vh;padding-top:10px;'>
                <h3 class="mb-3 bread"> Account</h3><br>
                @foreach($accountabilities as $accountability)
                <div class='row border'>
                    <div class='col-6 border'>Budget Line</div>
                    <div class='col-6 border'>{{$accountability->budget_code}}</div>
                </div>
                <div class='row'>
                    <div class='col-6 border'>Company</div>
                    <div class='col-6 border'>{{$accountability->inventory_info->company_line}}</div>
                </div>
                <div class='row'>
                    <div class='col-6 border'>Status</div>
                    <div class='col-6 border'>{{$accountability->inventory_info->status}}</div>
                </div>
                <div class='row'>
                    <div class='col-6 border'>Account Number</div>
                    <div class='col-6 border'>{{$accountability->inventory_info->account_number}}</div>
                </div>
                <div class='row'>
                    <div class='col-6 border'>Cellphone Number</div>
                    <div class='col-6 border'>{{$accountability->inventory_info->service_number}}</div>
                </div>
                <div class='row'>
                    <div class='col-6 border'>Plan Offer</div>
                    <div class='col-6 border'>{{$accountability->inventory_info->plan_offer}}</div>
                </div>
                <div class='row'>
                    <div class='col-6 border'>MRF</div>
                    <div class='col-6 border'>{{number_format($accountability->monthly_budget,2)}}</div>
                </div>
                
                <br>
                @endforeach
            </div>
            <div class="col-md-1 overflow-auto" >
             
            </div>
            <div class="col-md-6 mroverflow-auto" style='max-height:80vh;min-height:80vh;padding-top:10px;'>
                <h3 class="mb-3 bread"> SOA <br>
                    {{-- <a href='{{ url('/for-approval') }}'>(for approval {{$for_approval}})</a> --}}
                </h3>
                <br>
                @foreach($bill as $key =>  $bil)
                <div class='row border'>
                    <div class='col-12 border'>{{$accountabilities[$key]->inventory_info->service_number}}</div>
                </div>
                <div class='row border'>
                    <div class='col-3 border'>Period</div>
                    <div class='col-3 border'>PDF</div>
                    <div class='col-3 border'>Uploaded By</div>
                    <div class='col-3 border'>Action</div>
                </div>
                @foreach($bil as $b)
                <div class='row border'>
                    <div class='col-3 border'>{{date('F Y',strtotime($b->date_from))}}</div>
                    <div class='col-3 border'><a href='http://10.96.4.118:8672/{{$b->file_path}}' target='_blank'> Bill </a></div>
                    <div class='col-3 border'>{{$b->upload_info->name}}</div>
                    <div class='col-3 border'>
                         {{-- @if($b->excessusage == null)<button type="button" class="btn btn-outline-success" title='New Headline' data-toggle="modal" data-target="#submit{{$b->id}}" >Submit </button> @else @if($b->excessusage->status == "Verified") <button type="button" class="btn btn-outline-info"  data-toggle="modal" data-target="#view_request{{$b->id}}" >Verified</button>  @else <button type="button" class="btn btn-outline-info"  data-toggle="modal" data-target="#submit{{$b->id}}" >View Request</button> @endif @endif --}}
                        </div>
                </div>
                {{-- @include('submit_excess') --}}
                {{-- @include('view_request') --}}
                @endforeach
                <br>
                @endforeach
                {{-- {{$billings}} --}}
            </div>
        </div>
    </div>
</div>
@endsection

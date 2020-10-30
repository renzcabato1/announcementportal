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
            <div class="col-md-12 ml-3 overflow-auto" style='max-height:80vh;min-height:80vh;padding-top:10px;'>
                <h3 class="mb-3 bread"> For Approval (Excess Usage)</h3><br>
                <div class='row border'>
                    <div class='col-2 border'>Name</div>
                    <div class='col-2 border'>View Billing</div>
                    <div class='col-2 border'>Period</div>
                    <div class='col-2 border'>Total excess usage</div>
                    <div class='col-2 border'>Date submitted </div>
                    <div class='col-2 border'>Action</div>
                </div>
                @foreach($for_approval as $for_app)
                    <div class='row border'>
                        <div class='col-2 border'>{{$for_app->created_at_info->name}}</div>
                        <div class='col-2 border'><a href='http://10.96.4.118:8668/{{$for_app->bill_upload_info->file_path}}' target='_blank'>View Bill</a> </div>
                        <div class='col-2 border'>{{date('F Y',strtotime($for_app->bill_upload_info->date_from))}}</div>
                        <div class='col-2 border'>{{number_format($for_app->official_business+$for_app->personal_expense,2)}}</div>
                        <div class='col-2 border'>{{date('F m, Y',strtotime($for_app->created_at))}}</div>
                        <div class='col-2 border'><button type="button" class="btn btn-outline-success" title='New Headline' data-toggle="modal" data-target="#view_excess{{$for_app->id}}" >Verify </button></div>
                    </div>
                    @include('view_excess')
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app2')
@section('content')
<!-- Page Content -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
        <div class="d-flex order-0">
            <span class=""  id="menu-toggle"><span class='dashboard'>Survey</span></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse justify-content-center order-2" id="navbarSupportedContent" style='color:grey'>
            <ul class="navbar-nav">
                
            </ul>
        </div>
        <span class="navbar-text small text-truncate text-right order-1 order-md-last" style="margin:0px;padding:0px;padding-right:14px;"> <img style='height:30px' src="{{URL::asset('/images/MYPORTAL_logo.png')}}" class='img-fluid' alt="AVATAR" class=''></span>
    </nav>
    <div class="container-fluid">
        <form method='POST' action='survey-add' enctype="multipart/form-data" onsubmit='show()' >
            {{ csrf_field() }}
            <div class='row'>
                <div class='col-md-12 text-center'>
                    <h3>SURVEY REPORT</h3>
                </div>
            </div>
            <div class='row mt-2 overflow-auto' id='all' style='max-height:85vh'>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection

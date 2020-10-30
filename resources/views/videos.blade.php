@extends('layouts.app4')
@section('content')

<!-- Page Content -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
        <div class="d-flex order-0">
            <span class=""  id="menu-toggle"><span class='dashboard'></span></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        
        <div class="navbar-collapse collapse justify-content-center order-2" id="navbarSupportedContent" style='color:grey'>
            
        </div>
        <span class="navbar-text small text-truncate text-right order-1 order-md-last" style="margin:0px;padding:0px;padding-right:14px;"> <img style='height:30px' src="{{URL::asset('/images/MYPORTAL_logo.png')}}" class='img-fluid' alt="AVATAR" class=''></span>
    </nav>
    <div class="container-fluid">
        <div class='row'  >
            <div class="col-md-7 overflow-auto" style='max-height:80vh;min-height:80vh;padding-top:10px;'>
                <h3 class="mb-3 bread">Videos <button type="button" class="btn btn-outline-success" title='New Channel' data-toggle="modal" data-target="#new_channel" >+ New Channel</button>@include('new_channel')</h3>
                <style>
                    #customers {
                        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }
                    
                    #customers td, #customers th {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }
                    
                    #customers tr:nth-child(even){background-color: #f2f2f2;}
                    
                    #customers tr:hover {background-color: #ddd;}
                    
                    #customers th {
                        padding-top: 12px;
                        padding-bottom: 12px;
                        text-align: left;
                        background-color: #4CAF50;
                        color: white;
                    }
                </style>
                <table id="customers">
                    <tr>
                        <th>Channel</th>
                        <th>Channel Name</th>
                        <th>Video </th>
                        <th>Action</th>
                    </tr>
                    @foreach($videos as $video)
                    <tr>
                        <td>{{$video->id}}</td>
                        <td>{{$video->location}}</td>
                        <td>@if($video->video_path == null)No Video Found @else <a href="{{ url('/video_view/'.$video->id) }}" target="_blank">Video</a> @endif</td>
                        <td><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#edit_channel{{$video->id}}" >Update</button></td>
                    </tr>
                    @include('edit_channel')
                    @endforeach
                </table>
            </div>
            
            
        </div>
    </div>
</div>
@endsection

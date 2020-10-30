@extends('header')
@section('content')
<div class="navview-content d-flex">
    <div class="container-fluid grid  ">
        @include('error')
        <div class="row">
            <div class="cell-md-5" >
                <h1><small> Public Announcement</small> </h1>
            </div>
            <div class="cell-md-4" >
                @if(session()->has('status'))
                <span class="tally success">{{session()->get('status')}}</span>
                @endif
            </div>
        </div>
        <div class="row no-gap  p1 border" >
            @foreach ($announcements as $key1 => $announcement)
            @php
            $keys = array_keys($id_of_images, $announcement->id);
            $keys_of_attachments = array_keys($id_of_attachments, $announcement->id);
            $count_of_keys = count($keys);
            $keys_of_seen_by = array_keys($id_of_seen_by, $announcement->id);
            $count_keys_of_seen_by = count($keys_of_seen_by);
            
            @endphp
            @if($count_of_keys == 0)
            <div  class="cell-md-3 border bd-cyan border-radius border-size-3 button1" id ='{{$announcement->id}}'  style='margin:0 7px 7px 0;' data-toggle="modal" data-target="#view_announcement_no_image{{$key1}}" data-role="tile" data-size="wide" data-cover="{{ asset('/images/noimage.jpg')}}"  >
                <span class="branding-bar design">Title: {{$announcement->title}}</span>
            </div>
            @include('view_announcement')
            @elseif($count_of_keys == 1)
            @foreach($keys as $key)
            <div   class="cell-md-3 border bd-cyan border-radius border-size-3 button1" id ='{{$announcement->id}}' style='margin:0 7px 7px 0;' data-toggle="modal" data-target="#view_announcement{{$key1}}" data-role="tile" data-size="wide" data-cover="{{ asset(''.$images[$key]->file_path.'')}}"  >
                <span class="branding-bar design">Title: {{$announcement->title}}</span>
            </div>
            @endforeach
            @include('view_announcement_single')
            @else
            <div  class="cell-md-3 border bd-cyan border-radius border-size-3 button1" id ='{{$announcement->id}}' style='margin:0 7px 7px 0;' data-toggle="modal" data-target="#view_announcement_many_image{{$key1}}" data-role="tile" data-size="wide" data-effect="animate-slide-left">
                @foreach($keys as $key)
                    <div class="slide" data-cover="{{ asset(''.$images[$key]->file_path.'')}}"></div>
                @endforeach
                <span class="branding-bar design">{{$announcement->title}}</span>
            </div>
            @include('many_image_carousel')
            @endif
            @endforeach
            {{-- @if($role->role_id == 1)
            @endif --}}
            <div class="cell-md-3  border bd-cyan border-radius border-size-3 " style='margin:0 7px 7px 0;' data-toggle="modal" data-target="#new_announcement" data-role="tile" data-size="wide" style='border: 0px;' >
                <p align='center' style='padding-top:50px;'><img src='{{ asset('/images/add.png')}}' width='50' height='50'>New</p>
            </div>
        </div>
    </div>
    <div class="grid w-25" >
        <div class="row">
            <div class="cell">
                <div  style="overflow:scroll; height:500px;overflow-x: auto;" class='place-right h-20 w-100' data-role="panel" data-title-icon="<span class='mif-apps'></span>" data-title-caption="Birthday({{ $name_of_month }})" data-collapsed="true" data-collapsible="true" data-draggable="false">
                    <br>
                    <div class="suggest-box">
                        <div class="input">
                            <input type="text" id="names_info" onkeyup="search2()" data-role="input" data-clear-button="false" data-search-button="true" class="" data-role-input="true"><div class="button-group">
                                <button class="button input-search-button" tabindex="-1" type="submit"><span class="default-icon-search"></span></button>
                            </div>
                        </div>
                        <button class="holder">
                            <span class="mif-search"></span>
                        </button>
                    </div>
                    <ul class="navview-menu" id="names">
                        @foreach($employees as $key => $employee)
                            @php
                                $number = $key + 1;  
                            @endphp
                            @if(date('m-d', strtotime($employee->birthdate)) == $today) 
                            <li class='nopadding'>
                                <a>
                                    <span class='fg-green'>{{$number.'. '.$employee->birthday_name .' - '. date('M. j', strtotime($employee->birthdate))}}<i class='fg-green mif-magic-wand'></i></span>
                                </a>
                            </li>
                            @endif
                        @endforeach
                        @foreach($employees as $key => $employee)
                            @php
                                $number = $key + 1;   
                            @endphp
                            @if(date('m-d', strtotime($employee->birthdate)) != $today) 
                            <li class='nopadding'>
                                <a>
                                    <span>{{$number.'. '.$employee->birthday_name .' - '. date('M. j', strtotime($employee->birthdate))}}</span>
                                </a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>  
<div id="new_announcement" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style='color:black'>New Announcement</h4>
            </div>
            <form  method='POST' action='add-announcement' enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-12'>
                            <label style="position:relative; top:7px;">Title: </label>
                            <input class="form-control" type='text' name='title' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-5'>
                            <label style="position:relative; top:7px;">Images/s: </label>
                            <input class="form-control" type="file" name='image[]' multiple accept='image/*' >
                        </div>
                        <div class='col-md-5'>
                            <label style="position:relative; top:7px;">Attachment/s: </label>
                            <input class="form-control" type="file" name='attachment[]' multiple >
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-5'>
                            <label style="position:relative; top:7px;">Start Date: </label>
                            <input class="form-control" type="date" name='start_date' id='start_date' required>
                        </div>
                        <div class='col-md-5'>
                            <label style="position:relative; top:7px;">End Date: </label>
                            <input class="form-control" type="date" name='end_date' id='end_date' requried>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label style="position:relative; top:7px;">Description: </label>
                            <textarea name='description' class="form-control" placeholder='Description' required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary" >Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


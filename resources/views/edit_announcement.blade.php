@extends('header')
@section('content')
<div class="navview-content d-flex">
    <div class="container-fluid grid  ">
       
        <div class="row" style='margin:10px;'>
            <div class="cell-md-1">
            </div>
            <div class="cell-md-4" >
                <h4><small> Edit Announcement</small></h4>
            </div>
            <div class="cell-md-4" >
                @if(session()->has('status')) <span class="tally success">{{session()->get('status')}}</span>
                @endif
            </div>
            
        </div>

            <form  method='POST' action='' enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class='row'>
                    <div class="cell-md-1">
                    </div>
                    <div class='cell-md-11'>
                        <label style="position:relative; top:7px;">Title: </label>
                        <input class="form-control" type='text' value='{{$announcement->title}}' name='title' required>
                    </div>
                </div>

                <div class='row'>
                    <div class="cell-md-1">
                    </div>
                    <div class='cell-md-5'>
                        <label style="position:relative; top:7px;">Images/s: </label>
                        {{-- <input class="form-control" type="file" name='image[]' multiple accept='image/*' > --}}
                        <br>
                        @foreach($images as $image)
                            <a href='' data-toggle="modal" data-target="#view_image{{$image->id}}"><img width='100' height='70' class='border bd-black' style='margin:0 2px 2px 0'  src='{{ asset(''.$image->file_path.'')}}'></a>
                            <a  href="{{url('delete-image/'.$image->id.'')}}" onclick="return confirm('Are you sure you want to delete this image?')"  ><span class='mif-cancel fg-red'  title='Delete Image' ></span></a>
                            @include('view_image_modal')
                        @endforeach
                        
                        <input type="file" data-role="file" data-button-title="Add Image/s" name='image[]'  multiple accept='image/*' >
                    </div>
                    <div class='cell-md-5'>
                        <label style="position:relative; top:7px;">Attachment/s: </label><br>
                        @foreach($attachments as $key_5 => $attachment)
                            @php
                                $key_display = $key_5 + 1;
                            @endphp
                            
                            {{$key_display.'. '}} 
                            <a href='{{ asset(''.$attachment->file_path.'')}}' target='_'>{{$attachment->file_name}}</a>
                            <a href="{{url('delete-attachment/'.$attachment->id.'')}}" onclick="return confirm('Are you sure you want to delete this attachment?')"  ><span class='mif-cancel fg-red'  title='Delete Attachment' ></span></a><br>
                        @endforeach
                        
                        <input type="file" data-role="file" data-button-title="Add Attachment/s" name='attachment[]'  multiple >
                    </div>
                </div>
                <div class='row'>
                    <div class="cell-md-1">
                    </div>
                    <div class='cell-md-3'>
                        <label style="position:relative; top:7px;">Start Date: </label>
                        <input class="form-control" type="date" name='start_date' value='{{$announcement->start_date}}' id='start_date' required>
                    </div>
                    <div class='cell-md-3'>
                        <label style="position:relative; top:7px;">End Date: </label>
                        <input class="form-control" type="date" name='end_date' value='{{$announcement->end_date}}' id='end_date' requried>
                    </div>
                </div>
                <div class='row'>
                        <div class="cell-md-1">
                            </div>
                    <div class='cell-md-9'>
                        <label style="position:relative; top:7px;">Description: </label>
                        <textarea name='description' class="form-control" placeholder='Description' required>{{$announcement->description}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="cell-md-1">
                    </div>
                    <div class='cell-md-7'>
                        <button type="submit"  class="btn btn-primary" >Save</button>
                        <a  href='{{url('/')}}' class="btn btn-secondary fg-green button" role="button" data-dismiss="modal">Home</a>
                    </div>
                </div>
        </form>
    </div>
    
    <div class="grid w-25" >
        <div class="row">
            <div class="cell">
            <div  style="overflow:scroll; height:500px;" class='place-right h-20 w-100' data-role="panel" data-title-icon="<span class='mif-apps'></span>" data-title-caption="Birthday({{ $name_of_month }})" data-collapsed="true" data-collapsible="true" data-draggable="false">
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
                        <li class='nopadding'>
                            <a>
                                @if(date('m-d', strtotime($employee->birthdate)) == $today) 
                                <span class='fg-green'>{{$number.'. '.$employee->birthday_name .' - '. date('M. j', strtotime($employee->birthdate))}}<i class='fg-green mif-magic-wand'></i></span>
                                @else
                                <span>{{$number.'. '.$employee->birthday_name .' - '. date('M. j', strtotime($employee->birthdate))}}</span>
                                @endif
                                
                            </a>
                        </li>
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


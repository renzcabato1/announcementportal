<div class="modal fade" id="view_announcement_many_image{{$key1}}" tabindex="-1" role="dialog" aria-labelledby="ModalCarouselLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    @if($announcement->post_by == auth()->user()->id)
                        <a href="{{url('edit-announcement/'.$announcement->id.'')}}" ><span class='mif-pencil fg-blue'  title='edit' ></span></a>
                        <a href="{{url('delete-announcement/'.$announcement->id.'')}}" onclick="return confirm('Are you sure you want to delete this Announcement?')"  ><span class='mif-cancel fg-red'  title='delete' ></span></a>
                    @endif
                
            <h4 class="modal-title" id="myModalLabel" style="color:black;">Title: {{$announcement->title}}</h4>
            </div>
            <!--The main div for carousel-->
            <div id="carousel-modal-demo{{$key1}}" class="carousel slide" data-ride="carousel" data-interval="2000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($keys as $key_na => $key)
                        @if($key_na == 0)
                            <li data-target="#carousel-modal-demo{{$key1}}" data-slide-to="{{$key_na}}" class="active"></li>
                        @else
                            <li data-target="#carousel-modal-demo{{$key1}}" data-slide-to="{{$key_na}}" ></li>
                        @endif
                    @endforeach
                </ol>
                <!-- Sliding images statring here --> 
                <div class="carousel-inner" align='center'> 
                        @foreach($keys as $key_na => $key)
                            @if($key_na == 0)
                                <div class="item active"> 
                                    <img src="{{ asset(''.$images[$key]->file_path.'')}}" > 
                                    <div class="carousel-caption">
                                    </div>
                                </div> 
                            @else
                                <div class="item"> 
                                    <img src="{{ asset(''.$images[$key]->file_path.'')}}"> 
                                    <div class="carousel-caption">
                                    </div>      
                                </div> 
                            @endif
                    @endforeach
                </div> 
                <!-- Next / Previous controls here -->
                <a class="left carousel-control" href="#carousel-modal-demo{{$key1}}" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#carousel-modal-demo{{$key1}}" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </div>
            <div class="modal-footer" >
                <div align='left'>
                    Description:  {!! nl2br($announcement->description) !!}<br>
                    Post By: {{$announcement->employee_name}}<br>
                    Department: {{$announcement->employee_department}}<br>
                    Company: {{$announcement->employee_company}}<br><br>

                    Attachment/s<br>
                    @foreach ($keys_of_attachments as $key_5 => $attachment)
                        @php 
                            $display_key = $key_5 + 1
                        @endphp
                    {{$display_key.'. '}}<a href='{{ asset(''.$attachments[$attachment]->file_path.'')}}' target='_'> {{$attachments[$attachment]->file_name}}</a><br>
                    @endforeach
                </div>
                <hr>
                <div class="row " >
                {{-- 13 images --}}
                    <div class="col-md-12" align='center'  style='padding: 0;margin: 0;list-style: none;display: flex;align-items: center;justify-content: center;'>

                            @if($count_keys_of_seen_by <= 13)
                                @foreach($keys_of_seen_by as $key_of_seen)
                                    @php
                                        $s = array_search($accounts[$key_of_seen]->seen_by, $employees_avatar_id);
                                    @endphp
                                <img title='{{$employees_avatars[$s]->employee_name}}' class='img-circle img-responsive seen ' src="{{'http://10.96.4.40:8441/hrportal/public/id_image/employee_image/'.$employees_avatars[$s]->id.'.png'}}"  alt="{{ asset('/images/no-image.png')}}" > 
                                @endforeach
                            @else
                                @foreach($keys_of_seen_by as $key_to_stop => $key_of_seen)
                                    
                                   @php
                                        $key_to_stop_a = $key_to_stop + 1;
                                        $s = array_search($accounts[$key_of_seen]->seen_by, $employees_avatar_id);
                                        if($key_to_stop_a == 14)
                                        {
                                        break;  
                                        }
                                    @endphp
                                      <img title='{{$employees_avatars[$s]->employee_name}}' class='img-circle img-responsive seen ' src="{{'http://10.96.4.40:8441/hrportal/public/id_image/employee_image/'.$employees_avatars[$s]->id.'.png'}}"  alt="{{ asset('/images/no-image.png')}}" > 
                                   
                                @endforeach
                                <span title='' class="img-circle img-responsive seen" >+{{$count_keys_of_seen_by-13}}</span> 
                            @endif
                        {{-- 
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" > 
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" > 
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" > 
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" >
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" >
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" >
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" >
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" >
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" >
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" >
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" >
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" >
                        <img title='Renz Christian Cabato' class='img-circle img-responsive seen ' src="{{ asset('/images/no_image.png')}}"  alt="{{ asset('/images/no-image.png')}}" >
                        <span title='Renz Christian Cabato' class="img-circle img-responsive seen" >+1317</span> 
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
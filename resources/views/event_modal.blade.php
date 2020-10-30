<div class="modal fade" id="event_modal{{$upcomming_event->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Title: {{$upcomming_event->title}} @if($upcomming_event->add_by == auth()->user()->id)<a href='{{ url('view-joiners/'.$upcomming_event->id.'') }}' target="_"> <button type="button" class="btn btn-outline-danger">View Joiners</button></a>@endif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{URL::asset($upcomming_event->image_path)}}" class="img-fluid rounded border border-dark" style='width:100%' alt="Image">
                <h6 class='text-left'>When: {{date('M. d, Y h:i A',strtotime($upcomming_event->date_happen))}}
                    <br> Description: {{$upcomming_event->description}}
                </h6>
            </div>
            <div class="modal-footer">
                @php
                    $keys = array_keys(array_column(collect($event_joiners)->toArray(), 'event_id'), $upcomming_event->id);
                    $d = 0;
                @endphp
                @foreach($keys as $key)
                    @if($event_joiners[$key]->user_id == auth()->user()->id)
                        @php
                            $d = 1;
                        @endphp
                    @endif
                @endforeach
                @if($d == 0)
                    <a href='{{ url('join/'.$upcomming_event->id.'') }}'><button type="button" class="btn btn-outline-success">Join</button></a>
                @else
                    <button type="button" class="btn btn-outline-success">&#10004; Joined</button>
                @endif
            </div>
        </div>
    </div>
</div>
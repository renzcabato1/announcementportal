<div id="changevote{{$poll->id}}"   class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>Vote</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form  method='POST' action='change-vote-choice/{{$poll->id}}' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body " id = "form_table">
                    {{ csrf_field() }}
                    @php 
                    $result1 =  array_search($poll->id,$poll_votes_vote); 
                    $choice = $poll_votes_a[$result1]->poll_choices_id;
                    @endphp
                   
                    <div class='row'>
                        <div class='col-md-8'>
                            <label >Title: </label>
                            <input class="form-control"  type='text' name='title' value='{{$poll->title}}' readonly>
                        </div>
                        <div class='col-md-4'>
                            <label >When: </label>
                            <input class="form-control"  type='date' value='{{$poll->date_happen}}'   readonly>
                        </div>
                    </div>
                    <label >Choices: </label>
                    @foreach($poll_choices as $poll_choice)
                        @if($poll_choice->poll_id == $poll->id)
                        <div class='row'>
                            <div class='col-md-12'>
                            <input type="radio" value='{{$poll_choice->id}}' {{ $choice == $poll_choice->id ? 'checked' : '' }} name="choice"><span>{{$poll_choice->choice}}</span>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary" >Change Vote</button>
                </div>
            </form>
        </div>
    </div>
</div>

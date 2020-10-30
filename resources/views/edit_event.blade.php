<div id="edit_event{{$event->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>Edit Event</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form  method='POST' action='edit-event/{{$event->id}}' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-6'>
                            <label style="position:relative; top:7px;color:black;font-size:120%">Title of Event: </label>
                        <input class="form-control" style='font-size:120%;' type='text' value='{{$event->title}}' name='title' required>
                        </div>
                        <div class='col-md-6'>
                            <label style="position:relative; top:7px;color:black;font-size:120%">When: </label>
                            <input class="form-control" style='font-size:120%;' type='datetime-local' value='{{date("Y-m-d\TH:i",strtotime($event->date_happen))}}' min='{{$date_minimum}}' name='date_happen'  required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label style="position:relative; top:7px;color:black;font-size:120%">Description: </label>
                            <textarea class="form-control" style='font-size:120%;' type='text' placeholder="Description" name='description' required>{{$event->description}}</textarea>
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
<div id="new_event" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>New Event</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form  method='POST' action='new-event' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-6'>
                            <label style="position:relative; top:7px;color:black;font-size:120%">Title of Event: </label>
                            <input class="form-control"   type='text' name='title' required>
                        </div>
                        <div class='col-md-6'>
                            <label style="position:relative; top:7px;color:black;">When: </label>
                        <input class="form-control"   type='datetime-local' min='{{date('Y-m-d\TH:i')}}' name='date_happen'  required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label style="position:relative; top:7px;color:black;font-size:120%">Image Background: </label>
                            <input class="form-control"   type='file' name='image_background' accept="image/*" required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label style="position:relative; top:7px;color:black;font-size:120%">Description: </label>
                            <textarea class="form-control"   type='text' placeholder="Description" name='description' required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-success" >Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
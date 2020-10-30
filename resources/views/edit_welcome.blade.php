<div id="edit_welcome" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>Edit Welcome Message</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <form  method='POST' action='edit-welcome' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-12'>
                            <label style="position:relative; top:7px;color:black;">Message: </label>
                            <textarea class="form-control" style='font-size:150%;' type='text' name='welcome_message' required> {{$welcome->welcome_message}}</textarea>
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
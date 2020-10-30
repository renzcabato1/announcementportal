<div id="new_portal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>New Portal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <form  method='POST' action='add-portal' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-5'>
                            <label style="position:relative; top:7px;color:black;font-size:16px;">Title of Portal: </label>
                            <input class="form-control" type='text' name='title' required>
                        </div>
                        <div class='col-md-5'>
                            <label style="position:relative; top:7px;color:black;font-size:16px;">Link of Portal: </label>
                            <input class="form-control" type='text' name='link' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-5'>
                            <label style="position:relative; top:7px;color:black;font-size:16px;">Upload Background Image: </label>
                            <input class="form-control" type='file' name='background_image' accept="image/x-png,image/gif,image/jpeg" required>
                        </div>
                        <div class='col-md-5'>
                            <label style="position:relative; top:7px;color:black;font-size:16px;">Upload Icon: </label>
                            <input class="form-control" type='file' name='icon_image' accept="image/x-png" required>
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
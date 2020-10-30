<div id="edit_portal{{$portal->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>Edit Portal</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <form  method='POST' action='edit-portal/{{$portal->id}}' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-5'>
                            <label style="position:relative; top:7px;color:black;float:left;">Title of Portal: </label>
                            <input style="font-size:20px"  class="form-control" type='text' name='title' value='{{$portal->title_portal}}' required>
                        </div>
                        <div class='col-md-5'>
                            <label style="position:relative; top:7px;color:black;float:left;">Link of Portal: </label>
                            <input  style="font-size:20px"   class="form-control" type='text' name='link'  value='{{$portal->link_portal}}' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-5'>
                            <img class='background_edit'  id='img' src="{{ asset($portal->image_background)}}">
                            <label style="position:relative; top:7px;color:black;font-size:16px;">Upload Background Image: </label>
                            <input style="font-size:20px"   class="form-control" type='file' name='background_image' accept="image/x-png,image/gif,image/jpeg" >
                        </div>
                        <div class='col-md-5'>
                                <img class='icon_edit'  id='img' src="{{URL::asset($portal->image_icon)}}"><br>
                            <label style="position:relative; top:7px;color:black;font-size:16px;">Upload Icon: </label>
                            <input style="font-size:20px"   class="form-control" type='file' name='icon_image' accept="image/x-png" >
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
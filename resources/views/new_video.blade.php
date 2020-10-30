<div id="new_video" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>New Video</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <form  method='POST' action='add-video' enctype="multipart/form-data" onsubmit=''  >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-12'>
                            <label style="position:relative; top:7px;color:black;font-size:16px;">Subject: </label>
                            <input class="form-control" type='text' name='subject' style='font-size:12px;' required>
                        </div>
                    </div>
                    <br>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Cover Photo</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" accept="image/*" name='frame' class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon01" required>
                                    <label class="custom-file-label" style='font-size:100%;' for="inputGroupFile02">Chose File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class='row'>
                            <div class='col-md-12'>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Video</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" accept="video/*" name='attachment' class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon01" required>
                                        <label class="custom-file-label" style='font-size:100%;' for="inputGroupFile03">Chose File</label>
                                    </div>
                                </div>
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
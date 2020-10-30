<div id="edit_bulletin{{$bulletin->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>Edit Bulletin</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <form  method='POST' action='add-bulletin' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-12'>
                            <label style="position:relative; top:7px;color:black;">Title: </label>
                            <input class="form-control" style='font-size:100%;' type='text' value='{{$bulletin->title}}' name='title' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">PDF</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" value='{{}}' accept="application/pdf" name='attachment' class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                                    <label class="custom-file-label" style='font-size:100%;' for="inputGroupFile01">Choose File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary" >Save</button>
                    </div>
                </div>
            </form>
            <script>
                    $('#inputGroupFile01').on('change',function(){
                        //get the file name
                        var fileName = $(this).val();
                        //replace the "Choose a file" label
                        $(this).next('.custom-file-label').html(fileName);
                    })
                </script>
        </div>
    </div>
</div>
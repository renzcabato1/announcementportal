<div id="cancel_resignation" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>Cancel Resignation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form  method='POST' action='cancel-resignation' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-12'>
                            <label >Cancel Resignation Remarks: </label>
                            <textarea class="form-control"  type='text' placeholder="Description" name='cancel_resignation' required></textarea>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label >Upload attachment</label>
                            <input type="file" class="form-control" name='attachment' id="file-upload" required>
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
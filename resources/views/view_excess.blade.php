<div id="view_excess{{$for_app->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>Excess Usage</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form  method='POST' action='verify-excess/{{$for_app->id}}' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body">
                    {{ csrf_field() }}
                  
                    <div class='row'>
                        <div class='col-md-6'>
                            <label>Official Business Amount: </label>
                        <input class="form-control" value='{{$for_app->official_business}}' step=".01"  type='number' min='0'  name='official_business'  required>
                        </div>
                        <div class='col-md-6'>
                            <label>Personal Expense: </label>
                             <input class="form-control" value='{{$for_app->personal_expense}}' step=".01" type='number' min='0' name='personal_expense'  required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <label>View Billing: </label> 
                            <a href='http://10.96.4.118:8668/{{$for_app->bill_upload_info->file_path}}' target='_blank'>View Bill</a>
                        </div>
                        <div class='col-md-6'>
                            <label>Period: </label> 
                            {{date('F Y',strtotime($for_app->bill_upload_info->date_from))}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Remarks / Reason: </label> <br>
                            <p>{{$for_app->remarks}}</p>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Remarks </label>
                            <textarea class="form-control"    type='text' placeholder="Remarks" name='reason' required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-success" >Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="view_request{{$b->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>Excess Usage</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            {{-- <form  method='POST' action='save-excess/{{$b->id}}' enctype="multipart/form-data" onsubmit='show()' > --}}
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Approver: {{$employee_bu_head->employee_head_info->first_name." ".$employee_bu_head->employee_head_info->last_name}}</label> <br>
                            <label><input class='form-control' name='approver_id' value='{{$employee_bu_head->employee_head_info->user_id}}' type='hidden'></label> <br>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <label>Official Business Amount: </label>
                        <input class="form-control" readonly @if($b->excessusage != null) value='{{$b->excessusage->official_business}}' @endif  step=".01"  type='number' min='0'  name='official_business'  required>
                        </div>
                        <div class='col-md-6'>
                            <label>Personal Expense: </label>
                             <input class="form-control" readonly @if($b->excessusage != null) value='{{$b->excessusage->personal_expense}}' @endif  step=".01" type='number' min='0' name='personal_expense'  required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Remarks / Reason: </label>
                            <textarea class="form-control" readonly   type='text' placeholder="Remarks / Reason" name='reason' required>@if($b->excessusage != null){{$b->excessusage->remarks}}@endif</textarea>
                        </div>
                    </div>
                    <hr>
                    <h4 class="modal-title" style='color:black'>Approver </h4>
                    <div class='row'>
                        <div class='col-md-6'>
                            <label>Official Business Amount: </label>
                        <input class="form-control" readonly @if($b->excessusage != null) value='{{$b->excessusage->official_business_verified}}' @endif  step=".01"  type='number' min='0'  name='official_business'  required>
                        </div>
                        <div class='col-md-6'>
                            <label>Personal Expense: </label>
                             <input class="form-control" readonly @if($b->excessusage != null) value='{{$b->excessusage->personal_expense_verified}}' @endif  step=".01" type='number' min='0' name='personal_expense'  required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label>Remarks / Reason: </label>
                            <textarea class="form-control" readonly   type='text' placeholder="Remarks / Reason" name='reason' required>@if($b->excessusage != null){{$b->excessusage->approver_remarks}}@endif</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{-- <button type="submit"  class="btn btn-success" >Save</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
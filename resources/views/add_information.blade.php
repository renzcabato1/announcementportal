<div id="add-resignation" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>Please input the needed information below so we can get in touch with you for updates on your clearance.</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form  method='POST' action='add-resignation' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-6'>
                            <label >Personal Email Address<span style='color:red;'>*</span> : </label>
                            <input class='form-control' name='personal_email' value='@if($personal_info != null) {{$personal_info->email_add}} @endif' type='email' required>
                        </div>
                        <div class='col-md-6'>
                            <label >Mailing Address: </label>
                            <input class='form-control' name='mailing_address' value='@if($personal_info != null) {{$personal_info->mailing_address}} @endif' type='text'>
                        </div>
                        {{-- <div class='col-md-6'>
                            <label >Landline: </label>
                            <input class='form-control' name='landline' type='text'  value='@if($personal_info != null) {{$personal_info->landline}} @endif' >
                        </div> --}}
                        <div class='col-md-6'>
                            <label >Personal Phone Number (Landline): </label>
                            <input class='form-control' name='personal_landline' type='text'  value='@if($personal_info != null) {{$personal_info->phone_number_landline}} @endif' >
                        </div>
                        <div class='col-md-6'>
                            <label >Personal Phone Number (Mobile)<span style='color:red;'>*</span> : </label>
                            <input class='form-control' name='personal_mobile' type='text'  value='@if($personal_info != null) {{$personal_info->phone_number_mobile}} @endif' required>
                        </div>
                        <div class='col-md-6'>
                            <label >Date of Effectivity of Resignation<span style='color:red;'>*</span><br></label>
                            <input type="date" class="form-control" min='@if(!auth()->user()->resign())@endif'  value='@if(auth()->user()->resign()){{auth()->user()->resign()->last_day}}@endif' name='last_day' placeholder="Last Day" @if(auth()->user()->resign()) readonly @endif required>
                        </div>
                        {{-- <div class='col-md-6'>
                            <label >Actual Last Day to Report for Work: </label>
                            <input type="date" class="form-control" min='{{date('Y-m-d', strtotime("+2 week"))}}'  value='@if($personal_info != null){{$personal_info->last_date_work}}@endif' name='last_day_work' id="last_day" placeholder="Last Day" required>
                        </div> --}}
                        @if(!auth()->user()->resign())
                        <div class='col-md-6'>
                            <label >Please upload your resignation letter. <span style='color:red;'>*</span></label>
                            <input type="file" class="form-control" accept="application/pdf" name='attachment' id="file-upload" required>
                        </div>
                        @else
                        <div class='col-md-6'>
                                <label >Resignation Letter. <span style='color:red;'>*</span></label><br>
                            <a class='bulletin_pallet' href='{{ asset(''.auth()->user()->resign()->pdf_url.'')}}' target='_'>Download</a><br>
                        </div>
                        @endif
                        <div class='col-md-12 mt-5'>
                            <label ><input type='checkbox' required>This is to authorize the company to deduct from my accrued wages, or any kind of compensation due to me, my outstanding obligation or debt as may be reflected in my clearance form. I understand that this is without prejudice to the results of an audit investigation if any, conducted after clearance has been granted.</label>
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
<div id="new_polls" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>New Poll</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form  method='POST' action='new-poll' enctype="multipart/form-data" onsubmit='show()' >
                <div class="modal-body " id = "form_table">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-8'>
                            <label style="position:relative; top:7px;color:black;font-size:120%">Subject: </label>
                            <input class="form-control" style='font-size:120%;' type='text' name='title' required>
                        </div>
                        <div class='col-md-4'>
                            <label style="position:relative; top:7px;color:black;font-size:120%">When: </label>
                            <input class="form-control" style='font-size:120%;' type='date' min='{{$date_today}}' name='date_happen'  required>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col-md-12'>
                            <label style="position:relative; top:7px;color:black;font-size:120%">Choices: </label>
                            <input class="form-control" style='font-size:120%;' type='text' name='choices[]' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <input class="form-control" style='font-size:120%;' type='text' name='choices[]' required>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-body ">
                    <div class='row'>
                        <div class='col-md-12'>
                            <button type="button" id='add_more' class='btn btn-success addmore'>+ New Choice</button>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-success" >Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function()
    {
        $(".addmore").on('click', function () 
        {
            var data = "<div id='data' class='row' style='margin:0px;padding:0px;'><div class='col-md-11' style='margin:0px;padding:0px;'>";
                data += "<input class='form-control' style='font-size:120%;' type='text' name='choices[]' required></div><div class='col-md-1' style='margin:0px;padding:0px;'><a  href='javascript:void(0);' class='removeButton' style='color:red;font-size:200%;text-align:center'><span class=''>X</span> </a></div>";
                $('#form_table').append(data);
            });
            $('#form_table').on('click', '.removeButton', function()
            {
                $("#data").remove();
                document.getElementById("add_more").disabled = false;
            });
        });
    </script>
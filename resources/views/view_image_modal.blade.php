<div id="view_image{{$image->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                   
                <h4 class="modal-title" style='color:black'> {{$image->file_name}}</h4>
                </div>
                <div class="modal-body" >
                    <div class="img-container">
                        <img data-src="holder.js/280x100" src='{{ asset(''.$image->file_path.'')}}'>
                    </div>
                </div>
            </div>
        </div>
    </div>
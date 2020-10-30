<div class='body body_background'  >
	<div style="background-color:rgba(255,215,66,.8);height: 100vh;width:100%;">
		<div class='row headline_head '>
			<div class='col-md-2'>
				<img src="{{URL::asset('login_css/MyPortal1.png')}}" class="img-fluid"  alt="Logo"  >
			</div>
			<div class='col-4 '>
			</div>
			<div class='col-md-6 '>
				<span class='headline_text'><b>HEADLINES</b></span>
				<a href="#"  title='New Headline' data-toggle="modal" data-target="#new_headline" > 
					<span class="glyphicon glyphicon-plus" style='color:darkgreen;font-size:200%;font-weight:bold;'>New</span>
				</a>	
				@if(session()->has('satus_headline'))
				<span style='color:green;font-size:200%;' class="label label-success"> {{session()->get('satus_headline')}}</span>
				@endif
			</div>
		</div>
		<div class='row headline_body '>
			<div class='col-md-6' style='margin-left:10px;' >
				<div class='row' style='width:100%;height:100%;'  >
					<div class='col-md-11 application_header' >
						<div style='height:10%;' >
							<i>Apps link to portals</i>
							@if($role->role_id == 1)
							<a href="#" id='cpu' title='new_portal' data-toggle="modal" data-target="#new_portal" > 
								<span class="glyphicon glyphicon-plus" style='color:darkgreen;font-size:50%;font-weight:bold;'>New</span>
							</a>
							@endif
							@if(session()->has('status'))<span style='color:green;font-size:50%;' class="label label-success"> {{session()->get('status_portal')}}</span>@endif
							@include('new_portal')
						</div>
						<input type="text" id="Search" onkeyup="myFunction()" class='form-control' placeholder="Search" style='color:black' >
						<div class='dropdown'  style='height:90%;overflow-y: scroll;overflow-x:hidden;max-height:70vh;padding-top:10px;scrollbar-width: 0px; '>
							
							@if($role->role_id == 1)
							<div class="linha"  id='linha' >
								@foreach($portals as $portal)
								<div class="tile tile_image_background target " style="background-image: url('{{ asset($portal->image_background)}}') ;" >
									<a  href='#' title='edit' data-toggle="modal" data-target="#edit_portal{{$portal->id}}"  ><span  class="glyphicon glyphicon-edit " style="color:#1ac6ff;font-size:100%;"></span></a>
									<a href='remove-portal/{{$portal->id}}' onclick='show()' title='remove'><span  class="glyphicon glyphicon-remove" style="color:red;font-size:100%;"></span></a>
									
									<a class='' href="{{$portal->link_portal}}" target="_" title='{{$portal->title_portal}}' >
										<img  class='image_tile'  id='img' src="{{URL::asset($portal->image_icon)}}"> 
										<p class='p' >{{$portal->title_portal}}</p>
									</a>
								</div> 
								@include('edit_portal')
								@endforeach
							</div> 
							@else
							<div class="linha"  >
								@foreach($portals as $portal)
								<a  class='target' href="{{$portal->link_portal}}" target="_" title='{{$portal->title_portal}}'>
									<div class="tile tile_image_background" style="background-image: url('{{ asset($portal->image_background)}}') ;">
										<img  class='image_tile'  id='img' src="{{URL::asset($portal->image_icon)}}"> 
										<p class='p' >{{$portal->title_portal}}</p>
									</div> 
								</a>	
								@endforeach
							</div> 
							@endif
						</div>
					</div>
					<div class='col-md-1 '>
						<div class="vl_headline"></div>
					</div>
				</div>
			</div>
			<style>
				#photos {
					/* Prevent vertical gaps */
					line-height: 0;
					
					-webkit-column-count: 100;
					-webkit-column-gap:   10px;
					-moz-column-count:    100;
					-moz-column-gap:      10px;
					column-count:         5;
					column-gap:           10px;  
				}
				#photos  a  img {
					/* Just in case there are inline attributes */
					width: 100% !important;
					height: auto !important;
					padding: 10px;
				}
			</style>
			<div class='col-md-5 '>
				
					<br>
				<div class='row gallery_height'>
					<section id="photos">
						@foreach($headlines as $headline)
						@php
						$key = array_search($headline->add_by, array_column($users, 'id'));
						@endphp
						@if($headline->type == 'image')
						<a href='#' data-target="#myModal{{$headline->id}}" data-toggle="modal" title='Subject: {{$headline->subject}}&#13;Post By : {{$users[$key]['name']}}&#13;Post Date : {{date('M d, Y',strtotime($headline->created_at))}}' target='_' ><img class='zoom' src='{{URL::asset($headline->tile_url)}}' style='width:100%;' class=' ' style='vertical-align:middle;' ></a>
						<div id="myModal{{$headline->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-body">
										<img src="{{URL::asset($headline->tile_url)}}" style='width:100%;' class="img-responsive">
									</div>
								</div>
							</div>
						</div>
						@if($headline->add_by == auth()->user()->id)
						<a href='remove-headline/{{$headline->id}}' onclick='show()' title='remove'><span  class="glyphicon glyphicon-remove" style="color:red;font-size:200%;">Delete</span></a>
						@endif
						@else
						<a  data-target="#myModal{{$headline->id}}" data-toggle="modal"  href='#'  title='Subject: {{$headline->subject}}&#13;Post By : {{$users[$key]['name']}}&#13;Post Date : {{date('M d, Y',strtotime($headline->created_at))}}' target='_' >
								<img class='zoom'  src='{{URL::asset('/upload_headline/images.jpg')}}'  class=' '  >
							</a>
							
							<div id="myModal{{$headline->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-body">
											<video style='width:100%;' controls src="{{URL::asset($headline->tile_url)}}"> </video>
										</div>
									</div>
								</div>
							</div>
							@if($headline->add_by == auth()->user()->id)
						<a href='remove-headline/{{$headline->id}}' onclick='show()' title='remove'><span  class="glyphicon glyphicon-remove" style="color:red;font-size:200%;">Delete</span></a>
						@endif
						@endif
						@endforeach
					</section>
				</div>
				@include('new_headline')
			</div>
		</div>
	</div>
</div>
<script>
	function myFunction() {
		var input = document.getElementById("Search");
		var filter = input.value.toLowerCase();
		var nodes = document.getElementsByClassName('target');
		
		for (i = 0; i < nodes.length; i++) {
			if (nodes[i].innerText.toLowerCase().includes(filter)) {
				nodes[i].style.display = "";
			} else {
				nodes[i].style.display = "none";
			}
		}
	}
</script>

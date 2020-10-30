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
				{{-- <a href="#"  title='New Headline' data-toggle="modal" data-target="#new_headline" > 
					<span class="glyphicon glyphicon-plus" style='color:darkgreen;font-size:200%;'></span>
				</a>	 --}}
				@if(session()->has('satus_headline'))
				<span style='color:green;font-size:200%;' class="label label-success"> {{session()->get('satus_headline')}}</span>
				@endif
			</div>
		</div>
		<div class='row headline_body '>
			<div class='col-md-6' style='margin-left:20px;' >
				<div class='row' style='width:100%;height:100%;'  >
					<div class='col-md-11 application_header' >
						
						<div style='height:10%;' ><i>Apps link to portals</i>
							{{-- <a href="#" id='cpu' title='new_portal' data-toggle="modal" data-target="#new_portal" > 
								<span class="glyphicon glyphicon-plus" style='color:darkgreen;font-size:50%'></span>
							</a> --}}
							@if(session()->has('status'))<span style='color:green;font-size:50%;' class="label label-success"> {{session()->get('status_portal')}}</span>@endif
							@include('new_portal')
						</div >
						<input type="text" id="Search" onkeyup="myFunction()" class='form-control' placeholder="Search" style='color:black' >
						
						<div class='dropdown'  style='height:90%;overflow-y: scroll;overflow-x:hidden;max-height:70vh;padding-top:10px;scrollbar-width: 0px; '>
							<div class="linha" id='linha' >
								@foreach($portals as $portal)
								<a href="{{$portal->link_portal}}" class='target' target="_" title='{{$portal->title_portal}}'>
									<div class="tile tile_image_background" style="background-image: url('{{ asset($portal->image_background)}}') ;">
										<img  class='image_tile'  id='img' src="{{URL::asset($portal->image_icon)}}"> 
										<p  class='p' >{{$portal->title_portal}}</p>
									</div> 
								</a>	
								@endforeach
							</div> 
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
					
					-webkit-column-count: 5;
					-webkit-column-gap:   0px;
					-moz-column-count:    5;
					-moz-column-gap:      0px;
					column-count:         5;
					column-gap:           0px;  
					
				}
				#photos a img {
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
						<a  data-target="#myModal{{$headline->id}}" data-toggle="modal"  href='#'  title='Subject: {{$headline->subject}}&#13;Post By : {{$users[$key]['name']}}&#13;Post Date : {{date('M d, Y',strtotime($headline->created_at))}}' target='_' >
							<img class='zoom'  src='{{URL::asset($headline->tile_url)}}'  class=' '  >
						</a>
						
						<div id="myModal{{$headline->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-body">
										<img src="{{URL::asset($headline->tile_url)}}" style='width:100%;' class="img-responsive">
									</div>
								</div>
							</div>
						</div>
						@else
						<a  data-target="#myModal{{$headline->id}}" data-toggle="modal"  href='#'  title='Subject: {{$headline->subject}}&#13;Post By : {{$users[$key]['name']}}&#13;Post Date : {{date('M d, Y',strtotime($headline->created_at))}}' target='_' >
							<img class='zoom'  src='{{URL::asset('/upload_headline/images.jpg')}}'  class=' '  >
						</a>
						
						<div id="myModal{{$headline->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-body">
										<video  class='zoom' style='width:100%;' controls src="{{URL::asset($headline->tile_url)}}"> </video>
									</div>
								</div>
							</div>
						</div>
						@endif
						@endforeach
						
					</section>
					@include('new_headline')
				</div>
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

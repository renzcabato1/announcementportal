<div class='firstbody'>
	<div class='header ' style='background-color:rgb(255,255,255,0.8);border-bottom-left-radius:40%;border-bottom-right-radius:40%;'>
		<img src="{{URL::asset('login_css/logo.png')}}" style='margin: auto;' alt="Logo" class='img-fluid' >
		@if($resigned)
		<div class='topcorner'>
			@if(session()->has('status_resignation'))<span style='color:green;font-size:150%;margin:auto;width:100%;text-align:center;display:inline-block;' class="label label-success"> {{session()->get('status_resignation')}}</span><br>@endif
			<span style='color:red;font-size:24px;'>You may now upload your Resignation Letter!</span>
			<form  method='POST' action='add-resignation' enctype="multipart/form-data" onsubmit='show()' >
				{{ csrf_field() }}
			<div style='margin:auto;width:100%;text-align:center;display:inline-block;'>
				@if($resigned_letter)
				<a class='bulletin_pallet' href='{{ asset(''.$resigned_letter->upload_pdf_url.'')}}' target='_'>{{$resigned_letter->upload_pdf_name}}</a>
			
				<input style='position: relative;display: none;margin : 0 auto;' type="file" title="Change Letter" accept="application/pdf" name='attachment' id="file-upload"  required><br>
				<label for="file-upload" class="btn btn-success" > Change Letter </label><br>
				<br>
				@else
				<input style='position: relative;display: block;margin : 0 auto;' type="file" title="Change Letter" accept="application/pdf" name='attachment' id="file-upload"  required><br>
				
				@endif
				<button type="submit"  class="btn btn-primary" >Submit</button>
			</div>
		</form>
		</div>
		@endif
	</div>
	<div class='row logo11212' style='margin:0px;'>
		<div class='col-4'>
		</div>
		<div class='col-md-4'>
			<div class='logo11212'>
				<img src="{{URL::asset('login_css/MyPortal1.png')}}"  alt="Logo"  class='my_portal img-fluid'>
			</div>
		</div>
	</div>
	<div class='middle' style='background-color:rgba(255,215,66,.8);border-top-left-radius:45%;border-top-right-radius:45%;'>
	</div>
	<div class='row bottom' style='background-color:rgba(255,215,66,.8);'>
		<div class='col-md-6 ' style='width:100%;height:100%' >
			<div class='row' style='width:100%;height:100%;text-align:'  >
				<div class='col-md-2 ' >
				</div>
				@if($name == null)
				<div class='col-3 ' >
					<img src="{{asset('images/no_image.png')}}" class='rounded-circle img-fluid ' style='border: 5px solid white;'  >
				</div>
				<div class='col-md-6 greetings' >
					<span class='hello'>Hello</span><br>
					<span class='name'>{{auth()->user()->name}}!</span>
				</div>
				@else
				<div class='col-3 ' >
					<img src="{{'http://10.96.4.40:8441/hrportal/public/id_image/employee_image/'.$name->id.'.png'}}" class='rounded-circle img-fluid ' style='border: 5px solid white;'  >
				</div>
				<div class='col-md-6 greetings' >
					<span class='hello'>Hello</span><br>
					<span class='name'>{{$name->first_name}}!</span>
				</div>
				@endif
				<div class='col-1 '>
					<div class="vl"></div>
				</div>
			</div>
		</div>
		<div class='col-md-5 '  style='width:100%%;'>
			<p>
				<span class='welcome'><b><i>Welcome!</i></b><a href='#' title='change' data-toggle="modal" data-target="#edit_welcome" ><span  class="glyphicon glyphicon-edit " style="color:darkgreen;font-size:50%;"></span></a>@if(session()->has('status'))<span style='color:green;font-size:30%;' class="label label-success"> {{session()->get('status')}}</span>@endif</span><br>
				<span class='paragraph'><i>{{$welcome->welcome_message}}</i></span>
			</p>
			@include('edit_welcome')
		</div>
	</div>
</div>

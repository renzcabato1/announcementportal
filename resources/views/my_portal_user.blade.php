<div class='firstbody'>

	<div class='header ' style='background-color:rgb(255,255,255,0.8);border-bottom-left-radius:40%;border-bottom-right-radius:40%;'>
		<img src="{{URL::asset('login_css/logo.png')}}" style='margin: auto;' alt="Logo" class='img-fluid' >
		@if($resigned)
		<div class='topleftcorner'>
			@if($resigned->survey_id)
			<span style='color:green;font-size:24px;'>You successfully submitted your Exit Interview! </span>
			<div style='margin:auto;width:100%;text-align:center;display:inline-block;'>
				<button title='Survey' data-toggle="modal" data-target="#view_survey{{$resigned->survey_id}}" class="btn btn-success"  >View Survey</button>
			</div>
			@include('view_survey')
			@else
			@if(session()->has('status_survey'))<span style='color:green;font-size:150%;margin:auto;width:100%;text-align:center;display:inline-block;' class="label label-success"> {{session()->get('status_survey')}}</span><br>@endif
			
			<span style='color:red;font-size:24px;'>You may now fill up survey form!</span>
			
			<div style='margin:auto;width:100%;text-align:center;display:inline-block;'>
				<button title='Survey' data-toggle="modal" data-target="#survey{{$resigned->upload_pdfs_id}}" class="btn btn-success"  >Survey</button>
			</div>
			@include('survey')
			@endif
		</div>
		@if($resigned->upload_pdf_id == null)
		<div class='topcorner'>
			@if(session()->has('status_resignation'))<span style='color:green;font-size:150%;margin:auto;width:100%;text-align:center;display:inline-block;' class="label label-success"> {{session()->get('status_resignation')}}</span><br>@endif
			<span style='color:red;font-size:24px;'>You may now upload your Resignation Letter!</span>
			<form  method='POST' action='add-resignation/{{$resigned->upload_pdfs_id}}' enctype="multipart/form-data" onsubmit='show()' >
				{{ csrf_field() }}
				<div style='margin:auto;width:100%;text-align:center;display:inline-block;'>
					@if($resigned->letters_id)
					<a class='bulletin_pallet' href='{{ asset(''.$resigned->pdf_url.'')}}' target='_'>Resignation Letter</a>
					
					<input style='position: relative;display: none;margin : 0 auto;' type="file" title="Change Letter" accept="application/pdf" name='attachment' id="file-upload"  required><br>
					<label for="file-upload" class="btn btn-success" > Change Letter </label>
					
					<br>
					<br>
					@else
					<input style='position: relative;display: block;margin : 0 auto;' type="file" title="Change Letter" accept="application/pdf" name='attachment' id="file-upload"  required><br>
					
					@endif
					<button type="submit"  class="btn btn-primary" >Submit</button>	<button type="submit" title='Cancel Resignation' data-toggle="modal" data-target="#cancel_resignation" class="btn btn-danger"  >Cancel</button>
				</div>
			</form>
			@include('cancel_resignation')
		</div>
		@else
		@if($resigned->status == null)
		<div class='topcorner'>
			<span style='color:red;font-size:24px;'>Your Request has been sent. Waiting for the approval!</span>
		</div>
		@else
		<div class='topcorner'>
			@if(session()->has('status_resignation'))<span style='color:green;font-size:150%;margin:auto;width:100%;text-align:center;display:inline-block;' class="label label-success"> {{session()->get('status_resignation')}}</span><br>@endif
			<span style='color:red;font-size:24px;'>You may now upload your Resignation Letter!</span>
			<form  method='POST' action='add-resignation/{{$resigned->upload_pdfs_id}}' enctype="multipart/form-data" onsubmit='show()' >
				{{ csrf_field() }}
				<div style='margin:auto;width:100%;text-align:center;display:inline-block;'>
					@if($resigned->letters_id)
					<a class='bulletin_pallet' href='{{ asset(''.$resigned->pdf_url.'')}}' target='_'>Resignation Letter</a>
					
					<input style='position: relative;display: none;margin : 0 auto;' type="file" title="Change Letter" accept="application/pdf" name='attachment' id="file-upload"  required><br>
					<label for="file-upload" class="btn btn-success" > Change Letter </label>
					<button type="submit" title='Cancel Resignation' data-toggle="modal" data-target="#cancel_resignation" class="btn btn-danger"  >Cancel</button>
					<br>
					<br>
					@else
					<input style='position: relative;display: block;margin : 0 auto;' type="file" title="Change Letter" accept="application/pdf" name='attachment' id="file-upload"  required><br>
					@endif
					<button type="submit"  class="btn btn-primary" >Submit</button>	<button type="submit" title='Cancel Resignation' data-toggle="modal" data-target="#cancel_resignation" class="btn btn-danger"  >Cancel</button>
					
				</div>
			</form>
			@include('cancel_resignation')
		</div>
		@endif
		@endif
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
				<div class='col-3 ' >
					<img src="{{'http://10.96.4.40:8441/hrportal/public/id_image/employee_image/'.$name->id.'.png'}}" class='rounded-circle img-fluid ' style='border: 5px solid white;'  >
				</div>
				<div class='col-md-6 greetings' >
					<span class='hello'>Hello</span><br>
					<span class='name'>{{$name->first_name}}!</span>
				</div>
				<div class='col-1 '>
					<div class="vl"></div>
				</div>
			</div>
		</div>
		<div class='col-md-5 '  style='width:100%%;'>
			<p>
				<span class='welcome' ><b><i>Welcome!</i></b></span>
				<br>
				<span class='paragraph'><i>{{$welcome->welcome_message}}</i></span>
			</p>
		</div>
	</div>
</div>

<div class='bulletin_body' id='bulletin_body'>
	<div class='row header_bulletin ' style='background-color:#ffd742;border-bottom-left-radius:40%;border-bottom-right-radius:40%;'>
		<div class='col-md-2 '>
			<img src="{{URL::asset('login_css/MyPortal1.png')}}"  alt="Logo" class="img-fluid"  >
		</div>
		<div class='col-md-7 profile_header'>
			<img src="{{'http://10.96.4.40:8441/hrportal/public/id_image/employee_image/'.$name->id.'.png'}}" class='rounded-circle  profile_h'  >
			<p class='whole_name'><i>{{auth()->user()->name}}</i></p>
		</div>
		<div class='col-md-3 count_down'>
			{{-- <span class='count_down_text' id='count_down'>
			</span> --}}
		</div>
	</div>
	<div style='height:10%;'>
		
	</div>
	<div class='row bulletin_bottom '>
		<div class='col-md-8 ' >
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style='border: 2px solid #ffd742'>
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100 img-fluid"  src="{{URL::asset('login_css/1.jpg')}}" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 img-fluid" src="{{URL::asset('login_css/2.jpg')}}" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 img-fluid" src="{{URL::asset('login_css/3.jpg')}}" alt="Third slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 img-fluid" src="{{URL::asset('login_css/4.jpg')}}" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		<br>
        <p class='carosel_text'>
            {{-- <a href='#' title='edit' data-toggle="modal" data-target="#edit_description" >
        <span  class="glyphicon glyphicon-edit " style="color:red;font-size:100%;"></span></a> --}}
        {{$slideshow->description}}</p>
		@include('edit_description')
		</div>
		<div class='col-md-1 vl_bulletin'>
		</div>
		<div class='col-md-3 bulletin'>
			<span class='bulletin_text'><b>BULLETIN</b>
				{{-- <a href="#"  title='new_bulletin' data-toggle="modal" data-target="#new_bulletin" > 
					<span class="glyphicon glyphicon-plus" style='color:darkgreen;font-size:50%;'></span>
				</a> --}}
				@if(session()->has('status'))<span style='color:green;font-size:50%;' class="label label-success"> {{session()->get('status_bulletin')}}</span>@endif
				@include('new_bulletin')
			</span>
			<div class='bulletin_files'>
				@foreach($bulletins as $bulletin)
				<div class='bulleting_spacing '>
					<a  class='bulletin_pallet' href='{{ asset(''.$bulletin->file_path.'')}}' target='_'>{{$bulletin->title}}</a>
					{{-- <a href='#' title='edit' data-toggle="modal" data-target="#edit_bulletin{{$bulletin->id}}" ><span  class="glyphicon glyphicon-edit " style="color:#1ac6ff;font-size:100%;"></span></a> --}}
					{{-- <a href='remove-bulletin/{{$bulletin->id}}' onclick='show()' title='remove'><span  class="glyphicon glyphicon-remove" style="color:red;font-size:100%;"></span></a> --}}
					{{-- @include('edit_bulletin') --}}
				</div>
				
				@endforeach
			</div>
			
		</div>
		
	</div>
</div>
{{-- <script>
	// Set the date we're counting down to
	var countDownDate = new Date("Mar 5, 2019 15:37:25").getTime();
	
	// Update the count down every 1 second
	var x = setInterval(function() {
		
		// Get todays date and time
		var now = new Date().getTime();
		
		// Find the distance between now and the count down date
		var distance = countDownDate - now;
		
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		
		// Output the result in an element with id="demo"
		document.getElementById("count_down").innerHTML = days + "d " + hours + "h "
		+ minutes + "m " + seconds + "s ";
		
		// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("count_down").innerHTML = "EXPIRED";
		}
	}, 1000);
	
	
	// Set the date we're counting down to
	var countDownDate = new Date("Mar 5, 2019 15:37:25").getTime();
	
	// Update the count down every 1 second
	var x = setInterval(function() {
		
		// Get todays date and time
		var now = new Date().getTime();
		
		// Find the distance between now and the count down date
		var distance = countDownDate - now;
		
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		
		// Output the result in an element with id="demo"
		document.getElementById("count_down_1").innerHTML = days + "d " + hours + "h "
		+ minutes + "m " + seconds + "s ";
		
		// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("count_down_1").innerHTML = "EXPIRED";
		}
	}, 1000);
</script>    --}}
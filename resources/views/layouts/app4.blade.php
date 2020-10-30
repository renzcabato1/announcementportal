<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('/images/MYPORTAL_icon.ico')}}"/>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/body/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('/body/css/simple-sidebar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/headlines1/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('/headlines1/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('/headlines1/css/style.css')}}">
    
    <script src="{{ asset('login_css/jquery-3.2.1.slim.min.js') }}" ></script>
    <style>
        @font-face { 
            font-family: 'Muli'; 
            src: url('body/fonts/Muli.ttf') ; 
        } 
        body
        {
            font-family: 'Muli';
        }
        .background-image-header
        {
            background-image: url('body/images/background1.png');
            /* background-position:center; */
            background-repeat: no-repeat;
            background-size:cover;
            height: 80%;
            /* width: 100%; */
        }
        .dashboard
        {
            color:#139C18;
            font-size: 22px;
            font-weight:bold;
            padding-left:14px;
        }
        .active_active
        {
            color:#139C18;
            border:3px solid white;
        }
        .active_active_a
        {
            color:#139C18;
            border:3px solid white;
        }
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("{{ asset('/images/3.gif')}}") 50% 50% no-repeat rgb(249,249,249) ;
            opacity: .8;
            background-size:200px 120px;
        }
        .list-group-item-a
        {
            
            padding: .5rem 1.5rem;
            color:white;
        }
        .list-group-item-a:hover{
            padding: .5rem 1.5rem;
            color:white;
            text-decoration-color: none !important;
        }
        .list-group-item
        {
            
        }
        .navbar
        {
            padding: 0px !important;
        }
        .notification {
            text-decoration: none;
            position: relative;
            display: inline-block;
        }
        .notification .badge {
            position: absolute;
            top: 0px;
            right: 0px;
            padding: 2px 5px;
            border-radius: 50%;
            background-color: green;
            color: white;
        }
        .photography-entry
        {
            height: 150px;
        }
        .image
        {
            position: relative;
        }
        .image .delete
        {
            position: absolute;
            top: -1%;
            left: 95%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            font-size: 14px;
            background-color: black;
            border: none;
            padding: 0px 7px 0px 7px;
            border-radius: 50%;
            color:#139C18;
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id = "myDiv" style="display:none;" class="loader">
    </div>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper" style='background-color:	#139C18;color:white;height:100vh;'>
            <div class="sidebar-heading" style='text-align:center;padding:0px;height:35%;'>
                <div class='background-image-header'>
                    <p style='padding-top:15px;padding-bottom:5px;' title="{{auth()->user()->name}}">Hello<strong> {{substr($name->first_name,0,1).'. '.$name->last_name}}!</strong></p>
                    <img src="{{'http://10.96.4.40:8441/hrportal/public/id_image/employee_image/'.$name->id.'.png'}}" class="rounded-circle"  style='height:150px;border:1px white solid;background-color:white; ' alt="Cinque Terre">
                    <p style='margin:0px;font-size:18px;font-weight:bold;padding-top:20px;' title="Department : {{$name->department_name}}">{{str_limit($name->department_name, 16)}}</p>
                    <p style='margin:0px;font-size:12px;' title="Position: {{$name->position}} ">{{str_limit($name->position, 20)}}</p>
                </div> 
            </div>
            <div class="list-group list-group-flush overflow-auto" style='max-height:60vh;min-height:60vh;'>
               
                </div>
                <div style='height:5vh;border:0px;text-align: center;'>
                    <a href="{{ route('logout') }}"   style='color:white;background-color:#139C18;padding: .5rem 1.25rem;'  onclick="logout(); show();"  >Log Out !</a>
                </div>
            </div>
            @yield('content')
        </div>
        <form id="logout-form"  action="{{ route('logout') }}"  method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('/body/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('/body/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            function logout(){
                event.preventDefault();
                document.getElementById('logout-form').submit();
            }
            function show() {
                document.getElementById("myDiv").style.display="block";
            }
        </script>
        <script>
            $('#inputGroupFile01').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
            $('#inputGroupFile02').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
            $('#inputGroupFile03').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
            $('#inputGroupFile04').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
            var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png",".mp4",".mov"];    
            function Validate(oForm) {
                var arrInputs = oForm.getElementsByTagName("input");
                for (var i = 0; i < arrInputs.length; i++) {
                    var oInput = arrInputs[i];
                    if (oInput.type == "file") {
                        var sFileName = oInput.value;
                        if (sFileName.length > 0) {
                            var blnValid = false;
                            for (var j = 0; j < _validFileExtensions.length; j++) {
                                var sCurExtension = _validFileExtensions[j];
                                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                    blnValid = true;
                                    break;
                                }
                            }
                            
                            if (!blnValid) {
                                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                                return false;
                            }
                        }
                    }
                }
                document.getElementById("myDiv").style.display="block";
            }
        </script>
        
        <script src="{{ asset('/headlines1/js/jquery.min.js')}}"></script>
        <script src="{{ asset('/headlines1/js/jquery-migrate-3.0.1.min.js')}}"></script>
        <script src="{{ asset('/headlines1/js/popper.min.js')}}"></script>
        <script src="{{ asset('/headlines1/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('/headlines1/js/jquery.easing.1.3.js')}}"></script>
        <script src="{{ asset('/headlines1/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('/headlines1/js/jquery.stellar.min.js')}}"></script>
        <script src="{{ asset('/headlines1/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('/headlines1/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('/headlines1/js/aos.js')}}"></script>
        <script src="{{ asset('/headlines1/js/scrollax.min.js')}}"></script>
        <script src="{{ asset('/headlines1/js/main.js')}}"></script>
    </body>
    </html>
    
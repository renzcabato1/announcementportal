
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="icon" type="image/png" href="{{ asset('/images/icon.png')}}"/> --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> --}}
    <style>
        table { 
            border-spacing: 0;
            border-collapse: collapse;
        }
        
        body{
            font-family: "Arial", Helvetica, sans-serif;
            overflow: hidden;
            margin:0px;
            padding:0px;
        }
        .videoContainer 
        {
            position:absolute;
            height:100%;
            width:100%;
            overflow: hidden;
            margin:0px;
            padding:0px;
        }

         video 
        {
            object-fit: fill;
            position: absolute;
            width:100%;
            height:100%;
        }
        
    </style>
    
</head>
<body>
    {{-- <button onclick="myFunction()" type="button">Get video length</button><br> --}}
 
    {{-- <div class='videoContainer'> --}}
        <video   id="myVideo" autoplay muted controls>
            <source src="{{URL::asset($data->video_path)}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
        </video>
    {{-- </div> --}}
    {{-- <script>
        var vid = document.getElementById("myVideo");
     
        var video = document.getElementById("myVideo");
        video.onloadeddata = function() {
            var duration = vid.duration;
            setTimeout(function(){
               window.location.reload(1);
            }, duration*1000);
        };
      
    </script> --}}
    <script type='text/javascript'>
        var vid = document.getElementById("myVideo");
        var x = document.getElementById("myVideo").autoplay;
        vid.autoplay = true;
        vid.load();
        document.getElementById('myVideo').addEventListener('ended',myHandler,true);
        // vid.autoplay = true;
        function myHandler(e) {
            if(!e) { e = window.event; }
            vid.play();
        }
    </script>
</body>
</html>
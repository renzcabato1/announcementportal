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
  <style>
        html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;  
        font-weight: 200;
        height: 100vh;
        margin: 0;
        background-image: url("{{ asset('images/background.png')}}");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: auto;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    </style>
</head>

<body>

 </body>
</html>

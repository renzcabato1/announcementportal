<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" type="image/png" href="{{ asset('/images/logo.ico')}}"/>
    <!-- Fonts -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('estilo.css') }}" rel="stylesheet">
    <script src="{{ asset('login_css/jquery-3.2.1.slim.min.js') }}" ></script>
    <script src="{{ asset('login_css/popper.min.js') }}"></script>
    <script src="{{ asset('login_css/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{ asset('login_css/bootstrap.min.css') }}" rel="stylesheet">
    
</head>
<style>
    
    .bulletin_pallet
    {
        color:black;
        font-size:150%;
    }
    .bulletin_pallet:hover
    {
        color:darkgreen;
        font-size:170%;
    }
    input.form-control{
        font-size:50%;
    }
    img.filter {
        filter: url(filters.svg#grayscale);
        /* Firefox 3.5+ */
        filter: green;
        /* IE6-9 */
        -webkit-filter: blur(3px);
        /* Google Chrome & Safari 6+ */
    }
    img.filter:hover {
        filter: none;
        -webkit-filter: none;
    }
    .header{
        display:flex;
        width:100%;
        height: 20%;
    }
    .logo11212{
        width:100%;
        text-align:center;
        height: 40%;
        display:flex;
    }
    .firstbody
    {
        height:100%;
    }
    .bottom
    {
        display:flex;
        height: 40%;
        margin:0px;
    }
    .middle
    {
        width:100%;
        height: 10%;
        margin:0px;
        
    }
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;  
        font-weight: 200;
        height: 100vh;
        margin: 0;
        background-image: url("{{ asset('login_css/background.png')}}");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: auto;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    .my_portal{
        position:absolute;
        left:0;
        right:0;
        top:32%;
        margin-left:auto;
        margin-right:auto;
        width: 80%;
    }
    .welcome
    {
        color:white;
        font-size:65px;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
    }
    .paragraph
    {
        color:white;
        font-size:32px;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
    }
    .hello
    {
        color:white;
        font-size:60px;
        font-family: Footlight MT Light; 
    }
    .name
    {
        color:#0a713d;
        font-size:50px;
        font-family: Footlight MT Light; 
    }
    .vl {
        border-right: 1px solid white;
        height: 50%;
    }
    .profile
    {
        border: 10px solid white;
        height: auto;
        width: 20vh;
    }
    .greetings
    {
        line-height: 1.3cm;
    }
    
    
    .body_background
    {
        background-color:rgba(255,215,66,.8);
        background-image: url("{{ asset('login_css/background2.jpg')}}");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: auto;
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    .headline_head{
        height: 10vh;
        width:100%;
    }
    .headline_body{
        
        height: 90vh;
        width:100%;
    }
    .headline_text
    {
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        font-size:60px;
        color:white;
        
    }
    .application_header
    {
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        font-size:39px;
        color:white;
        
    }
    .application_text
    {
        font-size:80%;
        margin:0px;
        background-color:#ffd742;
        border:0px;
    }
    .vl_headline {
        
        border-right: 2px solid white;
        height: 90%;
        
    }
    .list-group{
        overflow:scroll;
        overflow-x: hidden;
        max-height: 65vh;
    }
    .bulletin_files{
        overflow:scroll;
        overflow-x: hidden;
        max-height: 45vh;
    }
    .gallery_height{
        overflow:scroll;
        overflow-x: hidden;
        max-height: 80vh;
        width: 100%;
    }
    a
    {
        color:white;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
    }
    a:hover{ 
        color:#00a651;
        text-decoration:none;
    }
    ::-webkit-scrollbar {
        scrollbar-color: white;
        width: 3px;
    }
    ::-webkit-scrollbar-track {
    }
    ::-webkit-scrollbar-thumb {
        background: #00a651; 
    }
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }
    .dropdown::-webkit-scrollbar { 
        
    }
    /* width */
    .abcdefg::-webkit-scrollbar {
        width: 6px;
    }
    
    /* Track */
    .abcdefg::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    
    /* Handle */
    .abcdefg::-webkit-scrollbar-thumb {
        background: #888; 
    }
    
    /* Handle on hover */
    .abcdefg::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }
    .gallery_image
    {
        width:100%; 
        height: auto;
        
    }
    [class*="col-"] {
        background-clip: padding-box;
        border: 3px solid transparent;
    }
    .bulletin_body{
        background-color: white;
        height: 100vh;
    }
    .header_bulletin{
        display:flex;
        width:100%;
        height: 20%;
        margin:0px;
    }
    .profile_header
    {
        text-align:center;
        height: auto;
    }
    .profile_h
    {
        border: 5px solid white;
        width: 10vh;
    }
    .whole_name
    {
        color:white;
        font-size:32.5px;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
    }
    .count_down
    {
        color:white;
        font-size:80px;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        float:right;
    }
    .count_down_text
    {
        font-size:40px;
    }
    .bulletin_bottom{
        display:flex;
        width:100%;
        height: 60%;
        margin:0px;
    }
    .vl_bulletin
    {
        border-right: 1px solid #ffd742;
        height: 80%;
    }
    .carosel_text
    {
        color:#7baa7d;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        font-size:18px;
    }
    .bulletin_text
    {
        color:#ffd84b;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        font-size:24px;
    }
    .bulletin_text_inside
    {
        color:#0f4600;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        font-size:18px;
        
    }
    .bulleting_spacing
    {
        line-height: .7cm;
    }
    .events{
        background-color: white;
        height: 100vh;
    }
    .header_events{
        display:flex;
        width:100%;
        height: 20vh;
        margin:0px;
    }
    .profile_header
    {
        text-align:center;
        height: auto;
    }
    
    .whole_name
    {
        color:white;
        font-size:32.5px;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
    }
    .count_down
    {
        color:white;
        font-size:80px;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        float:right;
    }
    .count_down_text
    {
        font-size:60px;
        float:right;
    }
    .events_bottom{
        display:flex;
        width:100%;
        height: 65vh;
        margin:0px;
    }
    .vl_events
    {
        border-right: 1px solid #ffd742;
        height: 80%;
        overflow:scroll;
        overflow-x: hidden;
        
    }
    .carosel_text
    {
        color:#7baa7d;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        font-size:18px;
    }
    .events_text
    {
        color:#ffd742;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        font-size:24px;
    }
    .events_text_inside
    {
        color:#184c03;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        font-size:18px;
        
    }
    .company
    {
        color:white;
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        font-size:22px;
        text-align:right;
        float:right
    }
    .events_spacing
    {
        line-height: 1.3cm;
    }
    p span 
    {
        display: block;
        line-height: 1.3cm;
    }
    div.a {
        line-height: normal;
    }
    .footer{
        display:flex;
        width:100%;
        height: 5vh;
        margin:0px;
        background-color: #ffd742;
    }
    .company_a
    {
        float:right;
    }
    .image_portal{
        float: left;
        margin: 0 0 10px 0;
        padding: 2px;
    }
    #photos {
        /* Prevent vertical gaps */
        
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
    
    @media screen and (max-width: 1430px) and (max-height: 690px) {
        body {
            zoom: 80%;
        }
    } 
    
    div.topcorner{
        position:absolute;
        top:10px;
        right: 10px;
        border: 1px solid black;
    }
    div.topleftcorner{
        position:absolute;
        top:10px;
        left: 10px;
        border: 1px solid black;
    }
</style>
<body class="abcdefg">
    
    <div id = "myDiv" style="display:none;" class="loader">
    </div>
    @if(session()->has('submit'))
    @if(session()->get('submit') == 2)
    <script>
        $(function() {
            $('html, body').animate({
                scrollTop: $("#body").offset().top
            }, 5);
        });
    </script>
    @elseif(session()->get('submit') == 3)
    <script>
        $(function() {
            $('html, body').animate({
                scrollTop: $("#bulletin_body").offset().top
            }, 5);
        });
    </script>
    @elseif(session()->get('submit') == 4)
    <script>
        $(function() {
            $('html, body').animate({
                scrollTop: $("#events_body").offset().top
            }, 5);
        });
    </script>
    @endif
    @endif
    @if($role == null)
    @include('my_portal_user')
    @include('body_user')
    @include('bulletin_body_user')
    @include('events_body_user')
    @else
    @if($role->role_id == 2)
    @include('my_portal_user')
    @include('body_user')
    @include('bulletin_body_user')
    @include('events_body_user')
    @else
    @include('my_portal')
    @include('body')
    @include('bulletin_body')
    @include('events_body')
    @endif
    @endif
    <script  type = "text/javascript">
        function show() {
            document.getElementById("myDiv").style.display="block";
        }
    </script>
</body>
</html>

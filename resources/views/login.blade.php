<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Accouncement Portal</title>
    
    <link href="{{ asset('/css/metro-all.css')}}" rel="stylesheet" />
    <link href="{{ asset('/css/start.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css')}}">
    <style>
        .design{
            color:white;
            background:rgba(1,1,1,0.7);
        } 
        html, body {
            background-color: #fff;
            font-family: 'Nunito', sans-serif;  
            font-weight: 200;
            height: 100vh;
            margin: 0;
            background-image: url("{{ asset('/images/background2.jpg')}}");
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: auto;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .login
        {
            background-color:black;
            padding:25px;
            width:400px;
            border-radius: 15px;
        }
        div.absolute
        {
            position: absolute;
            right: -250%;
            top: 20%;
        }
        @media screen and (max-width: 1360px) and (max-height: 768px) {
   body {
      zoom: 80%
   }
        }
    </style>
</head>
<body class="fg-white h-vh-100 m4-cloak design">
    <div class="container-fluid start-screen h-100">
        <h1 class="start-screen-title">Announcement Portal<span class="mif-user mif"></span>Admin</h1>
        <div class="tiles-area clear">
            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Public Announcement">
                <div  data-toggle="modal" data-target="#abcd" data-role="tile" data-size="wide" data-cover="{{ asset('/images/abcd.png')}}">
                    <span class="branding-bar design">Title: ABCD Nomination</span>
                    {{-- <span class="badge-top"  style='color:black;background:white' >1</span> --}}
                </div>
                <div data-toggle="modal" data-target="#ModalCarousel" data-role="tile" data-size="wide" data-effect="animate-slide-left">
                    <div class="slide" data-cover="{{ asset('/images/winner1.png')}}"></div>
                    <div class="slide" data-cover="{{ asset('/images/winner2.jpg')}}"></div>
                    <div class="slide" data-cover="{{ asset('/images/winner3.png')}}"></div>
                    <div class="slide" data-cover="{{ asset('/images/winner4.png')}}"></div>
                    <span class="branding-bar design" >Title: PFMC Winners</span>
                    {{-- <span class="badge-top"  style='color:black;background:white'>2</span> --}}
                </div>
                <div data-toggle="modal" data-target="#family_day" data-role="tile" data-size="wide" data-cover="{{ asset('/images/family_day.png')}}">
                    <span class="branding-bar design">Title: Family Day</span>
                    {{-- <span class="badge-top"  style='color:black;background:white'>3</span> --}}
                </div>
                <div data-toggle="modal" data-target="#new_announcement_d" data-role="tile" data-size="wide" style='border: 0px;' >
                    <p align='center' style='padding-top:50px;'><img src='{{ asset('/images/add.png')}}' width='50' height='50'>New</p>
                </div>
                <div data-toggle="modal" data-target="#new_announcement" ndata-size="wide" style='border: 0px;' >
                    
                </div>
            </div>
            <div class="tiles-grid tiles-group size-2 fg-white" data-group-title="Department Announcement">
                <div  data-toggle="modal" data-target="#word_gamefowl" data-role="tile" data-size="wide" data-cover="{{ asset('/images/word_gamefowl.jpg')}}">
                    <span class="branding-bar design">Title: EXPERIENCE IRON CLAW AT ..... </span>
                    {{-- <span class="badge-top"  style='color:black;background:white' >1</span> --}}
                </div>
                <div data-toggle="modal" data-target="#new_announcement_d" data-role="tile" data-size="wide" style='border: 0px;' >
                    <p align='center' style='padding-top:50px;'><img src='{{ asset('/images/add.png')}}' width='50' height='50'>New</p>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="ModalCarousel" tabindex="-1" role="dialog" aria-labelledby="ModalCarouselLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel" style="color:black;">Title: PFMC Winners</h4>
                    </div>
                    <!--The main div for carousel-->
                    <div id="carousel-modal-demo" class="carousel slide" data-ride="carousel" data-interval="2000">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-modal-demo" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-modal-demo" data-slide-to="1"></li>
                            <li data-target="#carousel-modal-demo" data-slide-to="2"></li>
                            <li data-target="#carousel-modal-demo" data-slide-to="3"></li>
                        </ol>
                        
                        <!-- Sliding images statring here --> 
                        <div class="carousel-inner"> 
                            <div class="item active"> 
                                <img src="{{ asset('/images/winner1.png')}}" > 
                                <div class="carousel-caption">
                                    
                                </div>
                            </div> 
                            <div class="item"> 
                                <img src="{{ asset('/images/winner2.jpg')}}"> 
                                <div class="carousel-caption">
                                    
                                </div>      
                            </div> 
                            <div class="item"> 
                                <img src="{{ asset('/images/winner3.png')}}"> 
                                <div class="carousel-caption">
                                    
                                </div>          
                            </div>
                            <div class="item"> 
                                <img src="{{ asset('/images/winner4.png')}}">
                                <div class="carousel-caption">
                                    
                                </div>           
                            </div> 
                        </div> 
                        
                        <!-- Next / Previous controls here -->
                        <a class="left carousel-control" href="#carousel-modal-demo" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-modal-demo" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                        
                    </div>
                    <div class="modal-footer">
                        <p style="float:left;color:black">
                            Description
                            <br>
                            Description <br>
                            Description <br>
                            Description <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="family_day" class="modal fade" role="dialog">
            <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style='color:black'>Title: Family Day</h4>
                    </div>
                    <div id="carousel-modal-demo" class="carousel slide" data-ride="carousel" data-interval="2000">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-modal-demo" ></li>
                        </ol>
                        
                        <!-- Sliding images statring here --> 
                        <div class="carousel-inner"> 
                            <div class="item active" align='center'> 
                                <img src="{{ asset('/images/family_day.png')}}" > 
                                <div class="carousel-caption">
                                    
                                </div>
                            </div> 
                        </div> 
                        
                    </div>
                    <div class="modal-footer" >
                        <div align='left'>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="abcd" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style='color:black'>Title: ABCD Nomination</h4>
                    </div>
                    <div id="carousel-modal-demo" class="carousel slide" data-ride="carousel" data-interval="2000">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-modal-demo" data-slide-to="0" class="active"></li>
                        </ol>
                        
                        <!-- Sliding images statring here --> 
                        <div class="carousel-inner"> 
                            <div class="item active" align='center'> 
                                <img src="{{ asset('/images/abcd.png')}}" > 
                                <div class="carousel-caption">
                                    
                                </div>
                            </div> 
                        </div> 
                        
                    </div>
                    <div class="modal-footer" >
                        <div align='left'>
                            <p style="float:left;color:black">
                                Description<br>
                                Description<br>
                                Description<br>
                                Description<br>
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="word_gamefowl" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style='color:black'>EXPERIENCE IRON CLAW AT THE WORLD GAMEFOWL EXPO!</h4>
                    </div>
                    <div id="carousel-modal-demo" class="carousel slide" data-ride="carousel" data-interval="2000">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-modal-demo" data-slide-to="0" class="active"></li>
                        </ol>
                        
                        <!-- Sliding images statring here --> 
                        <div class="carousel-inner"> 
                            <div class="item active" align='center'> 
                                <img src="{{ asset('/images/word_gamefowl.jpg')}}" > 
                                <div class="carousel-caption">
                                    
                                </div>
                            </div> 
                        </div> 
                        
                    </div>
                    <div class="modal-footer" >
                        <div align='left'>
                            <p style="float:left;color:black">
                                IT'S WORLD GAMEFOWL EXPO 2019 (JAN 18-20, 2019, 10:00 AM - 7:00 PM) @ World Trade Center, Pasay City<br>
                                
                                See you there and experience IRON CLAW!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="new_announcement" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style='color:black'>New Announcement</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="form-control-label" style='color:black'>Title:</label>
                                <input type="text" class="form-control" id="title-name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" style='color:black'>Description:</label>
                                <textarea class="form-control" id="description-text" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" style='color:black'>Image/s:</label>
                                <input type="file" name="img" multiple>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </div>
            </div>
        </div>
        <div id="new_announcement_d" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style='color:black'>New Announcement</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="form-control-label" style='color:black'>Title:</label>
                                <input type="text" class="form-control" id="title-name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" style='color:black'>Description:</label>
                                <textarea class="form-control" id="description-text" required></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" style='color:black'>Image/s:</label>
                                <input class="form-control" type="file" name="img" multiple>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" style='color:black'>Start:</label>
                                <input class="form-control" type="date" name="date_start" required>
                                <label class="form-control-label" style='color:black'>End:</label>
                                <input class="form-control" type="date" name="date_end" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('/css/jquery-3.3.1.min.js')}}"></script>
        <script src="{{ asset('/css/metro.js')}}"></script>
        <script src="{{ asset('/css/start.js')}}"></script>
        <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    </div>
</body>
</html>

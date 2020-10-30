<html lang="en" lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('/images/logo.ico')}}"/>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css')}}">
    <link href="{{ asset('/metro/metro/css/metro-all.css?ver=@@b-version')}}" rel="stylesheet">
    <link href="{{ asset('/metro/highlight/styles/github.css')}}" rel="stylesheet">
    <link href="{{ asset('/metro/docsearch/docsearch.min.css')}}" rel="stylesheet">
    <style>
        .design{
            color:white;
            background:rgba(1,1,1,0.7);
        }
        .nopadding{
            padding:0;
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
        img.seen {
            height: 35px;
            width: 35px;
            margin: 3px;
        }
        span.seen {
            height: 35px;
            width: 35px;
            padding-top:10px;
            text-align:center;
            color:#e2eaf3;
            font-family:Verdana;
            font-size:10px;
            text-decoration:none;
            background:grey;
        }
        
        div.row_na {
            display: inline-block;
            text-align: center;
            width:100%;
        }  
        
    </style>
</head>
<body>
    <div id = "myDiv" style="display:none;" class="loader">
    </div>
    <div class="example p-0 background" >
        <div data-role="navview">
            <div class="navview-pane">
                <button class="pull-button">
                    <span class=""><img class="rounded-circle" src="{{URL::asset('/images/front-logo.png')}}"  height="22" width="22" > </span>
                </button>
                <div class="suggest-box">
                    <div class="input">
                        <input type="text" id="myInput" onkeyup="search()" data-role="input" data-clear-button="false" data-search-button="true" class="" data-role-input="true"><div class="button-group">
                            <button class="button input-search-button" tabindex="-1" type="submit"><span class="default-icon-search"></span></button>
                        </div>
                    </div>
                    
                    <button class="holder">
                        <span class="mif-search"></span>
                    </button>
                </div>
                <ul class="navview-menu" id="myUL">
                    <li >
                        <a href="https://lfuggoccpu.freshdesk.com/support/login" id='cpu' target='_' > 
                            <span class="icon" style='padding-top:12px'><span class="mif-cart"></span></span>
                            <span class="caption">CPU Ticketing Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://lafilgroup.freshdesk.com/support/login" title='Desktop Ticketing Portal' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-display"></span></span>
                            <span class="caption">Desktop Ticketing Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://mail.lafilgroup.com/Mondo/lang/sys/login.aspx" title='Email Portal' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-mail"></span></span>
                            <span class="caption">Email Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://esoa.lafilgroup.com/login" title='ESOA Portal' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-money"></span></span>
                            <span class="caption">ESOA Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://gpstracker.lafilgroup.com/authentication/create" title='GPS Monitoring' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-location"></span></span>
                            <span class="caption">GPS Monitoring</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://172.17.2.251:4848/essweb/" title='HR ESSWeb' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-calendar"></span></span>
                            <span class="caption">HR ESS Web</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://10.96.4.40:8441/hrportal/public/login" title='HR Portal' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-users"></span></span>
                            <span class="caption">HR Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://10.96.4.53/login" title='IC Portal Local' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-file-empty"></span></span>
                            <span class="caption">IC Portal Local</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://icportal.lafilgroup.com/" title='IC Portal Outside' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-file-empty"></span></span>
                            <span class="caption">IC Portal Outside</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://172.17.1.123/mancomportal/wp-login.php" title='Mancom Portal' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-open-book"></span></span>
                            <span class="caption">Mancom Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://lafilgroup.com/" title='LFUGGOC Website' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-file-empty"></span></span>
                            <span class="caption">LFUGGOC Website</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://salesforce.lafilgroup.net:8666/login" title='PFMC Salesforce Portal' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-mobile"></span></span>
                            <span class="caption">PFMC Salesforce Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://mobilediser.lafilgroup.com/login" title='PLILI Mobilediser Portal' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-android"></span></span>
                            <span class="caption">PLILI Mobilediser Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://172.17.1.123/qmdcentralize" title='QMD Centralize Portal' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-spell-check"></span></span>
                            <span class="caption">QMD Centralize Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://10.96.4.52/login" title='QMD E-forms' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-file-text"></span></span>
                            <span class="caption">QMD E-forms</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://172.17.1.125/queueEntry/3" title='QUEUE Monitoring Bataa' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-file-empty"></span></span>
                            <span class="caption">QUEUE Monitoring Bataan</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://172.17.1.125/queueEntry/1" title='QUEUE Monitoring Manila' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-file-empty"></span></span>
                            <span class="caption">QUEUE Monitoring Manila</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://lfugsupport.freshdesk.com/support/login" title='SAP Ticketing Porta' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-file-empty"></span></span>
                            <span class="caption">SAP Ticketing Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://172.17.2.88/driver_rfid/public/login" title='Truck Monitoring Portal' target='_'>
                            <span class="icon" style='padding-top:12px'><span class="mif-truck"></span></span>
                            <span class="caption">Truck Monitoring Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"  onclick="logout(); show();" >
                            <span class="icon" style='padding-top:12px'><span class="mif-exit"></span></span>
                            <span class="caption">Log Out</span>
                        </a>
                        @if(Auth::user())
                        <form id="logout-form"  action="{{ route('logout') }}"  method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @endif
                    </li>
                </ul>
            </div>
            @yield('content')
            <script src="{{ asset('/metro/docsearch/docsearch.min.js')}}"></script>
            <script src="{{ asset('/metro/js/jquery-3.3.1.min.js')}}"></script>
            <script src="{{ asset('/metro/metro/js/metro.js?ver=@@b-version')}}"></script>
            <script src="{{ asset('/metro/highlight/highlight.pack.js')}}"></script>
            <script src="{{ asset('/metro/js/clipboard.min.js')}}"></script>
            <script src="{{ asset('/metro/js/site.js')}}"></script>
            <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
            <script>
                function logout(){
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                }
                function show() {
                    document.getElementById("myDiv").style.display="block";
                }
                function search() {
                    // Declare variables
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById('myInput');
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("myUL");
                    li = ul.getElementsByTagName('li');
                    
                    // Loop through all list items, and hide those who don't match the search query
                    for (i = 0; i < li.length; i++) {
                        a = li[i].getElementsByTagName("a")[0];
                        txtValue = a.textContent || a.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                }
                function search2() {
                    // Declare variables
                    var input, filter, ul, li, a, i, txtValue;
                    input = document.getElementById('names_info');
                    filter = input.value.toUpperCase();
                    ul = document.getElementById("names");
                    li = ul.getElementsByTagName('li');
                    
                    // Loop through all list items, and hide those who don't match the search query
                    for (i = 0; i < li.length; i++) {
                        a = li[i].getElementsByTagName("a")[0];
                        txtValue = a.textContent || a.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            li[i].style.display = "";
                        } else {
                            li[i].style.display = "none";
                        }
                    }
                }
                $(function(){
                    var dtToday = new Date();
                    var month = dtToday.getMonth() + 1;
                    var day = dtToday.getDate();
                    var year = dtToday.getFullYear();
                    if(month < 10)
                    month = '0' + month.toString();
                    if(day < 10)
                    day = '0' + day.toString();
                    var maxDate = year + '-' + month + '-' + day;
                    $('#start_date').attr('min', maxDate);
                    $('#end_date').attr('min', maxDate);
                    // $("#end_date").prop('disabled', true);
                    $("#start_date").change(function(){
                        var min_date = this.value ;
                        // $("#end_date").prop('disabled', false);
                        $('#end_date').attr('min', min_date);
                    });
                });
                $(document).ready(function() {
                    $(".button1").click(function(e) {
                        // e.preventDefault();
                        var announcement_id = $(this).attr("id");
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/seen-announcement/')}}"  ,
                            data: {
                                "id": announcement_id,
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(result) {
                            },
                            error: function(result) {
                                alert('error');
                            }
                        });
                    });
                });
                
            </script>
        </body>
        </html>
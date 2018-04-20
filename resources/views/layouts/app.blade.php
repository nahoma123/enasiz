<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('Enasiz', 'Enasiz') }}</title>

        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>

    <script type="text/javascript">
        $(function () {
            var body = $("body");
            var backgrounds = new Array(
                    "url('5178885footballwallpapershd.jpg')",
                    "url('wdf_2315311.jpg')"
                    );
            var current = 0;

            function nextBackground() {
                body.css(
                        'background',
                        backgrounds[current = ++current % backgrounds.length]
                        );
                body.fadeIn("slow")
                setTimeout(nextBackground, 3000);
            }
            setTimeout(nextBackground, 3000);
            body.css('background', backgrounds[0]);
        });
    </script> 
    <style>
        .pointer:hover{
            
        }
        .anchor1:hover{
            text-decoration-line: none;
        }
        
        .item_group:hover{
            background-color: black;           
        }
        .item_group:hover a{
            color: black !important;         
        }
        #app-navbar-collapse{
            width: 100%;
        }
        .navbar-header{
            width: 100%;
        }
        #content{
            margin-top: 140px;
        }
        li > .dropdown-menu::after {
            content: '';
            display: inline-block;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid black;
            position: absolute;
            top: -6px;
            left: 120px;
        }

        .alert{
            background-color: #ff9900;
            color: white;
        }
        a{
            background-color: transparent;
        }
        .fa-btn {
            margin-right: 6px;
        }
        .nav a{
            color: #ffffff;
        }
        a.topnav_html:hover{

            border-top-style: box;
            border-radius: 0px !important;
            color: blue;
            background-color: black !important;
        }
        div.dropdown-menu:hover{
            color: whitesmoke;
            border-top: 0px solid transparent;
            text-shadow: none;
            font-size: 14px;
            padding: 12px 20px;
            padding: 12px 10px \9;
            -webkit-transition: all 0.4s ease-in-out;
            -moz-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            -ms-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            box-sizing: border-box;
        }

        a.topnav_html{
            border-radius: 0px !important;
            float:right;
            color: whitesmoke;
            border-top: 0px solid transparent;
            text-shadow: none;
            font-size: 14px;
            padding: 12px 20px;
            padding: 12px 10px \9;
            -webkit-transition: all 0.4s ease-in-out;
            -moz-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            -ms-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            box-sizing: border-box;
        }
        .topnavContainer{
            background-color: #337ab7;
            margin-top: 30px;
            padding-left: 70px;
            padding-bottom: 0px !important;
            margin-bottom: 0px !important;
        }
        #welcometxt{
            font-size: 15px;
            color: beige;
            padding-top:4.5px;
            text-align: left;
            display: inline-block;
            vertical-align: middle;
        }
        .reg-in {
            padding-right: 70px !important;
        }
        .top{
            background-color: black;
            //background-color: rgb(95,95,95);
            padding-bottom: 0px !important;
            height: 90px;

        }

        #leftNav{
            background-color: rgb(235,235,235) !important;
            height: auto 100% !important;
        }
        .dropdown-menu>li>a:hover  {
            background-color: #0088cc;
        }
        .dropdown:hover .headermenutxt{
            color: white;
        }
        .dropdown-menu.pull-right{
            right: auto !important;
        }
        .open>a{
            background-color: black !important;
        }
    </style>
</head>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="/js/jquery-3.3.1.min.js"></script>
    </head>

    {{--<script type="text/javascript">--}}
    {{--$(function() {--}}
        {{--var body = $("body");--}}
        {{--var backgrounds = new Array(--}}
        {{--"url('5178885footballwallpapershd.jpg')",--}}
        {{--"url('wdf_2315311.jpg')"--}}
        {{--);--}}
        {{--var current = 0;--}}

        {{--function nextBackground() {--}}
        {{--body.css(--}}
        {{--'background',--}}
        {{--backgrounds[current = ++current % backgrounds.length]--}}
        {{--);--}}
        {{--body.fadeIn("slow")--}}
        {{--setTimeout(nextBackground, 3000);--}}
        {{--}--}}
        {{--setTimeout(nextBackground, 3000);--}}
        {{--body.css('background', backgrounds[0]);--}}
        {{--});--}}
    {{--</script>--}}


<body>

    <div id="app">

        <nav class="navbar navbar-default navbar-static-top" style="background:#24292E">
            <div class="container" style="height:55px">
                <div class="navbar-header center-block">
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">


                        <!-- Right Side Of Navbar -->
                        <ul  style="width:100%"class="nav navbar-nav navbar-righ">
                            <!-- Authentication Links -->


                            <!-- Branding Image -->

                            @guest
                            <div class="width:100%">
                                <h1 style='color: white;alignment-adjust: central;padding-left: 12.5%'>Welcome to Enasiz Betting Application Management Portal </h1>
                            </div>  
                            @endguest




                            @auth 
                            <a class="navbar-brand" href="{{ url('/') }}" >
                                <a class="navbar-brand" href="#" style="padding-top: 0px; padding-bottom: 14px; width: 80px">
                                    <img alt="Brand" src="Logo_Full_Flag.png" class="img-responsive" style="">
                                </a>
                                <li  style="margin-left:50px"class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Manage Matchs_r</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right " role="menu">
                                        <li><a class="" href="{{ url('/matches') }}">Add Matchr</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Delete Matchr</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Update Matchr</a></li>
                                        <li><a class="" href="{{ url('/viewMatches') }}">View Matchsr</a></li>

                                    </ul>
                                </li>
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Manage Bets_r</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="" href="{{ url('/report/permission_list') }}">Add bet_r</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Delete Bet_r</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Update Bet_r</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">View Bet_r</a></li>
                                    </ul>
                                </li>
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Manage Accounts_r</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="" href="{{ url('/register') }}">Add Staff_r</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Deactivate Staff_r</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Client Currency Management_r</a></li>

                                    </ul>
                                </li>          
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Manage Leagues_r</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="" href="{{ url('/report/permission_list') }}">Add League_r</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Manage Teams in Leagues_r</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Update League_r </a></li>


                                    </ul>
                                </li>

                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Manage Cups_r</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="" href="{{ url('/report/permission_list') }}">Permission Report</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Detail and General Report</a></li>
                                    </ul>
                                </li>
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Reports_r</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="" href="{{ url('/report/permission_list') }}">Permission Report</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Detail and General Report</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown pull-right"style="color: white; ">
                                   
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                            <span class="text-bold text-info">{{ Auth::user()->name }}</span> <span class="caret "></span>
                                        </a>
                                        <ul class="dropdown-menu pull-right" style="width:50px">
                                            <li>
                                                <a role="menuitem" tabindex="-1" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();" >
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                </li>
                                                                <li class="pull-right"><a style="color: white; margin-left: 50px" href="#" data-target="#"><b><span class="glyphicon glyphicon-bell" ></span><span class="badge">5</span></b></a></li>

                                        </ul>
                                    </div>


                                    @endauth

                                    </ul>

                                    </div>
                                    <!-- Collapsed Hamburger -->


                                    </div>


                                    </div>
                                    </nav>

                                    @yield('content')
                                    </div>

                                    <!-- Scripts -->
                                    <script src="{{ asset('js/app.js') }}"></script>
                                    </body>
                                    </html>

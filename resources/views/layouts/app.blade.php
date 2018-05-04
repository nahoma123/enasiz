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
    <style type="text/css">
/*    --------------------------------------------------
	:: General
	-------------------------------------------------- */
body {
	font-family: 'Open Sans', sans-serif;
	color: #353535;
}
.content h1 {
	text-align: center;
}
.content .content-footer p {
	color: #6d6d6d;
    font-size: 12px;
    text-align: center;
}
.content .content-footer p a {
	color: inherit;
	font-weight: bold;
}

/*	--------------------------------------------------
	:: Table Filter
	-------------------------------------------------- */
.panel {
	border: 1px solid #ddd;
	background-color: #fcfcfc;
}
.panel .btn-group {
	margin: 15px 0 30px;
}
.panel .btn-group .btn {
	transition: background-color .3s ease;
}
.table-filter {
	background-color: #fff;
	border-bottom: 1px solid #eee;
}
.table-filter tbody tr:hover {
	cursor: pointer;
	background-color: #eee;
}
.table-filter tbody tr td {
	padding: 10px;
	vertical-align: middle;
	border-top-color: #eee;
}
.table-filter tbody tr.selected td {
	background-color: #eee;
}
.table-filter tr td:first-child {
	width: 38px;
}
.table-filter tr td:nth-child(2) {
	width: 35px;
}
.ckbox {
	position: relative;
}
.ckbox input[type="checkbox"] {
	opacity: 0;
}
.ckbox label {
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}
.ckbox label:before {
	content: '';
	top: 1px;
	left: 0;
	width: 18px;
	height: 18px;
	display: block;
	position: absolute;
	border-radius: 2px;
	border: 1px solid #bbb;
	background-color: #fff;
}
.ckbox input[type="checkbox"]:checked + label:before {
	border-color: #2BBCDE;
	background-color: #2BBCDE;
}
.ckbox input[type="checkbox"]:checked + label:after {
	top: 3px;
	left: 3.5px;
	content: '\e013';
	color: #fff;
	font-size: 11px;
	font-family: 'Glyphicons Halflings';
	position: absolute;
}
.table-filter .star {
	color: #ccc;
	text-align: center;
	display: block;
}
.table-filter .star.star-checked {
	color: #F0AD4E;
}
.table-filter .star:hover {
	color: #ccc;
}
.table-filter .star.star-checked:hover {
	color: #F0AD4E;
}
.table-filter .media-photo {
	width: 35px;
}
.table-filter .media-body {
    
    /* Had to use this style to force the div to expand (wasn't necessary with my bootstrap version 3.3.6) */
}
.table-filter .media-meta {
	font-size: 11px;
	color: #999;
}
.table-filter .media .title {
	color: #2BBCDE;
	font-size: 14px;
	font-weight: bold;
	line-height: normal;
	margin: 0;
}
.table-filter .media .title span {
	font-size: .8em;
	margin-right: 20px;
}
.table-filter .media .title span.pagado {
	color: #5cb85c;
}
.table-filter .media .title span.pendiente {
	color: #f0ad4e;
}
.table-filter .media .title span.cancelado {
	color: #d9534f;
}
.table-filter .media .summary {
	font-size: 14px;
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
                            <!-- Authentication Links -->                            <!-- Branding Image --> 

                            @guest
                            <div class="width:100%">
                                <h1 style='color: lightblue;padding-left: 0%; margin-left: 80px'>Welcome to Enasiz Betting Application Management Portal </h1>
                            </div>  
                            @endguest
                            
                            @auth
                            <a class="navbar-brand" href="{{ url('/') }}" >
                                <a class="navbar-brand" href="#" style="padding-top: 0px; padding-bottom: 14px; width: 80px">
                                    <img alt="Brand" src="/Logo_Full_Flag.png" class="img-responsive" style="">
                                </a>
                                <li  style="margin-left:50px"class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">

                                        <span class="headermenutxt text-bold">Manage Matches</span><span class=" "></span>

                                    </a>

                                    <ul class="dropdown-menu pull-right " role="menu">
                                        <li><a class="" href="{{ url('/matches') }}">Add Matches</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Delete Matches</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Update Matches</a></li>
                                        <li><a class="" href="{{ url('/viewMatches') }}">View Matches</a></li>

                                    </ul>
                                </li>
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Manage Bets</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="" href="{{ url('/report/permission_list') }}">Add bet</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Delete Bet</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Update Bet</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">View Bet</a></li>
                                        <li><a class="" href="{{ url('/addTransferBet') }}">Add Transfer bet</a></li>
                                    </ul>
                                </li>
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Manage Accounts</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="" href="{{ url('/register') }}">Add Staff</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Deactivate Staff</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Client Currency Management</a></li>

                                    </ul>
                                </li>          
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Manage Leagues</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="" href="{{ url('/addLeague') }}">Add League</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Manage Teams in Leagues</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Update League </a></li>

                                        <li><a class="" href="{{ url('/addTeam') }}">Add team</a></li>




                                    </ul>
                                </li>

                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Manage Cups</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="" href="{{ url('/report/permission_list') }}">Permission Report</a></li>
                                        <li><a class="" href="{{ url('/report/generate/generalreport_form') }}">Detail and General Report</a></li>
                                    </ul>
                                </li>
                                <li  class="dropdown">
                                    <a href="#" class="dropdown-toggle topnav_html" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span class="headermenutxt text-bold">Reports</span><span class=" "></span>
                                    </a>

                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="" href="{{ url('/report/userAccountActivity/staffstatus') }}">Check Staff Status</a></li>
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

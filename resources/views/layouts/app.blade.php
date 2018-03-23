<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Enasiz') }}</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <script type="text/javascript">
    $(function() {
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

<body>
 
    <div id="app">
    
        <nav class="navbar navbar-default navbar-static-top" style="box-shadow: 0px 2px 10px rgb(48,151,209); background:linear-gradient(180deg,rgb(251,251,251), rgb(48,151,209))">
            <div class="container" style="height:70px">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="padding-top: 0px; padding-bottom: 14px; width: 80px">
                        <img alt="Brand" src="Logo_Full_Flag.png" style="height:60px; width:60px;">
                    </a>
                    <!-- Branding Image -->
                      
                    <a class="navbar-brand" href="{{ url('/') }}" >
                        {{ config('app.name', 'Enasiz') }}
                    </a>
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><b>Login</b></a></li>
                            <li><a href="{{ route('register') }}"><b>Register</b></a></li>
                            <li><a href="../matches" data-target="#matches"><b>Matches</b></a></li>
                            <li><a href="../manageaccounts" data-target="#mangeAccounts"><b>Manage Accounts</b></a></li>
                            <li><a href="../matchdetail" data-target="#home"><b>Home</b></a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

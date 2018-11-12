<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="_token" content="{{ csrf_token() }}">
        <title>Ordinacija</title>
        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
        crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
        <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
        <!-- If JavaScript is Disabled Hide Html Tag (Document) and Go To Route NOJS -->
        <noscript>
        <style>html{display:none;}</style>
        <meta http-equiv="refresh" content="0; url=/nojs">
        </noscript>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <script type="text/javascript" src="{{ asset('javaScript/jquery.printPage.js') }}"></script>
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container meniPocetna">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        
                        <li><a href="{{ url('/home') }}"><button type="button" class="btn btn-primary" ><i class="fa fa-btn fa-user"></i> Novi Pacijent</button></a></li>
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-text">
                        
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><button type="submit" class="btn btn-success">
                        <i class="fa fa-btn"></i> &nbsp Prijava Doktora &nbsp &nbsp &nbsp &nbsp</button></a></li>
                        <li><a href="{{ url('/register') }}"><button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn"></i> Registracija Doktora</button></a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Odjava</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('statistika')}}"><button type="submit" class="btn btn-primary">
                                <i class=""></i> Statistika Doktora
                            </button></a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
        
        @yield('content')
        
        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    </body>
    @yield('footer')
  
</html>
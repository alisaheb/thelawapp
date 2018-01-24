<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>THE LAW APP - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="baseurl" content="{{url('/')}}">
    <link rel="icon" type="image/png" href="{{ url('/')}}/assets/front/img/fav.png" sizes="16x16">
    {{ Html::style('assets/front/css/bootstrap.min.css') }}
    {{ Html::style('assets/front/css/font-awesome.min.css') }} 
    {{ Html::style('assets/front/css/style.css') }}
    {{ Html::style('assets/front/css/dashstyle.css') }}
    {{ Html::style('assets/front/css/responsive.css') }}
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Important Owl stylesheet -->
    {{ Html::style('assets/front/css/owl.carousel.min.css') }}
    {{ Html::style('assets/front/css/owl.theme.default.min.css') }}
    {{ Html::style('assets/front/css/flaticon.css') }}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
<body>
    <!-- Header Area-->
    <div class="top-area" id="home">
        <div class="main-header-area">
            <div class="header-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-xs-12 logo">
                            <a href="{{ url('/')}}">{{ Html::image('assets/front/img/logo.png') }}</a>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-10 mobilemenu">
                            <div class="mainmenu">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav">
                                        @if(!Auth::guest())
                                            @if(Auth::user()->type=='lawyer')
                                                <li class="smooth"><a href="{{ url('cases')}}">Browse Case</a></li>
                                            @endif
                                             @if(Auth::user()->type=='client')
                                                <li class="smooth"><a href="{{ url('mycases')}}">Browse Case</a></li>
                                            @endif
                                        @endif
                                       <li class="active smooth"><a href="{{ url('/')}}">Home</a></li>
                                        @if(Auth::guest())
                                        <li class="smooth"><a href="{{ url('howitworks')}}">ABOUT US</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 logmenu">
                            <div class="login_logout info">
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav">
                                        @if(Auth::user())
                                        <li class="smooth"><a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i></a></li>
                                        <li class="smooth"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                        <li class="smooth top-profile">
                                            <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                                    <a href="#">@if(!empty(Auth::user()->profile_image))
                                                            {{ Html::image("public/profile_images/".Auth::user()->profile_image) }}
                                                        @else
                                                            {{ Html::image('assets/front/img/avatar.png') }}
                                                        @endif
                                                    </a>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                    <li><a role="menuitem" tabindex="-1" href="{{ url('dashboard') }}">MY DASHBOARD</a></li>
                                                    <li><a role="menuitem" tabindex="-1" href="">MESSAGES</a></li>
                                                    <li><a role="menuitem" tabindex="-1" href="{{ url('profile') }}">PROFILE</a></li>
                                                    <li><a role="menuitem" tabindex="-1" href="">REVIEWS</a></li>
                                                    <li><a role="menuitem" tabindex="-1" href="">NOTIFICATIONS</a></li>
                                                    <li><a role="menuitem" tabindex="-1" href="">PORTFOLIO</a></li>
                                                    <li><a role="menuitem" tabindex="-1" href="">PASSWORD</a></li>
                                                    <li><a role="menuitem" tabindex="-1" href="{{ url('logout') }}">LOGOUT</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        @else(Auth::guest())
                                        <li class="smooth signup_menu"><a href="{{ url('register')}}"><i class="fa fa-pencil" aria-hidden="true"></i>Signup</a></li>
                                        <li class="active smooth"><a href="{{ url('login')}}"><i class="flaticon-login-1"></i>Login</a></li>
                                        @endif
                                    </ul>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Area-->

    <div class="content-area">
       @yield('content')
    </div>

    <!-- Footer Area-->
    <footer class="footer">

        <div class="icon_Store">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 app_store">
                        <a href="#">{{ Html::image('assets/front/img/apple-app-store.png') }}</a>
                        <a href="#">{{ Html::image('assets/front/img/google-play.png') }}</a>
                    </div>

                    <div class="col-md-6 social">
                        <a href="#" alt="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" alt="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" alt="Google Plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="#" alt="RSS"><i class="fa fa-rss" aria-hidden="true"></i></a>
                        <a href="#" alt="LinkDin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>

                </div>
            </div>
        </div>

        <div class="Footer-widget">
            <div class="container">
                <div class="row">

                    <div class="col-md-3">
                        <h3 class="Footer-linksTitle">Discover</h3>
                        <ul class="Footer-links">
                            <li>
                                <a class="Footer-link" href="#">About The Law App</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">How It Works for clients</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">How It Works for lawyers</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">Trust and Quality</a>
                            </li>

                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h3 class="Footer-linksTitle">Company</h3>
                        <ul class="Footer-links">
                            <li>
                                <a class="Footer-link" href="#">Press</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">Market Rules</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">The Law App Privacy Policy</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">The Law App Terms and Conditions</a>
                            </li>

                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h3 class="Footer-linksTitle">Existing Members</h3>
                        <ul class="Footer-links">
                            <li>
                                <a class="Footer-link" href="#">Support Center</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">Community</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">Disclaimer</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">Vision And Mission</a>
                            </li>

                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h3 class="Footer-linksTitle">Categories</h3>
                        <ul class="Footer-links">
                            <li>
                                <a class="Footer-link" href="#">Property Law</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">Real Estate Law</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">Criminal Law</a>
                            </li>
                            <li>
                                <a class="Footer-link" href="#">Family Law</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid fcopy">
            <div class="row">
                <div class="col-md-12">
                    <p class="copyright"> <a class="Footer-link" href="#">Lawyer Pty. Ltd 2011-2016©, All rights reserved</a></p>
                </div>
            </div>
        </div>
    </footer>

    
    {{ Html::script('assets/front/js/modernizr.custom.js') }}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

      {{ Html::script('assets/front/js/bootstrap.min.js') }}
    <!--script src="https://code.jquery.com/jquery-1.12.4.js"></script-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

      {{ Html::script('assets/front/js/jquery.fitvids.js') }}
      {{ Html::script('assets/front/js/jquery.parallax-1.1.3.js') }}
      {{ Html::script('assets/front/js/jquery.localscroll-1.2.7-min.js') }}
      {{ Html::script('assets/front/js/jquery.scrollTo-1.4.2-min.js') }}

     {{ Html::script('assets/front/js/owl.carousel.js') }}
     {{ Html::script('assets/front/js/main.js') }}

</body>

</html>
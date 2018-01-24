{!! Html::style('assets/userpanel/css/radio-button.css') !!}
{!! Html::style('assets/userpanel/css/popup-layout.css') !!}
{!! Html::style('assets/userpanel/css/modal-popup.css') !!}
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
@if (Auth::guest())
    <div id="header" class="loggedout" style="height:94px;">
        @else
            <input type="hidden" id="noti_to_id" value="{{Auth::user()->id}}">
            <div id="header" class="loggedin" style="height:94px;">
                @endif
                <div id="primary-menu">
                    <div id="menu-mobile" class="mobile">
                        <a id="lawyer-logo" href="{{url('/')}}">
                            <svg width="140" height="24" viewBox="0 0 140 24" version="1.1">
                                <use x='0' y='0' width='140' height='24'
                                     xlink:href="{{asset('assets/userpanel/images/logo.png')}}"/>
                            </svg>
                        </a>
                        <a class="sub-menu-tab">
                            <canvas width="60" height="60" style="width:30px;height:30px;"></canvas>
                        </a>
                        <a id="post-task-o" class="post-task-link icon">
                            <span>Post a Task</span>
                            <svg width="18" height="18" viewBox="0 0 18 18" version="1.1" class="icon-plus">
                                <use x='0' y='0' width='18' height='18'
                                     xlink:href="assets/userpanel/images/icons/icon_definitions.svg#plus"/>
                            </svg>
                        </a>
                    </div>
                    <div class="web">
                        <a id="lawyer-logo" href="{{url('/')}}">
                            {!! Html::image('assets/userpanel/images/logo1.png') !!}</a>

                        <div id="menu-cta" class="left">
                            @if(!Auth::guest())
                                @if(Auth::user()->type=='client')
                                    <a id="post-task" class="post-task-link plain-text">Post a Case</a>
                                @else
                                    <a href="{{url('cases')}}" class="link browse-tasks-link">Browse Case</a>
                                @endif
                            @endif
                            @if(Auth::guest())
                                <a href="{{url('howitworks')}}" class="link how-it-works-link">How It Works</a>
                            @else
                                @if(Auth::user()->type=='client')
                                    <a href="{{url('mycase')}}" class="link my-cases-link">My Cases</a>
                                @endif
                                 @if(Auth::user()->email_verify !=1)
                                    <span class="text-info">Verify your email, </span> <a class="text-warning" href="resend-code">resend Code?</a>
                                  @endif
                            @endif
                        </div>
                            
                        @if (Auth::guest())
                            <div class="right" id="menu-user">
                            <a class="link" href="{{ url('/login') }}">Login</a>
                            <a class="link signup-link" href="{{ url('/register') }}">Sign up</a>
                            </div>
                        @else
                            <div id="menu-user" class="right">
                                <div class="dropdown">
                                    <button class="btn btn-primary dashboard-menu notification" type="button"
                                            data-toggle="dropdown">
                                        <i class="fa fa-bell-o" aria-hidden="true"></i>

                                        <div class="notification-bubble notification-alert off"></div>
                                    </button>
                                    <ul class="dropdown-menu dashboard-drop notification-pop">
                                       
                                    </ul>
                                </div>
                               
                                <div class="dropdown">
                                    <button class="btn btn-primary dashboard-menu notification" type="button"
                                            data-toggle="dropdown">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>

                                        <div class="notification-bubble message-alert-{{Auth::user()->id}} off"></div>
                                    </button>
                                    <ul class="dropdown-menu dashboard-drop message-notification messag-noti-{{Auth::user()->id}}">
                                         <li><a href="{{url('dashboard')}}">My Dashboard</a></li>
                                        <li><a href="{{url('messages')}}" class="message-count">Messages </a></li>
                                       
                                        <li><a href="{{url('payment_history')}}">Payments History</a></li>
                                        <li><a href="{{url('payments')}}">Payment Methods</a></li>
                                        <li><a href="{{url('profile')}}">Profile</a></li>
                                       
                                        <li><a href="{{url('verification')}}">Verifications</a></li>
                                        <li><a href="{{url('reviews')}}">Reviews </a></li>
                                        <li><a href="{{url('notifications')}}"
                                               class="notification-count">Notifications </a></li>
                                    </ul>
                                </div>
                               
                                <div class="dropdown">
                                    @if(!empty(Auth::user()->profile_image))
                                        <button style="background:rgba(0, 0, 0, 0) url({{ asset('public/profile_images')}}/{{Auth::user()->profile_image }}) no-repeat scroll 0 0 / 32px 32px"
                                                class="btn btn-primary dashboard-menu" type="button"
                                                data-toggle="dropdown" aria-expanded="true">Dropdown Example
                                            <span class="caret"></span></button>
                                    @else
                                        <button style='background:rgba(0, 0, 0, 0) url("{{url('assets/userpanel/images/image-icon.png')}}") no-repeat scroll 0 0 / 32px 32px'
                                                class="btn btn-primary dashboard-menu" type="button"
                                                data-toggle="dropdown" aria-expanded="true">Dropdown Example
                                            <span class="caret"></span></button>
                                    @endif
                                    <ul class="dropdown-menu dashboard-drop">
                                        <li><a href="{{url('dashboard')}}">My Dashboard</a></li>
                                        <li><a href="{{url('messages')}}" class="message-count">Messages </a></li>
                                        @if(Auth::user()->type=='client')
                                            <li><a href="{{url('mycase')}}">My Cases</a></li>
                                        @else
                                            <li><a href="{{url('cases')}}">Browse Cases</a></li>
                                        @endif
                                        <li><a href="{{url('payment_history')}}">Payments History</a></li>
                                        <li><a href="{{url('payments')}}">Payment Methods</a></li>
                                        <li><a href="{{url('profile')}}">Profile</a></li>
                                        @if(Auth::user()->type=='lawyer')
                                            <li><a href="{{url('skills')}}">Skills</a></li>
                                        @endif
                                        <li><a href="{{url('verification')}}">Verifications</a></li>
                                        <li><a href="{{url('reviews')}}">Reviews </a></li>
                                        <li><a href="{{url('notifications')}}"
                                               class="notification-count">Notifications </a></li>
                                        @if(Auth::user()->type=='lawyer')
                                            <li><a href="{{url('portfolio')}}">Portfolio</a></li>
                                        @endif
                                        <li><a href="{{url('password')}}">Password</a></li>
                                        @if(!Auth::guest())
                                            <li><a class="link logout-link"
                                                   onclick="document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </div>
                </div>
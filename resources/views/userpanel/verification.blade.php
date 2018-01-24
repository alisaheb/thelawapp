<!DOCTYPE html>
<html>
@include('includes.head')
<style>
    .profile_pic {
        border-radius: 50px;
        width: 195px
    }

    .recent-acivity.acivity-notifications, .notofications.acivity-notifications {
        max-height: 400px;
        overflow-y: scroll;
    }

    .profile-error {
        display: none;
        color: red;
    }

    .startbtn {
        height: 188px;
        padding: 8em;
    }

</style>
</head>
<body>
<div id="fb-root"></div>


<div id="app-container" class="inner-common-page">
    <div id="lawyer-app" class="verification-page">
        @include('includes.header')
        <div id="page-and-screen-content">
            <div class="content">
                <div class="inner-page">

                @if (session()->has('flash_notification.message'))
                    <div class="alert alert-{{ session('flash_notification.level') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        {!! session('flash_notification.message') !!}
                    </div>
                @endif

                    <div class="left-sidebar-account">
                        <div class="images-icon">
                            @if(!empty(Auth::user()->profile_image))
                                <img class="profile_pic" style="width:195px"
                                     src="{{asset('public/profile_images')}}/{{Auth::user()->profile_image}}">
                            @else
                                <img src="{{asset('assets/userpanel/images/image-icon.png')}}">
                            @endif
                            <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                        </div>

                        @include('includes.dashboardlinks')
                    </div>
                    <div class="right-side">
                        <h3 class="inner-page-headings">Verifications</h3>

                        <div class="verification-section">
                            <p>Verifications help to build trust in our community and help give you more information
                                when deciding who to work with on a task.</p>

                            <p>Verifications icons and badges are issued when specific requirements are met. See below
                                for more information.</p>
                            <ul>
                                <li><h3>ID</h3></li>
                                <li class="">
                                    <img src="{{asset('assets/userpanel/images/verification-icon1.png')}}">

                                    <div class="verification-parts">
                                            <span>
                                                <h4>Mobile Verification</h4>
                                                <p>It’s completely free to post a task, you’ll start receiving offers
                                                    from Law App. There’s no hidden fees.</p>
                                            </span>
                                        <a id="mobile-verification" href="javascript:;">Add</a>
                                    </div>
                                </li>

                                <li class="">
                                    <img src="{{asset('assets/userpanel/images/verification-icon2.png')}}">

                                    <div class="verification-parts">
                                            <span>
                                                <h4>Law App Pro Badge</h4>
                                                <p>Earn this Badge by completing a questionnaire interview, which is
                                                    reviewed by our Customer Support Team.</p>
                                            </span>
                                        <a href="#">Add</a>
                                    </div>
                                </li>

                                <li class="">
                                    <img src="{{asset('assets/userpanel/images/verification-icon3.png')}}">

                                    <div class="verification-parts">
                                            <span>
                                                <h4>Police Check Badge</h4>
                                                <p>Provide peace of mind to other members by successfully completing a
                                                    Police Check.</p>
                                            </span>
                                        <a href="#">Add</a>
                                    </div>
                                </li>

                                <li class="">
                                    <img src="{{asset('assets/userpanel/images/verification-icon4.png')}}">

                                    <div class="verification-parts">
                                            <span>
                                                <h4>Credit Card</h4>
                                                <p>Receive or make payments with ease by having your payment method
                                                    verified.</p>
                                            </span>

                                        <a id="card-options" href="javascript:;">Add</a>
                                    </div>
                                </li>

                               @if(Auth::user()->type== 'lawyer') 
                                <ul>


                                <li><h3>Certificates</h3></li>

                                @foreach($certificates as $certificate)
                                <li class="">
                                    <img src="{{asset('public/certificates/'.$certificate->user_id.'/'.$certificate->id.'.'.$certificate->extension)}}" width="100%">

                                    <div class="verification-parts">
                                            <span>
                                                <h4>{{ isset($certificate->name) ? $certificate->name : '--' }}</h4>
                                                
                                            </span>
                                    </div>
                                </li>
                                @endforeach
                                 <a id="certificate-verification" href="javascript:;" class="btn btn-default">Add</a>
                            </ul>
                            @endif

                            <ul>
                                <li><h3>Social</h3></li>
                                <li class="">
                                    <img src="{{asset('assets/userpanel/images/verification-icon5.png')}}">

                                    <div class="verification-parts">
											<span>
												<h4>Facebook</h4>
												<p>It’s completely free to post a task, you’ll start receiving offers
                                                    from Law App. There’s no hidden fees. </p>
											</span>
                                        <a href="#">Add</a>
                                    </div>
                                </li>

                                <li class="">
                                    <img src="{{asset('assets/userpanel/images/verification-icon6.png')}}">

                                    <div class="verification-parts">
											<span>	
												<h4>Twitter</h4>
												<p>Earn this Badge by completing a questionnaire interview, which is
                                                    reviewed by our Customer Support Team.</p>
											</span>
                                        <a href="#">Add</a>
                                    </div>
                                </li>

                                <li class="">
                                    <img src="{{asset('assets/userpanel/images/verification-icon7.png')}}">

                                    <div class="verification-parts">
												<span>
													<h4>LinkedIn</h4>
													<p>Provide peace of mind to other members by successfully completing
                                                        a Police Check.</p>
												</span>
                                        <a href="#">Add</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                      
                </div>
            </div>
        </div>
        <div id="static-page-content"></div>
    </div>
</div>
</div>
<div class="page-footer">
    <div class="content">
        <div class="menu-hierarchy row">
            <div class="menu-folder three columns">
                <div class="menu-folder-control showing">
                    <a class="button">
                        <span>Discover</span>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-open">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/>
                        </svg>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-close">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/>
                        </svg>
                    </a>
                </div>
                <div class="menu-folder-items">
                    <a href="redeem/index.html" class="button">About The Law App</a>
                    <a href="trust/index.html" class="button">Trust and Quality</a>
                    <a href="how-it-works/index.html" class="button">How it Works</a>
                    <a href="small-business/index.html" class="button">Sole Practicing Lawyers</a>
                    <a href="leaderboards/index.html" class="button">Leaderboards</a>
                    <a href="earn-money/index.html" class="button">Earn Money</a>
                    <a href="faq/index.html" class="button">New Users FAQ</a>
                </div>
            </div>
            <div class="menu-folder three columns">
                <div class="menu-folder-control showing"><a class="button"><span>Company</span>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-open">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/>
                        </svg>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-close">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/>
                        </svg>
                    </a>
                </div>
                <div class="menu-folder-items">
                    <a href="about/index.html" class="button">About Us</a>
                    <a href="careers/index.html" class="button">Careers</a>
                    <a href="press/index.html" class="button">Press</a>
                    <a href="rules/index.html" class="button">Marketplace Rules</a>
                    <a href="terms/index.html" class="button">Terms &amp; Conditions</a>
                    <a href="#" class="button" target="_blank">Blog</a>
                    <a class="button" href="contact/index.html">Contact us</a>
                    <a href="privacy/index.html" class="button">Privacy Policy</a>
                </div>
            </div>
            <div class="menu-folder three columns">
                <div class="menu-folder-control showing">
                    <a class="button">
                        <span>Existing Members</span>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-open">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/>
                        </svg>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-close">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/>
                        </svg>
                    </a>
                </div>
                <div class="menu-folder-items"><a href="post-task/index.html" class="button">Post a Matter</a><a
                            href="tasks/index.html" class="button">Browse Matters</a><a class="button">Login</a><a
                            href="pro/index.html" class="button">Support Centre</a><a href="" class="button">Support
                        Centre</a><a href="" class="button" target="_blank">Merchandise</a>
                </div>
            </div>
            <div class="menu-folder three columns">
                <div class="menu-folder-control showing">
                    <a class="button">
                        <span>Categories</span>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-open">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/>
                        </svg>
                        <svg width="17" height="17" viewBox="0 0 17 17" version="1.1"
                             class="folder-marker folder-marker-close">
                            <use x='0' y='0' width='17' height='17'
                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/>
                        </svg>
                    </a>
                </div>
                <div class="menu-folder-items">
                    <a class="button" href="tradesman/index.html">Criminal Law</a>
                    <a class="button" href="marketing-and-design/index.html">Legal Administration</a>
                    <a class="button" href="home-and-garden/index.html">Family Law</a>
                    <a class="button" href="delivery-and-removals/index.html">Wills, Estate and Probate</a>
                    <a class="button" href="fun-and-quirky/index.html">Commercial Law</a>
                    <a class="button" href="event-and-photography/index.html">Barristers</a>
                    <a class="button" href="computer-it-web/index.html">Traffic Law</a>
                    <a class="button" href="business-and-admin/index.html">Civil Admin Tribunal</a>
                    <a class="button" href="business-and-admin/index.html">Personal Injury</a>
                    <a class="button" href="business-and-admin/index.html">Conveyancing</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-links small">
        <div class="content">
            <div class="app-stores">
                <a target="_blank" href="#"><img src="{{asset('assets/userpanel/images/google-play.png')}}"
                                                 alt="Google play"/>
                </a>
                <a target="_blank" href="#"><img src="{{asset('assets/userpanel/images/apple-store.png')}}"
                                                 alt="Apple store"/>
                </a>
            </div>
            <div class="social">
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="facebook-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('assets/userpanel/images/icons/icon_definitions.svg#facebook-circle')}}"/>
                    </svg>
                </a>
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="twitter-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('assets/userpanel/images/icons/icon_definitions.svg#twitter-circle')}}"/>
                    </svg>
                </a>
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="google-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('assets/userpanel/images/icons/icon_definitions.svg#google-circle')}}"/>
                    </svg>
                </a>
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="youtube-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('assets/userpanel/images/icons/icon_definitions.svg#youtube-circle')}}"/>
                    </svg>
                </a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="footer-pty-ltd center">
        <!-- <svg width="19" height="19" viewBox="0 0 19 19" version="1.1" class="lawyer-logo-small">
            <use x='0' y='0' width='19' height='19' xlink:href='images/icons/icon_definitions.svg#AirtaskerLogoSmall' />
        </svg> -->
        <img src="{{asset('assets/userpanel/images/footer-logo.png')}}">
        <span class="lawyer-company-details">Lawyer Pty. Ltd 2011-2016©, All rights reserved</span>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>
<script src="{{asset('assets/userpanel/js/custom.js')}}"></script>
<script src="{{asset('assets/userpanel/js/posttask.js')}}"></script>
@include('includes.login')
@include('includes.postjob')
@include('includes.verification-popup')
@include('includes.msgnotification')
</body>
</html>
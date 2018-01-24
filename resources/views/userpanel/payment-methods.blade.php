<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Lawyer</title>
    <link href="{{asset('userpanel/css/style-min.css')}}" rel="stylesheet"/>
    <link id="home" href="{{asset('userpanel/css/home-min.css')}}" rel="stylesheet"/>
    <link href="{{asset('userpanel/css/bootstrap.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{asset('userpanel/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="http://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyCxiKtsoPeyFaXndX_ZfhQ2QJiFMXGRDQU&amp;libraries=geometry,places&amp;language=en"
            type="text/javascript"></script>

</head>


<body>
<div id="fb-root"></div>


<div id="app-container" class="inner-common-page">
    <div id="lawyer-app" class="payment-methods-page">
        <div id="app-header">
            <!-- <div id="header-block" style="height:94px;"></div> -->
            @include('includes.header')
        </div>
    </div>
    <div id="page-and-screen-content">
        <div class="content">
            <div class="inner-page">
                <div class="left-sidebar-account">
                    <div class="images-icon">

                        @if(!empty(Auth::user()->profile_image))
                            <img class="profile_pic" style="width:195px"
                                 src="{{url('../profile_images')}}/{{Auth::user()->profile_image}}">
                        @else
                            <img src="{{asset('userpanel/images/image-icon.png')}}">                        @endif

                        <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                    </div>
                    @include('includes.dashboardlinks')
                </div>
                <div class="right-side">
                    <h3 class="inner-page-headings">Payment Methods</h3>

                    <div class="page-form">
                        <div class="make-payments">
									<span>
										<a href="#">Make Payments</a>
										<a href="#">Receive Payments</a>
									</span>

                            <p>Once a task is completed, you will be able to request payment from the Job Poster, who
                                will then release the funds to your nominated bank or PayPal account. You must add a
                                bank account before you can add a Paypal account</p>
                        </div>
                        <ul class="billing-address">
                            <li>
                                <p>Billing Address</p>
                            </li>

                            <li>
                                <p>Your billing address will be verified before you can receive payments.</p>
                            </li>

                            <li>
                                <p>Street Address</p>
                                <input type="text" name="firstname">
                            </li>

                            <li>
                                <p>Street Post Code</p>
                                <input type="text" name="lastname">
                            </li>

                            <li>
                                <p>City</p>
                                <input type="text" name="tagline">
                            </li>

                            <li>
                                <p>State</p>
                                <input type="text" name="location">
                            </li>

                            <li>
                                <p>Country</p>
                                <input type="text" name="location">
                            </li>

                            <li class="button-section">
                                <button>Add Billing Address</button>
                            </li>

                            <li>
                                <p>For account verification purposes. Your address will never be shown publicly.</p>
                            </li>
                        </ul>

                        <ul class="bank-account-details">
                            <li>
                                <p>Bank Account Details</p>
                            </li>

                            <li>
                                <p>Account Holder Name</p>
                                <input type="text" name="name">
                            </li>

                            <li>
                                <p>BSB</p>
                                <input type="text" name="name">
                            </li>

                            <li>
                                <p>Account Number</p>
                                <input type="text" name="name">
                            </li>

                            <li class="button-section">
                                <button>Add Details</button>
                            </li>
                        </ul>
                        <ul class="paypal-details">
                            <li>
                                <p>Paypal Details</p>
                                <input type="text" name="name">
                            </li>

                            <li class="button-section">
                                <button>Add Paypal Email</button>
                            </li>
                            <li>
                                <p>Paypal may charge additional transaction fees upon receipt of funds.</p>
                            </li>
                        </ul>
                    </div>
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
                                 xlink:href='images/icons/icon_definitions.svg#plus'/>
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
                <a target="_blank" href="#"><img src="{{asset('userpanel/images/google-play.png')}}" alt="Google play"/>
                </a>
                <a target="_blank" href="#"><img src="{{asset('userpanel/images/apple-store.png')}}" alt="Apple store"/>
                </a>
            </div>
            <div class="social">
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="facebook-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#facebook-circle')}}"/>
                    </svg>
                </a>
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="twitter-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#twitter-circle')}}"/>
                    </svg>
                </a>
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="google-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#google-circle')}}"/>
                    </svg>
                </a>
                <a target="_blank" href="#">
                    <svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="youtube-circle">
                        <use x='0' y='0' width='26' height='26'
                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#youtube-circle')}}"/>
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
        <img src="{{asset('userpanel/images/footer-logo.png')}}">
        <span class="lawyer-company-details">Lawyer Pty. Ltd 2011-2016©, All rights reserved</span>
    </div>
</div>
@include('includes.footer')
@include('includes.login')
@include('includes.postjob')
</body>
</html>
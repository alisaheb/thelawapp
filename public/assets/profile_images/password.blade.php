<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<title>Lawyer</title>
	<link href="{{asset('userpanel/css/style-min.css')}}" rel="stylesheet" />
	<link id="home" href="{{asset('userpanel/css/home-min.css')}}" rel="stylesheet" />
	<link href="{{asset('userpanel/css/bootstrap.css')}}" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="{{asset('userpanel/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="http://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyCxiKtsoPeyFaXndX_ZfhQ2QJiFMXGRDQU&amp;libraries=geometry,places&amp;language=en" type="text/javascript"></script>
   
</head>


<body>
    <div id="fb-root"></div>
    
    
    <div id="app-container" class="inner-common-page password-page">
        <div id="lawyer-app" class="">
            <div id="app-header">
                <!-- <div id="header-block" style="height:94px;"></div> -->
                <div id="header" style="height:94px;">
                    <div id="primary-menu">
						<div id="menu-mobile" class="mobile">
							<a id="lawyer-logo" href="index.html">
								<svg width="140" height="24" viewBox="0 0 140 24" version="1.1">
									<use x='0' y='0' width='140' height='24' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#AirtaskerLogo_colour')}}" />
								</svg>
							</a>
							<a class="sub-menu-tab">
								<canvas width="60" height="60" style="width:30px;height:30px;"></canvas>
							</a><a class="post-task-link icon"><span>Post a Task</span><svg width="18" height="18" viewBox="0 0 18 18" version="1.1" class="icon-plus"><use x='0' y='0' width='18' height='18' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/></svg></a>
						</div>
						<div class="web">
							<a id="lawyer-logo" href="index.html">
								<img src="{{asset('userpanel/images/site-logo-new.png')}}"></a>
								<!-- <svg width="111" height="19" viewBox="0 0 111 19" version="1.1">
									<use x='0' y='0' width='111' height='19' xlink:href='images/icons/icon_definitions.svg#AirtaskerLogo_colour' />
								</svg> -->
							
							<div id="menu-cta" class="left"><a class="post-task-link plain-text">Post a Task</a><a href="tasks/index.html" class="link browse-tasks-link">Browse Tasks</a><a href="how-it-works/index.html" class="link how-it-works-link">How it Works</a>
							</div> 
							<div id="menu-user" class="right">
								<!-- <a class="link login-link">Login</a>
								<a class="link sign-up-link">Sign up</a> -->
								<div class="dropdown">
									<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
									<span class="caret"></span></button>
									<ul class="dropdown-menu">
									  <li><a href="#">HTML</a></li>
									  <li><a href="#">CSS</a></li>
									  <li><a href="#">JavaScript</a></li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
                    
                </div>
            </div>
            <div id="page-and-screen-content">
                <div class="content">
					<div class="inner-page">
						<div class="left-sidebar-account">
							<div class="images-icon">
                                                            @if(!empty(Auth::user()->profile_image))
						             <div class="profile-image-icon">
						             <img  class="profile_pic" style="width:195px" src="{{url('../profile_images')}}/{{Auth::user()->profile_image}}"></div>		
								@else
								<img  src="{{asset('userpanel/images/image-icon.png')}}">						@endif
								<h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
							</div>
							@include('includes.dashboardlinks')
						</div>
						<div class="right-side">
							<h3 class="inner-page-headings">Password</h3>
							<div class="page-form">
								<ul>
									<li>
										<p>Current Password</p>
										<input type="text" name="firstname">
									</li>
									<li>
										<p>New Password</p>
										<input type="text" name="lastname">
									</li>
									<li>
										<p>Repeat Password</p>
										<input type="text" name="tagline">
									</li>
									<li class="button-section">
										<button>Update Password</button>
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
													<svg width="17" height="17" viewBox="0 0 17 17" version="1.1" class="folder-marker folder-marker-open"><use x='0' y='0' width='17' height='17' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/></svg>
													<svg width="17" height="17" viewBox="0 0 17 17" version="1.1" class="folder-marker folder-marker-close"><use x='0' y='0' width='17' height='17' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/></svg>
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
											<div class="menu-folder-control showing"><a class="button"><span>Company</span><svg width="17" height="17" viewBox="0 0 17 17" version="1.1" class="folder-marker folder-marker-open"><use x='0' y='0' width='17' height='17' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/></svg><svg width="17" height="17" viewBox="0 0 17 17" version="1.1" class="folder-marker folder-marker-close"><use x='0' y='0' width='17' height='17' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/></svg></a>
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
													<svg width="17" height="17" viewBox="0 0 17 17" version="1.1" class="folder-marker folder-marker-open"><use x='0' y='0' width='17' height='17' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/></svg>
													<svg width="17" height="17" viewBox="0 0 17 17" version="1.1" class="folder-marker folder-marker-close"><use x='0' y='0' width='17' height='17' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/></svg></a>
											</div>
											<div class="menu-folder-items"><a href="post-task/index.html" class="button">Post a Matter</a><a href="tasks/index.html" class="button">Browse Matters</a><a class="button">Login</a><a href="pro/index.html" class="button">Support Centre</a><a href="" class="button">Support Centre</a><a href="" class="button" target="_blank">Merchandise</a>
											</div>
										</div>
										<div class="menu-folder three columns">
											<div class="menu-folder-control showing">
												<a class="button">
													<span>Categories</span>
													<svg width="17" height="17" viewBox="0 0 17 17" version="1.1" class="folder-marker folder-marker-open"><use x='0' y='0' width='17' height='17' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#plus')}}"/></svg>
													<svg width="17" height="17" viewBox="0 0 17 17" version="1.1" class="folder-marker folder-marker-close"><use x='0' y='0' width='17' height='17' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#minus')}}"/></svg>
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
												<svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="facebook-circle" >
													<use x='0' y='0' width='26' height='26' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#facebook-circle')}}" />
												</svg>
											</a>
											<a target="_blank" href="#">
												<svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="twitter-circle">
													<use x='0' y='0' width='26' height='26' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#twitter-circle')}}" />
												</svg>
											</a>
											<a target="_blank" href="#">
												<svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="google-circle">
													<use x='0' y='0' width='26' height='26' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#google-circle')}}" />
												</svg>
											</a>
											<a target="_blank" href="#">
												<svg width="26" height="26" viewBox="0 0 26 26" version="1.1" class="youtube-circle">
													<use x='0' y='0' width='26' height='26' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#youtube-circle')}}" />
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
   
        <script src="{{asset('userpanel/js/popup-modal.js')}}"></script>
        <script src="{{asset('userpanel/js/custom.js')}}"></script> 
  <script src="{{asset('userpanel/js/posttask.js')}}" ></script>
   
</body>
</html>
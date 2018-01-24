    @extends('layouts.front')
    @section('title','The law app')
    @section('content')
        <div class="container inner_content">
            <div class="row">

                <!-- Left Dashboard Area-->
                <div class="col-md-2 bashboard_left">
                	@include('front.partials.sidebar')
                </div>

                <!-- Right Dashboard Area-->
                <div class="col-md-10">
                    <div class="dashboard-right">

                        <div class="dash-title">
                            <h2>Dashboard</h2>
                            <hr/>
                        </div>

                        <!-- Left Dashboard Slider Area-->
                        <div class="dash-slider">
                            <h3>What do you need done today?</h3>
                            <div class="owl-carousel owl-theme dashslider" id="carousel">
                                @foreach($categories as $category )
	                                <div class="item">
	                                    <div class="dashslide">
	                                       <img src="public/category_images/{!! $category->category_image !!}">
	                                        <h6>{{$category->name}}</h6>
	                                    </div>
	                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Left Dashboard Content Area-->

                        <div class="dashboard-content-area">
                            <div class="left-content">
                                <div class="dashboard-announcments-left">
                                    <h6>Announcements</h6>
                                    <ul>
                                    	@foreach($announcements as $announcement)
                                        <li>
                                            <p><span>New</span> {{ $announcement->announcement }}</p>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="right-content">
                                <div class="dashboard-announcments-right dashboard-announcments">
                                    <h6>Got a friend who could use some extra help?</h6>
                                    <div class="owl-carousel announcments owl-theme" id="carousel2">
                                        <div class="item">
                                            <div class="announ">
                                                <a href="#">{{ Html::image('assets/front/img/dashboard-image1.jpg') }}</a>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="announ">
                                                <a href="#"> {{ Html::image('assets/front/img/dashboard-image2.jpg') }}</a>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="announ">
                                                <a href="#">{{ Html::image('assets/front/img/dashboard-image3.jpg') }}</a>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="announ">
                                                <a href="#"> {{ Html::image('assets/front/img/dashboard-image2.jpg') }}</a>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="announ">
                                                <a href="#"> {{ Html::image('assets/front/img/dashboard-image1.jpg') }}</a>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="announ">
                                                <a href="#"> {{ Html::image('assets/front/img/dashboard-image3.jpg') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="find-btn">
                                        <button id="find-friend">Find Friends</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="task-summary">
                            <h3>My Task Summary</h3>
                            <div class="offer-area">
                             @if(Auth::user()->type=='lawyer')
                                <div class="col-md-3">
                                    <div class="open-offers">
                                        <span>0</span>

                                        <p>Open for offers</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="open-offers">
                                        <span>0</span>

                                        <p>Assigned</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="open-offers">
                                        <span>0</span>

                                        <p>Payment awaited</p>
                                    </div>
                                </div>
                                <div class="col-md-3 last">
                                    <div class="open-offers">
                                        <span>0</span>

                                        <p>Completed</p>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>

                        <div class="profile-content">
                            <h3>Your profile is {{$percentage}}% complete</h3>
                            <div class="profile-area">
                                <div class="offer-area">
                                    <div class="col-md-3 profile  @if($pper>0) {{'profile_success'}} @endif">
                                        <div class="badge-complete" id="profile">
                                            <div class="complete-icon">
                                                <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                                <h5>Profile</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 account @if($aper>0) {{'profile_success'}} @endif">
                                        <div class="badge-complete" id="profile">
                                            <div class="complete-icon">
                                                <i class="fa fa-university" aria-hidden="true"></i>
                                                <h5>Account</h5>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3 user @if($veri>0) {{'profile_success'}} @endif">
                                        <div class="badge-complete" id="profile">
                                            <div class="complete-icon">
                                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                                <h5>User Verification</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 payment @if($card>0) {{'profile_success'}} @endif">
                                        <div class="badge-complete" id="profile">
                                            <div class="complete-icon">
                                                <i class="fa fa-user-secret" aria-hidden="true"></i>
                                                <h5>Payments</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     @if(Auth::user()->profile_completion != 100)
            @include('front/partials/firstvisit')
        @endif
    @endsection
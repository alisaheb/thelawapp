@include('includes.head')
{!! Html::style('assets/userpanel/css/owl.carousel.css') !!}
{!! Html::style('assets/userpanel/css/owl.theme.css') !!}
</head>
<body>
<div id="fb-root"></div>
<style>
    .profile_pic {
        border-radius: 50px;
        width: 195px
    }

    .recent-acivity.acivity-notifications, .notofications.acivity-notifications {
        max-height: 400px;
        overflow-y: scroll;
    }
</style>
<div id="app-container" class="inner-common-page">
    <div id="lawyer-app" class="verification-page">
        <div id="app-header">
            <!-- <div id="header-block" style="height:94px;"></div> -->
            @include('includes.header')
        </div>
        <div id="page-and-screen-content">
            <div class="content">
                <div class="inner-page">
                    <div class="left-sidebar-account">
                        <div class="images-icon">
                            @if(!empty(Auth::user()->profile_image))
                                <img class="profile_pic" style="width:195px"
                                     src="{{ url('public/profile_images') }}/{{ Auth::user()->profile_image }}">
                            @else
                                {!! Html::image('assets/userpanel/images/image-icon.png') !!}
                            @endif
                            <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                        </div>
                        @include('includes.dashboardlinks')
                    </div>
                    <div class="right-side">
                        <h3 class="inner-page-headings">Dashboard </h3>

                        <div class="dashboard-section">
                            <div class="dashboard-slider">
                                <center>
                                    <h3>What do you need done today {{Auth::user()->fname}} {{Auth::user()->lname}}
                                        ?</h3>
                                </center>
                                <div id="demo">
                                    <div class="span12">
                                        <div id="owl-demo" class="owl-carousel">
                                            @foreach($categories as $category )
                                                
                                                <div class="item">
                                                    <img src="public/category_images/{!! $category->category_image !!}">

                                                    <div class="slider-bottom-text">{{$category->name}}</div>
                                                </div>
                                                
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="dashboard-announcments-left dashboard-announcments">
                                <h3>Announcements</h3>
                                <ul>
                                    @foreach($announcements as $announcement)
                                    <li>
                                        <span>New</span>

                                        <p>{{ $announcement->announcement }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="dashboard-announcments-right dashboard-announcments">
                                <h3>Got a friend who could use some extra help?</h3>
                                <ul>
                                    <li>{!! Html::image('assets/userpanel/images/dashboard-image1.jpg') !!}</li>
                                    <li>{!! Html::image('assets/userpanel/images/dashboard-image2.jpg') !!}</li>
                                    <li>{!! Html::image('assets/userpanel/images/dashboard-image3.jpg') !!}</li>
                                </ul>
                                <button id="find-friend">Find Friends</button>
                                {!! Html::image('assets/userpanel/images/free-tee.jpg') !!}
                            </div>
                            <div class="task-summary">
                                <h4>My Task Summary</h4>
                                @if(Auth::user()->type=='lawyer')
                                    <div class="open-offers task-summary-inner">
                                        <span>0</span>

                                        <p>Open for offers</p>
                                    </div>
                                    <div class="open-offers task-summary-inner">
                                        <span>0</span>

                                        <p>Assigned</p>
                                    </div>
                                    <div class="open-offers task-summary-inner">
                                        <span>0</span>

                                        <p>Payment awaited</p>
                                    </div>
                                    <div class="open-offers task-summary-inner">
                                        <span>0</span>

                                        <p>Completed</p>
                                    </div>
                                @else
                                    <div class="dashboard-post-task">
                                        <h2>Hi {{Auth::user()->fname}} {{Auth::user()->lname}}</h2>

                                        <p>This is a summary of your tasks, to get started simply post your first
                                            task</p>
                                        <button class="post-task">Post Task</button>
                                    </div>
                                @endif
                            </div>
                            <div class="profile-complete">
                                <h4>Your profile is {{$percentage}}% complete</h4>

                                <div class="badges clearfix">
                                    <div class="badge-complete" id="profile">
                                        <div class="complete-icon">
                                            @if($pper>0)
                                                <div class="at-icon-check active1 ico"></div>
                                            @else
                                                <div class="at-icon-exclamation-circle ico"></div>
                                            @endif
                                        </div>
                                        <div class="label">Profile</div>
                                    </div>

                                    <div class="badge-complete" id="account">
                                        <div class="complete-icon">
                                            @if($aper>0)
                                                <div class="at-icon-check active1 ico"></div>
                                            @else
                                                <div class="at-icon-exclamation-circle ico"></div>
                                            @endif
                                        </div>
                                        <div class="label">Account</div>
                                    </div>
                                    
                                    <div class="badge-complete" id="verification">
                                        <div class="complete-icon">
                                            @if($veri>0)
                                                <div class="at-icon-check active1 ico"></div>
                                            @else
                                                <div class="at-icon-exclamation-circle ico"></div>
                                            @endif
                                        </div>
                                        <div class="label">User Verification</div>
                                    </div>
                                    
                                    <div class="badge-complete" id="payments">
                                        <div class="complete-icon">
                                              @if($card>0)
                                                <div class="at-icon-check active1 ico"></div>
                                            @else
                                                <div class="at-icon-exclamation-circle ico"></div> 
                                            @endif
                                        </div>
                                        <div class="label">Payments</div>
                                    </div>
                                </div>
                            </div>
                            <!---code for comments-->
                            
                            <!--end of code for comments-->
                            <!--code for new cases-->
                            <!--iv class="notofications acivity-notifications">
                                <h3>Recent Cases on The Lawapp</h3>
                                @if($tasks->isEmpty())
                                    <p>No Recent Task</p>
                                @else
                                    <ul>
                                        @foreach($tasks as $task)
                                            <li>
                                                <span>{!! Html::image('assets/userpanel/images/activity-icon1.jpg') !!}</span>

                                                <p>New Task Alert: "{{$task->title}}" - ${{$task->estimate_budget}}
                                                    <font>{{ $task->created_at->diffForHumans() }}</font></p>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <!--end of notification code-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="static-page-content"></div>
    </div>
</div>
</div>
@include('includes.footer')
{!! Html::script('assets/userpanel/js/jquery-1.9.1.min.js') !!}
{!! Html::script('assets/userpanel/js/owl.carousel.js') !!}
<script>
    $(document).ready(function () {

        var owl = $("#owl-demo");

        owl.owlCarousel({

            items: 4, //10 items above 1000px browser width
            itemsDesktop: [1000, 2], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 2], // 3 items betweem 900px and 601px
            itemsTablet: [768, 1], //2 items between 600 and 0;
            itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
        });

        // Custom Navigation Events
        $(".next").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
        })
        $(".play").click(function () {
            owl.trigger('owl.play', 1000);
        })
        $(".stop").click(function () {
            owl.trigger('owl.stop');
        })
    });

</script>
{!! Html::script('assets/userpanel/js/bootstrap.min.js') !!}
{!! Html::script('assets/userpanel/js/popup-modal.js') !!}
{!! Html::script('assets/userpanel/js/custom.js') !!}
{!! Html::script('assets/userpanel/js/message.js') !!}
{!! Html::script('assets/userpanel/js/posttask.js')!!}
    @include('includes.userprofile')
    @include('includes.postjob')
    @include('includes.firstvisitpage')
    @include('includes.adminverification')
    @include('includes.msgnotification')
</body>
</html>
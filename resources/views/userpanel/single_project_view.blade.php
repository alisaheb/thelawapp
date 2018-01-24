<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Lawyer</title>
    <link href="{{asset('assets/userpanel/css/style-min.css')}}" rel="stylesheet"/>
    <link id="home" href="{{asset('assets/userpanel/css/home-min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/userpanel/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/userpanel/css/radio-button.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/userpanel/css/popup-layout.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/userpanel/css/modal-popup.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/bootstrap-multiselect.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/userpanel/js/vue.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="{{asset('assets/userpanel/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/userpanel/css/owl.theme.css')}}" rel="stylesheet" type="text/css">
    <!--	<link href="{{asset('assets/userpanel/css/bootstrap.min.css')}}" rel="stylesheet">-->


    <style>
        .list, .tasks-menu {
            border-right: 1px solid grey;
        }

        .task-right.single-project-right {
            max-height: 37.3em;
            overflow-y: visible;
        }

        .posted-pic {
            float: left;
            height: 60px;
            width: 60px;
        }

        .posted-pic img {
            border-radius: 50%;
            float: left;
            height: 90%;
            margin: 4px 0 0 2px;
            width: 90% !important;
        }

        .comment-pic {
            float: left;
            height: 40px;
            width: 40px;
        }

        .comment-pic img {
            border-radius: 50%;
            float: left;
            height: 90%;
            margin: 4px 0 0 2px;
            width: 90% !important;
        }
    </style>
</head>


<body>
<div id="fb-root"></div>


<div id="app-container" class="single-project">
    <div id="lawyer-app">
        <div id="app-header">
            <!-- <div id="header-block" style="height:94px;"></div> -->
            @include('includes.header')
        </div>
        <div id="secondary-menu">
            <div id="secondary-menu-inner">
                <div id="tasks-menu">
                    <div class="tasks-menu web"><a class="all-tasks">All Tasks</a><a class="open-tasks">Open Matters</a><a
                                class="online-tasks">Online Matters</a><a class="multi-tasks">engagements</a>
                    </div>
                    <div class="tasks-menu mobile"><a class="all-tasks">All</a><a class="open-tasks">Open</a><a
                                class="online-tasks">Online</a><a class="multi-tasks">engagements</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="page-and-screen-content">
            <div class="content">
                <div class="app-screen-with-sub-menu overflow-hidden" style="left:0;width:1024px;">
                    <div class="right_left">
                        <div class="task-right single-project-right" id="mytask" style="">
                            <div id="general-ajax-load" class="myt" style="display:none"><img
                                        src="{{asset('userpanel/images/loading.gif')}}"/></div>
                            <!---html stuff-->
                            <div id="map" style="width:100%;height:600px"></div>

                        </div>
                        <div class="task-list single-project-left" style="">
                            <div class="task-search" style="height:25px;">
                                <div class="tasks-menu">
                                    <div class="button-mode" id="show-map-button">
                                        <div class="at-icon-map-marker"></div>
                                        <span>Map</span>
                                    </div>
                                    <div class="button-mode">
                                        <div class="at-icon-search"></div>
                                        <span>Search</span>
                                    </div>
                                    <div class="button-mode " id="show-settings-button">
                                        <div class="at-icon-cog"></div>
                                        <span>Settings</span>
                                    </div>
                                </div>
                                <div class="search-bar">
                                    <div>
                                        <input class="search-input" value="" placeholder="Search tasks..."/>
                                    </div>
                                    <div class="at-icon-search" id="search-icon"></div>
                                </div>
                                <div class="padder-0-10">
                                    <div class="search-option">
                                        <div class="search-field"><span class="web""><span">Task</span>
                                            <span> </span></span><span>Status</span>
                                        </div>
                                        <div class="button-bar"
                                        "><a class="half selected">All</a><a class="half">Open</a>
                                    </div>
                                </div>
                                <div class="search-option">
                                    <div class="search-field"><span
                                                class="web"><span>Task</span><span> </span></span><span>Type</span>
                                    </div>
                                    <div class="button-bar"><a class="third selected">All</a><a class="third">Tasks with
                                            Location</a><a class="third">Online Tasks</a>
                                    </div>
                                </div>
                                <div class="search-option">
                                    <div class="search-field">Sort by</div>
                                    <select class="air-select">
                                        <option selected="" value="recent">Most Recent</option>
                                        <option value="distance">Distance</option>
                                        <option value="status">Task Status</option>
                                        <option value="price_asc">Price Ascending</option>
                                        <option value="price_desc">Price Descending</option>
                                    </select>
                                </div>
                                <div class="search-option">
                                    <div class="search-field"><span
                                                class="web"><span>Base</span><span> </span></span><span>Location</span>
                                    </div>
                                    <div class="air-location-component">
                                        <input id="location-input" value="Sydney, NSW" placeholder="Enter a suburb"/>

                                        <div class="suggestions closed"></div>
                                        <div id="clear-base-location" class="at-icon-remove"></div>
                                    </div>
                                </div>
                                <div class="search-option">
                                    <div class="search-field">Show Tasks Within</div>
                                    <select class="air-select">
                                        <option value="5000">5km</option>
                                        <option value="10000">10km</option>
                                        <option value="15000">15km</option>
                                        <option value="25000">25km</option>
                                        <option selected="" value="50000">50km</option>
                                        <option value="100000">100km</option>
                                        <option value="20000000">Everywhere</option>
                                    </select>
                                </div>
                                <div class="hr margin-10-0"></div>
                                <div class="search-buttons">
                                    <button id="update-button" class="button-cta button-med">Update</button>
                                    <button class="button-min button-med">Reset</button>
                                </div>
                            </div>
                        </div>
                        <div></div>
                        <div class="loaderific-not-loading"></div>
                        <div class="list vertical-scroll" style="position:relative;top:0;width:363px;height:35.6em;">
                            <div class="group">
                                <!--               <div class="list-splitter">There are 72 new task available</div>  -->

                                <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                @foreach($tasks as $task)
                                    <div class="list-item my-task" id="{{$task->id}}">
                                        <div class="task-list-item">
                                            <div class="image-icon">
                                                <img class="profile_pic" id="list-profile-pic" style="width:15px"
                                                     src="{{url('assets/profile_images')}}/{{Auth::user()->profile_image}}">
                                            </div>
                                            <div class="payment">
                                                <div class="task-price">
                                                    <div class="currency-symbol">$</div>
                                                    <div class="price">{{$task->estimate_budget}}</div>
                                                </div>
                                            </div>
                                            <div class="task-state open">
                                                <div class="text">Earn</div>
                                            </div>
                                            <div class="details"><a href="javascript:;"
                                                                    class="task-title">{{$task->title}}</a>

                                                <div class="location"><span
                                                            class="at-icon-map-marker"> </span><span>{{$task->place_of_incident}}</span>
                                                </div>
                                                <div class="single-task">
                                                    <div>
                                                        <div class="comment-count">1 comment</div>
                                                        <div class="bid-count">1 offer</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>
                <div class="new_1">
                    <!-- <div class="padder center see-more-tasks">
                        <h5>To see more tasks</h5>
                        <button class="button-cta button-med">Join Airtasker</button><span class="padder">or</span>
                        <button class="button-min button-med">Login</button>
                    </div> -->
                </div>
            </div>
        </div>
        <div id="static-page-content"></div>
    </div>
</div>
</div>

@include('includes.footer')

<script>
    function myMap() {
        var mapCanvas = document.getElementById("map");
        var mapOptions = {
            center: new google.maps.LatLng(51.5, -0.2),
            zoom: 10
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyBirRJtSjjGeex3B2KaFZEiMLUOe7rfS7E "></script>
<script src="{{asset('assets/userpanel/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/owl.carousel.js')}}"></script>
<script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>
<script src="{{asset('assets/userpanel/js/custom.js')}}"></script>
<script src="{{asset('assets/userpanel/js/posttask.js')}}"></script>
@include('includes.userprofile')
@include('includes.postjob')
@include('includes.bid')


</body>
</html>

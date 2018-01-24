@include('includes.head')
<link href="{{asset('assets/userpanel/css/radio-button.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/userpanel/css/popup-layout.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/userpanel/css/modal-popup.css')}}" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<link href="{{asset('assets/userpanel/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/userpanel/css/owl.theme.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/userpanel/css/custom.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<!--	<link href="{{asset('assets/userpanel/css/bootstrap.min.css')}}" rel="stylesheet">-->


</head>


<body>
<div id="fb-root"></div>


<div id="app-container" class="single-project">
    <div id="lawyer-app">
        <div id="app-header">
            <!-- <div id="header-block" style="height:94px;"></div> -->
            @include('includes.header')
        </div>

        <!--            <div id="secondary-menu">
                              <div id="secondary-menu-inner">
                                  <div id="tasks-menu">
                                      <div class="tasks-menu web"><a class="all-tasks">All Tasks</a><a class="open-tasks">Open Matters</a><a class="online-tasks">Online Matters</a><a class="multi-tasks">engagements</a>
                                      </div>
                                      <div class="tasks-menu mobile"><a class="all-tasks">All</a><a class="open-tasks">Open</a><a class="online-tasks">Online</a><a class="multi-tasks">engagements</a>
                                      </div>
                                  </div>
                              </div>
                          </div> -->

        <div id="page-and-screen-content">
            <div class="content">
                <div class="app-screen-with-sub-menu overflow-hidden" style="left:0;width:1024px;">
                    <div class="right_left">
                        <div id="general-ajax-load" class="myt" style="display:none"><img
                                    src="{{asset('assets/userpanel/images/loading.gif')}}"/></div>
                        <!---code for right section-->

                        <div class="task-right single-project-right" id="task-default">
                            <div id="map" style="width:100%;height:600px"></div>
                        </div>

                        <div class="task-right single-project-right" id="mytask" style="display:none">

                            <div class="single-project-inner">

                                <div class="single-project-inner-left">
                                    <h3 id="title"></h3>
									<span>
                    <div class="posted-pic ">
                        <img class="profile_pic task-up-image" style="width:15px"
                             src="{{asset('public/userpanel/images/image-icon.png')}}">
                    </div>
                    <p id="fullname"></p>
                  </span>

                                    <ul class="task-status">
                                        <li class="active" id="open"><a href="#">Open</a></li>
                                        <li id="accept"><a href="#">Accepted</a></li>
                                        <li id="complete"><a href="#">Complete</a></li>
                                    </ul>
                                </div><!--single-project-inner-left-->


                                <div class="single-project-inner-right">
                                    <div class="paid-with-pay">
                                        <span>Paid with Lawyer Pay<font>?</font></span>

                                        <h3 id="price"></h3>
                                        <a href="javascript:;" class="offerclass" id="makeoffer">Make an Offer</a>
                                    </div>

                                    <!--			<div class="more-options">
                                                        <div class="dropdown">
                                                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" id="tsk-drop" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                                                  <ul id="tsk-down" class="dropdown-menu">
                                                                      <li><a href="#">Action</a></li>
                                                                      <li><a href="#">Another action</a></li>
                                                                      <li><a href="#">Something else here</a></li>
                                                                      <li role="separator" class="divider"></li>
                                                                      <li class="dropdown-header">Nav header</li>
                                                                      <li><a href="#">Separated link</a></li>
                                                                      <li><a href="#">One more separated link</a></li>
                                                                      <li><a id="review-give" href="javascript:;">Review</a></li>
                                                                  </ul>
                                                        </div>
                                                </div> -->
                                </div><!--single-project-inner-right-->

                            </div><!--single-project-inner--->

                            <div class="single-project-inner single-project-description">
                                <p>Description</p>

                                <p id="description"></p>

                                <div class="ltaskimages">


                                </div>
                                <!--	      <img id="imagePreview_two" class="profile_pic" style="width:75px" src="http://localhost/larafive/public/userpanel/images/image-icon.png">
                                             <p><input type="file" id="incident-pic" style="display:none">
                                                <label for="incident-pic">Attach Image</label>
                                                <button style="display:none" id="image-upload" class="button-cta button-lrg center ">Upload Profile</button>-->
                                </p>
                                <a href="javascript:;">Due in 6 days</a>
                                <a href="javascript:;">Paid with lawyer pay</a>
                            </div><!---single-project-description-->

                            <div id="outer-div" class="outerdiv">
                                <div class="map-task" id="map_two" style="width:100%;height:200px"></div>

                                <div class="single-project-outer">
                                    <div class="single-project-inner single-project-offers">

                                        <div class="rewiew assignee" style="display:none">
                                            <p><font>Assigned to</font></p>

                                            <div class="review_single">
                                                <div class="rew_img">
                                                    <img src="http://dev.thelawapp.com.au/profile_images/1479160671479_1477384640489_dwayne.jpg">
                                                </div>
                                                <div class="rew_per assignee_name">
                                                    <a id="assignedto" href="#">

                                                    </a>
                                                </div>
                                                <div class="rew_rating assinee_rating">
                                                    <p class="star"><span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star-half-o"
                                                                 aria-hidden="true"></i></span></p>

                                                    <p>85% Completion Rate</p>
                                                </div>
                                            </div>

                                        </div>

                                        <!--<div class="review-section"></div>-->
                                        <div class="rewiew reviewee" style="display:none">
                                            <p><font>Offers</font><br> Be the first to make an offer on this task.</p>

                                            <div class="review_single">
                                                <div class="rew_img">
                                                    <img src="http://dev.thelawapp.com.au/profile_images/1479160671479_1477384640489_dwayne.jpg">
                                                </div>
                                                <div class="rew_per">
                                                    <a href="#">
                                                        Mohammad E
                                                    </a>
                                                </div>
                                                <div class="rew_rating">
                                                    <p class="star"><span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star-half-o"
                                                                 aria-hidden="true"></i></span></p>

                                                    <p>85% Completion Rate</p>
                                                </div>
                                            </div><!--end of row first-->

                                            <div class="review_single">
                                                <div class="rew_img">
                                                    <img src="http://dev.thelawapp.com.au/profile_images/1479160671479_1477384640489_dwayne.jpg">
                                                </div>
                                                <div class="rew_per">
                                                    <a href="#">
                                                        Fariq.r
                                                    </a>
                                                </div>
                                                <div class="rew_rating">
                                                    <p class="star"><span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                        <span><i class="fa fa-star-half-o"
                                                                 aria-hidden="true"></i></span></p>

                                                    <p>85% Completion Rate</p>
                                                </div>
                                            </div><!---end of row-->

                                        </div><!--end of class review-->


                                    </div><!--single-project-inner review section-->

                                    <div class="single-project-inner task-activity">
                                        <p>Task Activity</p>

                                        <h3><span class="count_comment ">0 comments about this Task</span></h3>
                                        <span class="list_comments"></span>

                                        <div class="attach-file-section comment-sec ">
                                            <div class="attach-file-icon comment-pic"><img
                                                        src="{{asset('public/profile_images')}}/{{Auth::user()->profile_image}}">
                                            </div>

                                            <div class="attach-file-right">
                                                <input type="hidden" value="" id="taskid">
                                                <input type="hidden"
                                                       value="{{Auth::user()->fname}} {{Auth::user()->lname}}"
                                                       id="user_name">
                                                <input type="hidden" value="{{Auth::user()->id}}" id="comment_by">
                                                <input type="hidden"
                                                       value="{{asset('public/profile_images')}}/{{Auth::user()->profile_image}}"
                                                       id="image_name">

                                                <textarea name="comment" id="comment"
                                                          placeholder="Ask a question about this task"></textarea>

                                                <p class="characters-remaining">500 characters remaining</p>

                            <span class="attch-files-buttons">
          		<!--	<button class="attach-file-button">Attach File</button>-->
          			<button class="attach-file-send-button comment-submit">Send</button>
                            </span>
                                            </div>
                                        </div>
                                    </div><!--single-project-inner-->

                                </div><!--single-project-outer-->

                            </div><!--outer div-->

                        </div><!--task-right-->


                        <!--end of code-->

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
                                        <div class="button-bar"><a class="half selected">All</a><a class="half">Open</a>
                                        </div>
                                    </div>

                                    <div class="search-option">
                                        <div class="search-field"><span
                                                    class="web"><span>Task</span><span> </span></span><span>Type</span>
                                        </div>
                                        <div class="button-bar"><a class="third selected">All</a><a class="third">Tasks
                                                with Location</a><a class="third">Online Tasks</a>
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
                                            <input id="location-input" value="Sydney, NSW"
                                                   placeholder="Enter a suburb"/>

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
                            </div><!---task-search-->


                            <div class="loaderific-not-loading"></div>
                            <div class="list vertical-scroll"
                                 style="position:relative;top:0;width:363px;height:35.6em;">
                                <div class="group">
                                    <div class="list-splitter">There are {{$count}} new task available</div>

                                    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

                                    @foreach($cases as $case)
                                        <a href="{{url('cases')}}/{{$case->slug}}">
                                            <div class="list-item browse-case" id="{{$case->id}}">
                                                <div class="task-list-item">
                                                    <div class="loaderific-not-loading"></div>
                                                    <div class="image-icon">
                                                        @if(!empty($case->user->profile_image))
                                                            <img class="profile_pic" style="width:15px"
                                                                 src="{{asset('public/profile_images')}}/{{$case->user->profile_image}}">
                                                        @else
                                                            <img class="profile_pic" style="width:15px"
                                                                 src="{{asset('public/userpanel/images/image-icon.png')}}">
                                                        @endif
                                                    </div>

                                                    <div class="payment">
                                                        <div class="task-price">
                                                            <div class="currency-symbol">$</div>
                                                            <div class="price">{{$case->estimate_budget}}</div>
                                                        </div>
                                                    </div>

                                                    @if($case->status=='open')
                                                        <div class="task-state open">
                                                            <div class="text">More</div>
                                                        </div>
                                                    @endif

                                                    @if($case->status=='accept')
                                                        <div class="task-state open">
                                                            <div class="text">Assigned</div>
                                                        </div>
                                                    @endif

                                                    @if($case->status=='complete')
                                                        <div class="task-state open">
                                                            <div class="text">Complete</div>
                                                        </div>
                                                    @endif

                                                    <div class="details">
                                                        <div class="task-title">{{$case->title}}</div>
                                                        <div class="location">
                                                            <span class="at-icon-map-marker"> </span>
                                                            <span class="user_status user_{{$case->user->id}}">{{$case->place_of_incident}}</span>
                                                        </div>
                                                        <div class="single-task">
                                                            <div>
                                                                <div class="comment-count"></div>
                                                                <div class="bid-count"> {{ count($case->bids)}} offer</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div><!--group-->
                            </div><!--vertical-scroll-->
                        </div><!---single-project-left-->
                    </div><!--right left-->

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
        </div><!---page-and-screen-content-->
    </div>
</div>
@include('includes.footer')

<!--script>
    function myMap() {
        var mapCanvas = document.getElementById("map");
        var mapCanvasTwo = document.getElementById("map_two");
        var latlng7 = new google.maps.LatLng(28.490363, -81.379598);

        var mapOptions = {
            center: new google.maps.LatLng(51.5, -0.2),
            zoom: 10
        }
        var myOptions =
        {
            zoom: 13,
            center: new google.maps.LatLng(51.5, -0.2),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var maptwo = new google.maps.Map(mapCanvasTwo, myOptions);

    }
</script-->

<script async defer
        src="https://maps.googleapis.com/maps/api/js?v=3.25&key=AIzaSyBirRJtSjjGeex3B2KaFZEiMLUOe7rfS7E&callback=myMap"></script>

<script src="{{asset('assets/userpanel/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/owl.carousel.js')}}"></script>
<script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>
<script src="{{asset('assets/userpanel/js/custom.js')}}"></script>

@include('includes.userprofile')
@include('includes.postjob')
@include('includes.adminverification')
@include('includes.msgnotification')
</body>
</html>

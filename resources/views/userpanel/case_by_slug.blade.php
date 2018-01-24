

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
<body>
    <div id="fb-root"></div>
    <div id="app-container" class="single-project">
        <div id="lawyer-app">
            <div id="app-header">
                @include('includes.header')
            </div>
            <div id="page-and-screen-content">
                <div class="content">
                    <div class="app-screen-with-sub-menu overflow-hidden" style="left:0;width:1024px;">
                        <div class="right_left">
                            <div id="general-ajax-load" class="myt" style="display:none"><img
                                src="{{asset('assets/userpanel/images/loading.gif')}}"/></div>
                            <div class="task-right single-project-right" id="mytask" style="">
                                <div class="single-project-inner">
                                    <div class="single-project-inner-left">
                                        <h3 id="title">{{$slugcase->title}}</h3>
                                        <span>
                                            <div class="posted-pic ">
                                                <img class="profile_pic task-up-image" style="width:15px"
                                                    src="{{asset('public/profile_images')}}/{{$slugcase->user->profile_image}}">
                                            </div>
                                            <p id="fullname">Posted
                                                by {{$slugcase->user->fname}} {{$slugcase->created_at->diffForHumans()}}
                                            </p>
                                        </span>
                                        <ul class="task-status">
                                            <li class="active" id="open"><a href="#">Open</a></li>
                                            <li id="accept"
                                                class="@if(($slugcase->status=='accept')||($slugcase->status=='complete')) active @endif">
                                                <a href="#">Accepted</a>
                                            </li>
                                            <li id="complete" class="@if($slugcase->status=='complete') active @endif"><a
                                                href="#">Complete</a></li>
                                        </ul>
                                    </div>
                                    <!--single-project-inner-left-->
                                    <div class="single-project-inner-right">
                                        <div class="paid-with-pay">
                                            <span>Paid with Lawyer Pay<font>?</font></span>
                                            <h3 id="price">$ {{$slugcase->estimate_budget}}</h3>
                                            @if($slugcase->status=='complete')
                                            <a href="javascript:;" class=" inactive" id="" style="pointer-event:none">Completed</a>
                                            @elseif($accept>0)
                                            <a href="javascript:;" class=" inactive" id="" style="pointer-event:none">Assigned</a>
                                            @elseif($bid>0)
                                            <a href="javascript:;" class="offerclass inactive" id=""
                                                style="pointer-event:none">Offer made by you</a>
                                            @else
                                            <a href="javascript:;" class="offerclass" id="makeoffer">Make an Offer</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--single-project-inner-->
                                <div class="single-project-inner single-project-description">
                                    <p>Description</p>
                                    <p id="description">{{$slugcase->description}}</p>
                                    <div class="taskimages">
                                        @foreach($taskdocs as $taskdoc)
                                        <span>
                                        <img class="my_task_attach_pic" src="{{asset('taskdocs')}}/{{$taskdoc->filename}}"
                                            style="width:75px"/><i class="fa cut fa-times-circle delete-tf" aria-hidden="true"
                                            data-id="{{$taskdoc->id}}"></i>
                                        </span>
                                        @endforeach
                                    </div>
                                    <a href="javascript:;">Due date {{$slugcase->last_date}} </a>
                                    <a href="javascript:;">Paid with lawyer pay</a>
                                </div>
                                <!---single-project-description-->
                                <div id="outer-div" class="outerdiv">
                                    <div class="map-task" id="map" style="width:100%;height:200px"></div>
                                    <div class="single-project-outer">
                                        <div class="single-project-inner single-project-offers">
                                            @if($slugcase->status=='accept')
                                            <div class="rewiew assignee" style="display:block">
                                                <p><font>Assigned to</font></p>
                                                <div class="review_single">
                                                    <div class="rew_img">
                                                        <img src="{{asset('public/profile_images')}}/{{$assignee->users->profile_image}}">
                                                    </div>
                                                    <div class="rew_per assignee_name">
                                                        <a id="assignedto"
                                                            href="#"> {{$assignee->users->fname}} {{$assignee->users->lname}}</a>
                                                    </div>
                                                    <div class="rew_rating assinee_rating">
                                                        <p class="star"><span><i class="fa fa-star"
                                                            aria-hidden="true"></i></span> <span><i
                                                            class="fa fa-star"
                                                            aria-hidden="true"></i></span> <span><i
                                                            class="fa fa-star"
                                                            aria-hidden="true"></i></span> <span><i
                                                            class="fa fa-star"
                                                            aria-hidden="true"></i></span> <span><i
                                                            class="fa fa-star-half-o"
                                                            aria-hidden="true"></i></span></p>
                                                        <p>85% Completion Rate</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <!--<div class="review-section"></div>-->
                                            <div class="rewiew reviewee" style="">
                                                @if($bidder_count==0)
                                                <p class="offer-first">
                                                    Be the first to make an offer on this task.
                                                </p>
                                                @else
                                                {{$bidder_count}}  people are offered
                                                @endif
                                            </div>
                                            <!--end of class review-->
                                            @endif
                                        </div>
                                        <!--single-project-inner review section-->
                                        <div class="single-project-inner task-activity">
                                            <p>Task Activity</p>
                                            <h3><span class="count_comment ">{{count($comments)}}
                                                comments about this Task</span>
                                            </h3>
                                            <span class="list_comments">
                                                @foreach($comments as $comment)
                                                @if($comment->userby->id==Auth::user()->id)
                                                <div class='outer-new'>
                                                    <span class='new-comment'>
                                                        <h3>{{$comment->userby->fname}}{{$comment->userby->lname}}</h3>
                                                        <p>{{$comment->comments}}</p>
                                                    </span>
                                                    <div class='comment-pic'>
                                                        <img src="{{asset('public/profile_images')}}/{{$comment->userby->profile_image}}"/>
                                                    </div>
                                                </div>
                                                @else
                                                <div class='outer-ajaxbrowsecase'>
                                                    <div class='posted-pic'>
                                                        <img src="{{asset('public/profile_images')}}/{{$comment->userby->profile_image}} "/>
                                                        <p>{{$comment->userby->fname}} {{$comment->userby->lname}}</p>
                                                    </div>
                                                    <span class='old-comments'>
                                                        <h4>{{$comment->userby->fname}} {{$comment->userby->lname}}</h4>
                                                        <p>{{$comment->comments}}</p>
                                                    </span>
                                                </div>
                                                @endif
                                                @endforeach
                                            </span>
                                            <div class="attach-file-section comment-sec  task_{{$slugcase->id}}">
                                                <div class="attach-file-icon comment-pic"><img
                                                    src="{{asset('public/profile_images')}}/{{Auth::user()->profile_image}}">
                                                </div>
                                                <div class="attach-file-right">
                                                    <input type="hidden" value="{{$slugcase->id}}" id="taskid">
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
                                                        <!--    <button class="attach-file-button">Attach File</button>-->
                                                        <button class="attach-file-send-button comment-submit">Send</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single-project-inner-->
                                    </div>
                                    <!--single-project-outer-->
                                </div>
                                <!--outer div-->
                            </div>
                            <!--task-right-->
                            <!--end of code-->
                            <div class="task-list single-project-left" style="">
                                <div class="task-search" style="height:25px;">
                                    <div class="tasks-menu">
                                        <div class="button-mode" id="show-map-button">
                                            <!--                   <div class="at-icon-map-marker"></div><span>Map</span> -->
                                        </div>
                                        <div class="button-mode">
                                            <!--                   <div class="at-icon-search"></div><span>Search</span> -->
                                        </div>
                                        <div class="button-mode " id="show-settings-button">
                                            <!--                   <div class="at-icon-cog"></div><span>Settings</span> -->
                                        </div>
                                    </div>
                                    <div class="search-bar">
                                        <div>
                                            <!--                   <input class="search-input" value="" placeholder="Search tasks..."/> -->
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
                                </div>
                                <!---task-search-->
                                <div class="loaderific-not-loading"></div>
                                <div class="list vertical-scroll"
                                    style="position:relative;top:0;width:363px;height:35.6em;">
                                    <div class="group">
                                        <div class="list-splitter">There are {{$count}} new task available</div>
                                        <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @foreach($cases as $case)
                                        <a href="{{url('cases')}}/{{$case->slug}}">
                                            <div class="list-item browse-cases" id="{{$case->id}}"
                                                data-slug="{{$case->slug}}">
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
                                                    @elseif($case->status=='accept')
                                                    <div class="task-state open">
                                                        <div class="text">Assigned</div>
                                                    </div>
                                                    @elseif($case->status=='complete')
                                                    <div class="task-state open">
                                                        <div class="text">Complete</div>
                                                    </div>
                                                    @endif
                                                    <div class="details">
                                                        <div class="task-title">{{$case->title}}</div>
                                                        <div class="location">
                                                            <div class="bid-count">{{ count($case->bids) }} offer</div>
                                                            <span class="at-icon-map-marker"> </span>
                                                            <span class="user_status user_{{$case->user->id}}">{{$case->place_of_incident}}</span>
                                                        </div>
                                                        <div class="single-task">
                                                            <div>
                                                                <div class="comment-count"></div>
                                                                <!--div class="bid-count">3 offer</div-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                    <!--group-->
                                </div>
                                <!--vertical-scroll-->
                            </div>
                            <!---single-project-left-->
                        </div>
                        <!--right left-->
                        <div class="new_1">
                        </div>
                    </div>
                </div>
                <div id="static-page-content"></div>
            </div>
            <!---page-and-screen-content-->
        </div>
    </div>
    @include('includes.footer')
    <script>
        /*  function myMap() {
              var mapCanvas = document.getElementById("map");
              var mapOptions = {
                  center: new google.maps.LatLng(51.5, -0.2), zoom: 10
              };
              var map = new google.maps.Map(mapCanvas, mapOptions);
          }*/
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?v=3.25&key=AIzaSyBirRJtSjjGeex3B2KaFZEiMLUOe7rfS7E&callback=myMap"></script>
    <script src="{{asset('assets/userpanel/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('assets/userpanel/js/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>
    <script src="{{asset('assets/userpanel/js/custom.js')}}"></script>
    @include('includes.postjob')
    @include('includes.bid')
    @include('includes.adminverification')
    @include('includes.msgnotification')
    <script type="text/javascript">
        $('#certificate-verification').click(function() {
        $('#veri-certificate-popup').addClass('md-show');
        
        });
        $('#makeoffer').click(function(){$('#makeOfferDiv').addClass('md-show')});
        
        /* This code is for ajax-certificate upload*/
        
        var offerForm = $("#makeOfferForm");
        $('#makeoffer').click(function(){$('#makeOfferDiv').addClass('md-show');
        });
        
        $(document).ready(function() {
        $('#makeOfferButton').click(function(e){
        e.preventDefault();
        $('#makeOfferDiv').removeClass('md-show')
        $('#general-ajax-load').show();
        var formData = $("#makeOfferForm").serialize(); 
        $('#offerprice-error').html("");
        $('#description-error').html("");
        $(".price-div").removeClass("has-error");
        $(".description-div").removeClass("has-error");
        var url = $('meta[name= "baseurl"]').attr('content');
        console.log(formData);
        $.ajax({
        url: url + '/make-offer',
        type: 'POST',
        data: formData,
        success: function(data) {
            $('#general-ajax-load').hide();
            location.reload(true);
        },
        error: function(data) {
            $('#makeOfferDiv').addClass('md-show')
            $('#general-ajax-load').hide();
            var obj = jQuery.parseJSON(data.responseText);
            if (obj.offer_price) {
                $(".price-div").addClass("has-error");
                $('#offerprice-error').html(obj.offer_price);
                }
            if (obj.description) {
                $(".description-div").addClass("has-error");
                $('#description-error').html(obj.description);
                }
            }
        });
        });
        });
    </script>
</body>
</html>


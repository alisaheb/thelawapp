

@include('includes.head')
<link href="{{asset('assets/userpanel/css/radio-button.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/userpanel/css/popup-layout.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/userpanel/css/modal-popup.css')}}" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<link href="{{asset('assets/userpanel/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/userpanel/css/owl.theme.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/userpanel/css/custom.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<!--    <link href="{{asset('assets/userpanel/css/bootstrap.min.css')}}" rel="stylesheet">-->
<body>
    <div id="fb-root"></div>
    <div id="app-container" class="single-project">
        <div id="lawyer-app">
            <div id="app-header">
                <!-- <div id="header-block" style="height:94px;"></div> -->
                @include('includes.header')
            </div>
            <div id="page-and-screen-content">
                <div class="content">
                    <div class="app-screen-with-sub-menu overflow-hidden" style="left:0;width:1024px;">
                        <div class="right_left">
                            <div id="general-ajax-load" class="myt" style="display:none"><img src="{{asset('public/assets/userpanel/images/loading.gif')}}"/></div>
                            <!---code for right section-->
                            <!--<div class="task-right single-project-right" id="task-default"  >
                                </div>-->
                            <!---code for onclick event-->  
                            <div class="task-right single-project-right" id="mytask" style="">
                                <div class="single-project-inner">
                                    <div class="single-project-inner-left">
                                        <h3 id="title">{{$slugcase->title}}</h3>
                                        <span>
                                            <div class="posted-pic ">
                                                <img  class="profile_pic task-up-image" style="width:15px" src="{{url('public/profile_images')}}/{{$slugcase->user->profile_image}}">
                                            </div>
                                            <p id="fullname">Posted by {{$slugcase->user->fname}} {{$slugcase->created_at->diffForHumans()}}</p>
                                        </span>
                                        <ul class="task-status">
                                            <li class="@if($slugcase->status!='unverify')active @endif" id="open">
                                                <a href="javascript:;">Open</a>
                                            </li>
                                            <li id="accept" class="@if(($slugcase->status=='accept')||($slugcase->status=='complete')) active @endif">
                                                <a href="javascript:;">Accepted</a>
                                            </li>
                                            <li id="complete" class="@if($slugcase->status=='complete') active @endif">
                                                <a href="javascript:;">Complete</a>
                                            </li>
                                            <li id='paid'  class="@if($slugcase->paid=='1') active @endif"  >
                                                <a href="javascript:;">Paid</a>
                                            </li>
                                            <li id='reviewed'  class="@if($slugcase->reviewed=='1') active @endif">
                                                <a href="javascript:;">Reviewed</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--single-project-inner-left-->
                                    <div class="single-project-inner-right">
                                        <div class="paid-with-pay">
                                            <span>Paid with Lawyer Pay<font>?</font></span>
                                            <h3 id="price">$ {{$slugcase->estimate_budget}}</h3>
                                            @if($slugcase->status=='complete')
                                            <a href="javascript:;" class=" inactive" id="" style="pointer-event:none">Complete</a>
                                            @elseif($slugcase->status=='unverify')
                                            <a href="javascript:;" class=" inactive" id="" style="pointer-event:none">Pending</a>
                                            @elseif($slugcase->status=='accept')
                                            <a href="javascript:;" class=" inactive" id="" style="pointer-event:none">Assigned</a>
                                            @elseif($bidder_count>0)
                                            <a href="javascript:;" class="offerclass" id="reviewoffer" data-taskid="{{$slugcase->id}}">Review Offers</a>
                                            @else
                                            <a href="javascript:;" class="inactive" >Awaiting offers</a>
                                            @endif
                                        </div>
                                    </div>
                                    <!--single-project-inner-right-->
                                </div>

                                    
                                    @if((isset($reviews[0]->user_id) != Auth::user()->id) && count($reviews) == 1)
                                        <div class="reviewu attach-file-section comment-sec  task_{{$slugcase->id}}" style="display: none">
                                            <div class="attach-file-icon comment-pic"><img src="{{url('public/profile_images')}}/{{Auth::user()->profile_image}}">
                                            </div>
                                            <form id="reviewForm">
                                                <div class="attach-file-right">
                                                    <textarea name="reviews" placeholder="Give a review" id="reviews"></textarea>
                                                    <input type="hidden" name="id" value="{{$slugcase->id}}" id="id">
                                                    <span class="attch-files-buttons">
                                                        <button class="attach-file-send-button" id="reviewButton" type="submit">Post</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
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
                                                        <a id="assignedto" href="#"> {{$assignee->users->fname}} {{$assignee->users->lname}}</a>
                                                    </div>
                                                    <div class="rew_rating assinee_rating">
                                                        <p class="star"> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </p>
                                                        <p>85% Completion Rate</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <!--<div class="review-section"></div>-->
                                            <div class="rewiew reviewee" style="">
                                                @if($bidder_count==0) 
                                                No offer avilable
                                                @else  
                                                <table>
                                                    @foreach($bidders as $bidder)  
                                                    <tr>
                                                        <td>
                                                            <img src="{{url('public/profile_images')}}/{{$bidder->users->profile_image}}"  width="80px">
                                                            <p class="star">
                                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                <span><i class="fa fa-star-half-o" aria-hidden="true"></i></span>
                                                            </p>
                                                        </td>
                                                        <td><a href="{{url('profile')}}/{{$bidder->users->id}}">{{$bidder->users->fname}}  {{$bidder->users->lname}}  </a></td>
                                                        <td>{{$bidder->offer_price}} </td>
                                                        <td> {{substr($bidder-> description,0,21)}} <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".bs-example-modal-{{$bidder->id}}">Details</button></td>
                                                        <td> 
                                                            <button class="btn btn-primary hireNow"  data-name="{{$bidder->users->fname}}"  data-uid="{{$bidder->users->id}}"  data-id="{{$bidder->task_id}}"  data-budget="{{$bidder->offer_price}}" >Hire</button>
                                                        </td>
                                                    </tr>
                                            </div>
                                            <!---end of row-->
                                            @endforeach  
                                            </table>  
                                            @endif                  
                                        </div>
                                        <!--end of class review-->
                                        @endif                              
                                    </div>
                                    <!--single-project-inner review section-->
                                    
                                    @if(count($reviews) === 2 || isset($reviews[0]->user_id) == Auth::user()->id)

                                    <div class="single-project-inner task-activity">
                                       
                                        <h4><span class="count_comment ">Reviews</span></h4><br>
                                        <span class="list_comments">
                                        @foreach($reviews as $review)
                                            <div class="outer-ajaxbrowsecase">
                                                <span class="old-comments">
                                                    <h4>{{$review->users->fname}} {{$review->users->lname}}</h4>
                                                    <p>{{$review->reviews}}</p>
                                                </span>
                                            </div>
                                        @endforeach                                           
                                        </span>
                                        <!--comments-->
                                    </div>
                                    @endif
                                  



                                    <div class="single-project-inner task-activity">
                                        <p>Task Activity</p>
                                        <h3><span class="count_comment ">{{count($comments)}} comments about this Task</span></h3>
                                        <!--comments on this task-->
                                        <span class="list_comments">
                                            @foreach($comments as $comment)
                                            @if($comment->userby->id==Auth::user()->id)      
                                            <div class='outer-new'>
                                                <span class='new-comment'>
                                                    <h3>{{$comment->userby->fname}}{{$comment->userby->lname}}</h3>
                                                    <p>{{$comment->comments}}</p>
                                                </span>
                                                <div class='comment-pic'>
                                                    <img src="{{url('public/profile_images')}}/{{$comment->userby->profile_image}}"/>
                                                </div>
                                            </div>
                                            @else
                                            <div class='outer-ajaxbrowsecase'>
                                                <div class='posted-pic'>
                                                    <img src="{{url('public/profile_images')}}/{{$comment->userby->profile_image}} "/>
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
                                        <!--comments-->
                                        <div class="attach-file-section comment-sec  task_{{$slugcase->id}}">
                                            <div class="attach-file-icon comment-pic"><img src="{{url('public/profile_images')}}/{{Auth::user()->profile_image}}"></div>
                                            <div class="attach-file-right">
                                                <input type="hidden" value="{{$slugcase->id}}" id="taskid">
                                                <input type="hidden" value="{{Auth::user()->fname}} {{Auth::user()->lname}}" id="user_name">
                                                <input type="hidden" value="{{Auth::user()->id}}" id="comment_by">
                                                <input type="hidden" value="{{url('public/profile_images')}}/{{Auth::user()->profile_image}}" id="image_name">
                                                <textarea name="comment" id="comment" placeholder="Ask a question about this task"></textarea>
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
                                        <div class="search-field"><span class="web""><span">Task</span><span> </span></span><span>Status</span>
                                        </div>
                                        <div class="button-bar"><a class="half selected">All</a><a class="half">Open</a>
                                        </div>
                                    </div>
                                    <div class="search-option">
                                        <div class="search-field"><span class="web"><span>Task</span><span> </span></span><span>Type</span>
                                        </div>
                                        <div class="button-bar"><a class="third selected">All</a><a class="third">Tasks with Location</a><a class="third">Online Tasks</a>
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
                                        <div class="search-field"><span class="web"><span>Base</span><span> </span></span><span>Location</span>
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
                            <!---task-search-->
                            <div class="loaderific-not-loading"></div>
                            <div class="list vertical-scroll" style="position:relative;top:0;width:363px;height:35.6em;">
                                <div class="group">
                                    <div class="list-splitter">There are {{$count}} new task available</div>
                                    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @foreach($cases as $case)
                                    <a href="{{url('mycase')}}/{{$case->slug}}">
                                        <div class="list-item browse-cases" id="{{$case->id}}" data-slug="{{$case->slug}}">
                                            <div class="task-list-item">
                                                <div class="loaderific-not-loading"></div>
                                                <div class="image-icon">
                                                    @if(!empty($case->user->profile_image))
                                                    <img  class="profile_pic" style="width:15px" src="{{url('public/profile_images')}}/{{$case->user->profile_image}}">
                                                    @else
                                                    <img  class="profile_pic" style="width:15px" src="{{url('assets/userpanel/images/image-icon.png')}}">
                                                    @endif
                                                </div>
                                                <div class="payment">
                                                    <div class="task-price">
                                                        <div class="currency-symbol">$</div>
                                                        <div class="price">{{$case->estimate_budget}}</div>
                                                    </div>
                                                </div>
                                                @if($case->status=='unverify')
                                                <div class="task-state open">
                                                    <div class="text">Pending</div>
                                                </div>
                                                @endif
                                                @if($case->status=='open')
                                                <div class="task-state open">
                                                    <div class="text">Open</div>
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
                                                    <div class="task-title" >{{$case->title}}</div>
                                                    <div class="location">
                                                        <span class="at-icon-map-marker"> </span>
                                                        <span class="user_status user_{{$case->user->id}}" >{{$case->place_of_incident}}</span>
                                                    </div>
                                                    <div class="single-task">
                                                        <div>
                                                            <div class="comment-count"></div>
                                                            <div class="bid-count">{{ count($case->bids) }} offer</div>
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
          } */
    </script>
    <script async defer   src="https://maps.googleapis.com/maps/api/js?v=3.25&key=AIzaSyBirRJtSjjGeex3B2KaFZEiMLUOe7rfS7E&callback=myMap"></script>
    <script src="{{asset('assets/userpanel/js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('assets/userpanel/js/owl.carousel.js')}}"></script>
    <script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>
    <script src="{{asset('assets/userpanel/js/custom.js')}}"></script>
    @include('includes.review')
    @include('includes.userprofile')
    @include('includes.postjob')
    @include('includes.bid')
    @include('includes.adminverification')
    @include('includes.msgnotification') 
    @foreach($bidders as $bidder)
    <div class="modal fade bs-example-modal-{{$bidder->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="z-index:99999">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="review_single">
                    <div class="rew_img">
                        <img src="{{url('public/profile_images')}}/{{$bidder->users->profile_image}}">
                    </div>
                    <div class="rew_per">
                        <a href="{{url('profile')}}/{{$bidder->users->id}}">{{$bidder->users->fname}}  {{$bidder->users->lname}}  </a>
                    </div>
                    <div class="rew_per">
                        {{$bidder->offer_price}} 
                    </div>
                    <div class="rew_per">
                        {{$bidder-> description}} 
                    </div>
                    <div class="rew_rating">
                        <p class="star">
                            <span><i class="fa fa-star" aria-hidden="true"></i></span>
                            <span><i class="fa fa-star" aria-hidden="true"></i></span>
                            <span><i class="fa fa-star" aria-hidden="true"></i></span>
                            <span><i class="fa fa-star-half-o"
                                aria-hidden="true"></i></span>
                        </p>
                        <p>85% Completion Rate</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</body>
</html>


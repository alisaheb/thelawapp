@include('includes.head')

<link href="{{asset('assets/userpanel/css/radio-button.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/userpanel/css/popup-layout.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/userpanel/css/modal-popup.css')}}" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<link href="{{asset('assets/userpanel/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/userpanel/css/owl.theme.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<link href="{{asset('assets/userpanel/css/custom.css')}}" rel="stylesheet">

</head>

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
                        <div id="general-ajax-load" class="msg" style="display:none">
                            <img src="{{asset('assets/userpanel/images/loading.gif')}}"/>
                        </div>
                        <!---code for right section-->
                        @if($flag==false)
                            <div class="task-right single-project-right" id="msg-default">
                                <h4 style="padding-left:15px; text-align:center;"> Unread Messages</h4>
                                <ul class="newmessages"></ul>
                            </div>
                        @else

                            <div class="task-right single-project-right" id="mymessage">

                                <div id="outer-div" class="outerdiv">
                                    <div class="single-project-outer">

                                        <div class="single-project-inner single-project-offers task-activity case-messages_{{$sendto}}_{{Auth::user()->id}}">
                                            @foreach($messages as $message)
                                                @if(Auth::user()->id==$message->message_by)
                                                    <div class="outer-new">

                                                <span class="new-comment">
                                                                    <h3> {{$message->messageby->fname}} {{$message->messageby->lname}}
                                                                        &nbsp;&nbsp;{{$message->created_at->diffForHumans()}}</h3>
                                                                    
                                                                                 <p>  {{$message->messages}}  </p>
                                                 </span>

                                                        @if(empty($message->messageby->profile_image))
                                                            <div class="comment-pic">
                                                                <img src="{{url('assets/userpanel/images/user-icon.png')}}">
                                                            </div>
                                                        @else
                                                            <div class="comment-pic">
                                                                <img src="{{url('assets/profile_images')}}/{{$message->messageby->profile_image}}">
                                                            </div>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="inner-new">
                                                        @if(empty($message->messageby->profile_image))
                                                            <div class="comment-pic">
                                                                <img src="{{url('assets/userpanel/images/user-icon.png')}}">
                                                            </div>
                                                        @else
                                                            <div class="comment-pic">
                                                                <img src="{{url('assets/profile_images')}}/{{$message->messageby->profile_image}}">
                                                            </div>
                                                        @endif

                                                        <span class="new-comment other_comment">
                                                        <h3>{{$message->messageby->fname}} {{$message->messageby->lname}}
                                                            &nbsp;&nbsp; {{$message->created_at->diffForHumans()}}</h3>
                                                        
                                                        <p>{{$message->messages}}</p>
                                                </span>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div><!--single-project-inner review section-->


                                        <div class="single-project-inner task-activity">

                                            <span class="list_comments"></span>

                                            <div class="attach-file-section comment-sec">

                                                <div class="attach-file-icon comment-pic">
                                                    <img src="{{url('public/profile_images')}}/{{Auth::user()->profile_image}}">
                                                </div>

                                                <div class="attach-file-right">

                                                    <input type="hidden" value="{{$sendto}}" id="messageto">
                                                    <input type="hidden"
                                                           value="{{Auth::user()->fname}} {{Auth::user()->lname}}"
                                                           id="user_name">
                                                    <input type="hidden" value="{{Auth::user()->id}}" id="messageby">
                                                    <input type="hidden"
                                                           value="{{url('assets/profile_images')}}/{{Auth::user()->profile_image}}"
                                                           id="image_name">
                                                    <textarea name="message" id="message"
                                                              placeholder="Ask a question about this task"></textarea>


                            <span class="attch-files-buttons">
                                        <!--	<button class="attach-file-button">Attach File</button> -->
                                                <button class="attach-file-send-button message-submit">Send</button>
                            </span>

                                                </div><!--attach-file-right-->
                                            </div>

                                        </div><!--single-project-inner-->

                                    </div><!--single-project-outer-->

                                </div><!--outer div-->

                            </div><!--task-right-->
                            @endif

                                    <!--end of code-->

                            <div class="task-list single-project-left" style="">
                                <div class="task-search" style="height:25px;">
                                    <div class="tasks-menu">
                                        <div class="button-mode" id="show-map-button">
                                            <div class="at-icon-map-marker"></div><span>Map</span> 
                                        </div>
                                        <div class="button-mode">
                                            <div class="at-icon-search"></div><span>Search</span>
                                        </div>
                                        <div class="button-mode " id="show-settings-button">
                                            <div class="at-icon-cog"></div><span>Settings</span>
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
                                            <div class="button-bar"><a class="half selected">All</a><a
                                                        class="half">Open</a>
                                            </div>
                                        </div>

                                        <div class="search-option">
                                            <div class="search-field"><span class="web"><span>Task</span><span> </span></span><span>Type</span>
                                            </div>
                                            <div class="button-bar"><a class="third selected">All</a><a class="third">Tasks
                                                    with Location</a><a class="third">Online Tasks</a>
                                            </div>
                                        </div>

                                        <div class="hr margin-10-0"></div>
                                        <div class="search-buttons">
                                            <button id="update-button" class="button-cta button-med">Update</button>
                                            <button class="button-min button-med">Reset</button>
                                        </div>
                                    </div>
                                </div><!---task-search-->


                                <div class="loaderific-not-loading"></div>

                                <!--contactlist-->
                                @include('includes.contactlist')
                                        <!--contactlist-->


                            </div><!---single-project-left-->
                    </div><!--right left-->

                    <div class="new_1">

                    </div>
                </div>
            </div>
            <div id="static-page-content"></div>
        </div><!---page-and-screen-content-->
    </div>
</div>
@include('includes.footer')
<script src="{{asset('assets/userpanel/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/owl.carousel.js')}}"></script>
<script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>
<script src="{{asset('assets/userpanel/js/posttask.js')}}"></script>
<script src="{{asset('assets/userpanel/js/custom.js')}}"></script>

@include('includes.msgnotification')

@include('includes.review')
@include('includes.userprofile')
@include('includes.postjob')
@include('includes.adminverification')

</body>
</html>

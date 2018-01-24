<!DOCTYPE html>
<html>
@include('includes.head')

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

<style>
    .profile_pic {
        border-radius: 50px;
        width: 195px
    }

    .recent-acivity.acivity-notifications, .notofications.acivity-notifications {
        max-height: 400px;
        overflow-y: scroll;
    }

    .account-header {
        padding: 20px;
    }


</style>

</head>
<body>
<div id="fb-root"></div>


<div id="app-container" class="inner-common-page">
    <div id="lawyer-app" class="skills-page">
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
                                 src="{{asset('public/profile_images')}}/{{Auth::user()->profile_image}}">
                        @else
                            <img src="{{asset('public/userpanel/images/image-icon.png')}}">
                        @endif
                        <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                    </div>
                    @include('includes.dashboardlinks')
                </div>
                <div class="right-side">
                    <h3 class="inner-page-headings">Notifications</h3>

                    <div class="account-header">
                        <div class="account-inner">
                            <p>Keep up to date with your tasks</p>

                            <div class="notifications">
                                <div class="list vertical-scroll">
                                    @foreach($notifications as $key => $value)
                                        <div class="group">
                                            <div class="list-splitter">{{ $key }}</div>
                                            @foreach($value as $notif)

                                                @if($notif['type_of_notification'] == 'comment')
                                                    <li class="activity-feed-item">
                                                        <div class="text">
                         <span class="user-name-holder"><a class="user-name" href="">
                                 <img src="">
                                 Fariq R.</a></span> commented on <a class="task-title"
                                                                     href="/tasks/regrouting-3008062/">Regrouting</a>
                                                            that you are following
                                                        </div>
                                                        <div class="time super-small">
                                                            <time itemprop="" datetime="3 weeks ago">3 weeks ago</time>
                                                        </div>
                                                    </li>

                                                @elseif( $notif['type_of_notification'] == 'task' )
                                                    <li class="activity-feed-item">
                                                        <div class="text">
                            <span class="user-name-holder"><a class="user-name"
                                                              href="{{url('profile')}}/{{$notif->userby['id']}}">
                                    <img src="{{url('public/profile_images')}}/{{ $notif->userby['profile_image'] }}"
                                         width="18px" hieght="18px">
                                    {{ $notif->userby['fname'] }} {{ $notif->userby['lname'] }}
                                </a></span> {{ $notif['title'] }} <a class="task-title"
                                                                     href="http://dev.thelawapp.com.au/public/cases/{{ $notif->task['slug'] }}">{{ $notif->task['title'] }}</a>

                                                            <div class="time super-small">
                                                                <time itemprop=""
                                                                      datetime="1 month ago">{{ $notif->created_at->diffForHumans() }}</time>
                                                            </div>
                                                    </li>

                                                @elseif( $notif['type_of_notification'] == 'bid' )
                                                    <li class="activity-feed-item">
                                                        <div class="text">
                             <span class="user-name-holder"><a class="user-name" href="">
                                     <img src="{{url('public/profile_images')}}/{{ $notif->userby['profile_image'] }}"
                                          width="18px" hieght="18px">
                                     {{ $notif->userby['fname'] }} {{ $notif->userby['lname'] }}
                                 </a></span> {{ $notif['title'] }} <a class="task-title"
                                                                      href="http://dev.thelawapp.com.au/public/cases/{{ $notif->task['slug'] }}">{{ $notif->task['title'] }}</a>
                                                        </div>
                                                        <div class="time super-small">
                                                            <time itemprop=""
                                                                  datetime="1 month ago">{{ $notif->created_at->diffForHumans() }}</time>
                                                        </div>
                                                    </li>
                                                @endif

                                            @endforeach
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div id="static-page-content"></div>
</div>
</div>
</div>
<script src="{{asset('public/userpanel/js/custom.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
{!! Html::script('assets/userpanel/js/bootstrap.min.js') !!}
{!! Html::script('assets/userpanel/js/popup-modal.js') !!}
{!! Html::script('assets/userpanel/js/custom.js') !!}
{!! Html::script('assets/userpanel/js/message.js') !!}
{!! Html::script('assets/userpanel/js/posttask.js')!!}

@include('includes.postjob')
@include('includes.footer')
@include('includes.login')
</body>
</html>
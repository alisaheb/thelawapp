@include('includes.head')
</head>


<body>
<div id="fb-root"></div>


<div id="app-container" class="inner-common-page password-page">
    <div id="lawyer-app" class="">
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
                            <div class="profile-image-icon">
                                <img class="profile_pic" style="width:195px"
                                     src="{{asset('public/profile_images')}}/{{Auth::user()->profile_image}}"></div>
                        @else
                            <img src="{{asset('assets/userpanel/images/image-icon.png')}}">
                        @endif
                        <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                    </div>
                    @include('includes.dashboardlinks')
                </div>


                <form action="{{url('resetpassword')}}" id="" method="post">

                    {{csrf_field()}}
                    <div class="right-side">
                        <h3 class="inner-page-headings">Password</h3>
                        @if(Session::has('oldpassword'))
                            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('oldpassword') }}</p>
                        @endif
                        <div class="page-form">
                            <ul>
                                <li>
                                    <p>Current Password</p>
                                    <input type="text" name="oldpwd">
                                </li>
                                <li>
                                    <p>New Password</p>
                                    <input type="text" name="newpwd">
                                </li>
                                <li>
                                    <p>Repeat Password</p>
                                    <input type="text" name="newpwd">
                                </li>
                                <li class="button-section">
                                    <button type="submit">Update Password</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div id="static-page-content"></div>
</div>
</div>
</div>

@include('includes.footer')

<script src="{{asset('userpanel/js/popup-modal.js')}}"></script>
<script src="{{asset('userpanel/js/custom.js')}}"></script>
<script src="{{asset('userpanel/js/posttask.js')}}"></script>
{!! Html::script('assets/userpanel/js/bootstrap.min.js') !!}
{!! Html::script('assets/userpanel/js/popup-modal.js') !!}
{!! Html::script('assets/userpanel/js/custom.js') !!}
{!! Html::script('assets/userpanel/js/message.js') !!}
{!! Html::script('assets/userpanel/js/posttask.js')!!}
    @include('includes.postjob')

</body>
</html>
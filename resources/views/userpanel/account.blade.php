@include('includes.head')
<link href="{{asset('assets/userpanel/css/radio-button.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/userpanel/css/popup-layout.css')}}" rel="stylesheet">
<link href="{{asset('assets/userpanel/css/modal-popup.css')}}" rel="stylesheet"/>


<link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"
      rel="stylesheet" type="text/css"/>
</head>

<body>
<style>
    .profile_pic_upload {
        border-radius: 5px;
        width: 50px;
        height: 50px;
    }

    .profile_pic {
        border-radius: 50px;
        width: 195px
    }

    .upload-photo .picw {
        height: 30px;
        z-index: 2;
        opacity: 0;
        position: absolute;
        left: 23px;
        top: 0px;

    }

    .upload-photo {
        position: relative;

    }

    button.button-cta {
        box-sizing: border-box;
        cursor: pointer;
        display: inline-block;
        letter-spacing: .1em;
        -webkit-transition: background .5s linear, color .5s linear, box-shadow .5s linear;
        transition: background .5s linear, color .5s linear, box-shadow .5s linear;
        margin-right: 4px;
        text-align: center;
        white-space: nowrap;
        padding: 9px 12px;
        color: #fff;
        text-shadow: 0 1px 1px #5f7900;
        line-height: 1.4;
        position: absolute;
        left: 90px;
        top: 30px;
    }

    /*.button-med {
        border-radius: 50px;
        font-size: 12px;
        letter-spacing: .4px;
        line-height: 1.4;
        padding: 9px 18px;
        margin-bottom: 4px;
    }*/
    .header-upload {
        background: url({{url('../header_images/')}}/{{$user->header_image}});
        background-position: 50% 50%;
        background-size: cover;
        border-radius: 3px;
        cursor: pointer;
        font-size: 13px;
        height: 70px;
        margin-top: 20px;
        text-align: center;

    }

    .header-upload .header_text {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        color: #fff;
        display: inline-block;
        line-height: 20px;
        -webkit-transition: background .2s ease-in-out;
        transition: background .2s ease-in-out;
        margin-top: 25px;
        padding: 0 10px;
    }

    .account-page .right-side .page-form ul li.Head {
        width: 100%;
    }

</style>

<div id="fb-root"></div>


<div id="app-container" class="inner-common-page">
    <div id="lawyer-app" class="account-page">
        <div id="app-header">
            <!-- <div id="header-block" style="height:94px;"></div> -->
            @include('includes.header')
            <div id="page-and-screen-content">
                <div class="content">
                    <div class="inner-page">
                        <div class="left-sidebar-account">
                            <div class="images-icon">
                                @if(!empty(Auth::user()->profile_image))
                                    <img class="profile_pic" style="width:195px"
                                         src="{{url('public/profile_images')}}/{{Auth::user()->profile_image}}">
                                @else
                                    <img src="{{asset('assets/userpanel/images/image-icon.png')}}">
                                @endif
                                <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                            </div>
                            @include('includes.dashboardlinks')
                        </div>
                        <div class="right-side">
                            <h3 class="inner-page-headings">Account</h3>

                            <form action="{{url('saveprofile')}}" method="post">
                                <div id="progressbar"></div>
                                <div class="page-form">
                                    <ul>
                                        <li class="upload-photo">
                                            <p>Upload Photo</p>
                                            @if(!empty(Auth::user()->profile_image))
                                                <div class="images-upload">
                                                    <img id="imagePreview_one" class=" profile_pic_upload"
                                                         src="{{url('public/profile_images')}}/{{Auth::user()->profile_image}}">
                                                </div>
                                            @else
                                                <img src="{{asset('assets/userpanel/images/small-image-icon.png')}}">
                                            @endif

                                            <label for="picp" class="button_portfolio">Select Profile image</label>
                                            <input type='file' id="picp" name="pofile_pic" accept="image/*"
                                                   style="display:none"/>
                                                                                    
             <span>
                                    <span style="display:none" id="profile-image-upload"
                                          class="button-cta button-lrg center ">Upload Profile</span>
            </span>
                                            <!-- <input type="submit"> -->
                                        </li>

                                        <li class="Head">
                                            <p>Profile Header Image</p>

                                            <a href="{{url('profile')}}/{{Auth::user()->id}}">
                                                <div class="header-upload">
                                                    <div class="header_text">Jazz up your public profile with a custom
                                                        header image
                                                    </div>
                                                </div>
                                            </a>

                                        </li>

                                        <li>
                                            <p>First name</p>
                                            <input type="text" id="afname" name="firstname" value="{{$user->fname}}">
                                            {{csrf_field()}}

                                        </li>
                                        <li>
                                            <p>Last name</p>
                                            <input type="text" id="bfname" name="lastname" value="{{$user->lname}}">
                                        </li>
                                        <!--		<li>
                                                    <p>Tagline</p>
                                                    <input type="text" id="tagline" name="tagline" value="" >
                                                </li>-->
                                        <li>
                                            <p>Location</p>
                                            <input type="text" id="address" name="address" value="{{$user->address}}">
                                        </li>
                                        <li>
                                            <p>Email</p>
                                            <input type="text" id="aemail" name="email" value="{{$user->email}}">
                                        </li>
                                        <li>
                                            <p>Birthday</p>
                                            <input id="datepic" class=" input-medium date-picker" size="16" type="text"
                                                   name="dob" value="{{$user->dob}}"/>

                                        </li>
                                        <li class="abn">
                                            <p>Australian Business Number</p>
                                            <input type="number" name="abn" id="abn" value="{{$user->abn}}">
                                        </li>
                                        <li>
                                            <p>Description</p>
                                            <textarea name="description">{{$user->description}}</textarea>
                                        </li>

                                        <li>
                                            <!--	<button>Become an Lawyer PRO</button> -->
                                            <button type="submit">Save Profile</button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="static-page-content"></div>
        </div>
    </div>
</div>
@include('includes.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>

<script src="{{asset('assets/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/userpanel/js/custom.js')}}"></script>
<script src="{{asset('assets/userpanel/js/posttask.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#datepic').datepicker({
            format: 'M-dd-yyyy'
        });
    });
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#progressbar").progressbar({
            value: 37
        });
    });
</script>

@include('userpanel.postjob')
@include('includes.msgnotification')
</body>
</html>
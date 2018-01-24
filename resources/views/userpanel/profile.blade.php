@include('includes.head')

<style>
    .profile_pic {
        border-radius: 50px;
        width: 195px
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
                                 src="{{url('assets/profile_images')}}/{{Auth::user()->profile_image}}">
                        @else
                            <img src="{{asset('assets/userpanel/images/image-icon.png')}}">
                        @endif
                        <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                    </div>
                    @include('includes.dashboardlinks')
                </div>
                <div class="right-side upload-resume">
                    <h3 class="inner-page-headings">Potrfolio</h3>

                    <div class="page-form">
                        <ul>
                            <li>
                                <h4>Upload your resume</h4>

                                <p>After you upload your resume, we'll also share your resume with our partners at
                                    CareerOne who may contact you if a job suits your skills.</p>

                                <p>Accepted file formats include PDF/DOC/TXT/RTF and must be no larger than 5MB.</p>
                            </li>
                            <li class="button-section">
                                <button>Select resume</button>
                            </li>
                            <li>
                                <h4>Upload portfolio items</h4>

                                <p>Upload your portfolio directly to your Law app profile to showcase your talents! It's
                                    the perfect tool for photographers, designers and illustrators or you could also
                                    create a gallery of yourself completing tasks.</p>

                                <p>You may upload a maximum of 30 items. File formats accepted include JPG/PNG/PDF/TXT
                                    and must be no larger than 5MB.</p>
                            </li>
                            <li class="button-section">
                                <label for="portfolio-items">Select file(s)</label>
                                <input type='file' id="portfolio-items" style="display:none"/>
                            </li>


                        </ul>
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
<script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>
<script src="{{asset('assets/userpanel/js/custom.js')}}"></script>
<script src="{{asset('assets/userpanel/js/posttask.js')}}"></script>

@include('includes.userprofile')
@include('includes.postjob')
@include('includes.firstvisitpage')
@include('includes.adminverification')

</body>
</html>
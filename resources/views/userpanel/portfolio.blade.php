@include('includes.head')
<link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<style>
    .profile_pic {
        border-radius: 50px;
        width: 195px
    }

    .button_portfolio {
        box-sizing: border-box;
        cursor: pointer;
        display: inline-block;
        letter-spacing: .1em;
        -webkit-transition: background .5s linear, color .5s linear, box-shadow .5s linear;
        transition: background .5s linear, color .5s linear, box-shadow .5s linear;
        margin-right: 4px;
        text-align: center;
        white-space: nowrap;
        background-color: #fff;
        border: 1px solid #cad7dc;
        color: #008fb4;
        box-shadow: none;
        border-radius: 50px;
        padding: 5px 10px;
    }

    .upload-item-sec {
        border: 1px solid #cad7dc;
        border-radius: 4px;
        margin: 20px 0;
        padding: 20px;
    }

    .image-div {
        width: 170px;
        height: 170px;
        display: inline-block;
        margin-right: 15px;
        margin-bottom: 15px;
        cursor: pointer;
        padding: 5px;
        background-size: cover;
        overflow: hidden;
        border-radius: 4px;
        position: relative;
    }

    .image-div img {
        width: 100% !important;
        height: auto !important;
        min-height: 170px;
        background-size: cover;
        background-position: center center;
    }

    .button-section {
        display: inline-block;
    }

    .but_upl {
        padding: 8px 12px;
    }

    .cut {

        color: #cad7dc;
        position: absolute;
        right: 0px;
        top: -1px;
        font-size: 18px;
        border-radius: 50%;
        background: #fff;
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
                                 src="{{url('public/profile_images')}}/{{Auth::user()->profile_image}}">
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

                        <div class="resume-section">
                            <h4>Upload your resume</h4>

                            <p>After you upload your resume, we'll also share your resume with our partners at CareerOne
                                who may contact you if a job suits your skills.</p>

                            <p>Accepted file formats include PDF/DOC/TXT/RTF and must be no larger than 5MB.</p>
                        </div>
                        <div class="upload-resume-sec">
                            @if(Auth::user()->resume)
                                <img style='width:210px; height:auto' src="{{asset('public/images/attache.png') }}"/>
                                <div class="ext">{{$ext}}</div>
                                <div class="resume-name">{{Auth::user()->resume}}</div>
                            @endif
                        </div>

                        <form id="resume-forms">
                            <div class="button-section">
                                <label for="portfolio-resume" class="button_portfolio">Select Resume</label>
                                <input type='file' id="portfolio-resume" name="resume" style="display:none"/>

                            </div>
                                <span>
                                    <button style="display:none" id="resume-upload"
                                            class="button-cta but_upl button-lrg center ">Upload Files
                                    </button>
                                </span>
                        </form>


                        <div>
                            <h4>Upload portfolio items</h4>

                            <p>Upload your portfolio directly to your Airtasker profile to showcase your talents! It's
                                the perfect tool for photographers, designers and illustrators or you could also create
                                a gallery of yourself completing tasks.</p>

                            <p>You may upload a maximum of 30 items. File formats accepted include JPG/PNG/PDF/TXT and
                                must be no larger than 5MB.</p>
                        </div>

                        <div class="upload-item-sec">
                            @foreach($portfolio as $pf)
                                <div class='image-div'><img style='width:210px; height:auto'
                                                            src="{{ asset('public/portfolio_docs/'.$pf->items) }}"><i
                                            class='fa cut fa-times-circle delete-pf' aria-hidden='true'
                                            data-id="{{$pf->id}}"></i></div>

                            @endforeach
                        </div>

                        <form id="item-forms">
                            <div class="button-section">
                                <label for="portfolio-items" class="button_portfolio">Select file(s)</label>
                                <input type='file' id="portfolio-items" name="portimage[]" multiple
                                       style="display:none"/>
                                <input type="hidden" id="authid" value="{{Auth::user()->id}}"/>
                            </div>
                        <span>
                            <button style="display:none" id="item-upload" class="button-cta but_upl button-lrg center ">
                                Upload Files
                            </button>
                        </span>
                        </form>
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
<script src="{{asset('assets/userpanel/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/owl.carousel.js')}}"></script>
<script src="{{asset('assets/userpanel/js/dashboard.js')}}"></script>
<script src="{{asset('assets/userpanel/js/posttask.js')}}"></script>

@include('includes.invalidfile')
@include('includes.postjob')
@include('includes.bid')
</body>
</html>
@include('includes.head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<style>
    .profile_pic {
        border-radius: 50px;
        width: 195px
    }

    .user-profile-screen {
        position: relative;
        padding: 47px 0 20px;

    }

    .user-profile-screen .user-profile {
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.3);
    }

    .personal-header {
        position: relative;
    }

    .header-image {
        height: 200px;
        background-size: cover;
        background-color: #cad7dc;
        position: relative;
        width: auto;
        left:;
        margin: 0px;
        border-radius: 5px 5px 0 0;
    }

    /*.avatar-img {
        width: 128px;
        height: 128px;
        position: absolute;
        top: 90px;
        border: 4px solid #fff;    border-radius: 50%;
        cursor: default;
        display: inline-block;background-size: contain;
    }*/
    .user-profile-screen .user-profile .personals-section .personals-holder .more-options {
        text-align: right;

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
                <div class="user-profile-screen">
                    <div class="user-profile">
                        <div class="splitter-section personals-section">
                            <div class="splitter-section-content">
                                <div class="splitter-section-content-inner">
                                    <div class="personals-holder">
                                        <div class="loaderific-not-loading"></div>
                                        <div class="personal-wrapper">
                                            <div class="user-profile-header">
                                                <div class="loaderific-not-loading"></div>
                                                <div class="personal-header">
                                                    @if(Auth::user()->id==$userprofile->id)
                                                        <label for="upload-header-image" style="cursor:pointer">Upload
                                                            Image </label>
                                                    @endif

                                                    @if(!empty($userprofile->header_image))
                                                        <div class="header-image"
                                                             style="background-image:url({{url('public/header_images')}}/{{$userprofile->header_image}});background-position:50% 50%;">
                                                        </div>
                                                    @else
                                                        <div class="header-image"
                                                             style="background-image:url({{url('assets/userpanel/images/header-5.png')}});background-position:50% 50%;">
                                                        </div>
                                                    @endif

                                                    <input type="file" id="upload-header-image" name="header-image"
                                                           accept="image/*" style="display:none">

                                                    <div class="avatar-uploader">
                                                        <div class="loaderific-not-loading"></div>

                                                        @if(empty($userprofile->profile_image))
                                                            <a class="avatar-img large"
                                                               style="background-image:url({{url('assets/userpanel/images/image-icon.png')}});"
                                                               href=""></a>
                                                        @else
                                                            <a class="avatar-img large"
                                                               style="background-image:url({{url('public/profile_images')}}/{{$userprofile->profile_image}}); background-repeat: no-repeat;"
                                                               href=""></a>
                                                        @endif

                                                        <div class="clear" data-reactid="50"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="name-tagline" data-reactid="51">
                                                <div class="name" itemprop="name"
                                                     data-reactid="52">{{$userprofile->fname}} {{$userprofile->lname}}</div>
                                                <div class="summary" data-reactid="53">
                                                    <div class="last-online" data-reactid="54">
                                                        <div class="last-on" data-reactid="55">
                                                            Last online
                                                            <time>3 mins ago</time>
                                                        </div>
                                                        <div class="location">
                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                            <span itemprop="addressLocality">{{$userprofile->address}}</span>
                                                        </div>
                                                        <div class="member-since"
                                                             data-reactid="61">{{$userprofile->created_at}}</div>
                                                        <div class="report-container" data-reactid="62">

                                                            <i class=" fa fa-flag-o" aria-hidden="true"></i>
                                                            <span class="report"
                                                                  data-reactid="64">Report this member</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="stats">
                                                    <div class="tabs"><span
                                                                class="tab worker active small">{{Auth::user()->type}}</span>
                                                    </div>
                                                    <div class="clearFix" data-reactid="71"></div>
                                                    <div class="stats-runner true breakdown" data-reactid="72">
                                                        <div class="rating-summary-holder" data-reactid="73">

                                                            <div class="rew_rating" data-reactid="74">
                                                                <p class="star">
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                </p>
                                                            </div>

                                                        </div>
                                                        <span class="average-reviews margin-0" data-reactid="76">4.9 stars - </span><span
                                                                class="average-reviews margin-0" data-reactid="77">8 reviews</span>

                                                        <div class="completion-rate" data-reactid="78">
                                                            <!--      <span data-reactid="79">75% Completion Rate</span> -->
                                                            <div class="anchovy-question" data-reactid="80">
                                                                <div class="rating">
                                                                    <p><span><i class="fa fa-star"
                                                                                aria-hidden="true"></i></span></p>
                                                                </div>
                                                                <span data-reactid="82"></span>

                                                                <div class="answer" data-reactid="83">
                                                                    <p data-reactid="84">The percentage of accepted
                                                                        tasks this Worker has completed.</p>

                                                                    <div class="clear"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="super-small margin-0" data-reactid="85">9 completed
                                                            tasks</p>
                                                    </div>
                                                    <div class="stats-sender false breakdown" data-reactid="86">
                                                        <div class="reviews-container" data-reactid="87">
                                                            <p class="no-reviews" data-reactid="88">Brett A. hasn�t
                                                                received any reviews just yet.</p>

                                                            <p class="no-reviews" data-reactid="89">Watch this
                                                                space!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear" data-reactid="90"></div>
                                </div>
                            </div>
                        </div>


                        <div class="splitter-section about-section">
                            <div class="splitter-section-name">About</div>
                            <div class="splitter-section-content">
                                <div class="splitter-section-content-inner">
                                    <div class="about preview">
                                        <div class="description">
                                            <p> {{$userprofile->description}} </p>
                                        </div>
                                        <div class="tagline">
                                            <p data-reactid="99"></p>
                                        </div>
                                    </div>
                                    <div class="clear" data-reactid="100"></div>
                                </div>
                            </div>
                        </div>


                        <div class="splitter-section verifications-section" data-reactid="101">
                            <div class="splitter-section-name" data-reactid="102">Verifications</div>
                            <div class="splitter-section-content" data-reactid="103">
                                <div class="splitter-section-content-inner" data-reactid="104">
                                    <div class="verifications row" data-reactid="105"
                                         style="margin-left:0px; margin-right:0px;">
                                        <div class="badges" data-reactid="106">
                                            <div class="verification" data-reactid="107">
                                                <div class="badge-container" data-reactid="108"><img class="badge"
                                                                                                     src="https://www.airtasker.com/images/verifications/mobile.png">
                                                </div>
                                                <div class="anchovy-question" data-reactid="110">
                                                    <span data-reactid="111"></span>

                                                    <div class="answer" data-reactid="112">
                                                        <p data-reactid="113">Mobile</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="learn-more button-med button-ghost right" data-reactid="114">Learn
                                        more</a>

                                    <div class="clear" data-reactid="115"></div>
                                </div>
                            </div>
                        </div>


                        <div class="splitter-section skills-section" data-reactid="117">
                            <div class="splitter-section-name" data-reactid="118">Skills</div>
                            <div class="splitter-section-content" data-reactid="119">
                                <div class="splitter-section-content-inner" data-reactid="120">
                                    <div id="user-skills" data-reactid="121">
                                        <div class="skills" data-reactid="122">
                                            <div class="skill-category specialities static" data-reactid="123">

                                                <div class="skill-title" data-reactid="124">Specialities</div>

                                                <div class="tag-selector static" data-reactid="125">
                                                    <div class="tag-item" data-reactid="126"><span class="text"
                                                                                                   data-reactid="127">Garden Maintenance</span>
                                                    </div>
                                                    <div class="tag-item" data-reactid="128"><span class="text"
                                                                                                   data-reactid="129">Car Detailing</span>
                                                    </div>
                                                    <div class="tag-item" data-reactid="130"><span class="text"
                                                                                                   data-reactid="131">Domestic and industrial cleaning</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="clearfix" data-reactid="132"></div>
                                            <div class="skill-category transportation static" data-reactid="133">

                                                <!--              <div class="skill-title" data-reactid="134">Transportation</div>
                                                              <div class="tag-selector static" data-reactid="135">
                                                                 <div class="tag-item" data-reactid="136"><span class="text" data-reactid="137">Online</span></div>
                                                                 <div class="tag-item" data-reactid="138"><span class="text" data-reactid="139">Walk</span></div>
                                                                 <div class="tag-item" data-reactid="140"><span class="text" data-reactid="141">Car</span></div>
                                                                 <div class="tag-item" data-reactid="142"><span class="text" data-reactid="143">Truck</span></div>
                                                              </div>  -->

                                            </div>

                                        </div>
                                    </div>
                                    <div class="clear" data-reactid="144"></div>
                                </div>
                            </div>
                        </div>


                        <div class="splitter-section reviews-section" data-reactid="145">
                            <div class="splitter-section-name" data-reactid="146">Reviews</div>
                            <div class="splitter-section-content" data-reactid="147">
                                <div class="splitter-section-content-inner" data-reactid="148">
                                    <div class="reviews-container" data-reactid="149">
                                        <div class="reviews-list" data-reactid="150">
                                            <div class="row" data-reactid="151"
                                                 style="margin-left:0px ; margin-right:0px;">
                                                <div class="filter-container" data-reactid="152">
                                                    <div class="review-filter-container" data-reactid="153">


                                                        <select selected="" class="reviews-select-type air-select"
                                                                data-reactid="161">
                                                            <option value="recent" data-reactid="162">Most Recent
                                                            </option>
                                                            <option value="positive" data-reactid="163">Most
                                                                Favourable
                                                            </option>
                                                            <option value="negative" data-reactid="164">Most Critical
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="stats">
                                                    <div class="stats-runner undefined breakdown" data-reactid="166">
                                                        <div class="rating-summary-holder">

                                                            <div class="rew_rating">
                                                                <p class="star"><span><i class="fa fa-star"
                                                                                         aria-hidden="true"></i></span>
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                </p>
                                                            </div>

                                                        </div>
                                                        <span class="average-reviews margin-0">4.9 stars - </span><span
                                                                class="average-reviews margin-0">8 reviews</span>

                                                        <div class="completion-rate">
                                                            <span>75% Completion Rate</span>

                                                            <div class="anchovy-question">

                                                                <span></span>

                                                                <div class="answer">
                                                                    <p>The percentage of accepted tasks this Worker has
                                                                        completed.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="super-small margin-0">9 completed tasks</p>
                                                    </div>

                                                </div>
                                                <div class="reviews-wrapper">
                                                    <div class="review-item">
                                                        <div class="review-picture"><a class="avatar-img interactive"
                                                                                       style="background-image:url(https://eu7cmie.cloudimg.io/s/crop/64x64/https://assets-airtasker-com.s3.amazonaws.com/uploads/user/avatar/755815/14046028_10154597130640832_6202239066946383261_n-f05541db8fb1704ec99e43e298ec8625.jpg);"
                                                                                       href=""></a></div>
                                                        <div class="title-body-date">
                                                            <div class="rew_rating">
                                                                <p class="star"><span><i class="fa fa-star"
                                                                                         aria-hidden="true"></i></span>
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                    <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                </p>
                                                            </div>
                                                            <div class="date">6 days ago</div>
                                                            <a class="task-title" href="">BIG WEEDING JOB</a>

                                                            <div>
                                                                <span class="user-name-holder"><a class="user-name"
                                                                                                  href="">Jazz
                                                                        G.</a></span> said <span class="body">"Brett and his co-worker did a fantastic job. They were prompt, prepared and very thorough with our big weeding job. They were both friendly and helpful. Exceeded our expectations! Thanks fellas!"</span>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>

                                                </div><!--reviews-wrapper-->


                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
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
<script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>
<script src="{{asset('assets/userpanel/js/custom.js')}}"></script>
<script src="{{asset('assets/userpanel/js/message.js')}}"></script>

@include('includes.footer')


@include('includes.postjob')
@include('includes.firstvisitpage')
@include('includes.adminverification')
@include('includes.msgnotification')

</body>
</html>
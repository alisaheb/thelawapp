@include('includes.head')
</head>
<body>
<div id="fb-root"></div>
<div id="app-container">
    <div id="lawyer-app">
        @include('includes.header')
        <div id="page-and-screen-content">
            <div id="static-page-content">
                <div class="home-page">
                    <div class="hero">

                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    {!! Html::image('assets/userpanel/images/banner-image.jpg','First Slide',['class' => 'first-slide'])!!}
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1 class="intro-2">The Law App</h1>
                                            <h4 class="intro-3">JUSTICE IS SERVED</h4>
                                            <button class="post-task button-cta button-huge">Get Started Now</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    {!! Html::image('assets/userpanel/images/banner-image.jpg','First Slide',['class' => 'second-slide'])!!}
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1 class="intro-2">The Law App</h1>
                                            <h4 class="intro-3">JUSTICE IS SERVED</h4>
                                            <button class="post-task button-cta button-huge">Get Started Now</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">

                                    {!! Html::image('assets/userpanel/images/banner-image.jpg','Third Slide',['class' => 'third-slide'])!!}
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1 class="intro-2">The Law App</h1>
                                            <h4 class="intro-3">JUSTICE IS SERVED</h4>
                                            <button class="post-task button-cta button-huge">Get Started Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <!-- <i class="fa fa-chevron-left"></i> -->

                                {!! Html::image('assets/userpanel/images/left-arrow.png','Left Arrow')!!}
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <!-- <i class="fa fa-chevron-right"></i> -->
                                {!! Html::image('assets/userpanel/images/right-arrow.png','Right Arrow')!!}
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>


                    <div class="cta-tiles">
                        <div class="title center">
                            <h2 class="banner-heading">What’s The Matter ?</h2>
                        </div>
                        <div class="content">
                            <div>
                                <div class="row">
                                    <div class="tile three columns">
                                        <div class="img-container">
                                            {!! Html::image('assets/userpanel/images/image1.jpg','Handyman Services',['title' => 'Handyman Services']) !!}
                                        </div>
                                        <div class="tile-overlay"></div>
                                        <div class="details">
                                            <div class="task-name">Divorce Lawyers</div>
                                            <div class="task-placeholder">eg. Help me with complex child and property matter</div>
                                        </div>
                                    </div>
                                    <div class="tile three columns">
                                        <div class="img-container">{!! Html::image('assets/userpanel/images/image2.jpg','House Cleaning',['title' => 'House Cleaning']) !!}
                                        </div>
                                        <div class="tile-overlay"></div>
                                        <div class="details">
                                            <div class="task-name">Murder Cases</div>
                                            <div class="task-placeholder">eg. I think I am in trouble</div>
                                        </div>
                                    </div>
                                    <div class="tile three columns">
                                        <div class="img-container">{!! Html::image('assets/userpanel/images/image3.jpg','Pickup &amp; Delivery',['title' => 'Pickup &amp; Delivery']) !!}
                                        </div>
                                        <div class="tile-overlay"></div>
                                        <div class="details">
                                            <div class="task-name">Mediation Lawyer</div>
                                            <div class="task-placeholder">eg. Help me resolve a family conflict</div>
                                        </div>
                                    </div>
                                    <div class="tile three columns">
                                        <div class="img-container">{!! Html::image('assets/userpanel/images/image4.jpg','Furniture Assembly',['title' => 'Furniture Assembly']) !!}
                                        </div>
                                        <div class="tile-overlay"></div>
                                        <div class="details">
                                            <div class="task-name">Commercial Lawyer</div>
                                            <div class="task-placeholder">eg. Help me with corporate trusts and agreements</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tile three columns">
                                        <div class="img-container">{!! Html::image('assets/userpanel/images/image5.jpg','Computer &amp; IT Support',['title' => 'Computer &amp; IT Support']) !!}
                                        </div>
                                        <div class="tile-overlay"></div>
                                        <div class="details">
                                            <div class="task-name">Defamation Lawyers</div>
                                            <div class="task-placeholder">eg. I need to stop someone spreading lies!!</div>
                                        </div>
                                    </div>
                                    <div class="tile three columns">
                                        <div class="img-container">{!! Html::image('assets/userpanel/images/image6.jpg','Flyer Delivery',['title' => 'Flyer Delivery']) !!}
                                        </div>
                                        <div class="tile-overlay"></div>
                                        <div class="details">
                                            <div class="task-name">Wills & Estate Planning Lawyers</div>
                                            <div class="task-placeholder">eg. I need a last will and testament
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile three columns">
                                        <div class="img-container">{!! Html::image('assets/userpanel/images/image4.jpg','Moving &amp; Removalist',['title' => 'Moving &amp; Removalist']) !!}
                                        </div>
                                        <div class="tile-overlay"></div>
                                        <div class="details">
                                            <div class="task-name">Others</div>
                                            <div class="task-placeholder">eg. Help with Moving my Apartment</div>
                                        </div>
                                    </div>
                                    <div class="tile three columns">
                                        <div class="img-container">{!! Html::image('assets/userpanel/images/rebrand-gardening.jpg','Garden Maintenance',['title' => 'Garden Maintenance']) !!}
                                        </div>
                                        <div class="tile-overlay"></div>
                                        <div class="details">
                                            <div class="task-name">Garden Maintenance</div>
                                            <div class="task-placeholder">eg. General Garden Maintenance</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="center"><a class="button-ghost button-med link sign-up-link" href="#">See more
                                categories</a>
                        </div>
                    </div>

                    <div class="home-body">

                        <div class="lab row">
                            <div class="lab-container">
                                <p class="super">AS SEEN ON TV</p>

                                <h2>UBER LAWYERS UNITED</h2>

                                <p>Earn more. Get more done.</p>
                                <a href="likeaboss/index.html" class="button-ghost button-med">
                                    <div>
                                        <svg width="26" height="26" viewBox="0 0 26 26" version="1.1"
                                             class="play-button">
                                            <use x='0' y='0' width='26' height='26'
                                                 xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#play-button')}}"/>
                                        </svg>
                                        <span>Watch the videos</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="how-lawyer-works bg-grey row">
                            <div class="title center">
                                <h3 class="banner-heading">{{ $setting->title }}</h3>

                                <p>{{ $setting->description }}</p>
                            </div>
                            <div class="content">
                                <div class="four columns center">
                                    <div class="icon-first-step">{!! Html::image('assets/userpanel/images/what-is-lawyer-one.png') !!}
                                    </div>
                                    <div class="clearFix"></div>
                                    <div class="text">Tell us what your legal matter is. It's FREE to post. No obligation.</div>
                                </div>
                                <div class="four columns center">
                                    <div class="icon-second-step">{!! Html::image('assets/userpanel/images/what-is-lawyer-two.png') !!}
                                    </div>
                                    <div class="clearFix"></div>
                                    <div class="text">Receive offers from trusted and accredited lawyers within minutes.</div>
                                </div>
                                <div class="four columns center">
                                    <div class="icon-third-step">{!! Html::image('assets/userpanel/images/what-is-lawyer-three.png') !!}
                                    </div>

                                    <div class="text">Choose the best lawyer for the job.</div>
                                </div>
                            </div>
                        </div>

                        <div class="insurance-banner row">
                            <div class="content"><img class="buoy" {!! Html::image('assets/userpanel/images/ribbon.png') !!}
                          
									<div class="insurance-text">
										<h2>Top Rated Insurance</h2>
										<p class="insurance-info">When you hire on Airtasker, rest assured that service providers on Airtasker are covered by a $20 million insurance policy placed by Lloyd’s approved coverholder Savannah Insurance Agency Pty Ltd.</p>
									</div>
									<div class="insurance-icon-boxes">
										<div class="free icon-row clearfix">{!! Html::image('assets/userpanel/images/free.png') !!}
											<h4>Free to Post</h4>
											<p>It’s completely free to post a task, you’ll start receiving offers from Lawyer. There’s no hidden fees. </p>
										</div>
										<div class="secure icon-row clearfix">{!! Html::image('assets/userpanel/images/payment.png') !!}
											<h4>Secure Payment</h4>
											<p>Lawyer Pay makes it seamless to pay for your task, funds are held securely until you&#x27;re happy the task is complete.</p>
										</div>
										<div class="control icon-row clearfix">{!! Html::image('assets/userpanel/images/control.png') !!}
											<h4>You’re in control</h4>
											<p>Receive multiple offers, and then you decide you’d like to complete your task.</p>
										</div>
										<div class="trusted icon-row clearfix">{!! Html::image('assets/userpanel/images/trust.png') !!}
											<h4>Trusted Workers</h4>
											<p>Read verified reviews to make sure you hire the best person for the job.</p>
										</div>
									</div>
								</div>
							</div>
							
							<div class="recent-task-tiles">
								<h3 class="banner-heading center">Recently completed tasks</h3>
								<div class="content">
									<div>
									<?php $row = 4; ?>
									@foreach ($tasks as $task)
										<?php $profile_pic = $task->user->profile_image; ?>
									    @if($row % 4 == 0)
									    	<div class="row">
									    @endif
											<div class="tile three columns panel">
												<!--div class="pen-container">
													<svg width="15" height="15" viewBox="0 0 15 15" version="1.1" class="pen">
														<use x='0' y='0' width='15' height='15' xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#pen')}}"/>
                                </svg>
                                </div-->
                                <div class="top">
                                    @if($task->user->profile_image != null || $task->user->profile_image != "" )
                                        <img class="avatar small" src='{{ url("../profile_images/$profile_pic")}}'
                                             alt="{{ $task->user->fname }} {{ $task->user->lname }}"/>
                                    @else
                                        <img class="avatar small" src="{{asset('userpanel/images/image-icon.png')}}"
                                             alt="{{ $task->user->fname }} {{ $task->user->lname }}"/>
                                    @endif
                                    <div class="heading"><span class="date">{{$task->date_of_completion}}</span>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div class="details"><span
                                            class="title">{{ str_limit($task->title, $limit = 20, $end = '...') }}</span><span
                                            class="description">{{ str_limit($task->description, $limit = 80, $end = '...') }}</span>
                                </div>
                            </div>
                            @if($row == 7 || $row == 11)
                        </div>
                        @endif
                        <?php $row++ ?>
                        @endforeach

                    </div>
                </div>
                <div class="center"><a class="button-ghost button-med link sign-up-link">Browse more Tasks</a>
                </div>
            </div>


            <div class="bg-grey">
                <div class="statistics row">
                    <div class="statistic">
                        <p>Over</p>

                        <p class="huge">715,000</p>

                        <p class="larger">People using Our website</p>
                    </div>
                    <div class="statistic">
                        <p>Over</p>

                        <p class="huge">$72M</p>

                        <p class="larger">Worth of jobs created</p>
                    </div>
                    <div class="statistic">
                        <p>Over</p>

                        <p class="huge">$6.00M</p>

                        <p class="larger">Jobs available per month</p>
                    </div>
                </div>
            </div>
            <div class="social-proof">
                <div class="content center">
                    {!! Html::image('assets/userpanel/images/forbes.png') !!}
                    {!! Html::image('assets/userpanel/images/smh.png') !!}
                    {!! Html::image('assets/userpanel/images/today.png') !!}
                    {!! Html::image('assets/userpanel/images/the-guardian.png') !!}
                    {!! Html::image('assets/userpanel/images/cnet.png') !!}
                    {!! Html::image('assets/userpanel/images/financial-review.png') !!}
                    {!! Html::image('assets/userpanel/images/tnw.png') !!}
                    {!! Html::image('assets/userpanel/images/bbc.png') !!}
                </div>
            </div>

            <div class="earn-money" id="earn-money">
                <div class="content">
                    <div class="container-inner">
                        <div class="smaller-content">
                            <div class="list column-2 white">
                                <h3>Earn up to $5,000 per month completing tasks</h3>

                                <div class="iconandp">
                                    <svg width="32" height="32" viewBox="0 0 32 32" version="1.1" class="boss icon">
                                        <use x='0' y='0' width='32' height='32'
                                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#tie')}}"/>
                                    </svg>
                                    <div class="desc">
                                        <h5>You&#x27;re the boss</h5>

                                        <p>With over $3.5M of tasks posted every month on Our website there are lots of
                                            opportunities to earn. </p>
                                    </div>
                                </div>
                                <div class="iconandp">
                                    <svg width="32" height="32" viewBox="0 0 32 32" version="1.1" class="icon">
                                        <use x='0' y='0' width='32' height='32'
                                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#thumbs-up')}}"/>
                                    </svg>
                                    <div class="desc">
                                        <h5>Payments</h5>

                                        <p>With the task payment securely held in our Trust Account, you’re able to
                                            </p>
                                    </div>
                                </div>
                                <div class="iconandp">
                                    <svg width="32" height="32" viewBox="0 0 32 32" version="1.1" class="icon">
                                        <use x='0' y='0' width='32' height='32'
                                             xlink:href="{{asset('userpanel/images/icons/icon_definitions.svg#life-saver')}}"/>
                                    </svg>
                                    <div class="desc">
                                        <h5>With top rated insurance</h5>

                                        <p>When you complete tasks on our website, you are covered by a $20 million
                                            insurance policy</p>
                                    </div>
                                </div>
                                <div class="row"><a class="button-med button-cta link sign-up-link">Join Us</a><a
                                            class="button-med button-white-onbg" href="http://laww.com.au/info/about-the-law-app/">Learn
                                        more</a>

                                    <div class="white terms"><span></span>
                                        <br/><span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Html::image('assets/userpanel/images/earn-money-image.png','',['class' => 'handy-man']) !!}
            </div>
            @include('includes.footer')
        </div>
    </div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
{!! Html::script('assets/userpanel/js/bootstrap.min.js') !!}
{!! Html::script('assets/userpanel/js/popup-modal.js') !!}
{!! Html::script('assets/userpanel/js/custom.js') !!}
{!! Html::script('assets/userpanel/js/posttask.js') !!}
@include('includes.login')
@if(Auth::user())
    @include('includes.postjob')
@endif
</body>

</html>
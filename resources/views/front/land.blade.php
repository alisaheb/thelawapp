@extends('layouts.front')
@section('title','The law app')
@section('content')
            <!-- Slider Area-->
        <div class="slider-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="banner">
                        {{ Html::image('assets/front/img/banner.jpg') }}
                    </div>
                    <div class="banner_text">
                        <h1><span>The</span> law app</h1>
                        <h3>JUSTICE IS SERVED</h3>
                        <div class="search_box">
                            <form role="search" method="post" id="searchform" action="">
                                <div class="search">
                                    <input type="text" value="" name="s" placeholder="Search Work Here" id="kb-s" class="autosuggest" autocomplete="off"><span>
                                    <input type="submit" id="searchsubmit" value="Get Search"></span>
                                    <input type="hidden" name="post_type" value="knowledgebase">
                                    <br>
                                    <input type="hidden" id="search_nonce" name="search_nonce" value="4492b2a76e">
                                </div>
                                <p></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- After Slider Box Area-->
        <div class="box-area">
            <div class="container">
                <div class="row">
                    <div class="section_title">
                        <h1>What’s the matter ?</h1>
                    </div>
                    <div class="icon_box">
                        <div class="col-md-4 box_1">
                            <div class="front">
                                <i class="flaticon-books"></i>
                                <p>Divorce Lawyers</p>
                            </div>
                            <div class="back">
                                <p>eg. Help me with complex child and property matter</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                        <div class="col-md-4 box_2">
                            <div class="front">
                                <i class="flaticon-libra"></i>
                                <p>Murder Cases</p>
                            </div>
                            <div class="back">
                                <p>eg. Help me with complex child and property matter</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                        <div class="col-md-4 box_3">
                            <div class="front">
                                <i class="flaticon-judge"></i>
                                <p>Mediation Lawyer</p>
                            </div>
                            <div class="back">
                                <p>eg. Help me with complex child and property matter</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                        <div class="col-md-4 box_4">
                            <div class="front">
                                <i class="flaticon-lawyer"></i>
                                <p>Defamation Lawyers</p>
                            </div>
                            <div class="back">
                                <p>eg. Help me with complex child and property matter</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                        <div class="col-md-4 box_5">
                            <div class="front">
                                <i class="flaticon-law-book"></i>
                                <p>Wills & Estate Planning Lawyers</p>
                            </div>
                            <div class="back">
                                <p>eg. Help me with complex child and property matter</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                        <div class="col-md-4 box_6">
                            <div class="front">
                                <i class="flaticon-siren"></i>
                                <p>Others</p>
                            </div>
                            <div class="back">
                                <p>eg. Help me with complex child and property matter</p>
                                <a href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="More_link">
                        <a href="#">See More Categories</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Who We Area Area-->
        <div class="box-area who_we_are ratting">
            <div class="container">
                <div class="row">
                    <div class="section_title">
                        <h1>Who we are</h1>
                        <p class="subtitle">Our trusted community marketplace for people and businesses to outsource legal tasks and find local <a href="#">lawyers</a> or hire flexible staff in minutes - online or via mobile.</p>
                    </div>
                    <div class="icon_box">
                        <div class="col-md-4 box_1">
                            <div class="front">
                                {{ Html::image('assets/front/img/presentation.png') }}
                                <p class="text">Tell us what your <a href="#">legal</a> matter is. It's FREE to post. No obligation.</p>
                            </div>
                        </div>
                        <div class="col-md-4 box_2">
                            <div class="front">
                                {{ Html::image('assets/front/img/chat.png') }}
                                <p class="text">Receive offers from trusted and accredited <a href="#">lawyers</a> within minutes.</p>
                            </div>
                        </div>
                        <div class="col-md-4 box_3">
                            <div class="front">
                                {{ Html::image('assets/front/img/teamwork.png') }}
                                <p class="text">Choose the best <a href="#">lawyer</a> for the job From Here.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Area-->
        <div class="video-area" id="intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side-box">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <h1>UBER LAWYERS UNITED</h1>
                        <p>Earn more. Get more done.</p>
                        <a href="#">Watch the video</a>
                    </div>
                    <div class="col-md-6 right-side-box">
                        <div class="law_video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/cqNmVJk7Zyg/?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Task Area-->
        <div class="box-area recent_task">
            <div class="container">
                <div class="row">
                    <div class="section_title">
                        <p>BROWSE TOP SKILLS</p>
                    </div>
                    <div class="icon_box">
                        <div class="col-md-3">
                            <ul>
                                <li><a href="#">About The Law App</a></li>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Disclaimer</a></li>
                                <li><a href="#">Vision And Mission</a></li>
                                <li><a href="#">Criminal Law</a></li>
                                <li><a href="#">Real Estate Law</a></li>
                                <li><a href="#">Property Law</a></li>
                                <li><a href="#">Family Law</a></li>
                                <li><a href="#">Vision And Mission</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <li><a href="#">About The Law App</a></li>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Disclaimer</a></li>
                                <li><a href="#">Vision And Mission</a></li>
                                <li><a href="#">Criminal Law</a></li>
                                <li><a href="#">Real Estate Law</a></li>
                                <li><a href="#">Property Law</a></li>
                                <li><a href="#">Family Law</a></li>
                                <li><a href="#">Vision And Mission</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <li><a href="#">About The Law App</a></li>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Disclaimer</a></li>
                                <li><a href="#">Vision And Mission</a></li>
                                <li><a href="#">Criminal Law</a></li>
                                <li><a href="#">Real Estate Law</a></li>
                                <li><a href="#">Property Law</a></li>
                                <li><a href="#">Family Law</a></li>
                                <li><a href="#">Vision And Mission</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul>
                                <li><a href="#">About The Law App</a></li>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Disclaimer</a></li>
                                <li><a href="#">Vision And Mission</a></li>
                                <li><a href="#">Criminal Law</a></li>
                                <li><a href="#">Real Estate Law</a></li>
                                <li><a href="#">Property Law</a></li>
                                <li><a href="#">Family Law</a></li>
                                <li><a href="#">Vision And Mission</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Complete Project Area-->
        <div class="project_area">
            <div class="container">
                <div class="row stat">
                    <div class="col-md-12 project_box">
                        <h1>Build your team now</h1>
                        <div class="More_link">
                            <a href="#">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earn Area-->
        <div class="video-area earn_money">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 left-side-box">
                        <h1>Earn up to $5,000 per month completing tasks</h1>
                        <div class="e_box">
                            <h4><i class="fa fa-check-circle" aria-hidden="true"></i>You're the boss</h4>
                            <p>With over $3.5M of tasks posted every month on Our website there are lots of opportunities to earn. </p>
                        </div>
                        <div class="e_box">
                            <h4><i class="fa fa-check-circle" aria-hidden="true"></i>Payments</h4>
                            <p>With over $3.5M of tasks posted every month on Our website there are lots of opportunities to earn.</p>
                        </div>
                        <div class="e_box">
                            <h4><i class="fa fa-check-circle" aria-hidden="true"></i>With top rated insurance</h4>
                            <p>When you complete tasks on our website, you are covered by a $20 million insurance policy.</p>
                        </div>
                        <div class="earn_link">
                            <a href="#">Join Us</a>
                            <a href="#">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-6 right-side-box">
                        <div class="law_video">
                        {{ Html::image('assets/front/img/earn-money-image.png') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
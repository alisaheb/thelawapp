<!DOCTYPE html>
<html>
@include('includes.head')
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
                                <img src="{{asset('userpanel/images/image-icon.png')}}">
                            @endif
                        <h3>{{ Auth::user()->fname." ".Auth::user()->lname }}</h3>
                    </div>
                    @include('includes.dashboardlinks')
                </div>
                <div class="right-side">
                    <h3 class="inner-page-headings">Skills</h3>
                    <form class="" action="{{url('saveskills')}}" method="post">
                        <div class="page-form">
                            {{csrf_field()}}
                            <ul>
                                <li class="upload-photo">
                                    <p>These are your skills. Keep them updated with any new skills you learn so other
                                        Law App can know what you can offer.</p>
                                </li>
                                <li class="checkbox-section">
                                <?php if(isset($skills->transportation)){$transport = explode(';',$skills->transportation);} ?>
                                <p>Transportation</p>
										<span>
											<input type="checkbox" name="checkbox[]" value="Post Task" 
                                                <?php if(isset($transport)) {if(in_array('Post Task',$transport))echo "checked"; } ?>>
											<p>Post tasks</p>
										</span>
										<span>
                                        <input type="checkbox" name="checkbox[]" value="Car"<?php if(isset($transport)){if(in_array('Car',$transport)) echo "checked";} ?>>
											<p>Car</p>
										</span>
										<span>
											<input type="checkbox" name="checkbox[]" value="Online" <?php if(isset($transport)) {if(in_array('Online',$transport))echo "checked"; } ?>>
											<p>Online</p>
										</span>
										<span>
											<input type="checkbox" name="checkbox[]" value="Scooter"<?php if(isset($transport)) {if(in_array('Scooter',$transport))echo "checked"; } ?>>
											<p>Scooter</p>
										</span>
										<span>
											<input type="checkbox" name="checkbox[]" value="Truck"<?php if(isset($transport)) {if(in_array('Truck',$transport))echo "checked"; } ?>>
											<p>Truck</p>
										</span>
										<span>
											<input type="checkbox" name="checkbox[]" value="Walk"<?php if(isset($transport)) {if(in_array('Walk',$transport))echo "checked"; } ?>>
											<p>Walk</p>
										</span>
                                </li>
                                <li>
                                    <p>My Specialities</p>

                                    <div class="skillspecial-div">
                                        <input type="text" id="skill-specialities" name="specialities"
                                               value="<?php echo isset($skills->specialities)? $skills->specialities:'';?> ">
                                    </div>
                                </li>
                                <li>
                                    <p>Languages</p>
                                    <input type="text" name="languages" value="<?php echo isset($skills->languages) ?$skills->languages:'' ?>">
                                </li>
                                <li>
                                    <p>Education</p>
                                    <input type="text" name="education" value="<?php echo isset($skills->education) ?$skills->education:'' ?>">
                                </li>
                                <li>
                                    <p>Work</p>
                                    <input type="text" name="works" value="<?php echo isset($skills->works) ?$skills->works:'' ?>">
                                </li>

                                <li class="button-section">
                                    <button>Save Profile</button>
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
<script src="{{asset('assets/userpanel/js/custom.js')}}"></script>
@include('includes.footer')
@include('includes.msgnotification')
@include('includes.login')
</body>
</html>
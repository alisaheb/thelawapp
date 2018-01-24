<style>
    .error {
        display: none;
        color: red;
    }
</style>
<link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"
      rel="stylesheet" type="text/css"/>


<div class="md-modal md-effect-3 common-form post-job-common post-job-first" id="post-job-one">
    <div class="md-content on-registration">
        <button class="md-close">x</button>
        <form id="myForm" class="drp-lst" action="" method='post'>
            <div class="post-task-heading">Register Your Case</div>
            <div class="free-quotes-heading-bottom">
                <ul>
                    <li class="post-job-active"><a style="cursor:auto" href="javascript:;">1. Details</a></li>
                    <li><a style="cursor:auto" href="javascript:;">2. Location</a></li>
                    <li><a style="cursor:auto" href="javascript:;">3. Budget</a></li>
                </ul>
            </div>

            <div class="common-inner-form">
					<span>
					<input id="token_one" type="hidden" name="_token" value="{{ csrf_token() }}">
						<label>Case Title</label>
						<input id="case-title" name="title" value="" type="text" required>
						<span class="error title-error">Enter Title of  Case</span>
					</span>
					<span>
						<label>Date of Incident</label>
						<input id="datepick" class="date-picker" name="date_of_incedent" value="" type="text" required>
                                            <span class="error datepick-error">Enter Title of  Date of Incedent</span>
					</span>
					<span>
						<label>Describe your case in more detail</label>
						<textarea id="description-task" name="description"></textarea>
						<span class="error description-error">Please Enter the Description</span>
						<p class="need-help">Need Help ?</p>
					</span>
					<span>
						<button id="postjob-sign-up-button-first"
                                class="button-cta button-lrg center task-continue-one">Continue
                        </button>
					</span>
            </div>
        </form>
    </div>
</div>

<div class="md-modal md-effect-3 common-form post-job-common post-job-two" id="post-job-two">
    <div class="md-content after-registration">

        <form id="login-info" class="drp-lst" action="{{url('userLogin')}}" method='post'>
            <div class="post-task-heading">Get FREE Quotes</div>
            <div class="free-quotes-heading-bottom">
                <ul>
                    <li><a style="cursor:auto" href="javascript:;">1. Details</a></li>
                    <li class="post-job-active"><a style="cursor:auto" href="javascript:;">2. Location</a></li>
                    <li><a style="cursor:auto" href="javascript:;">3. Budget</a></li>
                </ul>
            </div>
            <div class="common-inner-form">
                <div class="post-task-two-inner-radio">
                    <input id="" name="email" value="" type="radio">

                    <p>To be completed in person</p>
                    <input id="" name="email" value="" type="radio">

                    <p>To be completed online</p>
                </div>
					
					<span>
						<label>Incedent Location</label>
						<input id="incedent-location" name="last_date" value="" type="text">
						<span class="error incedent-location">Enter  Incident Location</span>
					</span>

                <!--			<div class="post-task-two-inner-radio">
                                <input id="" name="email" value="" type="radio"><p>Today</p>
                                <input id="" name="email" value="" type="radio"><p>By a certain day</p>
                                <input id="" name="email" value="" type="radio"><p>Within 1 week</p>
                            </div> -->
					<span>
						<label>Estimate Deadline</label>
						<input id="estimate-deadline" class="date-picker" name="estimate-deadline" value="" type="text"
                               required>
                                            <span class="error estimate-deadline">Enter  Deadline</span>
					</span>
					
					<span>
						<button id="button-second " class="button-cta button-lrg center task-continue-two ">Continue
                        </button>
					</span>
            </div>
        </form>
    </div>
</div>

<div class="md-modal md-effect-3 common-form post-job-common" id="post-job-three">
    <div class="md-content login-popup">
        <button class="md-close">x</button>
        <form class="drp-lst" action="" method='post'>
            <div class="post-task-heading">Estimate Budget</div>
            <div class="free-quotes-heading-bottom">
                <ul>
                    <li><a style="cursor:auto" href="javascript:;">1. Details</a></li>
                    <li><a style="cursor:auto" href="javascript:;">2. Location</a></li>
                    <li class="post-job-active"><a style="cursor:auto" href="javascript:;">3. Budget</a></li>
                </ul>
            </div>

            <input id="token_two" type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="common-inner-form">
                <!--		<span class="input-number">
                            <label>How many people do you need for your task?</label>
                            <input id="" name="" value="" type="number" >
                            <p>Workers</p>
                        </span> -->
					
					<span>
					<!--	<div class="your-budget">
							<label>Task title</label>
							<a href="#">Price Guide</a>
						</div>
					-->	
						<div class="post-task-two-inner-radio">
                            <input id="" name="email" value="" type="radio">

                            <p>Phone Consultation</p>
                            <input id="" name="email" value="" type="radio">

                            <p>Meeting Consultation</p>
                            <input id="" name="email" value="" type="radio">

                            <p>Email Consultation</p>
                            <input id="" name="email" value="" type="radio">

                            <p>Video Consultation</p>

                        </div>
						
					</span>

                <!--		<span class="input-number per-hour">
                            <p>$</p>
                            <input id="" name="" value="" type="number" >
                            <p>per hour for</p>
                            <input id="" name="" value="" type="number" >
                            <p>hours</p>
                        </span>
                    -->
                <div class="estimated-budget">
                    <h4>Estimated Budget $: <input style="width:110px" id="estimate-budget" name="estimate_budget"
                                                   value="" type="number"></h4>
                    <span class="error budget-error">Please enter your budget.</span>
                </div>
					
					<span>
						<button id="postjob-log-in-button" class="button-cta button-lrg center task-continue-three">
                            Continue
                        </button>
					</span>
            </div>
        </form>
    </div>
</div>


<div class="md-modal md-effect-3 common-form post-job-common" id="post-job-four">
    <div class="md-content login-popup">
        <button class="md-close">x</button>
        <form class="drp-lst" action="" method='post'>
            <div id="general-ajax-load" class="complain-loader" style="display:none"><img
                        src="{{asset('userpanel/images/loading.gif')}}"/></div>
            <div class="post-task-heading">Register your complain.</div>
            <div class="free-quotes-heading-bottom">
                <ul>
                    <li><a style="cursor:auto" href="javascript:;">1. Details</a></li>
                    <li><a style="cursor:auto" href="javascript:;">2. Location</a></li>
                    <li class="post-job-active"><a style="cursor:auto" href="javascript:;">3. Budget</a></li>
                </ul>
            </div>

            <input id="token_two" type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="common-inner-form">
					<span class="input-number">
					<center><label>Are we done?</label></center>
                        <!--	<input id="" name="" value="" type="number" >-->
                        <!--	<p>Workers</p> -->
				</span>
					
					
					<span>
						<button id="postjob-log-in-button" class="button-cta button-lrg center task-submission">Go
                            Ahead
                        </button>
					</span>
            </div>
        </form>
    </div>
</div>


<script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"
        type="text/javascript"></script>
<script>
    $(document).ready(function () {

        $('#datepick').datepicker({
            format: 'M-dd-yyyy'
        });

        $('#estimate-deadline').datepicker({
            format: 'M-dd-yyyy'
        });
    });


</script>
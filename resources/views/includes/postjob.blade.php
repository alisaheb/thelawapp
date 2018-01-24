{!! Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
{!! Html::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') !!}
{!! Html::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') !!}

<div class="md-modal md-effect-3 common-form post-job-common post-job-first" id="@if((Auth::user()->profile_completion == 100) && (Auth::user()->status == 'verified') ){{'post-job-one'}}@endif">
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

            <div class="common-inner-form  inner-register-case">
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
						<label style="width:auto; margin-right:20px;">Select a Category</label>
						<select id="categori" name="category">
                            <?php
                            $categories = DB::table('categories')->get();
                            echo '<option value="">Select an category</option>';
                            foreach ($categories as $category) {
                                echo '<option class="'.$category->id.'" value="' . $category->id . '">' . $category->name . '</option>';
                            }
                            ?>
                        </select>
				 <span class="error categori-error">Choose a category</span>
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
               
					<span>
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
            <div id="general-ajax-load" class="complain-loader"
                 style="display:none">{!! Html::image('assets/userpanel/images/loading.gif') !!}</div>
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


{!! Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')!!}
<script type="text/javascript">
    $(document).ready(function () {

        $('#datepick').datepicker({
            format: 'M-dd-yyyy'
        });

        $('#estimate-deadline').datepicker({
            format: 'M-dd-yyyy'
        });
    });


</script>
<style>
	.profile-error
	{
	display: none;
	color: red;
	}
	.startbtn {
	height: 188px;
	padding: 8em;
	}
</style>
<!-- updload profile image pop up -->
<link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<div class="md-modal md-effect-3 common-form" id="imageupload">
	<div class="md-content on-registration">
		<button class="md-close popup-close-icon">x</button>
		<div id="owl-popup-two" class="owl-carousel"-->
			<!--  first pop up start -->

			@if(empty(Auth::user()->profile_image))
			<div class="item">
				<h2 class="popup-heading">Upload a profile picture</h2>
				<p class="popup-heading-text">Upload a clear photo of yourself to help people identify you from other users, and also gain trust.</p>
				<div class="progressbar">
					<div class="progressbar-one"></div>
				</div>
				<form id="upload-image-popup" class="drp-lst" action="" method='post'>
					<div id="general-ajax-load" style="display:none">{!! Html::image('assets/userpanel/images/loading.gif') !!}</div>
					<figure>
						@if(!empty(Auth::user()->profile_image))
						<img  id="imagePreview_one" class="profile_pic" style="width:195px" src="{{url('public/profile_images')}}/{{Auth::user()->profile_image}}">
						@else
						{!! Html::image('assets/userpanel/images/image-icon.png','',['id' => 'imagePreview_one','class' => 'profile_pic','width' => '195px']) !!}
						@endif
					</figure>
					<label id="image" for="pic"> 
					{!! Html::image('assets/userpanel/images/icon_upload.png','',['width' => '50','height' => '50']) !!}
					</label>
					<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
					<input style="display:none" type="file" id="pic" name="pofile_pic" class="inputfile" accept="image/*">
					<span style="display:block">
					<button   style="display:none"  id="image-upload" class="button-cta button-lrg center ">Upload Image</button>
					</span>
				</form>
			</div>
			@endif

			<!--   second pop up-->
			<div class="item">
				<h2 class="popup-heading">Mobile Number</h2>
				<p class="popup-heading-text">Provide your mobile number and we'll keep you posted on the status of your legal updates via text message.</p>
				<div class="progressbar">
					<div class="progressbar-two"></div>
				</div>
				<form id="number-verification" class="" action="" method='post'>
					<div id="general-ajax-load" class="num-loader" style="display:none">{!! Html::image('assets/userpanel/images/loading.gif') !!}</div>
					<div class="common-inner-form mobile-popup">
						<input id="token-verify" type="hidden" name="_token" value="{{ csrf_token() }}">
						<span>
							<h4>Enter your mobile number</h4>
							<span ><i style="    display: inline-block;
								float: left;
								position: absolute;
								left: 10px;
								margin-top: 7px;">+61 </i>
							<input id="verifie-mobile" name="verifiemobile" value=""  type="text" style="max-width: 200px; padding-left:40px;">
							{!! Html::image('assets/userpanel/images/australian_flag.png','',['class' => 'flag']) !!}
							<button id="send-verification" class="button-cta button-lrg center register">Send Verification Code</button></span><span class="profile-error verify-error">Enter the number first </span>
							<span class="profile-error mobile-error">Invalid number, please try again. </span>
							<span class="profile-error verification-success">Number verification Succefull. </span>
						</span>
						<span>
							<h4>Code by voice</h4>
							<p>This will allow you to make or recieve call when you are engaged in a task</p>
							<p>We never display your mobile number. Calls are connected and you will recieve calls directly to your mobile.</p>
							<p>Enable Calls free ?</p>
							<a href="#" class="mobile-yes selecte">Yes</a>
							<a href="#" class="mobile-no">No</a>
						</span>
					</div>
				</form>
			</div>
			<!-- third pop up. Pop up for  Lawyer Payment -->
			@if(Auth::user()->type=='lawyer')
				@if(!isset($account->account_holder_name))
				<div class="item">
					<h2 class="popup-heading">Enter your payment details</h2>
					<span class="popup-heading  after-submit profile-error">Detail entered succefully</span>
					<p class="popup-heading-text">Adding your bank details allows us to make payment for matters you handle.</p>
					<div class="progressbar">
						<div class="progressbar-three"></div>
					</div>
					<form class="" action="{{url('accountdetails')}}" method='post'>
						<div id="general-ajax-load" class="bsbpopup" style="display:none">{!! Html::image('assets/userpanel/images/loading.gif') !!}</div>
						<input id="acnt-token" type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="common-inner-form">
							<span>
							<label>Account Holder Name</label>
							<input id="acntholder" name="acntholder" value="" type="text" >
							<span class="profile-error acntholder">Please enter the Account Holder Name.</span>
							</span>
							<span>
							<label>Bank State Branch</label>
							<input  id="bsb" name="bsb" value="" type="text" >
							<span class="profile-error bsb">Please enter the Bank State Branch.</span>
							</span>
							<span>
							<label>Account Number</label>
							<input id="acntnumber" name="acntnumber" value="" type="text" >
							<span class="profile-error acntnumber">Please enter the Account Number.</span>
							</span>
							<span>
							<button id="add-bank-account" class="button-cta button-lrg center ">Add Bank Account</button>
							</span>
						</div>
					</form>
				</div>
				@endif
			@endif

			<!-- addednew pop up-->
			@if(Auth::user()->type=='client')
			<div class="item">
				<h2 class="popup-heading">Enter your Card details</h2>
				<span class="popup-heading  after-submit profile-error">Detail entered succefully</span>
				<p class="popup-heading-text">Adding your bank details allows us to make payment for matters you handle.</p>
				<div class="progressbar">
					<div class="progressbar-three"></div>
				</div>
				<span class="success" style="color:red; display:none">Detail added succefully</span>	
				<form class="userprofile-addcard-popup" action="{{url('accountdetails')}}" method='post'>
					<div id="general-ajax-load" class="bsbpopup" style="display:none">
						{!! Html::image('assets/userpanel/images/loading.gif') !!}
					</div>
					<input id="acnt-token" type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="common-inner-form">
						<div class="anchovy-credit-card-input anchovy-form" id="update_card">
							<span class="cvv-error" style="color:red"></span>
							<div class="anchovy-form-item-small">
								<label>Name on Card</label>
								<input type="text" class="nameoncard" required placeholder="John Citizen">
							</div>
							<div class="anchovy-form-item-small"><label>Card Number</label>
								<input type="number" required class="number-input card-num" placeholder="1234 5678 9101 1231">
								{!! Html::image('assets/userpanel/images/credit_cards.png','Currently only VISA or Mastercard credit cards accepted',['class'=>'credit-card-logos','title'=>'Currently only VISA or Mastercard credit cards accepted'])!!}
							</div>
							<div class="expiry-input anchovy-form-item-small">
								<label>Expiry Date</label>
								<input type="number" class="card-month" placeholder="MM" required >
								<input type="number" class="card-year" placeholder="YY" required>
							</div>
							<div class="cvc-input anchovy-form-item-small">
								<label>CVC</label><input class="popcvc" placeholder="123" required maxlength="4">
								<div class="anchovy-question">
									<span></span>
									<div class="answer">
										<p>CVC provides an additional level of online fraud protection. The number is located on the back of your credit card and is generally three to four digits long.</p>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="anchovy-form-item-small" style="margin-top:30px;">
								<span>
								<button  class="button-cta button-lrg center ">Submit</button>
								</span>
							</div>
						</div>
					</div>
				</form>
			</div>
			@endif	  
			<!--forth pop up--> 
			@if(!Auth::user()->description)     
			<div class="item">
				<h2 class="popup-heading"> 
                                          @if(Auth::user()->type =='client') {{ "Outline Your Legal Matter." }} 
                                          @else {{ "Outline your experience in the legal industry"}} @endif
                                </h2>
				<p class="popup-heading-text">
                                @if(Auth::user()->type =='client') {{ "Please provide a brief outline of yourself. You will describe your legal matter when you post the job." }} 
                                          @else {{ "Please provide a brief outline of yourself including your experience in the legal industry. You should describe your work history and focus of expertise in law."}} @endif
                                </p>
				<div class="progressbar">
					<div class="progressbar-four"></div>
				</div>
				<form class="drp-lst about-yourself" action="" method='post'>
					<div id="general-ajax-load" class="dex" style="display:none">{!! Html::image('assets/userpanel/images/loading.gif') !!}</div>
					<span class="profile-error err-description" style="display:none">Please enter the Description first.</span>
					<textarea id="decri" name="user-description" 
                                             @if(Auth::user()->type =='client') placeholder="{{ 'I am Australian and work in the telecomunications industry as a Senior Manager. I have 3 kids and a dog. I enjoy reading and swimming.' }}" 
                                          @else placeholder="{{ 'I have been a practicing criminal lawyer for 12 years and have worked in both Australia and England. I have rich experience in many areas of criminal law including assault, drink driving and financial crimes. Please download my resume for detailed experience and work history.' }}" @endif
                                                  ></textarea>
					<span class="profile-error saved-desc" style="display:none">Description saved.</span>
					<span>
					<button id="add-description" class="button-cta mgtop button-lrg center ">Add Description</button>
					</span>
				</form>
			</div>
			@endif
			@if(Auth::user()->type!='client')
				@if(!Auth::user()->skills) 
				<div class="item">
					<h2 class="popup-heading">Let us know what your skills are</h2>
					<p class="popup-heading-text">When new tasks match your skills, we ll alert you so you can be the first to make an offer</p>
					<div class="progressbar">
						<div class="progressbar-five"></div>
					</div>
					<form class="skills-form" action="" method='post'>
						<div id="general-ajax-load" class="skills-loader" style="display:none">
							{!! Html::image('assets/userpanel/images/loading.gif') !!}
						</div>
						<div class="common-inner-form skills-popup">
							<span>
								<ul id="ulskill">
								@foreach($categories as $category)
									<li data-value="{{ $category->name }}" data-id="{{  $category->id }}">
										<label for="{{ $category->id }}"><a >{{ $category->name }}</a></label>
									</li>
								@endforeach
								</ul>
								<script>
									$(function(){ 
										$('#ulskill li').click(function(){ 
										var name=$(this).attr('data-value'); 
										var id=$(this).attr('data-id'); 
										$('#'+id).val(name);
										$(this).toggleClass('active');  }); 
									});
								</script>		 
							</span>
							@foreach($categories as $category)
							<input type="checkbox" name="skills[]"  id="{{ $category->id}}"  class="skills" value=""/>
							@endforeach
						</div>
					<input id="add-skills" type="submit" class="button-cta button-lrg center " value="add">
					
						<strong class="skills-error text-danger"></strong>
						<strong class="totalskill-error text-danger"></strong>
						
					</form>
				</div>
				@endif
			@endif

			@if(Auth::user()->type =='lawyer')
				@if(!$certificate)
				<div class="item">
					<h2 class="popup-heading">Upload your certificates </h2>
					<p class="popup-heading-text">Your certicicate text</p>
					<div class="progressbar">
						<div class="progressbar-five"></div>
					</div>
					<form  id ="add-certificate" action="{{url('add-certificate')}}" method='post' enctype="multipart/form-data">
		                <div id="general-ajax-load" class="bsbpopup" style="display:none">
		                    <img src="{{asset('assets/userpanel/images/loading.gif')}}"/>
		                </div>
		                <input id="acnt-token" type="hidden" name="_token" value="{{ csrf_token() }}">
		                <div class="common-inner-form">
		                    <div id="name-div">
		                        <label>Certificate Name</label>
		                        <input type="text" class="name" name="name" placeholder="">
		                        <strong class="name-error"></strong>
		                        @if ($errors->has('name'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('name') }}</strong>
		                            </span>
		                        @endif
		                    </div>
		                    <div id="certificate-div">
		                        <label>Browse certificate</label>
		                        <input type="file" class="certificate" name="certificate" placeholder="">
		                        <strong class="certificate-error"></strong>
		                        @if ($errors->has('certificate'))
		                            <span class="help-block">
		                                <strong>{{ $errors->first('certificate') }}</strong>
		                            </span>
		                        @endif
		                    </div>
		                    <div class="clearfix"></div>
		                    <div class="anchovy-form-item-small" style="margin-top:30px;">
		                        <span>
		                        <button class="button-cta button-lrg center submitCertificate">Submit</button>
		                        </span>
		                    </div>
		                </div>
	            	</form>
				</div>
				@endif
			@endif

			<div class="item">
				<h2 class="popup-heading"> 
                                    @if(Auth::user()->type =='client') {{ "Check out available work Client"}} @else {{ "Check out available work Lawyer"}}@endif 
                                </h2>
				<p class="popup-heading-text">@if(Auth::user()->type =='client') {{ "Browse Tasks to see thousands of available tasks in your are. search via keyword to select tasks that your intersted in. Client"}} @else {{ "Browse Tasks to see thousands of available tasks in your are. search via keyword to select tasks that your intersted in. Laywer"}}@endif</p>
				<div class="progressbar">
					<div class="progressbar-six"></div>
				</div>
				<form class="startnow" action="" method='post' >
                                      @if(Auth::user()->profile_completion == 100 && Auth::user()->status == 'verified')
					<div class="startbtn">
						<div class="crclw">
							<i class="fa fa-check crcl" aria-hidden="true"></i>
						</div>
						<button id="" class="button-cta button-lrg center">Start Now</button>
					</div>
                                       @elseif (Auth::user()->profile_completion == 100 && Auth::user()->status == 'unverified')
                                           <div class="startbtn">
						<div class="crclw">
							<i class="fa fa-times crcl" aria-hidden="true"></i>
						</div>
						<button id="" class="button-cta button-lrg center">Wait for admin Approval</button>
					</div>
                                        @elseif (Auth::user()->profile_completion < 100)
                                           <div class="startbtn">
						<div class="crclw">
							<i class="fa fa-times crcl" aria-hidden="true"></i>
						</div>
						<button id="" class="button-cta button-lrg center">Make your profile 100% </button>
					</div>     
                                       @endif
				</form>
			</div>
		</div>
		
		<button  class="button-cta button-lrg  prev">Previous</button>
		
		<button  class="button-cta button-lrg  next">Next</button>
	</div>
</div>
<!--mobile verification pop up-->
<div class="md-modal md-effect-3 common-form" id="verifymob">
	<div class="md-content login-popup">
		<button class="md-close">x</button>
		<form id="mob-veri" class="drp-lst" action="" method='post'>
			<!-- <h1 style="">Sign Up</h1> -->
			<div id="general-ajax-load" class="login-loader" style="display:none">
				{!! Html::image('assets/userpanel/images/loading.gif') !!}
			</div>
			<div class="already-have-account">
				<p><a class="sign-up-link" href="javascript:;">Please enter the verification code sent to your mobile.</a></p>
			</div>
			<input id="token_code" type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="common-inner-form">
				<span>
				<label>Code</label>
				<input id="request_id" name='request_id' type="hidden"  value=""/>
				<input id="req_mob" name='req_mob' type="hidden"  value=""/>
				<input id="verify-code" name="verifycode" value="" type="text" required />
				<span class="error code-error">Please enter the mobile number.</span>
				</span>
				<span>
					<button id="send-code" class="button-cta button-lrg center">Send</button>
					<p class="resend-code"><a href="javascript::void">Resend Code</a></p>
				</span>
			</div>
		</form>
	</div>
</div>
<!--end of mobile verification-->
<!--find friend pop up start-->
<div class="md-modal md-effect-3 common-form" id="findfriend">
	<div class="md-content findfriend-popup">
		<button class="md-close">x</button>
		<form id="mob-veri" class="drp-lst" action="" method='post'>
			<!-- <h1 style="">Sign Up</h1> -->
			<div id="general-ajax-load" class="login-loader" style="display:none">
				{!! Html::image('assets/userpanel/images/loading.gif') !!}
			</div>
			<div class="already-have-account">
				<p><a class="sign-up-link" href="javascript:;">Please enter the emails.</a></p>
			</div>
			<input id="token_code" type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="common-inner-form">
				<span>
				<label>Send Email</label>
				<input id="request_id" name='request_id' type="hidden"  value=""/>
				<input id="req_mob" name='req_mob' type="hidden"  value=""/>
				<input id="verify-code" name="verifycode" value="" type="text" required />
				<span class="error code-error">Please enter the mobile number.</span>
				</span>
				<span>
				<button id="" class="button-cta button-lrg center">Send</button>
				</span>
			</div>
		</form>
	</div>
</div>
<!--end of find friend-->
<script>
	$(document).ready(function() {
	
	  var owll = $("#owl-popup-two");
	   
	  owll.owlCarousel({
	
	  items : 1, //10 items above 1000px browser width
	  itemsDesktop : [1000,2], //5 items between 1000px and 901px
	  itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
	  itemsTablet: [768,1], //2 items between 600 and 0;
	  itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
	  mouseDrag : false,
	  touchDrag : false
	  });
	
	  // Custom Navigation Events
	  $(".next").click(function(){
	  owll.trigger('owl.next');
	  })
	  $(".prev").click(function(){
	  owll.trigger('owl.prev');
	  })
	  $(".play").click(function(){
	  owll.trigger('owl.play',1000);
	  })
	  $(".stop").click(function(){
	  owll.trigger('owl.stop');
	  })
	
	});
</script>
<!--end of mobile verification-->
{!! Html::script('public/js/bootstrap-multiselect.js') !!}
<script type="text/javascript">
	$('#example-multiple-selected').multiselect();
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$( function() {
	  $( "#progressbar" ).progressbar({
	    value: 37
	  });
	} );
</script>
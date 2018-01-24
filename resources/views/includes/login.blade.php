<div class="md-modal md-effect-3 common-form" id="modal-4" style="display: none">
	<div class="md-content on-registration">
		<button class="md-close">x</button>
		<form action="{{url('/register')}}" id="registerForm" method="post" name="registerForm">
		    {{ csrf_field() }} 
			<div id="general-ajax-load" class="signipopup" style="display:none">
				{!! Html::image('assets/userpanel/images/loading.gif') !!}
			</div>
			<div class="signup-popup-top-text">
			It’s great to have you as member of The Law App Community.<br> We just need a few more details to help you on your way.
			</div>
			<div class="already-have-account">
				<p>Already have an Account?</p>
				<p><a class="login-link" href="javascript:;">Login</a></p>
			</div>
			<div class="form-group common-inner-form">
				<div class="form-group" id="register-email">
                    <label class="control-label" for="email">Email</label> <input class="form-control" id=
                    "email" name="email" title="Please enter you email" type="email"
                    value=""> <span class="help-block"><strong id="register-errors-email"></strong></span> 
                </div>
                <div class="form-group" id="register-password">
                    <label class="control-label" for="password">Password</label> <input class="form-control" id="password" name=
                    "password" title="Please enter your password" type="password" value="">
                    <span class="help-block"><strong id="register-errors-password"></strong></span> 
                </div>
				<button  class="button-cta button-lrg center sign-register">Register</button>
			</div>
		</form>
	</div>
</div>

<div class="md-modal md-effect-3 common-form" id="modal-6">
	<div class="md-content after-registration">
		<form action="{{url('/userLogin')}}" id="registerProfile" method="post" name="registerProfile">
		    {{ csrf_field() }} 
		    <div id="general-ajax-load" class="signipopup" style="display:none">
				{!! Html::image('assets/userpanel/images/loading.gif') !!}
			</div>
			<div class="signup-popup-top-text">
				<div>Welcome! </div>
				<div class="subheading">It’s great to have you as member of the Law Community. We just need a few more details to help you on your way.</div>
			</div>
			<div class="common-inner-form">
				<input id="email_second" name="email" value="" type="hidden">

				<div class="form-group" id="fname">
                    <label class="control-label" for="fname">First Name</label> <input class="form-control" id=
                    "fname" name="fname"  type="text"
                    value=""> <span class="help-block"><strong id="profile-fname"></strong></span> 
                </div>

                <div class="form-group" id="lname">
                    <label class="control-label" for="lname">Last Name</label> <input class="form-control" id=
                    "lname" name="lname"  type="text"
                    value=""> <span class="help-block"><strong id="profile-lname"></strong></span> 
                </div>

                <div class="form-group" id="address">
                    <label class="control-label" for="address">Address</label> <input class="form-control" id=
                    "address" name="address"  type="text"
                    value=""> <span class="help-block"><strong id="profile-address"></strong></span> 
                </div>

				<div class="form-group" id="userTypeDiv">
					<span class="">Please Select User Type</span>
					<ul class="donate-now">
						<li>
							<input type="radio" id="lawyer" value="lawyer" name="user_type" />
							<label for="lawyer">Lawyer</label>
						</li>
						<li>
							<input type="radio" id="client" value="client" name="user_type" />
							<label for="client">Client</label>
						</li>
						<span class="help-block"><strong id="userType"></strong></span> 
					</ul>
				</div>
				<button type="submit" class="button-cta button-lrg center">Continue</button>
			</div>
		</form>
	</div>
</div>


<!-- This block for ajaxlogin -->
<div class="md-modal md-effect-3 common-form" id="modal-5">
	<div class="md-content login-popup">
		<button class="md-close">x</button>
		<form action="{{url('/login')}}" method="POST" id="loginForm" novalidate>
			{{ csrf_field() }}
			<div id="general-ajax-load" class="login-loader" style="display:none">{!! Html::image('assets/userpanel/images/loading.gif') !!}</div>
			<div class="already-have-account">
				<p>Don’t have an account?<a class="sign-up-link" href="javascript:;">Sign Up</a></p>
				<p>Login</p>
			</div>
			
			<div class="common-inner-form">
				<div class="form-group" id="login-errors">
					<span class="help-block">
						<strong id="form-login-errors"></strong>
					</span>
				</div>

				<div class="form-group" id="email-div">
					<label class="control-label" for="email">Email</label>
					<input id="email" type="email" placeholder="" title="Please enter you email" required value="" name="email" class="form-control">
					<span class="help-block">
					<strong id="form-errors-email"></strong>
					</span>
				</div>
				<div class="form-group" id="password-div">
					<label class="control-label" for="password">Password</label>
					<input type="password" title="Please enter your password" placeholder="" required value="" name="password" id="password" class="form-control">
					<span class="help-block">
					<strong id="form-errors-password"></strong>
					</span>
				</div>
				<span>
					<button class="button-cta button-lrg center">Log In</button>
					<p class="forgot-password">Forgot Password ?</p>
				</span>
			</div>
		</form>
	</div>
</div>
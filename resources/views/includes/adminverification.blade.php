<div class="md-modal md-effect-3 common-form" id="@if((Auth::user()->profile_completion < 100) || (Auth::user()->status != 'verified')){{'admin-verification'}}@endif" >
    <div class="md-content login-popup">
        <button class="md-close">x</button>
        <form id="adminveri-form" class="drp-lst" action="" method='post'>
            <!-- <h1 style="">Sign Up</h1> -->
            <div id="general-ajax-load" class="login-loader"
                 style="display:none">{!! Html::image('assets/userpanel/images/loading.gif') !!}</div>

            <div class="already-have-account">
                <p><a class="sign-up-link" href="javascript:;">Law App Pay</a></p>
            </div>
            <div class="common-inner-form">
				<span>
					<h4 style="font-size:20px;text-align:center; max-width:; color: #8b8b8b; margin: 15px auto;text-transform: inherit; line-height: 28px;">
                    @if(Auth::user()->status == 'unverified')
                        {{ 'Not verified by admin yet' }}
                    @endif
                    <br>
                    @if(Auth::user()->profile_completion < 100)
                        {{ 'Please make your profile 100%' }}
                    @endif
                    </h4>
				</span>
				<span>
				<div>
                    <button id="admin-veri-button" class="button-cta  button-lrg center" style="width:30%;">Ok</button>
                </div>
				</span>
            </div>

        </form>
    </div>
</div>

<script>
    $('#adminveri-form').submit(function (e) {
        e.preventDefault();
    });

</script>
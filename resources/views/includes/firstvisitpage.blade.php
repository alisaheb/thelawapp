<div class="md-modal md-effect-3 common-form  @if(Auth::user()->profile_completion < 100){{'md-show'}}@endif" id="firstvisitpop_one"> 
    <div class="md-content login-popup">
        <button class="md-close">x</button>
        <form id="visitcase_one" class="drp-lst" action="" method='post'>
            <!-- <h1 style="">Sign Up</h1> -->
            <div id="general-ajax-load" class="login-loader" style="display:none">
                {!! Html::image('assets/userpanel/images/loading.gif') !!}
            </div>
            <div class="already-have-account">
                <p><a class="sign-up-link" href="javascript:;">Welcome to The Law App</a></p>
            </div>
            <div class="common-inner-form">
                <span>
                    {!! Html::image('assets/userpanel/images/step1.png','',['style' => 'margin:auto; max-width:80%;display:block;']) !!}
                    <h2 style="font-size:28px;text-align:center; max-width:70%;color: #8b8b8b; margin: auto;text-transform: inherit; line-height: 36px;">
                        Hi {{Auth::user()->fname}}, Lets get started</h2>
                    <h4 style="font-size:20px;text-align:center; max-width:; color: #8b8b8b; margin: 15px auto;text-transform: inherit; line-height: 28px;">
                        Step 1: @if(Auth::user()->type =='client') {{ "Tell us what you need done." }} @else {{ "Tell Us About Yourself"}} @endif </h4>
                    <p style="font-size:16px;text-align:center; max-width:; color: #8b8b8b; margin: auto;text-transform: inherit; line-height: 24px;">
                        @if(Auth::user()->type =='client') {{ "Post Your Legal Matter And Receive Quality Legal Assitance." }} @else {{ "Provide a brief outline of your area of expertise and experience in law"}} @endif
                    </p>
                </span>
                <span>
                    <button id="" class="button-cta button-lrg center">Next</button>
                </span>
            </div>
        </form>
    </div>
</div>

<div class="md-modal md-effect-3 common-form" id="firstvisitpop_two">
    <div class="md-content login-popup">
        <button class="md-close">x</button>
        <form id="visitcase_two" class="drp-lst" action="" method='post'>
            <!-- <h1 style="">Sign Up</h1> -->
            <div id="general-ajax-load" class="login-loader"
                 style="display:none">{!! Html::image('assets/userpanel/images/loading.gif') !!}</div>
            <div class="already-have-account">
                <p><a class="sign-up-link" href="javascript:;">How it works</a></p>
            </div>
            <div class="common-inner-form">
                <span>
                    @if(Auth::user()->type=='lawyer')
                        {!! Html::image('assets/userpanel/images/lawyerstep2.jpg','',['style' => 'margin:auto;max-width:70%; float:; display:block;']) !!}
                    @endif

                    @if(Auth::user()->type=='client')
                        {!! Html::image('assets/userpanel/images/client-step2.jpg','client image',['style' => 'margin:auto;max-width:70%; float:; display:block;']) !!}
                    @endif
                    <h4 style="font-size:20px;text-align:center; max-width:; color: #8b8b8b; margin: 15px auto;text-transform: inherit; line-height: 28px;">
                        Step 2:  @if(Auth::user()->type =='client') {{ "Choose The Best Legal Advisor For The Task." }} @else {{ "Verify your legal experience"}} @endif</h4>
                    <p style="font-size:16px;text-align:center; max-width:; color: #8b8b8b; margin: auto;text-transform: inherit; line-height: 24px;">
                        
                        @if(Auth::user()->type =='client') {{ "Verified Lawyers and Legal Experts will offer to complete your task and provide time frames. You will receive these new offers shortly." }} @else {{ "Upload your qualifications and provide your practicing certification documents"}} @endif
                    </p>
                </span>
                <span>
                    <button id="" class="button-cta button-lrg center">Next</button>
               
                </span>
            </div>
        </form>
    </div>
</div>

<div class="md-modal md-effect-3 common-form" id="firstvisitpop_three">
    <div class="md-content login-popup">
        <button class="md-close">x</button>
        <form id="visitcase_three" class="drp-lst" action="" method='post'>
            <!-- <h1 style="">Sign Up</h1> -->
            <div id="general-ajax-load" class="login-loader"
                 style="display:none">{!! Html::image('assets/userpanel/images/loading.gif') !!}</div>
            <div class="already-have-account">
                <p><a class="sign-up-link" href="javascript:;">Law App Pay</a></p>
            </div>
            <div class="common-inner-form">
                <span>
                    {!! Html::image('assets/userpanel/images/step3.png','',['style' => 'margin:auto;max-width:70%; float:; display:block;']) !!}
                    <h4 style="font-size:20px;text-align:center; max-width:; color: #8b8b8b; margin: 15px auto;text-transform: inherit; line-height: 28px;">
                        Step @if(Auth::user()->type =='client') {{ " 3: Pay securely and get it done." }} 
                            @else {{ " 4: Provide your payment details"}} @endif
                    </h4>
                    <p style="font-size:16px;text-align:center; max-width:; color: #8b8b8b; margin: auto;text-transform: inherit; line-height: 24px;">
                    @if(Auth::user()->type =='client') 
                        {{ "Pay securely and get the job done right. Once you reach a milestone, release funds and stay informed." }} 
                        @else {{ "Get paid directly into your account quickly by providing your bank details"}} 
                    @endif
                        
                    </p>
                </span>
                <span>
                    <button id="fvisit_three" class="button-cta button-lrg center">
                        Dashboard
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>

@if(Auth::user()->type =='lawyer')
<div class="md-modal md-effect-3 common-form" id="firstvisitpop_pricing">
    <div class="md-content login-popup">
        <button class="md-close">x</button>
        <form id="visitcase_pricing" class="drp-lst" action="" method='post'>
            
            <div id="general-ajax-load" class="login-loader"
                 style="display:none">{!! Html::image('assets/userpanel/images/loading.gif') !!}</div>
            <div class="already-have-account">
                <p><a class="sign-up-link" href="javascript:;">Law App Pay</a></p>
            </div>
            <div class="common-inner-form">
                <span>
                    
                   {!! Html::image('assets/userpanel/images/pricing.jpg','',['style' => 'margin:auto;max-width:70%; float:; display:block;']) !!}
                
                  <h2 style="font-size:20px;text-align:center; max-width:70%;color: #8b8b8b; margin: auto;text-transform: inherit; line-height: 36px;">Step 3: Select your membership package</h2>
                 <p style="font-size:16px;text-align:center; max-width:; color: #8b8b8b; margin: auto;text-transform: inherit; line-height: 24px;">Choose a package that suits your needs</p></span>
                <span>
                    <button class="button-cta button-lrg center" style="width:48%;">
                        Next
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
@endif
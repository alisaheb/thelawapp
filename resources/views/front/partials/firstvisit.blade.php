<!--Modal 1-->
<div id="modal1" class="modal modal-1" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="upload">
                                <h4 class="popup-heading">Welcome to The Law App</h4>
                                {{ Html::image('assets/front/img/step1.png') }}
                                <h2> Hi {{Auth::user()->fname}}, Let's get started</h2>
                                <h3>Step 1:  @if(Auth::user()->type =='client') {{ "Tell us what you need done." }} @else {{ "Tell Us About Yourself"}} @endif</h3>
                                <p class="popup-heading-text">@if(Auth::user()->type =='client') {{ "Post Your Legal Matter And Receive Quality Legal Assitance." }} @else {{ "Provide a brief outline of your area of expertise and experience in law"}} @endif</p>
                                <div class="sbtn">
                                    <button id="btn1" class="btn btn-primary" data-toggle="modal" data-target=".modal.modal-3" data-dismiss="modal">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!--Modal 2-->
<div id="modal2" class="modal modal-3" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="upload">
                                <h4 class="popup-heading">How it works</h4>
                                {{ Html::image('assets/front/img/lawyerstep2.jpg') }}
                                <h3>Step 2:  @if(Auth::user()->type =='client') 
                                    {{ "Choose The Best Legal Advisor For The Task." }} @else {{ "Verify your legal experience"}} 
                                    @endif
                                </h3>
                                <p class="popup-heading-text">
                                    @if(Auth::user()->type =='client') 
                                    {{ "Verified Lawyers and Legal Experts will offer to complete your task and provide time frames. You will receive these new offers shortly." }} @else {{ "Upload your qualifications and provide your practicing certification documents"}} 
                                    @endif
                                </p>
                                <div class="sbtn">
                                    <button id="btn2" class="btn btn-primary" data-toggle="modal" data-target=".modal.modal-4" data-dismiss="modal">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Modal 3-->
<div id="modal4" class="modal modal-4" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="upload">
                                <h4 class="popup-heading">Law App Pay</h4>
                                {{ Html::image('assets/front/img/pricing.jpg') }}
                                <h3>Step 3: Select your membership package</h3>
                                <p class="popup-heading-text">Choose a package that suits your needs</p>
                                <div class="sbtn">
                                    <button id="btn3" class="btn btn-primary" data-toggle="modal" data-target=".modal.modal-5" data-dismiss="modal">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!--Modal 4-->
<div id="modal5" class="modal modal-5" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="upload">
                                <h4 class="popup-heading">Law App Pay</h4>
                                {{ Html::image('assets/front/img/step3.png') }}
                                <h3>Step @if(Auth::user()->type =='client') {{ " 3: Pay securely and get it done." }} 
                                    @else {{ " 4: Provide your payment details"}} @endif
                                </h3>
                                <p class="popup-heading-text"> @if(Auth::user()->type =='client') 
                                    {{ "Pay securely and get the job done right. Once you reach a milestone, release funds and stay informed." }} 
                                    @else {{ "Get paid directly into your account quickly by providing your bank details"}} 
                                    @endif
                                </p>
                                <div class="sbtn">
                                    <button id="btn4" class="btn btn-primary" data-toggle="modal" data-target=".modal.modal-2" data-dismiss="modal">Dashboard</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!--Modal 5-->
<div id="modal" class="modal modal-2" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme dashslider" id="carouselpopup">
                    @if(empty(Auth::user()->profile_image))
                    <div class="item">
                        <div class="upload">
                            <h4 class="popup-heading">Upload a profile picture</h4>
                            <p class="popup-heading-text">Upload a clear photo of yourself to help people identify you from other users, and also gain trust.</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%">
                                    <span class="sr-only">{{$percentage}}% Complete</span>
                                </div>
                            </div>
                            <form id="upload-image-popup" class="drp-lst" action="uploadimage" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <figure>
                                    {{ Html::image('assets/front/img/profile.png','',['class' => 'profile_pic','id'=>'imagePreview_one','width' => '195px']) }}
                                </figure>
                                <label id="image" for="pic">
                                <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                </label>
                                <input style="display:none" type="file" id="pic" name="pofile_pic" accept="image/*">
                                <span style="display:block">
                                <button  style="display:none" id="image-upload" class="button-lrg center btn btn-success" type="submit">Upload Image</button>
                                </span>
                            </form>
                        </div>
                    </div>
                    @endif
                    @if(empty(Auth::user()->contact))
                    <div class="item">
                        <div class="upload">
                            <h4 class="popup-heading">Mobile Number</h4>
                            <p class="popup-heading-text">Provide your mobile number and we'll keep you posted on the status of your legal updates via text message.</p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$percentage}}%" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%%">
                                    <span class="sr-only">{{$percentage}}% Complete</span>
                                </div>
                            </div>
                            <form id="number-verification" class="" action="" method='post'>
                                <input id="token-verify" type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="main-area">
                                    <div class="verify">
                                        <h4>Enter your mobile number</h4>
                                        <span><i class="mobile-code">+61 </i>
                                        <input id="verifie-mobile" name="verifiemobile" value="" type="text" style="padding-left:40px;">
                                        <img src="http://laww.com.au/assets/userpanel/images/australian_flag.png" class="flag" alt="">
                                        <button id="send-verification" class="button-cta button-lrg center register"  data-toggle="modal" data-target=".modal.modal-mv">Send Verification Code</button></span>
                                    </div>
                            <div class="mobile-footer">
                                        <h4>Code by voice</h4>
                                        <p>This will allow you to make or recieve call when you are engaged in a task</p>
                                        <p>We never display your mobile number. Calls are connected and you will recieve calls directly to your mobile.</p>
                                        <p>Enable Calls free ?</p>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-success">
                                            <input type="checkbox" autocomplete="off">
                                            <span class="glyphicon glyphicon-ok"></span>
                                            </label>
                                            <span class="title">Yes</span>
                                        </div>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-success">
                                            <input type="checkbox" autocomplete="off">
                                            <span class="glyphicon glyphicon-ok"></span>
                                            </label>
                                            <span class="title">No</span>
                                        </div>
                            </form>
                            </div>
                            </div>
                            </div>
                            </div>
                            @endif
                            @if(Auth::user()->type=='lawyer')
                            @if(!isset($account->account_holder_name))
                            <div class="item">
                                <div class="upload">
                                    <h4 class="popup-heading">Enter your payment details</h4>
                                    <p class="popup-heading-text">Adding your bank details allows us to make payment for matters you handle.</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$percentage}}%" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%">
                                            <span class="sr-only">{{$percentage}}% Complete</span>
                                        </div>
                                    </div>
                                    <div class="main-area">
                                        <form action="{{url('accountdetails')}}" method='post'>
                                            <input id="acnt-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group acntholder">
                                                <label for="acntholder">Account Holder Name</label>
                                                <input type="text" class="form-control" id="acntholder" name="acntholder">
                                            </div>
                                            <div class="form-group bsb">
                                                <label for="bsb">Bank State Branch</label>
                                                <input type="text" class="form-control" id="bsb" name="bsb" >
                                            </div>
                                            <div class="form-group acntnumber">
                                                <label for="acntnumber">Account Number</label>
                                                <input type="number" class="form-control" id="acntnumber" name="acntnumber" >
                                            </div>
                                            <div id="accountdetails"></div>
                                            <div class="sbtn">
                                                <button type="submit" class="btn btn-default" id="add-bank-account">Add Bank Account</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif
                            @if(!Auth::user()->description)  
                            <div class="item">
                                <div class="upload">
                                    <h4 class="popup-heading"> @if(Auth::user()->type =='client') {{ "Outline Your Legal Matter." }} 
                                        @else {{ "Outline your experience in the legal industry"}} @endif
                                    </h4>
                                    <p class="popup-heading-text"> @if(Auth::user()->type =='client') {{ "Please provide a brief outline of yourself. You will describe your legal matter when you post the job." }} 
                                        @else {{ "Please provide a brief outline of yourself including your experience in the legal industry. You should describe your work history and focus of expertise in law."}} @endif
                                    </p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%">
                                            <span class="sr-only">{{$percentage}}% Complete</span>
                                        </div>
                                    </div>
                                    <div class="main-area legal">
                                        <form>
                                            <div class="form-group">
                                                <textarea class="form-control"  @if(Auth::user()->type =='client') placeholder="{{ 'I am Australian and work in the telecomunications industry as a Senior Manager. I have 3 kids and a dog. I enjoy reading and swimming.' }}" 
                                                @else placeholder="{{ 'I have been a practicing criminal lawyer for 12 years and have worked in both Australia and England. I have rich experience in many areas of criminal law including assault, drink driving and financial crimes. Please download my resume for detailed experience and work history.' }}" @endif rows="10" cols="50"></textarea>
                                            </div>
                                            <div class="sbtn">
                                                <button type="submit" class="btn btn-default">Add Description</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(Auth::user()->type!='client')
                            @if(!Auth::user()->skills) 
                            <div class="item">
                                <div class="upload">
                                    <h4 class="popup-heading">Outline your experience in the legal industry</h4>
                                    <p class="popup-heading-text">Please provide a brief outline of yourself including your experience in the legal industry. You should describe your work history and focus of expertise in law.</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%">
                                            <span class="sr-only">{{$percentage}}% Complete</span>
                                        </div>
                                    </div>
                                    <div class="main-area skills">
                                        <form class="skills-form" action="addskills" method='post'>
                                            <input id="acnt-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="row">
                                                @foreach($categories as $category)
                                                <div class="col-md-6">
                                                    <div class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-success">
                                                        <input type="checkbox" autocomplete="off" name="skills" id ="skills-{{$category->id}}" class="eachSkill" value="{{ $category->name }}">
                                                        <span class="glyphicon glyphicon-ok"></span>
                                                        </label>
                                                        <span class="title">{{ $category->name }}</span>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div id="addskills"></div>
                                            <div class="sbtn">
                                                <button type="submit" id="add-skills" class="btn btn-default">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif
                            @if(Auth::user()->type =='lawyer')
                            <div class="item">
                                <div class="upload">
                                    <h4 class="popup-heading">Upload your certificates</h4>
                                    <p class="popup-heading-text"></p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%">
                                            <span class="sr-only">{{$percentage}}% Complete</span>
                                        </div>
                                    </div>
                                    <div class="main-area certificate">
                                        <form  id ="add-certificate" action="{{url('add-certificate')}}" method='post' enctype="multipart/form-data">
                                            <input id="acnt-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group name-div">
                                                <label for="name">Certificate Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                                                <strong class="name-error"></strong>
                                                @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group certificate-div">
                                                <label for="file">Browse certificate</label>
                                                <input type="file" class="form-control certificate" id="file" name="certificate" placeholder="">
                                                <strong class="certificate-error"></strong>
                                                @if ($errors->has('certificate'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('certificate') }}</strong>
                                                </span>
                                                @endif  
                                            </div>
                                            <div class="sbtn">
                                                <button type="submit" class="btn btn-default" id="submitCertificate">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="item">
                                <div class="upload">
                                    <h4 class="popup-heading">Check out available work Lawyer</h4>
                                    <p class="popup-heading-text">Browse Tasks to see thousands of available tasks in your are. search via keyword to select tasks that your intersted in. Laywer</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="{{$percentage}}" style="width: {{$percentage}}%">
                                            <span class="sr-only">{{$percentage}}% Complete</span>
                                        </div>
                                    </div>
                                    <div class="main-area hundred">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                        <div class="sbtn">
                                            <button type="submit" class="btn btn-default" data-dismiss="modal">Make Your Profile 100%</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->




<div id="verifymob" class="md-modal md-effect-3 common-form modal modal-mv" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="upload md-content login-popup">
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
                <span class="error code-error">Please enter the code number.</span>
                </span>
                <span>
                    <button id="send-code" class="button-cta button-lrg center">Send</button>
                    <p class="resend-code"><a href="javascript::void">Resend Code</a></p>
                </span>
            </div>
        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
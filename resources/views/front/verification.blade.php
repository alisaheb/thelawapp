@extends('layouts.front')
@section('title','The law app')
@section('content')
<div class="container inner_content">
    <div class="row">
        <!-- Left Dashboard Area-->
        <div class="col-md-2 bashboard_left">
            @include('front.partials.sidebar')
        </div>
        <!-- Right Dashboard Area-->
        <div class="col-md-10">
            <div class="dashboard-right">
                <div class="dash-title">
                    <h2> Verify your identity</h2>
                    <hr>
                </div>
                <!-- Right Area-->
                <div class="verification-container">
                    <p>Verifications help to build trust in our community and help give you more information when deciding who to work with on a task. Verifications icons and badges are issued when specific requirements are met. See below for more information.</p>
                    <div class="row">
                        <h4 class="id">Identification Detail</h4>
                        <div class="col-md-6">
                            <div class="mobile-v v-box">
                                {{ Html::image('assets/front/img/smartphone.png') }}
                                <h5>Mobile Verification</h5>
                                <p>It’s completely free to post a task, you’ll start receiving offers from Law App. There’s no hidden fees.</p>
                                <div class="sbtn">
                                    <button type="submit" class="btn btn-default" data-toggle="modal" data-target=".modal.mobile-modal">Add</button>
                                </div>
                            </div>
                            <div class="police-v v-box">
                                {{ Html::image('assets/front/img/security-badge.png') }}
                                <h5>Police Check Badge</h5>
                                <p>Provide peace of mind to other members by successfully completing a Police Check.</p>
                                <div class="sbtn">
                                    <button type="submit" class="btn btn-default">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="badge-v v-box">
                                {{ Html::image('assets/front/img/badge.png') }}
                                <h5>Law App Pro Badge</h5>
                                <p>Earn this Badge by completing a questionnaire interview, which is reviewed by our Customer Support Team.</p>
                                <div class="sbtn">
                                    <button type="submit" class="btn btn-default">Add</button>
                                </div>
                            </div>
                            <div class="card-v v-box">
                                {{ Html::image('assets/front/img/credit-card.png') }}
                                <h5>Credit Card</h5>
                                <p>Receive or make payments with ease by having your payment method verified.</p>
                                <div class="sbtn">
                                    <button type="submit" class="btn btn-default" data-toggle="modal" data-target=".modal.credit-modal">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="certificate-v v-box">
                                {{ Html::image('assets/front/img/certificate.png') }}
                                <h5>Certificates</h5>
                                <p>Add Here Your Educational Certificates</p>
                                <div class="sbtn">
                                    <button type="submit" class="btn btn-default" data-toggle="modal" data-target=".modal.certificate-modal">Add</button>
                                </div>
                                
<!--Certificate Image Box-->
<div class="row certificate_box">
    <div class="col-md-3">
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
            <img src="http://www.getcertificatetemplates.com/wp-content/uploads/2015/05/Golden-Formal-Award-Certificate-Template-Preview.png" alt="certificate-name">
        </a>
    </div>

    <div class="col-md-3">
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
            <img src="https://s-media-cache-ak0.pinimg.com/originals/3f/58/0a/3f580a44ce01baabba0d250ba578b460.jpg" />
        </a>
    </div>

    <div class="col-md-3">
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
            <img src="http://image.shutterstock.com/z/stock-vector-vector-certificate-template-and-gold-seal-easy-to-edit-and-scale-58815595.jpg" />
        </a>
    </div>

    <div class="col-md-3">
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox">
            <img src="http://postermywall.com.s3.amazonaws.com/posterpreviews/b55cf11abcb000b3446a0eabd5883a8d_screen.jpg?ts=1458352219" />
        </a>
    </div>
</div>
</div>

<div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="modal-content">
            <div class="modal-body">
                <img src="" alt="" />
            </div>
        </div>
    </div>
</div>





                        
                            </div>
                            
                       
                        
                    </div>
                    <div class="row">
                        <div class="social-v">
                            <h4 class="social">Social</h4>
                            <div class="col-md-6">
                                <div class="facebook-v v-box">
                                    {{ Html::image('assets/front/img/fb.png') }}
                                    <h5>Facebook</h5>
                                    <p>It’s completely free to post a task, you’ll start receiving offers from Law App. There’s no hidden fees.</p>
                                    <div class="sbtn">
                                        <button type="submit" class="btn btn-default" data-toggle="modal" data-target=".modal.facebook-modal">Add</button>
                                    </div>
                                </div>
                                <div class="twitter-v v-box">
                                    {{ Html::image('assets/front/img/tw.png') }}
                                    <h5>Twitter</h5>
                                    <p>Earn this Badge by completing a questionnaire interview, which is reviewed by our Customer Support Team.</p>
                                    <div class="sbtn">
                                        <button type="submit" class="btn btn-default" data-toggle="modal" data-target=".modal.twitter-modal">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="linkedin-v v-box">
                                    {{ Html::image('assets/front/img/in.png') }}
                                    <h5>LinkedIn</h5>
                                    <p>Provide peace of mind to other members by successfully completing a Police Check.</p>
                                    <div class="sbtn">
                                        <button type="submit" class="btn btn-default" data-toggle="modal" data-target=".modal.link-modal">Add</button>
                                    </div>
                                </div>
                                <div class="googleplus-v v-box">
                                    {{ Html::image('assets/front/img/gp.png') }}
                                    <h5>Credit Card</h5>
                                    <p>Earn this Badge by completing a questionnaire interview, which is reviewed by our Customer Support Team.</p>
                                    <div class="sbtn">
                                        <button type="submit" class="btn btn-default" data-toggle="modal" data-target=".modal.gp-modal">Add</button>
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
<!--All PopUp-->
<!--Mobile Veryfy Modal-->
<div id="mobile-md" class="modal fade mobile-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
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
                                <h4 class="popup-heading">Mobile Number</h4>
                                <p class="popup-heading-text">Provide your mobile number and we'll keep you posted on the status of your legal updates via text message.</p>
                                <form id="number-verification" class="" action="" method='post'>
                                    <input id="token-verify" type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="main-area">
                                        <div class="verify">
                                            <h4>Enter your mobile number</h4>
                                            <span><i class="mobile-code">+61 </i>
                                            <input id="verifie-mobile" name="verifiemobile" value="" type="text" style="padding-left:40px;">
                                            <img src="http://laww.com.au/assets/userpanel/images/australian_flag.png" class="flag" alt="">
                                            <button id="send-verification" class="button-cta button-lrg center register"  data-toggle="modal" data-target=".modal.modal-mob">Send Verification Code</button></span>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->






<div id="verifymob" class="fade md-modal md-effect-3 common-form modal modal-mob" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
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
                <span class="error code-error">Please enter  verification code.</span>
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









<!--Credit Card Modal-->
<div id="credit-md" class="modal fade credit-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
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
                                <h4 class="popup-heading">Enter your payment details</h4>
                                <p class="popup-heading-text">Adding your credit card details allows us to charge payment for matters you receve help with.</p>
                                <div class="main-area">
                                    <div class="credit-mod-container">
                                        <form role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label class="control-label " for="f-name">Name on Card</label>
                                                <input class="form-control" id="name" name="name" placeholder="Jhon" type="text" required />
                                            </div>
                                            <div class="form-group card-no">
                                                <label class="control-label " for="l-name">Card Number</label>
                                                <input class="card-number form-control" id="name" name="name" placeholder="1234 5678 9101 1231" type="text" />
                                                {{ Html::image('assets/front/img/credit_cards.png') }}
                                            </div>
                                            <div class="form-group card-ex">
                                                <label class="control-label" for="f-name">Expiry Date</label>
                                                <input class="card-month form-control" id="name" name="name" placeholder="MM" type="text" required />
                                                <input class="card-year form-control" id="name" name="name" placeholder="YY" type="text" />
                                            </div>
                                            <div class="form-group card-cv">
                                                <label class="control-label " for="f-name">CVC</label>
                                                <input class="card-cvc form-control" id="name" name="name" placeholder="123" type="text" required />
                                            </div>
                                            <div class="form-group card-sub">
                                                <button type="submit" class="btn btn-default">Submit</button>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--certificate-modal Modal-->
<div id="certificate-md" class="modal fade certificate-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
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
                                <h4 class="popup-heading">Upload your certificates</h4>
                                <p class="popup-heading-text">Certificates will be publicly visible after admin approve.</p>
                                <div class="main-area">
                                    <div class="credit-mod-container">
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
<!--Facebook Modal-->
<div id="facebook-md" class="modal fade facebook-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
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
                                <h4 class="popup-heading">Add Your Facebook Profile Link</h4>
                                <p class="popup-heading-text">Certificates will be publicly visible after admin approve.</p>
                                <div class="main-area">
                                    <div class="credit-mod-container">
                                        <form role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label class="control-label " for="f-name">Profile Link</label>
                                                <input class="form-control" id="name" name="name" type="text" required />
                                            </div>
                                            <div class="form-group card-sub">
                                                <button type="submit" class="btn btn-default">Submit</button>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Twitter Modal-->
<div id="twitter-md" class="modal fade twitter-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
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
                                <h4 class="popup-heading">Add Your Twitter Profile Link</h4>
                                <p class="popup-heading-text">Certificates will be publicly visible after admin approve.</p>
                                <div class="main-area">
                                    <div class="credit-mod-container">
                                        <form role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label class="control-label " for="f-name">Profile Link</label>
                                                <input class="form-control" id="name" name="name" type="text" required />
                                            </div>
                                            <div class="form-group card-sub">
                                                <button type="submit" class="btn btn-default">Submit</button>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--LinkedIn Modal-->
<div id="link-md" class="modal fade link-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
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
                                <h4 class="popup-heading">Add Your LinkedIn Profile Link</h4>
                                <p class="popup-heading-text">Certificates will be publicly visible after admin approve.</p>
                                <div class="main-area">
                                    <div class="credit-mod-container">
                                        <form role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label class="control-label " for="f-name">Profile Link</label>
                                                <input class="form-control" id="name" name="name" type="text" required />
                                            </div>
                                            <div class="form-group card-sub">
                                                <button type="submit" class="btn btn-default">Submit</button>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Google Plus Modal-->
<div id="gp-md" class="modal fade gp-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
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
                                <h4 class="popup-heading">Add Your Google Plus Profile Link</h4>
                                <p class="popup-heading-text">Certificates will be publicly visible after admin approve.</p>
                                <div class="main-area">
                                    <div class="credit-mod-container">
                                        <form role="form" data-toggle="validator">
                                            <div class="form-group">
                                                <label class="control-label " for="f-name">Profile Link</label>
                                                <input class="form-control" id="name" name="name" type="text" required />
                                            </div>
                                            <div class="form-group card-sub">
                                                <button type="submit" class="btn btn-default">Submit</button>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
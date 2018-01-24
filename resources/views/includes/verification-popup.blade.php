<div class="md-modal md-effect-3 common-form" id="veri-mobile-popup">
    <div class="md-content on-registration">
        <button class="md-close">x</button>
        <div class="item">
            <h2 class="popup-heading">Mobile Number</h2>
            <p class="popup-heading-text">Provide your mobile number and we'll keep you posted on the status of your legal updates via text message.</p>
            <div class="progressbar">
            </div>
            <form id="number-verification" class="" action="" method='post'>
                <div id="general-ajax-load" class="num-loader" style="display:none"><img
                    src="{{asset('assets/userpanel/images/loading.gif')}}"/></div>
                <div class="common-inner-form mobile-popup">
                    <input id="token-verify" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <span>
                        <h4>Enter your mobile number</h4>
                        <span><i style="    display: inline-block;
                            float: left;
                            position: absolute;
                            left: 45px;
                            margin-top: 7px;">+61 </i>
                        <input id="verifie-mobile" name="verifiemobile" value="" type="text"
                            style="max-width: 200px; padding-left:40px;">
                        <img class="flag" src="{{asset('assets/userpanel/images/australian_flag.png')}}" style="">
                        <button id="send-verification" class="button-cta button-lrg center register">Send Verification Code
                        </button></span><span class="profile-error verify-error">Enter the number first </span>
                        <span class="profile-error mobile-error">Invalid number, please try again. </span>
                        <span class="profile-error verification-success">Number verification Succefull. </span>
                    </span>
                    <span>
                        <h4>Code by voice</h4>
                        <p>This will allow you to make or recieve calls in relation to your matter.</p>
                        <p>We never display your mobile number. Calls are connected via The Law App and you will recieve calls directly to your mobile.</p>
                        <p>Enable The Law App Free Calls?</p>
                        <a href="#" class="mobile-yes selecte">Yes</a>
                        <a href="#" class="mobile-no">No</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="md-modal md-effect-3 common-form" id="credit-card-popup">
    <div class="md-content on-registration">
        <button class="md-close">x</button>
        <div class="item">
            <h2 class="popup-heading">Enter your payment details</h2>
            <span class="popup-heading  after-submit profile-error">Detail entered succefully</span>
            <p class="popup-heading-text">Adding your credit card details allows us to charge payment for matters you receve help with.</p>
            <div class="progressbar">
            </div>
            <span class="success" style="color:red; display:none">Detail added succefully</span>
            <form class="userprofile-addcard-popup" action="{{url('accountdetails')}}" method='post'>
                <div id="general-ajax-load" class="bsbpopup" style="display:none">
                    <img src="{{asset('assets/userpanel/images/loading.gif')}}"/>
                </div>
                <input id="acnt-token" type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="common-inner-form">
                    <div class="anchovy-credit-card-input anchovy-form" id="update_card">
                        <span class="cvv-error" style="color:red"></span>
                        <div class="anchovy-form-item-small">
                            <label>Name on Card</label>
                            <input type="text" class="nameoncard" required placeholder="John">
                        </div>
                        <div class="anchovy-form-item-small"><label>Card Number</label>
                            <input type="number" required class="number-input card-num"
                                placeholder="1234 5678 9101 1231">
                            <img src="{{asset('assets/userpanel/images/credit_cards.png')}}"
                                alt="Currently only VISA or Mastercard credit cards accepted"
                                title="Currently only VISA or Mastercard credit cards accepted"
                                class="credit-card-logos">
                        </div>
                        <div class="expiry-input anchovy-form-item-small">
                            <label>Expiry Date</label>
                            <input type="number" class="card-month" placeholder="MM" required>
                            <input type="number" class="card-year" placeholder="YY" required>
                        </div>
                        <div class="cvc-input anchovy-form-item-small">
                            <label>CVC</label><input class="popcvc" placeholder="123" required maxlength="4">
                            <div class="anchovy-question">
                                <span></span>
                                <div class="answer">
                                    <p>CVC provides an additional level of online fraud protection. The number is
                                        located on the back of your credit card and is generally three to four digits
                                        long.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="anchovy-form-item-small" style="margin-top:30px;">
                            <span>
                            <button class="button-cta button-lrg center ">Submit</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="md-modal md-effect-3 common-form" id="veri-certificate-popup">
    <div class="md-content on-registration">
        <button class="md-close">x</button>
        <div class="item">
            <h2 class="popup-heading">Upload your certificates</h2>
            <p class="popup-heading-text">Certificates will be publicly visible after admin approve.</p>
            <div class="progressbar">
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
    </div>
</div>
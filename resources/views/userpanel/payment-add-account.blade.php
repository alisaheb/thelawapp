@include('includes.head')

</head>

<body>
<div id="fb-root"></div>

<div id="app-container" class="inner-common-page">
    <div id="lawyer-app" class="payment-methods-page">
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
                                 src="{{url('../profile_images')}}/{{Auth::user()->profile_image}}">
                        @else
                            <img src="{{asset('userpanel/images/image-icon.png')}}">                        @endif

                        <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                    </div>
                    @include('includes.dashboardlinks')
                </div>
                <div class="right-side">
                    <h3 class="inner-page-headings">Payment Methods</h3>

                    <div class="page-form">
                        <div class="make-payments">
                            <!--	<span>
        <a href="#">Make Payments</a>
        <a href="#">Receive Payments</a>
    </span> -->
                            <p>Once a task is completed, you will be able to request payment from the Job Poster, who
                                will then release the funds to your nominated bank or PayPal account. You must add a
                                bank account before you can add a Paypal account</p>
                        </div>

                        @if(empty($user) || empty($user->street_address))
                            <form action="" method="post" id="billing-address-form">

                                <div id="general-ajax-load" class="billing-address-load" style="display:none"><img
                                            src="{{asset('userpanel/images/loading.gif')}}"/></div>

                                {{ csrf_field() }}
                                <ul class="billing-address">
                                    <li>
                                        <p>Billing Address</p>
                                    </li>

                                    <li>
                                        <p>Your billing address will be verified before you can receive payments.</p>
                                    </li>

                                    <li>
                                        <p>Street Address</p>
                                        <input type="text" name="street" value="" required>
                                    </li>

                                    <li>
                                        <p>Street Post Code</p>
                                        <input type="text" name="postal" value="" required>
                                    </li>

                                    <li>
                                        <p>City</p>
                                        <input type="text" name="city" value="" required>
                                    </li>

                                    <li>
                                        <p>State</p>
                                        <input type="text" name="state" value="" required>
                                    </li>

                                    <li>
                                        <p>Country</p>
                                        <input type="text" name="country" value="" required>
                                    </li>

                                    <li class="button-section">
                                        <button id="add-billing-address">Add Billing Address</button>
                                    </li>
                                </ul>
                            </form>
                        @endif

                        <ul>
                            <li>
                                <p>For account verification purposes. Your address will never be shown publicly.</p>
                            </li>
                        </ul>


                        @if(empty($user) || empty($user->street_address))
                            <ul class="billing-address-two" style="display:none">
                                @else
                                    <ul class="billing-address-two">
                                        @endif


                                        <li>
                                            <p>Billing Address</p>
                                        </li>

                                        <li>
                                            <p>Your billing address will be verified before you can receive
                                                payments.</p>
                                        </li>

                                        <li>
                                            <span>Street Address: </span>
                                            <span class="billing-street">{{$user->street_address}}</span>
                                        </li>

                                        <li>
                                            <span>Street Post Code : </span>
                                            <span class="billing-post">{{$user->postal_code}}</span>
                                        </li>

                                        <li>
                                            <span>City : </span>
                                            <span class="biiling-city">{{$user->city}}</span>
                                        </li>

                                        <li>
                                            <span>State : </span>
                                            <span class="billing-state">{{$user->state}}</span>
                                        </li>

                                        <li>
                                            <span>Country : </span>
                                            <span class="billing-country">{{$user->country}}</span>
                                        </li>

                                        <li class="button-section">
                                            <button id="remove-billing-address">Remove</button>
                                        </li>
                                    </ul>


                                    <!---code for bank account details---->
                                    @if(empty($user) || empty($user->account_holder_name))
                                        <form class="bank-account-details" action="" method="post">

                                            <div id="general-ajax-load" class="bank-account-loader"
                                                 style="display:none"><img
                                                        src="{{asset('userpanel/images/loading.gif')}}"/></div>


                                            <ul class="bank-acnt-one">
                                                <li>
                                                    <p>Bank Account Details</p>
                                                </li>

                                                <li>
                                                    <p>Account Holder Name</p>
                                                    {{ csrf_field() }}
                                                    <input type="text" name="acntholder" value="" required>
                                                </li>

                                                <li>
                                                    <p>BSB</p>
                                                    <input type="text" name="bsb" value="" required>
                                                </li>

                                                <li>
                                                    <p>Account Number</p>
                                                    <input type="text" name="acntnumber" value="" required>
                                                </li>

                                                <li class="button-section">
                                                    <button>Add Details</button>
                                                </li>
                                            </ul>

                                        </form>
                                    @endif

                                    @if(empty($user) || empty($user->account_holder_name))
                                        <ul class="bank-acnt-two" style="display:none">
                                            @else
                                                <ul class="bank-acnt-two">
                                                    @endif
                                                    <li>
                                                        <p>Bank Account Details</p>
                                                    </li>

                                                    <li>
                                                        <span>Account Holder Name : </span>

                                                        <span class="holdrname">{{$user->account_holder_name}}</span>
                                                    </li>

                                                    <li>
                                                        <span>BSB : </span>
                                                        <span class="bbsb">{{$user->bsb}}</span>
                                                    </li>

                                                    <li>
                                                        <span>Account Number : </span>
                                                        <span class="anum">{{$user->account_number}}</span>
                                                    </li>

                                                    <li class="button-section">
                                                        <button id="remove-bank-acount">Remove</button>
                                                    </li>
                                                </ul>



                                                <!--  paypal email -->
                                                @if(empty($user) || empty($user->paypal_email))
                                                    <form class="paypal-mail-form" method="post">
                                                        {{csrf_field()}}
                                                        <ul class="paypal-mail-details">
                                                            <li>
                                                                <p>Paypal Details</p>
                                                                <input type="text" id="paypal-id" name="paypalmail"
                                                                       value="" required>
                                                            </li>

                                                            <li class="button-section">
                                                                <button class="paypal-email">Add Paypal Email</button>
                                                            </li>

                                                            <li>
                                                                <p>Paypal may charge additional transaction fees upon
                                                                    receipt of funds.</p>
                                                            </li>
                                                        </ul>
                                                    </form>
                                                @endif

                                                @if(empty($user) || empty($user->paypal_email))
                                                    <ul class="paypal-mail-details-two" style="display:none">
                                                        @else
                                                            <ul class="paypal-mail-details-two">
                                                                @endif

                                                                <li>Paypal Details</li>
                                                                <li><b>Paypal Email </b>:<span
                                                                            class='pemail'>{{$user->paypal_email}}</span>
                                                                </li>
                                                                <li>
                                                                    <p>Paypal may charge additional transaction fees
                                                                        upon receipt of funds.</p>
                                                                </li>
                                                                <li class="button-section">
                                                                    <button class="remove-paypal-email">Remove Paypal
                                                                        Email
                                                                    </button>
                                                                </li>
                                                            </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="static-page-content"></div>
</div>
</div>
</div>

<script src="{{asset('userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('userpanel/js/popup-modal.js')}}"></script>
<script src="{{asset('userpanel/js/custom.js')}}"></script>
<script src="{{asset('userpanel/js/verify.js')}}"></script>
<script src="{{asset('userpanel/js/posttask.js')}}"></script>

@include('includes.footer')
@include('includes.login')
@include('includes.postjob')
</body>
</html>
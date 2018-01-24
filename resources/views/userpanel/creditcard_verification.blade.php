<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>Lawyer</title>
    <link href="{{asset('assets/userpanel/css/style-min.css')}}" rel="stylesheet"/>
    <link id="home" href="{{asset('assets/userpanel/css/home-min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/userpanel/css/bootstrap.css')}}" rel="stylesheet">
    <script src="http://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyCxiKtsoPeyFaXndX_ZfhQ2QJiFMXGRDQU&amp;libraries=geometry,places&amp;language=en"
            type="text/javascript"></script>
    <link href="{{asset('assets/userpanel/css/radio-button.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/userpanel/css/popup-layout.css')}}" rel="stylesheet">
    <link href="{{asset('assets/userpanel/css/modal-popup.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/bootstrap-multiselect.css')}}" rel="stylesheet"/>

    <link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"
          rel="stylesheet" type="text/css"/>
</head>

<body>
<style>
    .profile_pic_upload {
        border-radius: 5px;
        width: 50px;
        height: 50px;
    }

    .profile_pic {
        border-radius: 50px;
        width: 195px
    }

    .upload-photo .picw {
        height: 30px;
        z-index: 2;
        opacity: 0;
        position: absolute;
        left: 23px;
        top: 0px;

    }

    .upload-photo {
        position: relative;

    }

    button.button-cta {
        box-sizing: border-box;
        cursor: pointer;
        display: inline-block;
        letter-spacing: .1em;
        -webkit-transition: background .5s linear, color .5s linear, box-shadow .5s linear;
        transition: background .5s linear, color .5s linear, box-shadow .5s linear;
        margin-right: 4px;
        text-align: center;
        white-space: nowrap;
        padding: 9px 12px;
        color: #fff;
        text-shadow: 0 1px 1px #5f7900;
        line-height: 1.4;
        position: absolute;
        left: 90px;
        top: 30px;
    }

    /*.button-med {
        border-radius: 50px;
        font-size: 12px;
        letter-spacing: .4px;
        line-height: 1.4;
        padding: 9px 18px;
        margin-bottom: 4px;
    }*/
    .header-upload {
        background: url(https://airtasker-page-assets.s3.amazonaws.com/runner/images/header-5.png);
        background-position: 50% 50%;
        background-size: cover;
        border-radius: 3px;
        cursor: pointer;
        font-size: 13px;
        height: 70px;
        margin-top: 20px;
        text-align: center;

    }

    .header-upload .header_text {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        color: #fff;
        display: inline-block;
        line-height: 20px;
        -webkit-transition: background .2s ease-in-out;
        transition: background .2s ease-in-out;
        margin-top: 25px;
        padding: 0 10px;
    }

    .account-page .right-side .page-form ul li.Head {
        width: 100%;
    }

</style>

<div id="fb-root"></div>


<div id="app-container" class="inner-common-page">
    <div id="lawyer-app" class="account-page">
        <div id="app-header">
            <!-- <div id="header-block" style="height:94px;"></div> -->
            @include('includes.header')
            <div id="page-and-screen-content">
                <div class="content">
                    <div class="inner-page">
                        <div class="left-sidebar-account">
                            <div class="images-icon">
                                @if(!empty(Auth::user()->profile_image))
                                    <img class="profile_pic" style="width:195px"
                                         src="{{url('assets/profile_images')}}/{{Auth::user()->profile_image}}">
                                @else
                                    <img src="{{asset('assets/userpanel/images/image-icon.png')}}">
                                @endif
                                <h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
                            </div>
                            @include('includes.dashboardlinks')
                        </div>
                        <div class="right-side">
                            <h3 class="inner-page-headings">Account</h3>

                            <form id="card-verification" action="" method="post">
                                <div id="progressbar"></div>
                                <div class="page-form">
                                    <p>When you are ready to accept an Law app offer, you will be required to add the
                                        funds required for the task to Law App. The funds will be held securely until
                                        the task is completed and the Job Poster releases the funds to the Law App
                                        Worker.</p>

                                    <p>Credit Card </p>
                                    <span class="error" style="color:red; display:none"></span>
                                    @if(!empty($cardtype))
                                        <ul class='card-details'>
                                            <li>
                                                <img src="{{url('assets/images/card-icon.png')}}"/> {{  $cardtype}}
                                                ******{{$cardnumber}}</br>{{$expiremonth}}/{{$expireyear}} Expiry date
                                            </li>
                                            <li>
                                                <button type="button" id="update-card">Update your Card</button>
                                            </li>
                                        </ul>
                                    @else      @endif

                                    @if(!empty($cardtype))
                                        <ul class="add-card" style="display:none"> @else
                                                <ul class="add-card"> @endif
                                                    <li>
                                                        <p>Name on Card</p>
                                                        <input type="text" id="nameoncard" name="nameoncard" value=""
                                                               required>
                                                        {{csrf_field()}}

                                                    </li>
                                                    <li>
                                                        <p>Card Number</p>
                                                        <input type="number" id="cardnum" name="cardnumber" value=""
                                                               required><span class="cardtype"></span>
                                                        <input type="hidden" value="" id="cardname" name="cardname"/>

                                                    </li>

                                                    <li>
                                                        <p>Expiry Date</p>
                                                        <input style="width:80px" type="number" id="expirymonth"
                                                               name="expirymonth" value="" required placeholder="mm">
                                                        <input style="width:80px" type="number" id="expiryyear"
                                                               name="expiryyear" value="" required placeholder="yyyy">

                                                        <p>CVC</p>
                                                        <input style="width:80px" type="text" id="cvc" name="cvc"
                                                               value="" required>
                                                    </li>
                                                    <li>
                                                        <button type="submit" class="card-submit">Add your Card</button>
                                                    </li>
                                                </ul>


                                                <!----field for updation-->


                                                <!--updation-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="static-page-content"></div>
        </div>
    </div>
</div>
@include('includes.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>

<script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/userpanel/js/custom.js')}}"></script>
<script src="{{asset('assets/userpanel/js/jquery.creditCardValidator.js')}}"></script>
<script src="{{asset('assets/userpanel/js/verify.js')}}"></script>
<script src="{{asset('assets/userpanel/js/posttask.js')}}"></script>
<script>
    $(document).ready(function () {

        $('#datepic').datepicker({
            format: 'M-dd-yyyy'
        });
    });
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $(function () {
        $("#progressbar").progressbar({
            value: 37
        });
    });
</script>

<script>
    $(function () {
        $('#cardnum').validateCreditCard(function (result) {

            if (result.card_type !== null) {
                $('#cardname').val(result.card_type.name);
                $('.cardtype').addClass(result.card_type.name);
                $('.cardtype').html(result.card_type.name);
            }
            else {
                // $('#cardnum').css({'color':'red', 'border-color':'red'});
            }


            if (result.length_valid && !result.luhn_valid) {
                $('#cardnum').css({'color': 'red', 'border-color': 'red'});
            }

        });


    });
</script>

@include('userpanel.postjob')
</body>
</html>
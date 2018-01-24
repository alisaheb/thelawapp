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
                            <h2>Payment Methods</h2>
                            <hr>
                        </div>

                        <!-- Right Area-->
                        <div class="payment-method-container">

                            <div class="upload">
                                <p class="popup-heading-text">Adding your credit card details allows us to charge payment for matters you receve help with.</p>
                                <div class="main-area">
                                    <div class="credit-mod-container">
                                        <form role="form" data-toggle="validator">

                                            <div class="form-group">
                                                <label class="control-label " for="f-name">Name on Card</label>
                                                <input class="form-control" id="name" name="name" placeholder="Jhon" type="text" required="">
                                            </div>
                                            <div class="form-group card-no">
                                                <label class="control-label " for="l-name">Card Number</label>
                                                <input class="card-number form-control" id="name" name="name" placeholder="1234 5678 9101 1231" type="text">
                                                
                                                {{ Html::image('assets/front/img/credit_cards.png') }}
                                            </div>
                                            <div class="form-group card-ex">
                                                <label class="control-label" for="f-name">Expiry Date</label>
                                                <input class="card-month form-control" id="name" name="name" placeholder="MM" type="text" required="">
                                                <input class="card-year form-control" id="name" name="name" placeholder="YY" type="text">
                                            </div>
                                            <div class="form-group card-cv">
                                                <label class="control-label " for="f-name">CVC</label>
                                                <input class="card-cvc form-control" id="name" name="name" placeholder="123" type="text" required="">
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">Add</button>
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
@endsection
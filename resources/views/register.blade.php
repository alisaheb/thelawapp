@extends('layouts.front')
@section('title','The law app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card card-container">
            <div class="loglogo">
                {{ Html::image('assets/front/img/logo.png','logo',['id'=>'profile-img','class'=>'sitelogo-img'])}}
            </div>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="f_name" class="form-control" placeholder="First Name" required="" autofocus="">
                <input type="text" id="l_name" class="form-control" placeholder="Last Name" required="" autofocus="">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                <div class="form-group">
                    <div class="btn-group cover" data-toggle="buttons">
                        <label class="btn btn-success">
                        <input type="checkbox" autocomplete="off">
                        <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <span class="title">Yes, I understand and agree to the Laww Terms of Service, including the User Agreement and Privacy Policy.</span>
                    </div>
                </div>
                <div id="remember" class="checkbox selectoption">
                    <label><span class="stitle">Select User Type:</span>
                    <input type="radio" name="Lawyer" value="Lawyer"><span>Lawer</span> <input type="radio" name="Client" value="Client"> <span>Client</span>
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Register</button>
            </form>
            <!-- /form -->
            <a href="login.html" class="forgot-password">
            Already Have an Account
            </a>
        </div>
        <!-- /card-container -->
    </div>
    <!-- /-row -->
</div>
@endsection
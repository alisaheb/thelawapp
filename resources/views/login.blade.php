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
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="forgot-password.html" class="forgot-password">
                Forgot the password?
            </a>
            <a href="signup.html" class="forgot-password">
                Create an account
            </a>
            </div><!-- /card-container -->
        </div><!-- /-row -->
    </div><!-- /container -->
@endsection
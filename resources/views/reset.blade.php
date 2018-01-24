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

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Submit</button>
            </form><!-- /form -->
            <a href="{{ url('login') }}" class="forgot-password">
                Login
            </a>
        </div><!-- /card-container -->
    </div><!-- /-row -->
</div><!-- /container -->
 
@endsection
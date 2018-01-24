@extends('layouts.front')
@section('title','The law app')
@section('content')
<div class="container-fluid login">
    <div class="row">
        <div class="card card-container">
            <div class="loglogo">
                {{ Html::image('assets/front/img/logo.png','logo',['id'=>'profile-img','class'=>'sitelogo-img'])}}
            </div>
             <form class="form-signin form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                    <input type="text" id="f_name" class="form-control" placeholder="First Name" required="" autofocus="" name="fname">
                    @if ($errors->has('fname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                    <input type="text" id="f_name" class="form-control" placeholder="Last Name" required="" autofocus="" name="lname">
                    @if ($errors->has('lname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" id="email" class="form-control" placeholder="Email" required="" autofocus="" name="email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" placeholder="password" required="" autofocus="" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="btn-group cover" data-toggle="buttons">
                        <label class="btn btn-success">
                        <input type="checkbox" autocomplete="off">
                        <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <span class="title">Yes, I understand and agree to the Laww Terms of Service, including the User Agreement and Privacy Policy.</span>
                    </div>
                </div>
                <div id="remember" class="form-group">
                    <span class="stitle">Select User Type:</span>
                    <input type="radio" id="lawyer" name="type" value="lawyer" required><label for="lawyer">Lawer</label> 
                    <input type="radio" id="client" name="type" value="client"> <label for="client">Client</label>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Register</button>
                </div>
            </form>
            <a href="login" class="forgot-password">
            Already Have an Account
            </a>
        </div>
    </div>
</div>
@endsection
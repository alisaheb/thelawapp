@extends('layouts.front')
@section('title','Send Password Rest Link')
@section('content')
<div class="container-fluid login">
    <div class="row">
        <div class="card card-container">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="loglogo">
                {{ Html::image('assets/front/img/logo.png','logo',['id'=>'profile-img','class'=>'sitelogo-img'])}}
            </div>
            <form class="form-signin" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <input id="email" type="email" class="form-control" name="email" required value="{{ old('email') }}"  placeholder="Email address" autofocus>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Send Password Reset Link</button>
            </form>
            <a href="{{ url('login') }}" class="forgot-password">
            Login
            </a>
        </div>
    </div>
</div>
@endsection
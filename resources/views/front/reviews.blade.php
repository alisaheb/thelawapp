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
                    <h2>Reviews</h2>
                    <hr>
                </div>
                <!-- Right Area-->
                <div class="review-container">
                    @foreach($reviews as $rev)
                    @if(count($rev->review) > 0)
                    <div class="single-review">
                        <h3><a href="{{ url('cases',$rev->slug) }}">{{ $rev->title }}</a></h3>
                        @foreach($rev->review as $single)
                        <div class="date">
                            <span class="calendar"><i class="fa fa-calendar" aria-hidden="true"></i> January 21, 2017</span> By  <span><a href="{{ url('profile',$single->users['id']) }}">{{$single->users['fname']}} {{$single->users['lname']}}</a></span>
                        </div>
                        <p class="desc">
                            {{$single->reviews}}
                        </p>
                        <hr>
                        @endforeach
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
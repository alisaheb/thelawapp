<?php 
use Carbon\Carbon;
?>
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
                    <h2>Notification</h2>
                    <hr>
                </div>
                <!-- Right Area-->
                <div class="notify-container">
                    @foreach($notifications as $key => $value)

                        @foreach($value as $notif)
                            @if($notif->type_of_notification == 'comment')
                            <div class="single-notify">
                                <p>
                                    <a href="#"><img src="img/notify1.png">Nice! Lubo Smid is Following You</a>
                                </p>
                                <p class="status"> Just Now </p>
                                <hr>
                            </div>

                            @elseif( $notif->type_of_notification == 'task' )
                            <div class="single-notify">
                                <p>
                                    <a href="#"><img src="img/notify1.png">Nice! Lubo Smid is Following You</a>
                                </p>
                                <p class="status"> Just Now </p>
                                <hr>
                            </div>

                            @elseif( $notif->type_of_notification == 'bid' )
                            <div class="single-notify">
                                <p>
                                    <a href="{{url('profile', [$notif->sender_id])}}"><img src="{{url('public/profile_images')}}/{{ $notif->profile_image}}">{{ $notif->fname}} {{ $notif->lname }}</a>  {{ $notif->title}} ON <a href="{{url('mycase', [$notif->slug])}}"> {{ $notif->task_title}}</a>  
                                </p>
                                <?php 
                                   $date = Carbon::parse($notif->created_at); 
                                ?>
                                <p class="status"> {{$date->diffForHumans() }} </p>
                                <hr>
                            </div>
                            @endif

                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<?php 
    $use_type = Auth::user()->type;
    $url_type = 'case';
    if($use_type == 'client')
        $url_type = 'mycase';

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
                    <h2>Your Cases</h2>
                    <hr>
                </div>
                <!-- Right Area-->
                <div class="review-container cases">
                    @foreach($cases as $case)
                    <div class="single-review">

                        <h3><a href="{{ url($url_type,[$case->slug]) }}">

                        {{ $case->title }}</a></h3>
                        <div class="subtitle">
                            <span class="calendar">Fixed-Price -  Est. Budget: ${{$case->estimate_budget}} - Posted  {{$case->created_at->diffForHumans()}}</span>
                        </div>
                        <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged<a href="{{ url('cases',$case->slug) }}">[...]</a></p>
                        <p class="cat"><span class="catg">Categories:</span><a href="#">{{ isset($case->category->name)?$case->category->name:'--' }}</a>
                        <hr>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                {{ $cases->links() }}
                </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection
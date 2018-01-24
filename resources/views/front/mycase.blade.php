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
                            <h2></h2>
                        </div>

                        <!-- Right Area-->
                        <div class="single-cases">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3><a href="#">{{$case->title}}</a></h3>
                                    <p>
                                        <a href="#"><img src="{{url('public/profile_images')}}/{{$case->user->profile_image}}">Posted by {{$case->user->fname}} {{$case->created_at->diffForHumans()}}</a>
                                    </p>
                                    <div class="job_status">
                                        <button class="pro-save btn" name="submit" @if($case->status == 'open') {{ "style=background:#20bf55;color:#fff"}}@endif>OPEN</button>
                                        <button class="pro-save btn" name="submit" @if($case->status == 'accept') {{ "style=background:#20bf55;color:#fff"}}@endif >ACCEPTED</button>
                                        <button class="pro-save btn" name="submit" @if($case->status == 'complete') {{ "style=background:#20bf55;color:#fff"}}@endif >COMPLETE</button>
                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="paid-with-pay">
                                        <span>Paid with Lawyer Pay<font>?</font></span>
                                        <h3 id="price">$ {{$case->estimate_budget}}</h3>
                                        <a href="#" class="offerclass" id="makeoffer"></a>
                                    </div>
                                </div>

                                <div class="col-md-12 case-content">
                                    <hr>

                                    <div class="row case-detail-row">
                                    @if($case->status=='accept')   
                                        <div class="case-detail">
                                            <div class="col-md-2">
                                                <img src="{{asset('public/profile_images')}}/{{$assignee->users->profile_image}}" alt="title">
                                                <div class="rating">
                                                    <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="case-margin">
                                                    <div class="name">
                                                        <a href="#">{{$assignee->users->fname}} {{$assignee->users->lname}}</a>
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @else
                                    @if($bidder_count==0)
                                    <div class="case-detail">
                                           No offer avilable 
                                    <hr>
                                    </div>
                                    @else
                                        @foreach($bidders as $bidder)
                                                <div class="case-detail">
                                                <div class="col-md-2">
                                                    <img src="{{url('public/profile_images')}}/{{$bidder->users->profile_image}}" alt="title">
                                                    <div class="rating">
                                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="case-margin">
                                                        <div class="name">
                                                            <a href="{{url('profile')}}/{{$bidder->users->id}}">{{$bidder->users->fname}}  {{$bidder->users->lname}}  </a>
                                                        </div>
                                                        <div class="budget">
                                                            {{'$'.$bidder->offer_price}}
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="case-margin">
                                                        <div class="desciprtion">
                                                            {{substr($bidder-> description,0,21)}}
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="case-margin">
                                                        <div class="mycase-button">
                                                            <button class="pro-save btn" data-toggle="modal" data-target=".modal.modalcase" >Details</button>
                                                            <button class="pro-save btn hireNow" 
                                                            data-name="{{$bidder->users->fname}}" data-uid="{{$bidder->users->id}}" data-id="{{$bidder->task_id}}" data-budget="{{$bidder->offer_price}}"
                                                            >Hire</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach    
                                    @endif
                                    @endif    


                                    </div>

                                    <hr>
                                    <div class="case-comment">
                                        <p class="task">Task Activity</p>
                                        <p class="cmnt">1 comments about this Task</p>
                                        <div class="old-comments">
                                            <div class="author-img">{{ Html::image('assets/front/img/avatar.png') }}</div>
                                            <div class="author-cmnt">
                                                <h4>Aminur Islam</h4>
                                                <p>This is old comment about this job.</p>
                                            </div>
                                        </div>

                                        <div class="comment-form">

                                            <form role="form" data-toggle="validator">
                                                <div class="form-group">
                                                    <!-- Message field -->
                                                    <textarea class="form-control" cols="40" id="message" name="message" rows="3" placeholder="Ask a question about this task"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <button class="pro-save btn btn-primary " name="submit" type="submit">Submit</button>
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
</div>
@endsection
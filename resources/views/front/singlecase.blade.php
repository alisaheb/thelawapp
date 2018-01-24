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
							<h3><a href="{{url('cases',$case->slug)}}">{{ $case->title }}</a></h3>
							<p>
								<a href="#"><img src="{{asset('public/profile_images')}}/{{$case->user->profile_image}}">Posted by {{ $case->user->fname }}</a>  {{$case->created_at->diffForHumans()}}
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
								@if($case->status == 'open' && $bid == 0)
								<a href="{{ url('make-offer',$case->slug) }}" class="offerclass" id="makeoffer">@if($bidder_count == 0) Be First To @endif Make an Offer</a>
								@elseif($case->status == 'complete')
								<a href="" class="offerclass" id="makeoffer">Completes</a>
								@elseif($case->status == 'accept')
								<a href="" class="offerclass" id="makeoffer">Assigned</a>
								@elseif($case->status == 'expired')
								<a href="" class="offerclass" id="makeoffer">Expired</a>
								@elseif($bid > 0)
								<a href="" class="offerclass" id="makeoffer">Offer Made By You</a>
								@endif
							</div>
						</div>
						<div class="col-md-12 case-content">
							<p>
								{{$case->description}}
							</p>
							<div class="single-footer-status">
								<button class="pro-save btn">Due date {{$case->last_date}} </button>
								<button class="pro-save btn">Paid with lawyer pay</button>
							</div>
							<hr>
							<div class="case-comment">
								 
								<p class="task">Task Activity</p>
                                <p class="cmnt">{{$bidder_count}}  people are offered</p>
								<p class="cmnt">{{count($comments) }} comments about this Task</p>
								
								 @foreach($comments as $comment)
                                    @if($comment->userby->id==Auth::user()->id)
										<div class="old-comments">
											<div class="author-img">
											<img src="{{asset('public/profile_images')}}/{{$comment->userby->profile_image}}"></div>
											<div class="author-cmnt">
												<h4>{{$comment->userby->fname}}{{$comment->userby->lname}}</h4>
												<p>{{$comment->comments}}</p>
											</div>
										</div>
									@else
									<div class="old-comments">
											<img src="{{asset('public/profile_images')}}/{{$comment->userby->profile_image}}"></div>
											<div class="author-cmnt">
												<h4>{{$comment->userby->fname}}{{$comment->userby->lname}}</h4>
												<p>{{$comment->comments}}</p>
											</div>
										</div>
									@endif
								@endforeach
								<div class="comment-form">
									<form role="form" data-toggle="validator">
										<div class="form-group">
											<input type="hidden" value="{{$case->id}}" id="taskid">
                                            <input type="hidden" value="{{Auth::user()->fname}} {{Auth::user()->lname}}"
                                                        id="user_name">
                                            <input type="hidden" value="{{Auth::user()->id}}" id="comment_by">
                                            <input type="hidden" value="{{asset('public/profile_images')}}/{{Auth::user()->profile_image}}"
                                                        id="image_name">
											<textarea class="form-control" cols="40" id="comment" name="comment" rows="3" placeholder="Ask a question about this task"></textarea>
                                            <p class="characters-remaining">500 characters remaining</p>
										</div>
										<div class="form-group">
											<button class="pro-save btn btn-primary comment-submit" name="submit" type="submit">Submit</button>
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
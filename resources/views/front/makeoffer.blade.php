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
					<h2>Submit a Proposal</h2>
					<hr>
				</div>
				<!-- Right Area-->
				<div class="proposal-container">
					<h4>Job Details</h4>
					<h5>{{$case->title}}</h5>
					<p>{{$case->description}}<a href="{{url('cases',$case->slug)}}">View job posting</a>
					</p>
					<hr>
					<p></p>
					<div class="profile-rate">
						<h4>Propose Terms</h4>
						<h5>You are submitting proposal as  a Lawyer</h5>
						<p>This job estimate budget is ${{$case->estimate_budget}}</p>
						<hr>
						<form role="form" data-toggle="validator" action="{{ url('make-offer') }}" method="post">
							{{csrf_field()}}
							<div class="form-group">
								<div class="add-label">
									<h5>Your Offer</h5>
									<label class="control-label " for="f-name">This is the amount the client will see on your proposal</label>
								</div>
								<div class="hourly">
									<span class="per-dolr">$</span><input class="form-control" id="name" name="offer_price" placeholder="{{$case->estimate_budget}}" type="number" min="0" required=""><span class="per-hr">/hr</span>
								</div>
							</div>
							<input type="hidden" name="task_id" value="{{ $case->id}}">
							<input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
							<hr>
							<!--div class="form-group">
								<div class="add-label">
									<h5>20% Upwork Service Fee Explain this</h5>
								</div>
								<div class="hourly">
									<span class="per-dolr">$</span><input class="form-control" id="name" name="name" placeholder="18.75" type="text" disabled=""><span class="per-hr">/hr</span>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="add-label">
									<h5>You'll Receive</h5>
									<label class="control-label " for="f-name">The estimated amount you'll receive after service fees</label>
								</div>
								<div class="hourly">
									<span class="per-dolr">$</span><input class="form-control" id="name" name="name" placeholder="18.75" type="text" required=""><span class="per-hr">/hr</span>
								</div>
							</div-->
							<div class="form-group cov-letter">
								<!-- Message field -->
								<h5>Cover Letter</h5>
								<textarea required class="form-control" cols="40" id="message" name="description" rows="10"></textarea>
							</div>
							<!--div class="form-group card-no">
								<h5>Attachments (optional)</h5>
								<input class="propos-file form-control" id="name" name="name" type="file">
							</div-->
							<div class="form-group">
								<button class="pro-save btn btn-primary " name="submit" type="submit">Submit A Proposal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
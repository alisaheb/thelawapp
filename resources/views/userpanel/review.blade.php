@include('includes.head')

<link href="{{asset('assets/userpanel/css/owl.carousel.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/userpanel/css/owl.theme.css')}}" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="fb-root"></div>


</style>
    <div id="app-container" class="inner-common-page">
        <div id="lawyer-app" class="verification-page">
            <div id="app-header">
                <!-- <div id="header-block" style="height:94px;"></div> -->
                 @include('includes.header')
                 </div>
            <div id="page-and-screen-content">
                <div class="content">
					<div class="inner-page">
						<div class="left-sidebar-account">
							
							<div class="images-icon">
                                     @if(!empty(Auth::user()->profile_image))
						       	<img  class="profile_pic" style="width:195px" src="{{asset('public/profile_images')}}/{{Auth::user()->profile_image}}">		
							    @else
							     <img  src="{{asset('userpanel/images/image-icon.png')}}">							
							     @endif
								<h3>{{Auth::user()->fname}} {{Auth::user()->lname}}</h3>
							</div>
							    @include('includes.dashboardlinks')
						
						</div><!--left-sidebar-account-->
						
						<div class="right-side">
							<h3 class="inner-page-headings">My Reviews</h3>
							<div class="dashboard-section">		
								@foreach($reviews as $rev)
									@if(count($rev->review) > 0)
									<div class="task-summary">
		                                <h4 class="text-left">{{ $rev->title }}</h4>
		                               @foreach($rev->review as $single)
	                                    <div class="dashboard-post-task">
	                                        <h2>{{$single->users['fname']}} {{$single->users['lname']}}</h2>
	                                        <p>{{$single->reviews}}</p>
	                                        <?php for ($i=0; $i< $single->rating; $i++){?>
	                                        <i class="fa fa-star" aria-hidden="true"></i>
	                                        <?php } ?>
	                                    </div>
		                               @endforeach
                                    </div>
                                    @endif
								@endforeach
							</div>
						</div><!--right-side-->
						
				</div><!--inner-page-->
		  </div><!--content-->
            </div><!--page and screen content-->
                
            </div>
        </div>
    </div>
	
@include('includes.footer')
      <script src="{{asset('assets/userpanel/js/jquery-1.9.1.min.js')}}"></script>
      <script src="{{asset('assets/userpanel/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/userpanel/js/popup-modal.js')}}"></script>
      <script src="{{asset('assets/userpanel/js/custom.js')}}"></script> 
      <script src="{{asset('assets/userpanel/js/message.js')}}"></script> 
   <!--   <script src="{{asset('assets/userpanel/js/posttask.js')}}" ></script>-->
    
          @include('includes.postjob')
          @include('includes.adminverification')
          @include('includes.msgnotification')
          
          
</body>
</html>

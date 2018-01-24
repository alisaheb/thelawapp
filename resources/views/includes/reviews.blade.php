<div class="md-modal md-effect-3 common-form" id="show_reviews">
	<div class="md-content on-registration ht_600 ">
	<div class="" style="position:; top:; width:100%;border-bottom:1px solid #ccc;padding-bottom: 25px;">
			<h2 class="popup-heading">Review Offer</h2>
		<button class="md-close popup-close-icon">x</button>
		
	</div>
	
    <div id="owl-popup-three" class="owl-carousel">
    
      <!-- third pop up-->
      <div class="item">
      
      <!---changes should start form here @ Deepika-->

		<!--<span class="popup-heading  after-submit profile-error">Detail entered succefully</span>
		<p class="popup-heading-text">Adding your payment details allows you to make an offer on tasks</p>
		<div class="progressbar">
			<div class="progressbar-three"></div>
		</div>-->
        
        
       <input id="acnt-token" type="hidden" name="_token" value="{{ csrf_token() }}">
	   
	   <div class="bottom_but">
		    <button  class="button-cta button-lrg  prev">Previous</button>
		    <button  class="button-cta button-lrg  next">Next</button>
    </div>
	   
  <div class="common-inner-form ">
			<div class="header-image-and-avatar center">
						<div  class="header-image" >
							<img src="{{url('assets/userpanel/images/imagebg.jpg')}}">
						</div>
						<div class="avatar-img1" >
							<img src="{{url('assets/userpanel/images/avat.jpg')}}">
						</div>
			</div>
			
			
			<div class="name-and-offer">
						<div class="left">
								<div class="user-name-holder">
								<a class="user-name" href="">Jorge  G.</a></div>
									<div class="inline-rating">
										<div class="rating-summary-holder">
											<div class="rating">
												<p class="star"> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </p>
											</div>
										</div>
									</div>
									<div class="completion-rate"><span>71% Completion Rate</span></div>
						</div><!--left-->
						
						<div class="right">
								<div class="offer-text right">OFFER:</div>
								<div class="task-price">
									<div class="currency-symbol">$</div>
									<div class="price">50</div>
								</div>
						</div><!--right-->

						<div class="clear"></div>
			</div><!--name and offer-->
			
			<div class="comment1">“Hi, I'm an excellent cleaner!  I have always lived with a few roommates, and I am always the cleaner of the house!  I pay close attention to detail and can assure you won't be disappointed.<br><br>Do you provide all the implements to clean? <br><br>You can see my reviews and decide i”</div>
			
			
			<h5 class="splitter-section-name">Latest Reviews</h5>
			
			<div class="reviews">
						<div class="review-item" >
									<div class="review-picture">
											<div class="avatar-img1 interactive" href="">
												<img src="{{url('assets/userpanel/images/avat.jpg')}}">
											</div>
									</div><!--review-picture-->
									<div class="title-body-date">
												<div class="rating">
													<p class="star"> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star" aria-hidden="true"></i></span> <span><i class="fa fa-star-half-o" aria-hidden="true"></i></span> </p>
											  </div>
									
												<div class="date">12 days ago</div>
												<div class="task-title">Clean my 2 bedroom / 1 bathroom house</div>
										
												<div>
													<div class="user-name-holder"><div class="user-name">K g K.</div></div> said <div class="body">“Very hard working guy,and very polite and well mannered”</div>
												</div>
									</div>
									<div class="clear"></div>
						</div><!--review-item-->
			</div><!--reviews-->
			
			            
            <span>
              <button  class="button-cta button-lrg center accept-offer">Accept Offer</button>
            </span>
</div><!--common inner form-->
        
</div><!--items-->

 <!--changes end here-->
</div><!--owl carosel-->


</div><!--md-content-->
    
</div><!--modal-->


<script>
  $(document).ready(function() {

    var owl2 = $("#owl-popup-three");
     
    owl2.owlCarousel({

    items : 1, //10 items above 1000px browser width
    itemsDesktop : [1000,2], //5 items between 1000px and 901px
    itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
    itemsTablet: [768,1], //2 items between 600 and 0;
    itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
    mouseDrag : false,
    touchDrag : false
    });

    // Custom Navigation Events
    $(".next").click(function(){
    owl2.trigger('owl.next');
    })
    $(".prev").click(function(){
    owl2.trigger('owl.prev');
    })
    $(".play").click(function(){
    owl2.trigger('owl.play',1000);
    })
    $(".stop").click(function(){
    owl2.trigger('owl.stop');
    })

  });
  </script>

 
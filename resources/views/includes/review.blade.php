
<div class="md-modal md-effect-3 common-form" id="show_reviews">
	<div class="md-content on-registration ht_600">
	
		<button class="md-close popup-close-icon">x</button>
		<div class='bottom_but'> 
                    <button  class='button-cta button-lrg  prev'>Previous</button> 
                    <button  class='button-cta button-lrg  next'>Next</button>
		</div>
    <div id="owl-popup-three" class="owl-carousel">
    
   <!--changes end here @ Deepika-->

     <!--forth pop up-->      
      <div class="item">
      
      </div>

 <!--changes end here-->
    </div>
<!--	<p class="skip-button"><a href="#">Skip</a></p>-->
    
    
    </div>
    
</div>

<div class="md-modal md-effect-3 common-form" id="payoffer">
	<div class="md-content login-popup">
		<button class="md-close">x</button>
		<form id="payforcase" class="drp-lst" action="" method='post'>
			<!-- <h1 style="">Sign Up</h1> -->
	<div id="general-ajax-load" class="login-loader" style="display:none"><img src="{{asset('assets/userpanel/images/loading.gif')}}"/></div>
	
		<div class="already-have-account">
                    <p><a class="sign-up-link" href="javascript:;">Funds Required</a></p>
                            
                    <span class="payhead"> To get this task completed, you'll need to add funds to the task. Don’t worry! Your money is securely held until the task is completed and you’ll be able to release the funds. View terms.</span>
		</div>
			
		<div class="bidsummary">
                        <div class="bidder">
                                    <div class='avatar-img1 avatar-img19'>
                                     <img class="bidder-image" src=""/>
                                                  <div class="bidname"></div>
                                            </div>
                                            
                                            <div class="totalprice">
                                                    <p style="margin-bottom:0px;">Tasks Price</p><span class="dprice" style="    margin-left: 0px;"></span>
                                            </div>
									
                              </div>
                       
                          
		</div>
			
			<div class="common-inner-form pay-now-div">
				
				
				
			</div>
			
		</form>
		<div class="clear"></div>
			<!-- nextt step-->
			
  <div class="anchovy-credit-card-input anchovy-form" id="update_card" style="display:none">
   <div class="anchovy-form-item-small"><label>Name on Card</label><input id="nameoncard" name="nameoncard" type="text" placeholder="John Citizen"></div>
   <div class="anchovy-form-item-small"><label>Card Number</label><input id='cardnum' name='cardnum'  type="number" class="number-input" placeholder="1234 5678 9101 1231"><img src="{{asset('userpanel/images/credit_cards.png')}}" alt="Currently only VISA or Mastercard credit cards accepted" title="Currently only VISA or Mastercard credit cards accepted" class="credit-card-logos"></div>
   
   <div class="expiry-input anchovy-form-item-small">
    <label>Expiry Date</label>
    <input id="expirymonth" name="expirymonth" type="number" placeholder="MM">
    <input id="expiryyear" name="expiryyear" type="number" placeholder="YYYY">
   </div>
   
   <div class="cvc-input anchovy-form-item-small">
      <label>CVC</label><input name="cvc" id="cvc" placeholder="123">
      <div class="anchovy-question">
      
         <span></span>
         <div class="answer">
            <p>CVC provides an additional level of online fraud protection. The number is located on the back of your credit card and is generally three to four digits long.</p>
         </div>
      </div>
      <div class="anchovy-form-button">
      <button type='button' id='updated-card-popup' class='button-cta'>Save Card</button></div>
   </div>
   
</div>


<!-- next step end-->
		
		
		
		
		
		
    </div>
</div>


<script>
  $(document).ready(function() {

    var owl2 = $("#owl-popup-three");
     
    owl2.owlCarousel({

    items : 1, //10 items above 1000px browser width
    itemsDesktop : [1000,2], //5 items between 1000px and 901px
    itemsDesktopSmall : [900,2], // 3 items betweem 900px and 601px
    itemsTablet: [768,1], //2 items between 600 and 0;
    itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
    mouseDrag : true,
    touchDrag : false
    });

    // Custom Navigation Events
    $(".next").click(function(){ 
    owl2.trigger('owl.next');
    })
    $(".prev").click(function(){
    owl2.trigger('owl.prev');
    })
 

  });
  </script>
 
 
 <style>
 .payhead {
    background-color: #f5f9fb;
    color: #839094;    padding: 15px;
    font-size: 13px;
}
.avatar-img19{
	float:left;
	width:70%;
}
.bidsummary{
	margin:auto 30px;
}
.avatar-img1 img.bidder-image{
	margin-right: 20px;
    float: left;
}

.bidname{
	    float: left;
    margin-top: 10px;
	
}
.totalprice{
	float:left;width:30%;
}.card-details-popup img {
    margin-bottom: 10px;
    float: left;
    margin-right: 10px;
}

 
 </style>
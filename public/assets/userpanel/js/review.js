  $(document).ready(function(){ 
  $('#reviewoffer').click(function(){ 
      $('#owl-popup-three ').empty();
      //fadeOut(function(){  
                                                                                      $('#owl-popup-three').text(' ');
                                                                                      var taskid=$(this).data('taskid');   
                                                                                      localStorage.setItem('taskid',taskid);
                                                                                        var token = $('#acnt-token').val();
                                                                                        $.post('reviews',{'taskid':taskid,'_token':token},function(data)
                                                                                            {                                 
                                                                                                    data=$.parseJSON(data); 
                                                                                                    var html=' ';
                                                                                                    var str='';
                                                                                                   // var count=43;
                                                                                                    $.each(data, function(ind,data){
                                                                                                       // count=count+4;
                                                                                                    var fname=data.fname;
                                                                                                    var lname=data.lname;
                                                                                                    var offerprice=data.offer_price;
                                                                                                    var description =data.description;
                                                                                                    var img =data.users.profile_image;  
                                                                                                    var offer=data.offer_price;
                                                                                                    var userid = data.users.id;
                                                                                                    var taskid = data.task_id;
                                                                                                    
                                                                                                    var fullname= fname+' '+lname;  
                                                                                                    var windowpath = window.location.protocol + "//" + window.location.host + "/";
                                                                                                  
                                                                                                /*   html += "<div class='item'>"; 
                                                                                                   html += "<span>"+fname+"</span></br>";
                                                                                                   html += "<span>"+lname+"</span></br>";
                                                                                                   html += "</div>";  */                                      
                                                                                                 var imgsrc="<div class='posted-pic '><img style='width:15px ' class='profile_pic task-up-image' src="+"/public/profile_images/"+img+"/></div>";
                                                                                                 
                                                                                                 var reviewprofileimg="<div class='posted-pic '><img style='width:15px ' class='profile_pic task-up-image' src="+"/public/profile_images/"+img+"/></div>";
                                                                                                 
                                                                                                 html="<div class='item'>";
                                                                                                 
                                                                                        //        html = html.concat("<div class='bottom_but'> <button  class='button-cta button-lrg  prev'>Previous</button> <button  class='button-cta button-lrg  next'>Next</button></div>");
                                                                                                 
                    html = html.concat("<div class='common-inner-form'>");
                    
                    html = html.concat("<div class='header-image-and-avatar center'>	<div  class='header-image' >	<img src='userpanel/images/imagebg.jpg'></div><div class='avatar-img1' ><img src='/profile_images/"+img+"'></div></div>");
                    
                    html = html.concat("<div class='name-and-offer'><div class='left'><div class='user-name-holder'>  <a class='user-name' href='javascript:;'>"+fullname+"</a>	  </div>	<div class='inline-rating'><div class='rating-summary-holder'>					<div class='rating'><p class='star'> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star-half-o' aria-hidden='true'></i></span> </p>	</div>	</div>	</div>	<div class='completion-rate'><span>71% Completion Rate</span></div>	</div>	<div class='right'>	<div class='offer-text right'>OFFER:</div>			<div class='task-price'>	<div class='currency-symbol'>$</div>	<div class='price'>"+offer+"</div>	</div></div>		<div class='clear'></div></div>");
                    
                    html = html.concat("<h5 class='splitter-section-name'>Latest Reviews</h5>");
                    
                    html = html.concat("<div class='comment1'>“"+description+"”</div>");
                    
                    
                     html = html.concat("<div class='reviews'><div class='review-item' ><div class='review-picture'>					<div class='avatar-img1 interactive' href=''>	<img src='userpanel/images/avat.jpg'>	</div>	</div><div class='title-body-date'>	<div class='rating'><p class='star'> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star-half-o' aria-hidden='true'></i></span> </p>  </div> <div class='date'>12 days ago</div><div class='task-title'>Clean my 2 bedroom / 1 bathroom house</div>	<div><div class='user-name-holder'><div class='user-name'>K g K.</div></div> said <div class='body'>“Very hard working guy,and very polite and well mannered”</div></div>	</div>	<div class='clear'></div>	</div>	</div>");
                    
                    html = html.concat("<span> <button  data-task="+taskid+" data-name='"+fullname+"' data-img='"+img+"' data-userid='"+userid+"' data-price='"+offerprice+"' class='button-cta button-lrg center accept-offer'>Accept Offer</button> </span>");
                     
                    html = html.concat("</div></div>");
                                                                                               
                                                                                                 str += html;
                                                                                                 
                                                                                              });
                                                                                                    
                                                                                   
                                                                                                    var img=$(str).hide();
                                                                                                   $("#owl-popup-three").data('owlCarousel').addItem(img.fadeIn());
                                                                                                    
                                                                                                                                                    
                                                                                            }).done().fail().always($('#show_reviews').addClass('md-show'));
          
                                                       // });
    
                                    
                         } );

      
  $('#owl-popup-three').on('click','.accept-offer',function(){
      
            var userid = $(this).data('userid');
            var img = $(this).data('img');
            var name = $(this).data('name');
            var totalprice = $(this).data('price');
            var token = $('#acnt-token').val();
            var taskid = $(this).data('task');
            
             localStorage.setItem('price',$(this).data('price')); 
             localStorage.setItem('userid',$(this).data('userid'));
             localStorage.setItem('taskid',$(this).data('task'));
             
             
                            $.ajax({
                                        url:'checkcard',
                                        data:{'userid':userid, '_token':token},
                                        type:'post',
                                        dataType : 'json',
                                        success: function (data){  
                                             $('div.pay-now-div').empty();
                                             if(data.ok==1)
                                             {
                                                $('.bidder-image').attr('src','/profile_images/'+img);
                                                $('.bidname').html(name);
                                                $('.dprice').html('$ '+totalprice);
                                                
                                                $('div.pay-now-div').append( "<span class='onecard'><input type='hidden' id='fulcard' value='" +data.fcardnumber+"'><ul class='card-details-popup'>  <li>  <img src='images/card-icon.png'/>  "+data.cardtype+"******"+data.cardnumber+"</br>"+data.expiremonth+"/"+data.expireyear+" Expiry date <a href='javascript:;' id='upcard'>update</a></br><p>CVC</p>                                                    <input style='width:80px' type='text' id='scvc' name='cvc' value='' required> </li> <li><button type='button' id='pay-card-popup' class='button-cta'>Pay for case</button></li> </ul></span>");   
                                               
                                                
                                             }
                                             if(data.ok==0)
                                             {
                                                  $('.pay-now-div').hide();
                                                  $('#update_card').show();
                                             }
                                            $('#show_reviews').removeClass('md-show');
                                            $('#payoffer').addClass('md-show');
                                        }
                                    });
                            
                            return false;  
    });
  
  
 $('div.pay-now-div').on('click','a#upcard',function(){
     
                                   $('.pay-now-div').hide();
                                   $('#update_card').show();   
            
}); 
 
 $('a#review-back').click(function(){ alert('here');
      $('.pay-now-div').show();
      $('#update_card').hide(); 
});
  
 $('#payforcase').submit(function(e)
                                    {
                                         e.preventDefault(); 
                                         var token = $('meta[name="csrf-token"]').attr('content');
                                         var userid = localStorage.getItem('userid');
                                         var price = localStorage.getItem('price'); 
                                         var taskid= localStorage.getItem('taskid');
                                           
                                           $.ajax({
                                                    url:'acceptoffer',
                                                    type:'post',
                                                    dataType:'json',
                                                    data:{'_token':token,'userid':userid,'taskid':taskid, 'price':price},
                                                    success:function(data)
                                                    {
                                                        
                                                    }
                                                    
                                                });
                                        
                                    }); 
  
  
 /**accept and assigne the case--*/
 
 $('.pay-now-div').on('click','#pay-card-popup',function(){
   
                             var token = $('meta[name="csrf-token"]').attr('content');
                             var userid = localStorage.getItem('userid');
                             var price = localStorage.getItem('price'); 
                             var taskid= localStorage.getItem('taskid');
                              var fcard  = $('#fulcard').val();
                             var cvc =$('#scvc').val(); 
                             $.ajax({
                                            url: 'paytoadmin',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: { '_token': token,'taskid':taskid,'paidto':userid,'price':price,'cardno': fcard },
                                            success: function(data) {
                                              console.log(data);
                                                        if(data=='ok')
                                                        {
                                                           // window.location.href="mycase";
                                                        }
                                            },
                                            error: function(data) {
                                            
                                            },
                                        }); 
                
     
                        });
 
 
});

  /*----update you card--*/
    $(function() {
        
          $('#updated-card-popup').click(function(e){ 
                                              e.preventDefault();
                                              
                                              var nameoncard=$.trim($('#nameoncard').val());
                                              var cnum=$.trim($('#cardnum').val());
                                              var expmonth = $.trim($('#expirymonth').val());
                                              var expiryyear   = $.trim($('#expiryyear').val());
                                              var cvc = $.trim($('#cvc').val());
                                             
                                              if(nameoncard=='')
                                              {    
                                                  $('#nameoncard').css( 'border-color','red'); return false;
                                              }
                                              if(cnum=='')
                                              {
                                                  $('#cardnum').css( 'border-color','red'); return false;
                                               }
                                              if(expmonth=='')
                                              {
                                                  $('#expirymonth').css( 'border-color','red'); return false;
                                              }
                                               if(expiryyear=='')
                                               {
                                                   $('#expiryyear').css( 'border-color','red'); return false;
                                                }
                                              if(cvc=='')
                                               {
                                                    $('#cvc').css( 'border-color','red'); return false;
                                               }
                                              
                                              
                                              var token = $("input[name='_token']").val(); 
                                              $.post('cardverification',{'_token':token, 'cnum':cnum,'cvc':cvc,'expmonth':expmonth,'expiryyear':expiryyear, 'nameoncard':nameoncard}).done(function(data){ var data=$.parseJSON(data);  if(data.message=='ok'){  window.location.href='cardverification'; }else {  $('.error').html(data.message); $('.error').show(); } }).fail();
         
          });
         
          $('#update-card').click(function(){
              $('ul.card-details').hide();
              $('ul.add-card').show();
        });
          
      });
         
  
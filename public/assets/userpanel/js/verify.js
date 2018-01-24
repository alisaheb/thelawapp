        
      $(function() {
        
          $('#card-verification').submit(function(e){
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
                                              $.post('cardverification',{'_token':token, 'cnum':cnum,'cvc':cvc,'expmonth':expmonth,'expiryyear':expiryyear, 'nameoncard':nameoncard}).done(function(data){ var data=$.parseJSON(data);  if(data.message=='ok'){  window.location.href='payments'; }else {  $('.error').html(data.message); $('.error').show(); } }).fail();
         
          });
         
          $('#update-card').click(function(){
              $('ul.card-details').hide();
              $('ul.add-card').show();
        });
          
     
         
        //========add lawyer account====  
          $('#billing-address-form').submit(function(e){
                                e.preventDefault(); 
                                  $('.billing-address-load').show();
                                var data=$('#billing-address-form').serialize();
                                $.post('billing_address',data,function(data){
                                    
                                    data= $.parseJSON(data);
                                                    var country = data.country;
                                                    var state = data.state;
                                                    var city = data.city;
                                                    var postal =data.postal;
                                                    var street = data.street;
                                     
                                     
                                                    $('.billing-post').empty();    
                                                    $('.billing-post').html(postal);
                                                    
                                                    $('.billing-street').empty();    
                                                    $('.billing-street').html(street);
                                                    
                                                    $('.biiling-city').empty();    
                                                    $('.biiling-city').html(city);
                                                    
                                                    $('.billing-state').empty();    
                                                    $('.billing-state').html(state);
                                                    
                                                    $('.billing-country').empty();    
                                                    $('.billing-country').html(country);
                                                    
                                                    $('.billing-address').hide();    
                                                    $('.billing-address-two').show();
                                    
                                }).done(function(){
                                                        
                                    
                                }).always(function(){ $('.billing-address-load').hide();});
                        });
       //========bank account details=====
          $('.bank-account-details').submit(function(e){
                        e.preventDefault();
                        $('.bank-account-loader').show();
                         var data=$('.bank-account-details').serialize();
                         $.post('accountdetails',data,function(){}).done(function(data){ 
                                                                    data=$.parseJSON(data);
                                                                     var name = data.acntholder;
                                                                     var bsb = data.bsb;
                                                                     var acnum = data.account_number;
                                                                     
                                                                     $('.holdrname').empty();
                                                                     $('.holdrname').html(name);
                                                                     
                                                                     $('.bbsb').empty();
                                                                     $('.bbsb').html(bsb);
                                                                     
                                                                     $('.anum').empty();
                                                                     $('.anum').html(acnum);
                                                                     
                                                                     $('.bank-acnt-one').hide();
                                                                     $('.bank-acnt-two').show();
                                                                     
                        }).always(function(){ $('.bank-account-loader').hide(); });
        });
          
         $('.paypal-mail-form').submit(function(e){
                        e.preventDefault();
                         var data=$('.paypal-mail-form').serialize();
                         $.post('paypalmail',data,function(){}).done(function(data){ $('.pemail').html(data);  $('ul.paypal-mail-details').hide(); $('.paypal-mail-details-two').show(); }).always(function(){});
        }); 
   
    //===remove data====     
         $('#remove-billing-address').click(function(data){ 
             var token=$('meta[name="csrf-token"]').attr('content');
              $.post('remove_account',{'_token':token,'action':'address'},function(){}).done(function(data){ 
                  if(data==1){window.location.href="payments"; }
                              });
                                    });
         
         $('#remove-bank-acount').click(function(){  
             var token=$('meta[name="csrf-token"]').attr('content');
                $.post('remove_account',{'_token':token,'action' : 'account'},function(){}).done(function(data){ 
                    if(data==1){window.location.href="payments";} 
                });
                                    });
         
         $('.remove-paypal-email').click(function(){  var token=$('meta[name="csrf-token"]').attr('content');
                        $.post('remove_account',{'_token':token, 'action' : 'email'},function(){}).done(function(data){
                           if(data==1){ window.location.href="payments"; }
                        });
         });
   
          
    //========================
                  
         
         
    });
         
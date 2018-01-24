$(document).ready(function(){ 
    $('#post-task,.post-task').click(function(){  
        $('#admin-verification').addClass('md-show');
        $('#post-job-one').addClass('md-show'); 
    });
    
    $('.task-continue-one').click(function(e){ e.preventDefault();
           if($('#header').hasClass('loggedout'))
           { 
                $('#modal-5').addClass('md-show');
           }
           else
           { 
               var title=$.trim($('#case-title').val());
               var description=$.trim($('#description-task').val()); 
               var datepick=$.trim($("input[name=date_of_incedent]").val());
               if(title=='')
                {
                   $('.title-error').show(); return false;
                }
                else if(datepick=='')
                { 
                    $('.title-error').hide();
                    $('.datepick-error').show(); return false;
                } 
                else if(0) //else if(description=='')
                { 
                    $('.title-error').hide();
                    $('.description-error').show();
                    $('.datepick-error').hide(); return false;
                }
              else
                { 
                    localStorage.setItem('title',title);
                    localStorage.setItem('description',description);
                    localStorage.setItem('dateofincident',datepick);
                   
                    $('.datepick-error').hide();
                    $('.title-error').hide();
                    $('.description-error').hide();
                    $('#post-job-one').removeClass('md-show');
                    $('#post-job-two').addClass('md-show'); 
                }
           } 
    });
    
    $('.task-continue-two').click(function(e){ e.preventDefault();

         var incedent=$.trim($('#incedent-location').val());
         var deadline = $.trim($('#estimate-deadline').val());
         
         if(incedent=='')
         {
             $('.incedent-location').show(); return false;
        }
         else if(deadline=='')
         {
             $('.incedent-location').hide();
             $('.estimate-deadline').show(); return false;
        }
        else
        {
            $('.incedent-location').hide();
             $('.estimate-deadline').hide();
             
             localStorage.setItem('incedentlocation',incedent);
             localStorage.setItem('estimatedeadline',deadline);
             $('#post-job-three').addClass('md-show');
             $('#post-job-two').removeClass('md-show');
        }   
    });
    
    $('.task-continue-three').click(function(e){ 
        e.preventDefault();
         var budget=$.trim($('#estimate-budget').val());
         
         if(budget=='')
         {
            $('.budget-error').show(); return false;    
         }
         else
         {
             localStorage.setItem('budget',budget);
            $('.budget-error').hide();
            $('#post-job-three').removeClass('md-show');
            $('#post-job-four').addClass('md-show');
         } 
    });
    
    $('.task-submission').click(function(e){
        e.preventDefault();
        $('#post-job-four').addClass('custom-login');
        $('.complain-loader').show();
        var title=localStorage.getItem('title');
        var description=localStorage.getItem('description');
        var dateofincident=localStorage.getItem('dateofincident');
        var budget=localStorage.getItem('budget');
        var incedentlocation=localStorage.getItem('incedentlocation');
        var estimatedeadline=localStorage.getItem('estimatedeadline');
        var token=$('#token_one').val();
        var data={
            '_token': token,
            'title':title,
            'description':description,
            'dateofincident':dateofincident,
            'budget':budget,
            'incedentlocation':incedentlocation,
            'estimatedeadline':estimatedeadline,
        }
        $.ajax({
            url: 'regsiterTask',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(data) {   
                    $('.complain-loader').hide();
                    localStorage.removeItem("title");
                    localStorage.removeItem("description");
                    localStorage.removeItem("dateofincident");
                    localStorage.removeItem("budget");
                    localStorage.removeItem("incedentlocation");
                    localStorage.removeItem("estimatedeadline");
                    window.location.href="mycase";
                    },
            error: function(data) {

                            },
        });
    });
    
});


$(function(){
    
    $('#mobile-verification').click(function(){   
               $('#veri-mobile-popup').addClass('md-show');
        });
    
    $('#card-options').click(function(){
        $('#credit-card-popup').addClass('md-show');
    });
});
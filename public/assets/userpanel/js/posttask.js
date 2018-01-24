$(document).ready(function(){ 
    $('#post-task,.post-task').click(function(){  
        $('#admin-verification').addClass('md-show');
        $('#post-job-one').addClass('md-show'); 
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
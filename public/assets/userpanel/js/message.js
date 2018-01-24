$(function(){ 
    
    /*var token=$('meta[name="csrf-token"]').attr('content');
                  var pusher = new Pusher('47a9b0a92de543b0efe6', {
                    authEndpoint: 'pushauth',
                    auth: {
                      headers: {
                        'X-CSRF-Token': token
                      }
                    }
                  });
*/
        /*          pusher.connection.bind('state_change', function( change ) {
                    var el = $('.user_status');
                    el.removeClass( change.previous );
                    el.addClass( change.current );
                 });*/

                  var channelx = pusher.subscribe('private-messages');

                  channelx.bind('message_notification', function(data) { 
          
                                  $('.message-alert').addClass('on').removeClass('off');
                  });
    
    
    
    
    
       
      
        
});
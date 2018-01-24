<input type="hidden" id="user-type" value="{{Auth::user()->type}}"/>
<script>


    /*  var token=$('meta[name="csrf-token"]').attr('content');
     var pusher = new Pusher('47a9b0a92de543b0efe6', {
     authEndpoint: ' --url("pushauth")-- ',
     auth: {
     headers: {
     'X-CSRF-Token': token
     }
     }
     });
     */

    var channel = pusher.subscribe('presence-messages');

    channel.bind('my_message_event', function (data) {

        var sender = data.sender;
        var reciever = data.reciever;
        var img = data.img;
        var type = $('#user-type').val();

        /*      $('.case-messages_'+sender+'_'+reciever).append('<div class="outer-new"> <span class="new-comment">   <h3> name (mine)</h3>   <p>  '+data.message+'  </p>   </span>       <div class="comment-pic">  <img src="http://dev.thelawapp.com.au/public/userpanel/images/user-icon.png">    </div> </div>');*/

        if ($('.case-messages_' + sender + '_' + reciever).length) {

            $('.case-messages_' + sender + '_' + reciever).append('<div class="inner-new"><div class="comment-pic">  <img src="{{url("asstes/profile_images")}}/' + data.img + '">    </div> <span class="new-comment other_comment">   <h3> ' + data.name + '</h3>   <p>  ' + data.message + '  </p>   </span> </div>');

        }
        else if ($('.case-messages_' + reciever + '_' + sender).length) {

            $('.case-messages_' + reciever + '_' + sender).append('<div class="outer-new"> <span class="new-comment ">   <h3> ' + data.name + '</h3>   <p>  ' + data.message + '  </p>   </span>       <div class="comment-pic">  <img src="{{url("../profile_images/")}}/' + data.img + '">    </div> </div>');
        }
        else {
            //code for lawyer
            if (type == 'lawyer') {
                //  alert(sender); //for lawyer sender is client nd reciver for lawyer

                $('div.client_' + sender).find('span.newmessage').addClass('new message').html('new message');
                $('.message-alert-' + reciever).removeClass('off').addClass('on');
                $('ul.messag-noti-' + reciever).append('<li><a href="{{url("messages")}}/' + sender + '">' + data.name + ' messaged you</a></li>');
                //   alert(reciever);//sender for lawyer nd reciever for client
            }
            else { //sender is client
                $('div.lawyer_' + sender).find('span.newmessage').addClass('new message').html('new message');
                $('.message-alert-' + reciever).removeClass('off').addClass('on');
                $('ul.messag-noti-' + reciever).append('<li><a href="{{url("messages")}}/' + sender + '">' + data.name + ' messaged you</a></li>');
            }
        }

    });


    $('.contact-list').click(function () {

        var message_to = $(this).data('sendto');
        $('#messageto').val(message_to);
        // $('#msg-default').hide();
        //  $('#mymessage').show();
        window.location.href = '{{url("messages/")}}/' + message_to;

    });

    $('.message-submit').click(function () {

        var token = $('meta[name="csrf-token"]').attr('content');

        var sender = $('#messageby').val();
        var message_to = $('#messageto').val();

        var message = $('#message').val();
        $('#message').val('');
        $.ajax({
            url: '{{url("save_messages")}}',
            type: 'POST',
            dataType: 'json',
            data: {'_token': token, 'message_to': message_to, 'message': message, 'sender': sender},
            success: function (data) {


            },
            error: function (data) {

            },
        });

    });


</script>
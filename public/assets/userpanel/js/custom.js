$(document).ready(function() {
    /*----script for header-----*/
    var url = $('meta[name= "baseurl"]').attr('content');

    $.ajax({
        url: url + "/notify",
        type: "GET",
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(data) {
            if (data.length) {
                $('.notification-count').html('Notifications (' + data.length + ')');
                $('div').find('.notification-alert').removeClass('off').addClass('on');
            }
            $.each(data, function(index, value) {

                $('ul.notification-pop').append('<li><a href="' + url + '/cases/' + value.slug + '">' + value.fromName + ' ' + value.NotiTitle + ' ' + value.title + '</a></li>');
            });
        }
    });

    var msgurl = url + '/messages'
    $.ajax({
        url: url + "/messagenotify",
        type: "GET",
        dataType: 'json',
        success: function(data) {
            if (data.length == 0) {
                $('ul.newmessages').append('<li><a href="javascript:;"> Haven\'t recieve any message.</a></li>');
            }
            $.each(data, function(index, data) {
                $('ul.newmessages').append('<li><a href="' + msgurl + '/' + data.messageby.id + ' "> ' + data.messageby.fname + ' messaged you.</a></li>');
                $('.message-notification').append('<li><a href="' + msgurl + '/' + data.messageby.id + ' "> ' + data.messageby.fname + ' messaged you.</a></li>');
            });
        }

    });

    $('#visitcase_one').submit(function(e) {
        e.preventDefault();
        
        $('#firstvisitpop_one').removeClass('md-show');
        $('#firstvisitpop_two').addClass('md-show');
    });

    $('#visitcase_two').submit(function(e) {
        e.preventDefault();
        
       if($('#firstvisitpop_pricing')){
           $('#firstvisitpop_two').removeClass('md-show');
           $('#firstvisitpop_pricing').addClass('md-show');
        }
        if($('#firstvisitpop_pricing').length ==0 ){
            $('#firstvisitpop_two').removeClass('md-show');
            $('#firstvisitpop_three').addClass('md-show');
        }
    });
     
       
    $('#visitcase_pricing').submit(function(e) {
        e.preventDefault();
        
        $('#firstvisitpop_pricing').removeClass('md-show');
        $('#firstvisitpop_three').addClass('md-show');
    });


    $('#visitcase_three').submit(function(e) {
        e.preventDefault();
        
        $('#firstvisitpop_three').removeClass('md-show');
        $('#imageupload').addClass('md-show');
    });


    $('#reviewoffer2').click(function() {
        $('#show_reviews_two').addClass('md-show');
    });

     $('.skills-form').submit(function(e){ e.preventDefault();  addskill(); }); 

    function addskill() {  
        $('.skills-error').html('');
        $('.totalskill-error').html('');
        $('.skills-loader').show();
        var skill_val=$( ".skills:checked" ).map(function() {   return this.id;  }).get(); 
      
        if(skill_val.length > 3){
            alert('You can add only 3 skills in free membership.'); 
            $('.skills-loader').hide();
            return false;
        }
        var totalskills = skill_val.length;
         if(skill_val.length == 0){
            alert('Please select any skills.'); 
            $('.skills-loader').hide();
            return false;
        }

        var skills=$( ".skills:checked" ) .map(function() {   return this.value;  }) .get() .join(); 

        var token = $('#acnt-token').val(); 
        var route = "/addskills";
        var url = $('meta[name="baseurl"]').attr('content')
        $.ajax({
            url: url + route,
            type: 'POST',
            dataType: 'json',
            data: { '_token': token, 'skills':skills, 'totalskills': totalskills, 'skill_id' : skill_val  },
            success: function(data) {
                $('.skills-loader').hide();
                $('.skills-error').html('Skills added successfully');
            },
            error: function(data) {
                $('.skills-loader').hide();
                var obj = jQuery.parseJSON(data.responseText);
                console.log(obj.totalskills);
               if(obj.skills){
                $('.skills-error').html(obj.skills);
               }
                if(obj.totalskills){
                $('.totalskill-error').html(obj.totalskills);
               }
            }
        });
    return false;
}

    $('#find-friend').click(function() {
        $('#findfriend').addClass('md-show');
    });

    $('.startnow').submit(function(e) {

        e.preventDefault();
        localStorage.setItem("firstvisit", false);
        window.location.href = "dashboard";
    });
    /*
   
 $('.dashboard-menu').click(function(){
     $('.dashboard-drop').toggle();

});
*/
    $('#send-verification').click(sendverificationcode);
    $('#send-code').click(sendcode);

    $('.sign-up-link').click(signupclick);

    $('.login-link').click(loginclick);

    $('.md-close').click(closepopup);


/* This is responsible for ajax-login */
    var loginForm = $("#loginForm");
    loginForm.submit(function(e) {
    e.preventDefault();
    $('.login-loader').show();
    var formData = loginForm.serialize();
    $('#form-errors-email').html("");
    $('#form-errors-password').html("");
    $('#form-login-errors').html("");
    $("#email-div").removeClass("has-error");
    $("#password-div").removeClass("has-error");
    $("#login-errors").removeClass("has-error");
    $.ajax({
        url: url + '/login',
        type: 'POST',
        data: formData,
        success: function(data) {
            $('.login-loader').hide();
            $('#loginModal').modal('hide');
            window.location.href =  url + '/dashboard';
        },
        error: function(data) {
            $('.login-loader').hide();
            var obj = jQuery.parseJSON(data.responseText);
            if (obj.email) {
                $("#email-div").addClass("has-error");
                $('#form-errors-email').html(obj.email);
            }
            if (obj.password) {
                $("#password-div").addClass("has-error");
                $('#form-errors-password').html(obj.password);
            }
            if (obj.error) {
                $("#login-errors").addClass("has-error");
                $('#form-login-errors').html(obj.error);
            }
        }
    });
});


 $('#loginForm').submit(storageinfo);
/* End ajax-login */


/* This code is for ajax-registration */
$(document).ready(function(){
    var registerForm = $("#registerForm");
    registerForm.submit(function(e){
        e.preventDefault();
        $('.signipopup').show();
        var formData = registerForm.serialize();
        $( '#register-errors-email' ).html( "" );
        $( '#register-errors-password' ).html( "" );
        $("#register-email").removeClass("has-error");
        $("#register-password").removeClass("has-error");
        var token =  $('meta[name="csrf-token"]').attr('content');
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax({
            url:  url + '/register',
            type:'POST',
            data: {
            '_token': token,
            'email': email,
            'password': password,
            'password_confirmation': password
        },
            success:function(data){
                 $('.signipopup').hide();
                console.log(data);
                $('#modal-4').hide();
                $('#modal-6').show();
                localStorage.setItem("thelawappemail", email);
                $( '#email_second').val(email);
                $('.signipopup').hide();
            },
            error: function (data) {
                 $('.signipopup').hide();
              console.log(data.responseText);
                var obj = jQuery.parseJSON( data.responseText );
                if(obj.email){
                    $("#register-email").addClass("has-error");
                    $( '#register-errors-email' ).html( obj.email );
                }
                if(obj.password){
                    $("#register-password").addClass("has-error");
                    $( '#register-errors-password' ).html( obj.password );
                }
            }
        });
    });
});
/*Ajax registration 1st stape end*/


/* This code is for ajax-registration profile*/
  $( '#email_second').val(localStorage.getItem('thelawappemail'));
$(document).ready(function(){
        var registerProfile = $("#registerProfile");
        registerProfile.submit(function(e){
            e.preventDefault();
            $('.signipopup').show();
            var profileData = registerProfile.serialize();
           // console.log(profileData);
            $( '#profile-fname' ).html( "" );
            $( '#profile-lname' ).html( "" );
            $( '#profile-address' ).html( "" );
            $( '#userType').html( "" );
            $("#fname").removeClass("has-error");
            $("#lname").removeClass("has-error");
            $("#address").removeClass("has-error");
            $("#userTypeDiv").removeClass("has-error");
            var token =  $('meta[name="csrf-token"]').attr('content');
            var email = $('#email').val();
            var password = $('#password').val();
            $.ajax({
                url:  url + '/userLogin',
                type:'POST',
                data: profileData,
                success:function(data){
                    $('.signipopup').hide();
                    localStorage.removeItem("thelawappemail");
                    $('#modal-6').modal('hide');
                    window.location.href =  url + '/dashboard';
                },
                error: function (data) {
                    $('.signipopup').hide();
                    //console.log(data.responseText);
                    var obj = jQuery.parseJSON( data.responseText );
                    if(obj.fname){
                        $("#fname").addClass("has-error");
                        $( '#profile-fname' ).html( obj.fname );
                    }
                    if(obj.lname){
                        $("#lname").addClass("has-error");
                        $( '#profile-lname' ).html( obj.lname );
                    }
                    if(obj.address){
                        $("#address").addClass("has-error");
                        $( '#profile-address' ).html( obj.address );
                    }
                    if(obj.user_type){
                        $("#userTypeDiv").addClass("has-error");
                        $('#userType').html( obj.user_type );
                    }
                }
            });
        });
    });


/*Ajax registration 2nd stape end*/

    $('#add-bank-account').click(function(e) {
        e.preventDefault();
        var acntholder = $.trim($('#acntholder').val());
        var bsb = $.trim($('#bsb').val());
        var acntnumber = $.trim($('#acntnumber').val());

        if (acntholder == '') {
            $('.acntholder').show();
            return false;
        } else {
            $('.acntholder').hide();
        }
        if (bsb == '') {
            $('.bsb').show();
            return false;
        } else {
            $('.bsb').hide();
        }
        if (acntnumber == '') {
            $('.acntnumber').show();
            return false;
        } else {
            $('.acntnumber').hide();
        }

        //  $('.login-popup').addClass('custom-login');
        $('.bsbpopup').show();

        var token = $('#acnt-token').val();
        var route = "/accountdetails";
        var url = $('meta[name="baseurl"]').attr('content')
        $.ajax({
            url: url + route,
            type: 'POST',
            dataType: 'json',
            data: {
                '_token': token,
                'acntholder': acntholder,
                'bsb': bsb,
                'acntnumber': acntnumber
            },
            success: function(data) {
                $('.after-submit').show();
                $('.bsbpopup').hide();
            },
            error: function(data) {
                console.log(data.responseText);
                $('#general-ajax-load').hide();
            },
        });
    });

    //$('#add-skills').click(addskill);

    var firstvisit = localStorage.getItem("firstvisit");
    if (firstvisit == true) {
        $('#imageupload').addClass('md-show');
    }

    var mailpopup = localStorage.getItem("thelawappemail");
    if (mailpopup != null || typeof(mailpopup) == undefined) {
        $('#modal-6').addClass('md-show');
    }
    /*---- script for dashboard---*/
    // $('#imageupload').addClass('md-show');
    //$('#firstvisitpop_one').addClass('md-show');
    //$('#admin-verification').addClass('md-show');
    $('ul#dashboard li').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
    });
    /*-----------dashboard-------*/
    $('#add-description').click(function(e) {
        e.preventDefault();

        var decri = $('#decri').val();
        var token = $('#acnt-token').val();
        var baseurl = $('meta[name="baseurl"]').attr('content');
        if ($.trim(decri) == '') {
            $('#decri').css('border-color:red');
            $('.err-description').show();
            return false;
        }
        $('.dex').show();
        var url = baseurl + '/savedescription';
        $.post(url, {
            'description': decri,
            '_token': token
        }, function(data) {

        }).done(function() {
            $('.err-description').hide();
            $('.saved-desc').show();
        }).fail().always(function() {
            $('.dex').hide();
        });
    });


    /*---mytask image upload--*/

    $("#incident-pic").change(function() {
        if ($('#incident-pic').get(0).files.length !== 0) {
            $('#mytask-image-upload').show();
        }
        /*    var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test( files[0].type)){ // only image file
              var reader = new FileReader(); // instance of the FileReader
              reader.readAsDataURL(files[0]); // read the local file

              reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview_two").attr("src", this.result);
              }
            } */
    });
    /*=============mytask page things===========*/
    $('#mytask-image-upload').click(function() {

        var token = $('meta[name="csrf-token"]').attr('content');
        var baseurl = $('meta[name="baseurl"]').attr('content');
        var input = $('#incident-pic').val();
        var taskid = $('#taskid').val();


        formData = new FormData();
        formData.append('_token', $('#token').val());
        formData.append('taskid', taskid);

        for (var i = 0, len = document.getElementById('incident-pic').files.length; i < len; i++) {
            formData.append("incident-pic-" + i, document.getElementById('incident-pic').files[i]);
        }

        $.ajax({
            url: baseurl + "/uploadtaskimages",
            type: "POST",
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#general-ajax-load').hide();
                $.each(data, function(index, data) {
                    $('.taskimages').append('<span><img class="my_task_attach_pic"   src="../../taskdocs/' + data.name + '"  style="width:75px" /><i class="fa cut fa-times-circle delete-tf" aria-hidden="true" data-id="' + data.tid + '"></i> </span>');
                });
            }
        });
    });


    /*======portfolio delete images====*/
    $('.taskimages').on('click', '.delete-tf', function(e) {
        
        e.stopPropagation();
        var id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        var url = $('meta[name="baseurl"]').attr('content');
        $.ajax({
            url: url + "/delete_mytask_doc", // our php file
            type: 'POST',
            data: {
                '_token': token,
                'id': id
            },
            dataType: 'json',
            success: $.proxy(function(value) {

                $(this).parent().remove();

            }, this),
            error: function(request) {

            }
        });
    });
})

$(function() {
    $("#pic").on("change", function() {
        if ($('#pic').get(0).files.length !== 0) {
            $('button#image-upload').show();
        }
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() { // set image data as background of div
                $("#imagePreview_one").attr("src", this.result);
            }
        }
    });

});

$(function() {
    $('#upload-image-popup').submit(function(e) {
        e.preventDefault();
        //  $('#imageupload').addClass('custom-login');
        $('#general-ajax-load').show();
        var input = document.getElementById("pic");
        file = input.files[0];
        if (file != undefined) {

            formData = new FormData();
            formData.append('_token', $('#token').val());
            if (!!file.type.match(/image.*/)) {
                formData.append("image", file);
                $.ajax({
                    url: url + "/uploadimage",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#general-ajax-load').hide();
                        window.location.href = "dashboard";
                    }
                });
            } else {
                //alert('Not a valid image!');
            }
        } else {
            //alert('Input something!');
        }

    });



    $('#picprofile').click(function(e) {
        e.preventDefault();
        //  $('#imageupload').addClass('custom-login');
        $('#general-ajax-load').show();
        var input = document.getElementById("pic");
        var url = $('meta[name="baseurl"]').attr('content');
        file = input.files[0];
        if (file != undefined) {

            formData = new FormData();
            formData.append('_token', $('#token').val());
            if (!!file.type.match(/image.*/)) {
                formData.append("image", file);
                $.ajax({
                    url: url + "/uploadimage",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#general-ajax-load').hide();
                        window.location.href = url + "/dashboard";
                    }
                });
            } else {
                //alert('Not a valid image!');
            }
        } else {
            //alert('Input something!');
        }

    });
});


function signupclick() {
    if ($('#modal-5').hasClass('md-show')) {
        $('#modal-5').removeClass("md-show");
    }

    $('#modal-4').addClass("md-show");
}

function loginclick() {
    if ($('#modal-4').hasClass('md-show')) {
        $('#modal-4').removeClass("md-show");
    }
    $('#modal-5').addClass("md-show");
}

function sendverificationcode(e) {
    e.preventDefault();
    //     $('#verifymob').addClass('md-show'); return false;
    var token = $('#token-verify').val();
    var verifiemobile = $.trim($('#verifie-mobile').val());
    var url = $('meta[name="baseurl"]').attr('content');
    if (verifiemobile == '') {
        $('.mobile-error').hide();
        $('.verify-error').show();
        return false;
    } else {
        //$('#imageupload').addClass('custom-login');
        $('.num-loader').show();
    }

    $.ajax({
        url: url + '/numberverification',
        type: 'POST',
        dataType: 'json',
        data: {
            '_token': token,
            'verifiemobile': verifiemobile
        },
        success: function(data) {

            if (data.status == 10) {
                $('.concurrent-error').show();
                return false;
            }
            if (data.status == 3) {
                $('.verify-error').hide();
                $('.mobile-error').show();
                $('.num-loader').hide();
                return false;
            }
            if (data.status == 0) {
                $('#request_id').val(data.request_id);
                $('#req_mob').val(verifiemobile);
            }
            $('#verifymob').addClass('md-show');
            $('.num-loader').hide();
        },
        error: function(data) {

        },
    });
}



function sendcode(e) {
    var code = $('#verify-code').val();
    if ($.trim(code) == '') {
        $('.code-error').show();
        return false;
    } else {
        $('.code-error').hide();
    }
    var requestid = $('#request_id').val();
    var token = $('#token_code').val();
    var mob = $('#req_mob').val();
    var url = $('meta[name="baseurl"]').attr('content');
    $.ajax({
        url: url + '/sendverification',
        type: 'POST',
        dataType: 'json',
        data: {
            '_token': token,
            'requestid': requestid,
            'verifycode': code,
            'mob': mob
        },

        success: function(data) {
            $('#verifymob').removeClass('md-show');
            $('.num-loader').hide();
            if (data.status == 0) {
                $('.mobile-error').hide();
                $('.verification-success').show();
            }
        },
        error: function(data) {

        },
    });

    return false;
}


function closepopup() {

    var parent = $(this).parent().parent();
    parent.removeClass('md-show');

}

function storageinfo(e) {
    localStorage.removeItem("thelawappemail");
    localStorage.setItem("firstvisit", true);
}


/*------jquery for mytask page task--*/
$(document).ready(function() {
    /*---code for mycase list click---*/
    $('.my-task').click(function() {

        $('div.onsubmitact').remove();
        var id = $(this).attr('id');
        $('#task-default').hide();
        $('#mytask').show();
        $('#mytask').addClass('load-data');
        var url = $('meta[name="baseurl"]').attr('content');
        var slug = $(this).data('slug');
        //   var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname +'/'+slug;
        // window.history.pushState({path:newurl},'',newurl);

        $('.myt').show();
        var token = $('#token').val();
        $.ajax({
            url: url + '/ajaxtask',
            type: 'POST',
            dataType: 'json',
            data: {
                '_token': token,
                'id': id
            },
            success: function(data) {
                //                $('#mytask').html(data);

                var title = data.title;
                var status = data.status;
                var price = data.price;
                var fname = data.fname;
                var lname = data.lname;
                var fullname = data.fname + ' ' + data.lname;
                var task_id = data.task_id;
                var task_user_id = data.task_user_id;
                var description = data.description;
                var no_of_comments = data.comment_count;
                var img = data.img;
                var comments = data.comment_sec;
                var img = data.img;
                var assigned = data.asignee;
                var taskdoc = data.taskdoc;
                $('.taskimages').html(taskdoc);
                //var bid = data.bid;

                if (assigned != 0) {
                    $('.review-offers').hide();
                    $('a#rassined').text(assigned);
                    $('.review-assignee').show();
                } else {
                    $('.review-assignee').hide();
                    $('.review-offers').show();
                }


                switch (status) {
                    case 'offers':
                        $('.reviewclass').removeClass('inactive');
                        $('#reviewoffer').html('Review offers');
                        $('.reviewclass').css('pointer-events', 'auto');
                        $('li#m-accepted').removeClass('active');
                        $('li#m-complete').removeClass('active');
                        break;

                    case 'nooffer':
                        $('#reviewoffer').html('Awaiting offers');
                        $('.reviewclass').css('pointer-events', 'none');
                        $('.reviewclass').addClass('inactive');

                        $('li#m-accepted').removeClass('active');
                        $('li#m-complete').removeClass('active');
                        break;

                    case 'accept':
                        $('#reviewoffer').html('Task Assigned');
                        $('.reviewclass').css('pointer-events', 'none');
                        $('.reviewclass').addClass('inactive');
                        $('li#m-accepted').addClass('active');
                        $('li#m-complete').removeClass('active');
                        break;

                    case 'complete':
                        $('#reviewoffer').html('Complete');
                        $('.reviewclass').css('pointer-events', 'none');
                        $('.reviewclass').addClass('inactive');
                        $('li#m-accepted').addClass('active');
                        $('li#m-complete').addClass('active');
                        break;

                    case 'expired':
                        $('#reviewoffer').html('Expired');
                        $('.reviewclass').css('pointer-events', 'none');
                        $('ul.myclass-list').hide();
                        $('ul.myclass-list-two').show();
                        $('li#m-expired').addClass('active');
                        $('.reviewclass').addClass('inactive');
                }


                $('#reviewoffer').data('taskid', task_id);

                /*        if(status!='open')
                        {
                            $('#makeoffer').html('Assigned');
                      }
                   */
                var arrClasses = [];
                $('.attach-file-section').removeClass(function() {
                    var className = this.className.match(/task_\d+/);
                    if (className) {
                        arrClasses.push(className[0])
                        return className[0];
                    }
                });

                $('.attach-file-section').addClass('task_' + task_id);

                $('.task-up-image').attr('src', img);
                $('#title').html(title);
                $('#fullname').html('Posted by ' + fullname + ' 2 hours ago');
                $('#price').html('$ ' + price);
                $('#description').html(description);
                $('.count_comment').html(no_of_comments + ' comments about this Task');
                $('.list_comments').html(comments);
                $('#general-ajax-load').hide();
                $('#taskid').val(task_id);


            },
            error: function(data) {

                $('#general-ajax-load').hide();
            },
        });

        var mapCanvasTwo = document.getElementById("map_two");
        google.maps.event.trigger(mapCanvasTwo, 'resize');


    });
    /*----end of code--*/
    /*---code for browse case--*/

    $('.browse-case').click(function() {
        $('div.onsubmitact').remove();
        var id = $(this).attr('id');
        $('#task-default').hide();
        $('#mytask').show();
        $('#mytask').addClass('load-data');
        var url = $('meta[name="baseurl"]').attr('content');
        //$('#general-ajax-load').show();
        $('.myt').show();
        var token = $('#token').val();
        $.ajax({
            url: url + '/ajaxbrowsecase',
            type: 'POST',
            dataType: 'json',
            data: {
                '_token': token,
                'id': id
            },
            success: function(data) {

                var title = data.title;
                var status = data.status;
                var price = data.price;
                var fname = data.fname;
                var lname = data.lname;
                var fullname = data.fname + ' ' + data.lname;
                var task_id = data.task_id;
                var task_user_id = data.task_user_id;
                var description = data.description;
                var no_of_comments = data.comment_count;
                var img = data.img;
                var comments = data.comment_sec;
                var img = data.img;
                var assigned = data.asignee;
                var arrClasses = [];
                var taskdoc = data.taskdoc;
                $('.ltaskimages').html(taskdoc);
                $('.attach-file-section').removeClass(function() {
                    var className = this.className.match(/task_\d+/);
                    if (className) {
                        arrClasses.push(className[0])
                        return className[0];
                    }
                });

                if (assigned !== 0) {
                    $('.reviewee').hide();
                    $('a#assignedto').text(assigned);
                    $('.assignee').show();
                } else {
                    $('.assignee').hide();
                    $('.reviewee').show();
                }
                //    offered,notoffered,complete,accepted,assigned
                switch (status) {
                    case 'offered':

                        $('#makeoffer').html('You have made offer');
                        $('.offerclass').css('pointer-events', 'none');
                        $('.offerclass').addClass('inactive');

                        $('ul.task-status li#accept').removeClass('active');
                        $('ul.task-status li#complete').removeClass('active');

                        break;
                    case 'notoffered':
                        $('#makeoffer').html('Make an offer');
                        $('.offerclass').css('pointer-events', 'auto');
                        $('.offerclass').removeClass('inactive');

                        $('ul.task-status li#accept').removeClass('active');
                        $('ul.task-status li#complete').removeClass('active');
                        break;
                    case 'complete':
                        $('#makeoffer').html('Completed');
                        $('.offerclass').css('pointer-events', 'none');
                        $('.offerclass').addClass('inactive');

                        $('ul.task-status li#accept').addClass('active');
                        $('ul.task-status li#complete').addClass('active');
                        break;
                    case 'accepted':
                        $('#makeoffer').html('Offer Accepted');
                        $('.offerclass').css('pointer-events', 'none');
                        $('.offerclass').addClass('inactive');

                        $('ul.task-status li#accept').addClass('active');
                        $('ul.task-status li#complete').removeClass('active');
                        break;
                    case 'assigned':
                        $('#makeoffer').html('Assigned');
                        $('.offerclass').css('pointer-events', 'none');
                        $('.offerclass').addClass('inactive');
                        //                                           
                        $('ul.task-status li#accept').addClass('active');
                        $('ul.task-status li#complete').removeClass('active');
                        break;
                }


                $('.attach-file-section').addClass('task_' + task_id);
                $('.task-up-image').attr('src', img);
                $('#title').html(title);
                $('#fullname').html('Posted by ' + fullname + ' 2 hours ago');
                $('#price').html('$ ' + price);
                $('#description').html(description);
                $('.count_comment').html(no_of_comments + ' comments about this Task');
                $('.list_comments').html(comments);
                $('#general-ajax-load').hide();
                $('#taskid').val(task_id);

            },
            error: function(data) {

                $('#general-ajax-load').hide();
            },
        });
        var mapCanvasTwo = document.getElementById("map_two");
        google.maps.event.trigger(mapCanvasTwo, 'resize');
    });
    /*---end of code---*/

    $('body').on('click', '.tsk-drop', function() {
        $('#tsk-down').toggle(slow);

    });

});

/*$('body').on('click','#review',function(){ $('#modal-review').addClass('md-show'); });*/
$('body').on('mouseover', '#outer-div', function(e) {
    $(".map-task").addClass('map-effect');
});
$('body').on('click', '#outer-div', function() {
    $(".map-task").removeClass('map-effect');
});
$('body').on('click', '#tsk-drop', function() {
    $('#tsk-down').toggle();
});
/*$('body').on('click', '#makeoffer,.offer-first', function() {


    var token = $('meta[name="csrf-token"]').attr('content');
    var url = $('meta[name="baseurl"]').attr('content');
    $.post(url + '/admin_verification', {
        '_token': token
    }, function(data) {
        if (data == 'unverified') {
            $('#admin-verification').addClass('md-show');
            return false;

        } else {
            var taskid = $('#taskid').val();
            $('#bidtaskid').val(taskid);
            $('#make-offer-one').addClass('md-show');
        }
    }).done();



});*/


/*Pusher.logToConsole = true;*/
var token = $('meta[name="csrf-token"]').attr('content');
var url = $('meta[name="baseurl"]').attr('content');
var pusher = new Pusher('47a9b0a92de543b0efe6', {
    authEndpoint: url + '/pushauth',
    auth: {
        headers: {
            'X-CSRF-Token': token
        }
    }
});

//Pusher.channel_auth_endpoint = 'auth.php';

// Connect
//var pusher = new Pusher( '47a9b0a92de543b0efe6' );
pusher.connection.bind('state_change', function(change) {
    var el = $('.user_status');
    el.removeClass(change.previous);
    el.addClass(change.current);
});

var channel = pusher.subscribe('presence-messages');

/*var pusher = new Pusher('47a9b0a92de543b0efe6', {
  encrypted: true
});
*/
//Pusher.channel_auth_endpoint = 'auth.php';

//var channel = pusher.subscribe('test_channel');
channel.bind('my_event', function(data) {
    //alert(data.message);
    $('#comment').val('');
    var uname = $('#user_name').val();
    var image = $('#image_name').val();
    var authid = $('#comment_by').val();
    var taskid = data.taskid;

    //alert(data);return false;
    /*     var new_comment = "<div class='outer-ajaxbrowsecase'><div class='posted-pic'>";
          new_comment +="<img src='http://localhost/larafive/public/../profile_images/1477311611919_stepone.png'>";
          new_comment +="<p>"+uname+"</p></div>";
          new_comment +="<span class='old-comments'><h4>"+uname+"</h4><p>"+data.message+"</p></span></div>"; */

    if (parseInt(authid) == parseInt(data.from)) {
        var new_comment = "<div class='outer-new onsubmitact'><span class='new-comment'><h3>" + uname + "</h3><p>" + data.message + "</p></span><div class='comment-pic'><img src='" + image + "'/></div><div>";
    } else {
        var new_comment = "<div class='outer-ajaxbrowsecase onsubmitact'> <div class='posted-pic'>  <img src='" + image + "'/>  <p>" + uname + "</p></div>   <span class='old-comments'><h4>" + uname + "</h4>  <p>" + data.message + "</p></span></div>";
    }
    $('.task_' + taskid).before(new_comment);


});


channel.bind('pusher:subscription_succeeded', getOnlineUsers);

function getOnlineUsers() {
    //alert('onlineuser');
    var cl = $('#comment_by').val();
    $('.user_' + cl).addClass('onlineuser');
}

channel.bind('pusher:member_added', addMember);

function addMember() {
    /*  var cl=$('#comment_by').val(); alert(cl);
      $('#user_'+cl).addClass('onlineuser'); */
}

channel.bind('pusher:member_removed', removeMember);

function removeMember() {
    var cl = $('#comment_by').val();
    $('#user_' + cl).removeClass('onlineuser');
}

function save_comment(message) {
    var taskid = $.trim($('#taskid').val());
    var token = $('#token').val();
    var comment_by = $('#comment_by').val();
    var url = $('meta[name="baseurl"]').attr('content');
    $.ajax({
        url: url + '/ajax_save_comment',
        type: 'POST',
        dataType: 'json',
        data: {
            '_token': token,
            'taskid': taskid,
            'comment_by': comment_by,
            'comments': message
        },
        success: function(data) {
            $('#comment').val('');

        },
        error: function(data) {

        },
    });
}


$('#comment').keyup(function() {
    var len = $('#comment').val().length;
    var remain = parseInt(500) - len;
    $('.characters-remaining').html(remain + ' characters remaining');
    $('.comment-submit').prop('disabled', false)

});

$('.comment-submit').click(function() {

    // Enable pusher logging - don't include this in production
    var spantext = $.trim($('#comment').val());
    var taskid = $.trim($('#taskid').val());
    var token = $('#token').val();
    var comment_by = $('#comment_by').val();
    var url = $('meta[name="baseurl"]').attr('content');
    if (spantext == '') {
        $('#comment').css('border-color', 'red')
        $('.textarea-error').show();
        return false;
    }

    var src = $('.posted-pic img').attr('src');

    save_comment(spantext);

    $.ajax({
        url: url + '/pusher',
        type: 'POST',
        //dataType: 'json',
        data: {
            '_token': token,
            'taskid': taskid,
            'comment_by': comment_by,
            'comments': spantext
        },
        success: function(data) {},
        error: function(data) {

            //alert("ksdfdskaf");return false;
        },
    });

})

$('body').on('click', '.offer-continue-one', function(e) {
    e.preventDefault();
    //   $('#make-offer-one').removeClass('md-show');
    //  $('#make-offer-two').addClass('md-show');
    var token = $('#bidtoken').val();
    var taskid = $('#bidtaskid').val();
    var description = $('#biddescript').val();
    var offerprice = $('#offerprice').val();
    var url = $('meta[name="baseurl"]').attr('content');

    if ($.trim(offerprice) == '') {
        $('.offer-error').show();
        return false;

    } else if ($.trim(description) == '') {
        $('.desc-error').show();
        return false;

    }
    $.ajax({
        url: url + '/make_offer',
        type: 'POST',
        dataType: 'json',
        data: {
            '_token': token,
            'taskid': taskid,
            'description': description,
            'offerprice': offerprice
        },
        success: function(data) {
            $('.post-job-common').removeClass('md-show');
            window.location.href = url + '/cas';

        },
        error: function(data) {


        },
    });

});

$(document).on('click', '.load-data', function() {
    $(window).resize();
});


$(function() {

    $('.userprofile-addcard-popup').submit(function(e) {
        e.preventDefault();
        $('.success').hide();
        var nameoncard = $.trim($('.nameoncard').val());
        var cnum = $.trim($('.card-num').val());
        var expmonth = $.trim($('.card-month').val());
        var expiryyear = $.trim($('.card-year').val());
        var cvc = $.trim($('.popcvc').val());
        var url = $('meta[name="baseurl"]').attr('content');

        var token = $("input[name='_token']").val();
        $.post(url + '/cardverification', {
                '_token': token,
                'cnum': cnum,
                'cvc': cvc,
                'expmonth': expmonth,
                'expiryyear': expiryyear,
                'nameoncard': nameoncard
            })
            .done(function(data) {
                var data = $.parseJSON(data);
                if (data.message == 'ok') {
                    $('.success').show();
                    window.location.href = url + "/verification";
                } else {
                    $('.cvv-error').html(data.message);
                    $('.cvv-error').show();
                }
            }).fail();

    });


});
/*=====code for skills======*/
$(function() {

    $('.skills-form-page').submit(function(e) {
        e.preventDefault();
        var data = $('.skills-form-page').serialize();
        var url = $('meta[name= "baseurl"]').attr('content');
        $.post(url + '/saveskills', data).done();
    });
});


$(document).ready(function() {

    $('.task-continue-one').click(function(e) {
        e.preventDefault();

        if ($('#header').hasClass('loggedout')) {
            $('#modal-5').addClass('md-show');
        } else {

            var title = $.trim($('#case-title').val());
            var description = $.trim($('#description-task').val());
            var datepick = $.trim($("input[name=date_of_incedent]").val());
            var category = $.trim($('#categori').val())
            
            if (title == '') {
                $('.title-error').show();
                return false;
            } else if (datepick == '') {
                $('.title-error').hide();
                $('.datepick-error').show();
                return false;
            } else if (category == '') {
                $('.categori-error').show();
                $('.datepick-error').hide();
                return false;
            } else if (0) //else if(description=='')
            {
                $('.title-error').hide();
                $('.description-error').show();
                $('.datepick-error').hide();
                return false;
            } else {
                localStorage.setItem('title', title);
                localStorage.setItem('description', description);
                localStorage.setItem('dateofincident', datepick);
                localStorage.setItem('category_id', category);

                $('.datepick-error').hide();
                $('.title-error').hide();
                $('.description-error').hide();
                $('#post-job-one').removeClass('md-show');
                $('#post-job-two').addClass('md-show');
            }

        }
    });

    $('.task-continue-two').click(function(e) {
        e.preventDefault();

        var incedent = $.trim($('#incedent-location').val());
        var deadline = $.trim($('#estimate-deadline').val());

        if (incedent == '') {
            $('.incedent-location').show();
            return false;
        } else if (deadline == '') {
            $('.incedent-location').hide();
            $('.estimate-deadline').show();
            return false;
        } else {
            $('.incedent-location').hide();
            $('.estimate-deadline').hide();

            localStorage.setItem('incedentlocation', incedent);
            localStorage.setItem('estimatedeadline', deadline);
            $('#post-job-three').addClass('md-show');
            $('#post-job-two').removeClass('md-show');
        }


    });

    $('.task-continue-three').click(function(e) {
        e.preventDefault();
        var budget = $.trim($('#estimate-budget').val());

        if (budget == '') {
            $('.budget-error').show();
            return false;
        } else {
            localStorage.setItem('budget', budget);
            $('.budget-error').hide();
            $('#post-job-three').removeClass('md-show');
            $('#post-job-four').addClass('md-show');
        }
    });

    $('.task-submission').click(function(e) {
        e.preventDefault();
        $('#post-job-four').addClass('custom-login');
        $('.complain-loader').show();
        var title = localStorage.getItem('title');
        var description = localStorage.getItem('description');
        var category_id = localStorage.getItem('category_id');
        var dateofincident = localStorage.getItem('dateofincident');
        var budget = localStorage.getItem('budget');
        var incedentlocation = localStorage.getItem('incedentlocation');
        var estimatedeadline = localStorage.getItem('estimatedeadline');
        var token = $('#token_one').val();
        var url = $('meta[name="baseurl"]').attr('content');
        var data = {
            '_token': token,
            'title': title,
            'description': description,
            'category_id': category_id,
            'dateofincident': dateofincident,
            'budget': budget,
            'incedentlocation': incedentlocation,
            'estimatedeadline': estimatedeadline,
        }
        $.ajax({
            url: url + '/regsiterTask',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(data) {
                $('.complain-loader').hide();
                localStorage.removeItem("title");
                localStorage.removeItem("category_id");
                localStorage.removeItem("description");
                localStorage.removeItem("dateofincident");
                localStorage.removeItem("budget");
                localStorage.removeItem("incedentlocation");
                localStorage.removeItem("estimatedeadline");
                window.location.href = "mycase";
            },
            error: function(data) {

            },
        });
    });

});


$(function() {

    $('#mobile-verification').click(function() {
        $('#veri-mobile-popup').addClass('md-show');
    });

    $('#card-options').click(function() {
        $('#credit-card-popup').addClass('md-show');
    });
});

/*====review js===========*/

$(document).ready(function() {
    $('#reviewoffer').click(function() {
        $('#owl-popup-three ').empty();
        //fadeOut(function(){  
        $('#owl-popup-three').text(' ');
        var taskid = $(this).data('taskid');
        var url = $('meta[name= "baseurl"]').attr('content');
        localStorage.setItem('taskid', taskid);
        var token = $('#acnt-token').val();
        $.post(url + '/reviews', {
            'taskid': taskid,
            '_token': token
        }, function(data) {
            data = $.parseJSON(data);
            var html = ' ';
            var str = '';
            // var count=43;
            $.each(data, function(ind, data) {
                // count=count+4;
                var fname = data.fname;
                var lname = data.lname;
                var offerprice = data.offer_price;
                var description = data.description;
                var img = data.users.profile_image;
                var offer = data.offer_price;
                var userid = data.users.id;
                var taskid = data.task_id;
                var headerimage = data.users.header_image;

                var fullname = fname + ' ' + lname;
                var windowpath = window.location.protocol + "//" + window.location.host + "/";

                /*   html += "<div class='item'>"; 
                   html += "<span>"+fname+"</span></br>";
                   html += "<span>"+lname+"</span></br>";
                   html += "</div>";  */
                var imgsrc = "<div class='posted-pic '><img style='width:15px ' class='profile_pic task-up-image' src=" + "/public/assets/profile_images/" + img + "/></div>";

                var reviewprofileimg = "<div class='posted-pic '><img style='width:15px ' class='profile_pic task-up-image' src=" + "/public/assets/profile_images/" + img + "/></div>";

                html = "<div class='item'>";

                //        html = html.concat("<div class='bottom_but'> <button  class='button-cta button-lrg  prev'>Previous</button> <button  class='button-cta button-lrg  next'>Next</button></div>");

                html = html.concat("<div class='common-inner-form'>");

                html = html.concat("<div class='header-image-and-avatar center'>  <div  class='header-image' >  <img src='/header_images/" + headerimage + "'></div><div class='avatar-img1' ><img src='/profile_images/" + img + "'></div></div>");

                html = html.concat("<div class='name-and-offer'><div class='left'><div class='user-name-holder'>  <a class='user-name' href='javascript:;'>" + fullname + "</a>   </div>  <div class='inline-rating'><div class='rating-summary-holder'>          <div class='rating'><p class='star'> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star-half-o' aria-hidden='true'></i></span> </p> </div>  </div>  </div>  <div class='completion-rate'><span>71% Completion Rate</span></div> </div>  <div class='right'> <div class='offer-text right'>OFFER:</div>      <div class='task-price'>  <div class='currency-symbol'>$</div>  <div class='price'>" + offer + "</div>  </div></div>    <div class='clear'></div></div>");

                html = html.concat("<h5 class='splitter-section-name'>Latest Reviews</h5>");

                html = html.concat("<div class='comment1'>â€œ" + description + "â€</div>");


                html = html.concat("<div class='reviews'><div class='review-item' ><div class='review-picture'>         <div class='avatar-img1 interactive' href=''> <img src='userpanel/images/avat.jpg'> </div>  </div><div class='title-body-date'> <div class='rating'><p class='star'> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star' aria-hidden='true'></i></span> <span><i class='fa fa-star-half-o' aria-hidden='true'></i></span> </p>  </div> <div class='date'>12 days ago</div><div class='task-title'>Clean my 2 bedroom / 1 bathroom house</div>  <div><div class='user-name-holder'><div class='user-name'>K g K.</div></div> said <div class='body'>â€œVery hard working guy,and very polite and well manneredâ€</div></div> </div>  <div class='clear'></div> </div>  </div>");

                html = html.concat("<span> <button  data-task=" + taskid + " data-name='" + fullname + "' data-img='" + img + "' data-userid='" + userid + "' data-price='" + offerprice + "' class='button-cta button-lrg center accept-offer'>Accept Offer</button> </span>");

                html = html.concat("</div></div>");

                str += html;

            });


            var img = $(str).hide();
            $("#owl-popup-three").data('owlCarousel').addItem(img.fadeIn());


        }).done().fail().always($('#show_reviews').addClass('md-show'));

        // });


    });


    $('#owl-popup-three').on('click', '.accept-offer', function() {

        var userid = $(this).data('userid');
        var img = $(this).data('img');
        var name = $(this).data('name');
        var totalprice = $(this).data('price');
        var token = $('#acnt-token').val();
        var taskid = $(this).data('task');
        var url = $('meta[name="baseurl"]').attr('content');
        localStorage.setItem('price', $(this).data('price'));
        localStorage.setItem('userid', $(this).data('userid'));
        localStorage.setItem('taskid', $(this).data('task'));


        $.ajax({
            url: url + '/checkcard',
            data: {
                'userid': userid,
                '_token': token
            },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $('div.pay-now-div').empty();
                if (data.ok == 1) {
                    $('.bidder-image').attr('src', '/profile_images/' + img);
                    $('.bidname').html(name);
                    $('.dprice').html('$ ' + totalprice);

                    $('div.pay-now-div').append("<span class='onecard'><input type='hidden' id='fulcard' value='" + data.fcardnumber + "'><ul class='card-details-popup'>  <li>  <img src='../images/card-icon.png'/>  " + data.cardtype + "******" + data.cardnumber + "</br>" + data.expiremonth + "/" + data.expireyear + " Expiry date <a href='javascript:;' id='upcard'>update</a></br><p>CVC</p>                                                    <input style='width:80px' type='text' id='scvc' name='cvc' value='' required> </li> <li><button type='button' id='pay-card-popup' class='button-cta'>Pay for case</button></li> </ul></span>");


                }
                if (data.ok == 0) {
                    $('.pay-now-div').hide();
                    $('#update_card').show();
                }
                $('#show_reviews').removeClass('md-show');
                $('#payoffer').addClass('md-show');
            }
        });

        return false;
    });


    $('div.pay-now-div').on('click', 'a#upcard', function() {

        $('.pay-now-div').hide();
        $('#update_card').show();

    });

    $('a#review-back').click(function() {
       
        $('.pay-now-div').show();
        $('#update_card').hide();
    });

    $('#payforcase').submit(function(e) {
        e.preventDefault();
        var token = $('meta[name="csrf-token"]').attr('content');
        var userid = localStorage.getItem('userid');
        var price = localStorage.getItem('price');
        var taskid = localStorage.getItem('taskid');
        var url = $('meta[name="baseurl"]').attr('content');

        $.ajax({
            url: url + '/acceptoffer',
            type: 'post',
            dataType: 'json',
            data: {
                '_token': token,
                'userid': userid,
                'taskid': taskid,
                'price': price
            },
            success: function(data) {

            }

        });

    });


    /**accept and assigne the case--*/

    $('.pay-now-div').on('click', '#pay-card-popup', function() {
        $('.card-loader').show();
        var token = $('meta[name="csrf-token"]').attr('content');
        var userid = localStorage.getItem('userid');
        var price = localStorage.getItem('price');
        var taskid = localStorage.getItem('taskid');
        var fcard = $('#fulcard').val();
        var cvc = $('#scvc').val();
        var url = $('meta[name= "baseurl"]').attr('content');
        $.ajax({
            url: url + '/paytoadmin',
            type: 'POST',
            dataType: 'json',
            data: {
                '_token': token,
                'taskid': taskid,
                'paidto': userid,
                'price': price,
                'cardno': fcard
            },
            success: function(data) {
               // console.log(data);
                if (data == 'ok') {
                   
                    $('.card-loader').hide();
                    window.location.href = "";
                }
            },
            error: function(data) {

            },
        });


    });


});

/*----update you card--*/
$(function() {

    $('#updated-card-popup').click(function(e) {
        e.preventDefault();

        var nameoncard = $.trim($('#nameoncard').val());
        var cnum = $.trim($('#cardnum').val());
        var expmonth = $.trim($('#expirymonth').val());
        var expiryyear = $.trim($('#expiryyear').val());
        var cvc = $.trim($('#cvc').val());
        var url = $('meta[name="baseurl"]').attr('content');
        if (nameoncard == '') {
            $('#nameoncard').css('border-color', 'red');
            return false;
        }
        if (cnum == '') {
            $('#cardnum').css('border-color', 'red');
            return false;
        }
        if (expmonth == '') {
            $('#expirymonth').css('border-color', 'red');
            return false;
        }
        if (expiryyear == '') {
            $('#expiryyear').css('border-color', 'red');
            return false;
        }
        if (cvc == '') {
            $('#cvc').css('border-color', 'red');
            return false;
        }


        var token = $("input[name='_token']").val();
        $.post(url + '/cardverification', {
            '_token': token,
            'cnum': cnum,
            'cvc': cvc,
            'expmonth': expmonth,
            'expiryyear': expiryyear,
            'nameoncard': nameoncard
        }).done(function(data) {
            var data = $.parseJSON(data);
            if (data.message == 'ok') {
                window.location.href = url + '/cardverification';
            } else {
                $('.error').html(data.message);
                $('.error').show();
            }
        }).fail();

    });

    $('#update-card').click(function() {
        $('ul.card-details').hide();
        $('ul.add-card').show();
    });

});
/*------------------------------------------*/
$(function() {

    $('#picp').change(function() {
        $('#profile-image-upload').show();
    });


    $('#profile-image-upload').click(function(e) {
        e.preventDefault();
        //  $('#imageupload').addClass('custom-login');
        $('#general-ajax-load').show();
        var url = $('meta[name="baseurl"]').attr('content');
        var token = $('meta[name="csrf-token"]').attr('content');
        var input = document.getElementById("picp");
        file = input.files[0];

        formData = new FormData();
        formData.append('_token', token);
        formData.append("image", file);
        $.ajax({
            url: url + "/uploadimage",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#general-ajax-load').hide();
                window.location.href = "dashboard";
            }
        });



    });

    /*---------header------*/

    $('#upload-header-image').change(function(e) {
        e.preventDefault();
        //  $('#imageupload').addClass('custom-login');
        $('#general-ajax-load').show();
        var url = $('meta[name="baseurl"]').attr('content');
        var token = $('meta[name="csrf-token"]').attr('content');
        var input = document.getElementById("upload-header-image");
        file = input.files[0];
        formData = new FormData();
        formData.append('_token', token);
        formData.append("image", file);

        if ($('#upload-header-image').get(0).files.length !== 0) {

            $.ajax({
                url: url + "/headerimage",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#general-ajax-load').hide();
                    window.location.href = "";
                }
            });
        }
    });
});


var url = $('meta[name= "baseurl"]').attr('content');
//Pusher.logToConsole = true;
var token1 = $('meta[name="csrf-token"]').attr('content');
var pusher1 = new Pusher('47a9b0a92de543b0efe6', {
    authEndpoint: url + '/pushauth',
    auth: {
        headers: {
            'X-CSRF-Token': token1
        }
    }
});

var channel1 = pusher1.subscribe('private-notification');

channel1.bind('notification_event', function(data) {
    data = $.parseJSON(data);
    var auth = $('#noti_to_id').val()

    $.each(data.toid, function(index, value) {

        if (index == auth) {
            $('div').find('.notification-alert').removeClass('off').addClass('on');
            $('.notification-pop').append('<li><a href="">' + data.fromname + ' ' + data.noti_title + '</a></li>');
        }
    });
});


$('.dropdown').click(function(){$('.dropdown').addClass('open')});
//close modal by ok button
$('#admin-veri-button').click(function(){$('.md-close').click()});

$('#certificate-verification').click(function() {
    $('#veri-certificate-popup').addClass('md-show');
});

//popup jobpost

 $( ".item" ).click(function( event ) {
    event.preventDefault();
    var cat_id = this.id;
  
    $('#admin-verification').addClass('md-show');
    $('#post-job-one').addClass('md-show'); 
});

//hire a bidder confirmation

$('.hireNow').click(function(){
    var fname = $(this).attr("data-name");
    var task_id = $(this).attr("data-id");
    var offer = $(this).attr("data-budget");
    var user_id = $(this).attr("data-uid");
    var decision = confirm('Are you sure? Want to hire ' + fname + '.' );

    if(decision == true){
        var url = $('meta[name= "baseurl"]').attr('content');
        var token =  $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: url + '/hire',
            type: 'POST',
            dataType: 'json',
            data: {
                '_token': token,
                'task_id': task_id,
                'offer': offer,
                'user_id': user_id
            },
            success: function(data) {
                if (data == '1') {
                    location.reload();
                }
            },
            error: function(data) {

            },
        });

    }else{
        alert("Your hire process canceled");
    }
});

$('#reviewForm').submit(function(e) {
        e.preventDefault();
        
        var url = $('meta[name= "baseurl"]').attr('content');
        var token =  $('meta[name="csrf-token"]').attr('content');
        var id = $("#id").val();
        var review = $("#reviews").val();
        var rating = 5;
        $.ajax({
            url: url + '/mycase/review/' + id,
            type: 'POST',
            dataType: 'json',
            data: {
                '_token': token,
                'id': id,
                'review': review,
                'rating' : rating,
            },
            success: function(data) {
                if (data == '1') {
                    location.reload();
                }
            },
            error: function(data) {

            },
        });
});

$('#post-task').click(function(){$('#post-job-one').addClass('md-show');});
$('#complete').click(function(){$('.reviewu').slideDown()});
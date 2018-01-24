$(document).ready(function() {


    $(".embed-responsive iframe").addClass("embed-responsive-item");
    $(".carousel-inner .item:first-child").addClass("active");

    $('[data-toggle="tooltip"]').tooltip();

    $(".navbar-toggle").click(function() {
        $(".mainmenu").addClass("mobilemenu");
    });
    $(".mainmenu ul.nav.navbar-nav li a").click(function() {
        $(".navbar-collapse").removeClass("in");
    });


    $(".box-area .box_1").hover(function() {

        $(".box-area  .box_1 .back").toggleClass("boxhover");

    });

    $(".box-area .box_2").hover(function() {

        $(".box-area  .box_2 .back").toggleClass("box_2h");

    });

    $(".box-area .box_3").hover(function() {

        $(".box-area  .box_3 .back").toggleClass("box_3h");

    });
    $(".box-area .box_4").hover(function() {

        $(".box-area  .box_4 .back").toggleClass("box_4h");

    });
    $(".box-area .box_5").hover(function() {

        $(".box-area  .box_5 .back").toggleClass("box_5h");

    });
    $(".box-area .box_6").hover(function() {

        $(".box-area  .box_6 .back").toggleClass("box_6h");

    });

    // Basic FitVids Test
    $(".law_video").fitVids();

    //Paralux
    $('#intro').parallax("50%", 0.1);

    //First visit popup for unverified profile 
    $("#modal1").modal('show');

    //Preview image before upload image
    function readURL(input) {
        alert('d4');
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imagePreview_one').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#pic").change(function() {
        alert('d2');
        $('#image-upload').show();
        alert('d3');
        readURL(this);
    });
});




$(document).ready(function() {
    $('#carousel, #carousel2').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: false,
                loop: false,
                margin: 20
            }
        }
    })

});

$(document).ready(function() {
    $('#carouselpopup').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: true,
        autoplay: false,
        navText: ["Previous", "Next"],
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            1000: {
                items: 1,
                nav: true,
                loop: false,
                margin: 20
            }
        }
    });

});

$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: false,
                loop: false,
                margin: 20
            }
        }
    });
});



/*Ajax registration Bank information*/
$(document).ready(function() {
    var url = $('meta[name= "baseurl"]').attr('content');
    var token = $('meta[name= "csrf-token"]').attr('content');
    $('#add-bank-account').click(function(e) {
        e.preventDefault();
        $('#acntholder').html("");
        $('#bsb').html("");
        $('#acntnumber').html("");
        $('.acntholder').removeClass("has-error");
        $('.bsb').removeClass("has-error");
        $('.acntnumber').removeClass("has-error");

        var acntholder = $.trim($('#acntholder').val());
        var bsb = $.trim($('#bsb').val());
        var acntnumber = $.trim($('#acntnumber').val());
        var token = $('#acnt-token').val();
        var route = "/accountdetails";
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
                //$('#general-ajax-load').hide();
                console.log(data.responseText);
                $('#accountdetails').html('Account Details Saved');
            },
            error: function(data) {
                console.log(data.responseText);
                var obj = jQuery.parseJSON(data.responseText);
                console.log(data.responseText);
                //$('#general-ajax-load').hide();
                if (obj.acntholder) {
                    $(".acntholder").addClass("has-error");
                    $('#acntholder').html(obj.acntholder);
                }
                if (obj.bsb) {
                    $(".bsb").addClass("has-error");
                    $('#bsb').html(obj.bsb);
                }
                if (obj.acntnumber) {
                    $(".acntnumber").addClass("has-error");
                    $('#acntnumber').html(obj.acntnumber);
                }

            },
        });
    });

    //Ajax registration Skill
    $('#add-skills').click(function(e) {
        e.preventDefault();
        $('#skill').html("");
        $('.skill').removeClass("has-error");

        var selectedSkills = new Array();
        $('input[name="skills"]:checked').each(function() {
            selectedSkills.push(this.value);
        });

        var number = selectedSkills.length;
        if (number < 1) {
            $('#addskills').html('You have to select at least one skill');
            return false;
        }
        if (number > 3) {
            $('#addskills').html('Your package dose not support more than three skill');
            return false;
        }
        var token = $('#acnt-token').val();
        var route = "/addskills";
        $.ajax({
            url: url + route,
            type: 'POST',
            dataType: 'json',
            data: {
                '_token': token,
                'skills': selectedSkills,
                'totalskills': number
            },
            success: function(data) {
                $('#addskills').html('Skills added successfully');
            },
            error: function(data) {
                $('.skills-loader').hide();
                var obj = jQuery.parseJSON(data.responseText);
                if (obj.skills) {
                    $('#addskills').html(obj.skills);
                }
                if (obj.totalskills) {
                    $('#addskills').html(obj.totalskills);
                }
            },
        });
    });

    /* This code is for ajax-certificate upload*/

    $('#submitCertificate').click(function() {
        var certificateVerification = $("#add-certificate");
        certificateVerification.submit(function(e) {
            e.preventDefault();

            var name = $('.name').val();
            var token = $('#acnt-token').val();
            var route = "/add-certificate";

            var formData = new FormData(this)


            $('.name-error').html("");
            $('.certificate-error').html("");
            $("#name-div").removeClass("has-error");
            $("#certificate-div").removeClass("has-error");
            $.ajax({
                type: 'POST',
                url: url + route,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('.popup-heading-text').html('Certificate upload successful');
                    setTimeout(function(){
                    $('.close').click();
                }, 2000);

                },
                error: function(data) {
                    var obj = jQuery.parseJSON(data.responseText);
                    console.log(obj.name);
                    if (obj.name) {
                        $("#name-div").addClass("has-error");
                        $('.name-error').html(obj.name);
                    }
                    if (obj.certificate) {
                        $("#certificate-div").addClass("has-error");
                        $('.certificate-error').html(obj.certificate);
                    }
                }
            });
        });
    });

    //Comments latter counter
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
        if (spantext == '') {
            $('#comment').css('border-color', 'red')
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
            error: function(data) {},
        });
    });

    $('#send-verification').click(sendverificationcode);
    $('#send-code').click(sendcode);

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

    //User bio from popup
    $('#add-description').click(function(e) {
        e.preventDefault();

        var decri = $('#decri').val();
        var url = $('meta[name="baseurl"]').attr('content');
        var token = $('#acnt-token').val();
        if ($.trim(decri) == '') {
            $('#decri').css('border-color:red');
            $('.err-description').show();
            return false;
        }
        $('.dex').show();
        var url = url + '/savedescription';
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
                    console.log('working');
                    location.reload();
                
            },
            error: function(data) {

            },
        });

    }else{
        alert("Your hire process canceled");
    }
});

});


/*Cerficate Light Box*/
$(document).ready(function() {
    var $lightbox = $('#lightbox');
    
    $('[data-target="#lightbox"]').on('click', function(event) {
        var $img = $(this).find('img'), 
            src = $img.attr('src'),
            alt = $img.attr('alt'),
            css = {
                'maxWidth': $(window).width() - 100,
                'maxHeight': $(window).height() - 100
            };
    
        $lightbox.find('.close').addClass('hidden');
        $lightbox.find('img').attr('src', src);
        $lightbox.find('img').attr('alt', alt);
        $lightbox.find('img').css(css);
    });
    
    $lightbox.on('shown.bs.modal', function (e) {
        var $img = $lightbox.find('img');
            
        $lightbox.find('.modal-dialog').css({'width': $img.width()});
        $lightbox.find('.close').removeClass('hidden');
    });
});



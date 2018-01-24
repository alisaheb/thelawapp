$(document).ready(function(){
    
                  $(function() {
			$("#portfolio-items").on("change", function()
			{
                          
                            if($('#portfolio-items').get(0).files.length!==0)
                            {
                                var filecount=$('#portfolio-items').get(0).files.length;
                                    $('#item-upload').show();
                            }
                            
                            if(filecount>1)
                            {
                                  $("label[for='portfolio-items']").text(filecount+' files selected'); return false;
                            }
                            else
                            {
                                $("label[for='portfolio-items']").text('Select Files'); return false;
                            } 
				var files = !!this.files ? this.files : [];
				if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

				if (/^image/.test( files[0].type)){ // only image file
					var reader = new FileReader(); // instance of the FileReader
					reader.readAsDataURL(files[0]); // read the local file

					reader.onloadend = function(){ // set image data as background of div
						//$("#imagePreview_one").attr("src", this.result);
                                          //       $('.upload-item-sec').append("<div class='image-div'><img style='width:210px; height:auto' src='"+this.result+"' /><i class='fa cut fa-times-circle' aria-hidden='true'></i> </div>");
					}
				}//end of if
			});

});
                  
                 
});




/*
$(function() {
                    $('#item-forms').submit(function(e){ e.preventDefault();
                    //  $('#imageupload').addClass('custom-login');
                     var input = document.getElementById("portfolio-items");
                     var token=$('meta[name="csrf-token"]').attr('content');
                   
                   
                        formData= new FormData();
                        formData.append('_token', token);
                       
                        for (var i = 0, len = input.files.length; i < len; i++) {
            formData.append("portfolio-items" + i, input.files[i]);
        }
                                            
                        $.ajax({
                            url: "portfolio_save",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(data){
                            
                                    }
                        });
                       
                     });
       
});  */


$(function() {
	// grab the file input and bind a change event onto it
    $('#item-forms').submit( function(e) { e.preventDefault();
          var token=$('meta[name="csrf-token"]').attr('content');
          var authid = $('#authid').val();
		// new html5 formdata object.
        var formData = new FormData();
        formData.append('_token', token);
        formData.append('authid', authid);                   
        //for each entry, add to formdata to later access via $_FILES["file" + i]
        for (var i = 0, len = document.getElementById('portfolio-items').files.length; i < len; i++) {
            formData.append("portfolio-items-" + i, document.getElementById('portfolio-items').files[i]);
        }

        //send formdata to server-side
        $.ajax({
            url: "portfolio_save", // our php file
            type: 'POST',
            data: formData,
            dataType:'json',
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success : function(data) { 
                var len=data.length; 
               $.each(data,function(index,data){ 
                
                   $('.upload-item-sec').append("<div class='image-div'><img style='width:210px; height:auto' src='../portfolio_docs/"+data.name+"' /><i class='fa cut fa-times-circle delete-pf' aria-hidden='true' data-id="+data.pid+"></i> </div>");
                });
               
              
            },
            error : function(request) {
                
            }
        });
    });

   /*--------------resume form---------------------*/ 
   
   $('#portfolio-resume').on('change', function(){
       $('#resume-upload').show();
});
   
    $('#resume-forms').submit( function(e) { e.preventDefault(); 
          var token=$('meta[name="csrf-token"]').attr('content');
          var authid = $('#authid').val();
          var input = document.getElementById("portfolio-resume");
          var file = input.files[0];
		// new html5 formdata object.
        var formData = new FormData();
        formData.append('_token', token);
        formData.append('authid', authid);                   
        //for each entry, add to formdata to later access via $_FILES["file" + i]
        formData.append("resume",file);
        
         var filename = $('#portfolio-resume').val(); 
        
        var extension = filename.replace(/^.*\./, '');

        if (extension == 'txt' || extension == 'pdf' || extension == 'docx' || extension == 'doc' || extension == 'rtf') 
        {
            //nothing to do
        } 
        else
        {
            var extension=extension.toUpperCase();
           $('.invalid-format').prepend('<span class="ext">'+extension+' files are not accepted. You can upload PDF/DOC/DOCX/TXT/RTF</span>');
           $('#invalid-image').addClass('md-show'); return false;
        }  
                              
        //send formdata to server-side
        $.ajax({
            url: "resume_save", // our php file
            type: 'POST',
            data: formData,
            dataType:'json',
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success : function(data) { 
                                $('.upload-resume-sec').empty();
                               $('.upload-resume-sec').append("<img style='width:210px; height:auto' src='images/attache.png' /><div class='ext'>"+extension+"</div>	<div class='resume-name'>"+data.img+"</div>");
              
            },
            error : function(request) {
                
            }
        });
    });
 /*======invalid extention close button ====*/   
    $('.invaliddata').submit(function(e){
        e.preventDefault();
        $('.ext').remove();
        $('#invalid-image').removeClass('md-show');
    });
    
    /*======portfolio delete images====*/
    $('.upload-item-sec').on('click','.delete-pf',function(e){ e.stopPropagation();
        var id=$(this).data('id'); 
        var token=$('meta[name="csrf-token"]').attr('content'); 
           $.ajax({
            url: "delete_portfolio", // our php file
            type: 'POST',
            data: { '_token':token, 'id':id },
            dataType:'json',
            success : $.proxy(function(value) { 
                               
                         $(this).parent().remove();    
              
            },this),
            error : function(request) {
                
            }
        });
    });
    
    $('.upload-item-sec').on('click','.image-div',function(){
        var src = $(this).children("img").attr('src');
         $('#show-image').addClass('md-show');
        $('.showimage').attr('src',src);       
        
    });
    
    $('.close-show').click(function(){
             $('#show-image').removeClass('md-show');
 });
    
});
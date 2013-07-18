// $(document).ready(function(){	alert("I m call");
	// $('#username').keyup(username_check);
// });
	
function username_check(){ 
		
	var username = $('#login_username').val();
	var base_url = $('#baseurl').val();
	var is_avail_flag = $('#is_avail').val();
	// alert(base_url);
	if(username == "" || username.length < 5){
		$('#login_username').css('border', '3px red solid');
                $('#tick').hide();
                $('#cross').hide();
                $('#login_username').css({
                    'border':'2px solid #48697e;',
                    'background':'#fff',
                    'color':'#000',
                });	
		// $('#tick').hide();
	}else{

		jQuery.ajax({
		   type: "POST",
		   url: base_url+"createaccount/chkUserName",
		   data: 'username='+ username,
		   cache: false,
		   success: function(response){
					// alert(response);
					if(response==1){
						// alert('aval');
						$('#is_avail').val('1');
						$('#login_username').css({
							'border':'3px pink solid',
							'background':'green',
							'color':'#FFF',
						});	
						$('#tick').fadeIn();
						$('#cross').hide();
						// $("#avlmsg").html('Available');
						// $("#infomessage").html('Congrats User-Name Available');
						// $("#infomessage").fadeIn().delay(1000).fadeOut('fast'); 
					}else{
						// alert(' Not Avail');
						$('#is_avail').val('0');
						$('#login_username').css({
							'border':'3px pink solid',
							'background':'red',
							'color':'#FFF',
							'font-weight':'bold',
						});	
						$('#cross').fadeIn();
						$('#tick').hide();
						// $("#avlmsg").html('Not Available');
						// $("#infomessage2").html('Opps User-Name Not Available');
						// $("#infomessage2").fadeIn().delay(1000).fadeOut('fast'); 
					 }
				}
		});
	}



}
$(document).ready(function(){
    var form_submited = 0;
    $("#signup_form").submit(function(){
        if(form_submited===1){
            return false;
        }
        else{
            form_submited=1;
        }
    });
});

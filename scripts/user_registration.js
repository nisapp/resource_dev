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
		// $('#tick').hide();
	}else{

		jQuery.ajax({
		   type: "POST",
		   url: base_url+"register/chkUserName",
		   data: 'username='+ username,
		   cache: false,
		   success: function(response){
					// alert(response);
					if(response==1){
						// alert('aval');
						$('#is_avail').val('1');
						$('#login_username').css('border', '3px green solid');	
						$('#tick').fadeIn();
						$('#cross').hide();
						// $("#avlmsg").html('Available');
						$("#infomessage").html('Congrats User-Name Available');
						$("#infomessage").fadeIn().delay(1000).fadeOut('fast'); 
					}else{
						// alert(' Not Avail');
						$('#is_avail').val('0');
						$('#login_username').css('border', '3px red solid');
						$('#cross').fadeIn();
						$('#tick').hide();
						// $("#avlmsg").html('Not Available');
						$("#infomessage2").html('Opps User-Name Not Available');
						$("#infomessage2").fadeIn().delay(1000).fadeOut('fast'); 
						
					 }
				}
		});
	}



}

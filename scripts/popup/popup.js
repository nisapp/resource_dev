function validateEmail(email) { 
	var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return reg.test(email);
}

$(document).ready(function() {
	$(".modalbox").fancybox();
	$("#contact").submit(function() {
		return false;
	});
	
	$("#send").on("click", function(){
		var emailval = $("#email").val();
		var msgval = $("#msg").val();
		var msglen = msgval.length;
		var mailvalid = validateEmail(emailval);
		
		if (mailvalid == false) {
			$("#email").addClass("error");
		}
        $("#email").change(function() {
            $("#email").removeClass("error");
        });
		
		if (msglen < 4) {
			$("#msg").addClass("error");
		}
        $("#msg").change(function() {
            $("#msg").removeClass("error");
        });
		
		if (mailvalid == true && msglen >= 4) {
			$("#send").replaceWith("<em>sending...</em>");
			  var base_url=$("#baseurl_head").val();
			$.ajax({
				type: 'POST',
				url: base_url+"members/setting/contactsupport",
				data: $("#contact").serialize(),
				success: function(data) {
						/* $("#contact").fadeOut("fast", function(){
							$(this).before("<p><strong>Success! Your message has been sent, thanks!</strong></p>");
							setTimeout("$.fancybox.close()", 2000);
						}); */
					if(data == 1) {
						$("#contact").fadeOut("fast", function(){
							$(this).before("<p><strong>Success! Your message has been sent, thanks!</strong></p>");
							setTimeout("$.fancybox.close()", 2000);
						});
					}else{
						$("#contact").fadeOut("fast", function(){
							$(this).before("<p style='color:red;'><strong>Failure! Sorry we could not process your request !</strong></p>");
							setTimeout("$.fancybox.close()", 2000);
						});
					}
					
				}
			});
			
		}
	});
});
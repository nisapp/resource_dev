$(document).ready(function() { 
		var timestamp = $('#timestamp').val();
		var token = $('#token').val();
		var baseurl = $('#baseurl').val();

			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : timestamp,
					'token'     : token
				},
				'swf'      : baseurl+'uploadify/uploadify.swf',
				'uploader' : baseurl+'admin/uploadify/Welcomeuploader',
				'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
           
		} ,
		'onCancel' : function(file) {
            $(".val_dis_enb").removeAttr("disabled"); 
        } ,
				'onUploadSuccess' : function(filename, data, response) {
        
				//alert("you have uploaded the file"+filename+" and the data "+data+"with the resoponse"+response);
				if(data == "Invalid")
				{
					$('.errormessage').show();
					setTimeout(function() {
					$('.errormessage').fadeOut('fast');
				} , 3000);
				}
				else
				{
							$("#hidd_video").val(data);
							$('.infomessage').show();
							setTimeout(function() {
								$('.infomessage').fadeOut('fast');
							} , 1750);
							// jwplayer("videopreview").setup({
								// file: baseurl+'uploads/videos/'+data,
								// image: baseurl+'uploads/images/preview.jpg',
									// }).play();
				}
        }
			});
		});
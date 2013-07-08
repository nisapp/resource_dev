	function load_next_step(menu_id){
		// alert(menu_id);
		var title=$('#next_video_title').val();
		$("div.video_title").text(title);
		
		$('.cat_tabs').removeClass('active');
		$('#next_tab_title').addClass('active');
		var base_url=$("#baseurl").val();
		var dataString = 'menu_id=' +menu_id;  
		var process_image='<img src="'+base_url+'images/loader.gif" class="procees_img" alt="wait...">';
		$("div#ma").html(process_image);
		$.ajax({  
		  type: "POST",  
		  url: base_url+"members/programs/show_next_step/"+menu_id,  
		  data: dataString,  
		  success: function(msg) {  
				// alert(msg);
				$("div#ma").html(msg);
				play_next_video();
		  }  
		});  
	}
	
	function play_next_video(){
		var baseurl = $("#baseurl").val();

		var previewfile = $("#next_video").val();
		var regExp = /youtube\.com/;
		var match = previewfile.match(regExp);
		if(match=='youtube.com'){
			var previewfile = previewfile.substr(previewfile.length - 11);
			$('#videopreview').html();
			$('#videopreview').html('<iframe width="700" height="400" src="http://www.youtube.com/embed/'+previewfile+'?modestbranding=1&autoplay=1&rel=0&showsearch=0&controls=0" frameborder="0" class="you_tube_next"></iframe>');
			// alert("yyy");
		}else{
			jwplayer("videopreview").setup({
					file: baseurl+'uploads/videos/'+previewfile,
					height: 400,
					width: 685,
					stretching:"exactfit",
					image: baseurl+'uploads/images/preview.jpg',
				}).play(true);
		}
	}
	
	function set_init(){
		var base_url=$("#baseurl").val();
		// alert(base_url);
		$("div#tab_child_1").show();
		var previewfile=$("#first_video").val();
		var videopreview=$("#first_video_index").val();
		// alert(videopreview);
		set_video(videopreview);
	/* 	// alert(videopreview);
		// alert(previewfile);
		if(previewfile=="")
		{
			previewfile = "20051210-w50s.flv";
		}
		jwplayer(videopreview).setup({
				file:baseurl+'uploads/training/video/'+previewfile,
				height: 300,
				width: 500,
				stretching:"exactfit",
				image: baseurl+'uploads/images/preview.jpg',
			}).play(false); */
	}
	
	function load_train_data(cat_id){
		// alert(cat_id);
		$('.cat_tabs').removeClass('active');
		$('#ctab_'+cat_id).addClass('active');
		var title=$('#title_'+cat_id).val();
		$("div.video_title").text(title);
		var base_url=$("#baseurl").val();
		var dataString = 'cat_id=' +cat_id;  
		var process_image='<img src="'+base_url+'images/loader.gif" class="procees_img" alt="wait...">';
		$("div#ma").html(process_image);
		$.ajax({  
		  type: "POST",  
		  url: base_url+"members/training/showdata/"+cat_id,  
		  data: dataString,  
		  success: function(msg) {  
				// alert(msg);
				 // var obj = $.parseJSON(msg);
				$("div#ma").html(msg);
				set_init();
				
		  }  
		});  
		
	}
	
	function show_div(obj,index){
		// alert("jkhk");
		// $(".show-tab-content").hide();
		$(obj).next(".show-tab-content").slideToggle();
		if($(obj).find('.open_close').hasClass('open_tab')){
			$(obj).find('.open_close').removeClass('open_tab').addClass('close_tab');
		}else{
			$(obj).find('.open_close').removeClass('close_tab').addClass('open_tab');
		}
		
		set_video(index);
	}
	
	function set_video(index){
		var baseurl = $("#baseurl").val();

		var previewfile = $("#id_videopreview_"+index).val();
		
		
		// alert(previewfile);
		if(previewfile=="")
		{
			previewfile = "20051210-w50s.flv";
		}else{
			if($("#videopreview_"+index).length > 0)
			{
			jwplayer("videopreview_"+index).setup({
					file: baseurl+'uploads/training/video/'+previewfile,
					height: 300,
					width: 500,
					stretching:"exactfit",
					image: baseurl+'uploads/images/preview.jpg',
				}).play(false);
			}
		}
	} 
	
	$(document).ready(function(){
		var firstCategory = $("#firstCategory").val();
                if(firstCategory!==""){
		load_train_data(firstCategory);
                }
                else{
                    var menu_id = $("#tab_menu_id").val();
                    load_next_step(menu_id);
                }
                
	});
	
	//jQuery(document).on('click', '.jwdisplayIcon', function(event) { jwplayer( 'videopreview' ).pause(); })

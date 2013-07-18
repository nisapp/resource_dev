<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Successfully"?> </div>
<?php } 
/**************** code to fetch next step data **************/
$video_data=array();

foreach($video_query->result() as $singlevideo ){	
	if($singlevideo->type=='next_video'){
		$video_data[$singlevideo->type.'_'.$singlevideo->menu_id]=$singlevideo;
	}else{
		$video_data[$singlevideo->type]=$singlevideo; 
	}
}
		// echo '<pre>';
		// print_r($video_data);
		// echo '</pre>';
		
/**************** End of code to fetch next step data **************/

?>
		

<script>
function set_init(){

		$("div#tab_child_1").show();
		var previewfile=$("#first_video").val();
		var videopreview=$("#first_video_index").val();
		set_video(videopreview);
		// alert(videopreview);
		// alert(previewfile);
		/* if(previewfile=="")
		{
			previewfile = "20051210-w50s.flv";
		}
		jwplayer(videopreview).setup({
				file: baseurl+'uploads/training/video/'+previewfile,
				height: 300,
				width: 500,
				stretching:"exactfit",
				image: baseurl+'uploads/images/preview.jpg',
			}).play(false); */
}

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
	
	function load_train_data(cat_id){
		// alert(cat_id);
		var title=$('#title_'+cat_id).val();
		$("div.video_title").text(title);
		
		$('.cat_tabs').removeClass('active');
		$('#ctab_'+cat_id).addClass('active');
		var base_url=$("#baseurl").val();
		var dataString = 'cat_id=' +cat_id;  
		var process_image='<img src="'+base_url+'images/loader.gif" class="procees_img" alt="wait...">';
		$("div#ma").html(process_image);
		$.ajax({  
		  type: "POST",  
		  url: base_url+"members/commisions/showdata/"+cat_id,  
		  data: dataString,  
		  success: function(msg) {  
				// alert(msg);
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
			jwplayer("videopreview_"+index).setup({
					file: baseurl+'uploads/training/video/'+previewfile,
					height: 300,
					width: 500,
					stretching:"exactfit",
					image: baseurl+'uploads/images/preview.jpg',
				}).play(false);
		}
	} 
	$(document).ready(function(){
		var firstCategory = $("#firstCategory").val();
		load_train_data(firstCategory);
	});
	
	//jQuery(document).on('click', '.jwdisplayIcon', function(event) { jwplayer( 'videopreview' ).pause(); })
	
</script>
<div class="video_title">Welcome User</div>	
	<div class="webleft">
					<div class="leftnav3"> 
				<ul>
                <?php foreach($query->result() as $category ){ ?>
                 	<a id="ctab_<?php echo $category->id; ?>" class="cat_tabs" href="#">
						<li onclick="load_train_data(<?php echo $category->id; ?>);" class="video_tabs">
							<div class="tab_title1">
                           <!-- <div class="spanarrow2">
                            </div>-->
								<?php echo $category->category_name; ?>
                                <input type="hidden" id="title_<?php echo $category->id; ?>" value="<?php echo $category->category_name; ?>" >
							</div>
						</li>
					</a>
					
					<!-- Next Tab Li code start here -->
		<?php if($video_data['next_video_'.$tab_menu_id]->is_show=='Y'){ ?>
			<a id="" class="cat_tabs" href="#">
				<li onclick="load_next_step(<?php echo $tab_menu_id; ?>);" class="video_tabs">
					<div class="tab_title1">
						<?php echo $video_data['next_video_'.$tab_menu_id]->tab_title;  ?>
						<input type="hidden" id="next_video_title" value="<?php echo $video_data['next_video_'.$tab_menu_id]->file_name; ?>" >
						<input type="hidden" id="next_video" value="<?php echo $video_data['next_video_'.$tab_menu_id]->file_name_in_folder; ?>" >
					</div>
				</li>
			</a>	<!-- End of Next Tab Li code start here -->
		<?php } ?>
					
					
               <?php } ?></ul>
			</div>
	</div>
	
	<div class="webright2">
			<?php 
				 if($query->num_rows>0):
				$first_cat = $query->row();
			?>

			<input type="hidden" id="firstCategory" value="<?php echo $first_cat->id;?>">
			<input type="hidden" id="id_videopreview" value="default.mp4">
				
		<?php endif; ?>
		
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<div id="ma">
		
		</div>
               
	</div>
</div>

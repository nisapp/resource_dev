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
		
		<?php if(isset($stylelist)):
            foreach ($stylelist as $style):?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().$style; ?>">
        <?php endforeach;
        endif; 
        if(isset($scriptlist)): 
            foreach ($scriptlist as $script):?>
        <script src="<?php echo base_url().$script; ?>" type="text/javascript"></script>
        <?php endforeach;
        endif; ?>
<style>
.nextbtn{
	cursor:pointer;
	background: url("../images/btnBg.png") repeat-x scroll left top transparent;
    border: medium none red;
    border-radius: 10px 10px 10px 10px;
    box-shadow: 0 0 7px #696948;
    color: #78A0B1;
    font-size: 19px;
    font-weight: bold;
    margin: 14px 80px;
    padding: 6px 0;
    text-align: center;
    text-transform: capitalize;
    width: 76%;
}

img#video_bg{
	float:left;
}

.m_t_tab-close {
    background: none repeat scroll 0 0 #245679;
    color: #FFFFFF;
    font-size: 20px;
    padding: 14px;
}
.tab_close {
    cursor: pointer;
    margin-top: 15px;
}
.video_preveiw{
	margin: 27px 40px 30px 40px;
	position: absolute;
    text-align: center;
}
.show-tab-content {
    background: none repeat scroll 0 0 #FFFFFF;
    color: #000000;
    min-height: 360px;
    padding: 15px 7px 10px 14px;
    width: 97%;
}
img.procees_img{
	 margin: 5% 33%;
	 font-size: 55px;
}

</style>
<script>
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
		if(previewfile=="")
		{
			previewfile = "20051210-w50s.flv";
		}
		jwplayer("videopreview").setup({
				file: baseurl+'uploads/videos/'+previewfile,
				height: 320,
				width: 580,
				stretching:"exactfit",
				image: baseurl+'uploads/images/preview.jpg',
			}).play(true);
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
			<div class="leftnav">
				<ul>
					<?php foreach($query->result() as $category ){ ?>
						<li onclick="load_train_data(<?php echo $category->id; ?>);">
							<a id="ctab_<?php echo $category->id; ?>" class="cat_tabs" value="<?php echo $category->category_name; ?>" href="#" ><?php echo $category->category_name; ?></a>
							<input type="hidden" id="title_<?php echo $category->id; ?>" value="<?php echo $category->category_name; ?>" >
						</li>
					<?php } ?>
					<!-- Next Tab Li code start here -->
						<?php if($video_data['next_video_'.$tab_menu_id]->is_show=='Y'){ ?>
						<li onclick="load_next_step(<?php echo $tab_menu_id; ?>);">
							<a id="next_tab_title" class="cat_tabs" href="#"><?php echo $video_data['next_video_'.$tab_menu_id]->tab_title;  ?></a>
							<input type="hidden" id="next_video_title" value="<?php echo $video_data['next_video_'.$tab_menu_id]->file_name; ?>" >
							<input type="hidden" id="next_video" value="<?php echo $video_data['next_video_'.$tab_menu_id]->file_name_in_folder; ?>" >
						</li>
					<!-- End of Next Tab Li code start here -->
					<?php } ?>
				</ul>
			</div>
	</div>
	<div class="webright">
		<?php 
                if($query->num_rows>0):
			$first_cat = $query->row();
		?>

			<input type="hidden" id="firstCategory" value="<?php echo $first_cat->id;?>">
			<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
			<input type="hidden" id="id_videopreview" value="default.mp4">
				
		<div id="ma">
		
		
		</div>
		<?php endif; ?>
				
	</div>
</div>
<!-- /wrapperMain -->

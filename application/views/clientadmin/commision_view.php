<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Successfully"?> </div>
<?php } ?>
		
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
	margin: 4% 12%;
}
.show-tab-content {
    background: none repeat scroll 0 0 #FFFFFF;
    color: #000000;
    min-height: 100px;
    padding: 15px 7px 10px 14px;
    width: 97%;
}
img.procees_img{
	 margin: 5% 33%;
	 font-size: 55px;
}

</style>
<script>
	function load_train_data(cat_id){
		// alert(cat_id);
		$('.cat_tabs').removeClass('active');
		$('#ctab_'+cat_id).addClass('active');
		var base_url=$("#baseurl").val();
		var dataString = 'cat_id=' +cat_id;  
		var process_image='<img src="'+base_url+'images/loader.gif" class="procees_img" alt="wait...">';
		$("div#ma").html(process_image);
		$.ajax({  
		  type: "POST",  
		  url: base_url+"clientadmin/commisions/showdata/"+cat_id,  
		  data: dataString,  
		  success: function(msg) {  
				// alert(msg);
				$("div#ma").html(msg);
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
		}
		jwplayer("videopreview_"+index).setup({
				file: baseurl+'uploads/training/video/'+previewfile,
				height: 300,
				width: 500,
				stretching:"exactfit",
				image: baseurl+'uploads/images/preview.jpg',
			}).play(false);
		
	} 
	$(document).ready(function(){
		var firstCategory = $("#firstCategory").val();
		load_train_data(firstCategory);
	});
	
	//jQuery(document).on('click', '.jwdisplayIcon', function(event) { jwplayer( 'videopreview' ).pause(); })
	
</script>
	<div class="webleft">
			<div class="leftnav">
				<ul>
					<?php foreach($query->result() as $category ){ ?>
						<li onclick="load_train_data(<?php echo $category->id; ?>);" ><a id="ctab_<?php echo $category->id; ?>" class="cat_tabs" href="#"><?php echo $category->category_name; ?></a></li>
					<?php } ?>
					<!--<li><a href="#" class="active">System Training-2</a></li>-->
				</ul>
			</div>
	</div>
	<div class="webright">
			<?php 
				$first_cat = $query->row();
			?>

			<input type="hidden" id="firstCategory" value="<?php echo $first_cat->id;?>">
			<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
			<input type="hidden" id="id_videopreview" value="default.mp4">
				
		<div id="ma">
		<?php //for($i=1;$i<6;$i++){ ?>
			<!--<div class="main_tab" >
				<div class="m_t_tab-close tab_close tab_child_1" onclick="show_div(this,<?php echo $i; ?>);">Marketing 1-<?php echo $i; ?>
					<img  src="<?php echo base_url();?>images/transparent.gif" class="open_close open_tab" width="36" height="29">
				</div>
				<div class="show-tab-content tab_child_2" style="display: none;">
					<p>
						Get On Our Daily .Think and Grow Rich. Call Every Monday-Friday
						<br>They have hundreds of hours of Inner Circle audio trainings you can download to your phone or mp3 player and listen to while in the car, taking a shower or working out!
						<br><br>
						<br>It.s important to fill your mind with positive energy as much as you can throughout the day!
					</p>
					<input type="hidden" id="id_videopreview" value="default.mp4">
					<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
								
					<div class="video_preveiw" style="">
								<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
								<div id="videopreview_<?php echo $i; ?>">Loading the player...</div>
					</div>
				
					
				</div>
			</div>-->
		<?php //} ?>
		</div>
		
				
	</div>
</div>
<!-- /wrapperMain -->

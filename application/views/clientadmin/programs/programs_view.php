<?php 
// echo '<pre>';
// print_r($client_full_data);
// echo '</pre>';

	if(isset($status) && $status=="gvo_success"){?>
			<div class="infomessage"><?php echo "Gvo user name set successfully"?> </div>
<?php }else if (isset($status) && $status=="pure_success"){?>
			<div class="infomessage"><?php echo "Pure leverage user name set successfully"?> </div>
<?php }else if (isset($status) && $status=="emp_success"){?>
			<div class="infomessage"><?php echo "Empower network user name set successfully"?> </div>
<?php }

	if(isset($stylelist)):
            foreach ($stylelist as $style):?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().$style; ?>">
        <?php endforeach;
        endif; 
        if(isset($scriptlist)): 
            foreach ($scriptlist as $script):?>
        <script src="<?php echo base_url().$script; ?>" type="text/javascript"></script>
        <?php endforeach;
        endif; ?>

<script>
			
	function set_my_video(obj,id){ 
		// alert(id);
		$(obj).find('.step_done').show();
		$(obj).find('span.number').css({
											'color':'#386886',
											'background-color':'#FFFFFF',
										});
		$(".idArea").hide();
		$('#myform_'+id).show();
		var baseurl = $("#baseurl").val();
		$('.video_tabs').removeClass('active');
		$(obj).addClass('active');
		// frm_obj=document.frmVideo;
		var previewfile = document.getElementById("txtVideo_"+id).value;
		var video_title = document.getElementById("txtTitle_"+id).value;
		// alert(previewfile);
		$("div.video_title").text('Sign up for program '+video_title);
		jwplayer("videopreview").setup({
				file: baseurl+'uploads/videos/'+previewfile,
				height: 325,
				width: 580,
				image: baseurl+'uploads/images/preview.jpg',
		}).play();
		
	} 
	
	
	
	jQuery(document).on('click', '.jwplayer button', function(event) { event.preventDefault(); })
	
	function save_id(prog_id){
	   var base_url=$("#baseurl").val();
	   var aff_id=$("#txtdata_"+prog_id).val();
	   // alert(base_url);
		var dataString = 'prog_id=' +prog_id+ '&aff_id='+aff_id;  
		//alert (dataString);return false;  
		
		$.ajax({  
		  type: "POST",  
		  url: base_url+"clientadmin/programs/save/"+prog_id,  
		  data: dataString,  
		  success: function(msg) {  
			alert(msg);
		  }  
		});  
		
	}
	
</script>
<style>

.video_preveiw {
  /*  margin: 51px 5px 4px 82px; */
   margin: 25px 5px 4px 40px;
    position: absolute;
    text-align: center;
}
img#video_bg{
	float:left;
}
img.step_done{
	height: 80%;
    margin: -14% 7% -1% -31%;
    position: relative;
    width: 25%;
	z-index: 1;
	display:none;
}
span.number {
    background: none repeat scroll 0 0 #78A0B1; 
   /*  background:url("<?php echo base_url(); ?>/images/check.png"); */
    border-radius: 10px 10px 10px 10px;
    color: #FFFFFF;
    float: left;
    font-size: 20px;
    font-weight: bold;
    padding: 2px 12px;
    position: relative;
    right: 26px;
    text-decoration: none !important;
    top: 8px;
}

.idArea{
	float: left;
    margin: 4% 2% 1% 8%;
    padding: 1% 1% 0 3%;
    text-align: center;
    width: 77%;
	display:none;
}
.id_control{
	float: left;
    padding: 4px 3px 2px 6px;
    width: 65%;
}
.sign_up_acc{

}
.lable_txt{
	color: #000000;
    font-weight: bold;
    padding: 4px 2px 2px 9px;
}
.save_btn{
	background: url("<?php echo base_url();?>images/btnBg.png") repeat-x scroll left top transparent;
     border: medium none red;
    border-radius: 10px 10px 10px 10px;
    box-shadow: 0 0 7px #696948;
    color: #78A0B1;
    font-size: 19px;
    font-weight: bold;
    margin: 13px 4px 3px 3px;
    padding: 6px 0;
    text-align: center;
    text-transform: capitalize;
    width: 40%;
}

fieldset { margin: 10px 0 22px 0; border: 1px solid #095D92; padding: 12px 17px; background-color: #DFF3FF; }
legend { text-align: left;	font-size: 1.1em; background-color: #095D92; color: #FFFFFF; font-weight: bold; padding: 4px 8px; }

</style>
	
<form name="frmVideo" method="post" >		
<div class="video_title">Sign Up for Programs</div>	

	<div class="webleft">
			<div class="leftnav2">
				<ul>
					<?php 
						$count=0;
						foreach($query->result() as $programs )
						{ 
					?>
							<li>
								
								<a href="#" class="video_tabs" onclick="set_my_video(this,<?php echo $programs->id;?>);">
									<img src="<?php echo base_url();?>images/check.png" class="step_done" />		
									<span class="number"><?php echo ++$count; ?></span><?php echo $programs->title;?> 
								</a>
							</li>
							
							<input type="hidden" id="txtVideo_<?php echo $programs->id;?>"  name="txtVideo_<?php echo $programs->id;?>" value="<?php echo $programs->video_file; ?>">
							<input type="hidden" id="txtTitle_<?php echo $programs->id;?>"  name="txtTitle_<?php echo $programs->id;?>" value="<?php echo $programs->title; ?>">
		
					
				<?php 	
					/****====== Code of custom form =====**/
				$html['link_'.$programs->id]="
						<div class='idArea' id='myform_{$programs->id}' name='myform_{$programs->id}' >
							<form method='post' action='clientadmin/programs/save/{$programs->id}'>
									<div class='affiliateLink' id='link_{$programs->id}' >
										<a href='{$programs->link}'>Click URL To Join {$programs->title}</a>
									</div>
									<fieldset>
										<legend>{$programs->title}</legend>
										<TABLE class='sign_up_acc'>
											<TR>
												<TD class='lable_txt'>
													Save Your Affliate Id: 
												</TD>
											</tr>
											<tr>
												<TD class='id_control'>
														<input  required  value='' class='biginput' type='text' placeholder='Enter Id' name='txtdata_{$programs->id} 'id='txtdata_{$programs->id}' >
													<input type='button' value='Save'  name='btnGvo' class='save_btn' onclick='save_id({$programs->id})'>
												</TD>
											</TR>
										</TABLE>
									</fieldset>
							</form>
						</div>";
					/****====== end of Code of custom form =====**/
				
				} ?>
					
				</ul>
			</div>
	</div>
	
	

	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
	<div class="webright">
		<img src="<?php echo base_url();?>images/webBg2.png" id="video_bg">
		<div class="video_preveiw" style="">
					<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
					<div id="videopreview">Loading the player...</div>
		</div>
		
		
		
		
		<?php 
		foreach($html as $forms )
		{
			echo $forms;
		}
		// echo '<pre>';
			// print_r($html);
		// echo '</pre>';

		?>
		
	</div>
</form>

<!--/**********************************************************/-->
		
<!--/**********************************************************/-->	
</div>
<!-- /wrapperMain -->

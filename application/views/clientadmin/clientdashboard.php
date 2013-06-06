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
	
	function stop(){
		jwplayer( 'videopreview' ).pause();
	}
	function start(){
		jwplayer( 'videopreview' ).play();
	}
	
	
		
	/* function set_my_video(obj,video_name,video_title,showid){ 
		$(obj).find('.step_done').show();
		$(obj).find('span.number').css({
											'color':'#386886',
											'background-color':'#FFFFFF',
													});
		// $(this).closest('li').find(':checkbox').prop("checked", true);
	   
		$(".idArea").hide();
		$('#'+showid).show();
		var baseurl = $("#baseurl").val();
		$('.video_tabs').removeClass('active');
		$(obj).addClass('active');
		$("div.video_title").text(video_title);
		var previewfile = video_name;
		// alert(previewfile);
		if(previewfile=="")
		{
			previewfile = "20051210-w50s.flv";
		}
		jwplayer("videopreview").setup({
				file: baseurl+'uploads/videos/'+previewfile,
				height: 325,
				width: 580,
				image: baseurl+'uploads/images/preview.jpg',
			}).play();
		} */
	function set_my_video(obj,id,showid){ 
		// alert(showid);
		$(obj).find('.step_done').show();
		$(obj).find('span.number').css({
											'color':'#386886',
											'background-color':'#FFFFFF',
										});
		$(".idArea").hide();
		$('#'+showid).show();
		var baseurl = $("#baseurl").val();
		$('.video_tabs').removeClass('active');
		$(obj).addClass('active');
		var previewfile = document.getElementById("txtVideo_"+id).value;
		var video_title = document.getElementById("txtTitle_"+id).value;
		// alert(previewfile);
		$("div.video_title").text(video_title);
		jwplayer("videopreview").setup({
				file: baseurl+'uploads/videos/'+previewfile,
				height: 325,
				width: 580,
				image: baseurl+'uploads/images/preview.jpg',
		}).play();
		
	} 
	
   	
	$(document).ready(function() { 
		var baseurl = $("#baseurl").val();
		
		var previewfile = $("#txtWelcome").val();
		// alert(previewfile);
		if(previewfile=="")
		{
			previewfile = "20051210-w50s.flv";
		}
		jwplayer("videopreview").setup({
				file: baseurl+'uploads/videos/'+previewfile,
				height: 325,
				width: 580,
				image: baseurl+'uploads/images/preview.jpg',
			}).play();
		
	})
	jQuery(document).on('click', '.jwplayer button', function(event) { event.preventDefault(); })
	
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
    margin: -24px 11% 0 -35%;
    position: relative;
    width: 25%;
    z-index: 1;
	display:none;
}

/* img.step_done{
	height: 80%;
    margin: -14% 7% -1% -31%;
    position: relative;
    width: 25%;
	z-index: 1;
	display:none;
}
 */
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

</style>
	<?php 
		$video_data=array();
		foreach($query->result() as $singlevideo ){	
			$video_data[$singlevideo->type]=$singlevideo;
		} 
		
		// echo '<pre>';
		// print_r($video_data);
		// echo '</pre>';
		// echo $video_data['welcome_video']->description;

		/* foreach($video_data as $key=>$val){
				// echo '<br/>'.$key->tab_title;
			echo '<br/>'.$video_data[$key]->tab_title;
		} */	
	?>
	
<form name="frmVideo" method="post" >		
<div class="video_title">Welcome User</div>	

	<div class="webleft">
			<div class="leftnav2">
				<ul>
					<?php 
						$count=0;
						foreach($video_data as $key=>$val)
						{ 	
							$is_valid=1;
							switch($key){
								case 'gvo_video':
												$strShow_id='gvo';	break;
								case 'emp_video':
												$strShow_id='emp';	break;
								case 'pure_leverage_video':
												$strShow_id='pure';	break;
								case 'next_video':
												$strShow_id='what';	break;
								default:
										$is_valid=0;
							}
							if(!$is_valid){ continue; }
					?>
							<li>
								<a href="#" class="video_tabs" onclick="set_my_video(this,<?php echo $video_data[$key]->Id; ?>,'<?php echo $strShow_id; ?>' );">
									<img src="<?php echo base_url();?>images/check.png" class="step_done" />		
									<span class="number"><?php echo ++$count; ?></span><?php echo $video_data[$key]->tab_title; ?> 
								</a>
							</li>
							
							<input type="hidden" id="txtVideo_<?php echo $video_data[$key]->Id; ?>"  name="txtVideo_<?php echo $video_data[$key]->Id; ?>" value="<?php echo $video_data[$key]->file_name_in_folder; ?>">
							<input type="hidden" id="txtTitle_<?php echo $video_data[$key]->Id; ?>"  name="txtTitle_<?php echo $video_data[$key]->Id; ?>" value="<?php echo $video_data[$key]->file_name; ?>">
					
					
					<?php } ?>
					<!--<li>
						<a href="#" class="video_tabs" onclick="set_my_video(this,document.frmVideo.txtGvo.value,document.frmVideo.txtGvoTitle.value,'gvo');">
							<img src="<?php echo base_url();?>images/check.png" class="step_done" />		
							<span class="number">1</span>GVO Hosting<br/> Setup
						</a>
					</li>
					<li>
							
						<a href="#" class="video_tabs" onclick="set_my_video(this,document.frmVideo.txtPure.value,document.frmVideo.txtPureTitle.value,'pure');">
							<img src="<?php echo base_url();?>images/check.png" class="step_done" />
							<span class="number">2</span> Autoresponder<br/> Setup
						</a>
					</li>
					<li>
							
						<a href="#" class="video_tabs" onclick="set_my_video(this,document.frmVideo.txtEmp.value,document.frmVideo.txtEmpTitle.value,'emp');">
							<img src="<?php echo base_url();?>images/check.png" class="step_done" />
							<span class="number">3</span>Empower <br/>Network Setup
						</a>
					</li>
					<li>
						
						<a href="#" class="video_tabs" onclick="set_my_video(this,document.frmVideo.txtNext.value,document.frmVideo.txtNextTitle.value,'what');">
							<img src="<?php echo base_url();?>images/check.png" class="step_done" />
							<span class="number">4</span>	What's<br/> Next?
						</a>
					</li>-->
					
				</ul>
			</div>
	</div>


	<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
	<div class="webright">
		<input type="hidden" id="id_videopreview" value="default.mp4">
		<input type="hidden" id="txtWelcome"  name="txtWelcome" value="<?php echo $video_data['welcome_video']->file_name_in_folder; ?>">
		<input type="hidden" id="txtWelcomeTitle"  name="txtWelcomeTitle" value="<?php echo $video_data['welcome_video']->file_name; ?>">
		<input type="hidden" id="txtGvo"  name="txtGvo" value="<?php echo $video_data['gvo_video']->file_name_in_folder; ?>">
		<input type="hidden" id="txtGvoTitle"  name="txtGvoTitle" value="<?php echo $video_data['gvo_video']->file_name; ?>">
		<input type="hidden" id="txtEmp"  name="txtEmp" value="<?php echo $video_data['emp_video']->file_name_in_folder; ?>">
		<input type="hidden" id="txtEmpTitle"  name="txtEmpTitle" value="<?php echo $video_data['emp_video']->file_name; ?>">
		<input type="hidden" id="txtPure"  name="txtPure" value="<?php echo $video_data['pure_leverage_video']->file_name_in_folder; ?>">
		<input type="hidden" id="txtPureTitle"  name="txtPureTitle" value="<?php echo $video_data['pure_leverage_video']->file_name; ?>">
		<input type="hidden" id="txtNext"  name="txtNext" value="<?php echo $video_data['next_video']->file_name_in_folder; ?>">
		<input type="hidden" id="txtNextTitle"  name="txtNextTitle" value="<?php echo $video_data['next_video']->file_name; ?>">
		
		<img src="<?php echo base_url();?>images/webBg2.png" id="video_bg">
		<div class="video_preveiw" style="">
					<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
					<div id="videopreview">Loading the player...</div>
		</div>
		
	
	</div>
	
</form>
<style>
.idArea{
	/* background: none repeat scroll 0 0 transparent;
    border: 4px solid #365E81; */
    float: left;
    margin: 4% 1% 1% 28%;
    padding: 1% 1% 0 3%;
    text-align: center;
    width: 62%;
	display:none;
}
.id_control{
	 float: left;
    padding: 0 2px 0 8px;
    width: 65%;
}
.sign_up_acc{

}
.id_image{
	border-color: #095D92;
    border-right-style: dotted;
    float: left;
    padding: 4px;
    width: 28%;
}
}
.img_signup222{
    height: 100px;
    margin-top:-21px;
    width: 134px;
}
.effect-button {
	background: url("<?php echo base_url();?>images/btnBg.png");
    border: medium none red;
    border-radius: 10px 10px 10px 10px;
    box-shadow: 0 0 7px #696948;
    color: #78A0B1;
    font-size: 15px;
    font-weight: bold;
    line-height: 13px;
    margin: 0 2px 2px 8px;
    padding: 5px 30px;
    text-align: center;
    text-decoration: none !important;
}
</style>
<style type="text/css">

fieldset { margin: 10px 0 22px 0; border: 1px solid #095D92; padding: 12px 17px; background-color: #DFF3FF; }
legend { text-align: left;	font-size: 1.1em; background-color: #095D92; color: #FFFFFF; font-weight: bold; padding: 4px 8px; }
</style>
<!--/**********************************************************/-->
		
		<div class="idArea" id="gvo">
			<form method="post" action="<?php echo base_url();?>clientadmin/clientdashboard/savegvo">
				<div class="affiliateLink">
					<a href="#">Click URL To Join HostThenProfit</a>
				</div>
							
				<fieldset>
					<legend>GVO</legend>
					
					<TABLE class="sign_up_acc">
						<TR>
							<TD class="id_image">
								<img src="<?php echo base_url(); ?>images/gvo.png" style="height: 100px;margin-top:-21px;width:134px;" class="img_signup" />
								<!--<a target="_blank" href="" class="effect-button">
									SIGNUP
								</a>-->
							</TD>
							<TD class="id_control">
									<input  required  value="<?php if(isset($client_full_data['gvo_user_name']) && $client_full_data['gvo_user_name']!='') echo $client_full_data['gvo_user_name']; ?>" class="biginput" type="text" placeholder="Enter GVO Username" name="txtGvoid">
								<input type="submit" value="Save Your GVO Username"  name="btnGvo" class="claimbtn2">
							</TD>
						</TR>
					</TABLE>
				</fieldset>
				
			</form>
		</div>
		<div class="idArea" id="pure">
			<form method="post" action="<?php echo base_url();?>clientadmin/clientdashboard/savepure">
				<div class="affiliateLink">
					<a href="#">Click URL To Join HostThenProfit</a>
				</div>
				<fieldset>
					<legend>Pure Leverage</legend>
					<TABLE class="sign_up_acc">
						<TR>
							<TD class="id_image">
								<img style="height:86px;margin-top:8px;width:114px;background: #046C93;padding-left:14px;padding-right:2px;" src="<?php echo base_url(); ?>images/pu.png" class="img_signup" />
								<!--<a target="_blank" href="" class="effect-button">
									SIGNUP
								</a>-->
							</TD>
							<TD class="id_control">

								<input  required  value="<?php if(isset($client_full_data['leverage_user_name']) && $client_full_data['leverage_user_name']!='') echo $client_full_data['leverage_user_name']; ?>" class="biginput" type="text" placeholder="Enter Pure Leverage Username" name="txtPureid">
								<input type="submit" value="Save Pure Leverage Username"  name="btnPure" class="claimbtn2">
							</TD>
						</TR>
					</TABLE>
				</fieldset>
			</form>
		</div>
		
		<div class="idArea" id="emp">
			<form method="post" action="<?php echo base_url();?>clientadmin/clientdashboard/saveemp">
				<div class="affiliateLink">
						<a href="#">Click URL To Join HostThenProfit</a>
				</div>
							
				<fieldset>
					<legend>Empower Network</legend>
					<TABLE class="sign_up_acc">
						<TR>
							<TD class="id_image">
								<img style="height: 100px;margin-top:-21px;width:134px;" src="<?php echo base_url(); ?>images/emp.png" class="img_signup" />
								<!--<a target="_blank" href="" class="effect-button">
									SIGNUP
								</a>-->
							</TD>
							<TD class="id_control">
									<input required value="<?php if(isset($client_full_data['emp_netwrok_user_name']) && $client_full_data['emp_netwrok_user_name']!='') echo $client_full_data['emp_netwrok_user_name']; ?>" class="biginput" type="text" placeholder="Enter Empower Network Username " name="txtEmpid">
								<input type="submit" value="Save Empower Username"  name="btnEmp" class="claimbtn2">
							</TD>
						</TR>
					</TABLE>
					
				</fieldset>
				
			</form>
		</div>
		
		<div class="idArea" id="what">
			 <input type="button" class="claimbtn" value="Click Here To Go To The Next Step" />
		</div>
			
		<!--/**********************************************************/-->	
</div>
<!-- /wrapperMain -->

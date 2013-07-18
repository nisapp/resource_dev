<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php if(isset($stylelist)):
			foreach ($stylelist as $style){ ?>
				<link rel="stylesheet" type="text/css" href="<?php echo base_url().$style; ?>">
		<?php }
			endif; 
        if(isset($scriptlist)): 
            foreach ($scriptlist as $script){?>
				<script src="<?php echo base_url().$script; ?>" type="text/javascript"></script>
	<?php 	}
        endif; ?>
<style>  
    #pl_subscribe{
        display: none;
        target-new:tab !important;
    }

img#videobg {
width: 700px !important;
height: 452px !important;
margin:0 !important;
}
.video_preveiw{
	margin: 28px 3px 2px 91px;
	position: absolute;
	text-align: center;
	/* width: 50%; */
}
#videopreview{
    width: 717px !important;
    height: 403px !important;
}
.get_started{
    font-family: "Myriad Pro";
    font-size: 29px;
    margin: 0 auto;
    width: 685px;
    text-align:center;
    color:white;margin-bottom: 20px;
}
img#videobg{
    width: 93%;
}
#register_user {
border-radius: 20px !important;
}
.formArea{
   margin: 10px auto;
   width: 670px;
   height: 337px;
   padding: 10px;
}
.input_line{
    margin: 20px auto;
    width: 540px;
    overflow: hidden;
    text-align: center;
}
.smallinput:first-child{
    margin-right:35px !important;
}
#register_page_vieo{
    position: absolute;
    margin: 30px 10px 29px 90px;
}

#video_viewer{
    width: 100%;
    text-align: center;
	height: auto;
}
#register_user{
    width:286px;
    height:72px;
    background: url('<?php echo base_url(); ?>images/continue.png'); 
}
iframe#wel_data{
	width:700px;
	height:395px;
	margin-top: 25px;
}
.siteHeaderBg {
background: none !important;
}
</style> 
	<script type="text/javascript" >
	function validate(obj){ 
		var errors = 0;
		var message = "";
		frmobj=document.frmAccount;
		if (frmobj.login_firstname.value == "")
		{
			errors++;
			message += "["+errors+"] Please enter your First Name ! \n\n";
			if (errors == 1)
				frmobj.login_firstname.focus();
		}
		if (frmobj.login_email.value == "")
		{
			errors++;
			message += "["+errors+"] Please enter your Email Id Name ! \n\n";
			if (errors == 1)
				frmobj.login_email.focus();
		}else if (frmobj.login_email.value != ""){
			var emailRegxp = /^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i;
			if(!frmobj.login_email.value.match(emailRegxp))
			{
				errors++;
				message += "["+errors+"] Enter valid Email.The address should be of this form name@company.com !\n\n";
				 if (errors == 1)
				   frmobj.login_email.focus();
			}
		}
		if (frmobj.login_username.value == "")
		{
			errors++;
			message += "["+errors+"] Please enter User name ! \n\n";
			if (errors == 1)
				frmobj.login_username.focus();
		}else if(frmobj.login_username.value.length<5){
			errors++;
			message += "["+errors+"] User name contain atleast 5-character ! \n\n";
			if (errors == 1)
				frmobj.login_username.focus();
		}
		if (frmobj.login_password.value == "")
		{
			errors++;
			message += "["+errors+"] Please enter password! \n\n";
			if (errors == 1)
				frmobj.login_password.focus();
		}else if(frmobj.login_password.value.length<5){
			errors++;
			message += "["+errors+"] Password contain atleast 5-character ! \n\n";
			if (errors == 1)
				frmobj.login_password.focus();
		}
				
		if (errors > 0)
		{
			alert("Data Not Valid: \n\n" + message);
			return false;
		}else{
			jQuery("body").mask("Waiting...");
			jQuery(obj).hide();
			return true;		
		}
			
	}
		
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-41990556-1', 'easyaccessprofits.com');
	  ga('send', 'pageview');//*/
	</script>
</head>

<?php
	$is_afflitate_user=$this->session->userdata('affuserid');
	$is_fresh_signup=1;
	if(isset($is_afflitate_user) && $is_afflitate_user!=''){
		$is_fresh_signup=0;
	}else{
		
	}

							
	$data=$query->result();
	foreach($data as $info){
		$type=$info->type;
		switch($type){
			case 'logo':
								$logo_name=$info->file_name_in_folder;
								break;
			case 'login_video':
								$login_video=$info->file_name_in_folder;
								$title_text=$info->tab_title;
								
								break;
		}
	}
?><div id="wrapper">
	<div class="siteHeaderBg">
        <div class="wrapperOuter">
             <div class="wrapperMain">
					<!--header-->
						<div class="siteHeader" style="text-align:center">
							<!-- logo -->
							<div class="logo" style="float:none">
								<h3><a href="<?php echo base_url(); ?>">Logo</a></h3>
							</div>
							<!-- /logo -->
							<!-- header right 
							<div class="siteHeaderRight">-->
								
								 
							<!--</div>
							 /header right -->
						</div>
						<!--/header-->
			 </div>

<body>
    <input type="hidden" id="baseurl" value="<?php echo base_url();?>">
    <input type="hidden" id="is_avail" name="is_avail" value="-1">
	<div id="wrapper">
		<div class="siteHeaderBg">
			<div class="wrapperOuter">
				
            <!-- container -->
            <div id="container">
				<div class="profitsContainer">
                        <div id="video_viewer">
                               
							<?php if(preg_match("/youtube\.com/", $login_video)): 
								$video_str = substr($login_video,-11);
							?>
								<iframe id="wel_data" src="http://www.youtube.com/embed/<?php echo $video_str; ?>?modestbranding=1&rel=0&controls=0&autoplay=1" frameborder="0" allowfullscreen>
								</iframe>
							<?php else: ?>
								<div class="video_preveiw" style="">
									<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
									<div id="videopreview">Loading the player...</div>
								</div>
								<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
								<input type="hidden" id="video_file_path" value="uploads/videos/">
							<?php endif; ?>
							<input type="hidden" id="id_videopreview" value="<?php echo $login_video; ?>">
                        </div>
				</div>
                        <div id="msgarea2"><br>

                        <div id="msgarea-container3">
                     <p class="get_started"><?php if(isset($title_text) && ($title_text!='')){ echo $title_text; }else{ echo 'Get Started Right Now!'; } ?> </p>
                        <div class="formArea">
                            <form name="frmAccount" action="<?php echo base_url();?>createaccount/verifysignup" method="post" >
                                <div class="input_line">
                                <input class="smallinput"  type="text" name="login_firstname" id="login_firstname" placeholder="Name*" style="background:#141a23;">
								<input  class="smallinput" type="email" name="login_email" required id="login_email" placeholder="Email Address*" style="background:#141a23;">
                                </div>
                                <div class="input_line">
                                <input  class="smallinput" type="text" required name="login_username" onKeyUp="username_check()" id="login_username" placeholder="Username* (minimum length 5)" style="background:#141a23;" >
                                <img id="tick" class='imgtick' src="<?php echo base_url();?>images/tick.png" 
                                     style="display:none; float: left; margin-left: -34px; ">
                                <img id="cross" class='imgtick' src="<?php echo base_url();?>images/cross.png" 
                                     style="display:none; float: left; margin-left: -34px; " >
                                <input  class="smallinput" type="password" name="login_password" id="login_password" placeholder="Password*" style="background:#141a23;" >
                                </div>
								<?php
									if(!$is_fresh_signup){
								?>
									<input type="hidden" name="afflitate_user_id" id="afflitate_user_id" value="<?php echo $is_afflitate_user; ?>">
								<?php } ?>
                                <div class="input_line">
                                <input  type="submit" id="register_user" value="" onclick="return validate(this);" >
                                </div>
                            </form>
		</div></div>
							
                        </div>
                 </div>
        <?php
        if(isset($pl_email)):?>
<input type="hidden" id="pl_isset" value="yes" />
<form id="pl_subscribe" target="_blank" method="post" action="http://www.gogvo.com/subscribe.php">
<input type="hidden" id="CampaignCode" name="CampaignCode" value="<?php echo $plinfo->campaign_code; ?>" />
<input type="hidden" id="FormId" name="FormId" value="<?php echo $plinfo->form_id; ?>" />
<input type="hidden" id="AffiliateName" name="AffiliateName" value="<?php echo $plinfo->plev_affliate_name; ?>" />
<input type="hidden" name="Email" id="pl_email" value="<?php echo $pl_email; ?>" />
</form>
        <?php else: ?>
        <input type="hidden" id="pl_isset" value="no" />
        <?php endif; ?>
                 <div class="clear"></div>
				<!-- footer -->
					<?php //$this->load->view('global/footer'); ?>
				<!-- /footer -->
                       
            </div>
            <!-- /container -->
        </div>
    </div>

  </div>
				
</body>
</html>
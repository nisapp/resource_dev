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
    color:crimson;
}
img#videobg{
    width: 90%;
}
.formArea{
   background: url('<?php echo base_url(); ?>images/bottom-form.png');
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
}
#register_user{
    width:286px;
    height:72px;
    background: url('<?php echo base_url(); ?>images/continue.png'); 
}
.siteHeaderBg {
background: none !important;
}
</style> 
  </head>

<?php
	// $t=$this->session->all_userdata();
	// echo '<pre>';
	// print_r($stylelist);
	// echo '</pre>';
	$is_afflitate_user=$this->session->userdata('affuserid');
	$is_fresh_signup=1;
	if(isset($is_afflitate_user) && $is_afflitate_user!=''){
		//echo 'refere by some user';
		// $this->session->unset_userdata('affuserid');
		$is_fresh_signup=0;
	}else{
		//echo 'Fresh Sign up';
		
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
	// $logo=$logo_data['0'];	

	// echo '<pre>';
	// print_r($d);
	// echo '</pre>';
?>

<body>
    <input type="hidden" id="baseurl" value="<?php echo base_url();?>">
    <input type="hidden" id="is_avail" name="is_avail" value="-1">
	<div id="wrapper">
		<div class="siteHeaderBg">
			<div class="wrapperOuter">
				<!--<div class="wrapperMain">
					header-->
					<?php //$this->load->view('global/header.php'); ?>
					<!--/header-->
				<!--</div>
				 container -->
            <!-- container -->
            <div id="container">
            	 <div class="profitsContainer">
                        <div id="video_viewer">
                                <!--<video id="register_page_vieo" class="video-js vjs-default-skin"
                                       controls preload="auto" width="600" height="400" autoplay
                                       >
                                    <source src="<?php //echo base_url(); ?>uploads/videos/<?php //echo $login_video; ?>" type='video/mp4' />
                                </video>-->
        <div class="video_preveiw" style="">
            <script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
            <div id="videopreview">Loading the player...</div>
        </div>
        <?php if(preg_match("/youtube\.com/", $login_video)): ?>
        <input type="hidden" id="baseurl" value="">
        <input type="hidden" id="video_file_path" value="">
        <?php else: ?>
        <input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
        <input type="hidden" id="video_file_path" value="uploads/videos/">
        <?php endif; ?>
        <input type="hidden" id="id_videopreview" value="<?php echo $login_video; ?>">
                                <img src="<?php echo base_url(); ?>images/webBg2.png" id="videobg"/>
                        </div>
                     <p class="get_started"><?php if(isset($title_text) && ($title_text!='')){ echo $title_text; }else{ echo 'Get Started Right Now!'; } ?> </p>
                        <div class="formArea">
                            <form action="<?php echo base_url();?>register/verifysignup" method="post" >
                                <div class="input_line">
                                <input class="smallinput"  type="text" name="login_firstname" id="login_firstname" placeholder="First Name*" >
                                <input class="smallinput" type="text" name="login_lastname" id="login_lastname" placeholder="Last Name*" >
                                </div>
                                <div class="input_line">
                                <input  class="smallinput" type="text" name="login_phone" id="login_phone" placeholder="Phone Number*" >
                                <input  class="smallinput" type="email" name="login_email" required="required" id="login_email" placeholder="Email Address*" >
                                </div>
                                <div class="input_line">
                                <input  class="smallinput" type="text" required="required" name="login_username" onkeyup="username_check()" id="login_username" placeholder="Username* (minimum length 5)" >
                                <img id="tick" class='imgtick' src="<?php echo base_url();?>images/tick.png" 
                                     style="display:none; float: left; margin-left: -34px; ">
                                <img id="cross" class='imgtick' src="<?php echo base_url();?>images/cross.png" 
                                     style="display:none; float: left; margin-left: -34px; " >
                                <input  class="smallinput" type="password" name="login_password" id="login_password" placeholder="Password*" >
                                </div>
							<?php
								if(!$is_fresh_signup){
							?>
                                <input type="hidden" name="afflitate_user_id" id="afflitate_user_id" value="<?php echo $is_afflitate_user; ?>">
				            <?php } ?>
                                <div class="input_line">
                                <input  type="submit" id="register_user" value="">
                                </div>
                            </form>
		
							
                        </div>
                 </div>
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
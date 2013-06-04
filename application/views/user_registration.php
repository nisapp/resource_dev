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
	margin: 38px 3px 2px 115px;
	position: absolute;
	text-align: center;
	/* width: 50%; */
}

img#videobg{
	margin: 1% 1% 2% 10%;
    width: 90%;
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
		echo 'refere by some user';
		// $this->session->unset_userdata('affuserid');
		$is_fresh_signup=0;
	}else{
		echo 'Fresh Sign up';
		
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
								break;
		}
	}
	// $logo=$logo_data['0'];	

	// echo '<pre>';
	// print_r($d);
	// echo '</pre>';
?>

<body>
<input type="hidden" id="id_videopreview" value="<?php echo $login_video;?>">
<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
<input type="hidden" id="is_avail" name="is_avail" value="-1">

	<div id="wrapper">
		<div class="siteHeaderBg">
			<div class="wrapperOuter">
				<div class="wrapperMain">
					<!--header-->
					<?php $this->load->view('global/header.php'); ?>
					<!--/header-->
				</div>
				<!-- container -->
            <!-- container -->
            <div id="container">
            	 <div class="profitsContainer">
                 	<div class="profitsLeft">
						<div class="video_preveiw" >
							<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
							<div id="videopreview">Loading the player...</div>
						</div>
                    	<img src="images/webBg2.png" id="videobg"/>
                        <div class="clear"></div>
                        <div class="formArea">
                        	<img src="images/proflt.png" />
                            <br />
					<form action="<?php echo base_url();?>register/verifysignup" method="post" >
			            	
						<input class="smallinput"  type="text" name="login_firstname" id="login_firstname" placeholder="First Name*" >
						<input class="smallinput" type="text" name="login_lastname" id="login_lastname" placeholder="Last Name*" >
						<div class="clear"></div>
						
						<input  class="smallinput" type="text" name="login_phone" id="login_phone" placeholder="Phone Number*" >
						<input  class="smallinput" type="email" name="login_email" required="required" id="login_email" placeholder="Email Address*" >
						<div class="clear"></div>
						
						<input  class="biginput" type="text" required="required" name="login_username" onkeyup="username_check()" id="login_username" placeholder="Username* (minimum length 5)" >
						
						<img id="tick" class='imgtick' src="<?php echo base_url();?>images/tick.png" style="display:none">
						<img id="cross" class='imgtick' src="<?php echo base_url();?>images/cross.png" style="display:none" >
						
						<input  class="biginput" type="password" name="login_password" id="login_password" placeholder="Password*" >
							<?php
								if(!$is_fresh_signup){
							?>
								
								<input type="hidden" name="afflitate_user_id" id="afflitate_user_id" value="<?php echo $is_afflitate_user; ?>">
				            <?php } ?>
			 		<input  type="submit" class="claimbtn" value="claim your free website now">
				</form>
		
							
                        </div>
                    </div>
                    <div class="profitsRight">
                    	<div class="list">
                        	<ul>
                                <li>Free</li>
                                <li>Easy Setup</li>
                                <li>No Programming or Technical Skills</li>
                                <li>Easy Access Profit</li>
                             </ul>
                        </div>
                        <div class="sponsorid">
                        	Sponsor id:  <input type="text" name="" placeholder="" />
                        </div>
                    </div>
                 </div>
                 <div class="clear"></div>
				<!-- footer -->
					<?php $this->load->view('global/footer'); ?>
				<!-- /footer -->
                       
            </div>
            <!-- /container -->
        </div>
    </div>

  </div>
				
</body>
</html>
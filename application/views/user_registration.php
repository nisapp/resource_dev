<?php
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
	<title>Money Formula</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/css/userlogin.css'; ?> ">
	<style type="text/css">
		
		body {
	background: url('images/background_1.png') no-repeat;
	background-repeat:no-repeat;
	background-position: top center;
	overflow-x: hidden;
}
		
		

#container {
    margin:50px auto 150px auto;
    width: 1020px;
    overflow: hidden;
    
}

		#winner {
			width: 500px;
			margin: 10px;
			overflow: hidden;
			text-shadow: none;
			font-family: sans-serif;
			text-align: center;
			font-weight: bold;
			font-size: 1.5em;
			padding: 0px 0 0;
                        float: left;

		}

		#winner h2{
			margin: 0px;
			font-size: 1.5em;
			color: transparent;
   			text-shadow: 0 0 1px rgba(0,0,0,1.5);
		}

		#testimonials {
			margin: 0px 40px;
		}
		.testimonial {
			background: #909090;
			width: 140px;
			height: 100px;
			float: left;
			margin-left: 20px;
			margin-bottom: 20px;
		}

		.testimonial:first-child(){
			margin-left: 0px;
		}

		#form_content {
			font-weight: bold;
			font-family: sans-serif;
		}

		#form_content input{
			border-radius: 20px;
			padding: 2px 10px;
			margin: 10px;
			width: 225px;
			height: 35px;
			font-size: 1em;
			box-shadow: 2px 2px 5px #888888;
                        float: left;
		}
		#container a {
			color: #ffffff;
		}
		
/***Login Css***/		
#top { 
  	background: url(images/login_top.jpg) repeat-x 0 0;
	height: 38px;
	position: relative;
}

#top ul.login {
	display: block;
	position: relative;
  	float: right;
  	clear: right;
  	height: 38px;
	width: auto;
  	font-weight: bold;
	line-height: 38px;
	margin: 0;
	right: 150px;
  	color: white;
  	font-size: 80%;
	text-align: center;
  	background: url(images/login_r.jpg) no-repeat right 0;
	padding-right: 45px;
}

#top ul.login li.left {
  	background: url(images/login_l.jpg) no-repeat left 0;
  	height: 38px;
	width: 45px;
	padding: 0;
	margin: 0;
  	display: block;
	float: left;
}

#top ul.login li {
 	text-align: left;
  	padding: 0 6px;
	display: block;
	float: left;
	height: 38px;
  	background: url(images/login_m.jpg) repeat-x 0 0;
}

#top ul.login li a {
	color: #33CCCC;
}

#top ul.login li a:hover {
	color: white;
}
#container form{
    float: right;
    width: 500px;
}
#container p{
    text-align: center;
    float: left;
}
#container-wrap{
    margin: auto;
}
#login input{
    float: left;
    margin: 2px;
}
#login{
    float: right;
}
		
		
		
		
		
	</style>
	<!--[if gt IE 6]>
		<link rel="stylesheet" type="text/css" href="css/style-ie.css" />
	<![endif]-->
</head>
<body>
	<!-- login<div id="top">
		
			<ul class="login">
		    	<li class="left">&nbsp;</li>
		        <li>Hello Guest!</li>
				<li>|</li>
				<li><a id="toggleLogin" href="<?php echo base_url().'/login';?>">Admin Log In</a></li>
			</ul> 
	</div>
 login -->
	<div id="bgwrap" style=" background-image:url(<?php echo base_url().'uploads/logo/'.$logo_name; ?>);
    background-position: center top;
    background-repeat: no-repeat;
    height: 1020px;">


	<div id="container-wrap" style="padding-top:20px;">
		<div id="wrapper-inner">
			<div id="container">
					
				<div id="pre_title">
                                    <img src="<?php echo base_url();?>/images/pre_title.png">
                                    <?php
                                    //form_open("login/verifysignup");
                                    ?>
                                    <form id="login" action="<?php echo base_url(); ?>/login/verifylogin" method="post" >
						<div>
                                                    
							<!--<label>Username:</label>
							<input type="text" name="username" />-->
                                                        <input type="text" name="username" value="Username" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;; this.style.color=&#39;#000&#39;; this.onfocus=&#39;&#39;; " >
							<font style="font-size:10px;color:red;text-align:center;" class="sub_alert"><?php echo form_error('username'); ?>
							</font><!---->
						</div>
						<div>
							<!--<label>Password: <a href="forgot_password.html" rel="forgot_password" class="forgot linkform">Forgot your password?</a></label>
							<input type="password" name="password" />-->
                                                        <input type="password" name="password" value="Password" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;; this.style.color=&#39;#000&#39;; this.onfocus=&#39;&#39;; " >
							<font style="font-size:10px;color:red;text-align:center;" class="sub_alert"><?php echo form_error('password'); ?></font>
						</div>
						<div class="bottom">
							<!--<div class="remember"><input type="checkbox" /><span>Keep me logged in</span></div>
							
							<div class="clear"></div>-->
                                                        
						</div>
                                        <input type="submit" value="Login"/>
					<?php //echo form_close(); 
                                        ?>
                                        </form>
                                </div>
				<link href="<?php echo base_url(); ?>css/video.css" rel="stylesheet">
				<link href="<?php echo base_url(); ?>css/video-js.css" rel="stylesheet">
				<script src="<?php echo base_url(); ?>scripts/video.js"></script>
				
				<?php //echo base_url().'uploads/video/'.$login_video; ?>

				<div id="winner">
					<div class="video_preveiw" style="width:50%;margin-left: 0px;float: left;" >
						<script src="<?php echo base_url(); ?>scripts/jquery-1.7.2.min.js" type="text/javascript"></script>
						<script type="text/javascript" src="<?php echo base_url(); ?>jwplayer/jwplayer.js"></script>
						<script type="text/javascript" src="<?php echo base_url(); ?>scripts/previewplayer.js"></script>
						<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
						<div id="videopreview">Loading the player...</div>
					</div>
				</div>
				
				<input type="hidden" id="id_videopreview" value="<?php echo $login_video;?>">
				<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
				<form action="register/verifysignup" method="post" >
					<div id="form_content">
			            	<input type="text" name="login_firstname" id="login_firstname" placeholder="First Name*" value="First Name*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;; this.style.color=&#39;#000&#39;; this.onfocus=&#39;&#39;; " >
				            <input type="text" name="login_lastname" id="login_lastname" placeholder="Last Name*" value="Last Name*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
			            	<input type="email" name="login_email" required="required" id="login_email" placeholder="Email Address*" value="Email Address*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
				            <input type="text" required="required" name="login_username" id="login_username" placeholder="Username*" value="Username*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
				            <input type="text" name="login_phone" id="login_phone" placeholder="Phone Number*" value="Phone Number*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
				            <input type="password" name="login_password" id="login_password" placeholder="Password*" value="Password*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
							<?php
								if(!$is_fresh_signup){
							?>
								<input type="hidden" name="afflitate_user_id" id="afflitate_user_id" value="<?php echo $is_afflitate_user; ?>">
				            <?php } ?>
			 		</div>
					<div id="image_button"><input value="submit" type="image" src="<?php echo base_url();?>/images/create_account.png" alt="submit Button"></div>
				</form>
			<p><font color="white" size="2">Already Registered for a FREE Account Above? Then <a href="<?php echo base_url();?>login/clientlogin" >CLICK HERE</a> to log-in to your account !</font></p></div><!--  container -->
		</div>
	</div>
</div>
<footer>
<footer>
	<center>
<div id="footer">
			Copyright � Resource Bay &nbsp;2012 - 2013<br>
			<a href="#">Privacy Policy </a>
			 |
			<a href="#"> Earnings Disclaimer</a>
			 | 
			<a href="#">Terms of Service </a> 
			 | 
			<a href="">Contact</a>
			 | 
			<a href="#">Member Login</a>
</div>


	</center>
</footer>


</footer></body></html>
<?php
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
    margin-bottom: 150px;
    margin-top: 50px;
    width: 652px;
}
		#winner {
			width: 550px;
			margin: 10px;
			overflow: hidden;
			text-shadow: none;
			font-family: sans-serif;
			text-align: center;
			font-weight: bold;
			font-size: 1.5em;
			padding: 0px 0 0;

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
			margin: 12px;
			width: 240px;
			height: 35px;
			font-size: 1em;
			box-shadow: 2px 2px 5px #888888;
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
		
		
		
		
		
	</style>
	<!--[if gt IE 6]>
		<link rel="stylesheet" type="text/css" href="css/style-ie.css" />
	<![endif]-->
</head>
<body>
	<div id="top">
		<!-- login -->
			<ul class="login">
		    	<li class="left">&nbsp;</li>
		        <li>Hello Guest!</li>
				<li>|</li>
				<li><a id="toggleLogin" href="<?php echo base_url().'/login';?>">Admin Log In</a></li>
			</ul> <!-- / login -->
	</div>
	<div id="bgwrap" style=" background-image:url(<?php echo base_url().'uploads/logo/'.$logo_name; ?>);
    background-position: center top;
    background-repeat: no-repeat;
    height: 980px;">


	<div id="container-wrap" style="padding-top:20px;">
		<div id="wrapper-inner">
			<div id="container">
					
				<div id="pre_title"><img src="<?php echo base_url();?>/images/pre_title.png"></div>
				<link href="<?php echo base_url(); ?>css/video.css" rel="stylesheet">
				<link href="<?php echo base_url(); ?>css/video-js.css" rel="stylesheet">
				<script src="<?php echo base_url(); ?>scripts/video.js"></script>
				
				<?php //echo base_url().'uploads/video/'.$login_video; ?>

				<div id="winner">
					<div class="video_preveiw" style="width:50%;margin-left: 65px;float: left;" >
					<script src="<?php echo base_url(); ?>scripts/jquery-1.7.2.min.js" type="text/javascript"></script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>jwplayer/jwplayer.js"></script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>scripts/previewplayer.js"></script>
		<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
		<div id="videopreview">Loading the player...</div>
	  </div>
					<!--<video id="my_video_1" class="video-js vjs-default-skin" controls
					  width="640" height="264" 
					  data-setup="{}" autoplay="autoplay">
					  <source src="<?php //echo base_url().'uploads/videos/'.$login_video; ?>" type='video/mp4'>  
					  <source src="<?php //echo base_url().'uploads/videos/'.$login_video; ?>" type="video/ogg">
					  <source src="<?php //echo base_url().'uploads/videos/'.$login_video; ?>" type="video/webm">
					  <object data="<?php //echo base_url().'uploads/videos/'.$login_video; ?>" width="320" height="240">
						<embed src="my_video.swf" width="320" height="240">
					  </object> 
					</video>-->
				</div>
				<input type="hidden" id="id_videopreview" value="<?php echo $login_video;?>">
				<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
				<form action="userlogin/verifysignup" method="post">
					<div id="form_content">
			            	<input type="text" name="login_firstname" id="login_firstname" placeholder="First Name*" value="First Name*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
			            	<input type="email" name="login_email" required="required" id="login_email" placeholder="Email Address*" value="Email Address*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
				            <input type="text" name="login_lastname" id="login_lastname" placeholder="Last Name*" value="Last Name*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
				            <input type="text" required="required" name="login_username" id="login_username" placeholder="Username*" value="Username*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
				            <input type="text" name="login_phone" id="login_phone" placeholder="Phone Number*" value="Phone Number*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
				            <input type="password" name="login_password" id="login_password" placeholder="Password*" value="Password*" style="color: rgb(0, 0, 0);" onfocus="this.value=&#39;&#39;;this.style.color=&#39;#000&#39;;this.onfocus=&#39;&#39;;">
				            
			 		</div>
					<div id="image_button"><input value="submit" type="image" src="<?php echo base_url();?>/images/create_account.png" alt="submit Button"></div>
				</form>
			<center><font color="white" size="2">Already Registered for a FREE Account Above? Then <a href="#signin.php" target="_blank">CLICK HERE</a> to log-in to your back office!</font></center></div><!--  container -->
		</div>
	</div>
</div>
<footer>
<footer>
	<center>
<div id="footer">
			Copyright © Resource Bay &nbsp;2012 - 2013<br>
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
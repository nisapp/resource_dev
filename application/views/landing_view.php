<?php 
// echo '<pre>'; 
// print_r($this->session->all_userdata());
// echo '</pre>'; 

?>
	<title>Landing Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'/css/userlogin.css'; ?> ">
	<style type="text/css">
		
		

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
	
	<div id="bgwrap" style=" background-position: center top;
    background-repeat: no-repeat;
    height: 980px;">


	<div id="container-wrap" style="padding-top:20px;">
		<div id="wrapper-inner">
			<div id="container">
					
				
				<link href="<?php echo base_url(); ?>css/video.css" rel="stylesheet">
				<link href="<?php echo base_url(); ?>css/video-js.css" rel="stylesheet">
				<script src="<?php echo base_url(); ?>scripts/video.js"></script>
				

				<div id="winner">
					<div class="video_preveiw" style="width:50%;margin-left: 65px;float: left;" >
						<script src="<?php echo base_url(); ?>scripts/jquery-1.7.2.min.js" type="text/javascript"></script>
						<script type="text/javascript" src="<?php echo base_url(); ?>jwplayer/jwplayer.js"></script>
						<script type="text/javascript" src="<?php echo base_url(); ?>scripts/previewplayer.js"></script>
						<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
						<div id="videopreview">Loading the player...</div>
					</div>
					
				</div>
				<input type="hidden" id="id_videopreview" value="default.mp4">
				<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
				
			</div><!--  container -->
			<div align="center">
				<a href="<?php echo base_url();?>register"><img style="cursor:pointer;" src="<?php echo base_url();?>images/web.png"></a>
			</div>
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
<?php 
 /* echo '<pre>';print_r($query);die();  */
?><html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Money Formula</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/welcomepage.css">
	<!--[if gt IE 6]>
		<link rel="stylesheet" type="text/css" href="css/style-ie.css" />
	<![endif]-->
	<script src="<?php echo base_url(); ?>scripts/jquery-1.7.2.min"></script>
	<script src="<?php echo base_url(); ?>cssandscripts/jquery-ui.min.js"></script>
	<style type="text/css">
		body {
			background: url('images/background_2.png') no-repeat;
			background-repeat:no-repeat;
			background-position: top center;
		}
	</style>
</head>
<body>
	<div id="main">
            <div id="homehead"><!-- Add user logout link -->
                Welcome <?php echo $username; ?>! | 
                <a href="<?php echo base_url(); ?>home/logout">Logout</a>
            </div>
		<div id="main_wrapper">
			<div id="wrapper">
				<div id="header">
					<img src="<?php echo base_url(); ?>images/logo.png">
				</div> <!-- header -->
				<div id="winner">
					<div class="video_preveiw" style="width:50%;margin-left: 65px;float: left;" >
					<script src="<?php echo base_url(); ?>scripts/jquery-1.7.2.min.js" type="text/javascript"></script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>jwplayer/jwplayer.js"></script>
	  <script type="text/javascript" src="<?php echo base_url(); ?>scripts/previewplayer.js"></script>
		<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
		<div id="videopreview">Loading the player...</div>
	  </div>
				</div>
				<input type="hidden" id="id_videopreview" value="<?php echo $query->file_name_in_folder;?>">
				<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
			</div>
                    
			<div id="signup_form">
				<div id="step1">	
					<div class="step">
						<a href="javascript:void(0);" onclick="step2();"><img src="<?php echo base_url(); ?>images/step_1.png" border="0"></a>
					</div>	
					<p class="signup">Sign Up!</p>
					<p class="createaccount">Create Your Account Below</p>
					<span id="click_here"><a href="" onclick="step2();" target="_blank"><img src="<?php echo base_url(); ?>images/click_here.png" border="0"></a></span>
				</div>
				<div id="step2">
					<div class="step">
						<a href="javascript:void(0);" onclick="step1();"><img src="<?php echo base_url(); ?>images/step_2.png" border="0"></a>
					</div>	
					<p class="signup">Activate</p>
					<p class="createaccount">Save Your Username Below</p>
					<form action="" method="post">
						<input type="text" id="username" name="affiliate_id" placeholder="GVO Username">
						<span id="save_form"><input type="image" src="<?php echo base_url(); ?>images/save.png"></span>
					</form>
				</div>
			</div>
		</div> <!-- main_wrapper -->
	</div><!--  main -->
	<div class="cls"></div>
	<footer>
		<center>
			<a href="javascript:void(0);" style="text-decoration:none;">
			<div>Copyright © resourcebay.com 2013</div>
			Privacy Policy | Earnings Disclaimer | Terms of Service | Contact
			</a>
		</center>
	</footer>
	<script type="text/javascript">
		function step1(){
			$('#step2').hide();	
			$('#step1').show();	
		}
		function step2(){
			$('#step1').hide();
			$('#step2').show();
		}
	</script>


</body></html>
<?php 
$session_data = $this->session->userdata('client_login');
// echo '<pre>';
// print_r($session_data);
// echo '</pre>';
// $data['fullname']=$session_data['fullname'];
if (array_key_exists('sponser_full_name', $session_data)) {
    $sponser=$session_data['sponser_full_name'];
}else{
    $sponser='No Sponser';
}

?>
<html>
    <head>
        <title>::-<?php if(isset($metatitle)){ echo $metatitle; }else { echo 'allMoney';}?>-::</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css">
		<script src="<?php echo base_url()?>scripts/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>scripts/html5.js" type="text/javascript"></script>
		<script type="text/javascript">
			setTimeout(function() { 
				$('.infomessage').fadeOut('fast');
			} , 1750);

		</script>
    </head>
<body>
<div id="wrapper">
	<div class="siteHeaderBg">
        <div class="wrapperOuter">
             <div class="wrapperMain">
					<!--header-->
						<div class="siteHeader">
							<!-- logo -->
							<div class="logo">
								<h3><a href="<?php if (($session_data['login_state'] == 'active' && $session_data['role'] == 'user')){ echo base_url().'clientadmin/clientdashboard'; }else{ echo base_url(); } ?>">Logo</a></h3>
							</div>
							<!-- /logo -->
							<!-- header right -->
							<div class="siteHeaderRight">
								<div class="sponsor">
									Your Sponsor :  <a href="#"><?php echo $sponser; ?></a>
								 </div>
								 <nav class="headertop">
									<ul>
										<li><a href="#">Welcome <b><?php echo $session_data['fullname']; ?></b></a></li>
										<li><a href="<?php echo base_url()?>clientadmin/setting">Edit Profile</a></li>
										<li><a href="<?php echo base_url()?>clientadmin/clientdashboard/logout">Logout</a></li>
										<li><a class="last" href="#">Contact Support</a></li>
									</ul>
								 </nav>
							</div>
							<!-- /header right -->
						</div>
						<!--/header-->
			 </div>
            <!-- container -->
            <div id="container">
            	<div class="wrapperMain containermain">
<!--<ul id="nav">
	<li><a href="http://www.script-tutorials.com/">Home</a></li>
	<li><a class="hsubs" href="#">Menu 1</a>
	<ul class="subs">
		<li><a href="#">Submenu 1</a></li>
		<li><a href="#">Submenu 2</a></li>
		<li><a href="#">Submenu 3</a></li>
		<li><a href="#">Submenu 4</a></li>
		<li><a href="#">Submenu 5</a></li>
	</ul>
	</li>
	<li><a href="http://www.script-tutorials.com/">Home</a></li>
</ul>-->
				<!--	<nav class="maniNav">
						<ul>
							<li><a href="<?php echo base_url(); ?>clientadmin/clientdashboard">Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>clientadmin/training">E.A.P Training</a></li>                 
							<li><a href="<?php echo base_url(); ?>clientadmin/promotesite" >Promote Web</a></li>
							<li><a href="<?php echo base_url(); ?>home/programs">Programs Joined</a></li>
							<li><a href="#">Tools</a></li>
							<li>
								<a href="<?php echo base_url(); ?>clientadmin/promotesite/downclient">Downline</a>
							</li>
							<li><a href="#">Bonuses</a></li>
							<li><a class="last" href="#">Contact Support</a></li>

						</ul>
					</nav>-->
					
					<nav class="maniNav">
						<ul>
							<li><a href="<?php echo base_url(); ?>clientadmin/clientdashboard">Dashboard</a></li>
							<li><a href="#" >Commissions</a></li>
							<li><a href="<?php echo base_url(); ?>clientadmin/training">Marketing Videos</a></li>
							<li><a href="<?php echo base_url(); ?>clientadmin/programs">How To Videos</a></li>
							<li><a href="<?php echo base_url(); ?>clientadmin/promotesite" >Promote Web</a></li>
							<li><a href="#">Tools</a></li>
							<li>
								<a class="last" href="<?php echo base_url(); ?>clientadmin/promotesite/downclient">Downline</a>
							</li>
						</ul>
					</nav>
					
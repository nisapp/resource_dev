<?php 
$session_data = $this->session->userdata('client_login');
// echo '<pre>';
// print_r($session_data);
// echo '</pre>';
// $data['fullname']=$session_data['fullname'];
?>
<html>
    <head>
        <title>::-::-<?php if(isset($metatitle)){ echo $metatitle; }else { echo 'allMoney';}?>-::-::</title>
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
								<h3><a href="<?php echo base_url(); ?>">Logo</a></h3>
							</div>
							<!-- /logo -->
							<!-- header right -->
							<div class="siteHeaderRight">
								<div class="sponsor">
									Your Sponsor :  <a href="#"> Sponsor Name</a>
								 </div>
								 <nav class="headertop">
									<ul>
										<li><a href="#">Welcome <b><?php echo $session_data['fullname']; ?></b></a></li>
										<li><a href="<?php echo base_url()?>clientadmin/setting">Edit Profile</a></li>
										<li><a class="last" href="<?php echo base_url()?>clientadmin/clientdashboard/logout">Logout</a></li>
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
					<nav class="maniNav">
						<ul>
							<li><a href="<?php echo base_url(); ?>clientadmin/clientdashboard">Home</a></li>
							<li><a href="#">E.A.P Training</a></li>                 
							<li><a href="<?php echo base_url(); ?>clientadmin/promotesite" >Promote Web</a></li>
							<li><a href="<?php echo base_url(); ?>home/programs">Programs Joined</a></li>
							<li><a href="<?php echo base_url(); ?>clientadmin/promotesite/downclient">Tools</a>
							</li>
							<li><a href="<?php echo base_url(); ?>clientadmin/email">Bonuses</a></li>
							<li><a class="last" href="<?php echo base_url(); ?>clientadmin/email/femail">Contact Support</a></li>

						</ul>
					</nav>
					
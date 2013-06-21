<?php 
$session_data = $this->session->userdata('client_login');
$session_menu = $this->session->userdata('menu_data_in_session');
// echo '<pre>';
// print_r($session_data);
// echo '</pre>';
// foreach($session_menu as $key=>$value){
	// echo '<br/>'.$session_menu[$key]->menu_url;		
	// echo $key;		
// } 
// $data['fullname']=$session_data['user_track_id'];
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
<!-- Code of contact support pop-up hidden inline form -->

<script src="<?php echo base_url()?>scripts/fancybox/jquery.fancybox.js?v=2.0.6" type="text/javascript"></script>
<script src="<?php echo base_url()?>scripts/popup/popup.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>scripts/fancybox/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/popup/popup.css">
				
<div id="inline">
	<form id="contact" name="contact" action="#" method="post">
		<fieldset id="support">
		<legend id="support">Please complete the following form</legend>

		<label for="email"><span class="required">*</span> Email</label>
		<input name="email" type="email" id="email" class="txt" />

		<br />
		<label for="comments"><span class="required">*</span> Your comments</label>
		<textarea name="msg" id="msg"></textarea>
		
		<button id="send" class="button">Send E-mail</button>
		</fieldset>
	</form>
</div>
<input type="hidden" id="baseurl_head" value="<?php echo base_url();?>">

<!-- End of Code of contact support pop-up hidden inline form -->

<div id="wrapper">
	<div class="siteHeaderBg">
        <div class="wrapperOuter">
             <div class="wrapperMain">
					<!--header-->
						<div class="siteHeader">
							<!-- logo -->
							<div class="logo">
								<h3><a href="<?php if (($session_data['login_state'] == 'active' && $session_data['role'] == 'user')){ echo base_url().'members/programs'; }else{ echo base_url(); } ?>">Logo</a></h3>
							</div>
							<!-- /logo -->
							<!-- header right -->
							<div class="siteHeaderRight">
								
								 <nav class="headertop">
                                                                     <div><a href="#">Welcome <b><?php echo $session_data['fullname']; ?></b></a></div>
									<ul>
										<li><a href="<?php echo base_url()?>members/setting">Edit Profile</a></li>
										<li><a href="<?php echo base_url()?>members/clientdashboard/logout">Logout</a></li>
										<li><a  class="last modalbox" href="#inline">Contact Support</a></li>
									</ul>
								 </nav>
								<div class="sponsor">
									<span id="sponsor">Your Sponsor :  <a href="#"><?php echo $sponser; ?></a></span>
									<br/>
									<span>Your Affiliate Id : </span><a href="<?php echo base_url()?>go/<?php echo $session_data['user_track_id'];?>" target="_blank">
                                                                            <?php echo base_url()?>go/<?php echo $session_data['user_track_id'];?>
                                                                        </a>
								 </div>
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
							<li><a href="<?php echo base_url(); ?>members/clientdashboard">Dashboard</a></li>
							<li><a href="<?php echo base_url(); ?>members/training">E.A.P Training</a></li>                 
							<li><a href="<?php echo base_url(); ?>members/promotesite" >Promote Web</a></li>
							<li><a href="<?php echo base_url(); ?>home/programs">Programs Joined</a></li>
							<li><a href="#">Tools</a></li>
							<li>
								<a href="<?php echo base_url(); ?>members/promotesite/downclient">Downline</a>
							</li>
							<li><a href="#">Bonuses</a></li>
							<li><a class="last" href="#">Contact Support</a></li>

						</ul>
					</nav>-->
					
					<nav class="maniNav">
						<ul>
							<?php
								$total=count($session_menu);
								$menu_count=0;
								$current_url=uri_string();

								foreach($session_menu as $key=>$value){
									++$menu_count;
									
									/****** Code start to show Active menu*******/
										if($session_menu[$key]->menu_url==$current_url){
											$class='class="active"';
										}else{
											$class='class=""';	
										}
									/****** End of Code to show Active menu*******/
									
								?>	
									<li><a <?php echo $class; ?> id="menu_<?php echo $key; ?>" <?php if($menu_count==$total){ echo 'class="last"'; } ?> href="<?php echo base_url().$session_menu[$key]->menu_url; ?>"><?php echo  $session_menu[$key]->menu_title; ?></a></li>
								<?php
								} 
							?>
							<!--<li><a href="<?php echo base_url(); ?>members/clientdashboard">Dashboard</a></li>
							<li><a href="#" >Commissions</a></li>
							<li><a href="<?php echo base_url(); ?>members/training">Marketing Videos</a></li>
							<li>
								<a class="last" href="<?php echo base_url(); ?>members/programs">p</a>
							</li>-->
							
							
						</ul>
					</nav>
					
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
		<?php if(isset($stylelist)):
            foreach ($stylelist as $style):?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().$style; ?>">
			<?php endforeach;
        endif; 
        if(isset($scriptlist)): 
            foreach ($scriptlist as $script):?>
        <script src="<?php echo base_url().$script; ?>" type="text/javascript"></script>
        <?php endforeach;
        endif; ?>
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
                                                                     <div class="links"><ul><li><a href="#">Welcome <b><?php echo $session_data['fullname']; ?></b></a></li>
									
										<li><a href="<?php echo base_url()?>members/setting">Tools</a></li>
										<li><a href="<?php echo base_url()?>members/clientdashboard/logout">Logout</a></li>
										<li><a  class="last modalbox" href="#inline">Contact Support</a></li>
									</ul></div>
								 </nav>
								<div class="sponsor">
									
								 </div>
							</div>
							<!-- /header right -->
						</div>
						<!--/header-->
			 </div>
            <!-- container -->
            <div id="container">
            	<div class="wrapperMain containermain"><br>

                <h2 align="left" style="margin-left:10px; color:#fff;">Easy Access Profits Terms of Service</h2>
<div id="policybox">
<style>
p
{
	color:#fff;
}
</style><h3 style="color:#fff; text-align:left; margin:10px;	">
Welcome to Easy Access Profits (E.A.P)</h3>

<p align="justify" style="margin:10px;" >
Thank you for using Easy Access Profits, software that helps you grow your list and makes 
affiliate marketing easier.By using Easy Access Profits, you are agreeing to these terms.
Please read them carefully.Easy Access Profits will require you to enter personal details
during the sign up process and this step is done in order for us to provide you with a full
service in creating your website and making your life easier.
</p><br>
<p align="justify" style="margin:10px;" >
Thank you for using Easy Access Profits, software that helps you grow your list and makes 
affiliate marketing easier.By using Easy Access Profits, you are agreeing to these terms.
Please read them carefully.Easy Access Profits will require you to enter personal details
during the sign up process and this step is done in order for us to provide you with a full
service in creating your website and making your life easier.</p><br>

<h3 style="color:#fff; text-align:left; margin:10px;	">
Your Easy Access Profits Account
</h3>
<p align="justify" style="margin:10px;">
You may need to create an account with Easy Access Profits in order to use our Services. You may modify, change and edit your account details in the Edit Profile area after you sign up.
If you learn of any unauthorized use of your password or account send an email to abuse@easyaccessprofits.com
</p><br>

<h3 style="color:#fff; text-align:left; margin:10px;	">
About these Terms</h3>
<p align="justify" style="margin:10px;">

We may change these terms depending on the growth and usage of the software Easy Access Profits. 
Please check from time to time for any changes to keep yourself updated.
</p>
  </div>

					</div><div id="msgarea">
<div id="msgarea-container">

</div></div>
                    
                    <div id="footer">
<footer class="footer">
<div class="footer-area">
	<div class="footerLink">
    <div class="footerLink-left">
    <ul>
			<li><a class="last" href="#">Copyright Easy Access Profits 2013</a></li>
		</ul>
    </div>
		<div class="footerLink-right">
        <ul>
			<li><a href="<?php echo base_url(); ?>landing/termsofservice">Terms of Service</a></li>
			<li><a href="<?php echo base_url(); ?>landing/privacypolicy">Privacy Policy</a></li>
			<li><a href="<?php echo base_url(); ?>landing/earningdisclaimer">Earnings Disclaimer</a></li>
		</ul></div>
	</div></div>
</footer>
		</div>
	</div>
	<!-- /containor -->
	</div>
</div>


</div>
</body>
</html>

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
        <title>::-<?php if(isset($metatitle)){ echo $metatitle; }else { echo 'Easy Access Profits';}?>-::</title>
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

                <h3 align="left" style="margin-left:10px;">Privacy Policy</h3>
<div id="policybox">


<p style="margin:10px;"><span style="color:white;  font-family:arial,sans-serif; font-size:10.5pt">(&rsquo;I&rsquo; and &lsquo;we&rsquo; refers to&nbsp;<strong>EasyAccessProfits</strong>, owner of this website)<br />
<br />
I am committed to keeping all your personal details safe and secure. My privacy policy strictly protects the security of your personal information and honors your choices for its intended use. We carefully protect your data from loss, misuse, unauthorized access or disclosure, alteration, or destruction.<br />
<br />
Collecting Your Personal Information<br />
<br />
I am committed to protecting your privacy. I will only use the information that I collect about you lawfully (in accordance with the Data Protection Act 1998). I will not pass on your details to any third party and do not send out marketing e-mails to customers unless they have registered to receive such material, purchased from me, or downloaded one of my free or paid products.<br />
<br />
The type of information I &lsquo;may&rsquo; collect about you includes:<br />
<br />
Your first name and last name<br />
Your e-mail address<br />
Your phone number<br />
<br />
Generally, this information is requested when you are either downloading free products, when you purchase any of my products (eBooks, software etc.), or when you subscribe to my newsletters and or a free service rendered to you. I will never collect sensitive information about you without your explicit consent. The information I hold will be accurate and up to date. You can check the information that I hold about you by e-mailing us at&nbsp;<strong>support@easyaccessprofits.com</strong>. If you find any inaccuracies we will delete or correct it promptly.<br />
<br />
Usage of Your Personal Information<br />
<br />
I will not use your personal information for any other reason other than to contact you. We do not sell, give away or rent your email address to any third party. If in the future I did for any reason wish to rent, sell or use your email address for any other purpose we will ask you for your permission first.<br />
<br />
How We Use Your Personal Information<br />
<br />
Your personal information is used for four main purposes and they are as follows:<br />
<br />
1. To send out information, recommendations and resources to you.<br />
<br />
2. To provide assistance to you after you have purchased products from me.<br />
<br />
3. To help me create and deliver content most relevant to you.<br />
<br />
4. To enlighten you about new products, services, tool, upgrades, special offers and information which I feel may be of use to you.<br />
<br />
<!--[if !supportLineBreakNewLine]<br />-->
<!--[endif]--></span></p>

<p style="margin:10px;"><span style="color:white; font-family:arial,sans-serif; font-size:10.5pt">I will only disclose your personal information, without notice, if required to do so by law or in the good faith belief that such action is necessary to:<br />
<br />
(a) Conform to the edicts of the law or comply with legal process served on <strong>www.EasyAccessProfits.com</strong><br />
<br />
(b) Protect and defend the rights or property of&nbsp;<strong>www. EasyAccessProfits.com;</strong><br />
<br />
(c) Act in urgent circumstances to protect the personal safety of users of <strong>www. EasyAccessProfits.com.</strong></span></p>
                
                </div>

					</div>
                    
                    <hr size="20px" color="#202936" style="margin-top:20px; border-top:1px #58728c solid; border-bottom:1px #58728c solid; ">
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

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

                <h3 align="left" style="margin-left:10px;">Earning Disclaimer And Legal Notice</h3>
<div id="policybox">


<p style="margin:10px;"><span style="color:white;  font-family:arial,sans-serif; font-size:10.5pt">
Earnings Disclaimer:&nbsp; While every effort has been made to accurately represent our products and their potential there is no guarantee that you will earn any money using the techniques and ideas in these materials.&nbsp; Examples in these materials are not to be interpreted as a promise or guarantee of earnings.<br />
<br />
Earning potential is entirely dependent on the person using the products, the ideas and the techniques. We do not purport this as a &ldquo;get rich scheme.&rdquo;&nbsp; and any claims made of actual earnings or examples of actual results can be verified upon request. Your level of success in attaining the results claimed in our materials depends on the time you devote to the program, ideas and techniques mentioned your finances, knowledge and various skills.<br />
<br />
As these factors differ according to each individual we cannot guarantee your success or income level. Nor are we responsible for any of your actions.&nbsp; Materials in our product and our website may contain information that includes or is based upon forward-looking statements within the meaning of the securities litigation reform act of 1995.<br />
<br />
Forward-looking statements give our expectations or forecasts of future events. You can identify these statements by the fact that they do not relate strictly to historical or current facts. They use words such as &ldquo;anticipate,&rdquo; &ldquo;estimate,&rdquo; &ldquo;expect,&rdquo; &ldquo;project,&rdquo; &ldquo;intend,&rdquo; &ldquo;plan,&rdquo; &ldquo;believe,&rdquo; and other words and terms of similar meaning in connection with a description of potential earnings or financial performance.&nbsp;<br />
<br />
Any and all forward looking statements here or on any of our sales material are intended to express our opinion of earnings potential. Many factors will be important in determining your actual results and no guarantees are made that you will achieve results similar to ours or anybody else&#39;s, in fact no guarantees are made that you will achieve any results from our ideas and techniques in our materials. &nbsp;<br />
<br />
Copyright &copy; 2013 EasyAccessProfits.com. All Rights Reserved<br />

<br />
</span></p>
                
                </div>

					</div>
                    
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

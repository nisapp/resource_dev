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
    $sponser='E.A.P';
}

?>
<html>
    <head>
        <title>::-<?php if(isset($metatitle)){ echo $metatitle; }else { echo 'Easy Access Profits';}?>-::</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css">
		<script src="<?php echo base_url()?>scripts/jquery-1.7.2.min.js" type="text/javascript"></script>
                <script src="<?php echo base_url()?>scripts/jquery.zclip.js" type="text/javascript"></script>
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
                        $(document).ready(function(){
                            $("#user_affiliate_link").click(function(){
                                //alert("clicked");
                                window.open($(this).attr('href'),'_blank');
                            });
                            $("a#user_affiliate_link").zclip({
                                path:'<?php  echo base_url(); ?>scripts/ZeroClipboard.swf',
                                copy:"<?php echo base_url()?>go/<?php echo $session_data['user_track_id'];?>"
                            });
                        });
		</script>
		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-41990556-1', 'easyaccessprofits.com');
		  ga('send', 'pageview');
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
		<legend id="support">For support, please fill in the form below:</legend>

		<label for="email"><span class="required">*</span> Best Email:</label>
		<input name="email" type="email" id="email" class="txt" />

		<br />
		<label for="comments"><span class="required">*</span> Support Request:</label>
		<textarea name="msg" id="msg"></textarea>
		
		<button id="send" class="button">Get Support Now</button>
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
            	<div class="wrapperMain containermain">
				
					<div id="navigation">
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
						</ul>
					</nav></div>
                    <div id="navigation-right">
						<div class="textare">
							<span id="sponsor">Your Sponsor : <br/>
                                                            <a href="#"><?php echo $sponser; ?></a></span>
							<br/>
							<span>Your Affiliate Id : </span>
							<a style="font-size:11px;" id="user_affiliate_link" href="<?php echo base_url()?>go/<?php echo $session_data['user_track_id'];?>" 
                                                           target="_blank" title="Click here to copy your affiliate id.">
									<?php echo base_url()?>go/<?php echo $session_data['user_track_id'];?>
							</a>
						</div>
					</div>
                    
					
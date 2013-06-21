<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title; ?></title>
        <?php if(isset($stylelist)):
			foreach ($stylelist as $style){ ?>
				<link rel="stylesheet" type="text/css" href="<?php echo base_url().$style; ?>">
		<?php }
			endif; 
        if(isset($scriptlist)): 
            foreach ($scriptlist as $script){?>
				<script src="<?php echo base_url().$script; ?>" type="text/javascript"></script>
	<?php 	}
        endif; ?>
</head>
<body>
<div id="header">
<!--<center><img src="<?php echo base_url();?>images/header.png" width="960" height="91"/></center></div>-->
				<div class="wrapperMain">
					<!--header-->
					<?php $this->load->view('global/header.php'); ?>
					<!--/header-->
				</div>
<div id="wrapper">
    <?php $session_menu = $this->session->userdata('menu_data_in_session'); 
    if(!empty($session_menu)):
    ?>
    <nav class="maniNav">
        <ul>
            <?php
            foreach($session_menu as $key=>$value){
                ?>
            <li><a href="<?php echo base_url().$session_menu[$key]->menu_url; ?>"><?php echo  $session_menu[$key]->menu_title; ?></a></li>
                <?php } ?>
        </ul>
    </nav>
        <?php endif; ?>

<div id="text-holder-top"></div>
<div id="text-holder-side">
<p><strong>Easy Access Profits Terms of Service</strong></p>

<p>Last modified: June 4, 2013</p>

<p><strong>Welcome to Easy Access Profits (E.A.P)</strong></p>

<p>Thank you for using Easy Access Profits, software that helps you grow your list and makes affiliate marketing easier.</p>

<p>By using Easy Access Profits, you are agreeing to these terms. Please read them carefully.</p>

<p>Easy Access Profits will require you to enter personal details during the sign up process and this step is done in order for us to provide you with a full service in creating your website and making your life easier.</p>

<p><strong>Using our Software Services</strong></p>

<p>You must follow any policies made available to you within the Easy Access Profits software.</p>

<p>Don&rsquo;t misuse Easy Access Profits.</p>

<p>Using our software (E.A.P) does not give you ownership of any intellectual property rights in the content you access. You may not use content from E.A.P unless you obtain permission from its owner or are otherwise permitted by law. These terms do not grant you the right to use any branding or logos used in E.A.P. Don&rsquo;t remove, obscure, or alter any legal notices displayed in or along with E.A.P.</p>

<p>In connection with your use of E.A.P, we may send you software updates, email messages, and other information. You may opt out of some of those communications.</p>

<p><strong>Your Easy Access Profits Account</strong></p>

<p>You may need to create an account with Easy Access Profits in order to use our Services. You may modify, change and edit your account details in the Edit Profile area after you sign up.</p>

<p>If you learn of any unauthorized use of your password or account send an email to abuse@easyaccessprofits.com</p>

<p><strong>About these Terms</strong></p>

<p>We may change these terms depending on the growth and usage of the software Easy Access Profits. Please check from time to time for any changes to keep yourself updated.</p>
</div>

<div id="text-holder-bottom"></div>

</div>

    <?php $this->load->view('global/footerlinks.php'); ?>

</body>
</html>

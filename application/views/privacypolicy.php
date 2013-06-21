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
<p style="text-align:center"><strong><span style="color:black; font-family:arial,sans-serif; font-size:10.5pt">www.EasyAcessProfits.com</span></strong><strong><span style="color:black; font-family:arial,sans-serif; font-size:10.5pt">&nbsp;</span></strong></p>

<p style="text-align:center"><br />
<strong><span style="color:black; font-family:arial,sans-serif; font-size:10.5pt"><strong>Privacy Policy</strong></span></strong></p>

<p><span style="color:black; font-family:arial,sans-serif; font-size:10.5pt">(&rsquo;I&rsquo; and &lsquo;we&rsquo; refers to&nbsp;<strong>EasyAccessProfits</strong>, owner of this website)<br />
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

<p><span style="color:black; font-family:arial,sans-serif; font-size:10.5pt">I will only disclose your personal information, without notice, if required to do so by law or in the good faith belief that such action is necessary to:<br />
<br />
(a) Conform to the edicts of the law or comply with legal process served on <strong>www.EasyAccessProfits.com</strong><br />
<br />
(b) Protect and defend the rights or property of&nbsp;<strong>www. EasyAccessProfits.com;</strong><br />
<br />
(c) Act in urgent circumstances to protect the personal safety of users of <strong>www. EasyAccessProfits.com.</strong></span></p>
</div>

<div id="text-holder-bottom"></div>

</div>

    <?php $this->load->view('global/footerlinks.php'); ?>

</body>
</html>

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
<p style="text-align:center"><strong><span style="color:black; font-family:arial,sans-serif">www.EasyAccessProfits.com</span></strong><strong><span style="color:black; font-family:arial,sans-serif">&nbsp;</span></strong></p>

<p style="text-align:center"><br />
<strong><span style="color:black; font-family:arial,sans-serif"><strong>Earning Disclaimer And Legal Notice</strong></span></strong></p>

<p><span style="color:black; font-family:arial,sans-serif; font-size:10.5pt">Earnings Disclaimer:&nbsp; While every effort has been made to accurately represent our products and their potential there is no guarantee that you will earn any money using the techniques and ideas in these materials.&nbsp; Examples in these materials are not to be interpreted as a promise or guarantee of earnings.</span></p>

<p><span style="color:black; font-family:arial,sans-serif; font-size:10.5pt">Earning potential is entirely dependent on the person using the products, the ideas and the techniques. We do not purport this as a &ldquo;get rich scheme.&rdquo;&nbsp; and any claims made of actual earnings or examples of actual results can be verified upon request. Your level of success in attaining the results claimed in our materials depends on the time you devote to the program, ideas and techniques mentioned your finances, knowledge and various skills.</span></p>

<p><span style="color:black; font-family:arial,sans-serif; font-size:10.5pt">As these factors differ according to each individual we cannot guarantee your success or income level. Nor are we responsible for any of your actions.&nbsp; Materials in our product and our website may contain information that includes or is based upon forward-looking statements within the meaning of the securities litigation reform act of 1995.</span></p>

<p><span style="color:black; font-family:arial,sans-serif; font-size:10.5pt">Forward-looking statements give our expectations or forecasts of future events. You can identify these statements by the fact that they do not relate strictly to historical or current facts. They use words such as &ldquo;anticipate,&rdquo; &ldquo;estimate,&rdquo; &ldquo;expect,&rdquo; &ldquo;project,&rdquo; &ldquo;intend,&rdquo; &ldquo;plan,&rdquo; &ldquo;believe,&rdquo; and other words and terms of similar meaning in connection with a description of potential earnings or financial performance.&nbsp;</span></p>

<p><span style="color:black; font-family:arial,sans-serif; font-size:10.5pt">Any and all forward looking statements here or on any of our sales material are intended to express our opinion of earnings potential. Many factors will be important in determining your actual results and no guarantees are made that you will achieve results similar to ours or anybody else&#39;s, in fact no guarantees are made that you will achieve any results from our ideas and techniques in our materials. &nbsp;</span></p>

<p><span style="color:black; font-size:13.5pt">&nbsp;</span></p>

<p style="text-align:center"><span style="color:black; font-family:arial,sans-serif; font-size:7.5pt">Copyright &copy; 2013 EasyAccessProfits.com. All Rights Reserved</span></p>
</div>

<div id="text-holder-bottom"></div>

</div>

    <?php $this->load->view('global/footerlinks.php'); ?>

</body>
</html>

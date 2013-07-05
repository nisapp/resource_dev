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
		




<div id="wrapper">
	<div class="siteHeaderBg">
        <div class="wrapperOuter">
             <div class="wrapperMain">
					<!--header-->
					


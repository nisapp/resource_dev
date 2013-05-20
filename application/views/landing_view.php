<html>
    <head>
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
	<div id="wrapper">
		<div class="siteHeaderBg">
			<div class="wrapperOuter">
				<div class="wrapperMain">
					<!--header-->
					<?php $this->load->view('global/header.php'); ?>
					<!--/header-->
				</div>
				<!-- container -->
            <div id="container">
			
			<input type="hidden" id="id_videopreview" value="default.mp4">
			<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
				
			<div class="video_preveiw" style="">
						<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
						<div id="videopreview">Loading the player...</div>
			</div>
			 <img src="<?php echo base_url();?>images/webBg.png" id="videobg" />
            	<div class="wrapperMain containermain">
                 	<div class="clear pT12"></div>  
                    <a href="<?php echo base_url()?>register" >
						<input type="button" style="cursor:pointer;" class="getWebsitebtn" value="Get your website" >
					</a>
                    <div class="clear"></div>
                
					<!-- footer -->
						<?php $this->load->view('global/footer'); ?>
                    <!-- /footer -->
                
				</div>
            </div>
            <!-- /container -->
        </div>
    </div>

  </div>
				
</body>
</html>

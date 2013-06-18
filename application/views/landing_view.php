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

<img src="<?php echo base_url();?>images/steps-button.png" width="960" height="100" />

<div id="text-holder-top"></div>
<div id="text-holder-side">
<br />
  <img src="<?php echo base_url();?>images/main-text.png" width="960" height="465" />
  
  <br />
  
<div id="optinBox">  
	<form accept-charset="utf-8" action="https://app.getresponse.com/add_contact_webform.html"
    method="post">
           	 <div class="textField">
            <div id="form">
			<input type="text" title="Email" alt="Email" class="textBox" name="email" value="Enter Your Email Here" onfocus="if(this.value=='Enter Your Email Here'){this.value=''};" onblur="if(this.value==''){this.value='Enter Your Email Here'};"></div>
                              
                
                                
                   
                
                
                <div class="btnBox">
                    <input type="submit" name="submit" class="submit" value="" onclick="areYouReallySure=true;">
                </div>
            </div>
            <input type="hidden" name="webform_id" value="457754" />
           
           	 	 </form>
<script type="text/javascript" src="http://app.getresponse.com/view_webform.js?wid=457754&mg_param1=1"></script>
</div>
  
  <img src="<?php echo base_url();?>images/seat-left.png" width="480" height="38" /><br/><br/>
  
</div>

<div id="text-holder-bottom"></div><br/>
 
</div>

    <?php $this->load->view('global/footerlinks.php'); ?>

</body>
</html>

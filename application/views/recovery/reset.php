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
                                <style>
                                    body{
                                        /*background: url("<?php //echo base_url(); ?>images/bg-arrow.png") bottom center no-repeat;*/
                                        background-color: #c7e1f2;
                                    }
                                    select, input{
                                        border: 2px solid #48697e;
padding: 10px;
border-radius: 5px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
background: #fff;
color: #48697e;
margin-top: 5px;
font-size: 14px;
                                    }
                                    #wrapper{
                                        height:550px;
                                    }
                                </style>                                
</head>
<body>
    <?php if(!isset($islanding)&&!isset($isgo)): ?>
<div id="header">
<!--<center><img src="<?php echo base_url();?>images/header.png" width="960" height="91"/></center></div>-->
				<div class="wrapperMain">
					<!--header-->
					<?php $this->load->view('global/header.php'); ?>
					<!--/header-->
				</div>
    </div>
    <?php endif; ?>
<div id="wrapper">
    <?php  if(isset($error)): ?>
    <p><?php echo $error; ?></p>
    <?php endif;//*/ ?>
    <div id="reset_form">
    <?php 
    if(isset($msg)): ?>
        <p><?php echo $msg; ?> </p>
        <p>Go to <a href="<?php echo base_url(); ?>login">Login Page</a></p>
    <?php else: //*/ ?>
        <p>Username:<?php echo $username; ?></p>
    <?php 
    
    echo form_open("recovery/reset/$recoveryid");
    $password_info=array(
        'size'=> '30',
        'name'=>"password"
    ); ?>
        <p>
        <?php
    echo form_label('Password','password');
    echo form_password($password_info);
    $password_conf=array(
        'size'=> '30',
        'name'=>"confirm"
    ); ?>
            </p>
        <p>
        <?php
    echo form_label('Confirm password','confirm');
    echo form_password($password_conf);
    ?>
        </p>
        <?php
    echo form_submit('reset','Reset');
    echo form_close();
    endif;
    ?>
    </div>
</div>

    <?php if(!isset($islanding)&&!isset($isgo)) $this->load->view('global/footerlinks.php'); ?>

</body>
</html>

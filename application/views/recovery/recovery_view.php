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
    <p>Send your username or email.</p>
    <?php  if(isset($error)): ?>
    <p><?php echo $error; ?></p>
    <?php endif;//*/ ?>
    <div id="recovery_form">
    <?php 
    if(isset($msg)): ?>
        <p><?php echo $msg; ?> </p>
    <?php else: //*/
    echo form_open("recovery");
    $listoption = array(
        '1'=>"username",
        '2'=>"email"
    );
    echo form_dropdown('data_type',$listoption);
    $input_info=array(
        'size'=> '50',
        'name'=>"loginoremail",
        'id'=>"loginoremail"
    );
    echo form_input($input_info);
    echo form_submit('recovery','Send');
    echo form_close();
    endif;
    ?>
    </div>
</div>

    <?php if(!isset($islanding)&&!isset($isgo)) $this->load->view('global/footerlinks.php'); ?>

</body>
</html>

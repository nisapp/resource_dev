<?php
		if (isset($status) && $status=="updatesuccess"){?>
			<div class="infomessage"><?php echo "Password updated successfully"?> </div>
<?php }else if (isset($status) && $status=="notmatch"){?>
			<div class="infomessage"><?php echo "Opps ! Your current password does not match !!"?> </div>
<?php }else if (isset($status) && $status=="notconfirm"){?>
			<div class="infomessage"><?php echo "Opps ! Password does not cofirm !!"?> </div>
<?php } ?>

    <div class="content">
        <div class="header">
            <h1 class="page-title">
				Change Account Password
			</h1>
        </div>
        
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>clientadmin/clientdashboard">Home</a> <span class="divider">/</span></li>
			<li class="active">Change Account Password</li>
		</ul>

<div class="container-fluid">
<form method="post" action="<?php echo base_url()?>clientadmin/setting/setpassword">
<div class="row-fluid">
	<div class="dialog">
        <div class="block">
            <p class="block-heading">Change Account Password</p>
            <div class="block-body">
                    <label>Enter current password:</label>
                    <input type="password" class="span12" name="txtCurrent" placeholder="Current password" >
						<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('txtCurrent'); ?>
						</font>	
                    <label>Enter new password</label>
                    <input type="password" class="span12" name="txtNewpwd"   placeholder="New password" >
						<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('txtNewpwd'); ?>
						</font>	
                    <label>Confirm new password</label>
                    <input type="password" class="span12" name="txtConfirmpwd"   placeholder="Confirm password" >
						<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('txtConfirmpwd'); ?>
						</font>	
                    
                    <input type="submit" class="btn btn-primary pull-right" value="Update"/>
                    <div class="clearfix"></div>
            </div>
        </div>
    </div>
</form>
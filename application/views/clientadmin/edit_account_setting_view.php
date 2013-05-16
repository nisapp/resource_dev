    <div class="content">
        <div class="header">
            <h1 class="page-title">
			Account Setting
			</h1>
        </div>
        
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>clientadmin/clientdashboard">Home</a> <span class="divider">/</span></li>
			<li class="active">Account Setting</li>
		</ul>

<div class="container-fluid">
<form method="post" action="<?php echo base_url()?>clientadmin/setting/updatesetting">
<div class="row-fluid">
	<div class="dialog">
        <div class="block">
            <p class="block-heading">Account Setting</p>
            <div class="block-body">
                    <label>First Name</label>
                    <input type="text" class="span12" name="txtFname"  value=<?php echo $account_detail['first_name']; ?> >
						<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('txtFname'); ?>
						</font>	
                    <label>Last Name</label>
                    <input type="text" class="span12" name="txtLname"  value=<?php echo $account_detail['last_name']; ?> >
						<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('txtLname'); ?>
						</font>	
                    <label>Email Address</label>
                    <input type="text" class="span12" name="txtEmail"  value=<?php echo $account_detail['user_email']; ?> >
						<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('txtEmail'); ?>
						</font>	
                    <label>Username</label>
                    <input type="text" class="span12" name="txtUser" readonly="true"  value=<?php echo $account_detail['user_name']; ?> >
                    <label>Phone Number</label>
                    <input type="text" class="span12" name="txtPhone"  value=<?php echo $account_detail['phone_number']; ?> >
						<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('txtPhone'); ?>
						</font>	
					To change password <a href="<?php echo base_url();?>clientadmin/setting/changepassword">Click here </a>
                    <input type="submit" class="btn btn-primary pull-right" value="Update"/>
                    <div class="clearfix"></div>
            </div>
        </div>
    </div>
</form>
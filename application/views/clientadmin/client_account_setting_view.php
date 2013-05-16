<?php if (isset($status) && $status=="updatesuccess"){?>
			<div class="infomessage"><?php echo "Account updated successfully"?> </div>
<?php }else if (isset($status) && $status=="updatefailure"){?>
			<div class="infomessage"><?php echo "Opps ! Error in Account updated !!"?> </div>
<?php } ?>
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
<style>
.view_only{
	border:none  !important;
	background-color:wheat !important;
}
</style>
<div class="container-fluid">
<form method="post" action="<?php echo base_url()?>clientadmin/promotesite/invite">
<div class="row-fluid">
	<div class="dialog">
        <div class="block">
            <p class="block-heading">Account Setting</p>
            <div class="block-body">
                    <label>First Name</label>
                    <input type="text" class="span12 view_only" readonly="true" value=<?php echo $account_detail['first_name']; ?> >
                    <label>Last Name</label>
                    <input type="text" class="span12 view_only" readonly="true" value=<?php echo $account_detail['last_name']; ?> >
                    <label>Email Address</label>
                    <input type="text" class="span12 view_only" readonly="true" value=<?php echo $account_detail['user_email']; ?> >
                    <label>Username</label>
                    <input type="text" class="span12 view_only" readonly="true" value=<?php echo $account_detail['user_name']; ?> >
                    <label>Phone Number</label>
                    <input type="text" class="span12 view_only" readonly="true" value=<?php echo $account_detail['phone_number']; ?> >
					To change password <a href="<?php echo base_url();?>clientadmin/setting/changepassword">Click here </a>
                    <a href="<?php echo base_url();?>clientadmin/setting/editdetail" class="btn btn-primary pull-right">Edit Detail</a>
                    <div class="clearfix"></div>
            </div>
        </div>
    </div>
</form>
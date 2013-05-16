<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Invitation send Successfully"?> </div>
<?php } ?>
  <style>
	.hidecat{
		width:270px;
		color: rgb(85, 85, 85);
		display: inline-block;
		font-size: 14px;
		height: 20px;
		line-height: 20px;
		margin-bottom: 9px;
		padding: 4px 6px;
	}
  </style>
    <div class="content">
        <div class="header">
            <h1 class="page-title">
			Invite User
			</h1>
        </div>
        
		<ul class="breadcrumb">
			<li><a href="admin/dashboard">Home</a> <span class="divider">/</span></li>
			<li class="active">Promote Site</li>
		</ul>

<div class="container-fluid">
<form method="post" action="<?php echo base_url()?>clientadmin/promotesite/invite">
<div class="row-fluid">
	<div class="well">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Details</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
				<div class="tab-pane active in" id="home" style="width:50%;float: left;">
					<label>First Name: </label>
					<input type="text" name="txtFname" class="input-xlarge val_dis_enb" required placeholder="First name" /> 
					<label>Last Name: </label>
					<input type="text" name="txtLname" class="input-xlarge val_dis_enb" required placeholder="Last name" /> 
					<label>Email Id: </label>
					<input type="email" name="txtEmail" class="input-xlarge val_dis_enb" required placeholder="Email-id of invite user" /> 

				</div>
		</div>
		<div class="btn-toolbar">
			<input class="btn btn-primary val_dis_enb" type="submit" name="invite" value="Invite" />
			<a href="<?php echo base_url();?>clientadmin/clientdashboard" data-toggle="modal" class="btn">Cancel</a>

			<div class="btn-group">
			</div>
		</div>
	
	</div>
</form>
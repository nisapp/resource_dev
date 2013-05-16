<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Email rule set successfully"?> </div>
<?php }else if (isset($status) && $status=="failure"){?>
			<div class="infomessage"><?php echo "Opps ! some error occur !!"?> </div>
<?php } ?>

<script src="<?php echo base_url(); ?>scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
    <div class="content">
        <div class="header">
            <h1 class="page-title">
			Follow up email rules
			</h1>
        </div>
        
		<ul class="breadcrumb">
			<li><a href="<?php echo base_url();?>clientadmin/clientdashboard">Home</a> <span class="divider">/</span></li>
			<li class="active">Email rules</li>
		</ul>

<div class="container-fluid">
<form method="post" action="<?php echo base_url()?>clientadmin/email/setfollowrule">
<div class="row-fluid">
	<div class="well">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#home" data-toggle="tab">Details</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
				<div class="tab-pane active in" id="home" style="width:50%;float: left;">
					<label>Email Subject: </label>
					<input type="text" name="txtSubject" id="txtSubject" class="input-xlarge val_dis_enb"  placeholder="Subject of Email" value="<?php echo $followup_mail_data['email_subject']; ?>"/> 
					<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('custom'); ?>
					</font>	
					<label>Email From: </label>
					<input type="text" name="txtFromEmail" id="txtFromEmail" class="input-xlarge val_dis_enb"  placeholder="From Email"  value="<?php echo $followup_mail_data['from_email']; ?>" /> 
					<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('txtFromEmail'); ?>
					</font>	
					<label>Email Message: </label>
					<textarea name="txtMessage" id="txtMessage" class="ckeditor" cols="80" rows="10"><?php echo $followup_mail_data['message']; ?></textarea>
					<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('txtMessage'); ?>
					</font>	
				</div>
<?php 
	// echo '<pre>';
	// print_r($followup_mail_data);
	// echo '</pre>';

 ?>
		</div>
		<div class="btn-toolbar">
			<input class="btn btn-primary val_dis_enb" type="submit" name="btnsave" value="Save" />
			<a href="<?php echo base_url();?>clientadmin/clientdashboard"  class="btn">Cancel</a>

			<div class="btn-group">
			</div>
		</div>
		<?php 
			if(isset($followup_mail_data)){
			
				if (array_key_exists('is_followup_email_data_exist', $followup_mail_data))
				{
					echo '<input type="text" name="is_update" value="1" >';
				}
			}
		
		?>
	</div>
</form>
<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Invitation send Successfully"?> </div>
<?php } ?>
<!-- promoteArea -->

<?php $this->load->view('members/components/submenu'); ?>

	
<div class="promoteArea">
<form method="post" action="<?php echo base_url()?>members/promotesite/invite" novalidate>
	<table id="rounded-corner" align="center" style="back">
		<thead>
			<tr>
				<th scope="col" colspan="2" align="center" >Invite User</th>
			</tr>
		</thead>
	
		<tbody>
			<tr>
				<td class="field_title">First Name:</td>
				<td class="field_data">
					<input type="text" name="txtFname" class="ac_input" required placeholder="First name" />
					<font style="font-size:12px;color:red;text-align:left;">
						<?php echo form_error('txtFname'); ?>
					</font>	
				</td>
				
			</tr>
			<tr>
				<td class="field_title">Last Name:</td>
				<td class="field_data">
					<input type="text" class="ac_input" name="txtLname"  placeholder="Last Name" >
					<font style="font-size:12px;color:red;text-align:left;">
						<?php echo form_error('txtLname'); ?>
					</font>
				</td>
			</tr>
			<tr>
				<td class="field_title">Email Id:</td>
				<td class="field_data">
					<input type="email" name="txtEmail" class="ac_input" required placeholder="Email-id of invite user" />
					<font style="font-size:12px;color:red;text-align:left;">
						<?php echo form_error('txtEmail'); ?>
					</font>	
				</td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
				<input type="submit" class="btn" value="Invite" >
					<a href="<?php echo base_url()?>members/clientdashboard"> 
						<input type="button" class="btn" value="cancel">
					</a>
				</td>
			</tr>
			
			
	  </tbody>
	</table>
</form>
 </div>
 </div>
<!-- /promoteArea -->

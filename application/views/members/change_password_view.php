<?php
		if (isset($status) && $status=="updatesuccess"){?>
			<div class="infomessage"><?php echo "Password updated successfully"?> </div>
<?php }else if (isset($status) && $status=="notmatch"){?>
			<div class="infomessage"><?php echo "Opps ! Your current password does not match !!"?> </div>
<?php }else if (isset($status) && $status=="notconfirm"){?>
			<div class="infomessage"><?php echo "Opps ! Password does not cofirm !!"?> </div>
<?php } ?>

  <!-- promoteArea -->
<div class="promoteArea2">
<form method="post" action="<?php echo base_url()?>members/setting/setpassword">
	<table id="rounded-corner" align="center">
		<thead>
			<tr>
				<th scope="col" colspan="2" align="center">Change Account Password</th>
			</tr>
		</thead>
	
		<tbody>
			<tr>
				<td class="field_title">Current password:</td>
				<td class="field_data">
					<input type="password"  class="ac_input" name="txtCurrent" placeholder="Current password" >
					<font style="font-size:12px;color:red;text-align:left;">
						<?php echo form_error('txtCurrent'); ?>
					</font>	
				</td>
				
			</tr>
			<tr>
				<td class="field_title">New Password</td>
				<td class="field_data">
					<input type="password" class="ac_input" name="txtNewpwd" placeholder="New password" >
					<font style="font-size:12px;color:red;text-align:left;">
						<?php echo form_error('txtNewpwd'); ?>
					</font>	
				</td>
			</tr>
			<tr>
				<td class="field_title">Confirm Password</td>
				<td class="field_data">
					<input type="password" class="ac_input" name="txtConfirmpwd"   placeholder="Confirm password" >
					<font style="font-size:12px;color:red;text-align:left;">
						<?php echo form_error('txtConfirmpwd'); ?>
					</font>	
				</td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
					<input type="submit" class="btn" value="update" >
					<a href="<?php echo base_url()?>members/setting"> <input type="button" class="btn" value="cancel"></a>
				</td>
			</tr>
			
			
	  </tbody>
	</table>
</form>
 </div>
<!-- /promoteArea -->

<?php 
	// echo '<pre>';
	// print_r($account_detail);
	// echo '</pre>';

?>
<!-- promoteArea -->
<div class="promoteArea">
<form method="post" action="<?php echo base_url()?>clientadmin/setting/updatesetting">
	<table id="rounded-corner" align="center">
		<thead>
			<tr>
				<th scope="col" colspan="2" align="center">Change Account Setting</th>
			</tr>
		</thead>
	
		<tbody>
			<tr>
				<td class="field_title">First name :</td>
				<td class="field_data">
					<input type="text" name="txtFname" class="ac_input" value="<?php echo $account_detail['first_name'];?>" >
					<font style="font-size:12px;color:red;text-align:left;">
								<?php echo form_error('txtFname'); ?>
					</font>
				</td>
				
			</tr>
			<tr>
				<td class="field_title">Last name :</td>
				<td class="field_data">
					<input type="text" name="txtLname" class="ac_input" value="<?php echo $account_detail['last_name'];?>" >
					<font style="font-size:12px;color:red;text-align:left;">
									<?php echo form_error('txtLname'); ?>
					</font>
				</td>
			</tr>
			<tr>
				<td class="field_title">Email Address :</td>
				<td class="field_data">
					<input type="text" name="txtEmail" class="ac_input" value="<?php echo $account_detail['user_email'];?>" >
					<font style="font-size:12px;color:red;text-align:left;">
									<?php echo form_error('txtEmail'); ?>
					</font>
				</td>
			</tr>
			<tr>
				<td class="field_title">Username :</td>
				<td class="field_data"><?php echo $account_detail['user_name'];?></td>
			</tr>
			<tr>
				<td class="field_title">Phone Number :</td>
				<td class="field_data">
					<input type="text" name="txtPhone" class="ac_input" value="<?php echo $account_detail['phone_number'];?>" >
					<font style="font-size:12px;color:red;text-align:left;">
									<?php echo form_error('txtPhone'); ?>
					</font>
				</td>
			</tr>
			<tr>
				<td class="field_title" colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td class="field_title">GVO Username:</td>
				<td class="field_data">
					<input type="text" name="txt_gvo_user" class="ac_input" maxlength="30"  value="<?php echo $account_detail['gvo_user_name'];?>" >
					<font style="font-size:12px;color:red;text-align:left;">
							<?php echo form_error('txt_gvo_user'); ?>
					</font>
				</td>
			</tr>
			<tr>
				<td class="field_title">Pure Leverage Username:</td>
				<td class="field_data">
					<input type="text" name="txt_lev_user" class="ac_input"  maxlength="30"  value="<?php echo $account_detail['leverage_user_name'];?>" >
					<font style="font-size:12px;color:red;text-align:left;">
									<?php echo form_error('txt_lev_user'); ?>
					</font>
				</td>
			</tr>
			<tr>
				<td class="field_title">Empower Network Username:</td>
				<td class="field_data">
					<input type="text" name="txt_emp_user" class="ac_input" maxlength="30" value="<?php echo $account_detail['emp_netwrok_user_name'];?>" >
					<font style="font-size:12px;color:red;text-align:left;">
									<?php echo form_error('txt_emp_user'); ?>
					</font>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" class="btn" value="update" >
					<a href="<?php echo base_url()?>clientadmin/setting"> <input type="button" class="btn" value="cancel"></a>
				</td>
			</tr>
	  </tbody>
	</table>
</form>
 </div>
<!-- /promoteArea -->

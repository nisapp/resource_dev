<?php if (isset($status) && $status=="updatesuccess"){?>
			<div class="infomessage"><?php echo "Account updated successfully"?> </div>
<?php }else if (isset($status) && $status=="updatefailure"){?>
			<div class="infomessage"><?php echo "Opps ! Error in Account updated !!"?> </div>
<?php } ?>

<div id="tabs">
	<a href="<?php echo base_url(); ?>clientadmin/setting">Edit Profile</a>
	<a href="<?php echo base_url(); ?>clientadmin/email">Welcome Email Rules</a>
	<a href="<?php echo base_url(); ?>clientadmin/email/femail">Follow-up Email Rules</a>
</div>

<!-- promoteArea -->
<div class="promoteArea">
	<table id="rounded-corner" align="center">
		<thead>
			<tr>
				<th  scope="col" colspan="2" align="center">Account Detail</th>
			</tr>
		</thead>
	<tfoot>
    	<tr>
        	<td class="rounded-foot-left">
			<a  class="btnlink" href="<?php echo base_url();?>clientadmin/setting/changepassword">Change Password </a>
			</td>
			<td class="rounded-foot-right">
				<a href="<?php echo base_url();?>clientadmin/setting/editdetail" class="btnlink">Edit Detail</a>
			</td>
        </tr>
    </tfoot>
		<tbody>
			<tr>
				<td class="field_title">First name :</td>
				<td class="field_data"><?php echo $account_detail['first_name'];?></td>
			</tr>
			<tr>
				<td class="field_title">Last name :</td>
				<td class="field_data"><?php echo $account_detail['last_name'];?></td>
			</tr>
			<tr>
				<td class="field_title">Email Address :</td>
				<td class="field_data"><?php echo $account_detail['user_email'];?></td>
			</tr>
			<tr>
				<td class="field_title">Username :</td>
				<td class="field_data"><?php echo $account_detail['user_name'];?></td>
			</tr>
			<tr>
				<td class="field_title">Phone Number :</td>
				<td class="field_data"><?php echo $account_detail['phone_number'];?></td>
			</tr>
			<tr>
				<td class="field_title" colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td class="field_title">GVO Username :</td>
				<td class="field_data"><?php echo $account_detail['gvo_user_name'];?></td>
			</tr>
			<tr>
				<td class="field_title">Pure Leverage Username :</td>
				<td class="field_data"><?php echo $account_detail['leverage_user_name'];?></td>
			</tr>
			<tr>
				<td class="field_title">Empower Network Username :</td>
				<td class="field_data"><?php echo $account_detail['emp_netwrok_user_name'];?></td>
			</tr>
			
			
			
	  </tbody>
	</table>
 </div>
<!-- /promoteArea -->

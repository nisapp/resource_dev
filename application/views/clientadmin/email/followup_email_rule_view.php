<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Email rule set successfully"?> </div>
<?php }else if (isset($status) && $status=="failure"){?>
			<div class="infomessage"><?php echo "Opps ! some error occur !!"?> </div>
<?php } ?>
<script src="<?php echo base_url(); ?>scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
<style type="text/css">
	fieldset { margin: 0 0 22px 0; border: 1px solid #095D92; padding: 12px 17px; background-color: #DFF3FF; }
	legend { font-size: 1.1em; background-color: #095D92; color: #FFFFFF; font-weight: bold; padding: 4px 8px;-webkit-padding:4px 8px; }
	#rounded-corner-email{
		font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
		font-size: 14px;
		width: 100%;
		color:#000;
		text-align: left;
		border-collapse: collapse;
	}
	#rounded-corner-email th
	{
		padding: 8px;
		font-weight: bold;
		font-size: 14px;
		color: #FFF;
		background: #78A0B1;
	}
	#rounded-corner-email td
	{
		padding: 10px 4px 4px 8px;
		color: #669;
		font-size: 14px;
	}
</style>

<!-- promoteArea -->
<div class="promoteArea">
<form method="post" action="<?php echo base_url()?>clientadmin/email/setfollowrule">
<fieldset>
	<legend>Follow Up Email Rules</legend>
		<table id="rounded-corner-email" align="center">
			<thead>
				<tr>
					<th scope="col" colspan="2" align="center">Follow Up Email Rules</th>
				</tr>
			</thead>
		
			<tbody>
				<tr>
					<td class="field_title">Email Subject:</td>
				</tr>
				<tr>
					<td class="field_data">
						<input type="text" name="txtSubject" id="txtSubject" placeholder="Subject of Email" class="ac_input" value="<?php echo $followup_mail_data['email_subject']; ?>" maxlength="30">
						<font style="font-size:12px;color:red;text-align:left;">
									<?php echo form_error('txtSubject'); ?>
						</font>
					</td>
				</tr>
				<tr>
					<td class="field_title">Email From:</td>
				</tr>
				<tr>
					<td class="field_data">
						<input type="text" name="txtFromEmail"  placeholder="From Email" id="txtFromEmail" class="ac_input" value="<?php echo $followup_mail_data['from_email']; ?>"  maxlength="40">
						<font style="font-size:12px;color:red;text-align:left;">
									<?php echo form_error('txtFromEmail'); ?>
						</font>
					</td>
				</tr>
				<tr>
					<td class="field_title">Email Message:</td>
				</tr>
				<tr>
					<td class="field_data">
						<textarea name="txtMessage" id="txtMessage" class="ckeditor" cols="80" rows="10"><?php echo $followup_mail_data['message']; ?></textarea>
						<font style="font-size:12px;color:red;text-align:left;">
								<?php echo form_error('txtMessage'); ?>
						</font>	
					</td>
				</tr>
				
				
				<tr>
					<td align="center">
						<input type="submit" class="btn" value="set rule" >
						<a href="<?php echo base_url()?>clientadmin/setting"> <input type="button" class="btn" value="cancel"></a>
					</td>
				</tr>
				
				
		  </tbody>
		</table>
	</fieldset>
	<?php 
			if(isset($followup_mail_data)){
			
				if (array_key_exists('is_followup_email_data_exist', $followup_mail_data))
				{
					echo '<input type="hidden" name="is_update" value="1" >';
				}
			}
		
		?>
</form>
 </div>
<!-- /promoteArea -->
    
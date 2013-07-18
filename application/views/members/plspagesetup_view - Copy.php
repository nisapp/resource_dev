<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Data added successfully"?> </div>
<?php }else if (isset($status) && $status=="failure"){?>
			<div class="infomessage"><?php echo "Opps ! Error while saving data!!"?> </div>
<?php } ?>

<div id="page_main_content">
<?php $this->load->view('members/components/submenu'); ?>

  <!-- promoteArea -->
<div class="promoteArea2">
<form method="post" action="<?php echo base_url()?>members/plspagesetup/save">
	<table id="rounded-corner" class="tools_section" align="center">
		<thead>
			<tr>
				<th scope="col" colspan="2" align="center">PureLeverage Id set up</th>
			</tr>
		</thead>
	
		<tbody>
			<tr>
				<td class="field_title">Campaign Code:</td>
				<td class="field_data">
					<input type="text" class="ac_input" name="txtCampaign" placeholder="Campaign Code" >
						<span class="form_error"><?php echo form_error('txtCampaign'); ?></span>
				</td>
			</tr>
			<tr>
				<td class="field_title">Form Id:</td>
				<td class="field_data">
					<input type="text" class="ac_input" name="txtForm" placeholder="Form Id" >
					<span class="form_error"><?php echo form_error('txtForm'); ?></span>
					
				</td>
			</tr>
			<tr>
				<td class="field_title">Pureleverage Affliate Name:</td>
				<td class="field_data">
					<input type="text" class="ac_input" name="txtAffliate" placeholder="Pureleverage Affliate Name" >
					<span class="form_error"><?php echo form_error('txtAffliate'); ?></span>
	
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2" align="center">
					<input type="submit" class="btn" value="Save" >
					<a href="<?php echo base_url()?>members/setting"> <input type="button" class="btn" value="cancel"></a>
				</td>
			</tr>
			
			
	  </tbody>
	</table>
</form>
 </div>
<!-- /promoteArea -->

<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Data added successfully"?> </div>
<?php }else if (isset($status) && $status=="failure"){?>
			<div class="infomessage"><?php echo "Opps ! Error while saving data!!"?> </div>
<?php }

// check whether clien set his pure levrage account or not
$is_plv_exist=0; 
if($plv_data && $plv_data!=''){
	$is_plv_exist=1;
}else{
	$is_plv_exist=0;
}
// echo $is_plv_exist;
// echo '<pre>';
// print_r($plv_data);
// echo '</pre>';

 ?>

<div id="page_main_content">
<?php $this->load->view('members/components/submenu'); ?>

  <!-- promoteArea -->
<div class="promoteArea2">
<script>
function set_view(show_class,hide_class){
	// alert("jkhkj");
	jQuery('.'+show_class).fadeIn("fast");
	jQuery('.'+hide_class).fadeOut("slow");
}
</script>
<table id="rounded-corner" class="plv_info" align="center">
		<thead>
			<tr>
				<th scope="col" colspan="2" align="center">Pure Leverage Id set up</th>
			</tr>
		</thead>
	
		<tbody>
			<tr>
				<td class="field_title">Campaign Code:</td>
				<td class="field_data">
					<?php if($is_plv_exist){ echo $plv_data->campaign_code; }else{ echo 'NULL';} ?>		
				</td>
			</tr>
			<tr>
				<td class="field_title">Form Id:</td>
				<td class="field_data">
					<?php if($is_plv_exist){ echo $plv_data->form_id; }else{ echo 'NULL';} ?>		
				</td>
			</tr>
			<tr>
				<td class="field_title">Pure leverage Affliate Name:</td>
				<td class="field_data">
					<?php if($is_plv_exist){ echo $plv_data->plev_affliate_name; }else{ echo 'NULL';} ?>		
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2" align="center">
					<input type="button" class="btn" value="Change" title="Click here to pure leverage edit detail" onclick="set_view('add_plv_info','plv_info');">
				</td>
			</tr>
	  </tbody>
	</table>

<form method="post" class="add_plv_info" action="<?php echo base_url()?>members/plspagesetup/save"  style="display:none;">
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
					<input type="text" value="<?php if($is_plv_exist){ echo $plv_data->campaign_code; } ?>" required class="ac_input" name="txtCampaign" placeholder="Campaign Code" >
						<span class="form_error"><?php echo form_error('txtCampaign'); ?></span>
				</td>
			</tr>
			<tr>
				<td class="field_title">Form Id:</td>
				<td class="field_data">
					<input type="text" value="<?php if($is_plv_exist){ echo $plv_data->form_id; } ?>" required class="ac_input" name="txtForm" placeholder="Form Id" >
					<span class="form_error"><?php echo form_error('txtForm'); ?></span>
					
				</td>
			</tr>
			<tr>
				<td class="field_title">Pureleverage Affliate Name:</td>
				<td class="field_data">
					<input type="text" value="<?php if($is_plv_exist){ echo $plv_data->plev_affliate_name; } ?>" required class="ac_input" name="txtAffliate" placeholder="Pureleverage Affliate Name" >
					<span class="form_error"><?php echo form_error('txtAffliate'); ?></span>
	
				</td>
			</tr>
			
			
			<tr>
				<td colspan="2" align="center">
					<input type="submit" class="btn" value="Save" >
					<input type="button" class="btn" value="cancel" onclick="set_view('plv_info','add_plv_info');" >
				</td>
			</tr>
	  </tbody>
	</table>
</form>
 </div>
<!-- /promoteArea -->

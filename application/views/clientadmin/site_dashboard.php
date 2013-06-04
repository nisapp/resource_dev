<script type="text/javascript" src="<?php echo base_url();?>scripts/tabber.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/example.css" TYPE="text/css" MEDIA="screen">
<style type="text/css">
.tabberlive .tabbertab {
  height:200px;
}
</style>
<div class="tabber">

     <div class="tabbertab">
	  <h2>Contacts</h2>
	  <p><div class="display_data" style="" >
	  <?php echo form_open(site_url('sites/'));?>
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <thead>
        <tr>
            <td></td>
            <td><?php echo ('site_dashboard_cname_label');?></td>
            <td><?php echo ('site_dashboard_cnumber_label');?></td>
            <td><?php echo ('site_dashboard_cbegining_label');?></td>
            <td><?php echo ('site_dashboard_ctermination_label');?></td>
            <td><?php echo ('site_dashboard_cwins_label');?></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo ('site_dashboard_ca_label');?></td>
            <td><?php echo 'a_contract_name';?></td>
            <td><?php echo 'a_contract_name';?></td>
            <td><?php echo 'a_contract_name';?></td>
            <td><?php echo 'a_contract_name';?></td>
            <td><?php echo 'a_contract_name';?></td>
        </tr>
        <tr>
            <td><?php echo ('site_dashboard_cb_label');?></td>
            <td><?php echo 'b_contract_name';?></td>
            <td><?php echo 'b_contract_name';?></td>
            <td><?php echo 'b_contract_name';?></td>
            <td><?php echo 'b_contract_name';?></td>
            <td><?php echo 'b_contract_name';?></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6"></td>
        </tr>
        <tr>
            <td colspan="6"><?php //echo form_submit('submit', lang('site_dashboard_save_btn') );?></td>
        </tr>
    </tfoot>
</table>
<?php echo form_close();?>				
				
				
				
				
				
				
				
				
				
				
				
				
				
				<?php echo form_open(site_url('sites/'));?>
				<table>
				<p>
				</br>
				<?php echo form_input($user_name);?>
				</p>
				</table>
				<?php echo form_close();?>
	</div></p>
     </div>


     <div class="tabbertab">
	  <h2>Contract A</h2>
	  <p>Contract A</p>
     </div>


     <div class="tabbertab">
	  <h2>Contract B</h2>
	  <p>Contract B</p>
     </div>
	 
	 <div class="tabbertab">
	  <h2>Documents</h2>
	  <p>Documents</p>
     </div>

</div>
<div id="content" style="margin:10px 0px 0px"> 
	<div class="signup_mid">
		<div class="signup_wrapper">
			<div class="sgup_heading1 font2"></div>
		</div>
		<div class="nav_inner">
			<ul>
				<li></li>
				<li></li>
			</ul>
		</div>
		
</div>
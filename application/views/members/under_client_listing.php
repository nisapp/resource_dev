<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Video has been added Successfully"; ?> </div>
<?php } ?>
<script>
	function delpro(id){
		var baseurl = $("#baseurl").val();
		$("#infomessage").css('display','block');
		// $("#del_yes").prop("href", baseurl+"admin/videos/deletevideo/"+id)
		$("#del_yes").prop("href", "#");
	}
	function no_del(){
		$("#infomessage").css('display','none');
	}
</script>
<div id="page_main_content">
  <div style="display:none" id="infomessage"><div style="margin-bottom: 10px;">Are you sure to delete?</div><a href="" id="del_yes"><div class="yes">Yes</div></a><div class="no" onclick="no_del();">No</div></div>
    
	<script src="<?php echo base_url(); ?>scripts/clientlisting.js" type="text/javascript"></script>
    <!-- promoteArea -->

	<?php $this->load->view('members/components/submenu'); ?>
    <div id="downline">
	<div class="promoteArea1">
	<table id="rounded-corner" class="list" align="center">
		<thead>
				<th scope="col" colspan="7" style='background:url(<?php echo base_url();?>images/btnBg.png) repeat-x left top;text-align:center;color:#fff;font-weight: bold;font-size: 19px;text-transform: uppercase;'>Downline Client</th>
			<tr>
			</tr>
			<tr>
				<th>#</th>
				<th>Client Fname</th>
				<th>Lname</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Sign_up Date</th>
			</tr>
				
		</thead>
	<tbody>
	<?php 
        $display=($query->num_rows>0)?TRUE:FALSE;
$i=1;
foreach($query->result() as $client ){

?> <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $client->first_name; ?></td>
          <td><?php echo $client->last_name; ?></td>
          <td><?php echo $client->user_email; ?></td>
          <td><?php echo $client->phone_number; ?></td>
          <td><?php 
					$sdate=explode(' ',$client->signup_date); 
					echo $sdate['0'];
				?>
		  </td>
         
	</tr>
<?php  ++$i; } ?> 
	  </tbody>
	</table>
 </div>
<!-- /promoteArea -->
<?php if($display): ?>
<a class="myButton" href="<?php echo base_url(); ?>members/promotesite/download_downline" target="_blank" style="position: static;" >Download</a>
<?php endif; ?>
</div>
</div>
                        </div>
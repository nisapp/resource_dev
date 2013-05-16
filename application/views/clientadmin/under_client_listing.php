<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Video has been added Successfully"?> </div>
<?php } ?>
<script>
	function delpro(id){
		var baseurl = $("#baseurl").val();
		$("#infomessage").css('display','block');
		// $("#del_yes").prop("href", baseurl+"admin/videos/deletevideo/"+id)
		$("#del_yes").prop("href", "#")
	}
	function no_del(){
		$("#infomessage").css('display','none');
	}
</script>

  <div style="display:none" id="infomessage"><div style="margin-bottom: 10px;">Are you sure to delete?</div><a href="" id="del_yes"><div class="yes">Yes</div></a><div class="no" onclick="no_del();">No</div></div>
    
	<script src="<?php echo base_url(); ?>scripts/clienlisting.js" type="text/javascript"></script>
    <div class="content">
        
        <div class="header">
            <h1 class="page-title">Under Client</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>clientadmin/clientdashboard">Home</a> <span class="divider">/</span></li>
            <li class="active">Under Clients</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <!--<a href="<?php echo base_url();?>admin/videos/addvideo" ><button class="btn btn-primary" id="btn_addnewproduct"><i class="icon-plus"></i>Edit Login Video</button></a>-->
  <div class="btn-group">
  </div>
</div>
<div class="well">

    <table class="table" id="mt">
      <thead>
        <tr>
          <th>#</th>
          <th>Client Fname</th>
          <th>Lname</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Sign_up Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

<?php 
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
          <td>
			<!--<a href="<?php echo base_url();?>admin/videos/updatevideo/<?php echo $client->id; ?>" ><i class="icon-pencil"></i></a>-->
              <i onclick="delpro(this.id);" id="<?php echo $client->id; ?>" class="icon-remove" style="cursor:pointer"></i>
          </td>
        </tr>
<?php  ++$i; } ?>  
      </tbody>
    </table>
</div>
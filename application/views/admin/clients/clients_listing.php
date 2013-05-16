<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Video has been added Successfully"?> </div>
<?php }else if (isset($status) && $status=="failure"){ ?>
			<div class="infomessage"><?php echo "Some thing went wrong please try again. . . "?> </div>
<?php }else if (isset($status) && $status=="deletesuccess"){ ?>
			<div class="infomessage"><?php echo "Client deleted successfully"?> </div>
<?php }else if (isset($status) && $status=="deletefailure"){ ?>
			<div class="infomessage"><?php echo "Opps !! Error occur while deleting client !!"?> </div>
<?php } ?>
	
  <div style="display:none" id="infomessage"><div style="margin-bottom: 10px;">Are you sure to delete?</div><a href="" id="del_yes"><div class="yes">Yes</div></a><div class="no" onclick="no_del();">No</div></div>
    
	<script src="<?php echo base_url(); ?>scripts/clientlisting.js" type="text/javascript"></script>
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Manage Clients</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active">Clients</li>
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
          <th>Permissions</th>
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
          <td>
			<a href="#<?php //echo base_url().'/admin/videos/change_login_video/'.$client->id; ?>" >Assign Permissions</a>
		  </td>
          <td>
			<!--<a href="<?php echo base_url();?>admin/videos/updatevideo/<?php echo $client->id; ?>" ><i class="icon-pencil"></i></a>-->
              <i onclick="delpro(this.id);" id="<?php echo $client->id; ?>" class="icon-remove" style="cursor:pointer"></i>
              <a href="<?php echo base_url();?>admin/clients/delete_client/<?php echo $client->id; ?>" ></a>
          </td>
        </tr>
<?php  ++$i; } ?>  
      </tbody>
    </table>
	<input type="hidden" name="numrs" id="numrs" value="<?php //echo $totalrecords ;?>">
	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
</div>
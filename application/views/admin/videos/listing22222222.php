
<?php if (isset($status) && $status=="success"){?>
  <div class="infomessage"><?php echo "Video has been added Successfully"?> </div>
  <?php }
else if (isset($status) && $status=="failure"){ ?>
  <div class="infomessage"><?php echo "Some thing went wrong please try again. . . "?> </div>
  <?php }
	else if (isset($status) && $status=="deletesuccess"){?>
  <div class="infomessage"><?php echo "Video has been Deleted Successfully"?> </div>
  <?php }
  else if (isset($status) && $status=="deletefailure"){ ?>
  <div class="infomessage"><?php echo "Sorry !! unable to Delete!!"?> </div>
  <?php }  else if (isset($status) && $status=="updatesuccess"){?>
  <div class="infomessage"><?php echo "Video has been Updated Successfully"?> </div>
  <?php }
		else if (isset($status) && $status=="updatefailure"){ ?>
  <div class="infomessage"><?php echo "Unable to Update Video."?> </div>
  <?php } ?>
  <div style="display:none" id="infomessage"><div style="margin-bottom: 10px;">Are you sure to delete?</div><a href="" id="del_yes"><div class="yes">Yes</div></a><div class="no" onclick="no_del();">No</div></div>
    
	<script src="<?php echo base_url(); ?>scripts/videoslisting.js" type="text/javascript"></script>
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Videos</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Videos</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href="<?php echo base_url();?>admin/videos/addvideo" ><button class="btn btn-primary" id="btn_addnewproduct"><i class="icon-plus"></i>Add New Video</button></a>
  <div class="btn-group">
  </div>
</div>
<div class="well">

    <table class="table" id="mt">
      <thead>
        <tr>
          <th>#</th>
          <th>Video Name</th>
          <th>Description</th>
          <th>Camera Operator</th>
          <th>version</th>
          <th>Is Promo</th>
          <th style="width: 26px;">Action</th>
        </tr>
      </thead>
      <tbody>

<?php 
$i=1;
 foreach($query->result() as $singlevideo ){

?> <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $singlevideo->video_name; ?></td>
          <td><?php echo $singlevideo->description; ?></td>
          <td><?php echo $singlevideo->camera_operator; ?></td>
          <td><?php echo $singlevideo->version; ?></td>
          <td><?php if($singlevideo->is_promo=='1') echo 'yes'; else echo 'no'; ?></td>
          <td>
              <a href="<?php echo base_url();?>admin/videos/updatevideo/<?php echo $singlevideo->id; ?>" ><i class="icon-pencil"></i></a>
<script type="text/javascript">

</script>
			  
              <i onclick="delpro(this.id);" id="<?php echo $singlevideo->id; ?>" class="icon-remove" style="cursor:pointer"></i>
			  
          </td>
        </tr>
<?php  ++$i; } ?>  
      </tbody>
    </table>
	<input type="hidden" name="numrs" id="numrs" value="<?php //echo $totalrecords ;?>">
	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
</div>
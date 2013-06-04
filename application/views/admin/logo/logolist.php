
<?php if (isset($status) && $status=="success"){?>
  <div class="infomessage"><?php echo "Logo has been added Successfully"?> </div>
  <?php }
else if (isset($status) && $status=="failure"){ ?>
  <div class="infomessage"><?php echo "Some thing went wrong please try again. . . "?> </div>
  <?php } ?>
	
  <div style="display:none" id="infomessage"><div style="margin-bottom: 10px;">Are you sure to delete?</div><a href="" id="del_yes"><div class="yes">Yes</div></a><div class="no" onclick="no_del();">No</div></div>
    
	<script src="<?php echo base_url(); ?>scripts/videoslisting.js" type="text/javascript"></script>
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Manage Login Videos</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Videos</li>
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
          <th>Logo Name</th>
          <th>Description</th>
          <th>Added Date</th>
          <th>Preview</th>
          <th style="width: 26px;">Action</th>
        </tr>
      </thead>
      <tbody>

<?php 
$i=1;
 foreach($query->result() as $singlevideo ){

?> <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $singlevideo->file_name; ?></td>
          <td><?php echo $singlevideo->description; ?></td>
          <td><?php echo $singlevideo->added_date; ?></td>
          <td><?php //echo base_url().'/uploads/logo/'.$singlevideo->file_name_in_folder; ?>
		  <img src="<?php echo base_url().'/uploads/logo/'.$singlevideo->file_name_in_folder; ?>" height="70px" width="100px" /></td>
          <td>
              <a class="edit_video" href="<?php echo base_url();?>admin/logos/change_logo/<?php echo $singlevideo->Id; ?>" >Change</a>
			  
          </td>
        </tr>
<?php  ++$i; } ?>  
      </tbody>
    </table>
	<input type="hidden" name="numrs" id="numrs" value="<?php //echo $totalrecords ;?>">
	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
</div>
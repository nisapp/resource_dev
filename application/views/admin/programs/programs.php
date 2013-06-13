<?php if (isset($status) && $status=="updatesuccess"){?>
			<div class="infomessage"><?php echo "Program updated Successfully"?> </div>
<?php }else if (isset($status) && $status=="failure"){ ?>
			<div class="infomessage"><?php echo "Some thing went wrong please try again. . . "?> </div>
<?php }else if (isset($status) && $status=="deletesuccess"){ ?>
			<div class="infomessage"><?php echo "Program deleted successfully"?> </div>
<?php }else if (isset($status) && $status=="deletefailure"){ ?>
			<div class="infomessage"><?php echo "Opps !! Error occur while deleting Program !!"?> </div>
<?php } ?>
	
<div style="display:none" id="infomessage">
	<div style="margin-bottom: 10px;">Are you sure to delete?</div>
	<a href="" id="del_yes">
		<div class="yes">
			Yes
		</div>
	</a>
	<div class="no" onclick="no_delele();">
		No
	</div>
</div>
    
<script src="<?php echo base_url(); ?>scripts/general.js" type="text/javascript"></script>
    <div class="content">
        <div class="header">
            <h1 class="page-title">Programs</h1>
        </div>
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active">Programs</li>
        </ul>

<div class="container-fluid">
	<div class="row-fluid">
 

		 <form  method="post" name="frmProgramList" id="frmProgramList"  action="<?php echo base_url();?>admin/programs/bulkdelete/">
		 
		<div class="btn-toolbar">
			<a class="btn btn-primary"  href="<?php echo base_url();?>admin/programs/add" >
				<i class="icon-plus"></i>Add
			</a>
		  <div class="btn-group">
			<input type="submit" name="btnDelete" class="btn" title="Delete Selected Record " onclick="return validateCheckedItems('chkCategory[]','Please select at least one record to delete','Are you sure you want to delete selected records','frmProgramList');" value="Delete">
		  </div>
		</div>

<div class="well">
<style type="text/css">
.logo_list{
	border: 2px solid pink;
    border-radius: 10px 10px 10px 10px;
    height: 50px;
    width: 60px;
}

</style>
	
    <table class="table" id="mt">
      <thead>
        <tr>
          <th><input onclick="AllCheck('frmProgramList');" type="checkbox" name="chkAll" id="chkAll"></th>
          <th>#</th>
          <th>Program Title</th>
          <th>Video Title</th>
          <th>Logo</th>
          <th>Signup Link</th>
          <th>Nav Title</th>
          <th>Nav Position</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

<?php 
$i=0;
foreach($query->result() as $program ){
//video_name_in_folder, signup_link, affiliate_id, logo, leftnav_title, nav_position
?> <tr>
          <td><input type="checkbox" name="chkCategory[]" id="chkCategory" value="<?php echo $program->id; ?>" ></td>
          <td><?php echo $i+=1; ?></td>
          <td><?php echo $program->program_title; ?></td>
          <td><?php echo $program->video_title; ?></td>
          <td><img src="<?php echo base_url().'uploads/logo/'.$program->logo ?>" class="logo_list" ></td>
          <td><?php echo $program->signup_link; ?></td>
          <td><?php echo $program->leftnav_title; ?></td>
          <td><?php echo $program->nav_position; ?></td>
          <td>
              <i onclick="delete_record(this.id);" id="<?php echo $program->id; ?>" class="icon-remove" style="cursor:pointer"></i>
			  <a href="<?php echo base_url();?>admin/programs/edit/<?php echo $program->id; ?>" >Edit</a> 
			  <a href="<?php echo base_url();?>admin/programs/preview/<?php echo $program->id; ?>" >Preview</a>
          </td>
        </tr>
<?php } ?>  
      </tbody>
    </table>
	<input type="hidden" name="current_action" id="current_action" value="admin/programs/delete_program/">
	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url();?>">
</div>
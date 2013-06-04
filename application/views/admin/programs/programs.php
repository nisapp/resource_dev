<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Video has been added Successfully"?> </div>
<?php }else if (isset($status) && $status=="failure"){ ?>
			<div class="infomessage"><?php echo "Some thing went wrong please try again. . . "?> </div>
<?php }else if (isset($status) && $status=="deletesuccess"){ ?>
			<div class="infomessage"><?php echo "Marketing deleted successfully"?> </div>
<?php }else if (isset($status) && $status=="deletefailure"){ ?>
			<div class="infomessage"><?php echo "Opps !! Error occur while deleting marketing !!"?> </div>
<?php } ?>
	
<div style="display:none" id="infomessage">
	<div style="margin-bottom: 10px;">Are you sure to delete?</div>
	<a href="" id="del_yes">
		<div class="yes">
			Yes
		</div>
	</a>
	<div class="no" onclick="no_del();">
		No
	</div>
</div>
    
<script src="<?php echo base_url(); ?>scripts/marketing.js" type="text/javascript"></script>
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
 


<a class="btn" href="<?php echo base_url(); ?>admin/programs/add">Add</a>
 
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
          <th>Video</th>
          <th>Logo</th>
          <th>Link</th>
          <th>Title</th>
          <th>Affiliate id</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

<?php 
//echo '<pre>';
		//var_dump($query->result());exit;
$i=0;
foreach($query->result() as $program ){

?> <tr>
          <td><?php echo $i+=1; ?></td>
          <td><?php echo $program->video; ?></td>
          <td><?php echo $program->logo; ?></td>
          <td><?php echo $program->link; ?></td>
          <td><?php echo $program->title;?></td>
          <td><?php echo $program->affiliate_id; ?></td>
          <td>
			<!--<a href="<?php echo base_url();?>admin/videos/updatevideo/<?php echo $program->id; ?>" ><i class="icon-pencil"></i></a>-->
              <i onclick="delpro(this.id);" id="<?php echo $program->id; ?>" class="icon-remove" style="cursor:pointer"></i>
              <a href="<?php echo base_url();?>admin/programs/delete_program/<?php echo $program->id; ?>" ></a>
			  <a href="<?php echo base_url();?>admin/programs/edit/<?php echo $program->id; ?>" >Edit</a> 
                          <a href="<?php echo base_url();?>admin/programs/preview/<?php echo $program->id; ?>" >Preview</a>
          </td>
        </tr>
<?php } ?>  
      </tbody>
    </table>
	<input type="hidden" name="numrs" id="numrs" value="<?php //echo $totalrecords ;?>">
	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
        <input type="hidden" name="current_action" id="current_action" value="admin/programs/delete_program/">
</div>
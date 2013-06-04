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
            
            <h1 class="page-title">Client's Program List</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active"><a href="<?php echo base_url(); ?>admin/clients">Clients</a> <span class="divider">/</span> 
                <?php echo $user; ?>'s Programs List</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
 
<div class="btn-toolbar">
    <!--<a href="<?php echo base_url();?>admin/videos/addvideo" ><button class="btn btn-primary" id="btn_addnewproduct"><i class="icon-plus"></i>Edit Login Video</button></a>-->
  <div class="btn-group">
  </div>
</div>

<div class="well">
<?php if ($query->num_rows!=0): ?>
    <table class="table" id="mt">
      <thead>
        <tr>
          <th>#</th>
          <th>Program Title</th>
          <th>Affiliate ID</th>
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
          <td><?php echo $program->title; ?></td>
          <td><?php echo $program->affilateid; ?></td>
          <td>
			<!--<a href="<?php //echo base_url();?>admin/videos/updatevideo/<?php //echo $marketing->id; ?>" ><i class="icon-pencil"></i></a>-->
              <!-- <i onclick="delpro(this.id);" id="<?php// echo $marketing->id; ?>" class="icon-remove" style="cursor:pointer"></i>
              <a href="<?php //echo base_url();?>admin/marketing/delete_marketing/<?php //echo $marketing->id; ?>" ></a>
			  <a href="<?php //echo base_url();?>admin/marketing/edit/<?php// echo $marketing->id; ?>" >Edit</a> -->
                          <a href="<?php echo base_url();?>admin/marketing/preview/<?php echo $program->programid; ?>" >Preview</a>
          </td>
        </tr>
<?php } ?>  
      </tbody>
    </table>
        <?php else:?>
        <h3>This user don't have stored programs.</h3>
        <?php endif; ?>
</div>

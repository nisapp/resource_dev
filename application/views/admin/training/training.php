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
            
            <h1 class="page-title">Training</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active">Training</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
 


<a class="btn" href="<?php echo base_url(); ?>admin/training/add">Add</a>
 
<div class="btn-toolbar">
    <!--<a href="<?php //echo base_url();?>admin/videos/addvideo" >
    <button class="btn btn-primary" id="btn_addnewproduct">
    <i class="icon-plus"></i>Edit Login Video</button></a>-->
  <div class="btn-group">
  </div>
</div>

<div class="well">

    <table class="table" id="mt">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Link</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

<?php 
//echo '<pre>';
		//var_dump($query->result());exit;
$i=0;
foreach($query->result() as $training ):

?> <tr>
          <td><?php echo $i+=1; ?></td>
          <td><?php echo $training->title;?></td>
          <td><?php echo $training->link; ?></td>
          <td>
			<!--<a href="<?php //echo base_url();?>admin/videos/updatevideo/<?php //echo $marketing->id; ?>" >
   <i class="icon-pencil"></i></a>-->
              <i onclick="delpro(this.id);" id="<?php //echo $marketing->id; ?>" class="icon-remove" style="cursor:pointer"></i>
              <a href="<?php echo base_url();?>admin/training/delete_training/<?php echo $training->id; ?>" ></a>
		<a href="<?php echo base_url();?>admin/training/edit/<?php echo $training->id; ?>" >Edit</a> 
                <a href="<?php echo base_url();?>admin/training/preview/<?php //echo $training->id; ?>" >Preview</a>
          </td>
        </tr>
<?php endforeach; ?>  
      </tbody>
    </table>
</div>

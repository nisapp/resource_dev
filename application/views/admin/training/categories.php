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
    
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Training</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li><a href="<?php echo base_url(); ?>admin/training">Training</a> <span class="divider">/</span></li>
            <li class="active">Categories</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
 


<a class="btn" href="<?php echo base_url(); ?>admin/training/addcategory">Add Category</a>
 
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
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

<?php 
//echo '<pre>';
		//var_dump($query->result());exit;
$i=0;
foreach($query->result() as $category ):

?> <tr>
          <td><?php echo $i+=1; ?></td>
          <td><?php echo $category->category_name; ?></td>
          <td>
			<!--<a href="<?php //echo base_url();?>admin/videos/updatevideo/<?php //echo $marketing->id; ?>" >
   <i class="icon-pencil"></i></a>-->
              <i onclick="delpro(this.id);" id="<?php echo $category->id; ?>" class="icon-remove" style="cursor:pointer"></i>
              <a href="<?php echo base_url();?>admin/training/delete_category/<?php echo $category->id; ?>" ></a>
		<a href="<?php echo base_url();?>admin/training/editcategory/<?php echo $category->id; ?>" >Edit</a> 
                <input type="hidden" name="current_action" id="current_action" value="admin/training/delete_category/">
                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
          </td>
        </tr>
<?php endforeach; ?>  
      </tbody>
    </table>
</div>

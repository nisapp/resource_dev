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
 



<div class="btn-toolbar">
    <!--<a href="<?php //echo base_url();?>admin/videos/addvideo" >
    <button class="btn btn-primary" id="btn_addnewproduct">
    <i class="icon-plus"></i>Edit Login Video</button></a>-->
  <div class="btn-group">
  </div>
</div>

<div class="well">
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mt').dataTable( {
                "sPaginationType": "full_numbers"
            } );
        } );
    </script>
    <table class="table" id="mt">
      <thead>
        <tr>
          <th id="header_first_element">#</th>
          <th>Title</th>
          <th>Link</th>
          <th>Category</th>
          <th>Type</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

<?php 
//echo '<pre>';
		//var_dump($query->result());exit;
$i=0;
foreach($query->result() as $training ):
    //var_dump($training);
?> <tr>
    <input type="hidden" value="<?php echo $training->id; ?>">
          <td class='first_element'><?php echo $i+=1; ?></td>
          <td><?php echo $training->title;?></td>
          <td><?php echo $training->link; ?></td>
          <td><?php echo $training->category; ?></td>
          <td><?php echo $training->t_type; ?></td>
          <td><?php echo $training->t_status; ?></td>
          <td>
			<!--<a href="<?php //echo base_url();?>admin/videos/updatevideo/<?php //echo $marketing->id; ?>" >
   <i class="icon-pencil"></i></a>-->
              <i onclick="delpro(this.id);" id="<?php echo $training->id; ?>" class="icon-remove" style="cursor:pointer"></i>
              <a href="<?php echo base_url();?>admin/training/delete_training/<?php echo $training->id; ?>" ></a>
		<a href="<?php echo base_url();?>admin/training/edit/<?php echo $training->id; ?>" >Edit</a> 
                <a href="<?php echo base_url();?>admin/training/preview/<?php //echo $training->id; ?>" >Preview</a>
                <input type="hidden" name="current_action" id="current_action" value="admin/training/delete_training/">
                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
          </td>
        </tr>
<?php endforeach; ?>  
      </tbody>
    </table>
</div>
<a class="btn" href="<?php echo base_url(); ?>admin/training/add">Add</a>
<div class="btn" id='delete_selection' >Delete Selection</div>
<a class="btn" href="<?php echo base_url(); ?>admin/training/download" target="_blank">Download</a>
 <?php $attrib=array('id'=>'seldcted_rows_form');
 echo form_open("admin/training/delete_group",$attrib);?>
 <input type="hidden" id="selected_rows" name="selected_rows" value="">
 <?php echo form_close(); ?>


<?php if (isset($status) && $status=="updatesuccess"){?>
			<div class="infomessage"><?php echo "Menu has been updated successfully"?> </div>
<?php }else if (isset($status) && $status=="updatefailure"){?>
			<div class="errormessage"><?php echo "Opps ! Some error occur !!"?> </div>
<?php } ?>
<!--<div style="display:none" id="infomessage">
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
<script src="<?php echo base_url(); ?>scripts/11111marketing.js" type="text/javascript"></script>
-->
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Menu</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active">Menu</li>
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

    <table class="table" id="mt">
      <thead>
        <tr>
          <th>#</th>
          <th>Menu Title</th>
          <th>Link</th>
          <th>Position</th>
          <th>Type</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">

<?php 
$i=0;
foreach($query->result() as $menu ){
?> 		
	<tr>
		  <td><?php echo $i+=1; ?></td>
		  <td><?php echo $menu->menu_title;?></td>
		  <td><?php echo base_url().$menu->menu_url; ?></td>
		  <td><?php echo $menu->position; ?></td>
		  <td><?php echo $menu->menu_type; ?></td>
		  <td>
				<a href="<?php echo base_url();?>admin/menu/edit/<?php echo $menu->id; ?>" >Change</a> 
		  </td>
	</tr>
<?php } ?>  
      </tbody>
    </table>
</div>

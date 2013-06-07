
<style>
	.hidecat{
		width:270px;
		color: rgb(85, 85, 85);
		display: inline-block;
		font-size: 14px;
		height: 20px;
		line-height: 20px;
		margin-bottom: 9px;
		padding: 4px 6px;
	}
  </style>
    <div class="content">
        <div class="header">
            <h1 class="page-title">
					Edit Menu
			</h1>
        </div>
        
		<ul class="breadcrumb">
			<li><a href="admin/dashboard">Home</a> <span class="divider">/</span></li>
			<li><a href="#">Menu</a> <span class="divider">/</span></li>
			<li class="active">Add Gvo Video</li>
		</ul>

        <div class="container-fluid">
            <div class="row-fluid">
<?php 
	//form_open('admin/videos/change_gvo_video/'.$menudataarray->Id); 
?>
 <form enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/menu/edit/<?php echo $menudataarray->id;?>">
<div class="btn-toolbar">


<input class="btn btn-primary val_dis_enb" type="submit" name="update_menu" value="Update" />
 

<a href="<?php echo base_url();?>admin/menu" class="btn">Cancel</a>
	
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home" style="width:50%;float: left;">
		
        <label>Menu Title: </label>
        <input type="text" required name="txtTitle" class="input-xlarge val_dis_enb" value="<?php echo $menudataarray->menu_title; ?>" /> 
		<label>Menu Position: </label>
        <select name="txtPosition">
			<option value="0">default</option>
			<?php for($i=1;$i<5;$i++){ ?>
				<option value="<?php echo $i; ?>"  <?php if($i==$menudataarray->position){ echo 'selected'; } ?> ><?php echo $i; ?> </option>
			<?php } ?>
		</select>
        <label>Menu Link: </label>
        <input type="text" readonly name="txt_vname" class="input-xlarge val_dis_enb" value="<?php echo base_url().$menudataarray->menu_url; ?>" /> 
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>" />
      </div>
      </form>
  </div>
</div>
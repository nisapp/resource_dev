<?php if (isset($status) && $status=="updatesuccess"){?>
			<div class="infomessage"><?php echo "Login video has been Uploaded Successfully"?> </div>
<?php }else if (isset($status) && $status=="updatefailure"){?>
			<div class="errormessage"><?php echo "Opps ! Some error occur !!"?> </div>
<?php } ?>
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
					Login Video
			</h1>
        </div>
        
		<ul class="breadcrumb">
			<li><a href="admin/dashboard">Home</a> <span class="divider">/</span></li>
			<li><a href="#">Videos</a> <span class="divider">/</span></li>
			<li class="active">Add Login Video</li>
		</ul>

        <div class="container-fluid">
            <div class="row-fluid">
<?php 
	//form_open('admin/videos/change_gvo_video/'.$videodataarray->Id); 
?>
 <form enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/videos/change_login_video/<?php echo $videodataarray->Id;?>">
<div class="btn-toolbar">


<input class="btn btn-primary val_dis_enb" type="submit" name="update_video" value="Update" />
 

<a href="<?php echo base_url();?>admin/videos" class="btn">Cancel</a>
	
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home" style="width:50%;float: left;">
		
		<label>Title: </label>
        <input type="text" name="txtNavigation" required class="input-xlarge val_dis_enb" value="<?php echo $videodataarray->tab_title; ?>" /> 
		
		
        <label>Login Video Name: </label>
        <input type="text" name="txt_vname" class="input-xlarge val_dis_enb" value="<?php echo $videodataarray->file_name; ?>" /> 
        <label>Login Video Description:</label>
        <textarea  rows="3" name="txtarea_vdescription" class="input-xlarge val_dis_enb"><?php echo $videodataarray->description ; ?></textarea>
         
		
		<label>Upload Login video </label>
		<input id="file_upload" name="file_upload" type="file" >

		<input type="hidden" id="baseurl" value="<?php echo base_url();?>" />
		<input type="hidden" id="hidd_video" name="hidd_video" value="<?php echo $videodataarray->file_name_in_folder; ?>" />
      </div>
	  
		<!--<div class="video_preveiw" style="width:50%;float: left;" >
				<script type="text/javascript" src="<?php echo base_url(); ?>jwplayer/jwplayer.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>scripts/previewplayer.js"></script>
				<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
				<div id="videopreview">Loading the player...</div>
		</div>-->
	  
      </form>
  </div>
</div>
<div class="infomessage" style="display:none;" ><?php echo "Logo has been Uploaded Successfully"?> </div>
  <div class="errormessage" style="display:none;" ><?php echo "Please choose correct Video Format" ?> </div>
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
			<?php if(isset($todo) && $todo=="updation")
					{
						echo 'Update Logo '.$logodataarray->file_name;
					}else{
						echo 'Add New Logo';
					} 
			?>
			</h1>
        </div>
        
		<ul class="breadcrumb">
			<li><a href="admin/dashboard">Home</a> <span class="divider">/</span></li>
			<li><a href="#">Logos</a> <span class="divider">/</span></li>
			<li class="active">Add Logo</li>
		</ul>

        <div class="container-fluid">
            <div class="row-fluid">
<?php 
if(isset($todo) && $todo=="updation")
{
	
 echo form_open('admin/logos/change_logo/'.$logodataarray->Id); 
 }
 else{
 echo form_open('admin/logos/savelogo'); 
 }
 ?>
<div class="btn-toolbar">
<?php 
if(isset($todo) && $todo=="updation")
{
?>
<input class="btn btn-primary val_dis_enb" type="submit" name="update_logo" value="Update" />
 <?php }else //showing the default page
{
?>
<input class="btn btn-primary val_dis_enb" type="submit" name="save_logo" value="Save" />
<?php 
}
?> 
	<a href="<?php echo base_url();?>admin/videos"  class="btn">Cancel</a>
	
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home" style="width:50%;float: left;">
		
        <label>Logo Name: </label>
        <input type="text" name="txt_vname" class="input-xlarge val_dis_enb" value="<?php if(isset($todo) && $todo=="updation")
{ echo $logodataarray->file_name;}?>" /> 
        <label>Logo Description:</label>
        <textarea  rows="3" name="txtarea_vdescription" class="input-xlarge val_dis_enb"><?php if(isset($todo) && $todo=="updation")
{ echo $logodataarray->description ;}?></textarea>
         
		
		<script src="<?php echo base_url(); ?>uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>scripts/logo.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>uploadify/uploadify.css">
        <form enctype="multipart/form-data"  >
			<label>Upload the Logo </label>
			<div id="queue"></div>
			<div id="progress" ></div>
			<input id="file_upload" name="file_upload" type="file" multiple="true">
		</form>
		<input type="hidden" id="timestamp" value="<?php echo $timestamp = time();?>" />
		<input type="hidden" id="token" value="<?php echo md5('unique_salt' . $timestamp);?>" />
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>" />
		<input type="hidden" id="hidd_video" name="hidd_video" value="<?php if(isset($todo) && $todo=="updation")
{ echo $logodataarray->file_name_in_folder; }?>" />
		
	
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
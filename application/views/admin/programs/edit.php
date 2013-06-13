<?php 
  $prog= $program->first_row();
?>
<style>
    #upload , #youtube{
        cursor: pointer;
        text-decoration: underline;
    }
    .selected_src{
        text-decoration: none !important;
        cursor: default !important;
    }
    #youtube_link{
        display: none;
    }
</style>
   <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Edit Program</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active"><a href="<?php echo base_url(); ?>admin/programs">Programs</a> <span class="divider">/</span> Edit Programs</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
<form enctype="multipart/form-data" method="post" name="frmProgram" id="frmProgram"  action="<?php echo base_url();?>admin/programs/edit/<?php echo $prog->id; ?>">

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home" style="width:50%;float: left;">
		
        <label>Left Navigation Title: </label>
        <input type="text" name="txtNavigation" class="input-xlarge val_dis_enb" value="<?php echo $prog->leftnav_title; ?>" /> 
		
		<label>Navigation Position: </label>
        <select name="txtposition">
			<option value="0">default</option>
			<?php for($i=1;$i<6;$i++){ ?>
				<option value="<?php echo $i; ?>" <?php if($i==$prog->nav_position) echo 'selected'; ?> ><?php echo $i; ?> </option>
			<?php } ?>
		</select>
		
        <label>Video Title: </label>
        <input type="text" name="txtVideo_Title" class="input-xlarge val_dis_enb" value="<?php echo $prog->video_title; ?>" /> 
		
		
		<label>Upload video: </label>
		<input id="file_upload_video" name="file_upload_video" type="file" >
		<input id="txtOldVideo" value="<?php echo $prog->video_name_in_folder; ?>" name="txtOldVideo" type="hidden" >
		<a href="<?php echo base_url();?>admin/programs/preview/<?php echo $prog->id; ?>" style="cursor:pointer;background:#414959;padding:4px;color:#FFF;">Preview</a>
      </div>
	<div class="tab-pane active in" id="home" style="width:50%;float: left;">
			<label>Program Title: </label>
			<input type="text" name="txtProgram_Title"  id="txtProgram_Title" class="input-xlarge val_dis_enb" value="<?php echo $prog->program_title; ?>" />

			<label>Signup Link: </label>
			<input  name="txtSignup_Link" id="txtSignup_Link" type="text"  value="<?php echo $prog->signup_link; ?>" class="input-xlarge val_dis_enb">
			
			<label>Upload Program Logo: </label>
			<input id="file_upload_logo" name="file_upload_logo" type="file" >
			<input id="txtOldLogo" value="<?php echo $prog->logo; ?>" name="txtOldLogo" type="hidden" >
	
		</div>
		
		
  </div>
	<div class="btn-toolbar">
		<input onclick="return validate();"  class="btn btn-primary val_dis_enb" type="submit" name="submit_save" value="Update" />
		<a href="<?php echo base_url();?>admin/programs" class="btn">Cancel</a>
		<div class="btn-group">
		</div>
	</div>
	
  </form>
</div>
<script>
function validate(){
	// alert("video validation here");
	var errors=0;
	var message='';
	if(document.frmProgram.file_upload_logo.value != "")
	{
		strFileName=document.frmProgram.file_upload_logo.value;
		position=strFileName.lastIndexOf(".")+ 1;
		extension=strFileName.substring(position,strFileName.length);
		extension=extension.toLowerCase();
		
		if(extension.toLowerCase() != "gif" && extension.toLowerCase() != "jpg" && extension.toLowerCase() != "png")
		{
			errors++;
			message+= "["+errors+"] Select Only JPG Or GIF Or PNG Images ! \n";
			if (errors == 1)
			document.frmProgram.file_upload_logo.focus();
		}
	}
	if(document.frmProgram.file_upload_video.value != "")
	{
		strFileName=document.frmProgram.file_upload_video.value;
		position=strFileName.lastIndexOf(".")+ 1;
		extension=strFileName.substring(position,strFileName.length);
		extension=extension.toLowerCase();
		
		if(extension.toLowerCase() != "mp4" && extension.toLowerCase() != "flv" && extension.toLowerCase() != "avi")
		{
			errors++;
			message+= "["+errors+"] Select Only MP4 Or FLV Or AVI Video File ! \n";
			if (errors == 1)
			document.frmProgram.file_upload_video.focus();
		}
	}
	if (errors > 0)
	{
		alert("Data Not Valid: \n\n" + message);
		return false;
	}
	return true;
}
</script>
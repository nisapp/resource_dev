<?php if (isset($status) && $status=="updatesuccess"){?>
			<div class="infomessage"><?php echo "GVO video has been Uploaded Successfully"?> </div>
<?php }else if (isset($status) && $status=="updatefailure"){?>
			<div class="errormessage"><?php echo "Opps ! Some error occur !!"?> </div>
<?php } ?>
<script>
$(document).ready(function(){
    $('#upload').click(function(){
        if($("#source").val()==='upload'){
            return false;
        }
        else{
            $("#source").val('upload');
            $("#youtube").removeClass('selected_src');
            $(this).addClass('selected_src');
            $("#youtube_link").hide();
            $("#video_upload").show();
        }
    });
    $("#youtube").click(function(){
        if($("#source").val()==='youtube'){
            return false;
        }
        else{
            $("#source").val('youtube');
            $("#upload").removeClass('selected_src');
            $(this).addClass('selected_src');
            $("#video_upload").hide();
            $("#youtube_link").show();
        }
    });
});
</script>
    <div class="content">
        <div class="header">
            <h1 class="page-title">
					Add Programs
			</h1>
        </div>
        
		<ul class="breadcrumb">
			<li><a href="admin/dashboard">Home</a> <span class="divider">/</span></li>
			<li><a href="#">Programs</a> <span class="divider">/</span></li>
			<li class="active">Add programs</li>
		</ul>

        <div class="container-fluid">
            <div class="row-fluid">
<form enctype="multipart/form-data" method="post" name="frmProgram" id="frmProgram"  action="<?php echo base_url();?>admin/programs/add/">

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
    </ul>
    <?php if(isset($message)): ?>
    <p style="color: red;"><?php echo $message; ?></p>
    <?php    endif; ?>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home" style="width:50%;float: left;">
		
        <label>Left Navigation Title: </label>
        <input type="text" required name="txtNavigation" class="input-xlarge val_dis_enb" value="" /> 
		
		<label>Navigation Position: </label>
        <select name="txtposition">
			<option value="0">default</option>
			<?php for($i=1;$i<6;$i++){ ?>
				<option value="<?php echo $i; ?>" ><?php echo $i; ?> </option>
			<?php } ?>
		</select>
		
        <label>Video Title: </label>
        <input type="text" name="txtVideo_Title" class="input-xlarge val_dis_enb" value="" /> 
		
	<div id="video_source">
        <a id="youtube" style="cursor:pointer;" class="selected_src">Youtube Link</a> |  <a id="upload" style="cursor:pointer;" >Upload</a> 
        <input id="source" value="youtube" name="source" type="hidden"/>
    </div>
	
	<div id="video_upload" class="field" style="display:none;">
		<label for="video">Video</label> 
		<input id="file_upload_video" name="file_upload_video" size="50" type="file" class="medium" />
	</div>

	<div id="youtube_link" class="field">
		<label for="video">Video</label> 
		<input id="video_youtube" placeholder="Youtube video link"; name="video_youtube" size="50" type="text" class="medium" />
	</div>
	
		<!--<label>Video: </label>
		<input id="file_upload_video" required name="file_upload_video" type="file" >-->
	</div>
	<div class="tab-pane active in" id="home" style="width:50%;float: left;">
			<label>Program Title: </label>
			<input type="text" required name="txtProgram_Title"  id="txtProgram_Title" class="input-xlarge val_dis_enb" value="" />

			<label>General Link: </label>
			<input  name="txtSignup_Link" id="txtSignup_Link" type="text"  class="input-xlarge val_dis_enb">
			<label>Default affiliate ID: </label>
			<input  name="affiliate_id" id="affiliate_id" type="text"  class="input-xlarge val_dis_enb">
			
			<label>Upload Program Logo: </label>
			<input id="video_upload" name="file_upload_logo" type="file" >
	
		</div>
		
		
		<!--<div class="video_preveiw" style="width:50%;float: left;" >
				<script type="text/javascript" src="<?php echo base_url(); ?>jwplayer/jwplayer.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>scripts/previewplayer.js"></script>
				<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
				<div id="videopreview">Loading the player...</div>
		</div>-->
	  
  </div>
	<div class="btn-toolbar">
		<input onclick="return validate();"  class="btn btn-primary val_dis_enb" type="submit" name="submit_program" value="Add" />
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
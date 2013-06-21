<?php if (isset($status) && $status=="updatesuccess"){?>
			<div class="infomessage"><?php echo "Next video saved successfully"?> </div>
<?php }else if (isset($status) && $status=="updatefailure"){?>
			<div class="errormessage"><?php echo "Opps ! Some error occur !!"?> </div>
<?php } 


?>
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
	span.next_menu{
		background: none repeat scroll 0 0 #3A87AD;
		color: #FFFFFF;
		font-size: 20px;
		font-weight: bold;
		padding: 6px;
	}
	
  </style>
    <div class="content">
        <div class="header">
            <h1 class="page-title">
					Next step video for tab <span class="next_menu">" <?php echo $videodataarray->menu_title; ?> "<span>
			</h1>
        </div>
        
		<ul class="breadcrumb">
			<li><a href="admin/dashboard">Home</a> <span class="divider">/</span></li>
			<li><a href="#">Videos</a> <span class="divider">/</span></li>
			<li class="active">Add Next Video</li>
		</ul>

        <div class="container-fluid">
            <div class="row-fluid">
<?php 
	//form_open('admin/videos/change_gvo_video/'.$videodataarray->Id); 
?>
 <form enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/videos/change_next_video/<?php echo $videodataarray->Id;?>">

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home" style="width:50%;float: left;">
		
		
		<label>Navigation Tab Title: </label>
        <input type="text" name="txtNavigation" class="input-xlarge val_dis_enb" value="<?php echo $videodataarray->tab_title; ?>" /> 
		
		<label>Navigation Position: </label>
        <select name="txtposition">
			<option value="0">default</option>
			<?php for($i=1;$i<5;$i++){ ?>
				<option value="<?php echo $i; ?>"  <?php if($i==$videodataarray->position){ echo 'selected'; } ?> ><?php echo $i; ?> </option>
			<?php } ?>
		</select>
		
        <label>Video Title: </label>
        <input type="text" name="txt_vname" class="input-xlarge val_dis_enb" value="<?php echo $videodataarray->file_name; ?>" /> 
        <label>Video Description:</label>
        <textarea  rows="3" name="txtarea_vdescription" class="input-xlarge val_dis_enb"><?php echo $videodataarray->description ; ?></textarea>
         
	<div id="video_source">
        <a id="youtube" style="cursor:pointer;" class="selected_src">Youtube Link</a> |  <a id="upload" style="cursor:pointer;" >Upload</a> 
        <input id="source" value="youtube" name="source" type="hidden"/>
    </div>
	
	<div id="video_upload" class="field" style="display:none;">
		<label for="video">Next step video</label> 
		<input id="file_upload" name="file_upload" size="50" type="file" class="medium" />
	</div>

	<div id="youtube_link" class="field">
		<label for="video">Next step video</label> 
		<input id="video_youtube" placeholder="Youtube video link"; value="<?php if(preg_match("/youtube\.com/", $videodataarray->file_name_in_folder)){ echo $videodataarray->file_name_in_folder; } ?>" name="video_youtube" size="50" type="text" class="medium" />
	</div>
		<!--<label>Upload video: </label>
		<input id="file_upload" name="file_upload" type="file" >-->

		<input type="hidden" id="baseurl" value="<?php echo base_url();?>" />
		<input type="hidden" id="hidd_video" name="hidd_video" value="<?php echo $videodataarray->file_name_in_folder; ?>" />
		
		<div class="btn-toolbar">
			<input class="btn btn-primary val_dis_enb" type="submit" name="update_video" value="Update" />
			<a href="<?php echo base_url();?>admin/videos" class="btn">Cancel</a>
			<div class="btn-group">
			</div>
		</div>

      </div>
	  <style>
	  .right_side {
			background: none repeat scroll 0 0 #ffffff;
			/* border: 10px solid red; */
			float: left;
			margin: 20px 0 2px -59px;
			padding: 2px 5px 24px 32px;
			width: 45%;
	  }

	fieldset { margin: 0 0 22px 0; border: 1px solid #095D92; padding: 12px 17px; background-color: #DFF3FF; }
	.right_side legend{ font-size: 1.1em; background-color: #095D92; width:36%; color: #FFFFFF; font-weight: bold; padding: 10px 5px 6px 16px;line-height:21px; }

	  #btn_link{
			background: url(<?php echo base_url(); ?>images/btnBg.png) repeat-x left top;
			box-shadow: 0 0 7px #696948;
			color: #78A0B1;
			font-weight: bold;
			margin: auto;
			text-align: center;
			width: 65%;
	  }
	  div#in_data{
		text-align: center;
	  }
	  </style>
		<div class="right_side" style="width:50%;float: left;">
		<fieldset>
			<legend>Next Button Link</legend>
			<div id="in_data">
				<h2 id="btn_link" >Set Next Button Link</h2><br/>
				<b>Enter Url: &nbsp;</b><input type="text" name="txtButton_url" placeholder='Enter link' class="input-xlarge val_dis_enb" value="<?php echo $videodataarray->custom_link; ?>" />
			</div>	
		</fieldset>
		
		<label>Status: </label>
        <select name="txtStatus" required>
			<option value='Y' <?php if($videodataarray->is_show=='Y') echo 'selected'; ?> >Visible</option>
			<option value='N'  <?php if($videodataarray->is_show=='N') echo 'selected'; ?> >Hidden</option>
		</select>
		</div>
	
	
		
      </form>
  </div>
</div>
<?php 

// echo '<pre>';
// print_r($videodataarray);
// echo '</pre>';

?>
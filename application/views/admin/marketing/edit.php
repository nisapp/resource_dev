<?php if (isset($status) && $status=="success"){?>
			<div class="infomessage"><?php echo "Video has been added Successfully"?> </div>
<?php }else if (isset($status) && $status=="failure"){ ?>
			<div class="infomessage"><?php echo "Some thing went wrong please try again. . . "?> </div>
<?php }else if (isset($status) && $status=="deletesuccess"){ ?>
			<div class="infomessage"><?php echo "Marketing deleted successfully"?> </div>
<?php }else if (isset($status) && $status=="deletefailure"){ ?>
			<div class="infomessage"><?php echo "Opps !! Error occur while deleting marketing !!"?> </div>
<?php } ?>
	
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
            
            <h1 class="page-title">Edit Marketing</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active"><a href="<?php echo base_url(); ?>admin/marketing">Marketing</a> <span class="divider">/</span> Edit Marketing</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <!--<a href="<?php echo base_url();?>admin/videos/addvideo" ><button class="btn btn-primary" id="btn_addnewproduct"><i class="icon-plus"></i>Edit Login Video</button></a>-->
  <div class="btn-group">
  </div>
</div>
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
               
<div class="well">
<?php
$marketing = $query->result();

//echo '<pre>';
	//var_dump($marketing[0]);
?>
    <!--<form action="<?php //echo base_url();?>admin/marketing/edit/<?php //echo $id; ?>" method="post">-->
        <?php echo form_open_multipart('admin/marketing/edit/'.$id); ?>
<div class="field">
    <p><?php echo form_error('video'); ?></p>
    <div id="video_source">
        <a id="upload" class="selected_src">Upload</a> | <a id="youtube">Youtube Link</a>
        <input id="source" value="upload" name="source" type="hidden"/>
    </div>
	<div id="video_upload" class="field">
		<label for="video">Video</label> 
		<?php echo $marketing[0]->video; ?><input id="video" value="" name="video" size="50" type="file" class="medium" />
	</div>

	<div id="youtube_link" class="field">
		<label for="video">Video</label> 
		<?php echo $marketing[0]->video; ?><input id="video_youtube" value="" name="video_youtube" size="50" type="text" class="medium" />
	</div>

</div>

<div class="field">
	<label for="logo">Logo</label> 
	<?php echo $marketing[0]->logo; ?><input id="logo" value="" name="logo" size="50" type="file" class="medium" />
</div>

<div class="field">
    <p><?php echo form_error('link'); ?></p>
	<label for="link">Link</label> 
	<input id="link" value="<?php echo $marketing[0]->link; ?>" name="link" size="50" type="text" class="medium" />
</div>
<div class="field">
	<label for="link">Title</label> 
	<input id="title" value="<?php echo $marketing[0]->title; ?>" name="title" size="50" type="text" class="medium" />
</div>
<div class="field">
	<label for="description">Description</label> 
	<textarea id="description" class="ckeditor" cols="80" name="description"><?php echo $marketing[0]->description; ?></textarea>
</div>

<input type="submit" class="btn" value="Edit">

</form>


    
	<input type="hidden" name="numrs" id="numrs" value="<?php //echo $totalrecords ;?>">
	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
</div>
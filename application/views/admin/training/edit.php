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
            
            <h1 class="page-title">Edit Training</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active"><a href="<?php echo base_url(); ?>admin/training">Training</a> <span class="divider">/</span> Edit Training</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
     <!--<a href="<?php echo base_url();?>admin/videos/addvideo" ><button class="btn btn-primary" id="btn_addnewproduct"><i class="icon-plus"></i>Edit Login Video</button></a>-->
  <div class="btn-group">
  </div>
</div>
<div class="well">
<?php
//$marketing = $query->result();

//echo '<pre>';
	//var_dump($marketing[0]);
?>
<?php if(isset($errors)){//Display form errors.
     foreach ($errors as $error){
         echo $error;
     }
}
$training = $trainingdata->first_row();
//Video adding form.
echo validation_errors(); 
 echo form_open("admin/training/edit/$training->id");?>
	<div class="field">
		<label for="title">Title</label> 
		<input id="title" value="<?php echo $training->title; ?>" name="title" size="50" type="text" class="medium" />
	</div>
	<div class="field">
		<label for="link">Link</label> 
		<input id="link" value="<?php echo $training->link; ?>" name="link" size="50" type="text" class="medium" />
	</div>

	<input id="edit_training" name="edit_training" type="submit" class="btn" value="Save"/>
<?php echo form_close();
if(!empty($training->video)):
    if(preg_match("/youtube\.com/", $training->video)):
        $video_str = substr($training->video,-11);
    ?>
        <iframe width="560" height="315" 
                src="http://www.youtube.com/embed/<?php echo $video_str; ?>" 
                frameborder="0" allowfullscreen>
        </iframe>
    <?php
    else: ?>
        <video id="register_page_vieo" class="video-js vjs-default-skin"
               controls preload="auto" width="480" height="360">
            <source src="<?php echo base_url(); ?>uploads/training/video/<?php echo $training->video; ?>" type='video/mp4' />
        </video>
    <?php
    endif;
?>
        <a href="<?php echo base_url(); ?>admin/training/editvideo/<?php echo $training->id; ?>">Change Video File </a>
        <?php else: 
$addvideo = array(
    'id'=>'add_video',
    'name'=>'add_video',
    'class'=>'btn',
    'value'=>'Add Video'
);
echo form_open("admin/training/addvideo/$training->id");
echo form_submit($addvideo);
echo form_close();
        endif;
        if(!empty($training->t_text)):
?>
        <div>
            <!--<textarea id="training_text" name="training_text" rows="10" cols="50" disabled ><?php //echo $training->t_text; ?></textarea>-->
            <div id="training_text_view">
                <h4>Training Text</h4>
                <?php echo $training->t_text; ?>
                <a href="<?php echo base_url(); ?>admin/training/edittext/<?php echo $training->id; ?>">Edit Text </a>
            </div>
            
        </div>
<?php
else:
$addtext = array(
    'id'=>'add_text',
    'name'=>'add_tr_text',
    'class'=>'btn',
    'value'=>'Add Text'
);
echo form_open("admin/training/addtext/$training->id");
echo form_submit($addtext);
echo form_close();
endif;
if($trainingimages->num_rows>0):
    foreach ($trainingimages->result() as $image): ?>
        <img src="<?php echo base_url();?>uploads/training/images/<?php echo $image->training_image; ?>" height="100"/>
    <?php endforeach;
endif; 
$addimages = array(
    'id'=>'add_images',
    'name'=>'add_tr_images',
    'class'=>'btn',
    'value'=>'Add Images'
);
echo form_open("admin/training/addimages/$training->id");
echo form_submit($addimages);
echo form_close();
?>

</div>
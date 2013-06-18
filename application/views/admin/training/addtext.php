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
<?php $training = $trainingdata->first_row(); ?>    
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
            
            <h1 class="page-title">Add Text To Training</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active"><a href="<?php echo base_url(); ?>admin/training">Training</a> <span class="divider">/</span></li>
            <li class="active"><a href="<?php echo base_url(); ?>admin/training/edit/<?php echo $training->id; ?>">Edit Training</a></li>
            <li class="active"> <span class="divider">/</span> Add Text</li>
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
//Video adding form.
echo validation_errors(); 
 echo form_open("admin/training/$action/$trainingid");?>
<!--<script type="text/javascript" src="<?php //echo base_url();?>tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    //file_browser_callback: "fileBrowserCallback",
    //selector: "#training_text",
    theme: "modern",
plugins: [ 
"advlist autolink link image lists charmap print preview hr anchor pagebreak", 
"searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking", 
"table contextmenu directionality emoticons paste textcolor filemanager" //
],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ],
});
</script>-->
    <textarea id="training_text" class="ckeditor" name="training_text" rows="10" cols="50" >
        <?php if(!empty($training->t_text)){echo $training->t_text;} ?>
    </textarea><!--class="ckeditor" -->
    <input id="add_text" name="add_text" type="submit" class="btn" value="<?php echo $button; ?>"/>
<?php form_close(); ?>
</div>
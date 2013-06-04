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
            
            <h1 class="page-title">Add Training</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active"><a href="<?php echo base_url(); ?>admin/training">Training</a> <span class="divider">/</span> Add Training</li>
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
 echo form_open('admin/training/add');?>
	<div class="field">
		<label for="title">Title</label> 
		<input id="title" value="" name="title" size="50" type="text" class="medium" />
	</div>
	<div class="field">
		<label for="link">Link</label> 
		<input id="link" value="" name="link" size="50" type="text" class="medium" />
	</div>
	<div class="field">
		<label for="link">Category</label> 
                <select id="category" name="category" class="medium" >
                    <?php foreach ($categories->result() as $category):?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
                    <?php endforeach; ?>
                </select>
	</div>

	<input id="add_training" name="add_training" type="submit" class="btn" value="Add"/>
</form>
</div>
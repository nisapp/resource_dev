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
$id='';
if(isset($query)){
    $category=$query->first_row();
    $id="/$category->id";
}
 echo form_open("admin/training/$action"."category".$id);?>
	<div class="field">
		<label for="title">Category Name</label> 
                <input id="category_name" value="<?php if(isset($category)) echo $category->category_name; ?>" name="category_name" size="50" type="text" class="medium" />
	</div>
	<input id="add_category" name="add_category" type="submit" class="btn" value="<?php echo $action; ?>"/>
</form>
</div>
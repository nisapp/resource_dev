
<?php if (isset($status) && $status=="success"){?>
  <div class="infomessage"><?php echo "Video has been added Successfully"?> </div>
  <?php }
else if (isset($status) && $status=="failure"){ ?>
  <div class="infomessage"><?php echo "Some thing went wrong please try again. . . "?> </div>
  <?php }
	else if (isset($status) && $status=="deletesuccess"){?>
  <div class="infomessage"><?php echo "Video has been Deleted Successfully"?> </div>
  <?php }
  else if (isset($status) && $status=="deletefailure"){ ?>
  <div class="infomessage"><?php echo "Sorry !! unable to Delete!!"?> </div>
  <?php }  else if (isset($status) && $status=="updatesuccess"){?>
  <div class="infomessage"><?php echo "Video has been Updated Successfully"?> </div>
  <?php }
		else if (isset($status) && $status=="updatefailure"){ ?>
  <div class="infomessage"><?php echo "Unable to Update Video."?> </div>
  <?php } ?>
  <div style="display:none" id="infomessage"><div style="margin-bottom: 10px;">Are you sure to delete?</div><a href="" id="del_yes"><div class="yes">Yes</div></a><div class="no" onclick="no_del();">No</div></div>
    
	<script src="<?php echo base_url(); ?>scripts/videoslisting.js" type="text/javascript"></script>
    <div class="content">
        
        <div class="header">
            
            <h1 class="page-title">Manage Login Videos</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Videos</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <!--<a href="<?php echo base_url();?>admin/videos/addvideo" ><button class="btn btn-primary" id="btn_addnewproduct"><i class="icon-plus"></i>Edit Login Video</button></a>-->
  <div class="btn-group">
  </div>
</div>
<div class="well">

    <table class="table" id="mt">
      <thead>
        <tr>
          <th>#</th>
          <th>Nav Title</th>
          <th>Navigtion Position</th>
          <th>Video Name</th>
          <th>Description</th>
         <!-- <th>Last modified</th>-->
          <th>Video Type</th>
          <th style="width: 26px;">Action</th>
        </tr>
      </thead>
      <tbody>

<?php 
$i=1;
$video_type='';
$change_url='';
 foreach($query->result() as $singlevideo ){
	$video_type=$singlevideo->type;
	$is_show=1;
	switch($video_type){
			case 'login_video':	$video_type='Login Video';
								$change_url=base_url().'admin/videos/change_login_video';
								break;
		case 'welcome_video':	$video_type='Welcome Video';
								$change_url=base_url().'admin/videos/change_welcome_video';
								break;
		case 'gvo_video':		$video_type='Gvo Video';
								$is_show=0;
								$change_url=base_url().'admin/videos/change_gvo_video';
								break;
		case 'emp_video':		$video_type='Empower Video';
								$is_show=0;
								$change_url=base_url().'admin/videos/change_emp_video';
								break;
		case 'pure_leverage_video':$video_type='Pure Leverage Video';
									$is_show=0;
									$change_url=base_url().'admin/videos/change_pure_lev';
									break;
		case 'next_video':		$video_type='Next Step<br/> '.$singlevideo->menu_title;
								$change_url=base_url().'admin/videos/change_next_video';
								break;
							
	}
	if($is_show){
?> 
	
		<tr>
          <td><?php echo $i; ?></td>
          <td><?php if($singlevideo->tab_title=='') echo 'None'; else echo $singlevideo->tab_title; ?></td>
          <td><?php if($singlevideo->position==0) echo 'Default'; else echo $singlevideo->position; ?></td>
          <td><?php echo $singlevideo->file_name; ?></td>
          <td><?php echo $singlevideo->description; ?></td>
          <!--<td><?php echo $singlevideo->added_date; ?></td>-->
          <td><span class="v_type"><?php echo $video_type; ?><span></td>
          <td>
              <a class="edit_video" href="<?php echo $change_url.'/'.$singlevideo->Id; ?>" >Change</a>
			  
          </td>
        </tr>
<?php  ++$i; } } ?>  
      </tbody>
    </table>
	<input type="hidden" name="numrs" id="numrs" value="<?php //echo $totalrecords ;?>">
	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
</div>
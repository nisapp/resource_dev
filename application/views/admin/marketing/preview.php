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
            
            <h1 class="page-title">Manage Marketing</h1>
        </div>
        
		<ul class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
            <li class="active"><a href="<?php echo base_url(); ?>admin/marketing">Marketing</a> <span class="divider">/</span> Preview Marketing</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
 
<div class="btn-toolbar">
    <!--<a href="<?php echo base_url();?>admin/videos/addvideo" ><button class="btn btn-primary" id="btn_addnewproduct"><i class="icon-plus"></i>Edit Login Video</button></a>-->
  <div class="btn-group">
  </div>
</div>

<div class="well">
    <div id="home_page_main">
                <?php  
                $row = $query->row();
                ?>
        
                <div id="program_info">
                    <div id='program_data_left'>
                    <div id="video_player">
                    <p>Program Title: <?php echo $row->title; ?></p>
                    <p>Link is: <?php echo $row->link; ?></p>
                        <?php
                        if(preg_match("/youtube\.com/", $row->video)):
                            $video_str = substr($row->video,-11);
                        ?>
                        <iframe width="560" height="315" 
                                src="http://www.youtube.com/embed/<?php echo $video_str; ?>" 
                                frameborder="0" allowfullscreen>
                        </iframe>
                        <?php else: ?>
			<div id="container">
				<div id="winner">
					<div class="video_preveiw" style="width:50%;margin-left: 10px;float: left;" >
						<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
						<div id="videopreview">Loading the player...</div>
					</div>
				</div>
				<input type="hidden" id="id_videopreview" value="<?php echo $row->video; ?>">
                                <input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
                                <input type="hidden" id="video_file_path" value="uploads/temp/">
			</div>
                        <?php endif; ?>
                    </div>
                    </div>
                    <div id='program_description'>
                    <p>Program Logo<img src="<?php echo base_url(); ?>uploads/temp/<?php echo $row->logo; ?>" /></p>
                        <h3>Program Description</h3>
                        <?php echo $row->description; ?>
                    </div>
                </div>
        <a class="btn" href="<?php echo base_url(); ?>admin/marketing/edit/<?php echo $row->id; ?>">Edit</a>
            </div>
</div>


            
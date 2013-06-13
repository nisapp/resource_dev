<style type="text/css">
.preview{
	border: 2px solid pink;
    border-radius: 10px 10px 10px 10px;
    height: 250px;
    margin-left: 8%;
    width: 360px;
}

</style>
<script src="<?php echo base_url(); ?>jwplayer/jwplayer.js" type="text/javascript"></script>
<script>
$(document).ready(function() { 
		var baseurl = $("#baseurl").val();
		var previewfile = $("#txtWelcome").val();
		if(previewfile=="")
		{
			previewfile = "20051210-w50s.flv";
		}
		jwplayer("videopreview").setup({
				file: baseurl+'uploads/videos/'+previewfile,
				height: 325,
				width: 580,
				image: baseurl+'uploads/images/preview.jpg',
			}).play();
		
	})
</script>
<div class="content">
	<div class="header">
		<h1 class="page-title">Manage Marketing</h1>
	</div>
        
	<ul class="breadcrumb">
		<li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a> <span class="divider">/</span></li>
		<li class="active"><a href="<?php echo base_url(); ?>admin/programs">Program</a> <span class="divider">/</span> Program Preview</li>
	</ul>

	<div class="container-fluid">
		<div class="row-fluid">
 
	<div class="btn-toolbar">
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
							<p><b>Program Title: </b><?php echo $row->program_title; ?></p>
							<p><b>Link is: </b><?php echo $row->signup_link; ?></p>
							<p><b>Video: </b> 
							<div id="container">
								<!--<img src="<?php echo base_url();?>images/webBg2.png" id="video_bg">-->
								<div class="video_preveiw" style="">
											<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
											<div id="videopreview">Loading the player...</div>
								</div>
							</div>
							</p>		
						</div>
                    </div>
                    <div id='program_description'>
						<br/>
						<br/>
						<p><b>Program Logo:</b> <img class="preview" src="<?php echo base_url(); ?>uploads/logo/<?php echo $row->logo; ?>" /></p>
                    </div>
                </div>
				<a class="btn" href="<?php echo base_url(); ?>admin/programs/edit/<?php echo $row->id; ?>">Edit</a>
            </div>
</div>
<input type="hidden" id="txtWelcome"  name="txtWelcome" value="<?php echo $row->video_name_in_folder; ?>">
<input type="hidden" id="baseurl" value="<?php echo base_url();?>">


            
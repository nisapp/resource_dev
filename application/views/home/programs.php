<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php if(isset($stylelist)):
            foreach ($stylelist as $style):?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().$style; ?>">
        <?php endforeach;
        endif; 
        if(isset($scriptlist)): 
            foreach ($scriptlist as $script):?>
        <script src="<?php echo base_url().$script; ?>" type="text/javascript"></script>
        <?php endforeach;
        endif; ?>
<style>  
.video_preveiw{
	margin: 38px 3px 2px 115px;
	position: absolute;
	text-align: center;
	/* width: 50%; */
}

img#videobg{
	margin: 1% 1% 2% 10%;
    width: 90%;
}
#store_program input[type=submit]{
    background-image: url('<?php echo base_url();?>images/affiliateLink.png');
}
#join_program{
    background-image: url('<?php echo base_url();?>images/affiliateLink.png');
    display:block;
}
#save_affiliate_id input[type=submit]{
    background: url('<?php echo base_url();?>images/save_affiliate_id_button.png') -5px -5px;
}
.formArea p{
    background-image:url("<?php echo base_url();?>images/programBg.png");
}
</style>  
    </head>
    
    <body>
    

	<div id="wrapper">
		<div class="siteHeaderBg">
			<div class="wrapperOuter">
				<div class="wrapperMain">
					<!--header-->
					<?php $this->load->view('/global/store_program_header.php'); ?>
					<!--/header-->
				</div>
				<!-- container -->
            <!-- container -->
            <div id="container">
                <nav class="maniNav">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>members/clientdashboard">Home</a></li>
                        <li><a href="#">E.A.P Training</a></li>
                        <li><a href="<?php echo base_url(); ?>members/promotesite" >Promote Web</a></li>
                        <li><a href="<?php echo base_url(); ?>home/programs">Programs Joined</a></li>
                        <li><a href="<?php echo base_url(); ?>members/promotesite/downclient">Tools</a>	</li>
                        <li><a href="<?php echo base_url(); ?>members/email">Bonuses</a></li>
                        <li><a class="last" href="<?php echo base_url(); ?>members/email/femail">Contact Support</a></li>
                    </ul>
                </nav>
                
            	 <div class="profitsContainer">
                <?php if($programdata->num_rows==0): ?>
                <h2>There are no any program!</h2>
                <?php    else:
                $row = $programdata->first_row();  //              var_dump($programdata);
                ?>
                 	<div class="profitsLeft">
                            <div class="formArea">
                                <p> <?php echo $row->title; ?></p>
                            <br />
                        </div>
                            <div class="clear"></div>
                        <?php
                        if(preg_match("/youtube\.com/", $row->video)):
                            $video_str = substr($row->video,-11);
                        ?>
                            <div class="video_preveiw" >
                        <iframe width="480" height="270" 
                                src="http://www.youtube.com/embed/<?php echo $video_str; ?>" 
                                frameborder="0" allowfullscreen>
                        </iframe>
                            </div>
                        <?php else: ?>
				<div class="video_preveiw" >
					<script type="text/javascript">jwplayer.key="oIXlz+hRP0qSv+XIbJSMMpcuNxyeLbTpKF6hmA==";</script>
					<div id="videopreview">Loading the player...</div>
				</div>
				<input type="hidden" id="id_videopreview" value="<?php echo $row->video; ?>">
                                <input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
                                <input type="hidden" id="video_file_path" value="uploads/temp/">
                                <input type="hidden" id="is_avail" name="is_avail" value="-1">
                                <?php endif; ?>
                                <img src="<?php echo base_url();?>images/webBg2.png" id="videobg"/>
                        <div class="clear"></div>
                    <div id="add_program">
                        <?php
                        $formattrib = array('id'=>'save_affiliate_id');
                        echo form_open('home/programs/'.$row->id,$formattrib);
                        if($programstored):
                            if(empty($row->affiliate_link)){
                                $value = 'Enter Program Affiliate link';
                            }
                            else{
                                $value = $row->affiliate_link;
                            }
                        $input_attrib = array('id'=>'affiliatelink','name'=>'affiliatelink','value'=>$value);
                        echo form_input($input_attrib);
                        else: ?>
                        <a id="join_program" href="<?php echo '#';//$row->link . $row->affiliate_link; ?>" 
                           alt="<?php echo $row->link . $row->affiliate_link; ?>" title="<?php echo $row->link . $row->affiliate_link; ?>">
                            <strong>Click URL To Join Program:</strong><?php echo $row->link; ?>
                        </a>
                        <?php 
                        $value = 'Enter Program Affiliate ID Here';
                        $input_attrib = array('id'=>'affiliateid','name'=>'affiliateid','value'=>$value);
                        echo form_input($input_attrib);
                        endif; 
                        $submit_name=$programstored?"save_link":"store_submit";
                        echo form_submit($submit_name, '');
                        echo form_close();
                        ?>
                    </div>
                    </div>
                    <div class="profitsRight">
                        <div id="program_steps">
                            
                            <h3>Existing Programs</h3>
                            <?php foreach ($programs->result() as $prog):?>
                            <div class ="steps ">
                                <p>Program</p> 
                                <a href="<?php echo base_url(); ?>home/programs/<?php echo $prog->id; ?>"><?php echo $prog->title; ?></a> 
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                 </div>
                 <div class="clear"></div>
				<!-- footer -->
					<?php $this->load->view('global/footer'); ?>
				<!-- /footer -->
                       
            </div>
            <!-- /container -->
        </div>
    </div>

  </div>
    

    </body>
</html>
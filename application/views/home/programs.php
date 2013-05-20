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
    </head
    <body>
        <div id="page_content">
            <div id="home_page_title">
                <div id="home_page_title_content">
                    <div id="site_logo"></div>
                    <div id="member_field">
                        Welcome <?php echo $username; ?>! |
                        <a href="<?php echo base_url(); ?>home/logout">Logout</a>
                    </div>
                </div>
            </div>
            <div id="home_page_main">
                <?php if($query->num_rows==0): ?>
                <h2>There are no any program!</h2>
                <?php    else:
                $row = $query->first_row();
                ?>
                <div id="program_info">
                    <p><strong>Marketing Program Title:</strong> <?php echo $row->title; ?></p>
                    <div id="video_player">
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
			</div>
                        <?php endif; ?>
                    </div>
                    <div id="add_program">
                        <?php
                        $formattrib = array('id'=>'store_program');
                        echo form_open('home/programs/'.$row->id,$formattrib);
                        if($step===1){
                        echo form_submit('step1submit', 'Click URL To Join Program: '.$row->link);
                        }
                        elseif($step===2){ ?>
                        <h3>You have joined to program <?php echo $row->link; ?></h3>
                        <?php
                        if($row->affiliateid!==NULL){
                            $value = $row->affiliateid;
                        }
                        else{
                            $value = 'Enter Program Affiliate ID Here';
                        }
                        $input_attrib = array('id'=>'affiliateid','name'=>'affiliateid','value'=>$value);
                        echo form_input($input_attrib);
                        echo form_submit('step2submit', 'SAVE YOUR AFFILIATE ID');
                        }
                        else{
                            if($query->num_rows > 1):
                                $last = $query->last_row();
                        ?>
                        <a href="<?php echo base_url(); ?>home/programs/<?php echo $last->id; ?>">Next</a>
                        <?php else: ?>
                        <a href="#">Finish</a>
                        <?php endif; }
                        echo form_close();
                        ?>
                    </div>
                </div>
                <div id="program_desc">
                    <h3>Just 2 easy steps</h3>
                    <p class ="steps <?php if($step===1) echo 'curentstep'; ?>">
                        1 Join to program 
                    </p>
                    <p>&#8595;</p>
                    <p class ="steps <?php if($step===2) echo 'curentstep'; ?>">
                        2 Save your affiliate ID
                    </p>
                </div>
                <?php endif; ?>
            </div>
            <div id="home_page_footer">

            </div>
        </div>
    </body>
</html>
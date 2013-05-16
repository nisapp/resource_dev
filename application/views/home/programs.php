<html>
    <head>
        <title><?php echo $title; ?></title>

    </head>
    <body>
        <div id="page_content">
            <div id="home_page_title">
                <div id="site_logo"></div>
                <div id="member_field">
                    Welcome <?php echo $username; ?>! |
                    <a href="<?php echo base_url(); ?>home/logout">Logout</a>
                </div>
            </div>
            <div id="home_page_main">
                <?php
                $row = $query->first_row();
                ?>
                <div id="program_info">
                    <p>Program title: <?php echo $row->title; ?></p>
                    <div id="video_player"><?php echo $row->video; ?></div>
                    <div id="add_program">
                        <?php
                        echo form_open('home/programs');
                        if($step===1){
                        echo form_submit('step1submit', 'Click URL To Join Program: '.$row->link);
                        }
                        elseif($step===2){ ?>
                        <h3>You have joined to program <?php echo $row->link; ?></h3>
                        <?php
                        echo form_input('affiliateid','Enter Program Affiliate ID Here');
                        echo form_submit('step2submit', 'SAVE YOUR AFFILIATE ID');
                        }
                        else{
                        echo form_submit('submitnext', 'NEXT');
                        }
                        echo form_close();
                        ?>
                    </div>
                </div>
                <div id="program_desc">
                    <h3>Just 2 easy steps</h3>
                    <h3>1 Join to program</h3>
                    <h3>1 Add your affiliate ID</h3>
                </div>
            </div>
            <div id="home_page_footer">

            </div>
        </div>
    </body>
</html>
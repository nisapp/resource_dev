<?php
$curPageName=$view_name;
?>
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/lib/font-awesome/css/font-awesome.css">

    <script src="<?php echo base_url(); ?>scripts/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>css/lib/bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>scripts/marketing.js" type="text/javascript"></script>
    <?php if(isset($scripts)): 
        foreach($scripts as $script): ?>
    <script src="<?php echo base_url().$script; ?>" type="text/javascript"></script>
    <?php endforeach;
    endif; ?>
    <?php if(isset($styles)): 
        foreach($styles as $style): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().$style; ?>">
    <?php endforeach;
    endif; ?>

	
	<!--<script>
var jq172 = jQuery.noConflict();
</script>-->
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
        .well{
            overflow-x: scroll;
        }
    </style>
<script type="text/javascript">
	setTimeout(function() {
		$('.infomessage').fadeOut('fast');
		$('.errormessage').fadeOut('fast');
	} , 1750);

</script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <!--<link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">-->
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 

  <!--<![endif]-->
    
    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <!--<li><a href="<?php echo base_url()?>clientadmin/setting" class="hidden-phone visible-tablet visible-desktop" role="button">Settings</a></li>-->
                    <li id="fat-menu" class="dropdown">
                        <a href="<?php echo base_url()?>clientadmin/clientdashboard/logout" role="button" class="dropdown-toggle" data-toggle="dropdown">
                             My Account
                        </a>
						<ul class="dropdown-menu">
                            <li><a tabindex="-1" href="<?php echo base_url()?>admin/setting">Edit Account Detail</a></li>
								<li class="divider"></li>
							<li><a tabindex="-1" href="<?php echo base_url()?>admin/setting/changepassword">Change Password</a></li>
								<li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Change Password</a></li>
								<li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="<?php echo base_url(); ?>admin/dashboard/logout">Logout</a></li>
							
                        </ul>
                        
                    </li>
                    
                </ul>
                <a class="brand" href="index.php"><span class="first">Content</span> <span class="second">Management</span></a>
        </div>
    </div>
    


    
    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse  <?php if(isset($curPageName) && ($curPageName=='listing' || $curPageName=='dashboard' || $curPageName=='empower_video' || $curPageName=='logolist') || $curPageName=='addlogo' || $curPageName=='addwelvideo' || $curPageName=='addvideo' || $curPageName=='gvo_video' || $curPageName=='pure_leverage_video' || $curPageName=='next_video' || $curPageName=='menu_listing'|| $curPageName=='menu_edit_view' ){ echo 'in'; } ?>">
            
            <li><a href="<?php echo base_url(); ?>admin/videos">Manage Welcome Video</a></li>
			<li><a href="<?php echo base_url(); ?>admin/menu">Menu Management</a></li>
			<li><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
            <!--<li><a href="<?php echo base_url(); ?>admin/logos">Manage Logo</a></li>-->
            
        </ul>
	
		<a href="#client-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Manage Client<i class="icon-chevron-up"></i></a>
        
		<ul id="client-menu" class="nav nav-list collapse <?php if(isset($curPageName) && ($curPageName=='clients_listing')){ echo 'in'; } ?>">
            <li><a href="<?php echo base_url(); ?>admin/clients">View Clients</a></li>
        </ul>
		<a href="#program-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Program Menu<i class="icon-chevron-up"></i></a>
        
		<ul id="program-menu" class="nav nav-list collapse <?php if($this->uri->segment(2)=='programs') { echo 'in'; } ?>">
            <li><a href="<?php echo base_url(); ?>admin/programs">All Programs</a></li>
            <li><a href="<?php echo base_url(); ?>admin/programs/add">New Programs</a></li>
        </ul>
		
		<a href="#marketing-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Marketing Programs<span class="label label-info">+2</span></a>
        
		<ul id="marketing-menu" class="nav nav-list collapse <?php if($this->uri->segment(2)=='marketing'){ echo 'in'; } ?>">
            <li><a href="<?php echo base_url(); ?>admin/marketing/add">Add New Program</a></li>
            <li><a href="<?php echo base_url(); ?>admin/marketing">View All Programs</a></li>
        </ul>
		<a href="#training-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Training<span class="label label-info">+3</span></a>
        
		<ul id="training-menu" class="nav nav-list collapse <?php if($this->uri->segment(2)=='training'){ echo 'in'; } ?>">
            <li><a href="<?php echo base_url(); ?>admin/training/add">Add New Training</a></li>
            <li><a href="<?php echo base_url(); ?>admin/training">View All Training</a></li>
            <li><a href="<?php echo base_url(); ?>admin/training/categories">Categories</a></li>
        </ul>


    </div>
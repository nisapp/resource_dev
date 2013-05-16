<?php
	function curPageName() {
	 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
	$curPageName=curPageName();
?>
  <head>
    <meta charset="utf-8">
    <title>Client Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/lib/font-awesome/css/font-awesome.css">

    <script src="<?php echo base_url(); ?>scripts/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>css/lib/bootstrap/js/bootstrap.js" type="text/javascript"></script>
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
    </style>
<script type="text/javascript">
	setTimeout(function() {
		$('.infomessage').fadeOut('fast');
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
                            <li><a tabindex="-1" href="<?php echo base_url()?>clientadmin/setting">Edit Account Detail</a></li>
								<li class="divider"></li>
							<li><a tabindex="-1" href="<?php echo base_url()?>clientadmin/setting/changepassword">Change Password</a></li>
								<li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Change Password</a></li>
								<li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="<?php echo base_url()?>clientadmin/clientdashboard/logout">Logout</a></li>
							
                        </ul>
                        <!--<ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">My Account</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="sign-in.html">Logout</a></li>
                        </ul>-->
                    </li>
                    
                </ul>
                <a class="brand" href="index.html"><span class="first">Welcome</span> <span class="second"><?php echo $this->session->userdata['client_login']['fullname'];?></span></a>
        </div>
    </div>
    


    
    <div class="sidebar-nav">
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
        <ul id="dashboard-menu" class="nav nav-list collapse in">
            <li><a href="<?php echo base_url(); ?>clientadmin/clientdashboard">Home</a></li>
            <li><a href="<?php echo base_url(); ?>clientadmin/promotesite">Promote Site</a></li>
            <li><a href="<?php echo base_url(); ?>clientadmin/promotesite/downclient">My Downline</a></li>
            
        </ul>
		<a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Email Rules<i class="icon-chevron-up"></i></a>
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li ><a href="<?php echo base_url(); ?>clientadmin/email"> Welcome Email</a></li>
            <li ><a href="<?php echo base_url(); ?>clientadmin/email/femail"> Follow Up email</a></li>
        </ul>


    </div>
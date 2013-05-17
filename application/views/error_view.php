<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Error Information</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/lib/font-awesome/css/font-awesome.css">

    <script src="<?php echo base_url(); ?>css/lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

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
		body{
				background: url("<?php echo base_url();?>furley_bg.png") repeat scroll 0 0 #EEEEEE;
		}
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 http-error"> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 http-error"> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 http-error"> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
<body class="http-error"> 
  <!--<![endif]-->

    
	<div class="row-fluid">
		<div class="http-error">
			<h1>Oops!</h1>
			<p class="info"><?php if(isset($error_message) &&($error_message!='')){ echo $error_message; }else{ ?>Something happened that we didn't expect.<?php } ?></p>
			<p><i class="icon-home"></i></p>
			<p><a href="<?php if(isset($error_redirect) &&($error_redirect!='')){ echo $error_redirect; }else{  echo base_url(); } ?>">Click Here</a></p>
		</div>
	</div>
   
  </body>
</html>



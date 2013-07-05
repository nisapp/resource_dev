<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $title; ?></title>
        <?php if(isset($stylelist)):
			foreach ($stylelist as $style){ ?>
				<link rel="stylesheet" type="text/css" href="<?php echo base_url().$style; ?>">
		<?php }
			endif; 
        if(isset($scriptlist)): 
            foreach ($scriptlist as $script){?>
				<script src="<?php echo base_url().$script; ?>" type="text/javascript"></script>
	<?php 	}
        endif; ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41990556-1', 'easyaccessprofits.com');
  ga('send', 'pageview');

</script>
                                
    <style>
        #text-holder-side-temp{
            background: url(<?php echo base_url(); ?>images/new_index.png) bottom center no-repeat;
            height: 666px;
            width: 800px;
            margin: auto;
        }
#optinBox .textBox {
    background-color: #fff;
color: #48697e;
border-color: transparent;
font: bold 30px Arial,Helvetica,sans-serif;
letter-spacing: 0;
width: 517px;
height: 20px;
margin-top: 7px;
margin-left: 9px;
margin-right: auto;
}
#optinBox .submit {
    background: none;
width: 554px;
height: 86px;
border: none;
background-color: transparent;
cursor: pointer;
margin: 27px 0px 0px 0px;
}
#optinBox {
background-repeat: no-repeat;
width: 480px;
margin: 396px 0px 0px 90px;
position: absolute;
}
#wrapper {
width: 960px;
text-align: center;
margin: 50px auto;
}
    </style>                                
</head>
<body>
<div id="wrapper">





<div id="text-holder-side-temp">

  
<div id="optinBox">  
	<form accept-charset="utf-8" action="https://app.getresponse.com/add_contact_webform.html"
    method="post">
           	 <div class="textField">
            <div id="form">
			<input type="text" title="Email" alt="Email" class="textBox" name="email" value="Enter Your Best Email Address..." onfocus="if(this.value=='Enter Your Best Email Address...'){this.value=''};" onblur="if(this.value==''){this.value='Enter Your Best Email Address...'};"></div>
                <div class="btnBox">
                    <input type="submit" name="submit" class="submit" value="" onclick="areYouReallySure=true;">
                </div>
            </div>
		  <input type="hidden" name="webform_id" value="457754" />
           
           	 	 </form>
<script type="text/javascript" src="http://app.getresponse.com/view_webform.js?wid=457754&mg_param1=1"></script>
</div>
  
  
</div>


 
</div>


</body>
</html>

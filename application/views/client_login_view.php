<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login to Our Website</title>
<meta name="description" content="" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/landing.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css"/>
<script>
	
jQuery(function($){
		   
	// simple jQuery validation script
	$('#login').submit(function(){
		
		var valid = true;
		var errormsg = 'This field is required!';
		var errorcn = 'error';
		
		$('.' + errorcn, this).remove();			
		
		$('.required', this).each(function(){
			var parent = $(this).parent();
			if( $(this).val() == '' ){
				var msg = $(this).attr('title');
				msg = (msg != '') ? msg : errormsg;
				$('<span class="'+ errorcn +'">'+ msg +'</span>')
					.appendTo(parent)
					.fadeIn('fast')
					.click(function(){ $(this).remove(); })
				valid = false;
			};
		});
		
		return valid;
	});
	
});

$(document).ready(function(){
    $("#login_username").focus(function(){
        $("#login_username_lable").hide();
    });
    $("#login_password").focus(function(){
        $("#login_password_lable").hide();
    });
    $("#login_username").focusout(function(){
        if($(this).val()==='')$("#login_username_lable").show();
    });
    $("#login_password").focusout(function(){
        if($(this).val()==='')$("#login_password_lable").show();
    });
});

</script>
<style>

/* HTML elements  */		
/*
	h1, h2, h3, h4, h5, h6{
		font-weight:normal;
		margin:0;
		line-height:1.1em;
		color:#000;
		}	
	h1{font-size:2em;margin-bottom:.5em;}	
	h2{font-size:1.75em;margin-bottom:.5142em;padding-top:.2em;}	
	h3{font-size:1.5em;margin-bottom:.7em;padding-top:.3em;}
	h4{font-size:1.25em;margin-bottom:.6em;}
	h5,h6{font-size:1em;margin-bottom:.5em;font-weight:bold;}
	
	p, blockquote, ul, ol, dl, form, table, pre{line-height:inherit;margin:0 0 1.5em 0;}
	ul, ol, dl{padding:0;}
	ul ul, ul ol, ol ol, ol ul, dd{margin:0;}
	li{margin:0 0 0 2em;padding:0;display:list-item;list-style-position:outside;}	
	blockquote, dd{padding:0 0 0 2em;}
	pre, code, samp, kbd, var{font:100% mono-space,monospace;}
	pre{overflow:auto;}
	abbr, acronym{
		text-transform:uppercase;
		border-bottom:1px dotted #000;
		letter-spacing:1px;
		}
	abbr[title], acronym[title]{cursor:help;}
	small{font-size:.9em;}
	sup, sub{font-size:.8em;}
	em, cite, q{font-style:italic;}
	img{border:none;}			
	hr{display:none;}	
	table{width:100%;border-collapse:collapse;}
	th,caption{text-align:left;}
	form div{margin:.5em 0;clear:both;}
	label{display:block;}
	fieldset{margin:0;padding:0;border:none;}
	legend{font-weight:bold;}
	input[type="radio"],input[type="checkbox"], .radio, .checkbox{margin:0 .25em 0 0;}*/

/* //  HTML elements */	

/* base */
/*
body, table, input, textarea, select, li, button{
	font:1em "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	line-height:1.5em;
	color:#444;
	}	
body{
    background: url("<?php //echo base_url(); ?>images/bg-arrow.png") no-repeat scroll center bottom #c7e1f2;
    overflow-x: hidden;
	font-size:12px;
	 background:#c4f0f1;		 */
	/*text-align:center;
	}		

/* // base 
.register {
width: 500px;
margin: 2px auto;
text-align: right;
}
/* login form 
*/
#login {
margin: 5em auto 1em;
background: url(<?php echo base_url(); ?>images/new_components/login_form_bg.png) repeat #3c4b5d;
width: 350px;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
-moz-box-shadow: 0 0 10px #4e707c;
-webkit-box-shadow: 0 0 10px #4e707c;
box-shadow: 0 0 10px #4e707c;
text-align: left;
position: relative;
overflow: hidden;
}
#login a{color:#fff;}
#login a:hover{color:#0283b2;}
#login h1{
	background:#0092c8;
	color:#fff;
	text-shadow:#007dab 0 1px 0;
	font-size:14px;
	padding:18px 23px;
	margin:0 0 1.5em 0;
	border-bottom:1px solid #007dab;
	}
#login .register{
	position:absolute;
	float:left;
	margin:0;
	line-height:30px;
	top:-40px;
	right:0;
	font-size:11px;
	}
#login p{margin:.5em 25px;}
#login div{
	margin: .5em 25px;
        background: none;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        text-align: right;
        position: relative;
	}	
#login label{
	float:left;
	line-height:30px;
	padding-left:10px;
	}
#login .field{
	border: none;
        width: 292px;
        height: 24px;
        font-size: 12px;
        line-height: 1em;
        color:white;
        padding: 4px;
        -moz-box-shadow: inset 0 0 5px #ccc;
        margin: 0px;
        background: url(<?php echo base_url(); ?>images/new_components/login_form_input_bg.png) repeat #3C4B5E;
	}	
#login div.submit{background:none;margin:1em 25px;text-align:center;}	
#login div.submit label{float:none;display:inline;font-size:12px;}	
#login button{
	border: 0px;
	padding: 0px 71px;
	height: 40px;
	width: 142px;
	margin-left: 35px;
	background:url(<?php echo base_url(); ?>images/new_components/login_button_bg.png) repeat #3C4B5E;
	-moz-border-radius:0px;
	-webkit-border-radius:0px;
	border-radius:0px;
	cursor:pointer;
	}
	
#login .forgot{text-align:right;font-size:11px;}
#login .back{padding:1em 0;border-top:1px solid #eee;text-align:right;font-size:11px;}
#login .error{
	float:left;
	position:absolute;
	left:95%;
	top:-5px;
	background:#890000;
	padding:5px 10px;	
	font-size:11px;
	color:#fff;
	text-shadow:#500 0 1px 0;
	text-align:left;
	white-space:nowrap;
	border:1px solid #500;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	-moz-box-shadow:0 0 5px #700;
	-webkit-box-shadow:0 0 5px #700;
	box-shadow:0 0 5px #700;
	}
        #other_commands li {
            display: inline;
            padding: 2px;
            margin: 0px;
            /*border-left: 1px solid;*/
        }
        #other_commands{
            margin:10px 5px;
            float:right;
        }
        .logo{
            width: 180px;
            float: none;
        }
        #login{
            margin:10px auto;
        }
.input_lable {
position: absolute;
top: 7px;
left: 15px;
color: #c7c7c7;
}
#login_page_content{
width: 100%;
margin: 80px 0px;
padding: 20px 0px 76px;
background: url(<?php echo base_url(); ?>images/new_components/login_form_part_bg.png) repeat #3C4B5E;
}

/* //  checkbox styles */	
input[type="checkbox"] {
    display:none;
}

input[type="checkbox"] + label {
    color:#f2f2f2;
    font-family:Arial, sans-serif;
    font-size:14px;
}

input[type="checkbox"] + label span {
    display:inline-block;
    width:19px;
    height:19px;
    margin:-1px 4px 0 0;
    vertical-align:middle;
    background:url(<?php echo base_url(); ?>images/new_components/check_radio_sheet.png) left top no-repeat;
    cursor:pointer;
}

input[type="checkbox"]:checked + label span {
    background:url(<?php echo base_url(); ?>images/new_components/check_radio_sheet.png) -19px top no-repeat;
}
		
</style>


</head>
<body>
    <div id="login_page_content">
	<div class="logo">
		<h3><a href="<?php echo base_url(); ?>">Logo</a></h3>
	</div>
<form id="login" method="post" action="<?php echo base_url();?>login"> 
	<font style="font-size:12px;color:red;text-align:center;">
		<?php echo form_error('password'); ?>
	</font>	
	
    <div>
        <span id="login_username_lable" class ="input_lable">Username</span>
    	<input type="text" name="username" id="login_username" class="field required" title="Please provide your username" />
    </div>			

    <div>
        <span id="login_password_lable" class ="input_lable">Password</span>
    	<input type="password" name="password" id="login_password" class="field required" title="Password is required" />
    </div>			
    
    <div class="submit" style="overflow:hidden;">
        <input type="checkbox" id="remeber_me" name="remeber_me" /><label for="remeber_me"><span></span>Remember me</label>
        <button style="float:right;" name="client_login" type="submit"></button>   
    </div>
    <ul id="other_commands">
        <li><a href="<?php echo base_url(); ?>createaccount">Register</a></li>
        <li>|</li>
        <li><a href="<?php echo base_url(); ?>recovery">Lost Your Password</a></li>
    </ul>
    
  
</form>	
    </div>
</body>
</html>

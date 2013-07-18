<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title; ?></title>
	<link href="<?php echo base_url();?>css/landing/landing1.css" rel="stylesheet" type="text/css" />
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
        <script type="text/javascript">
			function validate(obj){
				var strEmail=jQuery('#getrp_email').val();
				frmobj=document.getresponse_sbs;
				if(strEmail=='' || strEmail=='Enter Your Email Here'){
					alert("Email not be Empty");
					frmobj.email.focus();
					return false;
				}else{
					var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
					var valid = emailRegex.test(strEmail);
					if(valid){
						// jQuery(".optinBox").mask("Waiting...");
						jQuery("body").mask("Waiting...");
						jQuery(obj).hide();
						return true;		
					}else{
						alert("Enter Valid email Id");
						frmobj.email.focus();
						return false;
					}
				}
			}
			
            $(document).ready(function(){
                var fLoadCounter = 0;
                $("#getresponse_sbs").submit(function(event){
                    var p_email = $("#getrp_email").val(); //
                    var pl_isset = $("#pl_isset").val();
                    if(pl_isset==="yes"){
                        $("iframe").contents().find("#pl_email").val(p_email);
                    }
                    $.ajax({
                        type:"POST",
                        async: false,
                        url: "<?php echo base_url();?>api/add_contact",
                        data: { email: p_email},
                        success:function(msg){ 
                    if(pl_isset==="yes"){
                        $("iframe").contents().find("#pl_form").submit();
                    }
                    else{
                        window.location.replace("<?php echo base_url(); ?>createaccount");
                    }
                   
                        }
                    });
                    event.preventDefault();
                });
                $("iframe").load(function(){
                    ++fLoadCounter;
                    if(fLoadCounter===2){ 
					//alert("ready");
						
                        window.location.replace("<?php echo base_url(); ?>createaccount");
                    }
                });
            });
        </script>
                                <style>
                                    #pl_subscribe{
                                        display: none;
                                        target-new: tab;
                                    }
                                </style>
</head>
<body>
<br><br><br><br>
<div class="optinBox">
<br><br>




<form id="getresponse_sbs" name="getresponse_sbs" accept-charset="utf-8" action="https://app.getresponse.com/add_contact_webform.html"
    method="post">
   
    
           	 <div class="textField">
            <div id="form">
			<input type="Email" id ="getrp_email" title="Email" alt="Email" class="textBox" name="email" value="Enter Your Email Here" onfocus="if(this.value=='Enter Your Email Here'){this.value=''};" onblur="if(this.value==''){this.value='Enter Your Email Here'};">
			
			</div>
                              
                
                <div class="btnBox">
                    <input id="gr_submit" type="submit" name="submit" class="submit" value="" onclick="return validate(this);" /> <!---->
                </div>
            </div>
		  <input type="hidden" id="webform_id" name="webform_id" value="479663" />
           
  </form>
        <?php if($plinfo):?>
        <input type="hidden" id="pl_isset" value="yes" />
        <iframe src="<?php echo base_url();?>api/plform" style="display:none;"></iframe>
        <?php else: ?>
        <input type="hidden" id="pl_isset" value="no" />
        <?php endif; ?>
                 <br>
<script type="text/javascript" src="http://app.getresponse.com/view_webform.js?wid=457754&mg_param1=1"></script>

</body>
</html>

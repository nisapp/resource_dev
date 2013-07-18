<?php
$is_plv_exist=0; 
if($plv_data && $plv_data!=''){
	$is_plv_exist=1;
	// echo 'hhhh';
}else{
	$is_plv_exist=0;
	// echo 'llllll';
}
			
echo '<pre>'.$is_plv_exist;
print_r($this->data['plv_data']);
echo '</pre>';

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
	<title><?php echo $title; ?></title>
	<link href="<?php echo base_url();?>css/landing/landing2.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url();?>scripts/jquery-1.7.2.min.js" type="text/javascript"></script>
	<link href="<?php echo base_url();?>scripts/mask/jquery.loadmask.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url();?>scripts/mask/jquery.loadmask.js" type="text/javascript"></script>
<script>
/* function SubmitForm(obj){
	//$("#process").bind("click", function () {
		jQuery(".optinBox").mask("Waiting...");
	//});
} */ 
function SubmitForm(obj){
	// jQuery("body").mask("Waiting..."); return;
	var strPlv=jQuery('#txt_plv_check').val();
	var strEmail=jQuery('#email').val();
	
	// var strPlv=jQuery('#txt_plv_check').val();
	// alert(strPlv);
	
	if(strEmail=='' || strEmail=='Enter Your Email Here'){
		alert("Not be Empty");
		return false;
	}else{
		var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
		var valid = emailRegex.test(strEmail);
		if(valid){
			// jQuery(".optinBox").mask("Waiting...");
			jQuery("body").mask("Waiting...");
			jQuery(obj).hide(); 
		}else{
			alert("Enter Valid email Id");
			return false;
		}
	}
	if(strPlv==1){
		jQuery('#txtPure_email').val(strEmail);
		
		var str = jQuery("#frmPure").serializeArray();
		// var str = 'CampaignCode=2b533a401b27&FormId=2716777&AffiliateName=elishahong2&Email=vipi1459uru%40gmail.com';
		jQuery.ajax({  
			type: "POST",  
			url:  "http://www.gogvo.com/subscribe.php",
			data: str,  
			success: function(value) {  
					alert("hiiiiii");
			}		
		}); 
		setInterval(function(){
			jQuery("#frmgetresponse").submit();
		}, 3000); 
	}else{
		jQuery("#frmgetresponse").submit();
	}
}
	

</script>
	
</head>
<body>
<br><br><br><br>
<div class="optinBox">
<br><br>
<?php 
if($is_plv_exist){
?>
	<form name="frmPure" id="frmPure"  method="post" style="display:none;">
		<input type="hidden" name="CampaignCode" value="2b533a401b27" />
		<input type="hidden" name="FormId" value="2716777" />
		<input type="hidden" name="AffiliateName" value="elishahong2" />
		<input type="text" name="Email" id="txtPure_email" /></td>
	</form>
<?php } ?>

<form method="post" name="frmgetresponse" id="frmgetresponse"  action="https://app.getresponse.com/add_contact_webform.html" >
    
           	 <div class="textField">
            <div id="form">
				<input type="email" id="email" title="Email" alt="Email" class="textBox" name="email" value="Enter Your Email Here" onFocus="if(this.value=='Enter Your Email Here'){this.value=''};" onBlur="if(this.value==''){this.value='Enter Your Email Here'};">
			</div>
                	<input type="hidden" name="webform_id" value="465257" />
              
                <div class="btnBox">
                    <input type="button" name="btn" class="submit"  onClick="SubmitForm(this);">
                </div>
            </div>
<?php 
	if($is_plv_exist){
?>
<input type="hidden" id="txt_plv_check" value="1" />

<?php 
}else{
?>
	<input type="hidden" id="txt_plv_check" value="0" />
<?php } ?>
</form>
	<br>
</body>
</html>

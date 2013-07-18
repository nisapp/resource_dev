<html>
<head>
	<style type="text/css">
	fieldset { margin: 4% 0 22px 30%;width: 25%; border: 1px solid #095D92; padding: 12px 17px; background-color: #DFF3FF; }
	legend { font-size: 1.1em; background-color: #095D92; color: #FFFFFF; font-weight: bold; padding: 4px 8px; }
	</style>
	<script src="<?php echo base_url();?>scripts/jquery-1.7.2.min.js" type="text/javascript"></script>
<script>
function SubmitForm(){
	var strEmail=jQuery('#email').val();
	// alert(strEmail);
	if(strEmail=='' || strEmail=='NULL'){
		alert("Not be Empty");
		return false;
	}
	jQuery.ajax({
        url: "https://app.getresponse.com/add_contact_webform.html",
        global: false,
        type: "POST",
        data: ({  
			email:strEmail,
			webform_id:'465257'
        }),
        dataType: "html",
        async: false,        
        success: function (msg) {
			// alert(msg);
        }
    });
	jQuery('#plv_email').val(strEmail);
	 document.frm2.submit();
}

	/* function SubmitForm()
	{
		 // document.frm.action='p1.php';
		 // document.frm.target='frame_result1';
		 document.frm2.submit();
		 document.frm.submit();
				  
		 // document.frm.action='p1.php';
		 // document.frm.target='frame_result2';
		 // alert("jkjk");
		 return true;
	} */
</script>
</head>



<fieldset>
<legend>GetResponse set up</legend>

<form method="post" name="frm" action="https://app.getresponse.com/add_contact_webform.html">
	<table align="center">
	<tr>
	<td>Email:</td><td>
		<input type="text" name="email" id="email" value="" />
		<input type="hidden" name="webform_id" value="465257" />
	</td>
	</tr>
	<tr>
	<td align="center" colspan="2">
	<input type="button" value="Submit" onclick="SubmitForm()" /></td>
	</tr>
	</table>
</form>
</fieldset>



<fieldset>
<legend>PureLeverage set up</legend>

<form method="post" name="frm2"  action="http://www.gogvo.com/subscribe.php">
	<input type="hidden" name="CampaignCode" value="2b533a401b27" />
	<input type="hidden" name="FormId" value="2716777" />
	<input type="hidden" name="AffiliateName" value="elishahong2" />

	<table align="center">
	<tr>
	<td>Email:</td><td><input type="text" id="plv_email" name="Email" /></td>
	</tr>
	<tr>
	<td align="center" colspan="2">
	<input type="submit" value="Submit" /></td>
	</tr>
	</table>
</form>
</fieldset>


function delete_record(id){
    var action = $("#current_action").val();
	var baseurl = $("#baseurl").val();
	$("#infomessage").css('display','block');
	$("#del_yes").prop("href", baseurl+action+id)
}
function no_delele(){
	$("#infomessage").css('display','none');
}

function validate_Delete()
{
	var action = confirm("Are you sure you want to delete This Records");
	return action;		  
}

function SetAllCheckBoxes(FormName, FieldName, CheckValue)
{
	if(!document.forms[FormName])
		return;
	var objCheckBoxes = document.forms[FormName].elements[FieldName];
	if(!objCheckBoxes)
		return;
	var countCheckBoxes = objCheckBoxes.length;
	
	if(!countCheckBoxes)
		objCheckBoxes.checked = CheckValue;
	else
		// set the check value for all check boxes
		for(var i = 0; i < countCheckBoxes; i++)
			objCheckBoxes[i].checked = CheckValue;
}

function AllCheck(FormName)
{
	if (document.getElementById('chkAll').checked) 
	{
		SetAllCheckBoxes(FormName,"chkCategory[]", true);
		//alert("call");//frmContactList
	}	
	else{
		SetAllCheckBoxes(FormName,"chkCategory[]", false);
	}
}

function validateCheckedItems(chkname,error_msg,confirm_msg,FormName)
	{
		var chks = document.getElementsByName(chkname);
		var hasChecked = false;
		for (var i = 0; i < chks.length; i++)
		{
			if (chks[i].checked)
			{
				hasChecked = true;
				break;
			}
		}
		if (!hasChecked)
		{
			alert(error_msg);
			chks[0].focus();
			return false;
		}
		else
		{
			action = confirm(confirm_msg);
			if (action==false)
			{
				SetAllCheckBoxes(FormName,"chkCategory[]", false);
				SetAllCheckBoxes(FormName,"chkAll", false);
				return false;
			}
		}
		// alert(action);
		return action;
	}
	/* Example to use:
	
	<input type="submit" name="delete"  id="delete" value="Delete" onclick="return validateCheckedItems('chkCategory[]','Please select at least one check box to delete records','Are you sure you want to delete selected records');" title="Delete"> */
	

/* $(document).ready(function(){
    $('#upload').click(function(){
        if($("#source").val()==='upload'){
            return false;
        }
        else{
            $("#source").val('upload');
            $("#youtube").removeClass('selected_src');
            $(this).addClass('selected_src');
            $("#youtube_link").hide();
            $("#video_upload").show();
        }
    });
    $("#youtube").click(function(){
        if($("#source").val()==='youtube'){
            return false;
        }
        else{
            $("#source").val('youtube');
            $("#upload").removeClass('selected_src');
            $(this).addClass('selected_src');
            $("#video_upload").hide();
            $("#youtube_link").show();
        }
    });
}); */
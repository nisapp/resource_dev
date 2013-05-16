$(document).ready(function(){
 $("span#assign_videos").click(function(){
	jQuery('#modal').reveal({ // The item which will be opened with reveal
				  	animation: 'fade',                   // fade, fadeAndPop, none
					animationspeed: 600,                       // how fast animtions are
					closeonbackgroundclick: true,              // if you click background will modal close?
					dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
				});
 });
 
 
 
 $("table.tbl_videos tr td input.chk_vassign").change(function(){
 
					var videotitle = $(this).closest('td').siblings('.td_videotitle').text();
					if($(this).is (':checked'))
					{
							var theappendstring= "<br>"+videotitle;
							
							$("div#div_assigned_videos").append(theappendstring);
							
					}
					else if(!$(this).is (':checked')){
					
						var videodiv = $("div#div_assigned_videos").html();
							var thedeletedstring = "<br>"+videotitle;
						
						var newcontent=videodiv.replace(thedeletedstring,""); 
						$("div#div_assigned_videos").html(newcontent);
						}
					
					});
 $("table.tbl_videos tr td input.chk_vassign").each(function() {
 if($(this).is (':checked')){
 var videotitle = $(this).closest('td').siblings('.td_videotitle').text();
							var theappendstring= "<br>"+videotitle;
							$("div#div_assigned_videos").append(theappendstring);
 }
 });
 
 
 
 

});

function check_checkbox () {
  if (currentTODO.find('.status').is(":checked")) {
            alert('Test.');
    }
}
function delpro(id){
var baseurl = $("#baseurl").val();
$("#infomessage").css('display','block');
$("#del_yes").prop("href", baseurl+"admin/users/deleteuser/"+id)
}
function no_del(){
$("#infomessage").css('display','none');
}
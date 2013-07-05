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
 
 
 $('#id_startdate').datetimepicker({
		dateFormat:"dd-mm-yy",
		 beforeShow: function(input, inst)
    {
        $.datepicker._pos = $.datepicker._findPos(input); //this is the default position
        $.datepicker._pos[0] = 556; //left
        $.datepicker._pos[1] = 426; //top
    } 
		});
 $('#id_enddate').datetimepicker({
		dateFormat:"dd-mm-yy",
		beforeShow: function(input, inst)
    {
        $.datepicker._pos = $.datepicker._findPos(input); //this is the default position
        $.datepicker._pos[0] = 556; //left
        $.datepicker._pos[1] = 496; //top
    } 
		});
 

});


function delpro(id){
var baseurl = $("#baseurl").val();
$("#infomessage").css('display','block');
$("#del_yes").prop("href", baseurl+"admin/jobs/deletejob/"+id)
}
function no_del(){
$("#infomessage").css('display','none');
}
function delpro(id){
    var action = $("#current_action").val();
	var baseurl = $("#baseurl").val();
	$("#infomessage").css('display','block');
	$("#del_yes").prop("href", baseurl+action+id)
}
function no_del(){
	$("#infomessage").css('display','none');
}
$(document).ready(function(){
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
    $("#frmProgram").submit(function(){
        var link=$("#txtSignup_Link").val();
        var de_id = $("#affiliate_id").val();
        if(link.search(de_id)===-1){
            alert("General link should contain default affiliate id.");
            return false;
        }
    });
});
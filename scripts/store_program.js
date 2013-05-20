$(document).ready(function(){
    var focus=0;
    $("input").focusin(function(){
        if(focus!==0)return 0;
        else focus=1;
        if($(this).val()==='Enter Program Affiliate ID Here'){
            $(this).val('');
        }
    });
    $("input").focusout(function(){
        focus =0;
    });
    $("#store_program").submit(function(){
        if($("input").val()===''){
            return false;
        }
    });
    
    var baseurl = $("#baseurl").val();

var previewfile = $("#id_videopreview").val();
if(previewfile=="")
{
	previewfile = "20051210-w50s.flv";
}
jwplayer("videopreview").setup({
        file: baseurl+'uploads/temp/'+previewfile,
		image: baseurl+'uploads/images/preview.jpg',
    }).play();
});
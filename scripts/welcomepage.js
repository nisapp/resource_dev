$(document).ready(function(){

var baseurl = $("#baseurl").val();

var previewfile = $("#id_videopreview").val();
if(previewfile=="")
{
	previewfile = "20051210-w50s.flv";
}
jwplayer("videopreview").setup({
        file: baseurl+'uploads/videos/'+previewfile,
		image: baseurl+'uploads/images/preview.jpg',
    }).play();
});
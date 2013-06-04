$(document).ready(function(){
    var baseurl = $("#baseurl").val();
    var file_path = $("#video_file_path").val();

var previewfile = $("#id_videopreview").val();
if(previewfile=="")
{
	previewfile = "20051210-w50s.flv";
}
jwplayer("videopreview").setup({
        file: baseurl+file_path+previewfile,
	image: baseurl+'uploads/images/preview.jpg',
    }).play();
});
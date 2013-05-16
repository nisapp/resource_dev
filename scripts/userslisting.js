
function delpro(id){
var baseurl = $("#baseurl").val();
$("#infomessage").css('display','block');
$("#del_yes").prop("href", baseurl+"admin/users/deleteuser/"+id)
}
function no_del(){
$("#infomessage").css('display','none');
}
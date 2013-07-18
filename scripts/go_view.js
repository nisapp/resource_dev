$(document).ready(function() {
    var form_sub = false;
    /*$("body").mouseover(function() {
        if (!form_submit) {
            if($("#pl_isset").val()==="yes"){
            $("#pl_subscribe").submit();
            }
            form_submit = true;
        }
    });//*/
    form_submit(form_sub);
});
function form_submit(param) {
    if (!param) {
        if ($("#pl_isset").val() === "yes") {
            $("#pl_subscribe").submit();
        }
        form_submit = true;
    }
}
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
    $("#save_affiliate_id").submit(function(){
        if($("#save_affiliate_id input[type='text']").val()===''||
                $("#save_affiliate_id input[type='text']").val()==='Enter Program Affiliate ID Here'){
            alert("Affiliate ID can't be empty!");
            return false;
        }
    });
});
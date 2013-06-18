$(document).ready(function(){
    $('.first_element').click(function(){
        //alert('thats it.');
        $(this).parent().toggleClass("selected_row");
    });
    $("#delete_selection").click(function(){
        //alert($(".selected_row"));
        $selection = $(".selected_row");
        if($selection.length===0){
            alert("You don't have selected rows.");
            return;
        }
        var rows = [];
        for(var i=0;i<$selection.length;++i){
            rows.push($($selection[i]).children(":first").val());
        }
        var string = rows.join('/');
        $("#selected_rows").val(string);
        $("#seldcted_rows_form").submit();
    });
    $("#header_first_element").click(function(){
        return;
        if($('.selected_row .first_element').length>0){
            if($('.selected_row').length<$('.first_element').length){
                 $('.selected_row').removeClass('selected_row');
                 var $rows = $('.first_element');
                 for(var i=0;i<$rows.length;++i){
                     $($rows[i]).parent().toggleClass('selected_row');
                 }
            }
            else{
                var $rows = $('.first_element');
                for(var i=0;i<$rows.length;++i){
                    $($rows[i]).parent().toggleClass('selected_row');
                }
            }
        }
        else{
            var $rows = $('.first_element');
            for(var i=0;i<$rows.length;++i){
                $($rows[i]).parent().toggleClass('selected_row');
            }
        }
    });
});


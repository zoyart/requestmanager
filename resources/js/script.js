// Выбрать все чек боксы на странице
$('#select_all').click(function () {
    if (!$('#select_all').is(":checked")) {
        $('.checkbox').prop({"checked": false});
    } else {
        $('.checkbox').prop({"checked": true});
    }
});
$('.checkbox').click(function (){
    if (!$('.checkbox').is(":checked")) {
        $('#select_all').prop({"checked": false});
    }
});

// Поиск по таблице
$(document).ready(function(){
    $("#search").keyup(function(){
        _this = this;
        $.each($("#table tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
});




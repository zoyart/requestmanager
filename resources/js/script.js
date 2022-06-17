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

// Множественное редактирование на странице
// var elements = [];
// $('.edit').click(function () {
//     $('.table_items').each(function (){
//         if ($(this).find('.checkbox').is(":checked")) {
//             elements.push($(this).find('.checkbox').val());
//         }
//     });
//     $.ajax({
//         url: "price-list/3/edit",
//         type: "GET",
//         data: {"company_id": 1, "elements": elements, "id": 3},
//         headers: {
//             'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
// });
// console.log(elements);

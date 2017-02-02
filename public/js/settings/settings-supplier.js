$(function(){
    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li.active').removeClass('active');
    $('#my_navbar2 ul li a[href="settings-supplier.php"]').parent().addClass('active');

    $('body').on("click",'.edit_btn' , function(evt){
        evt.preventDefault();
        $('#supplier_edit_modal').modal('show');
    });

    $('body').on("click",'.delete_btn' , function(evt){
        evt.preventDefault();
        $('#confirm_modal').modal('show');
    });


});
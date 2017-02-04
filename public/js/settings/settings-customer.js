
$(function(){

    $("body").on("click", '.edit_btn' , function(evt){
        evt.preventDefault();



        $("#customer_edit_modal").modal("show");
    });

    /*---------------End of Ajax Script-----------------*/



    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li.active').removeClass('active');
    $('#my_navbar2 ul li a[href="settings-customer.php"]').parent().addClass('active');




    $('body').on("click",'.delete_btn' , function(evt){
        evt.preventDefault();
        $('#confirm_modal').modal('show');
    });

});
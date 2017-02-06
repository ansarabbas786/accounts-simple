$(function () {



    $('body').on("click" , function(evt){
        evt.preventDefault();

        // new notification text can be changed here
        // $('#notification_text').html();
        $('#notification').slideDown('fast' , function(){
            setTimeout(function(){
                $('#notification').slideUp();
            } , 2000);
        });
    });


    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li.active').removeClass('active');
    $('#my_navbar2 ul li a[href="settings-payroll.php"]').parent().addClass('active');

    $('body').on("click", '.edit_btn', function (evt) {
        evt.preventDefault();
        $('#payroll_edit_modal').modal("show");
    });

    $('body').on("click", '.delete_btn', function (evt) {
        evt.preventDefault();
        $('#confirm_modal').modal("show");
    });

    $('.date_input').datepicker({
        dateFormat: 'dd/mm/yy'
    });

    $('body').on('focus', ".date_input", function () {
        $(this).datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });

})
;
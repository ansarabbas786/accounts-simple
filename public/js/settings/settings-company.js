$(function(){
    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li a[href="settings-company.php"]').parent().addClass('active');



    $('.date_input').datepicker({
        dateFormat: 'dd/mm/yy'
    });

    $('body').on('focus',".date_input", function(){
        $(this).datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });

    $('body').on("click",'.dropdown_parent li ul li' , function(){

        var list_value = $(this).text();
        $(this).closest('.dropdown_parent').find('li a.dropdown-toggle').html(list_value + "<span class='glyphicon glyphicon-arrow-down'></span>");
        $(this).closest('.dropdown_parent').parent().find('input').val(list_value);
    });

    $('#yes').click(function(){
        $('.vat_hidden').slideDown();
    });

    $('#no').click(function(){
        $('.vat_hidden').slideUp();
    });

    $('.company_form .business_upload_field').change( function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $(".business_logo").attr('src',URL.createObjectURL(event.target.files[0]));
    });

});

$(function () {

    /**
     * Start of company update logic here
     */

    $('#company-update-form').submit(function (evt) {
        evt.preventDefault();

        /*   if (!$(this).valid()) {
         return;
         }*/

        var form = $('#company-update-form');
        var btn = $(this).find('button[type="submit"]');

        var formData = new FormData(form[0]);

        showSpiner(btn);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    showMessage(response.message);
                    hideSpinner(btn);
                } else {
                    showMessage(response.message);
                    hideSpinner(btn);
                }
            },
            error: function (xhr, status, error) {

                showMessage('Error: ' + error);
            },
            complete: function (respose) {
                hideMessage();
            }
        });
    });


    /**
     * Start of vat logic
     */

    var status = $('#vat-db-status').data('vatstatus');

    //update the form based on the vat status
    if (parseInt(status) == 1) {
        $('#yes').attr('checked', 'checked');
        $('.vat_hidden').slideDown();


        //update the vat list value coming from the database
        var list_value = $('#vat_scheme').val();
        $('.dropdown_parent li ul li').closest('.dropdown_parent').find('li a.dropdown-toggle').html(list_value + "<span class='glyphicon glyphicon-arrow-down'></span>");

    } else {

        $('#no').attr('checked', 'checked');
        $('input[name="vat_reg_no"]').val('').attr('autofocus', 'autofocus');
        $('.dropdown_parent li ul li').closest('.dropdown_parent').find('li a.dropdown-toggle').html('VAT CASH ACCOUNTING ' + "<span class='glyphicon glyphicon-arrow-down'></span>");

    }

    /**
     * End of Vat logic
     */



    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li a[href="settings-company.php"]').parent().addClass('active');

    $('.date_input').datepicker({
        dateFormat: 'dd/mm/yy'
    });

    $('body').on('focus', ".date_input", function () {
        $(this).datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });

    $('body').on("click", '.dropdown_parent li ul li', function () {

        var list_value = $(this).text();
        $(this).closest('.dropdown_parent').find('li a.dropdown-toggle').html(list_value + "<span class='glyphicon glyphicon-arrow-down'></span>");
        $(this).closest('.dropdown_parent').parent().find('input').val(list_value);
    });

    $('#yes').click(function () {
        $('.vat_hidden').slideDown();
    });

    $('#no').click(function () {
        $('.vat_hidden').slideUp();
    });

    $('.company_form .business_upload_field').change(function (event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $(".business_logo").attr('src', URL.createObjectURL(event.target.files[0]));
    });
});

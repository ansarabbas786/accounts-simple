$(function () {

    /*================================START OF Validation LOGIC====================================*/

    var rules = {
        name: {
            required: true,
            maxlength: 50,
        },
        credit_limit: {
            required: true,
            number: true
        },
        payment_due: {
            required: true,
            number: true
        },
        payment_terms: {
            maxlength: 100
        },
        line1: {maxlength: 50},
        line2: {maxlength: 50},
        town: {maxlength: 25},
        city: {maxlength: 25},
        logo: {
            required: true,
            extension: 'jpg|png|gif|jpeg'
        },
        post_code: {
            regex: /^(GIR 0AA)|((([A-Z-[QVX]][0-9][0-9]?)|(([A-Z-[QVX]][A-Z-[IJZ]][0-9][0-9]?)|(([A-Z-[QVX]][0-9][A-HJKPSTUW])|([A-Z-[QVX]][A-Z-[IJZ]][0-9][ABEHMNPRVWXY])))) [0-9][A-Z-[CIKMOV]]{2})$/,
        },
        country: {maxlength: 50},
        fax: {maxlength: 11},
        email: {email: true, required: true},
        website: {url: true},
        registration_no: {maxlength: 8},
        acc_name: {maxlength: 50},
        bank_name: {maxlength: 20},
        'ni_number[]': {
            regex_ni: /^[a-zA-Z]{2}[\d]{6}[a-zA-Z]$/,
        },

        telephone: {maxlength: 11},
        mobile: {maxlength: 11},

    }

    //added a validator method to add regex functionality
    $.validator.addMethod("regex", function (value, element, regexpr) {
            return regexpr.test(value);
        },
        "enter valid post code");

    //added a validator method to add regex functionality
    $.validator.addMethod("regex_ni", function (value, element, regexpr) {
            return regexpr.test(value);
        },
        "enter valid N.I.N.O");


    $('#company-update-form').validate({
        rules: rules
    });

    /**
     * Start of company update logic here
     */

    $('#company-update-form').submit(function (evt) {
        evt.preventDefault();

        if (!$(this).valid()) {
            return false;
        }


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

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
        post_code: {
            regex: /^(GIR 0AA)|((([A-Z-[QVX]][0-9][0-9]?)|(([A-Z-[QVX]][A-Z-[IJZ]][0-9][0-9]?)|(([A-Z-[QVX]][0-9][A-HJKPSTUW])|([A-Z-[QVX]][A-Z-[IJZ]][0-9][ABEHMNPRVWXY])))) [0-9][A-Z-[CIKMOV]]{2})$/,
        },
        country: {maxlength: 50},
        fax: {maxlength: 11},
        email: {email: true, required: true},
        website: {url: true},
        telephone: {maxlength: 11},
        mobile: {maxlength: 11},

    }

    //added a validator method to add regex functionality
    $.validator.addMethod("regex", function (value, element, regexpr) {
            return regexpr.test(value);
        },
        "enter valid post code");


    $('#employee_new_form').validate({
        rules: rules
    });
    $('#employee-update-form').validate({
        rules: rules
    });

    /*================================End OF Validation LOGIC====================================*/
    /*================================START OF Employee BANK LOGIC====================================*/
    //get last id in the list increment and add to the update form field
    $('#new_btn').click(function () {
        var lastInsertedId = Number($('#employee_list_body tr').last().find('td.employee-id').text());
        var num = lastInsertedId + 1;
        $('#employee-id').val(formatNumber(num, 5));
    });


    $('#employee_new_form').submit(function (evt) {
        evt.preventDefault();

        if (!$(this).valid()) {
            return;
        }

        var form = $(this);
        var btn = $(this).find('button[type="submit"]');
        var formObj = this;
     
        showSpiner(btn);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {

                    $('#new_payroll_modal').modal('hide');
                    hideSpinner(btn);
                    showMessage(response.message);


                    var tr = '<tr><td class="forname text-center" hidden>' + $(formObj.forname).val() + '</td>'
                        + '<td class="dob text-center" hidden>' + $(formObj.dob).val() + '</td>'
                        + '<td class="gender text-center" hidden>' + $(formObj.gender).val() + '</td>'
                        + '<td class="line1 text-center" hidden>' + $(formObj.line1).val() + '</td>'
                        + '<td class="line2 text-center" hidden>' + $(formObj.line2).val() + '</td>'
                        + '<td class="town text-center" hidden>' + $(formObj.town).val() + '</td>'
                        + '<td class="city text-center" hidden>' + $(formObj.city).val() + '</td>'
                        + '<td class="post-code text-center" hidden>' + $(formObj.post_code).val() + '</td>'
                        + '<td class="telephone text-center" hidden>' + $(formObj.telephone).val() + '</td>'
                        + '<td class="email text-center" hidden>' + $(formObj.email).val() + '</td>'
                        + '<td class="notes text-center" hidden>' + $(formObj.notes).val() + '</td>'
                        + '<td class="bank-name text-center" hidden>' + $(formObj.bank_name).val() + '</td>'
                        + '<td class="acc-number text-center" hidden>' + $(formObj.acc_number).val() + '</td>'
                        + '<td class="sort-code text-center" hidden>' + $(formObj.sort_code).val() + '</td>'
                        + '<td class="acc_name text-center" hidden>' + $(formObj.acc_name).val() + '</td>'
                        + '<td class="employee-id text-center">' + $(formObj.employee_id).val() + '</td>'
                        + '<td class="surname text-left">' + $(formObj.surname).val() + '</td>'
                        + '<td class="ni-number text-center">' + $(formObj.ni_number).val() + '</td>'
                        + '<td class="start-date text-center">' + $(formObj.start_date).val() + '</td>'
                        + '<td class="leaving-date text-center">' + $(formObj.leaving_date).val() + '</td>'
                        + '<td class="text-center">'
                        + '<button data-toggle="modal" data-employeeid="' + $(formObj.employee_id).val() + '" class="btn btn-primary edit_btn">EDIT</button>'
                        + '<button data-toggle="modal" data-id="' + $(formObj.employee_id).val() + '" class="btn btn-primary delete_btn">DELETE</button>'
                        + '</td></tr>';

                    $('#employee_list_body').append(tr);
                } else {
                    showMessage(response.message);
                }

            },
            error: function (xhr, status, error) {
                showMessage(status.toUpperCase() + ': ' + error, 'text-danger');
            },
            complete: function (response) {

            }
        });

    });

    /*================================END OF NEW BANK LOGIC====================================*/


    $('body').on("click", '.edit_btn', function (evt) {
        evt.preventDefault();
        $('#payroll_edit_modal').modal("show");
    });

    $('body').on("click", '.delete_btn', function (evt) {
        evt.preventDefault();
        $('#confirm_modal').modal("show");
    });


    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li.active').removeClass('active');
    $('#my_navbar2 ul li a[href="settings-payroll.php"]').parent().addClass('active');


    $('.date_input').datepicker({
        dateFormat: 'dd/mm/yy'
    });

    $('body').on('focus', ".date_input", function () {
        $(this).datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });

});
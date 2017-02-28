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
        telephone: {maxlength: 11},
        sort_code: {
            regex_sort_code: /^\d{2}-\d{2}-\d{2}$/
        }
    }

    //added a validator method to add regex functionality
    $.validator.addMethod("regex", function (value, element, regexpr) {
            return regexpr.test(value);
        },
        "enter valid post code");
    //added a validator method to add regex functionality
    $.validator.addMethod("regex_sort_code", function (value, element, regexpr) {
            return regexpr.test(value);
        },
        "enter valid sort code");


    $('#employee-update-form').validate({
        rules: rules
    });

    $('#employee_new_form').validate({
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


    /*=============================Start OF Edit LOGIC=================================*/

    $edit_btn = '';

    $("body").on("click", '.edit_btn', function (evt) {
        evt.preventDefault();


        $edit_btn = $(this);
        var tr = $(this).parent().parent();
        var form = $('#employee-update-form');

        var surname = tr.find('td.surname').text();
        var forname = tr.find('td.forname').text();
        var credit_limit = tr.find('td.credit-limit').text();
        var employee_id = tr.find('td.employee-id').text();
        var payment_due = tr.find('td.payment-due').text();
        var payment_terms = tr.find('td.payment-terms').text();
        var dob = tr.find('td.dob').text();
        var start_date = tr.find('td.start-date').text();
        var leaving_date = tr.find('td.leaving-date').text();
        var gender = tr.find('td.gender').text();
        var line1 = tr.find('td.line1').text();
        var line2 = tr.find('td.line2').text();
        var town = tr.find('td.town').text();
        var city = tr.find('td.city').text();
        var country = tr.find('td.country').text();
        var email = tr.find('td.email').text();
        var contact_name = tr.find('td.contact-name').text();
        var company_name = tr.find('td.company-name').text();
        var acc_name = tr.find('td.acc-name').text();
        var acc_number = tr.find('td.acc-number').text();
        var bank_name = tr.find('td.bank-name').text();
        var acc_no = tr.find('td.acc-no').text();
        var mobile = tr.find('td.mobile').text();
        var post_code = tr.find('td.post-code').text();
        var sort_code = tr.find('td.sort-code').text();
        var telephone = tr.find('td.telephone').text();
        var notes = tr.find('td.notes').text();
        var ni_number = tr.find('td.ni-number').text();

        if (gender == 'f') {
            $('.male').prop('checked', false);
            $('.female').prop('checked', true);
        }


        form.find('input[name="surname"]').val(surname);
        form.find('input[name="forname"]').val(forname);
        form.find('input[name="dob"]').val(dob);
        form.find('input[name="employee_id"]').val(formatNumber(employee_id, 5));
        form.find('input[name="payment_due"]').val(payment_due);
        form.find('textarea[name="payment_terms"]').val(payment_terms);
        form.find('input[name="line1"]').val(line1);
        form.find('input[name="post_code"]').val(post_code);
        form.find('input[name="sort_code"]').val(sort_code);
        form.find('input[name="line2"]').val(line2);
        form.find('input[name="town"]').val(town);
        form.find('input[name="city"]').val(city);
        form.find('input[name="country"]').val(country);
        form.find('input[name="email"]').val(email);
        form.find('input[name="company_name"]').val(company_name);
        form.find('input[name="acc_name"]').val(acc_name);
        form.find('input[name="contact_name"]').val(contact_name);
        form.find('input[name="bank_name"]').val(bank_name);
        form.find('input[name="acc_number"]').val(acc_number);
        form.find('input[name="mobile"]').val(mobile);
        form.find('textarea[name="notes"]').val(notes);
        form.find('input[name="ni_number"]').val(ni_number);
        form.find('input[name="telephone"]').val(telephone);
        form.find('input[name="start_date"]').val(start_date);
        form.find('input[name="leaving_date"]').val(leaving_date);

        $("#payroll_edit_modal").modal("show");
    });

    $('#employee-update-form').submit(function (evt) {
        evt.preventDefault();


        if (!$(this).valid()) {
            return 0;
        }

        var form = $(this);
        var btn = $(this).find('button[type="submit"]');
        var formObj = this;
        var tr = $edit_btn.parent().parent();

        showSpiner(btn);
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {

                if (response.success) {

                    tr.find('td.surname').text($(formObj.surname).val());
                    tr.find('td.forname').text($(formObj.forname).val());
                    tr.find('td.employee-id').text($(formObj.employee_id).val());

                    //TODO: gender & dob
                    tr.find('td.dob').text($(formObj.dob).val());
                    tr.find('td.gender').text($(formObj.gender).val());


                    tr.find('td.line1').text($(formObj.line1).val());
                    tr.find('td.line2').text($(formObj.line2).val());
                    tr.find('td.town').text($(formObj.town).val());
                    tr.find('td.city').text($(formObj.city).val());
                    tr.find('td.post-code').text($(formObj.post_code).val());
                    tr.find('td.telephone').text($(formObj.telephone).val());
                    tr.find('td.email').text($(formObj.email).val());

                    tr.find('td.ni_no').text($(formObj.ni_number).val());

                    //TODO: start date end date :)
                    tr.find('td.start-date').text($(formObj.start_date).val());
                    tr.find('td.leaving-date').text($(formObj.leaving_date).val());

                    tr.find('td.notes').text($(formObj.notes).val());
                    tr.find('td.bank-name').text($(formObj.bank_name).val());
                    tr.find('td.acc-name').text($(formObj.acc_name).val());
                    tr.find('td.acc-number').text($(formObj.acc_number).val());
                    tr.find('td.sort-code').text($(formObj.sort_code).val());

                    showMessage(response.message);
                    $('#payroll_edit_modal').modal('hide');
                    form.trigger('reset');
                } else {
                    showMessage('Something went wrong please refresh your page!');
                }
            },
            complete: function () {
                hideSpinner(btn);
                $('#payroll_edit_modal').modal('hide');
            }
        });
    });


    /*=======================================End of Updation Logic===========================*/


    /*================================END OF NEW BANK LOGIC====================================*/


    $('body').on("click", '.edit_btn', function (evt) {
        evt.preventDefault();
        $('#payroll_edit_modal').modal("show");
    });

    /*=============================Start of deletion logic====================================*/

    $('.delete_btn').on('click', function (evt) {
        evt.preventDefault();

        delete_btn = $(this);

        var employee_id = $(this).data('id');

        $('#confirm_delete_form #id').val(employee_id);

        $('#confirm_modal').modal("show");
    });

    $('#confirm_delete_form').submit(function (evt) {
        evt.preventDefault();

        var form = $(this);
        var btn = $(this).find('button[type="submit"]');

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    delete_btn.parent().parent().remove();
                    showMessage('<h2 class="text-danger">Supplier deleted.</h2>');
                } else {
                    showMessage('Error: Please refresh your page!', 'text-danger');
                }
            },
            error: function (xhr, status, error) {
                showMessage('Error: ' + error.message);
            },
            complete: function () {
                hideSpinner(btn);
                $('#confirm_modal').modal('hide');
            }
        });

        showSpiner(btn);
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
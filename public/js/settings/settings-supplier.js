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


    $('#new_supplier_form').validate({
        rules: rules
    });
    $('#supplier_update_form').validate({
        rules: rules
    });

    /*================================End OF Validation LOGIC====================================*/


    /*================================START OF NEW Supplier LOGIC====================================*/


    //get last id in the list increment and add to the update form field
    $('#new-btn').click(function () {
        var lastInsertedId = Number($('#supplier_list_body tr').last().find('td.supplier-id').text());
        var num = lastInsertedId + 1;
        console.log(num);
        console.log('done');

        $('#supplier-id').val(formatNumber(num, 5));
    });

    $('#new_supplier_form').submit(function (evt) {
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
                    var tr = '<tr><td class="company-name">' + $(formObj.company_name).val() + '</td>'
                        + '<td class="supplier-id text-center">' + $(formObj.acc_ref).val() + ' </td> '
                        + '<td class="contact-name">' + $(formObj.contact_name).val() + '</td>'
                        + '<td class="telephone">' + $(formObj.telephone).val() + ' </td>'
                        + '<td class="text-center">'
                        + '<button data-toggle="modal" data-supplierid="' + $(formObj.acc_ref).val() + '"class="btn btn-primary edit_btn">EDIT</button>   '
                        + ' <button data-toggle="modal" data-id="' + $(formObj.acc_ref).val() + '" class="btn btn-primary delete_btn">DELETE</button></td></tr>';

                    $('#supplier_list_body').append(tr);
                    showMessage(response.message);
                    $('#supplier_new_modal').modal('hide');
                }
            },
            complete: function () {
                hideSpinner(btn);
            }
        });

    });


    /*================================END OF NEW Supplier LOGIC====================================*/


    /*=============================Start OF Edit LOGIC=================================*/

    $edit_btn = '';

    $("body").on("click", '.edit_btn', function (evt) {
        evt.preventDefault();


        $edit_btn = $(this);
        var tr = $(this).parent().parent();
        var form = $('#supplier_update_form');

        var credit_limit = tr.find('td.credit-limit').text();
        var supplier_id = tr.find('td.supplier-id').text();
        var payment_due = tr.find('td.payment-due').text();
        var payment_terms = tr.find('td.payment-terms').text();
        var line1 = tr.find('td.line1').text();
        var line2 = tr.find('td.line2').text();
        var town = tr.find('td.town').text();
        var city = tr.find('td.city').text();
        var country = tr.find('td.country').text();
        var email = tr.find('td.email').text();
        var contact_name = tr.find('td.contact-name').text();
        var company_name = tr.find('td.company-name').text();
        var acc_name = tr.find('td.acc-name').text();
        var bank_name = tr.find('td.bank-name').text();
        var acc_no = tr.find('td.acc-no').text();
        var mobile = tr.find('td.mobile').text();
        var post_code = tr.find('td.post-code').text();
        var sort_code = tr.find('td.sort-code').text();
        var telephone = tr.find('td.telephone').text();

        form.find('input[name="credit_limit"]').val(credit_limit);
        form.find('input[name="supplier_id"]').val(formatNumber(supplier_id, 5));
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
        form.find('input[name="acc_no"]').val(acc_no);
        form.find('input[name="mobile"]').val(mobile);
        form.find('input[name="telephone"]').val(telephone);

        $("#supplier_edit_modal").modal("show");
    });

    $('#supplier_update_form').submit(function (evt) {
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

                    tr.find('td.credit-limit').text($(formObj.credit_limit).val());
                    tr.find('td.supplier-id').text($(formObj.supplier_id).val());
                    tr.find('td.payment-due').text($(formObj.payment_due).val());
                    tr.find('td.payment-terms').text($(formObj.payment_terms).val());
                    tr.find('td.line1').text($(formObj.line1).val());
                    tr.find('td.line2').text($(formObj.line2).val());
                    tr.find('td.town').text($(formObj.town).val());
                    tr.find('td.city').text($(formObj.city).val());
                    tr.find('td.country').text($(formObj.country).val());
                    tr.find('td.email').text($(formObj.email).val());
                    tr.find('td.contact-name').text($(formObj.contact_name).val());
                    tr.find('td.company-name').text($(formObj.company_name).val());
                    tr.find('td.acc-name').text($(formObj.acc_name).val());
                    tr.find('td.bank-name').text($(formObj.bank_name).val());
                    tr.find('td.acc-no').text($(formObj.acc_no).val());
                    tr.find('td.mobile').text($(formObj.mobile).val());
                    tr.find('td.post-code').text($(formObj.post_code).val());
                    tr.find('td.sort-code').text($(formObj.sort_code).val());
                    tr.find('td.telephone').text($(formObj.telephone).val());
                    showMessage(response.message);
                    $('#supplier_edit_modal').modal('hide');
                    form[0].reset();
                } else {
                    showMessage('Something went wrong please refresh your page!');
                }
            },
            complete: function () {
                hideSpinner(btn);
            }
        });
    });


    /*=======================================End of Updation Logic===========================*/


    /*=============================START OF DELETION LOGIC=================================*/


    var delete_btn = '';

    //opening confirm modal box on delete click and setting the id as hidden
    $('body').on("click", '.delete_btn', function (evt) {
        evt.preventDefault();

        delete_btn = $(this);

        var supplier_id = $(this).data('id');

        $('#confirm_delete_form #id').val(supplier_id);

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

    /*=============================END OF DELETION LOGIC=================================*/


    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li.active').removeClass('active');
    $('#my_navbar2 ul li a[href="settings-supplier.php"]').parent().addClass('active');

    $('body').on("click", '.edit_btn', function (evt) {
        evt.preventDefault();
        $('#supplier_edit_modal').modal('show');
    });

    $('body').on("click", '.delete_btn', function (evt) {
        evt.preventDefault();
        $('#confirm_modal').modal('show');
    });


});
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


    $('#new_customer_form').validate({
        rules: rules
    });
    $('#update_customer_form').validate({
        rules: rules
    });

    /*================================End OF Validation LOGIC====================================*/


    /*================================START OF NEW CUSTOMER LOGIC====================================*/
    //get last id in the list increment and add to the update form field
    $('#new_btn').click(function () {
        var lastInsertedId = Number($('#customer_list_body tr').last().find('td.customer-id').text());
        var num = lastInsertedId + 1;

        $('#customer_id').val(formatNumber(num, 5));
    });

    $('#new_customer_form').submit(function (evt) {
        evt.preventDefault();

        if (!$(this).valid()) {
            return;
        }

        var form = $(this);
        var formObj = this;
        var btn = $(this).find('button[type="submit"]');

        showSpiner(btn);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {

                if (response.success) {

                    var tr = '<tr><td hidden class="credit-limit">' + $(formObj.credit_limit).val() + '</td>'
                        + '<td hidden class="payment-due">' + $(formObj.payment_due).val() + '</td>'
                        + '<td hidden class="payment-terms">' + $(formObj.payment_terms).val() + '</td>'
                        + '<td hidden class="line1">' + $(formObj.line1).val() + '</td>'
                        + '<td hidden class="line2">' + $(formObj.line2).val() + '</td>'
                        + '<td hidden class="town">' + $(formObj.town).val() + '</td>'
                        + '<td hidden class="city">' + $(formObj.city).val() + '</td>'
                        + '<td hidden class="post-code">' + $(formObj.post_code).val() + '</td>'
                        + '<td hidden class="country">' + $(formObj.country).val() + '</td>'
                        + '<td hidden class="fax">' + $(formObj.fax).val() + '</td>'
                        + '<td hidden class="email">' + $(formObj.email).val() + '</td>'
                        + '<td hidden class="website">' + $(formObj.website).val() + '</td>'
                        + '<td class="name text-center">' + $(formObj.name).val() + '</td>'
                        + '<td class="customer-id text-center">' + formatNumber($(formObj.customer_id).val(), 5) + '</td>'
                        + '<td class="telephone text-center">' + $(formObj.telephone).val() + '</td>'
                        + '<td class="mobile text-center">' + $(formObj.mobile).val() + '</td>'
                        + '<td class="text-center"><button data-customerid="' + $(formObj.customer_id).val() + '" class="btn btn-primary edit_btn">EDIT</button>   '
                        + ' <button class="btn btn-primary delete_btn" data-id="' + $(formObj.customer_id).val() + '">DELETE</button></td></tr>';
                    $('#customer_list_body').append(tr);
                    showMessage(response.message);
                    hideSpinner(btn);
                    form[0].reset();
                    $('#customer_new_modal').modal('hide');
                } else {
                    $('#customer_new_modal').modal('hide');
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

    /*================================END OF NEW CUSTOMER LOGIC====================================*/


    /*=============================START OF DELETION LOGIC=================================*/


    var delete_btn = '';

    //opening confirm modal box on delete click and setting the id as hidden
    $('body').on("click", '.delete_btn', function (evt) {
        evt.preventDefault();

        delete_btn = $(this);

        var customer_id = $(this).data('id');

        $('#confirm_delete_form #id').val(customer_id);

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
                    showMessage('<h2 class="text-danger">Analysis deleted.</h2>');
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


    /*=============================Start OF Edit LOGIC=================================*/


    var edit_btn = '';
    $("body").on("click", '.edit_btn', function (evt) {
        evt.preventDefault();

        edit_btn = $(this);
        var tr = $(this).parent().parent();
        var form = $('#update_customer_form');

        var credit_limit = tr.find('td.credit-limit').text();
        var customer_id = tr.find('td.customer-id').text();
        var payment_due = tr.find('td.payment-due').text();
        var payment_terms = tr.find('td.payment-terms').text();
        var line1 = tr.find('td.line1').text();
        var line2 = tr.find('td.line2').text();
        var town = tr.find('td.town').text();
        var city = tr.find('td.city').text();
        var country = tr.find('td.country').text();
        var fax = tr.find('td.fax').text();
        var email = tr.find('td.email').text();
        var website = tr.find('td.website').text();
        var name = tr.find('td.name').text();
        var mobile = tr.find('td.mobile').text();
        var post_code = tr.find('td.post-code').text();
        var telephone = tr.find('td.telephone').text();

        form.find('input[name="credit_limit"]').val(credit_limit);
        form.find('input[name="customer_id"]').val(customer_id);
        form.find('input[name="payment_due"]').val(payment_due);
        form.find('textarea[name="payment_terms"]').val(payment_terms);
        form.find('input[name="line1"]').val(line1);
        form.find('input[name="post_code"]').val(post_code);
        form.find('input[name="line2"]').val(line2);
        form.find('input[name="town"]').val(town);
        form.find('input[name="city"]').val(city);
        form.find('input[name="country"]').val(country);
        form.find('input[name="fax"]').val(fax);
        form.find('input[name="email"]').val(email);
        form.find('input[name="website"]').val(website);
        form.find('input[name="name"]').val(name);
        form.find('input[name="mobile"]').val(mobile);
        form.find('input[name="telephone"]').val(telephone);

        $("#customer_edit_modal").modal("show");
    });

    $('#update_customer_form').submit(function (evt) {
        evt.preventDefault();
        if (!$(this).valid()) {
            return 0;
        }

        var form = $(this);
        var btn = $(this).find('button[type="submit"]');
        var formObj = this;
        var tr = edit_btn.parent().parent();

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
                    tr.find('td.website').text($(formObj.website).val());
                    tr.find('td.fax').text($(formObj.fax).val());
                    tr.find('td.country').text($(formObj.country).val());
                    tr.find('td.email').text($(formObj.email).val());
                    tr.find('td.name').text($(formObj.name).val());
                    tr.find('td.mobile').text($(formObj.mobile).val());
                    tr.find('td.post-code').text($(formObj.post_code).val());
                    tr.find('td.sort-code').text($(formObj.sort_code).val());
                    tr.find('td.telephone').text($(formObj.telephone).val());
                    showMessage(response.message);
                    $('#customer_edit_modal').modal('hide');
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


    /*---------------End of Ajax Script-----------------*/


    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li.active').removeClass('active');
    $('#my_navbar2 ul li a[href="settings-customer.php"]').parent().addClass('active');


    $('body').on("click", '.delete_btn', function (evt) {
        evt.preventDefault();
        $('#confirm_modal').modal('show');
    });

});
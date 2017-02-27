$(function () {

    /*================================START OF VALIDATION  LOGIC====================================*/

    var rules = {
        acc_name: "required",
        sort_code: "required",
        acc_no: "required",
        bank_name: "required",
        start_balance: {
            required: true,
            number: true
        },
        telephone: "required",
        email: {
            required: true,
            email: true
        }
    };

    $('#new_bank_form').validate({
        rules: rules,
    });

    $('#update_bank_form').validate({
        rules: rules
    });

    /*================================START OF VALIDATION  LOGIC====================================*/


    /*================================START OF NEW BANK LOGIC====================================*/
    //get last id in the list increment and add to the update form field
    $('#new_btn').click(function () {
        var lastInsertedId = Number($('#bank_list_body tr').last().find('td.bank_id').text());
        var num = lastInsertedId + 1;
        $('#bank_id').val(formatNumber(num, 5));
    });


    $('#new_bank_form').submit(function (evt) {
        evt.preventDefault();

        if (!$(this).valid()) {
            return;
        }

        var form = $(this);
        var btn = $(this).find('button[type="submit"]');

        showSpiner(btn);

        var acc_name = $(this).find('input[name="acc_name"]').val();
        var bank_id = $(this).find('input[name="bank_id"]').val();
        var sort_code = $(this).find('input[name="sort_code"]').val();
        var acc_no = $(this).find('input[name="acc_no"]').val();
        var bank_name = $(this).find('input[name="bank_name"]').val();
        var start_balance = $(this).find('input[name="start_balance"]').val();
        var line1 = $(this).find('input[name="line1"]').val();
        var line2 = $(this).find('input[name="line2"]').val();
        var town = $(this).find('input[name="town"]').val();
        var city = $(this).find('input[name="city"]').val();
        var country = $(this).find('input[name="country"]').val();
        var post_code = $(this).find('input[name="post_code"]').val();
        var contact_name = $(this).find('input[name="contact_name"]').val();
        var contact_tel = $(this).find('input[name="contact_tel"]').val();
        var fax = $(this).find('input[name="fax"]').val();
        var email = $(this).find('input[name="email"]').val();
        var notes = $(this).find('textarea[name="notes"]').val();

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {

                    $('#bank_new_modal').modal('hide');
                    hideSpinner(btn);
                    showMessage(response.message);

                    var tr = '<tr><td class="acc-name">' + acc_name + '</td>'
                        + '<td class="text-center reference">' + formatNumber(bank_id, 5) + '</td>'
                        + '<td class="sort-code">' + sort_code + '</td>'
                        + '<td class="acc-no">' + acc_no + '</td>'
                        + '<td hidden class="bank-name">' + bank_name + '</td>'
                        + '<td hidden class="start-balance">' + start_balance + '</td>'
                        + '<td hidden class="lin1">' + line1 + '</td>'
                        + '<td hidden class="lin2">' + line2 + '</td>'
                        + '<td hidden class="town">' + town + '</td>'
                        + '<td hidden class="city">' + city + '</td>'
                        + '<td hidden class="country">' + country + '</td>'
                        + '<td hidden class="post-code">' + post_code + '</td>'
                        + '<td hidden class="contact">' + email + '</td>'
                        + '<td hidden class="notes">' + contact_name + '</td>'
                        + '<td hidden class="contact-tel">' + contact_tel + '</td>'
                        + '<td hidden class="fax">' + fax + '</td>'
                        + '<td hidden class="email">' + email + '   </td>'
                        + '<td hidden class="notes">' + notes + '</td>'
                        + '<td class="text-center">'
                        + '<button data-toggle="modal" data-bankid="' + bank_id + '"'
                        + 'class="btn btn-primary edit_btn">EDIT</button> '
                        + ' <button data-toggle="modal" data-id="' + bank_id + '"'
                        + 'class="btn btn-primary delete_btn">DELETE</button></td></tr>';

                    $('#bank_list_body').append(tr);
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


    /*================================START OF UPDATE BANK LOGIC====================================*/


    /*================================END OF UPDATE BANK LOGIC====================================*/

    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li.active').removeClass('active');
    $('#my_navbar2 ul li a[href="settings-bank.php"]').parent().addClass('active');


    /*=============================START OF UPDATION LOGIC=================================*/


    var update_btn = '';

    $("body").on("click", '.edit_btn', function (evt) {
        evt.preventDefault();

        update_btn = $(this);
        //getting the parent.parent of the click button
        var parent_tr = $(this).parent().parent()

        //getting data from the page td's
        var name = parent_tr.find('td.acc-name').text();
        var acc_name = parent_tr.find('td.acc-name').text();
        var bank_id = parent_tr.find('td.bank_id').text();
        var bank_name = parent_tr.find('td.bank-name').text();
        var acc_no = parent_tr.find('td.acc-no').text();
        var start_balance = parent_tr.find('td.start-balance').text();
        var line1 = parent_tr.find('td.line1').text();
        var line2 = parent_tr.find('td.line2').text();
        var town = parent_tr.find('td.town').text();
        var city = parent_tr.find('td.city').text();
        var country = parent_tr.find('td.country').text();
        var post_code = parent_tr.find('td.post-code').text();
        var contact_name = parent_tr.find('td.contact-name').text();
        var telephone = parent_tr.find('td.telephone').text();
        var fax = parent_tr.find('td.fax').text();
        var email = parent_tr.find('td.email').text();
        var sort_code = parent_tr.find('td.sort-code').text();
        var notes = parent_tr.find('td.notes').text();


        var form = $('#update_bank_form');


        //populating form fields for updating of the analysis
        form.find('input[name="acc_name"]').val(acc_name);
        form.find('input[name="bank_id"]').val(formatNumber(bank_id, 5));
        form.find('input[name="sort_code"]').val(sort_code);
        form.find('input[name="acc_no"]').val(acc_no);
        form.find('input[name="bank_name"]').val(bank_name);
        form.find('input[name="start_balance"]').val(start_balance);
        form.find('input[name="line1"]').val(line1);
        form.find('input[name="line2"]').val(line2);
        form.find('input[name="town"]').val(town);
        form.find('input[name="city"]').val(city);
        form.find('input[name="country"]').val(country);
        form.find('input[name="post_code"]').val(post_code);
        form.find('input[name="contact_name"]').val(contact_name);
        form.find('input[name="telephone"]').val(telephone);
        form.find('input[name="fax"]').val(fax);
        form.find('input[name="email"]').val(email);
        form.find('textarea[name="notes"]').val(notes);

        $('#bank_edit_modal').modal('show');
    });


    $('#update_bank_form').submit(function (evt) {
        evt.preventDefault();

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

                    $('#bank_new_modal').modal('hide');


                    var parent_tr = update_btn.parent().parent();
                    parent_tr.find('.acc-name').text($(formObj.acc_name).val());
                    parent_tr.find('td.bank_id').text($(formObj.bank_id).val());
                    parent_tr.find('td.bank-name').text($(formObj.bank_name).val());
                    parent_tr.find('td.acc-no').text($(formObj.acc_no).val());
                    parent_tr.find('td.start-balance').text($(formObj.start_balance).val());
                    parent_tr.find('td.line1').text($(formObj.line1).val());
                    parent_tr.find('td.line2').text($(formObj.line2).val());
                    parent_tr.find('td.town').text($(formObj.town).val());
                    parent_tr.find('td.city').text($(formObj.city).val());
                    parent_tr.find('td.country').text($(formObj.country).val());
                    parent_tr.find('td.post-code').text($(formObj.post_code).val());
                    parent_tr.find('td.contact-name').text($(formObj.contact_name).val());
                    parent_tr.find('td.contact-tel').text($(formObj.telephone).val());
                    parent_tr.find('td.fax').text($(formObj.fax).val());
                    parent_tr.find('td.email').text($(formObj.email).val());
                    parent_tr.find('td.sort-code').text($(formObj.sort_code).val());
                    parent_tr.find('td.notes').text($(formObj.notes).val());


                    $('#bank_edit_modal').modal('hide');
                    showMessage(response.message);
                } else {
                    showMessage(response.message);
                }
            },
            error: function () {

            },
            complete: function () {
                hideSpinner(btn);
            }
        });

    });


    /*=============================END OF DELETION LOGIC=================================*/


    /*=============================START OF DELETION LOGIC=================================*/


    var delete_btn = '';

    //opening confirm modal box on delete click and setting the id as hidden
    $('body').on("click", '.delete_btn', function (evt) {
        evt.preventDefault();

        delete_btn = $(this);

        var bank_id = $(this).data('bankid');

        $('#confirm_delete_form #id').val(bank_id);

        $('#confirm_modal').modal("show");
    });


    $('#confirm_delete_form').submit(function (evt) {
        evt.preventDefault();

        var form = $(this);
        var btn = $(this).find('button[type="submit"]');

        delete_btn.parent().parent().remove();

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                showMessage('<h2 class="text-danger">Bank deleted successfully!</h2>');
            },
            error: function (response) {

            },
            complete: function () {
                hideSpinner(btn);
                $('#confirm_modal').modal('hide');
            }
        });

        showSpiner(btn);
    });

    /*=============================END OF DELETION LOGIC=================================*/

});
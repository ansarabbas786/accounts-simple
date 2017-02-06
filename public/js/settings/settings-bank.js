$(function () {
    /*================================START OF NEW BANK LOGIC====================================*/

    $('#new_bank_form').submit(function (evt) {
        evt.preventDefault();
        var form = $(this);
        var btn = $(this).find('button[type="submit"]');

        showSpiner(btn);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                console.log(response);
                console.log('response added!');
                $('#new_analysis_modal').modal('hide');
                hideSpinner(btn);
                showMessage('New bank created.');
            },
            error: function (response) {
                console.log(response);
            },
            complete: function (response) {

            }
        });

    });

    /*================================END OF NEW BANK LOGIC====================================*/


    $('#new_plus_btn').on('click', function () {

    });


    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li.active').removeClass('active');
    $('#my_navbar2 ul li a[href="settings-bank.php"]').parent().addClass('active');

    $("body").on("click", '.edit_btn', function (evt) {
        evt.preventDefault();
        $('#bank_edit_modal').modal('show');

    });

    $("body").on("click", '.delete_btn', function (evt) {
        evt.preventDefault();
        $('#confirm_modal').modal('show');

    });


});
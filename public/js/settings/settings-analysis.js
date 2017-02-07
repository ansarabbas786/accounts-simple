$(function () {

    /*==============================START VALIDATION LOGIC ============================*/
    var rules = {name: "required", min: 3};
    var messages = {name: "Name is required!"};

    $('#new_analysis_form').validate({
        rules: rules,
        messages: messages
    });

    $('#analysis_update_form').validate({
        rules: rules
    });

    /*==============================END OF VALIDATION LOGIC ============================*/


    /*=============================START OF NEW ANALYSIS LOGIC=================================*/

    //get last id in the list increment and add to the update form field
    $('#new_btn').click(function () {
        var lastInsertedId = Number($('#analysis_list_body tr').last().find('td.reference').text());
        var num = lastInsertedId + 1;
        $('#reference').val(formatNumber(num, 5));

    });

    //add new record in the analysis
    $('#new_analysis_form').submit(function (evt) {
        evt.preventDefault();

        var btn = $(this).find('button[type="submit"]');
        var form = $(this);

        if (!(form).valid()) {
            return 0;
        }

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serializeArray(),
            success: function (response) {
                if (response > 0) {

                    var reference = $('#reference').val();
                    var name = $('#name').val();

                    //updating the list after record is added in the database
                    $('#analysis_list_body').append(" <tr id='analysis_list'> " +
                        "<td class='reference text-center'>" + reference + "</td> " +
                        "<td class='name'>" + name + "</td> " +
                        "<td class='text-center'><button data-toggle='modal' data-analysisid='" + response + "' class='btn btn-primary edit_btn'>EDIT  </button> " +
                        ' <button data-toggle="modal" data-id="' + response + '" class="btn btn-primary delete_btn"> DELETE </button></td></tr>');

                    form[0].reset();

                } else {
                    console.log('nothing!');
                }
            },
            error: function (error) {
                console.log(error.status);
            },
            complete: function () {

                hideSpinner(btn);
                $('#new_analysis_modal').modal('hide');
                showMessage('New Analysis added.');
            }
        });
        showSpiner(btn);
    });

    /*=============================END OF NEW ANALYSIS LOGIC=================================*/


    /*=============================START OF UPDATION LOGIC=================================*/

    var update_btn = '';
    //populating the form data and displaying it to the user
    $('body').on("click", '.edit_btn', function (evt) {
        evt.preventDefault();

        update_btn = $(this);
        //getting the parent.parent of the click button
        var parent_tr = $(this).parent().parent()

        //getting data from the page td's
        var name = parent_tr.find('td.name').text();
        var ref = parent_tr.find('td.reference').text();
        var analysis_id = $(this).data('analysisid');

        //populating form fields for updating of the analysis
        $('#analysis_update_form #name').val(name);
        $('#analysis_update_form #analysis_id').val(analysis_id);

        //displaying the modal box
        $('#analysis_edit_modal').modal("show");
    });


    $('#analysis_update_form').submit(function (evt) {
        evt.preventDefault();

        if (!$(this).valid()) {
            return 0;
        }

        var form = $(this);
        var btn = $(this).find('button[type="submit"]');
        var name = $('#analysis_update_form #name').val();
        showSpiner(btn);

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (response) {
                update_btn.parent().parent().find('.name').text(name);
                showMessage('Analysis updated.');
            },
            error: function (response) {
                console.log(response);
            },
            complete: function (response) {
                hideSpinner(update_btn);
                $('#analysis_edit_modal').modal('hide');
            }
        });
    });


    /*=============================END OF UPDATION LOGIC=================================*/


    /*=============================START OF DELETION LOGIC=================================*/


    var delete_btn = '';

    //opening confirm modal box on delete click and setting the id as hidden
    $('body').on("click", '.delete_btn', function (evt) {
        evt.preventDefault();

        delete_btn = $(this);

        var analysis_id = $(this).data('id');

        $('#confirm_delete_form #id').val(analysis_id);

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
                showMessage('<h2 class="text-danger">Analysis deleted.</h2>');
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


    /*=============================START OF MISC CODE=================================*/

    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li.active').removeClass('active');
    $('#my_navbar2 ul li a[href="settings-analysis.php"]').parent().addClass('active');

    /*=============================END OF MISC CODE=================================*/
});
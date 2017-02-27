$(function () {


    $('.new_payroll_btn').on('click', function (evt) {
        evt.preventDefault();
        $('#new_payment_modal').modal('show');

    });



    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="payroll.php"]').parent().addClass('active');

    $('body').on("click", '.dropdown_parent li ul li', function () {

        var list_value = $(this).text();
        $(this).closest('.dropdown_parent').find('li a.dropdown-toggle').html(list_value + "<span class='glyphicon glyphicon-arrow-down'></span>");
        $(this).closest('.dropdown_parent').parent().find('input').val(list_value);
    });


    $('.btn_round').on("click", function (evt) {
        evt.preventDefault();
        $('.date_input').datepicker('destroy');

        var tr = '<tr>' +
            '<td class="type_value">' +
            '<ul class="dropdown_parent">' +
            '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span></a>' +

            '<ul class="dropdown-menu">' +
            '<li>Type 1</li>' +
            '<li>Type 2</li>' +
            '<li>Type 3</li>' +
            '</ul>' +
            '</li>' +
            '</ul>' +
            '<input type="text" class="form-control custom_hidden" id="type_dropdown" name="type_dropdown">' +
            '</td>' +


            '<td class="bank_from_value">' +
            '<ul class="dropdown_parent">' +
            '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span></a>' +

            '<ul class="dropdown-menu">' +
            '<li>Bank 1</li>' +
            '<li>Bank 2</li>' +
            '<li>Bank 3</li>' +
            '</ul>' +
            '</li>' +
            '</ul>' +
            '<input type="text" class="form-control custom_hidden" id="bank_from_dropdown" name="bank_from_dropdown">' +
            '</td>' +


            '<td class="date_value">' +

            '<input type="text" class="form-control date_input" name="enter_date" placeholder="dd/mm/yyyy">' +
            '</td>' +


            '<td class="ref_value">' +
            '0001' +
            '</td>' +


            '<td class="to_from_value">' +
            '<ul class="dropdown_parent">' +
            '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>' +

            '<ul class="dropdown-menu">' +
            '<li>PaidTo 1</li>' +
            '<li>PaidTo 2</li>' +
            '<li>PaidTo 3</li>' +
            '</ul>' +
            '</li>' +
            '</ul>' +
            '<input type="text" class="form-control custom_hidden" id="to_from_dropdown" name="to_from_dropdown">' +
            '</td>' +


            '<td class="details_value">' +
            '<input type="text" class="form-control" id="details" name="details">' +
            '</td>' +


            '<td class="analysis_value">' +
            '<ul class="dropdown_parent">' +
            '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>' +

            '<ul class="dropdown-menu">' +
            '<li>Analysis 1</li>' +
            '<li>Analysis 2</li>' +
            '<li>Analysis 3</li>' +
            '</ul>' +
            '</li>' +
            '</ul>' +
            '<input type="text" class="form-control custom_hidden" id="analysis_dropdown" name="analysis_dropdown">' +
            '</td>' +


            '<td class="net_value">' +
            '<input type="text" class="form-control" id="net" name="net">' +
            '</td>' +

            '<td class="vat_value">' +
            '<input type="text" class="form-control" id="vat" name="vat">' +
            '</td>' +


            '<td class="total_value">' +
            '<input type="text" class="form-control" id="total" name="total">' +
            '</td>' +


            '</tr>';

        $('#enter_modal .table').append(tr);


        $('.date_input').datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });


    $('body').on("click", '.edit_btn', function (evt) {
        evt.preventDefault();
        $('#edit_modal').modal('show');
    });

    $('body').on("click", '#edit_modal .delete_btn', function (evt) {
        evt.preventDefault();
        $('#edit_modal').modal('hide');
        $('#confirm_modal').modal('show');
    });

    $('.date_input').datepicker({
        dateFormat: 'dd/mm/yy'
    });


});

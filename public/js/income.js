$(function () {
    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="income.php"]').parent().addClass('active');

    $('.date_input').datepicker({
        dateFormat: 'dd/mm/yy'
    });

    $('body').on("click", '.dropdown_parent li ul li', function () {

        var list_value = $(this).text();
        $(this).closest('.dropdown_parent').find('li a.dropdown-toggle').html(list_value + "<span class='glyphicon glyphicon-arrow-down'></span>");
        $(this).closest('.dropdown_parent').parent().find('input').val(list_value);
    });


    var tr = '<tr>' +
        '<td class="type_value">' +
        '<ul class="dropdown_parent">' +
        '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>' +

        '<ul class="dropdown-menu">' +
        '<li>Bank 1</li>' +
        '<li>Bank 2</li>' +
        '<li>Bank 3</li>' +
        '</ul>' +
        '</li>' +
        '</ul>' +
        '<input type="text" class="form-control custom_hidden" id="type_dropdown" name="type_dropdown">' +
        '</td>' +


        '<td class="date_value">' +
        '<input type="text" class="form-control date_input" name="form_date" placeholder="dd/mm/yyyy">' +
        '</td>' +


        '<td class="customer_value">' +
        '<ul class="dropdown_parent">' +
        '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-arrow-down"></span> </a>' +

        '<ul class="dropdown-menu">' +
        '<li>Customer 1</li>' +
        '<li>Customer 2</li>' +
        '<li>Customer 3</li>' +
        '</ul>' +
        '</li>' +
        '</ul>' +
        '<input type="text" class="form-control custom_hidden" id="customer_dropdown" name="customer_dropdown">' +
        '</td>' +


        '<td class="ref_value">' +
        '0001' +
        '</td>' +


        '<td class="details_value">' +
        '<input type="text" class="form-control" name="details" id="details">' +
        '</td>' +


        '<td class="net_value">' +
        '<input type="number" class="form-control" id="net" name="net">' +
        '</td>' +


        '<td class="vat_value">' +
        '<input type="number" class="form-control" id="vat" name="vat">' +
        '</td>' +


        '<td class="total_value">' +
        '<input type="number" class="form-control" id="total" name="total">' +
        '</td>' +


        '</tr>';

    $('.btn_round').on("click", function (evt) {
        evt.preventDefault();
        $('.date_input').datepicker();
        $('#enter_modal .table').append(tr);
        $('.date_input').datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
//                console.log(tr);


    $('body').on("click", '.edit_btn', function (evt) {
        evt.preventDefault();
        $('#edit_modal').modal("show");
    });

    $('#edit_modal .delete_btn').on("click", function (evt) {
        evt.preventDefault();
        $('#edit_modal').modal("hide");
        $('#confirm_modal').modal('show');
    });


});
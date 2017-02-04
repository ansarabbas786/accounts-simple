$(function () {


    //populating the form data and displaying it to the user
    $('body').on("click", '.edit_btn', function (evt) {
        evt.preventDefault();

        //getting the parent.parent of the click button
        var parent_tr = $(this).parent().parent()

        //getting data from the page td's
        var name = parent_tr.find('td.name').text();
        var ref = parent_tr.find('td.reference').text();

        //populating form fields for updating of the analysis
        $('#analysis_update_form #name').val(name);
        $('#analysis_update_form #reference').val(ref);

        //displaying the modal box
        $('#analysis_edit_modal').modal("show");
    });


    //opening confirm modal box on delete click and setting the id as hidden
    $('body').on("click", '.delete_btn', function (evt) {
        evt.preventDefault();
        var user_id = $(this).data('userid');
        var analysis_id = $(this).data('analysisid');

        $('#confirm_modal').modal("show");
    });

    $('body').on('click', '#confirm_delete_btn',function (evt) {
        evt.preventDefault();

      alert('deleted!');
    });




    $('#my_navbar ul li.active').removeClass('active');
    $('#my_navbar ul li a[href="settings-company.php"]').parent().addClass('active');

    $('#my_navbar2 ul li.active').removeClass('active');
    $('#my_navbar2 ul li a[href="settings-analysis.php"]').parent().addClass('active');


});
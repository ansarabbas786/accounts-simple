$(document).ready(function () {

    $('#privileges_list li ul li').click(function () {
        var list_value = $(this).text();
        $('#privileges_list li a.dropdown-toggle').html(list_value + "<span class='glyphicon glyphicon-arrow-down'></span>");
        $('#privileges_field').val(list_value);


    });


    $('#edit_privileges_list li ul li').click(function () {
        var list_value = $(this).text();
        $('#edit_privileges_list li a.dropdown-toggle').html(list_value + "<span class='glyphicon glyphicon-arrow-down'></span>");
        $('#edit_privileges_field').val(list_value);


    });


    /*----==============================Approved posts edit===========================================*/


    $('#new_category_form').submit(function (evt) {

        evt.preventDefault();

        var form_category = $('#new_category_form')

        $.ajax({

            type: form_category.attr('method'),
            url: form_category.attr('action'),
            cache: false,
            data: form_category.serialize(),
            success: function (response) {
                console.log(response);
                return false;
                if ($.trim(response) == "true") {

                    $('#new_category_form div.message').empty();
                    $('#new_category_form div.message').html('<p  class="error" style="color: green;">New Category added successfully!</p>');
                    $("form").trigger("reset");
                    hide_modal();
                } else {

                    $('#new_category_form div.message').empty();
                    $('#new_category_form div.message').html('<p  class="error" style="color: red;">' + response + '</p>');
                }
            }
        });

    });


    //--------------------------------------------------===================update model================================--------------------------//

    $('#edit_categories_form button').click(function (evt) {

        evt.preventDefault();

        var form_category = $('#edit_categories_form')

        $.ajax({

            type: form_category.attr('method'),
            url: form_category.attr('action'),
            cache: false,
            data: form_category.serialize(),
            success: function (response) {

                if ($.trim(response) == "true") {

                    $('#message').empty();
                    $('#message').html('<p  class="error" style="color: green;">Category updated successfully!</p>');
                    $("form").trigger("reset");
                    hide_modal();
                } else {

                    $('#message').empty();
                    $('#message').html('<p  class="error" style="color: red;">' + response + '</p>');
                }
            }
        });

    });


    function show_modal() {

        $('#modal_id').modal('show');
    }


    function hide_modal() {

        setTimeout(function () {
            $('#add_categories_modal').modal('hide');
            $('.public_update_model').modal('hide');
            $('.pending_post_modal').modal('hide');
            $('.rejected_post_modal').modal('hide');
            $('.edit_admin_modal').modal('hide');
            $('#modal_id').modal('hide');
            $('.approve_post_model').modal('hide');
            $('.all_post_modal').modal('hide');
            $('#edit_categories_modal').modal('hide');
            $('#new_category_form div.messsage').empty();
            $('#message').empty();

        }, 3000);
    }


    $("form#data").submit(function () {

        var formData = new FormData($(this)[0]);

        $.ajax({
            url: window.location.pathname,
            type: 'POST',
            data: formData,
            cache: false,
            async: false,
            success: function (data) {
                alert(data)
            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false;
    });


    //--------------------------------------------------===================Approve post model================================--------------------------//


    /*Delete post code*/

    $('#delete_post_link').click(function (e) {

        e.preventDefault();


        show_modal();

        var link = $('#delete_post_link')

        $.ajax({

            type: 'GET',
            url: link.attr('href'),
            cache: false,
            success: function (response) {

                if ($.trim(response) == "true") {

                    $('#ajax_message').empty();
                    $('#ajax_message').html('<p  style="color: green;">Post deleted Successfully!</p>');
                    hide_modal();

                    setTimeout(function () {

                        window.location.replace('view_all.php');


                    }, 2000);

                } else {

                    $('#ajax_message').empty();
                    $('#ajax_message').html('<p  class="error" style="color: red;">' + response + '</p>');
                }
            }
        });

    });


    /*Reject Post Code*/


    $('#reject_post_link').click(function (e) {

        e.preventDefault();


        show_modal();

        var link = $('#reject_post_link')

        $.ajax({

            type: 'GET',
            url: link.attr('href'),
            cache: false,
            success: function (response) {

                if ($.trim(response) == "true") {

                    $('#ajax_message').empty();
                    $('#ajax_message').html('<p  style="color: green;">Post rejected & transferd to the rejected post section</p>');
                    hide_modal();

                    setTimeout(function () {

                        window.location.replace('rejected_post.php');


                    }, 2000);

                } else {

                    $('#ajax_message').empty();
                    $('#ajax_message').html('<p  class="error" style="color: red;">' + response + '</p>');
                }
            }
        });

    });


    /*approve Post Code*/


    $('#approve_post_link').click(function (e) {

        e.preventDefault();


        show_modal();

        var link = $('#approve_post_link')

        $.ajax({

            type: 'GET',
            url: link.attr('href'),
            cache: false,
            success: function (response) {

                if ($.trim(response) == "true") {

                    $('#ajax_message').empty();
                    $('#ajax_message').html('<p  style="color: green;">Post approved. Now it is available to public.</p>');
                    hide_modal();

                    setTimeout(function () {

                        window.location.replace('view_all.php');


                    }, 2000);

                } else {

                    $('#ajax_message').empty();
                    $('#ajax_message').html('<p  class="error" style="color: red;">' + response + '</p>');
                }
            }
        });

    });


    /************************updating ad***************************/
    //
    // $('#form_edit_post button').click(function (evt) {
    //     evt.preventDefault();
    //
    //
    //     $('#modal_id').modal('show');
    //     $('#ajax_message').html('Posting your ad...');
    //
    //     var form_user = $('#form_edit_post');
    //
    //
    //     var formData = new FormData($('#form_edit_post')[0]);
    //
    //     $.ajax({
    //
    //         type: form_user.attr('method'),
    //         url: form_user.attr('action'),
    //         data: formData,
    //         success: function (response) {
    //
    //             console.log(response);
    //
    //             if (response === 'true') {
    //
    //                 $('#ajax_message').empty();
    //                 $('#ajax_message').html('<h5>Your ad has been sent to admin it \'ll be approved soon in the next few days.</h5>' );
    //
    //                 $("form").trigger("reset");
    //                 hide_modal();
    //
    //             } else {
    //
    //                 $('#sign_up_form p.error').html(response).slideDown();
    //                 hide_modal();
    //             }
    //         },
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //     });
    //
    // });


    /*Admin Login*/

    $('#login_form button').click(function (evt) {

        evt.preventDefault();

        $('#ajax_message').html('Logging In...');
        $('#modal_id').modal('show');

        var form_user = $('#login_form');

        $.ajax({

            type: form_user.attr('method'),
            url: form_user.attr('action'),
            data: form_user.serialize(),
            success: function (response) {

                if ($.trim(response) == 'true') {

                    window.location = "admin_home.php";

                } else {

                    $('#modal_id').modal('hide');
                    $('#login_form p.error').html('Your credentials are incorrect!').slideDown();
                }


            }

        });
    });


    /*Create New User*/

    //-----------------------create Admin  ajax -----------------------------------------------//

    $('#create_admin_form button[type="submit"]').click(function (evt) {
        evt.preventDefault();


        if ($('#password').val() == "" || $('#confirm_password').val() == "") {
            $('#add_admin_modal p.error').text('Password Must Not Be Empty');
            $('#add_admin_modal p.error').slideDown();
            return false;

        } else if ($('#password').val() !== $('#confirm_password').val()) {

            $('#add_admin_modal p.error').text('Your Password Doesn\'t Match. ');
            $('#add_admin_modal p.error').slideDown();
            return false;

        } else {


            $('#modal_id').modal('show');
            $('#ajax_message').html('Registering new admin...');

            var form_user = $('#create_admin_form');

            $.ajax({

                type: form_user.attr('method'),
                url: form_user.attr('action'),
                cache: false,
                data: form_user.serialize(),
                success: function (response) {

                    if ($.trim(response) === 'true') {

                        $('#ajax_message').html('Registered Successfully!');

                        $("form").trigger("reset");
                        hide_modal();

                    } else {

                        $('#add_admin_modal p.error').text(response);
                        $('#add_admin_modal p.error').slideDown();

                        $('#modal_id').modal('hide');
                    }
                }
            });

        }
    });


    /************Updating admin  details************/


    $('#update_admin_form button').click(function (e) {

        e.preventDefault();

        $('#modal_id').modal('show');
        $('#ajax_message').html('<h4>Updating admin information..</h4>');

        var form_user = $('#update_admin_form');

        $.ajax({

            type: form_user.attr('method'),
            url: form_user.attr('action'),
            cache: false,
            data: form_user.serialize(),
            success: function (response) {

                if ($.trim(response) === 'mismatch') {

                    $('#update_admin_form p.error').text("Your name or old password does\'t match.");
                    $('#update_admin_form p.error').slideDown();

                    $('#modal_id').modal('hide');

                } else if ($.trim(response) === 'true') {

                    $('#ajax_message').html('<h4>Admin updated Succssfully!</h4>');

                    hide_modal();

                    setTimeout(function () {

                        window.location.replace('manage_accounts.php');


                    }, 2000);


                } else {
                    $('#ajax_message').html('<h4>Something went wrong while updating information.</h4>');

                }
            }
        });


    });


    /************Updating messages  ************/


    $('.update_message_link').click(function (e) {
        e.preventDefault();

        var link = $(this);

        $.ajax({

            type: 'GET',
            url: link.attr('href'),
            cache: false,
            success: function (response) {


                if ($.trim(response) === 'true') {

                    window.location.replace('messages.php');
                }
            }
        });

    });

    /************deleting messages  ************/


    $('.delete_message_link').click(function (e) {
        e.preventDefault();

        var link = $(this);

        $.ajax({
            type: 'GET',
            url: link.attr('href'),
            cache: false,
            success: function (response) {

                if ($.trim(response) == 'true') {

                    window.location.replace('messages.php');
                }
            }
        });

    });


    /************View messages  ************/


    $('.view_message_link').click(function (e) {
        e.preventDefault();

        var link = $(this);


        $.ajax({

            type: 'GET',
            url: link.attr('href'),
            cache: false,
            success: function (response) {

                $('#message_modal').modal();
                $('#message_modal #message').html('<h4>' + response + '</h4>');
            }
        });

    });


    $('#trigger').click(function () {
        $('#modal_id').modal('show');
        hide_modal();
    });

    function hide_modal() {
        setTimeout(function () {
            $('#sign_up_form p.error').empty();
            $('#modal_id').modal('hide');
            $('#create_ad_modal').modal('hide');
            $('.public_update_model').modal('hide');
            $('.edit_admin_modal').modal('hide');
            $('.create_admin_modal').modal('hide');
        }, 5000);
    }


    $('.view_image_link').on('click', 'img', function (e) {
        e.preventDefault();

        var path = $(this).attr('src');

        $('#image_view_modal .modal-body img').attr('src', path);

    });


});





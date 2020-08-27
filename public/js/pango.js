$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#add-chairman').ajaxForm({
       
        beforeSend: function () {
            $('#add-cahair').html('Please wait ...');
            $('#add-cahair').addClass('disabled');
           
        },
        success: function (data) {

            if (data.errors) {
                toastr.error(data.errors);
                $('#add-cahair').removeClass('disabled');
                $('#add-cahair').html('Add Chairman');
                $('#message').html('<span class="text-danger"><b>' + data.errors + '</b></span>');
            }else{
                toastr.success(data.success);
                $('#message').html('<span class="text-success"><b>' + data.success + '</b></span>');
                $('#add-chairman')[0].reset();
                location.reload();

            }

        },
        complete: function (data) {
            $('#chapter_btn').removeClass('disabled');
            $('#chapter_btn').html('Upload & Save');
        }
    });

    $('body').delegate('.update_owner_btn','click', function (e) {
        e.preventDefault();
        var id = $(this).attr('update_id');
        var owner = $('#update-owner'+id).serialize();
        console.log(owner);
        $.ajax({

            url: "updateChair",
            method: "POST",
            data: owner,
            success: function (data){
                if(data.success){
                    toastr.success(data.success);
                }
                if(data.error){
                    toastr.error(data.error);
                }
            }

        });
    });

    $('#add-property').ajaxForm({
       
        beforeSend: function () {
            $('#add-property_btn').html('Please wait ...');
            $('#add-property_btn').addClass('disabled');
           
        },
        success: function (data) {

            if (data.errors) {
                toastr.error(data.errors);
                $('#add-property_btn').removeClass('disabled');
                $('#add-property_btn').html('Add Property');
                $('#message').html('<span class="text-danger"><b>' + data.errors + '</b></span>');
            }else{
                toastr.success(data.success);
                // $('#message').html('<span class="text-success"><b>' + data.success + '</b></span>');
                $('#add-property')[0].reset();
                location.reload();

            }

        },
        complete: function (data) {
            $('#chapter_btn').removeClass('disabled');
            $('#chapter_btn').html('Upload & Save');
        }
    });

    $('#login-user').ajaxForm({
       
        beforeSend: function () {
            $('#login-user_btn').html('Please wait ...');
            $('#login-user_btn').addClass('disabled');
           
        },
        success: function (data) {

            if (data.errors) {
                //toastr.error(data.errors);
                $('#login-user_btn').removeClass('disabled');
                $('#login-user_btn').html('Sign In');
                $('#message').html('<span class="text-danger"><b>' + data.errors + '</b></span>');
            }else{
               // toastr.success(data.success);
                // $('#message').html('<span class="text-success"><b>' + data.success + '</b></span>');
                $('#login-user')[0].reset();
                window.location.href = data.success;

            }

        },
        complete: function (data) {
            $('#chapter_btn').removeClass('disabled');
            $('#chapter_btn').html('Upload & Save');
        }
    });
});
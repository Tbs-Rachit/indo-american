$(document).ready(function() {

    $(".login-as").click(function() {
        var uname = jQuery(this).data('username');
        var password = jQuery(this).data('password');
        jQuery('#iusername').val(uname);
        jQuery('#ipassword').val(password);
    });

    var name = $('#iusername').attr('placeholder');
    $("#hrm-form").validate({
        // sd = $('#iusername').attr('placeholder');
        rules: {
            iusername: { required: true },
            ipassword: { required: true },
        },
        // Specify validation error messages
        messages: {
            iusername: { required: "Please enter  " + name },
            ipassword: { required: "Please enter password" },
        },
        submitHandler: function(form) {
            login_formsubmit(form);
        }
    });

    // $("#hrm-form").submit(function(e) {
    function login_formsubmit(form) {
        $('.save').prop('disabled', true);
        $('.saveinfo').removeClass('ft-unlock');
        $('.saveinfo').addClass('fa spinner fa-refresh');
        /*Form Submit*/
        // e.preventDefault();
        $('#hrload-img').show();
        toastr.info(processing_request);
        var obj = $(form),
            action = obj.attr('name'),
            redirect_url = obj.data('redirect'),
            form_table = obj.data('form-table'),
            is_redirect = obj.data('is-redirect');
        $.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() + "&is_ajax=1&form=" + form_table,
            cache: false,
            success: function(JSON) {
                if (JSON.error != '') {
                    toastr.clear();
                    $('#hrload-img').hide();
                    toastr.error(JSON.error);
                    $('.save').prop('disabled', false);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $('.saveinfo').addClass('ft-unlock');
                    $('.saveinfo').removeClass('fa spinner fa-refresh');
                } else {
                    toastr.clear();
                    $('#hrload-img').hide();
                    toastr.success(JSON.result);
                    $('.save').prop('disabled', false);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $('.saveinfo').addClass('ft-unlock');
                    $('.saveinfo').removeClass('fa spinner fa-refresh');
                    if (is_redirect == 1) {
                        window.location = site_url + 'admin/dashboard?module=dashboard';
                    }
                }
            }
        });
    }
    // });
});
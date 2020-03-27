$(document).ready(function() {
    var xin_table = $("#xin_table").dataTable({
        bDestroy: true,
        ajax: {
            url: base_url + "/announcement_list/",
            type: "GET"
        }
        /*dom: 'lBfrtip',
        "buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
        "fnDrawCallback": function(settings){
        $('[data-toggle="tooltip"]').tooltip();          
        }*/
    });



    jQuery('#start_date').on('change', function() {
        var date = $(this).val();
        jQuery('#end_date').datepicker("option", "minDate", date);
    });




    $('[data-plugin="select_hrm"]').select2($(this).attr("data-options"));
    $('[data-plugin="select_hrm"]').select2({ width: "100%" });
    $('[data-plugin="select_hrm"]').on('change', function() {
        $(this).valid();
    });

    //$('#description').trumbowyg();
    /* Delete data */
    $("#delete_record").submit(function(e) {
        /*Form Submit*/
        e.preventDefault();
        var obj = $(this),
            action = obj.attr("name");
        $.ajax({
            type: "POST",
            url: e.target.action,
            data: obj.serialize() + "&is_ajax=2&form=" + action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                } else {
                    $(".delete-modal").modal("toggle");
                    xin_table.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                }
            }
        });
    });

    jQuery("#aj_company").change(function() {
        jQuery.get(base_url + "/get_departments/" + jQuery(this).val(), function(
            data,
            status
        ) {
            jQuery("#department_ajax").html(data);
        });
    });

    // edit
    $(".edit-modal-data").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var announcement_id = button.data("announcement_id");
        var modal = $(this);
        $.ajax({
            url: base_url + "/read/",
            type: "GET",
            data: "jd=1&is_ajax=1&mode=modal&data=announcement&announcement_id=" +
                announcement_id,
            success: function(response) {
                if (response) {
                    $("#ajax_modal").html(response);
                }
            }
        });
    });

    // view
    $(".view-modal-data").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var announcement_id = button.data("announcement_id");
        var modal = $(this);
        $.ajax({
            url: base_url + "/read/",
            type: "GET",
            data: "jd=1&is_ajax=1&mode=modal&data=view_announcement&announcement_id=" +
                announcement_id,
            success: function(response) {
                if (response) {
                    $("#ajax_modal_view").html(response);
                }
            }
        });
    });

    // Validation

    jQuery("#xin-form").validate({
        rules: {
            title: "required",
            start_date: {
                required: true,
                date: true
            },
            end_date: {
                required: true,
                date: true,
                greaterThanEqual: "#start_date"
            },
            company_id: "required",
            department_id: "required",
            summary: "required"
        },

        messages: {
            title: "Please enter title",
            start_date: {
                required: "Please select start date"
            },
            end_date: {
                required: "Please select end date",
                greaterThanEqual: "Must be greater than , equal to start Date"
            },
            company_id: "Please select compnay",
            department_id: "Please select department",
            summary: "Please enter summary"
        },
        submitHandler: function(form) {
            formSubmit(form);
        }
    });

    // Function
    function formSubmit(form) {
        var fd = new FormData(form);
        var obj = $(form),
            action = obj.attr("name");
        fd.append("is_ajax", 1);
        fd.append("add_type", "announcement");
        fd.append("form", action);
        $(".icon-spinner3").show();
        $(".save").prop("disabled", true);
        $.ajax({
            url: form.action,
            type: "POST",
            data: fd,
            contentType: false,
            cache: false,
            processData: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    $("#xin-form")[0].reset(); // To reset form fields
                    $(".add-form").removeClass("in");
                    $(".select2-selection__rendered").html("--Select--");
                    $(".save").prop("disabled", false);
                }
            },
            error: function() {
                toastr.error(JSON.error);
                $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                $(".icon-spinner3").hide();
                $(".save").prop("disabled", false);
            }
        });
    }

    // /* Add data */ /*Form Submit*/
    // $("#xin-form").submit(function(e){
    // 	var fd = new FormData(this);
    // 	var obj = $(this), action = obj.attr('name');
    // 	fd.append("is_ajax", 1);
    // 	fd.append("add_type", 'announcement');
    // 	fd.append("form", action);
    // 	e.preventDefault();
    // 	$('.icon-spinner3').show();
    // 	$('.save').prop('disabled', true);
    // 	$.ajax({
    // 		url: e.target.action,
    // 		type: "POST",
    // 		data:  fd,
    // 		contentType: false,
    // 		cache: false,
    // 		processData:false,
    // 		success: function(JSON)
    // 		{
    // 			if (JSON.error != '') {
    // 				toastr.error(JSON.error);
    // 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
    // 				$('.save').prop('disabled', false);
    // 				$('.icon-spinner3').hide();
    // 			} else {
    // 				xin_table.api().ajax.reload(function(){
    // 					toastr.success(JSON.result);
    // 				}, true);
    // 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
    // 				$('.icon-spinner3').hide();
    // 				$('#xin-form')[0].reset(); // To reset form fields
    // 				$('.add-form').removeClass('in');
    // 				$('.select2-selection__rendered').html('--Select--');
    // 				$('.save').prop('disabled', false);
    // 			}
    // 		},
    // 		error: function()
    // 		{
    // 			toastr.error(JSON.error);
    // 			$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
    // 			$('.icon-spinner3').hide();
    // 			$('.save').prop('disabled', false);
    // 		}
    //    });
    // });
});
$(document).on("click", ".delete", function() {
    $("input[name=_token]").val($(this).data("record-id"));
    $("#delete_record").attr(
        "action",
        base_url + "/delete/" + $(this).data("record-id")
    );
});
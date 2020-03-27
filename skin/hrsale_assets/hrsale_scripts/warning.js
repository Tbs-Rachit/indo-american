$(document).ready(function() {
	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: base_url + "/warning_list/",
			type: "GET"
		}
		/*dom: 'lBfrtip',
		"buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
	"fnDrawCallback": function(settings){
	$('[data-toggle="tooltip"]').tooltip();          
	}*/
	});

	$('[data-plugin="select_hrm"]').select2($(this).attr("data-options"));
	$('[data-plugin="select_hrm"]').select2({ width: "100%" });
	//$('#description').trumbowyg();
	jQuery("#aj_company").change(function() {
		jQuery.get(base_url + "/get_employees/" + jQuery(this).val(), function(
			data,
			status
		) {
			jQuery("#employee_ajax").html(data);
		});
		jQuery.get(
			base_url + "/get_employees_warning/" + jQuery(this).val(),
			function(data, status) {
				jQuery("#warning_employee_ajax").html(data);
			}
		);
	});
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
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					toastr.error(JSON.error);
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

	// edit
	$(".edit-modal-data").on("show.bs.modal", function(event) {
		var button = $(event.relatedTarget);
		var warning_id = button.data("warning_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data: "jd=1&is_ajax=1&mode=modal&data=warning&warning_id=" + warning_id,
			success: function(response) {
				if (response) {
					$("#ajax_modal").html(response);
				}
			}
		});
	});
	$(".view-modal-data").on("show.bs.modal", function(event) {
		var button = $(event.relatedTarget);
		var warning_id = button.data("warning_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=modal&data=view_warning&warning_id=" + warning_id,
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
			company_id: "required",
			warning_to: "required",
			type: "required",
			subject: "required",
			description: "required",
			warning_by: "required",
			warning_date: { required: true, date: true }
		},

		messages: {
			company_id: "Please select company",
			warning_to: "Please select employee",
			type: "Please select warning type",
			subject: "Please enter subject",
			description: "Please enter description",
			warning_by: "Please select warning by",
			warning_date: "Please select warning date",
		},
		submitHandler: function(form) {
			/* Update logo */

			formSubmit(form);
		}
	});

	// Form Submit Function

	function formSubmit(form) {
		var obj = $(form),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		$.ajax({
			type: "POST",
			url: form.action,
			data: obj.serialize() + "&is_ajax=1&add_type=warning&form=" + action,
			cache: false,
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
					$(".icon-spinner3").hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".add-form").removeClass("in");
					$(".select2-selection__rendered").html("--Select--");
					$("#xin-form")[0].reset(); // To reset form fields
					$(".save").prop("disabled", false);
				}
			}
		});
	}

	// /* Add data */ /*Form Submit*/
	// $("#xin-form").submit(function(e) {
	// 	e.preventDefault();
	// 	var obj = $(this),
	// 		action = obj.attr("name");
	// 	$(".save").prop("disabled", true);
	// 	$(".icon-spinner3").show();
	// 	$.ajax({
	// 		type: "POST",
	// 		url: e.target.action,
	// 		data: obj.serialize() + "&is_ajax=1&add_type=warning&form=" + action,
	// 		cache: false,
	// 		success: function(JSON) {
	// 			if (JSON.error != "") {
	// 				toastr.error(JSON.error);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".save").prop("disabled", false);
	// 				$(".icon-spinner3").hide();
	// 			} else {
	// 				xin_table.api().ajax.reload(function() {
	// 					toastr.success(JSON.result);
	// 				}, true);
	// 				$(".icon-spinner3").hide();
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".add-form").removeClass("in");
	// 				$(".select2-selection__rendered").html("--Select--");
	// 				$("#xin-form")[0].reset(); // To reset form fields
	// 				$(".save").prop("disabled", false);
	// 			}
	// 		}
	// 	});
	// });
});
$(document).on("click", ".delete", function() {
	$("input[name=_token]").val($(this).data("record-id"));
	$("#delete_record").attr(
		"action",
		base_url + "/delete/" + $(this).data("record-id")
	);
});

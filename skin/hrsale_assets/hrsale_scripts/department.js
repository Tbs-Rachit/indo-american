$(document).ready(function() {
	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: base_url + "/department_list/",
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	$('[data-plugin="select_hrm"]').select2($(this).attr("data-options"));
	$('[data-plugin="select_hrm"]').select2({ width: "100%" });

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
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
				}
			}
		});
	});

	// edit
	$(".edit-modal-data").on("show.bs.modal", function(event) {
		var button = $(event.relatedTarget);
		var department_id = button.data("department_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data: escapeHtmlSecure(
				"jd=1&is_ajax=1&mode=modal&data=department&department_id=" +
					department_id
			),
			success: function(response) {
				if (response) {
					$("#ajax_modal").html(response);
				}
			}
		});
	});

	jQuery("#aj_company").change(function() {
		jQuery.get(
			escapeHtmlSecure(base_url + "/get_employees/" + jQuery(this).val()),
			function(data, status) {
				jQuery("#employee_ajax").html(data);
			}
		);
	});
	jQuery("#aj_company").change(function() {
		jQuery.get(
			escapeHtmlSecure(
				base_url + "/get_company_locations/" + jQuery(this).val()
			),
			function(data, status) {
				jQuery("#location_ajax").html(data);
			}
		);
	}); /*Form Submit*/

	// Validation

	jQuery("#xin-form").validate({
		rules: {
			department_name: "required",
			company_id: "required",
			location_id: "required",
			employee_id : "required"
		},

		messages: {
			department_name: "Please enter department name",
			company_id: "Please select company",
			location_id: "Please select location",
			employee_id: "Please select employee",
		},
		submitHandler: function(form) {
			formSubmit(form);
		}
	});

	// Function

	function formSubmit(form){
		var obj = $(form),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		$.ajax({
			type: "POST",
			url: base_url + "/add_department/",
			data: obj.serialize() + "&is_ajax=1&add_type=department&form=" + action,
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
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					$(".icon-spinner3").hide();
					$("#xin-form")[0].reset(); // To reset form fields
					$(".select2-selection__rendered").html("--Select--");
					$(".save").prop("disabled", false);
				}
			}
		});
	}

	// /* Add data */ $("#xin-form").submit(function(e) {
	// 	e.preventDefault();
	// 	var obj = $(this),
	// 		action = obj.attr("name");
	// 	$(".save").prop("disabled", true);
	// 	$(".icon-spinner3").show();
	// 	$.ajax({
	// 		type: "POST",
	// 		url: base_url + "/add_department/",
	// 		data: obj.serialize() + "&is_ajax=1&add_type=department&form=" + action,
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
	// 					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				}, true);
	// 				$(".icon-spinner3").hide();
	// 				$("#xin-form")[0].reset(); // To reset form fields
	// 				$(".select2-selection__rendered").html("--Select--");
	// 				$(".save").prop("disabled", false);
	// 			}
	// 		}
	// 	});
	// });
});
$(document).on("click", ".delete", function() {
	$("input[name=_token]").val($(this).data("record-id"));
	var delUrl = base_url + "/delete/" + $(this).data("record-id");
	$("#delete_record").attr("action", escapeHtmlSecure(delUrl));
});

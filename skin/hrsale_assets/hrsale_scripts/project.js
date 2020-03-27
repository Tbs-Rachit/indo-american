$(document).ready(function() {
	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: base_url + "/project_list/",
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	jQuery('#start_date').on('change', function(){
		var date = $(this).val();
		jQuery('#end_date').datepicker("option","minDate",date);  
	});

	$('[data-plugin="select_hrm"]').select2($(this).attr("data-options"));
	$('[data-plugin="select_hrm"]').select2({ width: "100%" });
	jQuery("#aj_company").change(function() {
		jQuery.get(base_url + "/get_employees/" + jQuery(this).val(), function(
			data,
			status
		) {
			jQuery("#employee_ajax").html(data);
		});
	});
	jQuery("#aj_company").change(function() {
		jQuery.get(
			site_url + "quotes/get_employees/" + jQuery(this).val(),
			function(data, status) {
				jQuery("#pemployee_ajax").html(data);
			}
		);
	});
	jQuery("#aj_company").change(function() {
		jQuery.get(
			site_url + "quotes/get_co_employees/" + jQuery(this).val(),
			function(data, status) {
				jQuery("#cemployee_ajax").html(data);
			}
		);
	});

	$("#description").trumbowyg();
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

	// edit
	$(".edit-modal-data").on("show.bs.modal", function(event) {
		var button = $(event.relatedTarget);
		var project_id = button.data("project_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data: "jd=1&is_ajax=1&mode=modal&data=project&project_id=" + project_id,
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
		var project_id = button.data("project_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=modal&data=view_project&project_id=" + project_id,
			success: function(response) {
				if (response) {
					$("#ajax_modal_view").html(response);
				}
			}
		});
	});





	// Validation

	$("#xin-form").validate({
		rules: {
			title: "required",
			client_id : "required",
			company_id : "required",
			start_date: {
				required: true,
				date: true
			},
			end_date: {
				required: true,
				date: true,
				greaterThanEqual: "#start_date"
			},
			'assigned_to[]' : 'required',
			summary : "required"
		},

		messages: {
			title : "Please enter title",
			client_id : "Please select contact person",
			company_id : "Please select company",
			start_date: {
				required: "Please select start date"
			},
			end_date: {
				required :"Please select end date",
				greaterThanEqual : "Must be greater than , equal to start date ."
			},
			'assigned_to[]' : "Please select project users",
			summary : "Please enter summary"

		},
		submitHandler: function(form) {
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
			url: base_url + "/add_project/",
			data: obj.serialize() + "&is_ajax=1&add_type=project&form=" + action,
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
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".add-form").removeClass("in");
					$(".select2-selection__rendered").html("--Select--");
					$(".icon-spinner3").hide();
					$("#xin-form")[0].reset(); // To reset form fields
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
	// 		url: base_url + "/add_project/",
	// 		data: obj.serialize() + "&is_ajax=1&add_type=project&form=" + action,
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
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".add-form").removeClass("in");
	// 				$(".select2-selection__rendered").html("--Select--");
	// 				$(".icon-spinner3").hide();
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

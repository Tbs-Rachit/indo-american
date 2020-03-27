$(document).ready(function() {
	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: base_url + "/employer_list/",
			type: "GET"
		}, // colvis > if needed
		/*dom: 'lBfrtip',
		"buttons": ['csv', 'excel', 'pdf', 'print'],*/ fnDrawCallback: function(
			settings
		) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	$('[data-plugin="xin_select"]').select2($(this).attr("data-options"));
	$('[data-plugin="xin_select"]').select2({ width: "100%" });

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
		var user_id = button.data("user_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read_employer/",
			type: "GET",
			data: "jd=1&is_ajax=1&mode=modal&data=employer&user_id=" + user_id,
			success: function(response) {
				if (response) {
					$("#ajax_modal").html(response);
				}
			}
		});
	});

	// Validation

	$("#xin-form").validate({
		rules: {
			company_name: "required",
			email: {
				required: true,
				validemail: true
			},
			contact_number: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10
			},
			first_name: {
				required: true,
				lettersonly: true
			},
			last_name: {
				required: true,
				lettersonly: true
			},
			password: {
				required : true,
				passwordvalidation : true
			},
			company_logo :{
				required : true,
				extension : true
			}
		},

		messages: {
			company_name: "Please select company name",
			email: {
				required: "Please enter email address"
			},
			contact_number: {
				required: "Please enter contact number"
			},
			first_name: { required: "Please enter first name" },
			last_name: { required: "Please enter last name" },
			password :{
				required : "Please enter password"
			},
			company_logo : {
				required : "Please select logo"
			}

		},
		submitHandler: function(form) {
			formSubmit(form);
		}
	});

	// Form Submit function
	function formSubmit(form) {
		var fd = new FormData(form);
		var obj = $(form),
			action = obj.attr("name");
		fd.append("is_ajax", 1);
		fd.append("add_type", "employer");
		fd.append("form", action);
		// e.preventDefault();
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
				} else {
					xin_table.api().ajax.reload(function() {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$("#xin-form")[0].reset(); // To reset form fields
					$(".add-form").removeClass("in");
					$(".select2-selection__rendered").html("--Select--");
					$(".save").prop("disabled", false);
				}
			},
			error: function() {
				toastr.error(JSON.error);
				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				$(".save").prop("disabled", false);
			}
		});
	}

	/* Add data */
	// $("#xin-form").submit(function(e) {
	// 	var fd = new FormData(this);
	// 	var obj = $(this),
	// 		action = obj.attr("name");
	// 	fd.append("is_ajax", 1);
	// 	fd.append("add_type", "employer");
	// 	fd.append("form", action);
	// 	e.preventDefault();
	// 	$(".save").prop("disabled", true);

	// 	$.ajax({
	// 		url: e.target.action,
	// 		type: "POST",
	// 		data: fd,
	// 		contentType: false,
	// 		cache: false,
	// 		processData: false,
	// 		success: function(JSON) {
	// 			if (JSON.error != "") {
	// 				toastr.error(JSON.error);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".save").prop("disabled", false);
	// 			} else {
	// 				xin_table.api().ajax.reload(function() {
	// 					toastr.success(JSON.result);
	// 				}, true);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$("#xin-form")[0].reset(); // To reset form fields
	// 				$(".add-form").removeClass("in");
	// 				$(".select2-selection__rendered").html("--Select--");
	// 				$(".save").prop("disabled", false);
	// 			}
	// 		},
	// 		error: function() {
	// 			toastr.error(JSON.error);
	// 			$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 			$(".save").prop("disabled", false);
	// 		}
	// 	});
	// });
});
//clode the lateral panel
$(document).on("click", ".cd-panel", function() {
	if (
		$(event.target).is(".cd-panel") ||
		$(event.target).is(".cd-panel-close")
	) {
		$(".cd-panel").removeClass("is-visible");
		event.preventDefault();
	}
});

$(document).on("click", ".delete", function() {
	$("input[name=_token]").val($(this).data("record-id"));
	$("#delete_record").attr(
		"action",
		base_url + "/delete_employer/" + $(this).data("record-id")
	);
});

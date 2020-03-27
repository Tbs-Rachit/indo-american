$(document).ready(function() {
	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: base_url + "/company_list/",
			type: "GET"
		},
		dom: "lBfrtip",
		buttons: [
			{
				extend: "csv",
				className: "btn btn-xs btn-primary",
				exportOptions: {
					columns: [1, 2, 3, 4, 5]
				}
			},
			{
				extend: "excel",
				className: "btn btn-xs btn-primary",
				exportOptions: {
					columns: [1, 2, 3, 4, 5]
				}
			},
			{
				extend: "pdf",
				className: "btn btn-xs btn-primary",
				exportOptions: {
					columns: [1, 2, 3, 4, 5]
				}
			},
			{
				extend: "print",
				className: "btn btn-xs btn-primary",
				exportOptions: {
					columns: [1, 2, 3, 4, 5]
				}
			}
		], // colvis > if needed
		fnDrawCallback: function(settings) {
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
		var company_id = button.data("company_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data: "jd=1&is_ajax=1&mode=modal&data=company&company_id=" + company_id,
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
		var company_id = button.data("company_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=modal&data=view_company&company_id=" + company_id,
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
			name: "required",
			company_type: "required",
			trading_name: {
				required: true,
				letterswithspace: true
			},
			registration_no: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10
			},
			contact_number: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10
			},
			email: {
				required: true,
				email: true
			},
			website: {
				required: true,
				url: true
			},
			xin_gtax: {
				required: true
			},
			address_1: "required",
			city: "required",
			state: "required",
			zipcode: {
				required: true,
				alphanumerics: true,
				minlength: 4,
				maxlength: 8
			},
			country: "required",
			username: {
				required : true,
				alphanumeric: true,
				rangelength: [5, 15]
			},
			logo:{
				required: true,
				extension :true
			}
		},

		messages: {
			name: "Please enter company name",
			company_type: "Please select company type",
			trading_name: {
				required: "Please enter tranding name",
				letterswithspace: "Please enter letters, space and dot"
			},
			registration_no: {
				required: "Please enter registration number",
				minlength: "Please enter at least 10 characters.",
				maxlength: "Please enter no more than 10 characters."
			},
			contact_number: {
				required: "Please enter contact number",
				minlength: "Please enter at least 10 characters.",
				maxlength: "Please enter no more than 10 characters."
			},
			email: {
				required: "Pleace enter email address",
				email: "Please enter a valid email address."
			},
			website: {
				required: "Pleace enter website Url",
				url: "Please enter a valid URL."
			},
			xin_gtax: "Please enter tax number / EIN",
			address_1: "Please enter company address",
			city: "Please enter city name",
			state: "Please enter state name",
			zipcode: {
				required: "Please enter zip code",
				alphanumeric: "Enter only letters, numbers, or dashes."
			},
			country: "Please select country",
			username : {
				required : "Pleace enter company code",
			},
			logo:{
				required : "Please select company logo"
			}

		},
		submitHandler: function(form) {
			/* Update logo */

			formSubmit(form);
		}
	});
	


	// Form Submit Function

	function formSubmit(form) {
		var fd = new FormData(form);
		var obj = $(form),
			action = obj.attr("name");
		fd.append("is_ajax", 1);
		fd.append("add_type", "company");
		fd.append("form", action);

		$(".save").prop("disabled", true);

		$.ajax({
			url: base_url + "/add_company/", //e.target.action,
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
	// 	fd.append("add_type", "company");
	// 	fd.append("form", action);
	// 	e.preventDefault();
	// 	$(".save").prop("disabled", true);

	// 	$.ajax({
	// 		url: base_url + "/add_company/", //e.target.action,
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
//open the lateral panel
$(document).on("click", ".cd-btn", function() {
	event.preventDefault();
	var company_id = $(this).data("company_id");
	$.ajax({
		url: site_url + "company/read_info/",
		type: "GET",
		data:
			"jd=1&is_ajax=1&mode=modal&data=view_company&company_id=" + company_id,
		success: function(response) {
			if (response) {
				//alert(response);
				$(".cd-panel").addClass("is-visible");
				$("#cd-panel").html(response);
			}
		}
	});
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
		base_url + "/delete/" + $(this).data("record-id")
	);
});

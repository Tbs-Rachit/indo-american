$(document).ready(function() {
	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: base_url + "/location_list/",
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
		var location_id = button.data("location_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=modal&data=location&location_id=" + location_id,
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
		var location_id = button.data("location_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=modal&data=view_location&location_id=" +
				location_id,
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
			company: "required",
			name: "required",
			email: { required: true, email: true },
			phone : {
				required : true,
				number: true,
				minlength: 10,
				maxlength: 10,
			},
			fax : {
				required : true,
				number: true,
				minlength: 10,
				maxlength: 10,
			},
			location_head : "required",
			address_1 : "required",
			city : "required",
			state : "required",
			zipcode: {
				required: true,
				alphanumerics: true,
				minlength: 4,
				maxlength: 8
			},
			country : "required",
		},

		messages: {
			company: "Please select company name",
			name: "Please enter location name",
			email : {
				required: "Please enter email address"
			},
			phone : {
				required : "Please enter phone number"
			},
			fax : {
				required : "Please enter fax number"
			},
			location_head : "Please select location head",
			address_1 : "Please enter address",
			city: "Please enter city name",
			state: "Please enter state name",
			zipcode: {
				required: "Please enter zip code",
				alphanumeric: "Enter only letters, numbers, or dashes"
			},
			country : "Please select country"
		},
		submitHandler: function(form) {
			formSubmit(form);
		}
	});

	$.validator.addMethod(
		"alphanumerics",
		function(value, element) {
			return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
		},
		"Enter only letters, numbers, or dashes."
	);

	//  Form Submit Function

	function formSubmit(form) {
		var obj = $(form),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		$.ajax({
			type: "POST",
			url: base_url + "/add_location/",
			data: obj.serialize() + "&is_ajax=1&add_type=location&form=" + action,
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
					$(".icon-spinner3").hide();
					$("#xin-form")[0].reset(); // To reset form fields
					$(".add-form").removeClass("in");
					$(".select2-selection__rendered").html("--Select--");
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
	// 		url: base_url + "/add_location/",
	// 		data: obj.serialize() + "&is_ajax=1&add_type=location&form=" + action,
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
	// 				$(".icon-spinner3").hide();
	// 				$("#xin-form")[0].reset(); // To reset form fields
	// 				$(".add-form").removeClass("in");
	// 				$(".select2-selection__rendered").html("--Select--");
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

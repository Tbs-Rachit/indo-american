$(document).ready(function() {
	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: base_url + "/clients_list/",
			type: "GET"
		}
		/*dom: 'lBfrtip',
		"buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
		"fnDrawCallback": function(settings){
		$('[data-toggle="tooltip"]').tooltip();          
		}*/
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
		var client_id = button.data("client_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/client_read/",
			type: "GET",
			data: "jd=1&is_ajax=1&mode=modal&data=client&client_id=" + client_id,
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
		var client_id = button.data("client_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/client_read/",
			type: "GET",
			data: "jd=1&is_ajax=1&mode=modal&data=view_client&client_id=" + client_id,
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
			name: {
				required: true,
				alphabetsnspace: true
			},
			company_name: {
				required: true,
				letterswithspace: true
			},
			contact_number: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10
			},
			email: {
				required: true,
				validemail: true
			},
			country: "required",
			password: {
				required: true,
				passwordvalidation: true
			},
			client_photo : {
				required : true,
				extension : true
			}
		},

		messages: {
			name: {
				required: "Please enter contact person name"
			},
			company_name: {
				required: "Please enter company name"
			},
			contact_number: {
				required: "Please enter contact number"
			},
			email: {
				required: "Please enter email address"
			},
			country: {
				required: "Please select country"
			},
			password : {
				required : "Please enter password"
			},
			client_photo : {
				required : "Please select profile photo"
			}

		},
		submitHandler: function(form) {
			formSubmit(form);
		}
	});

	// Form Submit Function

	function formSubmit(form) {
		var fd = new FormData(form);
		var obj = $(form),
			action = obj.attr("name");
		fd.append("is_ajax", 1);
		fd.append("add_type", "client");
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
					$(".add-form").removeClass("in");
					$(".select2-selection__rendered").html("--Select--");
					$("#xin-form")[0].reset(); // To reset form fields
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

	// /* Add data */ $("#xin-form").submit(function(e) {
	// 	var fd = new FormData(this);
	// 	var obj = $(this),
	// 		action = obj.attr("name");
	// 	fd.append("is_ajax", 1);
	// 	fd.append("add_type", "client");
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
	// 				$(".add-form").removeClass("in");
	// 				$(".select2-selection__rendered").html("--Select--");
	// 				$("#xin-form")[0].reset(); // To reset form fields
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

$(document).on("click", ".delete", function() {
	$("input[name=_token]").val($(this).data("record-id"));
	$("#delete_record").attr(
		"action",
		base_url + "/delete/" + $(this).data("record-id")
	);
});

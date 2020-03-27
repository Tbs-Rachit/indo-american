$(document).ready(function() {
	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: base_url + "/document_list/",
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
		var document_id = button.data("document_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read_document/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=modal&data=document&document_id=" + document_id,
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
		var document_id = button.data("document_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read_document/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=modal&data=view_document&document_id=" +
				document_id,
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
			license_name: "required",
			company_id: "required",
			expiry_date: {
				required: true,
				date: true
			},
			scan_file: "required",
			document_type_id: "required",
			license_number: "required",
		},

		messages: {
			license_name: "Please enter license name",
			company_id: "Please select company",
			expiry_date: "Please select expiry date",
			scan_file: "Please select official document",
			document_type_id: "Please select document type",
			license_number: "Please Enter license number",
		},
		submitHandler: function(form) {
			formSubmit(form);
		}
	});

	//  Form Submit Function

	function formSubmit(form) {
		var fd = new FormData(form);
		var obj = $(form),
			action = obj.attr("name");
		fd.append("is_ajax", 1);
		fd.append("add_type", "official_document");
		fd.append("form", action);
		// e.preventDefault();
		$(".save").prop("disabled", true);

		$.ajax({
			url: base_url + "/add_official_document/",
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

	// /* Add data */
	// $("#xin-form").submit(function(e) {
	// 	var fd = new FormData(this);
	// 	var obj = $(this),
	// 		action = obj.attr("name");
	// 	fd.append("is_ajax", 1);
	// 	fd.append("add_type", "official_document");
	// 	fd.append("form", action);
	// 	e.preventDefault();
	// 	$(".save").prop("disabled", true);

	// 	$.ajax({
	// 		url: base_url + "/add_official_document/",
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
$(document).on("click", ".delete", function() {
	$("input[name=_token]").val($(this).data("record-id"));
	$("#delete_record").attr(
		"action",
		base_url + "/delete_document/" + $(this).data("record-id")
	);
});

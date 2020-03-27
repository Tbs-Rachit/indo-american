$(document).ready(function() {
	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: base_url + "/job_list/",
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	$('[data-plugin="select_hrm"]').select2($(this).attr("data-options"));
	$('[data-plugin="select_hrm"]').select2({ width: "100%" });
	jQuery("#aj_company").change(function() {
		jQuery.get(base_url + "/get_designations/" + jQuery(this).val(), function(
			data,
			status
		) {
			jQuery("#designation_ajax").html(data);
		});
	});
	$("#long_description").trumbowyg();
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
		var job_id = button.data("job_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data: "jd=1&is_ajax=1&mode=modal&data=job&job_id=" + job_id,
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
			user_id: "required",
			job_title: { required:true , alphabetsnspace : true },
			job_type : "required",
			category_id : "required",
			vacancy : {
				required : true,
				number:true
			},
			date_of_closing: "required",
			short_description : "required"

		},

		messages: {
			user_id : "Please select employer",
			job_title : {
				required : "Please enter job title",
			}, 
			job_type : "Please select job type",
			category_id : "Please Select category",
			vacancy : "Please enter number of positions",
			date_of_closing : "Please enter date of closing",
			short_description : "Please enter short description"
		},
		submitHandler: function(form) {
			formSubmit(form);
		}
	});


	// Form Submit function
	function formSubmit(form) {
		var obj = $(form),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		$.ajax({
			type: "POST",
			url: form.action,
			data: obj.serialize() + "&is_ajax=1&add_type=job&form=" + action,
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
	// 		url: e.target.action,
	// 		data: obj.serialize() + "&is_ajax=1&add_type=job&form=" + action,
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
	) + "/";
});

$(document).ready(function() {
	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: base_url + "/reimbursement_list/",
			type: "GET"
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

	jQuery("#xin-form").validate({
		rules: {
			company_id: "required",
			employee_id: "required",
			reimbursement_date: {
				required: true,
				date: true
			},
			amount: {
				required : true,
				number: true,
			},
			description: "required"
		},

		messages: {
			company_id: "Please select company",
			employee_id: "Please select employee",
			reimbursement_date: "Please select reimbursement date",
			amount:{
				required:"Please enter amount",
			},
			description: "Please enter description"
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
		fd.append("add_type", "reimbursement");
		fd.append("form", action);
		

		console.log(fd);

		$(".save").prop("disabled", true);
		$(".icon-spinner3").show();
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

	// edit
	$(".edit-modal-data").on("show.bs.modal", function(event) {
		var button = $(event.relatedTarget);
		var reimbursement_id = button.data("reimbursement_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=modal&data=reimbursement&reimbursement_id=" +
				reimbursement_id,
			success: function(response) {
				if (response) {
					$("#ajax_modal").html(response);
				}
			}
		});
	});

	$(".view-modal-data").on("show.bs.modal", function(event) {
		var button = $(event.relatedTarget);
		var reimbursement_id = button.data("reimbursement_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=modal&data=view_reimbursement&reimbursement_id=" +
				reimbursement_id,
			success: function(response) {
				if (response) {
					$("#ajax_modal_view").html(response);
				}
			}
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
});
$(document).on("click", ".delete", function() {
	$("input[name=_token]").val($(this).data("record-id"));
	$("#delete_record").attr(
		"action",
		base_url + "/delete/" + $(this).data("record-id")
	);
});

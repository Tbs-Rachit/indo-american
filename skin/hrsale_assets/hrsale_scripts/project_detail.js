$(document).ready(function() {
	var xin_discussion_table = $("#xin_discussion_table").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "project/discussion_list/" + $("#tproject_id").val(),
			type: "GET"
		},
		iDisplayLength: 25,
		aLengthMenu: [
			[10, 25, 50, 100, 200, -1],
			[10, 25, 50, 100, 200, "All"]
		],

		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	var xin_bug_table = $("#xin_bug_table").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "project/bug_list/" + $("#tproject_id").val(),
			type: "GET"
		},
		iDisplayLength: 25,
		aLengthMenu: [
			[10, 25, 50, 100, 200, -1],
			[10, 25, 50, 100, 200, "All"]
		],

		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});
	var xin_attachment_table = $("#xin_attachment_table").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "project/attachment_list/" + $("#f_project_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});
	$("#description").trumbowyg();
	/* Edit task data */
	$("#update_status").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = $(this),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=3&type=update_status&update=1&view=task&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				}
			}
		});
	});

	// Validation

	$("#assign_project").validate({
		rules: {
			"assigned_to[]": "required"
		},
		messages: {
			"assigned_to[]": "Please select project users"
		},
		submitHandler: function(form) {
			assignformSubmit(form);
		}
	});

	/* update task employees */
	// $("#assign_project").submit(function(e){
	function assignformSubmit(form) {
		// e.preventDefault();
		var obj = $(form),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$.ajax({
			type: "POST",
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=4&type=project_user&view=user&form=" +
				action,
			cache: false,
			success: function(JSON) {
				jQuery.get(
					site_url + "project/project_users/" + jQuery("#project_id").val(),
					function(data, status) {
						jQuery("#all_employees_list").html(data);
					}
				);
				$(".save").prop("disabled", false);
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	$('[data-plugin="select_hrm"]').select2($(this).attr("data-options"));
	$('[data-plugin="select_hrm"]').select2({ width: "100%" });

	$(".nav-tabs-link").click(function() {
		var profile_id = $(this).data("config");
		var profile_block = $(this).data("config-block");
		$(".nav-tabs-link").removeClass("active");
		$(".current-tab").hide();
		$("#pj_data_" + profile_id).addClass("active");
		$("#" + profile_block).show();
	});

	// validation

	$("#set_discussion").validate({
		rules: {
			xin_message: "required"
		},
		messages: {
			xin_message: "Please enter message"
		},
		submitHandler: function(form) {
			discuFormSubmit(form);
		}
	});

	// $("#set_discussion").submit(function(e) {
	function discuFormSubmit(form) {
		var fd = new FormData(form);
		var obj = $(form),
			action = obj.attr("name");
		fd.append("is_ajax", 1);
		fd.append("add_type", "set_discussion");
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
					xin_discussion_table.api().ajax.reload(function() {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$("#xin_message").val("");
					$("#set_discussion")[0].reset(); // To reset form fields
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
	// });

	// validation

	$("#set_bug").validate({
		rules: {
			title: "required"
		},
		messages: {
			title: "Please enter title"
		},
		submitHandler: function(form) {
			setbugFormSubmit(form);
		}
	});

	// $("#set_bug").submit(function(e) {
	function setbugFormSubmit(form) {
		var fd = new FormData(this);
		var obj = $(this),
			action = obj.attr("name");
		fd.append("is_ajax", 1);
		fd.append("add_type", "set_bug");
		fd.append("form", action);

		e.preventDefault();
		$(".save").prop("disabled", true);
		$.ajax({
			url: e.target.action,
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
					xin_bug_table.api().ajax.reload(function() {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$("#set_bug")[0].reset(); // To reset form fields
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
	// });

	/*Form Submit*/



	// validation

	
	$("#add_attachment").validate({
		rules: {
			file_name: "required",
			attachment_file : {
				required : true,
				extension : true
			},
			file_description: "required"
		},
		messages: {
			file_name: "Please enter title",
			attachment_file : {
				required : "Please select attachment file"
			},
			file_description : "Please enter description"
		},
		submitHandler: function(form) {
			attachmentFormSubmit(form);
		}
	});

	// /* Add project file */ $("#add_attachment").submit(function(e) {
		function attachmentFormSubmit(form){
		var fd = new FormData(form);
		var obj = $(form),
			action = obj.attr("name");
		fd.append("is_ajax", 7);
		fd.append("add_type", "dfile_attachment");
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
					xin_attachment_table.api().ajax.reload(function() {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$("#add_attachment")[0].reset(); // To reset form fields
					$(".save").prop("disabled", false);
				}
			},
			error: function() {
				toastr.error("Bug. Something went wrong, please try again.");
				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				$(".save").prop("disabled", false);
			}
		});
	}
	// });

	$("#delete_record").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = $(this),
			action = obj.attr("name");
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize() + "&is_ajax=6&data=bug&form=" + action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				} else {
					$(".delete-modal").modal("toggle");
					xin_bug_table.api().ajax.reload(function() {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				}
			}
		});
	});

	// edit
	$(".view-modal-data").on("show.bs.modal", function(event) {
		var button = $(event.relatedTarget);
		var bug_id = button.data("bug_id");
		var modal = $(this);
		$.ajax({
			url: base_url + "/bug_read/",
			type: "GET",
			data: "jd=1&is_ajax=1&mode=modal&data=bug&bug_id=" + bug_id,
			success: function(response) {
				if (response) {
					$("#ajax_modal_view").html(response);
				}
			}
		});
	});

	$(".edit-modal-data").on("show.bs.modal", function(event) {
		var button = $(event.relatedTarget);
		var task_id = button.data("task_id");
		var mname = button.data("mname");
		var modal = $(this);
		$.ajax({
			url: site_url + "timesheet/read_task_record/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=modal&data=project_task&task_id=" +
				task_id +
				"&mname=" +
				mname,
			success: function(response) {
				if (response) {
					$("#ajax_modal").html(response);
				}
			}
		});
	});

	var xin_table = $("#xin_table").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "timesheet/project_task_list/" + $("#tproject_id").val(),
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

	// validation

	$("#xin-form").validate({
		rules: {
			task_name : {
				required : true,
			},
			start_date: {
				required: true,
				date: true
			},
			end_date: {
				required: true,
				date: true,
				greaterThanEqual: "#start_date"
			},
			task_hour:{
				required : true,
				number: true
			},
			'assigned_to[]' : {
				required : true,
				minlength : 1
			}
		},
		messages: {
			task_name : {
				required : "Please enter title"
			},
			start_date: {
				required: "Please select start date."
			},
			end_date: {
				required :"Please select end date.",
				greaterThanEqual : "Must be greater than , equal to start date ."
			},
			task_hour : {
				required : "Please enter estimated hour"
			},
			'assigned_to[]' : {
				required : "Please select assigned to users"
			}
		},
		submitHandler: function(form) {
			taskFormSubmit(form);
		}
	});

	// $("#xin-form").submit(function(e) {
	function taskFormSubmit(form) {
		e.preventDefault();
		var obj = $(this),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize() + "&is_ajax=1&add_type=task&form=" + action,
			cache: false,
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
					$(".add-form").fadeOut("slow");
					$("#xin-form")[0].reset(); // To reset form fields
					$(".save").prop("disabled", false);
				}
			}
		});
	}
	// });
	$("#delete_record_f").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = $(this),
			action = obj.attr("name");
		$.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=8&data=attachment&type=delete&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				} else {
					$(".delete-modal-file").modal("toggle");
					xin_attachment_table.api().ajax.reload(function() {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				}
			}
		});
	});

	$("#delete_record_t").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = $(this),
			action = obj.attr("name");
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize() + "&is_ajax=8&data=task&type=delete&form=" + action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				} else {
					$(".delete-modal-task").modal("toggle");
					xin_table.api().ajax.reload(function() {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				}
			}
		});
	});
	/* Edit note */
	$("#add_note").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = $(this),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=9&type=add_note&update=2&view=note&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				}
			}
		});
	});
});

$(document).on("click", ".delete", function() {
	$("input[name=_token]").val($(this).data("record-id"));
	$("#delete_record").attr(
		"action",
		site_url + "project/bug_delete/" + $(this).data("record-id")
	);
});
$(document).on("click", ".fidelete", function() {
	$("input[name=_token]").val($(this).data("record-id"));
	$("#delete_record_f").attr(
		"action",
		site_url + "project/attachment_delete/" + $(this).data("record-id")
	);
});
$(document).on("click", ".delete-task", function() {
	$("input[name=_token_del_file]").val($(this).data("record-id"));
	$("#delete_record_t").attr(
		"action",
		site_url + "timesheet/delete_task/" + $(this).data("record-id")
	);
});

$(document).ready(function () {
	var xin_table = $('#xin_table').dataTable({
		"bDestroy": true,
		"ajax": {
			url: site_url + "timesheet/leave_list/",
			type: 'GET'
		},
		"fnDrawCallback": function (settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width: '100%' });
	jQuery("#aj_company").change(function () {
		jQuery.get(base_url + "/get_leave_employees/" + jQuery(this).val(), function (data, status) {
			jQuery('#employee_ajax').html(data);
		});
	});
	//filter
	jQuery("#aj_companyf").change(function () {
		jQuery.get(site_url + "payroll/get_employees/" + jQuery(this).val(), function (data, status) {
			jQuery('#employee_ajaxf').html(data);
		});
	});
	$('#remarks').trumbowyg();
	$("#ihr_report").submit(function (e) {
		/*Form Submit*/
		e.preventDefault();
		var xin_table2 = $('#xin_table').dataTable({
			"bDestroy": true,
			"ajax": {
				url: site_url + "timesheet/leave_list/?ihr=true&company_id=" + $('#aj_companyf').val() + "&employee_id=" + $('#employee_id').val() + "&status=" + $('#status').val(),
				type: 'GET'
			},
			"fnDrawCallback": function (settings) {
				$('[data-toggle="tooltip"]').tooltip();
			}
		});
		xin_table2.api().ajax.reload(function () { }, true);
	});
	// Date
	$('.date').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		yearRange: new Date().getFullYear() + ':' + (new Date().getFullYear() + 10),
	});

	/* Delete data */
	$("#delete_record").submit(function (e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize() + "&is_ajax=2&type=delete&form=" + action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				} else {
					$('.delete-modal').modal('toggle');
					xin_table.api().ajax.reload(function () {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				}
			}
		});
	});

	// edit
	$('.edit-modal-data').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var leave_id = button.data('leave_id');
		var modal = $(this);
		$.ajax({
			url: site_url + "timesheet/read_leave_record/",
			type: "GET",
			data: 'jd=1&is_ajax=1&mode=modal&data=leave&leave_id=' + leave_id,
			success: function (response) {
				if (response) {
					$("#ajax_modal").html(response);
				}
			}
		});
	});
	
	
	jQuery('#start_date').on('change', function () {
		var date = $(this).val();
		$("#end_date").datepicker("option", "minDate", date)
	});

	/* Add data */ /*Form Submit*/
	$("#xin-form").validate({
		rules: {
			leave_type: { required: true },
			leave_take: { required: true },
			start_date: { required: true },
			end_date: { required: true },
			company_id: { required: true },
			employee_id: { required: true },
			reason: { required: true },
		},
		// Specify validation error messages
		messages: {
			leave_type: { required: "Please select leave type" },
			leave_take: { required: "Please select leave take" },
			start_date: { required: "Please enter start date" },
			end_date: { required: "Please enter end date" },
			company_id: { required: "Please select company" },
			employee_id: { required: "Please select employee" },
			reason: { required: "Please enter reason" },
		},
		submitHandler: function (form) {
			add_leaveformSubmit(form);
		}
	});

	// $("#xin-form").submit(function(e){
	function add_leaveformSubmit(form) {
		// e.preventDefault();
		var obj = $(form), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data: obj.serialize() + "&is_ajax=1&add_type=leave&form=" + action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					xin_table.api().ajax.reload(function () {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.add-form').removeClass('in');
					$('.select2-selection__rendered').html('--Select--');
					$('#xin-form')[0].reset(); // To reset form fields
					$('.save').prop('disabled', false);
					jQuery('#remaining_leave').hide();
				}
			}
		});
	}
	// });
});
$(document).on("click", ".delete", function () {
	$('input[name=_token]').val($(this).data('record-id'));
	$('#delete_record').attr('action', site_url + 'timesheet/delete_leave/' + $(this).data('record-id'));
});
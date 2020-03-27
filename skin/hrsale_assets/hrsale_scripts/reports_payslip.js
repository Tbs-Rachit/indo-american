$(document).ready(function () {
	var xin_table = $('#xin_table').dataTable({
		"bDestroy": true,
		"ajax": {
			url: site_url + "reports/payslip_report_list/" + $('#aj_company').val() + "/" + $('#employee_id').val() + "/" + $('#month_year').val(),
			type: 'GET'
		},
		dom: 'lBfrtip',
		"buttons": [{
			extend: 'csv',
			className: 'btn btn-xs btn-primary',
			exportOptions: {
				columns: [0, 1, 2, 3]
			}
		}, {
			extend: 'excel',
			className: 'btn btn-xs btn-primary',
			exportOptions: {
				columns: [0, 1, 2, 3]
			}
		}, {
			extend: 'pdfHtml5',
			className: 'btn btn-xs btn-primary',
			exportOptions: {
				columns: [0, 1, 2, 3]
			}
		}, {
			extend: 'print',
			className: 'btn btn-xs btn-primary',
			exportOptions: {
				columns: [0, 1, 2, 3]
			}
		},], // colvis > if needed
		"fnDrawCallback": function (settings) {
			$('[data-toggle="tooltip"]').tooltip();
		},
	});

	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width: '100%' });
	jQuery("#aj_company").change(function () {
		jQuery.get(base_url + "/get_employees/" + jQuery(this).val(), function (data, status) {
			jQuery('#employee_ajax').html(data);
		});
	});

	$('.r_month_year').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: 'yy-mm',
		yearRange: '1900:' + (new Date().getFullYear() + 15),
		beforeShow: function (input) {
			$(input).datepicker("widget").addClass('hide-calendar');
		},
		onClose: function (dateText, inst) {
			var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			$(this).datepicker('setDate', new Date(year, month, 1));
			$(this).datepicker('widget').removeClass('hide-calendar');
			$(this).datepicker('widget').hide();
		}
	});

	/* Add data */ /*Form Submit*/
	$("#xin-form").validate({
		rules: {
			company_id: { required: true },
			employee_id: { required: true },
			month_year: { required: true },
		},
		// Specify validation error messages
		messages: {
			company_id: { required: "Please select company" },
			employee_id: { required: "Please select employee" },
			month_year: { required: "Please select month & year" },
		},
		submitHandler: function (form) {
			payslip_formSubmit(form);
		}
	});

	// $("#xin-form").submit(function(e){
	function payslip_formSubmit(form) {
		// e.preventDefault();
		var obj = $(form), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$('.icon-spinner3').show();
		$.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data: obj.serialize() + "&is_ajax=1&type=payslip_report&form=" + action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
					$('.icon-spinner3').hide();
				} else {
					var aj_company = $('#aj_company').val();
					var employee_id = $('#employee_id').val();
					var month_year = $('#month_year').val();
					var xin_table2 = $('#xin_table').dataTable({
						"bDestroy": true,
						"ajax": {
							url: site_url + "reports/payslip_report_list/" + aj_company + "/" + employee_id + "/" + month_year,
							type: 'GET'
						},
						dom: 'lBfrtip',
						"buttons": [{
							extend: 'csv',
							className: 'btn btn-xs btn-primary',
							exportOptions: {
								columns: [0, 1, 2, 3]
							}
						}, {
							extend: 'excel',
							className: 'btn btn-xs btn-primary',
							exportOptions: {
								columns: [0, 1, 2, 3]
							}
						}, {
							extend: 'pdfHtml5',
							className: 'btn btn-xs btn-primary',
							exportOptions: {
								columns: [0, 1, 2, 3]
							}
						}, {
							extend: 'print',
							className: 'btn btn-xs btn-primary',
							exportOptions: {
								columns: [0, 1, 2, 3]
							}
						},], // colvis > if needed
						"fnDrawCallback": function (settings) {
							$('[data-toggle="tooltip"]').tooltip();
						},
					});
					toastr.success(JSON.result);
					xin_table2.api().ajax.reload(function () { }, true);
					$('.icon-spinner3').hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				}
			}
		});
	}
	// });
});

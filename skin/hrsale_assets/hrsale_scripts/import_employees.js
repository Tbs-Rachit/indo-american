$(document).ready(function () {
	$('#exist_employee_view').hide();
	// get departments
	jQuery("#aj_company").change(function () {
		jQuery.get(base_url + "/get_departments/" + jQuery(this).val(), function (data, status) {
			jQuery('#department_ajax').html(data);
		});
	});
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width: '100%' });
	/* Add data */ /*Form Submit*/
	$("#xin-form").validate({
		rules: {
			file: {
				required: true,
				extension: "xls|xlsx|csv"
			},
		},
		// Specify validation error messages
		messages: {
			file: {
				required: "Please select file",
				extension: "Please enter only xls,xlsx,csv."
			},
		},
		submitHandler: function (form) {
			employee_importformSubmit(form);
		}
	});
	// $("#xin-form").submit(function(e){
	function employee_importformSubmit(form) {
		var fd = new FormData(form);
		var obj = $(form), action = obj.attr('name');

		fd.append("is_ajax", 3);
		fd.append("type", 'imp_employees');
		fd.append("form", action);
		// e.preventDefault();
		$('.save').prop('disabled', true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		$.ajax({
			// url: e.target.action,
			url: form.action,
			type: "POST",
			data: fd,
			contentType: false,
			cache: false,
			processData: false,
			success: function (JSON) {
				if (JSON.error != '') {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('#xin-form')[0].reset(); // To reset form fields
					$('.select2-selection__rendered').html('--Select--');
					$('.save').prop('disabled', false);
					$('#exist_employee_view').hide();
				}

				if (JSON.exist) {
					$('#exist_employee_view').show();
					var tr_str = '';
					$.each(JSON.exist, function (key, val) {
						tr_str += "<tr>" +
							"<td align='center'>" + val.error + "</td>" +
							"<td align='center'>" + val.first_name + "</td>" +
							"<td align='center'>" + val.last_name + "</td>" +
							"<td align='center'>" + val.email + "</td>" +
							"<td align='center'>" + val.employee_id + "</td>" +
							"</tr>";
					});
					$("#error_data").html(tr_str);
				}
			},
			error: function () {
				//toastr.clear();
				//$('#hrload-img').hide();
				toastr.error(JSON.error);
				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				$('.save').prop('disabled', false);
			}
		});
	}
	// });
});
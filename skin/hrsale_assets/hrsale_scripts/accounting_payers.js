$(document).ready(function () {
	var xin_table = $('#xin_table').dataTable({
		"bDestroy": true,
		"ajax": {
			url: base_url + "/payers_list/",
			type: 'GET'
		},
		"fnDrawCallback": function (settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width: '100%' });

	$(".add-new-form").click(function () {
		$(".add-form").slideToggle('slow');
	});

	// delete
	/* Delete data */
	$("#delete_record").submit(function (e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize() + "&is_ajax=2&form=" + action,
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
	$('.payroll_template_modal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var payer_id = button.data('payer_id');
		var modal = $(this);
		$.ajax({
			url: base_url + "/read_payer/",
			type: "GET",
			data: 'jd=1&is_ajax=1&mode=modal&data=payer&payer_id=' + payer_id,
			success: function (response) {
				if (response) {
					$("#ajax_modal_payroll").html(response);
				}
			}
		});
	});

	/* Add data */ /*Form Submit*/
	$("#xin-form").validate({
		rules: {
			payer_name: {
				required: true,
				lettersonly: true,
			},
			contact_number: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10.
			},
		},
		// Specify validation error messages
		messages: {
			payer_name: { required: "Please enter payer name" },
			contact_number: {
				required: "Please enter contact number",
				minlength: "Please enter valid contact number",
				maxlength: "Not more than 10 digits",
			},
		},
		submitHandler: function (form) {
			add_payer_formSubmit(form);
		}
	});

	// $("#xin-form").submit(function (e) {
	function add_payer_formSubmit(form) {
		// e.preventDefault();
		var obj = $(form), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$('.icon-spinner3').show();
		$.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data: obj.serialize() + "&is_ajax=1&add_type=add_payer&form=" + action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
					$('.icon-spinner3').hide();
				} else {
					xin_table.api().ajax.reload(function () {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.icon-spinner3').hide();
					$('#xin-form')[0].reset(); // To reset form fields
					$('.save').prop('disabled', false);
				}
			}
		});
	}
	// });
});
$(document).on("click", ".delete", function () {
	$('input[name=_token]').val($(this).data('record-id'));
	$('#delete_record').attr('action', base_url + '/delete_payer/' + $(this).data('record-id'));
});
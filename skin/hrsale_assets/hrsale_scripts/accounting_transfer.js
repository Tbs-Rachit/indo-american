$(document).ready(function () {
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width: '100%' });

	//$('#description').trumbowyg();

	$(".from-account").change(function () {
		var ac_balance = $(this).find('option:selected').attr('account-balance');
		$('#acc_balance').html(' Available Balance: ' + ac_balance);
		$('#account_balance').val(ac_balance);
		$('#acc_balance').show();
	});


	$("#xin-form").validate({
		rules: {
			from_bank_cash_id: { required: true, },
			to_bank_cash_id: { required: true },
			transfer_date: {
				required: true,
				date: true
			},
			amount: {
				required: true,
				number: true
			},
			payment_method: { required: true },
			transfer_reference: { number: true },
		},
		// Specify validation error messages
		messages: {
			from_bank_cash_id: { required: "Please select account type" },
			to_bank_cash_id: { required: "Please select account type" },
			transfer_date: { required: "Please enter transfer date" },
			amount: { required: "Please enter amount" },
			payment_method: { required: "Please select payment method" },
		},
		submitHandler: function (form) {
			add_transfer_formSubmit(form);
		}

	});

	// $("#xin-form").submit(function (e) {
	function add_transfer_formSubmit(form) {
		// e.preventDefault();
		var obj = $(form), action = obj.attr('name');
		$('.save').prop('disabled', true);

		$.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data: obj.serialize() + "&is_ajax=1&add_type=transfer&form=" + action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					window.location = base_url + '/transactions';
					$('.save').prop('disabled', false);
				}
			}
		});
	}
	// });
});
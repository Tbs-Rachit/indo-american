$(document).ready(function () {
	var xin_table = $('#xin_table').dataTable({
		"bDestroy": true,
		"ajax": {
			url: base_url + "/trainer_list/",
			type: 'GET'
		},
		"fnDrawCallback": function (settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width: '100%' });
	//$('#expertise').trumbowyg();
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
	$('.edit-modal-data').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var trainer_id = button.data('trainer_id');
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data: 'jd=1&is_ajax=1&mode=modal&data=trainer&trainer_id=' + trainer_id,
			success: function (response) {
				if (response) {
					$("#ajax_modal").html(response);
				}
			}
		});
	});
	$('.view-modal-data').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var trainer_id = button.data('trainer_id');
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data: 'jd=1&is_ajax=1&mode=modal&data=view_trainer&trainer_id=' + trainer_id,
			success: function (response) {
				if (response) {
					$("#ajax_modal_view").html(response);
				}
			}
		});
	});

	/* Add data */ /*Form Submit*/
	$("#xin-form").validate({
		rules: {
			first_name: {
				required: true,
				lettersonly: true,
			},
			last_name: {
				required: true,
				lettersonly: true,
			},
			contact_number: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10,
			},
			email: {
				required: true,
				email: true
			},
			company: { required: true },
		},
		// Specify validation error messages
		messages: {
			first_name: { required: "Please enter firstname" },
			last_name: { required: "Please enter lastname" },
			contact_number: { required: "Please enter contact number" },
			email: { required: "Please enter email" },
			company: { required: "Please select company" },
		},
		submitHandler: function (form) {
			add_trainer_formSubmit(form);
		}
	});

	// $("#xin-form").submit(function (e) {
	function add_trainer_formSubmit(form) {
		// e.preventDefault();
		var obj = $(form), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$(".icon-spinner3").show();
		$.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data: obj.serialize() + "&is_ajax=1&add_type=trainer&form=" + action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
					$(".icon-spinner3").hide();
				} else {
					xin_table.api().ajax.reload(function () {
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					$('.add-form').removeClass('in');
					$('.select2-selection__rendered').html('--Select--');
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
	$('#delete_record').attr('action', base_url + '/delete/' + $(this).data('record-id')) + '/';
});

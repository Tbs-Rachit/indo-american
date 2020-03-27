$(document).ready(function () {
	var xin_table = $('#xin_table').dataTable({
		"bDestroy": true,
		"ajax": {
			url: base_url + "/goal_tracking_list/",
			type: 'GET'
		},
		"fnDrawCallback": function (settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width: '100%' });
	//$('#description').trumbowyg();
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
		var tracking_id = button.data('tracking_id');
		var modal = $(this);
		$.ajax({
			url: base_url + "/read_goal/",
			type: "GET",
			data: 'jd=1&is_ajax=1&mode=modal&data=tracking&tracking_id=' + tracking_id,
			success: function (response) {
				if (response) {
					$("#ajax_modal").html(response);
				}
			}
		});
	});

	$('.view-modal-data').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var tracking_id = button.data('tracking_id');
		var modal = $(this);
		$.ajax({
			url: base_url + '/read_goal/',
			type: "GET",
			data: 'jd=1&is_ajax=1&mode=modal&data=view_tracking&tracking_id=' + tracking_id,
			success: function (response) {
				if (response) {
					$("#ajax_modal_view").html(response);
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
			company: { required: true },
			tracking_type: { required: true },
			subject: { required: true },
			target_achiement: { required: true },
			start_date: { required: true },
			end_date: { required: true },
		},
		// Specify validation error messages
		messages: {
			company: { required: "Please select company" },
			tracking_type: { required: "Please select tracking type" },
			subject: { required: "Please enter subject" },
			start_date: { required: "Please enter start date" },
			end_date: { required: "Please enter end date" },
		},
		submitHandler: function (form) {
			edit_goal_formSubmit(form);
		}
	});

	// $("#xin-form").submit(function (e) {
	function edit_goal_formSubmit(form) {
		// e.preventDefault();
		var obj = $(form), action = obj.attr('name');
		$('.save').prop('disabled', true);
		$(".icon-spinner3").show();
		$.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data: obj.serialize() + "&is_ajax=1&add_type=tracking&form=" + action,
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
					$('.add-form').removeClass('in');
					$('.select2-selection__rendered').html('--Select--');
					$(".icon-spinner3").hide();
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
	$('#delete_record').attr('action', base_url + '/tracking_delete/' + $(this).data('record-id')) + '/';
});

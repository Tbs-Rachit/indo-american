$(document).ready(function () {
	var xin_table = $('#xin_table').dataTable({
		"bDestroy": true,
		"ajax": {
			url: base_url + "/training_list/",
			type: 'GET'
		},
		"fnDrawCallback": function (settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width: '100%' });
	//$('#description').trumbowyg();
	jQuery("#aj_company").change(function () {
		jQuery.get(base_url + "/get_employees/" + jQuery(this).val(), function (data, status) {
			jQuery('#employee_ajax').html(data);
		});
	});
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
		var training_id = button.data('training_id');
		var modal = $(this);
		$.ajax({
			url: base_url + "/read/",
			type: "GET",
			data: 'jd=1&is_ajax=1&mode=modal&data=training&training_id=' + training_id,
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
			company: { required: true },
			training_type: { required: true },
			trainer: { required: true },
			training_cost: {
				required: true,
				number: true
			},
			'employee_id[]': { required: true },
			start_date: { required: true },
			end_date: { required: true },
		},
		// Specify validation error messages
		messages: {
			company: { required: "Please select company" },
			training_type: { required: "Please select training type" },
			trainer: { required: "Please select trainer" },
			training_cost: { required: "Please enter training cost" },
			'employee_id[]': { required: "Please select employee" },
			start_date: { required: "Please enter start date" },
			end_date: { required: "Please enter end date" },
		},
		submitHandler: function (form) {
			add_trainingformSubmit(form);
		}
	});

	// $("#xin-form").submit(function(e){
	function add_trainingformSubmit(form) {
		var fd = new FormData(form);
		var obj = $(form), action = obj.attr('name');
		fd.append("is_ajax", 1);
		fd.append("add_type", 'training');
		fd.append("form", action);
		// e.preventDefault();
		$('.icon-spinner3').show();
		$('.save').prop('disabled', true);
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
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
					$('.icon-spinner3').hide();
				} else {
					xin_table.api().ajax.reload(function () {
						toastr.success(JSON.result);
					}, true);
					$('.icon-spinner3').hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$('#xin-form')[0].reset(); // To reset form fields
					$('.add-form').removeClass('in');
					$('.select2-selection__rendered').html('--Select--');
					$('.save').prop('disabled', false);
				}
			},
			error: function () {
				toastr.error(JSON.error);
				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				$('.icon-spinner3').hide();
				$('.save').prop('disabled', false);
			}
		});
	}
	// });
});
$(document).on("click", ".delete", function () {
	$('input[name=_token]').val($(this).data('record-id'));
	$('#delete_record').attr('action', base_url + '/delete/' + $(this).data('record-id')) + '/';
});

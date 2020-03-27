<?php
if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_document_type' && $_GET['type'] == 'ed_document_type') {
	$row = $this->Xin_model->read_document_type($_GET['field_id']);
?>

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_document_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_document_type_info', 'id' => 'ed_document_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->document_type_id, 'ext_name' => $row[0]->document_type); ?>
	<?php echo form_open('admin/settings/update_document_type/' . $row[0]->document_type_id, $attributes, $hidden); ?>
	<div class="modal-body">
		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_e_details_dtype'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_dtype'); ?>" value="<?php echo $row[0]->document_type; ?>">
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<input type="checkbox" name="title" <?= $row[0]->is_title == 1 ? 'checked' : ''; ?>>
						<label for="name">Name</label>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<input type="checkbox" name="address" <?= $row[0]->is_address == 1 ? 'checked' : ''; ?>>
						<label for="name">Address</label>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<input type="checkbox" name="no" <?= $row[0]->is_no == 1 ? 'checked' : ''; ?>>
						<label for="name">No.</label>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<input type="checkbox" name="date_of_create" <?= $row[0]->is_create_date == 1 ? 'checked' : ''; ?>>
						<label for="name">Date Of Create</label>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<input type="checkbox" name="date_of_expiry" <?= $row[0]->is_expiry_date == 1 ? 'checked' : ''; ?>>
						<label for="name">Date Of expiry</label>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<input type="checkbox" name="email" <?= $row[0]->is_notif_email == 1 ? 'checked' : ''; ?>>
						<label for="name">email</label>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<div class="form-group">
						<input type="checkbox" name="file" <?= $row[0]->is_file == 1 ? 'checked' : ''; ?>>
						<label for="name">File</label>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_document_type_info").validate({
				rules: {
					name: {
						required: true,
						alphabetsnspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter document type"
					},
				},
				submitHandler: function(form) {
					document_type_info_form(form);
				}
			});

			// $("#ed_document_type_info").submit(function(e) {
			function document_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=21&type=edit_record&data=ed_document_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_document_type = $('#xin_table_document_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/document_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_document_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_contract_type' && $_GET['type'] == 'ed_contract_type') {
	$row = $this->Xin_model->read_contract_type($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_contract_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_contract_type_info', 'id' => 'ed_contract_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->contract_type_id, 'ext_name' => $row[0]->name); ?>
	<?php echo form_open('admin/settings/update_contract_type/' . $row[0]->contract_type_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_e_details_contract_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_contract_type'); ?>" value="<?php echo $row[0]->name ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_contract_type_info").validate({
				rules: {
					name: {
						required: true,
						alphabetsnspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter contract type name"
					},
				},
				submitHandler: function(form) {
					update_contract_type_info_form(form);
				}
			});

			// $("#ed_contract_type_info").submit(function(e) {
			function update_contract_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=22&type=edit_record&data=ed_contract_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_contract_type = $('#xin_table_contract_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/contract_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_contract_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_payment_method' && $_GET['type'] == 'ed_payment_method') {
	$row = $this->Xin_model->read_payment_method($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_payment_method'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_payment_method_info', 'id' => 'ed_payment_method_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->payment_method_id, 'ext_name' => $row[0]->method_name); ?>
	<?php echo form_open('admin/settings/update_payment_method/' . $row[0]->payment_method_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_payment_method'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="Enter <?php echo $this->lang->line('xin_payment_method'); ?>" value="<?php echo $row[0]->method_name; ?>">
		</div>
		<div class="form-group">
			<label for="payment_percentage" class="form-control-label"><?php echo $this->lang->line('xin_payroll_pdf_pay_percent'); ?>:</label>
			<input type="text" class="form-control" name="payment_percentage" placeholder="Enter <?php echo $this->lang->line('xin_payroll_pdf_pay_percent'); ?>" value="<?php echo $row[0]->payment_percentage; ?>">
		</div>
		<div class="form-group">
			<label for="account_number" class="form-control-label"><?php echo $this->lang->line('xin_payroll_pdf_acc_number'); ?>:</label>
			<input type="text" class="form-control" name="account_number" placeholder="Enter <?php echo $this->lang->line('xin_payroll_pdf_acc_number'); ?>" value="<?php echo $row[0]->account_number; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_payment_method_info").validate({
				rules: {
					name: {
						required: true,
						letterswithspace: true
					},
					payment_percentage: {
						required: true,
						number: true
					},
					account_number: {
						required: true,
						number: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter payment method"
					},
					payment_percentage: {
						required: "Please enter payment percentage"
					},
					account_number: {
						required: "Please enter account number"
					},
				},
				submitHandler: function(form) {
					payment_method_info_form(form);
				}
			});

			// $("#ed_payment_method_info").submit(function(e) {
			function payment_method_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=23&type=edit_record&data=ed_payment_method_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_payment_method = $('#xin_table_payment_method').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/payment_method_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_payment_method.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_education_level' && $_GET['type'] == 'ed_education_level') {
	$row = $this->Xin_model->read_education_level($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_education_level'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_education_level_info', 'id' => 'ed_education_level_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->education_level_id, 'ext_name' => $row[0]->name); ?>
	<?php echo form_open('admin/settings/update_education_level/' . $row[0]->education_level_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_e_details_edu_level'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_edu_level'); ?>" value="<?php echo $row[0]->name; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_education_level_info").validate({
				rules: {
					name: {
						required: true,
						alphabetsnspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter education level"
					},
				},
				submitHandler: function(form) {
					edu_level_info_form(form);
				}
			});

			// $("#ed_education_level_info").submit(function(e) {
			function edu_level_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=24&type=edit_record&data=ed_education_level_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_education_level = $('#xin_table_education_level').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/education_level_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_education_level.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_qualification_language' && $_GET['type'] == 'ed_qualification_language') {
	$row = $this->Xin_model->read_qualification_language($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit'); ?> <?php echo $this->lang->line('xin_e_details_language'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_qualification_language_info', 'id' => 'ed_qualification_language_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->language_id, 'ext_name' => $row[0]->name); ?>
	<?php echo form_open('admin/settings/update_qualification_language/' . $row[0]->language_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_e_details_language'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_language'); ?>" value="<?php echo $row[0]->name; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_qualification_language_info").validate({
				rules: {
					name: {
						required: true,
						alphabetsnspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter language"
					},
				},
				submitHandler: function(form) {
					edu_language_info_form(form);
				}
			});
			// $("#ed_qualification_language_info").submit(function(e) {
			function edu_language_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=25&type=edit_record&data=ed_qualification_language_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_qualification_language = $('#xin_table_qualification_language').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/qualification_language_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_qualification_language.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_qualification_skill' && $_GET['type'] == 'ed_qualification_skill') {
	$row = $this->Xin_model->read_qualification_skill($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_skill'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_qualification_skill_info', 'id' => 'ed_qualification_skill_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->skill_id, 'ext_name' => $row[0]->name); ?>
	<?php echo form_open('admin/settings/update_qualification_skill/' . $row[0]->skill_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_skill'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_skill'); ?>" value="<?php echo $row[0]->name; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_qualification_skill_info").validate({
				rules: {
					name: {
						required: true,
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter skill name"
					},
				},
				submitHandler: function(form) {
					edu_skill_info_form(form);
				}
			});
			// $("#ed_qualification_skill_info").submit(function(e) {
			function edu_skill_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=26&type=edit_record&data=ed_qualification_skill_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_qualification_skill = $('#xin_table_qualification_skill').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/qualification_skill_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_qualification_skill.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_award_type' && $_GET['type'] == 'ed_award_type') {
	$row = $this->Xin_model->read_award_type($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_award_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_award_type_info', 'id' => 'ed_award_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->award_type_id, 'ext_name' => $row[0]->award_type); ?>
	<?php echo form_open('admin/settings/update_award_type/' . $row[0]->award_type_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_award_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_award_type'); ?>" value="<?php echo $row[0]->award_type; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_award_type_info").validate({
				rules: {
					name: {
						required: true,
						alphanumerics: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter award type"
					},
				},
				submitHandler: function(form) {
					award_type_info_form(form);
				}
			});

			// $("#ed_award_type_info").submit(function(e) {
			function award_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=38&type=edit_record&data=ed_award_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_award_type = $('#xin_table_award_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/award_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_award_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_leave_type' && $_GET['type'] == 'ed_leave_type') {
	$row = $this->Xin_model->read_leave_type($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_leave_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_leave_type_info', 'id' => 'ed_leave_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->leave_type_id, 'ext_name' => $row[0]->type_name); ?>
	<?php echo form_open('admin/settings/update_leave_type/' . $row[0]->leave_type_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_leave_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_leave_type'); ?>" value="<?php echo $row[0]->type_name; ?>">
		</div>
		<div class="form-group">
			<label for="days_per_year" class="form-control-label"><?php echo $this->lang->line('xin_days_per_year'); ?>:</label>
			<input type="text" class="form-control" name="days_per_year" placeholder="<?php echo $this->lang->line('xin_days_per_year'); ?>" value="<?php echo $row[0]->days_per_year ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
		</div>
		<div class="form-group">
			<label for="days_per_year" class="form-control-label"><?php echo $this->lang->line('xin_days_per_month'); ?>:</label>
			<input type="text" class="form-control" name="days_per_month" placeholder="<?php echo $this->lang->line('xin_days_per_month'); ?>" value="<?php echo $row[0]->days_per_month ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
		</div>
		<div class="form-group">
			<label for="days_per_year" class="form-control-label"><?php echo $this->lang->line('xin_carry_forward_encash'); ?>:</label>
			<select class="form-control" data-plugin="select_hrm" name="carry_end_cash" id="carry_end_cash" data-placeholder="<?php echo $this->lang->line('xin_carry_forward_encash'); ?>">
				<option></option>
				<option value="1" <?= $row[0]->is_carry_end_cash == 1 ?  "selected" : ""; ?>><?= $this->lang->line('xin_carry_forward'); ?></option>
				<option value="2" <?= $row[0]->is_carry_end_cash == 2 ?  "selected" : ""; ?>><?= $this->lang->line('xin_encash'); ?></option>
				<option value="3" <?= $row[0]->is_carry_end_cash == 3 ?  "selected" : ""; ?>><?= $this->lang->line('xin_nothing'); ?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_paid_not'); ?></label>
			<select class="form-control" data-plugin="select_hrm" name="paid_not" id="paid_not" data-placeholder="<?php echo $this->lang->line('xin_paid_not'); ?>">
				<option></option>
				<option value="1" <?= $row[0]->is_paid_not == 1 ?  "selected" : ""; ?>><?= $this->lang->line('xin_paid'); ?></option>
				<option value="2" <?= $row[0]->is_paid_not == 2 ?  "selected" : ""; ?>><?= $this->lang->line('xin_not_paid'); ?></option>
			</select>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_leave_type_info").validate({
				rules: {
					name: {
						required: true,
						alphabetsnspace: true
					},
					days_per_year: {
						required: true,
						number: true
					},
					days_per_month: {
						required: true,
						number: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter leave type"
					},
					days_per_year: {
						required: "Please enter days per year"
					},
					days_per_month: {
						required: "Please enter days per month"
					},
				},
				submitHandler: function(form) {
					leave_type_info_form(form);
				}
			});

			// $("#ed_leave_type_info").submit(function(e) {
			function leave_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=39&type=edit_record&data=ed_leave_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_leave_type = $('#xin_table_leave_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/leave_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_leave_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
	<!------------------------------------------------------ Edit Salary Benefit ------------------------------------------------------>

<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_salary_benefit' && $_GET['type'] == 'ed_salary_benefit') {
	$row = $this->Xin_model->read_salary_benefit($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_salary_benefit'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_salary_benefit_info', 'id' => 'ed_salary_benefit_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->salary_benefit_id, 'ext_name' => $row[0]->salary_benefit_type); ?>
	<?php echo form_open('admin/settings/update_salary_benefit/' . $row[0]->salary_benefit_id, $attributes, $hidden); ?>
	<div class="modal-body selectdiv">
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_company_name'); ?></label>
			<select class="form-control" name="company_id_salb" data-plugin="select_hrm" id="company_id_salb">
				<option value=""><?= $this->lang->line('xin_company_name_select') ?></option>
				<?php foreach ($all_companies as $company) { ?>
					<option value="<?php echo $company->company_id ?>" <?= $company->company_id == $row[0]->company_id ? "Selected" : '';  ?>><?php echo $company->name ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_salary_benefit_type'); ?></label>
			<select class="form-control" name="salary_benefit_type" data-plugin="select_hrm" id="salary_benefit_type">
				<option value=""><?= $this->lang->line('xin_salary_benefit_type'); ?></option>
				<option value="1" <?= $row[0]->salary_benefit_type == 1 ? 'Selected' : ''; ?>><?= $this->lang->line('xin_salary_allowance') ?></option>
				<option value="2" <?= $row[0]->salary_benefit_type == 2 ? 'Selected' : ''; ?>><?= $this->lang->line('xin_salary_deduction') ?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_salary_benefit_name'); ?></label>
			<input type="text" class="form-control" name="salary_benefit_name" id="salary_benefit_name" placeholder="<?php echo $this->lang->line('xin_salary_benefit_name'); ?>" value="<?= $row[0]->salary_benefit_name ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_salary_benefit_info").validate({
				rules: {
					company_id_salb: {
						required: true,
					},
					salary_benefit_name: {
						required: true,
						alphanumerics: true
					},
				},
				// Specify validation error messages
				messages: {
					company_id_salb: {
						required: "Please enter company name"
					},
					salary_benefit_name: {
						required: "Please enter salary benefit name"
					},
				},
				submitHandler: function(form) {
					salary_benefit_info_form(form);
				}
			});

			// $("#ed_salary_benefit_info").submit(function(e) {
			function salary_benefit_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=50&type=edit_record&data=ed_salary_benefit_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_salary_benefit = $('#xin_table_salary_benefit').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/salary_benefit_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_salary_benefit.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>

	<!--------------------------------------------------------- Edit Grade benefit Setting --------------------------------------------------------->

<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_grade_benefit_setting' && $_GET['type'] == 'ed_grade_benefit_setting') {
	$row = $this->Xin_model->read_grade_benefit_setting($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_grade_benefit_setting'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_grade_benefit_setting_info', 'id' => 'ed_grade_benefit_setting_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->grade_benefit_id, 'ext_name' => $row[0]->grade_id); ?>
	<?php echo form_open('admin/settings/update_gade_benefit_setting/' . $row[0]->grade_benefit_id, $attributes, $hidden); ?>
	<div class="modal-body">
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_company_name'); ?></label>
			<select class="form-control" name="company_id_aj_d" data-plugin="select_hrm" id="company_id_aj_d">
				<option value=""><?= $this->lang->line('xin_company_name_select') ?></option>
				<?php foreach ($all_companies as $company) { ?>
					<option value="<?php echo $company->company_id ?>" <?= $row[0]->company_id == $company->company_id ? 'Selected' : '';  ?>><?php echo $company->name ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group" id="grade_ajax_d">
			<label for="name"><?php echo $this->lang->line('xin_grade_name'); ?></label>
			<select class="form-control" name="grade_id_d" data-plugin="select_hrm" id="grade_id_d">
				<option value=""><?= $this->lang->line('xin_grade_name_select') ?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_grade_benefit_type'); ?></label>
			<select name="benefit_type_aj_d" id="benefit_type_aj_d" class="form-control" data-plugin="select_hrm">
				<option value=""><?= $this->lang->line('xin_grade_benefit_type_select') ?></option>
				<option value="1" <?= $row[0]->grade_benefit_type == 1 ? 'Selected' : '';  ?>><?= $this->lang->line('xin_salary_allowance') ?></option>
				<option value="2" <?= $row[0]->grade_benefit_type == 2 ? 'Selected' : '';  ?>><?= $this->lang->line('xin_salary_deduction') ?></option>
			</select>
		</div>
		<div class="form-group" id="benefit_aj_d">
			<label for="name"><?php echo $this->lang->line('xin_grade_benefit_name'); ?></label>
			<select name="benefit_name_aj" id="benefit_name_aj" class="form-control" data-plugin="select_hrm">
				<option value=""><?= $this->lang->line('xin_grade_benefit_name_select'); ?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="name"><?= $this->lang->line('xin_amount_type') ?></label>
			<select name="amount_type" id="amount_type_d" class="form-control" data-plugin="select_hrm">
				<option value=""><?= $this->lang->line('xin_grade_benefit_amount_type_select'); ?></option>
				<option value="1" <?= $row[0]->grade_amount_type == 1 ? 'Selected' : '';  ?>><?= $this->lang->line('xin_grade_benefit_amount_flat_select'); ?></option>
				<option value="2" <?= $row[0]->grade_amount_type == 2 ? 'Selected' : '';  ?>><?= $this->lang->line('xin_grade_benefit_amount_pr_select'); ?></option>
				<!-- <option value="3" <?= $row[0]->grade_amount_type == 3 ? 'Selected' : '';  ?>><?= $this->lang->line('xin_grade_benefit_amount_slab_select'); ?></option> -->
			</select>
		</div>
		<div class="form-group" id="salary_amount_d">
			<label for="name"><?= $this->lang->line('xin_salary_amount') ?></label>
			<select name="salary_amount_type" id="salary_amount_type" data-id="salary_amount_type" class="form-control amounttype" data-plugin="select_hrm">
				<option value="1" <?= $row[0]->salary_amount_type == 1 ? 'Selected' : '';  ?>><?= $this->lang->line('xin_basic_salary'); ?></option>
				<option value="2" <?= $row[0]->salary_amount_type == 2 ? 'Selected' : '';  ?>><?= $this->lang->line('xin_gross_salary'); ?></option>
			</select>
		</div>
		<div class="form-group">
			<label for="name"><?= $this->lang->line('xin_amount') ?></label>
			<input name="grade_amount" id="grade_amount" class="form-control" value="<?= $row[0]->grade_amount ?>" placeholder="<?= $this->lang->line('xin_amount') ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			if ($('#amount_type_d').val() == 2) {
					$('#salary_amount_d').show()
				} else {
					$('#salary_amount_d').hide()
				}
			$('#amount_type_d').change(function() {
				if ($(this).val() == 2) {
					$('#salary_amount_d').show()
				} else {
					$('#salary_amount_d').hide()
				}
			});
			jQuery("#company_id_aj_d").change(function() {
				jQuery.get(base_url + "/get_grade_d/" + jQuery(this).val() + "/" + <?= $row[0]->grade_id ?>, function(
					data,
					status
				) {
					jQuery("#grade_ajax_d").html(data);
				});
			}).change();

			jQuery('#benefit_type_aj_d').change(function() {
				jQuery.get(base_url + "/get_benefits_d/" + jQuery(this).val() + "/" + <?= $row[0]->company_id ?> + "/" + <?= $row[0]->grade_id ?> + "/" + <?= $row[0]->benefit_id ?>, function(
					data,
					status
				) {
					jQuery("#benefit_aj_d").html(data);
				});
			}).change();

			/* Edit data */
			$("#ed_grade_benefit_setting_info").submit(function(e) {
				/*Form Submit*/
				e.preventDefault();
				var obj = $(this),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					url: e.target.action,
					data: obj.serialize() + "&is_ajax=50&type=edit_record&data=ed_grade_benefit_setting_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_grade_benefit_setting = $('#xin_table_grade_benefit_setting').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/grade_benefit_setting_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_grade_benefit_setting.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			});
		});
	</script>

	<!--------------------------------------------------------- Edit Grade Setting --------------------------------------------------------->
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_grade_setting' && $_GET['type'] == 'ed_grade_setting') {
	$row = $this->Xin_model->read_grade_setting($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_grade_setting'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_grade_setting_info', 'id' => 'ed_grade_setting_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->grade_id, 'ext_name' => $row[0]->grade_name); ?>
	<?php echo form_open('admin/settings/update_gade_setting/' . $row[0]->grade_id, $attributes, $hidden); ?>
	<div class="modal-body">
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_company_name'); ?></label>
			<select class="form-control" name="company_id" data-plugin="select_hrm" id="company_id">
				<?php foreach ($all_companies as $company) { ?>
					<option value="<?php echo $company->company_id ?>" <?= $row[0]->company_id == $company->company_id ? 'Selected' : '';  ?>><?php echo $company->name ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_grade_name'); ?></label>
			<input type="text" class="form-control" name="grade_name" id="grade_name" placeholder="<?php echo $this->lang->line('xin_grade_name'); ?> " value="<?= $row[0]->grade_name ?>">
		</div>
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_grade_range_from'); ?></label>
			<input type="text" class="form-control" name="grade_range_from" id="grade_range_from_d" placeholder="<?php echo $this->lang->line('xin_grade_range_from'); ?> " oninput='this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*)\./g, "$1");' value="<?= $row[0]->grade_range_from ?>">
		</div>
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_grade_range_to'); ?></label>
			<input type="text" class="form-control" name="grade_range_to" id="grade_range_to_d" placeholder="<?php echo $this->lang->line('xin_grade_range_to'); ?> " oninput='this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*)\./g, "$1");' value="<?= $row[0]->grade_range_to ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_grade_setting_info").validate({
				rules: {
					grade_name: {
						required: true,
					},
					grade_range_from: {
						required: true,
					},
					grade_range_to: {
						required: true,
						greaterThanEqual: "#grade_range_from_d"
					},
				},
				// Specify validation error messages
				messages: {
					grade_name: {
						required: "Please enter grade name"
					},
					grade_range_from: {
						required: "Please enter lower limit"
					},
					grade_range_to: {
						required: "Please enter upper limit",
						greaterThanEqual: "Must be greater than lower limit",
					},
				},
				submitHandler: function(form) {
					grade_setting_info_form(form);
				}
			});

			// $("#ed_grade_setting_info").submit(function(e) {
			function grade_setting_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					url: form.action,
					data: obj.serialize() + "&is_ajax=50&type=edit_record&data=ed_grade_setting_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_grade_setting = $('#xin_table_grade_setting').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/grade_setting_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_grade_setting.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>

	<!--------------------------------------------------------- Edit Warning Type --------------------------------------------------------->
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_warning_type' && $_GET['type'] == 'ed_warning_type') {
	$row = $this->Xin_model->read_warning_type($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_warning_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_warning_type_info', 'id' => 'ed_warning_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->warning_type_id, 'ext_name' => $row[0]->type); ?>
	<?php echo form_open('admin/settings/update_warning_type/' . $row[0]->warning_type_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_warning_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_warning_type'); ?>" value="<?php echo $row[0]->type; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_warning_type_info").validate({
				rules: {
					name: {
						required: true,
						letterswithspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter warning type"
					},
				},
				submitHandler: function(form) {
					warning_type_info_form(form);
				}
			});

			// $("#ed_warning_type_info").submit(function(e) {
			function warning_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=40&type=edit_record&data=ed_warning_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_warning_type = $('#xin_table_warning_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/warning_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_warning_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_termination_type' && $_GET['type'] == 'ed_termination_type') {
	$row = $this->Xin_model->read_termination_type($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_termination_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_termination_type_info', 'id' => 'ed_termination_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->termination_type_id, 'ext_name' => $row[0]->type); ?>
	<?php echo form_open('admin/settings/update_termination_type/' . $row[0]->termination_type_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_termination_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_termination_type'); ?>" value="<?php echo $row[0]->type; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_termination_type_info").validate({
				rules: {
					name: {
						required: true,
						letterswithspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter termination type"
					},
				},
				submitHandler: function(form) {
					termination_type_info_form(form);
				}
			});

			// $("#ed_termination_type_info").submit(function(e) {
			function termination_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=41&type=edit_record&data=ed_termination_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_termination_type = $('#xin_table_termination_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/termination_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_termination_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_expense_type' && $_GET['type'] == 'ed_expense_type') {
	$row = $this->Xin_model->read_expense_type($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_expense_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_expense_type_info', 'id' => 'ed_expense_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->expense_type_id, 'ext_name' => $row[0]->name); ?>
	<?php echo form_open('admin/settings/update_expense_type/' . $row[0]->expense_type_id, $attributes, $hidden); ?>
	<div class="modal-body">
		<div class="form-group">
			<label for="company_name"><?php echo $this->lang->line('module_company_title'); ?></label>
			<select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title'); ?>">
				<option value=""><?php echo $this->lang->line('xin_select_one'); ?></option>
				<?php foreach ($this->Xin_model->get_companies() as $company) { ?>
					<option value="<?php echo $company->company_id; ?>" <?php if ($company->company_id == $row[0]->company_id) : ?> selected="selected" <?php endif; ?>> <?php echo $company->name; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_expense_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_expense_type'); ?>" value="<?php echo $row[0]->name; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_expense_type_info").validate({
				rules: {
					company: {
						required: true
					},
					name: {
						required: true,
						letterswithspace: true
					},
				},
				// Specify validation error messages
				messages: {
					company: {
						required: "Please select company"
					},
					name: {
						required: "Please enter expense type"
					},
				},
				submitHandler: function(form) {
					expense_type_info_form(form);
				}
			});

			// $("#ed_expense_type_info").submit(function(e) {
			function expense_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=42&type=edit_record&data=ed_expense_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_expense_type = $('#xin_table_expense_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/expense_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_expense_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_job_type' && $_GET['type'] == 'ed_job_type') {
	$row = $this->Xin_model->read_job_type($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_job_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_job_type_info', 'id' => 'ed_job_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->job_type_id, 'ext_name' => $row[0]->type); ?>
	<?php echo form_open('admin/settings/update_job_type/' . $row[0]->job_type_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_job_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_job_type'); ?>" value="<?php echo $row[0]->type; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_job_type_info").validate({
				rules: {
					name: {
						required: true,
						letterswithspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter job type"
					},
				},
				submitHandler: function(form) {
					job_type_info_form(form);
				}
			});
			// $("#ed_job_type_info").submit(function(e) {
			function job_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					url: form.action,
					// url: e.target.action,
					data: obj.serialize() + "&is_ajax=43&type=edit_record&data=ed_job_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_job_type = $('#xin_table_job_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/job_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_job_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_job_category' && $_GET['type'] == 'ed_job_category') {
	$row = $this->Xin_model->read_job_category($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_rec_edit_job_category'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_job_category_info', 'id' => 'ed_job_category_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->category_id, 'ext_name' => $row[0]->category_name); ?>
	<?php echo form_open('admin/settings/update_job_category/' . $row[0]->category_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="job_category" class="form-control-label"><?php echo $this->lang->line('xin_rec_job_category'); ?>:</label>
			<input type="text" class="form-control" name="job_category" placeholder="<?php echo $this->lang->line('xin_rec_job_category'); ?>" value="<?php echo $row[0]->category_name; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_job_category_info").validate({
				rules: {
					job_category: {
						required: true,
						letterswithspace: true
					},
				},
				// Specify validation error messages
				messages: {
					job_category: {
						required: "Please enter job category"
					},
				},
				submitHandler: function(form) {
					job_category_info_form(form);
				}
			});

			// $("#ed_job_category_info").submit(function(e) {
			function job_category_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=43&type=edit_record&data=ed_job_category_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_job_category = $('#xin_table_job_category').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 15,
								"aLengthMenu": [
									[15, 30, 50, 100, -1],
									[15, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/job_category_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_job_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_exit_type' && $_GET['type'] == 'ed_exit_type') {
	$row = $this->Xin_model->read_exit_type($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_employee_exit_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_exit_type_info', 'id' => 'ed_exit_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->exit_type_id, 'ext_name' => $row[0]->type); ?>
	<?php echo form_open('admin/settings/update_exit_type/' . $row[0]->exit_type_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_employee_exit_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_employee_exit_type'); ?>" value="<?php echo $row[0]->type; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_exit_type_info").validate({
				rules: {
					name: {
						required: true,
						letterswithspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter exit type"
					},
				},
				submitHandler: function(form) {
					exit_type_info_form(form);
				}
			});


			// $("#ed_exit_type_info").submit(function(e) {
			function exit_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=44&type=edit_record&data=ed_exit_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_exit_type = $('#xin_table_exit_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/exit_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_exit_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_travel_arr_type' && $_GET['type'] == 'ed_travel_arr_type') {
	$row = $this->Xin_model->read_travel_arr_type($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_travel_arr_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_travel_arr_type_info', 'id' => 'ed_travel_arr_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->arrangement_type_id, 'ext_name' => $row[0]->type); ?>
	<?php echo form_open('admin/settings/update_travel_arr_type/' . $row[0]->arrangement_type_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_travel_arrangement_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_travel_arrangement_type'); ?>" value="<?php echo $row[0]->type; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_travel_arr_type_info").validate({
				rules: {
					name: {
						required: true,
						letterswithspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter travel arrangement type"
					},
				},
				submitHandler: function(form) {
					travel_arr_type_info_form(form);
				}
			});

			// $("#ed_travel_arr_type_info").submit(function(e) {
			function travel_arr_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=46&type=edit_record&data=ed_travel_arr_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_travel_arr_type = $('#xin_table_travel_arr_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/travel_arr_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_travel_arr_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_currency_type' && $_GET['type'] == 'ed_currency_type') {
	$row = $this->Xin_model->read_currency_types($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_currency_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_currency_type_info', 'id' => 'ed_currency_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->currency_id, 'ext_name' => $row[0]->name); ?>
	<?php echo form_open('admin/settings/update_currency_type/' . $row[0]->currency_id, $attributes, $hidden); ?>
	<div class="modal-body">

		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_currency_name'); ?></label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_currency_name'); ?>" value="<?php echo $row[0]->name; ?>">
		</div>
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_currency_code'); ?></label>
			<input type="text" class="form-control" name="code" placeholder="<?php echo $this->lang->line('xin_currency_code'); ?>" value="<?php echo $row[0]->code; ?>">
		</div>
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_currency_symbol'); ?></label>
			<input type="text" class="form-control" name="symbol" placeholder="<?php echo $this->lang->line('xin_currency_symbol'); ?>" value="<?php echo $row[0]->symbol; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_currency_type_info").validate({
				rules: {
					name: {
						required: true,
						letterswithspace: true
					},
					code: {
						required: true,
						lettersonly: true
					},
					symbol: {
						required: true,
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter currency name"
					},
					code: {
						required: "Please enter currency code"
					},
					symbol: {
						required: "Please enter currency symbol"
					},
				},
				submitHandler: function(form) {
					currency_type_info_form(form);
				}
			});
			// $("#ed_currency_type_info").submit(function(e) {
			function currency_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=46&type=edit_record&data=ed_currency_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_currency_type = $('#xin_table_currency_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/currency_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_currency_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_company_type' && $_GET['type'] == 'ed_company_type') {
	$row = $this->Xin_model->read_company_type($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_company_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_company_type_info', 'id' => 'ed_company_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->type_id, 'ext_name' => $row[0]->name); ?>
	<?php echo form_open('admin/settings/update_company_type/' . $row[0]->type_id, $attributes, $hidden); ?>
	<div class="modal-body">
		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_company_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_company_type'); ?>" value="<?php echo $row[0]->name; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_company_type_info").validate({
				rules: {
					name: {
						required: true,
						letterswithspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter company type"
					},
				},
				submitHandler: function(form) {
					company_type_info_form(form);
				}
			});

			// $("#ed_company_type_info").submit(function(e) {
			function company_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=46&type=edit_record&data=ed_company_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_company_type = $('#xin_table_company_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/company_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_company_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_security_level' && $_GET['type'] == 'ed_security_level') {
	$row = $this->Xin_model->read_security_level($_GET['field_id']);
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_security_level'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_security_level_info', 'id' => 'ed_security_level_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->type_id, 'ext_name' => $row[0]->name); ?>
	<?php echo form_open('admin/settings/update_security_level/' . $row[0]->type_id, $attributes, $hidden); ?>
	<div class="modal-body">
		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_security_level'); ?>:</label>
			<input type="text" class="form-control" name="security_level" placeholder="<?php echo $this->lang->line('xin_security_level'); ?>" value="<?php echo $row[0]->name; ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_security_level_info").validate({
				rules: {
					security_level: {
						required: true,
						letterswithspace: true
					},
				},
				// Specify validation error messages
				messages: {
					security_level: {
						required: "Please enter security type"
					},
				},
				submitHandler: function(form) {
					security_level_info_form(form);
				}
			});

			// $("#ed_security_level_info").submit(function(e) {
			function security_level_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=46&type=edit_record&data=ed_security_level_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var exin_table_security_level = $('#xin_table_security_level').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/security_level_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							exin_table_security_level.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['user_id']) && $_GET['data'] == 'password' && $_GET['type'] == 'password') { ?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('header_change_password'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'e_change_password', 'id' => 'profile_password', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', 'user_id' => $_GET['user_id']); ?>
	<?php echo form_open('admin/employees/change_password/' . $row[0]->currency_id, $attributes, $hidden); ?>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="new_password"><?php echo $this->lang->line('xin_e_details_enpassword'); ?></label>
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_enpassword'); ?>" name="new_password" type="text">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="new_password_confirm" class="control-label"><?php echo $this->lang->line('xin_e_details_ecnpassword'); ?></label>
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_ecnpassword'); ?>" name="new_password_confirm" type="text">
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			/* change password */
			jQuery("#profile_password").submit(function(e) {
				/*Form Submit*/
				e.preventDefault();
				var obj = jQuery(this),
					action = obj.attr('name');
				jQuery('.save').prop('disabled', true);
				jQuery.ajax({
					type: "POST",
					url: e.target.action,
					data: obj.serialize() + "&is_ajax=31&data=e_change_password&type=change_password&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							jQuery('.save').prop('disabled', false);
						} else {
							$('.pro_change_password').modal('toggle');
							toastr.success(JSON.result);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							jQuery('#profile_password')[0].reset(); // To reset form fields
							jQuery('.save').prop('disabled', false);
						}
					}
				});
			});
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['p']) && $_GET['data'] == 'policy' && $_GET['type'] == 'policy') {
?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_company_policy'); ?></h4>
	</div>
	<div class="modal-body">
		<div class="form-group">
			<div id="accordion" role="tablist" aria-multiselectable="true">
				<?php foreach ($this->Xin_model->all_policies() as $_policy) : ?>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $_policy->policy_id; ?>" aria-expanded="true" aria-controls="collapseOne">
									<?php
									if ($_policy->company_id == 0) {
										$cname = $this->lang->line('xin_all_companies');
									} else {
										$company = $this->Xin_model->read_company_info($_policy->company_id);
										if (!is_null($company)) {
											$cname = $company[0]->name;
										} else {
											$cname = '--';
										}
									}
									?>
									<?php echo $_policy->title; ?> (<?php echo $cname; ?>) </a> </h4>
						</div>
						<div id="collapse<?php echo $_policy->policy_id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne"> <?php echo html_entity_decode($_policy->description); ?> </div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
	</div>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'ed_promotion_type' && $_GET['type'] == 'ed_promotion_type') {
	$row = $this->Xin_model->read_promotion_type($_GET['field_id']);
?>

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_promotion_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'ed_promotion_type_info', 'id' => 'ed_promotion_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $row[0]->promotion_type_id, 'ext_name' => $row[0]->name); ?>
	<?php echo form_open('admin/settings/update_promotion_type/' . $row[0]->promotion_type_id, $attributes, $hidden); ?>
	<div class="modal-body">
		<div class="form-group">
			<label for="name"><?php echo $this->lang->line('xin_company_name'); ?></label>
			<select class="form-control" name="company_id" data-plugin="select_hrm" id="company_id">
				<?php foreach ($all_companies as $company) { ?>
					<option value="<?php echo $company->company_id ?>" <?= $row[0]->company_id == $company->company_id ? 'Selected' : '';  ?>><?php echo $company->name ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="name" class="form-control-label"><?php echo $this->lang->line('xin_e_details_promotion_type'); ?>:</label>
			<input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_promotion_type'); ?>" value="<?php echo $row[0]->name ?>">
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
		<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
	</div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			/* Edit data */
			$("#ed_promotion_type_info").validate({
				rules: {
					name: {
						required: true,
						alphabetsnspace: true
					},
				},
				// Specify validation error messages
				messages: {
					name: {
						required: "Please enter promotion type"
					},
				},
				submitHandler: function(form) {
					update_promotion_type_info_form(form);
				}
			});

			// $("#ed_contract_type_info").submit(function(e) {
			function update_promotion_type_info_form(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				console.log(form.action);
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=55&type=edit_record&data=ed_promotion_type_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit_setting_datail').modal('toggle');
							// On page load: datatable
							var xin_table_promotion_type = $('#xin_table_promotion_type').dataTable({
								"bDestroy": true,
								"bFilter": false,
								"iDisplayLength": 5,
								"aLengthMenu": [
									[5, 10, 30, 50, 100, -1],
									[5, 10, 30, 50, 100, "All"]
								],
								"ajax": {
									url: "<?php echo site_url("admin/settings/promotion_type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_promotion_type.api().ajax.reload(function() {
								toastr.success(JSON.result);
							}, true);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } ?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'emp_contact' && $_GET['type'] == 'emp_contact') {
?>

	<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_e_details_edit_contact'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'e_contact_info', 'id' => 'e_contact_info', 'autocomplete' => 'off'); ?>
	<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
	<?php echo form_open('admin/employees/e_contact_info', $attributes, $hidden); ?>
	<?php
	$edata_usr1 = array(
		'type'  => 'hidden',
		'id'  => 'user_id',
		'name'  => 'user_id',
		'value' => $employee_id,
	);
	echo form_input($edata_usr1);
	?>
	<?php
	$edata_usr2 = array(
		'type'  => 'hidden',
		'id'  => 'e_field_id',
		'name'  => 'e_field_id',
		'value' => $contact_id,
	);
	echo form_input($edata_usr2);
	?>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label for="relation"><?php echo $this->lang->line('xin_e_details_relation'); ?></label>
					<select class="form-control" name="relation" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_one'); ?>">
						<option value=""><?php echo $this->lang->line('xin_select_one'); ?></option>
						<option value="Self" <?php if ($relation == 'Self') { ?> selected="selected" <?php } ?>><?php echo $this->lang->line('xin_self'); ?></option>
						<option value="Parent" <?php if ($relation == 'Parent') { ?> selected="selected" <?php } ?>><?php echo $this->lang->line('xin_parent'); ?></option>
						<option value="Spouse" <?php if ($relation == 'Spouse') { ?> selected="selected" <?php } ?>><?php echo $this->lang->line('xin_spouse'); ?></option>
						<option value="Child" <?php if ($relation == 'Child') { ?> selected="selected" <?php } ?>><?php echo $this->lang->line('xin_child'); ?></option>
						<option value="Sibling" <?php if ($relation == 'Sibling') { ?> selected="selected" <?php } ?>><?php echo $this->lang->line('xin_sibling'); ?></option>
						<option value="In Laws" <?php if ($relation == 'In Laws') { ?> selected="selected" <?php } ?>><?php echo $this->lang->line('xin_in_laws'); ?></option>
					</select>
				</div>
			</div>
			<div class="col-md-7">
				<div class="form-group">
					<label for="work_email" class="control-label"><?php echo $this->lang->line('dashboard_email'); ?></label>
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_work'); ?>" name="work_email" type="text" value="<?php echo $work_email; ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label class="display-inline-block custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="is_primary" value="1" name="is_primary" <?php if ($is_primary == '1') { ?> checked="checked" <?php } ?>>
						<span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_e_details_pcontact'); ?></span> </label>
					&nbsp;
					<label class="display-inline-block custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="is_dependent" value="2" name="is_dependent" <?php if ($is_dependent == '2') { ?> checked="checked" <?php } ?>>
						<span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $this->lang->line('xin_e_details_dependent'); ?></span> </label>
				</div>
			</div>
			<div class="col-md-7">
				<div class="form-group">
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_personal'); ?>" name="personal_email" type="text" value="<?php echo $personal_email; ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label for="name" class="control-label"><?php echo $this->lang->line('xin_name'); ?></label>
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_name'); ?>" name="contact_name" type="text" value="<?php echo $contact_name; ?>">
				</div>
			</div>
			<div class="col-md-7">
				<div class="form-group" id="designation_ajax">
					<label for="address_1" class="control-label"><?php echo $this->lang->line('xin_address'); ?></label>
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_address_1'); ?>" name="address_1" type="text" value="<?php echo $address_1; ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label for="work_phone"><?php echo $this->lang->line('xin_phone'); ?></label>
					<div class="row">
						<div class="col-xs-8">
							<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_work'); ?>" name="work_phone" type="text" value="<?php echo $work_phone; ?>">
						</div>
						<div class="col-xs-4">
							<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_phone_ext'); ?>" name="work_phone_extension" type="text" value="<?php echo $work_phone_extension; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="form-group">
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_address_2'); ?>" name="address_2" type="text" value="<?php echo $address_2; ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_mobile'); ?>" name="mobile_phone" type="text" value="<?php echo $mobile_phone; ?>">
				</div>
			</div>
			<div class="col-md-7">
				<div class="form-group">
					<div class="row">
						<div class="col-xs-5">
							<input class="form-control" placeholder="<?php echo $this->lang->line('xin_city'); ?>" name="city" type="text" value="<?php echo $city; ?>">
						</div>
						<div class="col-xs-4">
							<input class="form-control" placeholder="<?php echo $this->lang->line('xin_state'); ?>" name="state" type="text" value="<?php echo $state; ?>">
						</div>
						<div class="col-xs-3">
							<input class="form-control" placeholder="<?php echo $this->lang->line('xin_zipcode'); ?>" name="zipcode" type="text" value="<?php echo $zipcode; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_home'); ?>" name="home_phone" type="text" value="<?php echo $home_phone; ?>">
				</div>
			</div>
			<div class="col-md-7">
				<div class="form-group">
					<select name="country" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_country'); ?>">
						<option value=""></option>
						<?php foreach ($all_countries as $country) { ?>
							<option value="<?php echo $country->country_id; ?>" <?php if ($country->country_id == $icountry) { ?> selected="selected" <?php } ?>> <?php echo $country->country_name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});

			/* Update contact info */
			$("#e_contact_info").validate({
				rules: {
					relation: {
						required: true,
					},
					contact_name: {
						required: true,
					},
					work_email: {
						required: true,
						email: true,
					},
					mobile_phone: {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 10,
					},
				},
				// Specify validation error messages
				messages: {
					relation: {
						required: "Please select relation"
					},
					contact_name: {
						required: "Please enter Name"
					},
					work_email: {
						required: "Please enter work email"
					},
					mobile_phone: {
						required: "Please enter mobile phone",
						minlength: "Please enter minimum 10 number",
						maxlength: "Please enter Maximum 10 number",
					},
				},
				submitHandler: function(form) {
					e_contact_infoformSubmit(form);
				}
			});
			// $("#e_contact_info").submit(function(e) {
			function e_contact_infoformSubmit(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=5&data=e_contact_info&type=e_contact_info&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit-modal-data').modal('toggle');
							// On page load: table_contacts
							var xin_table_contact = $('#xin_table_contact').dataTable({
								"bDestroy": true,
								"ajax": {
									url: "<?php echo site_url("admin/employees/contacts") ?>/" + $('#user_id').val(),
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_contact.api().ajax.reload(function() {
								toastr.success(JSON.result);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							}, true);
							$('.save').prop('disabled', false);
						}
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'emp_document' && $_GET['type'] == 'emp_document') {
?>
	<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_e_details_edit_document'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'e_document_info', 'id' => 'e_document_info', 'autocomplete' => 'off'); ?>
	<?php $hidden = array('u_document_info' => 'UPDATE'); ?>
	<?php echo form_open_multipart('admin/employees/e_document_info', $attributes, $hidden); ?>
	<?php
	$edata_usr3 = array(
		'type'  => 'hidden',
		'id'  => 'user_id',
		'name'  => 'user_id',
		'value' => $d_employee_id,
	);
	echo form_input($edata_usr3);
	?>
	<?php
	$edata_usr4 = array(
		'type'  => 'hidden',
		'id'  => 'e_field_id',
		'name'  => 'e_field_id',
		'value' => $document_id,
	);
	echo form_input($edata_usr4);
	?>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="relation"><?php echo $this->lang->line('xin_e_details_dtype'); ?></label>
					<select name="document_type_id" id="document_type_id" data-id="doc_d" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_choose_dtype'); ?>" disabled>
						<option value=""></option>
						<?php foreach ($all_document_types as $document_type) { ?>
							<option value="<?php echo $document_type->document_type_id; ?>" <?php if ($document_type->document_type_id == $document_type_id) { ?> selected="selected" <?php } ?>> <?php echo $document_type->document_type; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<div class="row" id="doc_details_d">
			<?php
			if ($is_create_date == 1) :
			?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="date_of_expiry" class="control-label"><?php echo $this->lang->line('xin_e_details_doc'); ?></label>
						<input class="form-control e_date" readonly placeholder="<?php echo $this->lang->line('xin_e_details_doc'); ?>" name="date_of_create" id="date_of_create_d" type="text" value="<?php echo $date_of_create; ?>">
					</div>
				</div>
			<?php endif;
			if ($is_expiry_date == 1) : ?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="date_of_expiry" class="control-label"><?php echo $this->lang->line('xin_e_details_doe'); ?></label>
						<input class="form-control e_date" readonly placeholder="<?php echo $this->lang->line('xin_e_details_doe'); ?>" name="date_of_expiry" id="date_of_expiry_d" type="text" value="<?php echo $date_of_expiry; ?>">
					</div>
				</div>
			<?php endif;
			if ($is_title == 1) : ?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="title" class="control-label"><?php echo $this->lang->line('xin_e_details_dtitle'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_dtitle'); ?>" name="title" type="text" value="<?php echo $title; ?>">
					</div>
				</div>
			<?php endif;
			if ($is_no == 1) :
			?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="title" class="control-label"><?php echo $this->lang->line('xin_e_details_dno'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_dno'); ?>" value="<?php echo $no; ?>" name="no" type="text">
					</div>
				</div>
			<?php
			endif;
			if ($is_notif_email == 1) :
			?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="email" class="control-label"><?php echo $this->lang->line('xin_e_details_notifyemail'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_notifyemail'); ?>" name="email" type="email" value="<?php echo $notification_email; ?>">
					</div>
				</div>
			<?php endif;
			if ($is_address == 1) :
			?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="description" class="control-label"><?php echo $this->lang->line('xin_description'); ?></label>
						<textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_description'); ?>" data-show-counter="1" data-limit="300" name="description" cols="30" rows="3" id="d_description"><?php echo $description; ?></textarea>
					</div>
				</div>
			<?php endif;
			if ($is_file == 1) :
			?>
				<div class="col-md-6">
					<div class="form-group">
						<fieldset class="form-group">
							<label for="logo"><?php echo $this->lang->line('xin_e_details_document_file'); ?></label>
							<input type="file" class="form-control-file" id="document_file" name="document_file">
							<small><?php echo $this->lang->line('xin_e_details_d_type_file'); ?></small>
							<?php if ($document_file != '' && $document_file != 'no file') { ?>
								<br />
								<a href="<?php echo site_url('admin/download/'); ?>?type=document&filename=<?php echo $document_file; ?>"><?php echo $document_file; ?></a>
							<?php } ?>
						</fieldset>
					</div>
				</div>
			<?php endif;
			if ($is_notif_email == 1) :
			?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="send_mail"><?php echo $this->lang->line('xin_e_details_send_notifyemail'); ?></label>
						<select name="send_mail" id="send_mail" class="form-control" data-plugin="select_hrm">
							<option value="1" <?php if ($is_alert == '1') { ?> selected="selected" <?php } ?>><?php echo $this->lang->line('xin_yes'); ?></option>
							<option value="2" <?php if ($is_alert == '2') { ?> selected="selected" <?php } ?>><?php echo $this->lang->line('xin_no'); ?></option>
						</select>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
	<?php echo form_close(); ?>
	<script type="text/javascript">
		$(document).ready(function() {

			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			// Date
			$('.e_date').datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'yy-mm-dd',
				yearRange: '1900:' + (new Date().getFullYear() + 10),
			});
			var date = $('#date_of_create_d').val();
			jQuery('#date_of_expiry_d').datepicker("option", "minDate", date);
			jQuery('#date_of_create_d').on('change', function() {
				var date = $(this).val();
				jQuery('#date_of_expiry_d').datepicker("option", "minDate", date);
			});

			$('[data-id="doc_d"]').on("change", function() {
				jQuery.get(base_url + "/get_doc_details/" + $(this).val(), function(
					data,
					status
				) {
					jQuery("#doc_details_d").html(data);
				});
			});

			/* Update document info */
			$("#e_document_info").validate({
				rules: {
					document_type_id: {
						required: true,
					},
					date_of_expiry: {
						required: true,
						date: true,
					},
					title: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
				},
				// Specify validation error messages
				messages: {
					document_type_id: {
						required: "Please select document type"
					},
					date_of_expiry: {
						required: "Please enter your date of expiry"
					},
					title: {
						required: "Please enter document title"
					},
					email: {
						required: "Please enter notifiction email"
					},
				},
				submitHandler: function(form) {
					e_document_infoformSubmit(form);
				}
			});

			// $("#e_document_info").submit(function(e) {
			function e_document_infoformSubmit(form) {
				var fd = new FormData(form);
				var obj = $(form),
					action = obj.attr('name');
				fd.append("is_ajax", 9);
				fd.append("type", 'e_document_info');
				fd.append("data", 'e_document_info');
				fd.append("form", action);
				// e.preventDefault();
				$('.save').prop('disabled', true);
				$.ajax({
					// url: e.target.action,
					url: form.action,
					type: "POST",
					data: fd,
					contentType: false,
					cache: false,
					processData: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit-modal-data').modal('toggle');
							// On page load: table_contacts
							var xin_table_document = $('#xin_table_document').dataTable({
								"bDestroy": true,
								"ajax": {
									url: "<?php echo site_url("admin/employees/documents") ?>/" + $('#user_id').val(),
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_document.api().ajax.reload(function() {
								toastr.success(JSON.result);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							}, true);
							$('.save').prop('disabled', false);
						}
					},
					error: function() {
						toastr.error(JSON.error);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
						$('.save').prop('disabled', false);
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'e_imgdocument' && $_GET['type'] == 'e_imgdocument') {
?>
	<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_immigration'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'e_imgdocument_info', 'id' => 'e_imgdocument_info', 'autocomplete' => 'off'); ?>
	<?php $hidden = array('u_document_info' => 'UPDATE'); ?>
	<?php echo form_open_multipart('admin/employees/e_immigration_info', $attributes, $hidden); ?>
	<?php
	$edata_usr5 = array(
		'type'  => 'hidden',
		'id'  => 'user_id',
		'name'  => 'user_id',
		'value' => $d_employee_id,
	);
	echo form_input($edata_usr5);
	?>
	<?php
	$edata_usr6 = array(
		'type'  => 'hidden',
		'id'  => 'e_field_id',
		'name'  => 'e_field_id',
		'value' => $immigration_id,
	);
	echo form_input($edata_usr6);
	?>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="relation"><?php echo $this->lang->line('xin_e_details_document'); ?></label>
					<select name="document_type_id" id="document_type_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_choose_dtype'); ?>">
						<option value=""></option>
						<?php foreach ($all_document_types as $document_type) { ?>
							<option value="<?php echo $document_type->document_type_id; ?>" <?php if ($document_type->document_type_id == $document_type_id) { ?> selected="selected" <?php } ?>> <?php echo $document_type->document_type; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="document_number" class="control-label"><?php echo $this->lang->line('xin_employee_document_number'); ?></label>
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_document_number'); ?>" name="document_number" type="text" value="<?php echo $document_number; ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label for="issue_date" class="control-label"><?php echo $this->lang->line('xin_issue_date'); ?></label>
					<input class="form-control e_date" readonly="readonly" placeholder="<?php echo $this->lang->line('xin_issue_date'); ?>" name="issue_date" id="issue_date" type="text" value="<?php echo $issue_date; ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="expiry_date" class="control-label"><?php echo $this->lang->line('xin_expiry_date'); ?></label>
					<input class="form-control e_date" readonly="readonly" placeholder="<?php echo $this->lang->line('xin_expiry_date'); ?>" name="expiry_date" type="text" value="<?php echo $expiry_date; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<fieldset class="form-group">
						<label for="logo"><?php echo $this->lang->line('xin_e_details_document_file'); ?></label>
						<input type="file" class="form-control-file" id="p_file2" name="document_file">
						<small><?php echo $this->lang->line('xin_e_details_d_type_file'); ?></small>
						<?php if ($document_file != '' && $document_file != 'no file') { ?>
							<br />
							<a href="<?php echo site_url('admin/download/'); ?>?type=document/immigration&filename=<?php echo $document_file; ?>"><?php echo $document_file; ?></a>
						<?php } ?>
					</fieldset>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="eligible_review_date" class="control-label"><?php echo $this->lang->line('xin_eligible_review_date'); ?></label>
					<input class="form-control e_date" readonly="readonly" placeholder="<?php echo $this->lang->line('xin_eligible_review_date'); ?>" name="eligible_review_date" type="text" value="<?php echo $eligible_review_date; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="send_mail"><?php echo $this->lang->line('xin_country'); ?></label>
					<select class="form-control" name="country" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_country'); ?>">
						<option value=""><?php echo $this->lang->line('xin_select_one'); ?></option>
						<?php foreach ($all_countries as $scountry) { ?>
							<option value="<?php echo $scountry->country_id; ?>" <?php if ($scountry->country_id == $country_id) { ?> selected="selected" <?php } ?>> <?php echo $scountry->country_name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
			<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update'); ?></button>
		</div>
	</div>
	<?php echo form_close(); ?>
	<!--<link rel="stylesheet" href="http://localhost/hrsale_final/skin/hrsale_assets/theme_assets/bower_components/select2/dist/css/select2.min.css">
<script src="http://localhost/hrsale_final/skin/hrsale_assets/vendor/select2/dist/js/select2.min.js"></script>-->
	<script type="text/javascript">
		$(document).ready(function() {
			$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
			$('[data-plugin="select_hrm"]').select2({
				width: '100%'
			});
			// Date
			$('.e_date').datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'yy-mm-dd',
				yearRange: '1900:' + (new Date().getFullYear() + 10),
			});

			jQuery.validator.addMethod('greaterThan', function(value, element, param) {
				return (value > jQuery(param).val());
			}, 'Must be greater than start')
			/* Update document info */
			$("#e_imgdocument_info").validate({
				rules: {
					document_type_id: {
						required: true,
					},
					document_number: {
						required: true,
						number: true,
					},
					issue_date: {
						required: true
					},
					expiry_date: {
						required: true,
						greaterThan: "#issue_date",
					},
					eligible_review_date: {
						required: true
					},
					country: {
						required: true
					},
				},
				// Specify validation error messages
				messages: {
					document_type_id: {
						required: "Please select document type"
					},
					document_number: {
						required: "Please enter your document number"
					},
					issue_date: {
						required: "Please enter issue date"
					},
					expiry_date: {
						required: "Please enter expiry date",
						greaterThan: "Expiry date must be after issue date.",
					},
					eligible_review_date: {
						required: "Please enter eligible review date"
					},
					country: {
						required: "Please select country"
					},
				},
				submitHandler: function(form) {
					e_imgdocument_infoformSubmit(form);
				}
			});
			// $("#e_imgdocument_info").submit(function(e) {
			function e_imgdocument_infoformSubmit(form) {

				var fd = new FormData(form);
				var obj = $(form),
					action = obj.attr('name');
				fd.append("is_ajax", 9);
				fd.append("type", 'e_immigration_info');
				fd.append("data", 'e_immigration_info');
				fd.append("form", action);
				// e.preventDefault();
				$('.save').prop('disabled', true);
				$.ajax({
					// url: e.target.action,
					url: form.action,
					type: "POST",
					data: fd,
					contentType: false,
					cache: false,
					processData: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit-modal-data').modal('toggle');
							// On page load: table_contacts
							var xin_table_immigration = $('#xin_table_imgdocument').dataTable({
								"bDestroy": true,
								"ajax": {
									url: "<?php echo site_url("admin/employees/immigration") ?>/" + $('#user_id').val(),
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table_immigration.api().ajax.reload(function() {
								toastr.success(JSON.result);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							}, true);
							$('.save').prop('disabled', false);
						}
					},
					error: function() {
						toastr.error(JSON.error);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
						$('.save').prop('disabled', false);
					}
				});
			}
			// });
		});
	</script>
<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'emp_qualification' && $_GET['type'] == 'emp_qualification') {
?>
	<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_e_details_edit_qualification'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'e_qualification_info', 'id' => 'e_qualification_info', 'autocomplete' => 'off'); ?>
	<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
	<?php echo form_open('admin/employees/e_qualification_info', $attributes, $hidden); ?>
	<?php
	$edata_usr7 = array(
		'type'  => 'hidden',
		'id'  => 'user_id',
		'name'  => 'user_id',
		'value' => $employee_id,
	);
	echo form_input($edata_usr7);
	?>
	<?php
	$edata_usr8 = array(
		'type'  => 'hidden',
		'id'  => 'e_field_id',
		'name'  => 'e_field_id',
		'value' => $qualification_id,
	);
	echo form_input($edata_usr8);
	?>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="name"><?php echo $this->lang->line('xin_e_details_inst_name'); ?></label>
					<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_inst_name'); ?>" name="name" type="text" value="<?php echo $name; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="education_level" class="control-label"><?php echo $this->lang->line('xin_e_details_edu_level'); ?></label>
					<select class="form-control" name="education_level" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_edu_level'); ?>">
						<?php foreach ($all_education_level as $education_level) { ?>
							<option value="<?php echo $education_level->education_level_id; ?>" <?php if ($education_level->education_level_id == $education_level_id) { ?> selected="selected" <?php } ?>> <?php echo $education_level->name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="from_year"><?php echo $this->lang->line('xin_e_details_timeperiod'); ?></label>
					<div class="row">
						<div class="col-md-6">
							<input type="text" class="form-control edate" id="e_from_year" name="from_year" placeholder="<?php echo $this->lang->line('xin_e_details_from'); ?>" readonly value="<?php echo $from_year; ?>">
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control edate" id="e_to_year" name="to_year" placeholder="<?php echo $this->lang->line('dashboard_to'); ?>" readonly value="<?php echo $to_year; ?>">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="language" class="control-label"><?php echo $this->lang->line('xin_e_details_language'); ?></label>
						<select class="form-control" name="language" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_language'); ?>">
							<?php foreach ($all_qualification_language as $qualification_language) { ?>
								<option value="<?php echo $qualification_language->language_id; ?>" <?php if ($qualification_language->language_id == $language_id) { ?> selected="selected" <?php } ?>> <?php echo $qualification_language->name; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="skill" class="control-label"><?php echo $this->lang->line('xin_e_details_skill'); ?></label>
						<select class="form-control" name="skill" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_e_details_skill'); ?>">
							<?php foreach ($all_qualification_skill as $qualification_skill) { ?>
								<option value="<?php echo $qualification_skill->skill_id ?>" <?php if ($qualification_skill->skill_id == $skill_id) { ?> selected="selected" <?php } ?>><?php echo $qualification_skill->name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="to_year" class="control-label"><?php echo $this->lang->line('xin_description'); ?></label>
						<textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_description'); ?>" data-show-counter="1" data-limit="300" name="description" cols="30" rows="3" id="d_description"><?php echo $description; ?></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
				$('[data-plugin="select_hrm"]').select2({
					width: '100%'
				});

				$('.edate').datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					yearRange: '1900:' + (new Date().getFullYear() + 15),
					beforeShow: function(input) {
						$(input).datepicker("widget").show();
					}
				});

				/* Update qualification info */

				$("#e_qualification_info").validate({

					rules: {
						name: {
							required: true,
						},
						education_level: {
							required: true,
						},
						from_year: {
							required: true
						},
						to_year: {
							required: true,
							greaterThan: "#e_from_year"
						},
					},
					// Specify validation error messages
					messages: {
						name: {
							required: "Please enter school/university"
						},
						education_level: {
							required: "Please select education level"
						},
						from_year: {
							required: "Please enter Form date"
						},
						to_year: {
							required: "Please enter to date",
							greaterThan: "To date must be after from date."
						},
					},
					submitHandler: function(form) {
						e_qualification_infoformSubmit(form);
					}
				});

				// $("#e_qualification_info").submit(function(e) {
				function e_qualification_infoformSubmit(form) {
					/*Form Submit*/
					// e.preventDefault();
					var obj = $(form),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						// url: e.target.action,
						url: form.action,
						data: obj.serialize() + "&is_ajax=11&data=e_qualification_info&type=e_qualification_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load: table_contacts
								var xin_table_qualification = $('#xin_table_qualification').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/qualification") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_qualification.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				}
				// });
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'emp_work_experience' && $_GET['type'] == 'emp_work_experience') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_e_details_edit_wexp'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_work_experience_info', 'id' => 'e_work_experience_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/e_work_experience_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $work_experience_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="company_name"><?php echo $this->lang->line('xin_company_name'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_company_name'); ?>" name="company_name" type="text" value="<?php echo $company_name; ?>" id="company_name">
					</div>
					<div class="form-group">
						<label for="from_date"><?php echo $this->lang->line('xin_e_details_frm_date'); ?></label>
						<input type="text" class="form-control edate" id="e_from_date" name="from_date" placeholder="<?php echo $this->lang->line('xin_e_details_frm_date'); ?>" readonly value="<?php echo $from_date; ?>">
					</div>
					<div class="form-group">
						<label for="to_date"><?php echo $this->lang->line('xin_e_details_to_date'); ?></label>
						<input type="text" class="form-control edate" id="e_to_date" name="to_date" placeholder="<?php echo $this->lang->line('xin_e_details_to_date'); ?>" readonly value="<?php echo $to_date; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="post"><?php echo $this->lang->line('xin_e_details_post'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_post'); ?>" name="post" type="text" value="<?php echo $post; ?>" id="post">
					</div>
					<div class="form-group">
						<label for="description"><?php echo $this->lang->line('xin_description'); ?></label>
						<textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_description'); ?>" data-show-counter="1" data-limit="300" name="description" cols="30" rows="4" id="description"><?php echo $description; ?></textarea>
						<span class="countdown"></span> </div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
				$('[data-plugin="select_hrm"]').select2({
					width: '100%'
				});

				$('.edate').datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					yearRange: '1900:' + (new Date().getFullYear() + 15),
					beforeShow: function(input) {
						$(input).datepicker("widget").show();
					}
				});

				/* Update work experience info */
				$("#e_work_experience_info").validate({
					rules: {
						company_name: {
							required: true,
						},
						post: {
							required: true,
						},
						from_date: {
							required: true
						},
						to_date: {
							required: true,
							greaterThan: "#e_from_date"
						},
					},
					// Specify validation error messages
					messages: {
						company_name: {
							required: "Please enter company name"
						},
						post: {
							required: "Please enter post"
						},
						from_date: {
							required: "Please enter Form date"
						},
						to_date: {
							required: "Please enter to date",
							greaterThan: "To date must be after from date."
						},
					},
					submitHandler: function(form) {
						e_work_experience_infoformSubmit(form);
					}
				});

				// $("#e_work_experience_info").submit(function(e) {
				function e_work_experience_infoformSubmit(form) {
					/*Form Submit*/
					// e.preventDefault();
					var obj = $(form),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						// url: e.target.action,
						url: form.action,
						data: obj.serialize() + "&is_ajax=14&data=e_work_experience_info&type=e_work_experience_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load: table_contacts
								var xin_table_work_experience = $('#xin_table_work_experience').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/experience") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_work_experience.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				}
				// });
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'emp_bank_account' && $_GET['type'] == 'emp_bank_account') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_e_details_edit_baccount'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_bank_account_info', 'id' => 'e_bank_account_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/e_bank_account_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $bankaccount_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="account_title"><?php echo $this->lang->line('xin_e_details_acc_title'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_acc_title'); ?>" name="account_title" type="text" value="<?php echo $account_title; ?>" id="account_name">
					</div>
					<div class="form-group">
						<label for="account_number"><?php echo $this->lang->line('xin_e_details_acc_number'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_acc_number'); ?>" name="account_number" type="text" value="<?php echo $account_number; ?>" id="account_number">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="bank_name"><?php echo $this->lang->line('xin_e_details_bank_name'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_bank_name'); ?>" name="bank_name" type="text" value="<?php echo $bank_name; ?>" id="bank_name">
					</div>
					<div class="form-group">
						<label for="bank_code"><?php echo $this->lang->line('xin_e_details_bank_code'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_bank_code'); ?>" name="bank_code" type="text" value="<?php echo $bank_code; ?>" id="bank_code">
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group">
						<label for="bank_branch"><?php echo $this->lang->line('xin_e_details_bank_branch'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_bank_branch'); ?>" name="bank_branch" type="text" value="<?php echo $bank_branch; ?>" id="bank_branch">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				jQuery.validator.addMethod("alphabetsnspace", function(value, element) {
					return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
				});

				/* Update bank acount info */
				$("#e_bank_account_info").validate({
					rules: {
						account_title: {
							required: true,
							alphabetsnspace: true,
						},
						account_number: {
							required: true,
							number: true
						},
						bank_name: {
							required: true,
							alphabetsnspace: true,
						},
						bank_code: {
							required: true,
						},
					},
					// Specify validation error messages
					messages: {
						account_title: {
							required: "Please enter account title",
							alphabetsnspace: "Please enter letters only",
						},
						account_number: {
							required: "Please enter account number"
						},
						bank_name: {
							required: "Please enter bank name",
							alphabetsnspace: "Please enter letters only",
						},
						bank_code: {
							required: "Please enter to bank code",
						},
					},
					submitHandler: function(form) {
						e_bank_account_infoformSubmit(form);
					}
				});

				// $("#e_bank_account_info").submit(function(e) {
				function e_bank_account_infoformSubmit(form) {
					/*Form Submit*/
					// e.preventDefault();
					var obj = $(form),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						// url: e.target.action,
						url: form.action,
						data: obj.serialize() + "&is_ajax=17&data=e_bank_account_info&type=e_bank_account_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_bank_account = $('#xin_table_bank_account').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/bank_account") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_bank_account.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				}
				// });
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'esecurity_level_info' && $_GET['type'] == 'esecurity_level_info') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_emp_security_level'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_security_level_info', 'id' => 'e_security_level_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/e_security_level_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $security_level_id,
		);
		echo form_input($edata_usr8);
		?>
		<?php $security_level_list = $this->Xin_model->get_security_level_type(); ?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="account_title"><?php echo $this->lang->line('xin_esecurity_level_title'); ?></label>
						<select class="form-control" name="security_level" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_esecurity_level_title'); ?>">
							<option value=""><?php echo $this->lang->line('xin_esecurity_level_title'); ?></option>
							<?php foreach ($security_level_list->result() as $sc_level) { ?>
								<option value="<?php echo $sc_level->type_id ?>" <?php if ($security_type == $sc_level->type_id) : ?> selected="selected" <?php endif; ?>><?php echo $sc_level->name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="account_number"><?php echo $this->lang->line('xin_e_details_doe'); ?></label>
						<input class="form-control ee_date" placeholder="<?php echo $this->lang->line('xin_e_details_doe'); ?>" name="expiry_date" type="text" readonly value="<?php echo $expiry_date; ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="account_number"><?php echo $this->lang->line('xin_e_details_do_clearance'); ?></label>
						<input class="form-control ee_date" placeholder="<?php echo $this->lang->line('xin_e_details_do_clearance'); ?>" name="date_of_clearance" type="text" readonly value="<?php echo $date_of_clearance; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
				$('[data-plugin="select_hrm"]').select2({
					width: '100%'
				});
				// Date
				$('.ee_date').datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					yearRange: '1950:' + new Date().getFullYear()
				});
				$('.ee_date').datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					yearRange: '1950:' + new Date().getFullYear()
				});
				/* Update bank acount info */
				$("#e_security_level_info").validate({
					rules: {
						security_level: {
							required: true,
						},
						expiry_date: {
							required: true
						},
						date_of_clearance: {
							required: true
						},
					},
					// Specify validation error messages
					messages: {
						security_level: {
							required: "Please select security level"
						},
						expiry_date: {
							required: "Please enter expiry date"
						},
						date_of_clearance: {
							required: "Please enter date of clearance"
						},
					},
					submitHandler: function(form) {
						e_security_level_infoformSubmit(form);
					}
				});

				// $("#e_security_level_info").submit(function(e) {
				function e_security_level_infoformSubmit(form) {
					/*Form Submit*/
					// e.preventDefault();
					var obj = $(form),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						// url: e.target.action,
						url: form.action,
						data: obj.serialize() + "&is_ajax=17&data=e_security_level_info&type=e_security_level_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var exin_table_security_level = $('#xin_table_security_level').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/security_level_list") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								exin_table_security_level.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				}
				// });
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'emp_contract' && $_GET['type'] == 'emp_contract') { ?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_e_details_edit_contract'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_contract_info', 'id' => 'e_contract_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/e_contract_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $contract_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="contract_type_id" class=""><?php echo $this->lang->line('xin_e_details_contract_type'); ?></label>
						<select class="form-control" name="contract_type_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_one'); ?>">
							<option value=""><?php echo $this->lang->line('xin_select_one'); ?></option>
							<?php foreach ($all_contract_types as $contract_type) { ?>
								<option value="<?php echo $contract_type->contract_type_id; ?>" <?php if ($contract_type->contract_type_id == $contract_type_id) { ?> selected="selected" <?php } ?>> <?php echo $contract_type->name; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label class="" for="from_date"><?php echo $this->lang->line('xin_e_details_frm_date'); ?></label>
						<input type="text" class="form-control e_cont_date" name="from_date" placeholder="<?php echo $this->lang->line('xin_e_details_frm_date'); ?>" readonly value="<?php echo $from_date; ?>">
					</div>
					<div class="form-group">
						<label for="designation_id" class=""><?php echo $this->lang->line('dashboard_designation'); ?></label>
						<select class="form-control" name="designation_id" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_one'); ?>">
							<option value=""><?php echo $this->lang->line('xin_select_one'); ?></option>
							<?php foreach ($all_designations as $designation) { ?>
								<option value="<?php echo $designation->designation_id ?>" <?php if ($designation_id == $designation->designation_id) : ?> selected <?php endif; ?>><?php echo $designation->designation_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="title" class=""><?php echo $this->lang->line('xin_e_details_contract_title'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_contract_title'); ?>" name="title" type="text" value="<?php echo $title; ?>" id="title">
					</div>
					<div class="form-group">
						<label for="to_date"><?php echo $this->lang->line('xin_e_details_to_date'); ?></label>
						<input type="text" class="form-control e_cont_date" name="to_date" placeholder="<?php echo $this->lang->line('xin_e_details_to_date'); ?>" readonly value="<?php echo $to_date; ?>">
					</div>
					<div class="form-group">
						<label for="description"><?php echo $this->lang->line('xin_description'); ?></label>
						<textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_description'); ?>" data-show-counter="1" data-limit="300" name="description" cols="30" rows="3" id="description"><?php echo $description; ?></textarea>
						<span class="countdown"></span> </div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
				$('[data-plugin="select_hrm"]').select2({
					width: '100%'
				});
				// Date
				$('.e_cont_date').datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					yearRange: '1950:' + new Date().getFullYear()
				});

				/* Update bank acount info */
				$("#e_contract_info").submit(function(e) {
					/*Form Submit*/
					e.preventDefault();
					var obj = $(this),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						url: e.target.action,
						data: obj.serialize() + "&is_ajax=20&data=e_contract_info&type=e_contract_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_contract = $('#xin_table_contract').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/contract") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_contract.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				});
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'emp_leave' && $_GET['type'] == 'emp_leave') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_e_details_edit_leave'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_leave_info', 'id' => 'e_leave_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/e_leave_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $leave_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						<label for="casual_leave" class="control-label"><?php echo $this->lang->line('xin_e_details_casual_leave'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_casual_leave'); ?>" name="casual_leave" type="text" value="<?php echo $casual_leave; ?>">
					</div>
				</div>
				<div class="col-md-7">
					<div class="form-group">
						<label for="medical_leave" class="control-label"><?php echo $this->lang->line('xin_e_details_medical_leave'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_medical_leave'); ?>" name="medical_leave" type="text" value="<?php echo $medical_leave; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
				$('[data-plugin="select_hrm"]').select2({
					width: '100%'
				});

				/* Update leave info */
				$("#e_leave_info").submit(function(e) {
					/*Form Submit*/
					e.preventDefault();
					var obj = $(this),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						url: e.target.action,
						data: obj.serialize() + "&is_ajax=23&data=e_leave_info&type=e_leave_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_leave = $('#xin_table_leave').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/leave") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_leave.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				});
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'emp_shift' && $_GET['type'] == 'emp_shift') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_e_details_edit_shift'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_shift_info', 'id' => 'e_shift_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/e_shift_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $emp_shift_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="from_date"><?php echo $this->lang->line('xin_e_details_frm_date'); ?></label>
						<input class="form-control es_date" readonly placeholder="<?php echo $this->lang->line('xin_e_details_frm_date'); ?>" name="from_date" type="text" value="<?php echo $from_date; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="to_date" class="control-label"><?php echo $this->lang->line('xin_e_details_to_date'); ?></label>
						<input class="form-control es_date" readonly placeholder="<?php echo $this->lang->line('xin_e_details_to_date'); ?>" name="to_date" type="text" value="<?php echo $to_date; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
				$('[data-plugin="select_hrm"]').select2({
					width: '100%'
				});
				// Date
				$('.es_date').datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					yearRange: '1950:' + new Date().getFullYear()
				});

				/* Update leave info */
				$("#e_shift_info").submit(function(e) {
					/*Form Submit*/
					e.preventDefault();
					var obj = $(this),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						url: e.target.action,
						data: obj.serialize() + "&is_ajax=26&data=e_shift_info&type=e_shift_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_shift = $('#xin_table_shift').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/shift") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_shift.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				});
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'emp_location' && $_GET['type'] == 'emp_location') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_location'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_location_info', 'id' => 'e_location_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/e_location_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $office_location_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="from_date"><?php echo $this->lang->line('xin_e_details_frm_date'); ?></label>
						<input class="form-control es_date" readonly placeholder="<?php echo $this->lang->line('xin_e_details_frm_date'); ?>" name="from_date" type="text" value="<?php echo $from_date; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="to_date" class="control-label"><?php echo $this->lang->line('xin_e_details_to_date'); ?></label>
						<input class="form-control es_date" readonly placeholder="<?php echo $this->lang->line('xin_e_details_to_date'); ?>" name="to_date" type="text" value="<?php echo $to_date; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				// Date
				$('.es_date').datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					yearRange: '1950:' + new Date().getFullYear()
				});

				/* Update location info */
				$("#e_location_info").submit(function(e) {
					/*Form Submit*/
					e.preventDefault();
					var obj = $(this),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						url: e.target.action,
						data: obj.serialize() + "&is_ajax=29&data=e_location_info&type=e_location_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_location = $('#xin_table_location').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/location") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_location.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				});
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'e_salary_allowance' && $_GET['type'] == 'e_salary_allowance') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_employee_edit_allowance'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_allowance_info', 'id' => 'e_allowance_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/update_allowance_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $allowance_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="is_allowance_taxable"><?php echo $this->lang->line('xin_salary_allowance_options'); ?></label>
						<select name="is_allowance_taxable" id="is_allowance_taxable" class="form-control" data-plugin="select_hrm">
							<option value="0" <?php if ($is_allowance_taxable == 0) : ?> selected="selected" <?php endif; ?>><?php echo $this->lang->line('xin_salary_allowance_non_taxable'); ?></option>
							<option value="1" <?php if ($is_allowance_taxable == 1) : ?> selected="selected" <?php endif; ?>><?php echo $this->lang->line('xin_salary_allowance_taxable'); ?></option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="allowance_title"><?php echo $this->lang->line('dashboard_xin_title'); ?></label>
						<!-- <input class="form-control" placeholder="<?php echo $this->lang->line('dashboard_xin_title'); ?>" name="allowance_title" type="text" value="<?php echo $allowance_title; ?>"> -->
						<select class="form-control" name="allowance_title" id="allowance_title" data-plugin="select_hrm">
							<?php foreach ($get_all_allowance as $alw) { ?>
								<option value="<?= $alw->salary_benefit_id ?>" <?= $alw->salary_benefit_id == $allowance_title ? 'Selected' : ' ';  ?>><?= $alw->salary_benefit_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label for="allowance_amount_type" class="control-label"><?php echo $this->lang->line('xin_amount_type'); ?></label>
						<select class="form-control" name="allowance_type" id="allowance_type" data-plugin="select_hrm">
							<option value="1" <?= $allowance_amount_type == 1 ? ' Selected' : ' '; ?>><?= $this->lang->line('xin_grade_benefit_amount_flat_select'); ?> </option>
							<option value="2" <?= $allowance_amount_type == 2 ? ' Selected' : ' '; ?>> <?= $this->lang->line('xin_grade_benefit_amount_pr_select'); ?> </option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="allowance_amount" class="control-label"><?php echo $this->lang->line('xin_amount'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_amount'); ?>" name="allowance_amount" type="text" value="<?= !empty($allowance_pr_amount) && $allowance_amount_type == 2 ? $allowance_pr_amount :  $allowance_amount; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				var xin_table_statutory_deductions_ad = $(
					"#xin_table_all_statutory_deductions"
				).dataTable({
					bDestroy: true,
					ajax: {
						url: site_url +
							"employees/salary_all_statutory_deductions/" +
							$("#user_id").val(),
						type: "GET"
					},
					fnDrawCallback: function(settings) {
						$('[data-toggle="tooltip"]').tooltip();
					}
				});
				/* Update location info */
				$("#e_allowance_info").validate({
					rules: {
						allowance_title: {
							required: true
						},
						allowance_amount: {
							required: true,
							number: true,
						},
					},
					// Specify validation error messages
					messages: {
						allowance_title: {
							required: "Please select salary allowance"
						},
						allowance_amount: {
							required: "Please enter amount"
						},
					},
					submitHandler: function(form) {
						e_allowance_infoformSubmit(form);
					}
				});

				// $("#e_allowance_info").submit(function(e) {
				function e_allowance_infoformSubmit(form) {
					/*Form Submit*/
					// e.preventDefault();
					var obj = $(form),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						// url: e.target.action,
						url: form.action,
						data: obj.serialize() + "&is_ajax=29&data=e_allowance_info&type=e_allowance_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_all_allowances = $('#xin_table_all_allowances').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/salary_all_allowances") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_all_allowances.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								xin_table_statutory_deductions_ad.api().ajax.reload(function() {
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				}
				// });
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'e_salary_loan' && $_GET['type'] == 'e_salary_loan') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_employee_edit_loan_title'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_salary_loan_info', 'id' => 'e_salary_loan_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/update_loan_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $loan_deduction_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="loan_options"><?php echo $this->lang->line('xin_salary_loan_options'); ?></label>
								<select name="loan_options" id="loan_options" class="form-control" data-plugin="select_hrm">
									<option value="1" <?php if ($loan_options == 1) : ?> selected="selected" <?php endif; ?>><?php echo $this->lang->line('xin_loan_ssc_title'); ?></option>
									<option value="2" <?php if ($loan_options == 2) : ?> selected="selected" <?php endif; ?>><?php echo $this->lang->line('xin_loan_hdmf_title'); ?></option>
									<option value="0" <?php if ($loan_options == 0) : ?> selected="selected" <?php endif; ?>><?php echo $this->lang->line('xin_loan_other_sd_title'); ?></option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="month_year"><?php echo $this->lang->line('dashboard_xin_title'); ?></label>
								<input class="form-control" placeholder="<?php echo $this->lang->line('dashboard_xin_title'); ?>" name="loan_deduction_title" type="text" value="<?php echo $loan_deduction_title; ?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="edu_role"><?php echo $this->lang->line('xin_employee_monthly_installment_title'); ?></label>
								<input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_monthly_installment_title'); ?>" name="monthly_installment" type="text" id="m_monthly_installment" value="<?php echo $monthly_installment; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="month_year"><?php echo $this->lang->line('xin_start_date'); ?></label>
								<input class="form-control d_month_year" placeholder="<?php echo $this->lang->line('xin_start_date'); ?>" readonly="readonly" name="start_date" type="text" value="<?php echo $start_date; ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="end_date"><?php echo $this->lang->line('xin_end_date'); ?></label>
								<input class="form-control d_month_year" readonly="readonly" placeholder="<?php echo $this->lang->line('xin_end_date'); ?>" name="end_date" type="text" value="<?php echo $end_date; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="description"><?php echo $this->lang->line('xin_reason'); ?></label>
								<textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_reason'); ?>" name="reason" cols="30" rows="2" id="reason2"><?php echo $reason; ?></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
				$('[data-plugin="select_hrm"]').select2({
					width: '100%'
				});

				// Month & Year
				$('.d_month_year').datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					yearRange: '1990:' + (new Date().getFullYear() + 10),
				});

				/* Update location info */
				$("#e_salary_loan_info").submit(function(e) {
					/*Form Submit*/
					e.preventDefault();
					var obj = $(this),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						url: e.target.action,
						data: obj.serialize() + "&is_ajax=29&data=loan_info&type=loan_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_all_deductions = $('#xin_table_all_deductions').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/salary_all_deductions") . '/' . $employee_id; ?>/",
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_all_deductions.api().ajax.reload(function() {
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
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'emp_overtime_info' && $_GET['type'] == 'emp_overtime_info') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_employee_edit_allowance'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_overtime_info', 'id' => 'e_overtime_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/update_overtime_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $salary_overtime_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="overtime_type"><?php echo $this->lang->line('xin_employee_overtime_title'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_overtime_title'); ?>" name="overtime_type" type="text" value="<?php echo $overtime_type; ?>" id="overtime_type">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="no_of_days"><?php echo $this->lang->line('xin_employee_overtime_no_of_days'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_overtime_no_of_days'); ?>" name="no_of_days" type="text" value="<?php echo $no_of_days; ?>" id="no_of_days">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="overtime_hours"><?php echo $this->lang->line('xin_employee_overtime_hour'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_overtime_hour'); ?>" name="overtime_hours" type="text" value="<?php echo $overtime_hours; ?>" id="overtime_hours">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="overtime_rate"><?php echo $this->lang->line('xin_employee_overtime_rate'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_employee_overtime_rate'); ?>" name="overtime_rate" type="text" value="<?php echo $overtime_rate; ?>" id="overtime_rate">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				/* Update location info */
				$("#e_overtime_info").validate({
					rules: {
						overtime_type: {
							required: true
						},
						no_of_days: {
							required: true,
							number: true,
						},
						overtime_hours: {
							required: true,
							number: true,
						},
						overtime_rate: {
							required: true,
							number: true,
						},
					},
					// Specify validation error messages
					messages: {
						overtime_type: {
							required: "Please enter overtime title"
						},
						no_of_days: {
							required: "Please enter number of day"
						},
						overtime_hours: {
							required: "Please enter hours"
						},
						overtime_rate: {
							required: "Please enter rate"
						},
					},
					submitHandler: function(form) {
						e_overtime_infoformSubmit(form);
					}
				});

				// $("#e_overtime_info").submit(function(e) {
				function e_overtime_infoformSubmit(form) {
					/*Form Submit*/
					// e.preventDefault();
					var obj = $(form),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						// url: e.target.action,
						url: form.action,
						data: obj.serialize() + "&is_ajax=29&data=e_overtime_info&type=e_overtime_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_emp_overtime = $('#xin_table_emp_overtime').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/salary_overtime") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_emp_overtime.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				}
				// });
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'salary_commissions_info' && $_GET['type'] == 'salary_commissions_info') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_employee_edit_allowance'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_salary_commissions_info', 'id' => 'e_salary_commissions_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/update_commissions_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $salary_commissions_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="title"><?php echo $this->lang->line('dashboard_xin_title'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('dashboard_xin_title'); ?>" name="title" type="text" value="<?php echo $commission_title; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="amount" class="control-label"><?php echo $this->lang->line('xin_amount'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_amount'); ?>" name="amount" type="text" value="<?php echo $commission_amount; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				/* Update location info */
				$("#e_salary_commissions_info").validate({
					rules: {
						title: {
							required: true
						},
						amount: {
							required: true,
							number: true,
						},
					},
					// Specify validation error messages
					messages: {
						title: {
							required: "Please enter title"
						},
						amount: {
							required: "Please enter amount"
						},
					},
					submitHandler: function(form) {
						e_salary_commissions_infoformSubmit(form);
					}
				});

				// $("#e_salary_commissions_info").submit(function(e) {
				function e_salary_commissions_infoformSubmit(form) {
					/*Form Submit*/
					// e.preventDefault();
					var obj = $(form),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						// url: e.target.action,
						url: form.action,
						data: obj.serialize() + "&is_ajax=29&data=e_salary_commissions_info&type=e_salary_commissions_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_all_commissions = $('#xin_table_all_commissions').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/salary_all_commissions") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_all_commissions.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				}
				// });
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'salary_statutory_deductions_info' && $_GET['type'] == 'salary_statutory_deductions_info') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_employee_edit_allowance'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_salary_statutory_deductions_info', 'id' => 'e_salary_statutory_deductions_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/update_statutory_deductions_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $statutory_deductions_id,
		);
		echo form_input($edata_usr8);
		?>
		<?php $system = $this->Xin_model->read_setting_info(1); ?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="statutory_options"><?php echo $this->lang->line('xin_salary_sd_options'); ?></label>
						<select name="statutory_options" id="statutory_options" class="form-control" data-plugin="select_hrm">
							<?php
							foreach ($get_all_deductions as $ded) { ?>
								<option value="<?= $ded->salary_benefit_id ?>" <?= $ded->salary_benefit_id == $statutory_options ? "Selected" : " ";   ?>><?= $ded->salary_benefit_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="title"><?php echo $this->lang->line('xin_salary_title'); ?></label>
						<select name="ded_salary_type" id="ded_salary_type" class="form-control" data-plugin="select_hrm">
							<option value="1" <?= $deduction_salary_type == 1 ? "Selected" : ''; ?>><?= $this->lang->line('xin_basic_salary'); ?></option>
							<option value="2" <?= $deduction_salary_type == 2 ? "Selected" : ''; ?>><?= $this->lang->line('xin_gross_salary'); ?></option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="title"><?php echo $this->lang->line('xin_amount_type'); ?></label>
						<select name="ded_amount_type" id="ded_amount_type" class="form-control" data-plugin="select_hrm">
							<option value="1" <?= $deduction_amount_type == 1 ? "Selected" : ''; ?>><?= $this->lang->line('xin_grade_benefit_amount_flat_select'); ?></option>
							<option value="2" <?= $deduction_amount_type == 2 ? "Selected" : ''; ?>><?= $this->lang->line('xin_grade_benefit_amount_pr_select'); ?></option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="amount" class="control-label"><?php echo $this->lang->line('xin_amount'); ?> <?php if ($system[0]->statutory_fixed != 'yes') : ?> (%) <?php endif; ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_amount'); ?>" name="amount" type="text" value="<?= $deduction_amount_type == 1 ?  $deduction_amount : $deduction_pr_amount; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				/* Update location info */
				$("#e_salary_statutory_deductions_info").validate({
					rules: {
						statutory_options: {
							required: true
						},
						amount: {
							required: true,
							number: true,
						},
					},
					// Specify validation error messages
					messages: {
						statutory_options: {
							required: "Please select Deduction option"
						},
						amount: {
							required: "Please enter amount"
						},
					},
					submitHandler: function(form) {
						e_salary_statutory_deductions_infoformSubmit(form);
					}
				});
				// $("#e_salary_statutory_deductions_info").submit(function(e) {
				function e_salary_statutory_deductions_infoformSubmit(form) {
					/*Form Submit*/
					// e.preventDefault();
					var obj = $(form),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						// url: e.target.action,
						url: form.action,
						data: obj.serialize() + "&is_ajax=29&data=e_salary_statutory_deductions_info&type=e_salary_statutory_deductions_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_all_statutory_deductions = $('#xin_table_all_statutory_deductions').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/salary_all_statutory_deductions") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_all_statutory_deductions.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				}
				// });
			});
		</script>
	<?php } else if (isset($_GET['jd']) && isset($_GET['field_id']) && $_GET['data'] == 'salary_other_payments_info' && $_GET['type'] == 'salary_other_payments_info') {
	?>
		<div class="modal-header"> <?php echo form_button(array('aria-label' => 'Close', 'data-dismiss' => 'modal', 'type' => 'button', 'class' => 'close', 'content' => '<span aria-hidden="true">×</span>')); ?>
			<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit') . ' ' . $this->lang->line('xin_employee_set_other_payment'); ?></h4>
		</div>
		<?php $attributes = array('name' => 'e_salary_other_payments_info', 'id' => 'e_salary_other_payments_info', 'autocomplete' => 'off'); ?>
		<?php $hidden = array('u_basic_info' => 'UPDATE'); ?>
		<?php echo form_open('admin/employees/update_other_payment_info', $attributes, $hidden); ?>
		<?php
		$edata_usr7 = array(
			'type'  => 'hidden',
			'id'  => 'user_id',
			'name'  => 'user_id',
			'value' => $employee_id,
		);
		echo form_input($edata_usr7);
		?>
		<?php
		$edata_usr8 = array(
			'type'  => 'hidden',
			'id'  => 'e_field_id',
			'name'  => 'e_field_id',
			'value' => $other_payments_id,
		);
		echo form_input($edata_usr8);
		?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="title"><?php echo $this->lang->line('dashboard_xin_title'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('dashboard_xin_title'); ?>" name="title" type="text" value="<?php echo $payments_title; ?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="amount" class="control-label"><?php echo $this->lang->line('xin_amount'); ?></label>
						<input class="form-control" placeholder="<?php echo $this->lang->line('xin_amount'); ?>" name="amount" type="text" value="<?php echo $payments_amount; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <?php echo form_button(array('data-dismiss' => 'modal', 'type' => 'button', 'class' => 'btn btn-secondary', 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_close'))); ?> <?php echo form_button(array('name' => 'hrsale_form', 'type' => 'submit', 'class' => $this->Xin_model->form_button_class(), 'content' => '<i class="fa fa fa-check-square-o"></i> ' . $this->lang->line('xin_update'))); ?> </div>
		<?php echo form_close(); ?>
		<script type="text/javascript">
			$(document).ready(function() {

				/* Update location info */
				$("#e_salary_other_payments_info").validate({
					rules: {
						title: {
							required: true
						},
						amount: {
							required: true,
							number: true,
						},
					},
					// Specify validation error messages
					messages: {
						title: {
							required: "Please enter title"
						},
						amount: {
							required: "Please enter amount"
						},
					},
					submitHandler: function(form) {
						e_salary_other_payments_infoformSubmit(form);
					}
				});
				// $("#e_salary_other_payments_info").submit(function(e) {
				function e_salary_other_payments_infoformSubmit(form) {
					/*Form Submit*/
					// e.preventDefault();
					var obj = $(form),
						action = obj.attr('name');
					$('.save').prop('disabled', true);
					$.ajax({
						type: "POST",
						// url: e.target.action,
						url: form.action,
						data: obj.serialize() + "&is_ajax=29&data=e_salary_other_payments_info&type=e_salary_other_payments_info&form=" + action,
						cache: false,
						success: function(JSON) {
							if (JSON.error != '') {
								toastr.error(JSON.error);
								$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								$('.save').prop('disabled', false);
							} else {
								$('.edit-modal-data').modal('toggle');
								// On page load:
								var xin_table_all_other_payments = $('#xin_table_all_other_payments').dataTable({
									"bDestroy": true,
									"ajax": {
										url: "<?php echo site_url("admin/employees/salary_all_other_payments") ?>/" + $('#user_id').val(),
										type: 'GET'
									},
									"fnDrawCallback": function(settings) {
										$('[data-toggle="tooltip"]').tooltip();
									}
								});
								xin_table_all_other_payments.api().ajax.reload(function() {
									toastr.success(JSON.result);
									$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
								}, true);
								$('.save').prop('disabled', false);
							}
						}
					});
				}
				// });
			});
		</script>
	<?php }
	?>
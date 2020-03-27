<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (isset($_GET['jd']) && isset($_GET['tracking_type_id']) && $_GET['data'] == 'tracking_type') {
?>

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
		<h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_hr_edit_goal_tracking_type'); ?></h4>
	</div>
	<?php $attributes = array('name' => 'edit_type', 'id' => 'edit_type', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
	<?php $hidden = array('_method' => 'EDIT', '_token' => $tracking_type_id, 'ext_name' => $tracking_type_id); ?>
	<?php echo form_open('admin/goal_tracking/update_type/' . $tracking_type_id, $attributes, $hidden); ?>
	<div class="modal-body">
		<div class="form-group">
			<label for="type_name" class="form-control-label"><?php echo $this->lang->line('xin_hr_goal_tracking_type_se'); ?></label>
			<input type="text" class="form-control" name="type_name" value="<?php echo $type_name ?>" placeholder="<?php echo $this->lang->line('xin_hr_goal_tracking_type_se'); ?>">
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
			$("#edit_type").validate({
				rules: {
					type_name: {
						required: true
					},
				},
				// Specify validation error messages
				messages: {
					type_name: {
						required: "Please enter goal type"
					},
				},
				submitHandler: function(form) {
					edit_type_formSubmit(form);
				}
			});


			// $("#edit_type").submit(function(e) {
			function edit_type_formSubmit(form) {
				/*Form Submit*/
				// e.preventDefault();
				var obj = $(form),
					action = obj.attr('name');
				$('.save').prop('disabled', true);
				$.ajax({
					type: "POST",
					// url: e.target.action,
					url: form.action,
					data: obj.serialize() + "&is_ajax=2&edit_type=tracking_type&edit=1&form=" + action,
					cache: false,
					success: function(JSON) {
						if (JSON.error != '') {
							toastr.error(JSON.error);
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
							$('.save').prop('disabled', false);
						} else {
							$('.edit-modal-data').modal('toggle');
							// On page load: datatable
							var xin_table = $('#xin_table').dataTable({
								"bDestroy": true,
								"ajax": {
									url: "<?php echo site_url("admin/goal_tracking/type_list") ?>",
									type: 'GET'
								},
								"fnDrawCallback": function(settings) {
									$('[data-toggle="tooltip"]').tooltip();
								}
							});
							xin_table.api().ajax.reload(function() {
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
<?php }
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (isset($_GET['jd']) && isset($_GET['reimbursement_id']) && $_GET['data'] == 'reimbursement') {
?>
  <?php $session = $this->session->userdata('username'); ?>
  <?php $user_info = $this->Xin_model->read_user_info($session['user_id']); ?>
  <?php $role_resources_ids = $this->Xin_model->user_role_resource(); ?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_termination'); ?></h4>
  </div>
  <?php $attributes = array('name' => 'edit_reimbursement', 'id' => 'edit_reimbursement', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
  <?php $hidden = array('_method' => 'EDIT', '_token' => $id, 'ext_name' => $id); ?>
  <?php echo form_open('admin/reimbursement/update/' . $id, $attributes, $hidden); ?>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-6 selectdiv">
        <?php if ($user_info[0]->user_role_id == 1) { ?>
          <div class="form-group">
            <label for="first_name"><?php echo $this->lang->line('left_company'); ?></label>
            <select class="form-control" name="company_id" id="ajx_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company'); ?>">
              <option value=""></option>
              <?php foreach ($get_all_companies as $company) { ?>
                <option value="<?php echo $company->company_id ?>" <?php if ($company->company_id == $company_id) : ?> selected <?php endif; ?>><?php echo $company->name ?></option>
              <?php } ?>
            </select>
          </div>
        <?php } else if (!in_array('444', $role_resources_ids)) { ?>
          <?php $ecompany_id = $user_info[0]->company_id; ?>
          <div class="form-group">
            <label for="first_name"><?php echo $this->lang->line('left_company'); ?></label>
            <select class="form-control" name="company_id" id="ajx_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company'); ?>">
              <option value=""></option>
              <?php foreach ($get_all_companies as $company) { ?>
                <?php if ($ecompany_id == $company->company_id) : ?>
                  <option value="<?php echo $company->company_id ?>" <?php if ($company->company_id == $company_id) : ?> selected <?php endif; ?>><?php echo $company->name ?></option>
                <?php endif; ?>
              <?php } ?>
            </select>
          </div>
        <?php } ?>
        <?php if ($user_info[0]->user_role_id == 1 || !in_array('444', $role_resources_ids)) { ?>
          <div class="form-group" id="employee_ajx">
            <?php $result = $this->Department_model->ajax_company_employee_info($company_id); ?>
            <label for="employee"><?php echo $this->lang->line('xin_employee'); ?></label>
            <select name="employee_id" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee'); ?>">
              <option value=""></option>
              <?php foreach ($result as $employee) { ?>
                <option value="<?php echo $employee->user_id; ?>" <?php if ($employee->user_id == $employee_id) : ?> selected="selected" <?php endif; ?>> <?php echo $employee->first_name . ' ' . $employee->last_name; ?></option>
              <?php } ?>
            </select>
          </div>
        <?php } ?>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="notice_date"><?php echo $this->lang->line('xin_reimbursement_date'); ?></label>
              <input class="form-control date" placeholder="<?php echo $this->lang->line('xin_reimbursement_date'); ?>" readonly value="<?= $reimbursement_date ?>" name="reimbursement_date" type="text">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="notice_date"><?php echo $this->lang->line('xin_amount'); ?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_amount'); ?>" name="amount" value="<?= $amount ?>" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <fieldset class="form-group">
                <label for="logo"><?php echo $this->lang->line('xin_documents'); ?></label>
                <input type="file" class="form-control-file" id="reimbursement_file" name="reimbursement_file">
                <small><?php echo $this->lang->line('xin_company_file_type'); ?></small>
              </fieldset>
            </div>
          </div>
          <div class="col-md-6">
            <div class='form-group'>
              <?php if ($reimbursement_doc != '' && $reimbursement_doc != 'no file') { ?>
                <img src="<?php echo base_url() . 'uploads/reimbursement/' . $reimbursement_doc; ?>" width="70px" id="u_file"> <a href="<?php echo site_url() ?>admin/download?type=reimbursement&filename=<?php echo $reimbursement_doc; ?>"><?php echo $this->lang->line('xin_download'); ?></a>
              <?php } else { ?>
                <p>&nbsp;</p>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 selectdiv">
        <div class="form-group">
          <label for="description"><?php echo $this->lang->line('xin_description'); ?></label>
          <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_description'); ?>" name="description" cols="30" rows="10" id="description3"><?= $description ?></textarea>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="status"><?php echo $this->lang->line('dashboard_xin_status'); ?></label>
          <select name="status" id="select2-demo-6" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_xin_status'); ?>">
            <option value="1" <?php if ($status == '1') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_pending'); ?></option>
            <option value="2" <?php if ($status == '2') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_accepted'); ?></option>
            <option value="3" <?php if ($status == '3') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_rejected'); ?></option>
          </select>
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

      jQuery("#ajx_company").change(function() {
        jQuery.get(base_url + "/get_employees/" + jQuery(this).val(), function(data, status) {
          jQuery('#employee_ajx').html(data);
        });
      });

      $('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
      $('[data-plugin="select_hrm"]').select2({
        width: '100%'
      });

      $('#description2').trumbowyg();

      $('.date').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        yearRange: '1900:' + (new Date().getFullYear() + 10),
        beforeShow: function(input) {
          $(input).datepicker("widget").show();
        }
      });


      // Validation

      jQuery("#edit_reimbursement").validate({
        rules: {
          company_id: "required",
          employee_id: "required",

          reimbursement_date: {
            required: true,
            date: true
          },
          amount: {
            required: true,
            number: true,
          },
          description: "required"
        },

        messages: {
          company_id: "Please select company",
          employee_id: "Please select employee",
          reimbursement_date: "Please select reimbursement date",
          amount: {
            required: "Please enter amount",
          },
          description: "Please enter description",
        },
        submitHandler: function(form) {
          /* Update logo */

          editFormSubmit(form);
        }
      });

      // Form Submit Function

      function editFormSubmit(form) {
        var fd = new FormData(form);
        var obj = $(form),
          action = obj.attr("name");
        fd.append("is_ajax", 1);
        fd.append("edit_type", "reimbursement");
        fd.append("form", action);

        $('.save').prop('disabled', true);
        $.ajax({
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
              // On page load: datatable
              var xin_table = $('#xin_table').dataTable({
                "bDestroy": true,
                "ajax": {
                  url: "<?php echo site_url("admin/reimbursement/reimbursement_list") ?>",
                  type: 'GET'
                },
                // dom: 'lBfrtip',
                // "buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
                "fnDrawCallback": function(settings) {
                  $('[data-toggle="tooltip"]').tooltip();
                }
              });
              xin_table.api().ajax.reload(function() {
                toastr.success(JSON.result);
              }, true);
              $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
              $('.edit-modal-data').modal('toggle');
              $('.save').prop('disabled', false);
            }
          }
        });
      }
    });
  </script>
<?php } else if (isset($_GET['jd']) && isset($_GET['reimbursement_id']) && $_GET['data'] == 'view_reimbursement') {
?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
    <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_view_termination'); ?></h4>
  </div>
  <form class="m-b-1">
    <div class="modal-body">
      <table class="footable-details table table-striped table-hover toggle-circle">
        <tbody>
          <tr>
            <th><?php echo $this->lang->line('module_company_title'); ?></th>
            <td style="display: table-cell;"><?php foreach ($get_all_companies as $company) { ?>
                <?php if ($company_id == $company->company_id) : ?>
                  <?php echo $company->name; ?>
                <?php endif; ?>
              <?php } ?></td>
          </tr>
          <tr>
            <th><?php echo $this->lang->line('xin_employee'); ?></th>
            <td style="display: table-cell;"><?php foreach ($all_employees as $employee) { ?>
                <?php if ($employee_id == $employee->user_id) : ?>
                  <?php echo $employee->first_name . ' ' . $employee->last_name; ?>
                <?php endif; ?>
              <?php } ?></td>
          </tr>
          <tr>
            <th><?php echo $this->lang->line('xin_reimbursement_date'); ?></th>
            <td style="display: table-cell;"><?php echo $this->Xin_model->set_date_format($reimbursement_date); ?></td>
          </tr>

          <tr>
            <th><?php echo $this->lang->line('xin_documents'); ?></th>
            <?php if ($reimbursement_doc != '' && $reimbursement_doc != 'no file') { ?>
              <td style="display: table-cell;"> <img src="<?php echo base_url() . 'uploads/reimbursement/' . $reimbursement_doc; ?>" width="70px" id="u_file">
                <a href="<?php echo site_url() ?>admin/download?type=reimbursement&filename=<?php echo $reimbursement_doc; ?>"><?php echo $this->lang->line('xin_download'); ?></a></td>
            <?php } else { ?>
              <p>&nbsp;</p>
            <?php } ?>
          </tr>
          <tr>
            <th><?php echo $this->lang->line('xin_amount'); ?></th>
            <td style="display: table-cell;"><?= $this->Xin_model->currency_sign($amount); ?></td>
          </tr>
          <tr>
            <th><?php echo $this->lang->line('dashboard_xin_status'); ?></th>
            <td style="display: table-cell;"><?php if ($status == '1') : $t_status = $this->lang->line('xin_pending'); ?>
              <?php endif; ?>
              <?php if ($status == '2') : $t_status = $this->lang->line('xin_accepted'); ?>
              <?php endif; ?>
              <?php if ($status == '3') : $t_status = $this->lang->line('xin_rejected'); ?>
              <?php endif; ?>
              <?php echo $t_status; ?></td>
          </tr>
          <tr>
            <th><?php echo $this->lang->line('xin_description'); ?></th>
            <td style="display: table-cell;"><?php echo html_entity_decode($description); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close'); ?></button>
    </div>
    <?php echo form_close(); ?>
  <?php }
  ?>
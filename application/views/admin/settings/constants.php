<?php
/* Constants view
*/

?>
<?php $session = $this->session->userdata('username');
?>
<?php $moduleInfo = $this->Xin_model->read_setting_info(1); ?>
<?php $get_animate = $this->Xin_model->get_content_animate(); ?>
<div class="row match-heights">
  <div class="col-lg-3 col-md-3 <?php echo $get_animate; ?>">

    <div class="box">
      <div class="box-blocks">
        <div class="list-group">
          <a class="list-group-item list-group-item-action nav-tabs-link active" href="#contract" data-constant="1" data-constant-block="contract" data-toggle="tab" aria-expanded="true" id="constant_1"> <i class="fa fa-pencil"></i> <?php echo $this->lang->line('xin_e_details_contract_type'); ?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#qualification" data-constant="2" data-constant-block="qualification" data-toggle="tab" aria-expanded="true" id="constant_2"> <i class="fa fa-coffee"></i> <?php echo $this->lang->line('xin_e_details_qualification'); ?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#document_type" data-constant="3" data-constant-block="document_type" data-toggle="tab" aria-expanded="true" id="constant_3"> <i class="fa fa-file"></i> <?php echo $this->lang->line('xin_e_details_dtype'); ?> </a>
          <?php if ($moduleInfo[0]->module_awards == 'true') { ?>
            <a class="list-group-item list-group-item-action nav-tabs-link" href="#award_type" data-constant="4" data-constant-block="award_type" data-toggle="tab" aria-expanded="true" id="constant_4"> <i class="fa fa-trophy"></i> <?php echo $this->lang->line('xin_award_type'); ?> </a>
          <?php } ?>
          <!-- Leave Type -->
          <a class="list-group-item list-group-item-action nav-tabs-link" href="#leave_type" data-constant="5" data-constant-block="leave_type" data-toggle="tab" aria-expanded="true" id="constant_5"> <i class="fa fa-plane"></i> <?php echo $this->lang->line('xin_leave_type'); ?> </a>
          <!-- Salary Benefit -->
          <a class="list-group-item list-group-item-action nav-tabs-link" href="#salary_benefit" data-constant="16" data-constant-block="salary_benefit" data-toggle="tab" aria-expanded="true" id="constant_16"> <i class="fa fa-plane"></i> <?php echo $this->lang->line('xin_salary_benefit'); ?> </a>
          <!-- Grade -->
          <a class="list-group-item list-group-item-action nav-tabs-link" href="#grade_setting" data-constant="17" data-constant-block="grade_setting" data-toggle="tab" aria-expanded="true" id="constant_17"> <i class="fa fa-plane"></i> <?php echo $this->lang->line('xin_grade_setting'); ?> </a>
          <!-- Grade Benefit -->
          <a class="list-group-item list-group-item-action nav-tabs-link" href="#grade_benefit_setting" data-constant="18" data-constant-block="grade_benefit_setting" data-toggle="tab" aria-expanded="true" id="constant_18"> <i class="fa fa-plane"></i> <?php echo $this->lang->line('xin_grade_benefit_setting'); ?> </a>
          <!-- Promotion title -->
          <a class="list-group-item list-group-item-action nav-tabs-link" href="#promotion_title" data-constant="20" data-constant-block="promotion_title" data-toggle="tab" aria-expanded="true" id="constant_20"> <i class="fa fa-plane"></i> <?php echo $this->lang->line('xin_promotion_title_type'); ?> </a>
          <!-- Warning Type -->
          <a class="list-group-item list-group-item-action nav-tabs-link" href="#warning_type" data-constant="6" data-constant-block="warning_type" data-toggle="tab" aria-expanded="true" id="constant_6"> <i class="fa fa-exclamation-triangle"></i> <?php echo $this->lang->line('xin_warning_type'); ?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#termination_type" data-constant="7" data-constant-block="termination_type" data-toggle="tab" aria-expanded="true" id="constant_7"> <i class="fa fa-user-times"></i> <?php echo $this->lang->line('xin_termination_type'); ?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#expense_type" data-constant="8" data-constant-block="expense_type" data-toggle="tab" aria-expanded="true" id="constant_8"> <i class="fa fa-money"></i> <?php echo $this->lang->line('xin_expense_type'); ?> </a>
          <?php if ($moduleInfo[0]->module_recruitment == 'true') { ?>
            <a class="list-group-item list-group-item-action nav-tabs-link" href="#job_type" data-constant="9" data-constant-block="job_type" data-toggle="tab" aria-expanded="true" id="constant_9"> <i class="fa fa-newspaper-o"></i> <?php echo $this->lang->line('xin_job_type'); ?> </a>
            <a class="list-group-item list-group-item-action nav-tabs-link" href="#job_categories" data-constant="15" data-constant-block="job_categories" data-toggle="tab" aria-expanded="true" id="constant_15"> <i class="fa fa-newspaper-o"></i> <?php echo $this->lang->line('xin_rec_job_categories'); ?> </a>
          <?php } ?>
          <a class="list-group-item list-group-item-action nav-tabs-link" href="#exit_type" data-constant="10" data-constant-block="exit_type" data-toggle="tab" aria-expanded="true" id="constant_10"> <i class="fa fa-sign-out"></i> <?php echo $this->lang->line('xin_employee_exit_type'); ?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#travel_arr_type" data-constant="11" data-constant-block="travel_arr_type" data-toggle="tab" aria-expanded="true" id="constant_11"> <i class="fa fa-car"></i> <?php echo $this->lang->line('xin_travel_arrangement_type'); ?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#payment_method" data-constant="12" data-constant-block="payment_method" data-toggle="tab" aria-expanded="true" id="constant_12"> <i class="fa fa-money"></i> <?php echo $this->lang->line('xin_payment_methods'); ?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#currency_type" data-constant="13" data-constant-block="currency_type" data-toggle="tab" aria-expanded="true" id="constant_13"> <i class="fa fa-dollar"></i> <?php echo $this->lang->line('xin_currency_type'); ?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#company_type" data-constant="14" data-constant-block="company_type" data-toggle="tab" aria-expanded="true" id="constant_14"> <i class="fa fa-building"></i> <?php echo $this->lang->line('xin_company_type'); ?> </a> <a class="list-group-item list-group-item-action nav-tabs-link" href="#security_level" data-constant="15" data-constant-block="security_level" data-toggle="tab" aria-expanded="true" id="constant_15"> <i class="fa fa-get-pocket"></i> <?php echo $this->lang->line('xin_security_level'); ?> </a></div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="contract">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_e_details_contract_type'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'contract_type_info', 'id' => 'contract_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_contract_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/contract_type_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_e_details_contract_type'); ?></label>
              <input type="text" class="form-control" name="contract_type" placeholder="<?php echo $this->lang->line('xin_e_details_contract_type'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_e_details_contract_type'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_contract_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_e_details_contract_type'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="document_type" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_e_details_dtype'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'document_type_info', 'id' => 'document_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_document_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/document_type_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_e_details_dtype'); ?></label>
              <input type="text" class="form-control" name="document_type" placeholder="<?php echo $this->lang->line('xin_e_details_dtype'); ?>">
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-sm-4 col-md-4 ">
                  <div class="form-group">
                    <input type="checkbox" name="title">
                    <label for="name">Name</label>
                  </div>
                </div>
                <div class="col-sm-4 col-md-4">
                  <div class="form-group">
                    <input type="checkbox" name="address">
                    <label for="name">Address</label>
                  </div>
                </div>
                <div class="col-sm-4 col-md-4">
                  <div class="form-group">
                    <input type="checkbox" name="no">
                    <label for="name">No.</label>
                  </div>
                </div>
                <div class="col-sm-4 col-md-4">
                  <div class="form-group">
                    <input type="checkbox" name="date_of_create">
                    <label for="name">Date Of Create</label>
                  </div>
                </div>
                <div class="col-sm-4 col-md-4">
                  <div class="form-group">
                    <input type="checkbox" name="date_of_expiry">
                    <label for="name">Date Of expiry</label>
                  </div>
                </div>
                <div class="col-sm-4 col-md-4">
                  <div class="form-group">
                    <input type="checkbox" name="email">
                    <label for="name">email</label>
                  </div>
                </div>
                <div class="col-sm-4 col-md-4">
                  <div class="form-group">
                    <input type="checkbox" name="file">
                    <label for="name">File</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_e_details_dtype'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_document_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_e_details_dtype'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="qualification" style="display:none;">
    <div class="row mb-4">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_e_details_edu_level'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'edu_level_info', 'id' => 'edu_level_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_document_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/edu_level_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_e_details_edu_level'); ?></label>
              <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_edu_level'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_e_details_edu_level'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_education_level">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_e_details_edu_level'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_e_details_language'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'edu_language_info', 'id' => 'edu_language_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_edu_language' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/edu_language_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_e_details_language'); ?></label>
              <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_e_details_language'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_e_details_language'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_qualification_language">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_e_details_language'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_skill'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'edu_skill_info', 'id' => 'edu_skill_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_edu_skill' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/edu_skill_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_skill'); ?></label>
              <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_skill'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_skill'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_qualification_skill">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_skill'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="payment_method" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_payment_method'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'payment_method_info', 'id' => 'payment_method_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_payment_method' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/payment_method_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_payment_method'); ?></label>
              <input type="text" class="form-control" name="payment_method" placeholder="<?php echo $this->lang->line('xin_payment_method'); ?>">
            </div>
            <div class="form-group">
              <label for="payment_percentage" class="form-control-label"><?php echo $this->lang->line('xin_payroll_pdf_pay_percent'); ?>:</label>
              <input type="text" class="form-control" name="payment_percentage" placeholder="Enter <?php echo $this->lang->line('xin_payroll_pdf_pay_percent'); ?>">
            </div>
            <div class="form-group">
              <label for="account_number" class="form-control-label"><?php echo $this->lang->line('xin_payroll_pdf_acc_number'); ?>:</label>
              <input type="text" class="form-control" name="account_number" placeholder="Enter <?php echo $this->lang->line('xin_payroll_pdf_acc_number'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_payment_method'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_payment_method">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_payment_method'); ?></th>
                    <th><?php echo $this->lang->line('xin_payroll_pdf_pay_percent'); ?></th>
                    <th><?php echo $this->lang->line('xin_payroll_pdf_acc_number'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ($moduleInfo[0]->module_awards == 'true') { ?>
    <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="award_type" style="display:none;">
      <div class="row">
        <div class="col-md-5">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_award_type'); ?> </h3>
            </div>
            <div class="box-body">
              <?php $attributes = array('name' => 'award_type_info', 'id' => 'award_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
              <?php $hidden = array('set_award_type' => 'UPDATE'); ?>
              <?php echo form_open('admin/settings/award_type_info/', $attributes, $hidden); ?>
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_award_type'); ?></label>
                <input type="text" class="form-control" name="award_type" placeholder="<?php echo $this->lang->line('xin_award_type'); ?>">
              </div>
              <div class="form-actions box-footer">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_award_type'); ?> </h3>
            </div>
            <div class="box-body">
              <div class="box-datatable table-responsive">
                <table class="datatables-demo table table-striped table-bordered" id="xin_table_award_type">
                  <thead>
                    <tr>
                      <th><?php echo $this->lang->line('xin_action'); ?></th>
                      <th><?php echo $this->lang->line('xin_award_type'); ?></th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="promotion_title">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_e_details_promotion_type'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'promotion_type_info', 'id' => 'promotion_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_promotion_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/promotion_type_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_company_name'); ?></label>
              <select class="form-control" name="company_id" data-plugin="select_hrm" id="company_id">
                <?php foreach ($all_companies as $company) { ?>
                  <option value="<?php echo $company->company_id ?>"><?php echo $company->name ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_e_details_promotion_type'); ?></label>
              <input type="text" class="form-control" name="promotion_type" placeholder="<?php echo $this->lang->line('xin_e_details_promotion_type'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_e_details_promotion_type'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_promotion_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_company_name'); ?></th>
                    <th><?php echo $this->lang->line('xin_e_details_promotion_type'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!------------------------------------------ Leave Type ------------------------------------------>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="leave_type" style="display:none;">
    <div class="row">
      <div class="col-md-12 selectdiv">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_leave_type'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'leave_type_info', 'id' => 'leave_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_leave_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/leave_type_info/', $attributes, $hidden); ?>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name"><?php echo $this->lang->line('xin_leave_type'); ?></label>
                  <input type="text" class="form-control" name="leave_type" placeholder="<?php echo $this->lang->line('xin_leave_type'); ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name"><?php echo $this->lang->line('xin_days_per_year'); ?></label>
                  <input type="text" class="form-control" name="days_per_year" placeholder="<?php echo $this->lang->line('xin_days_per_year'); ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name"><?php echo $this->lang->line('xin_days_per_month'); ?></label>
                  <input type="text" class="form-control" name="days_per_month" placeholder="<?php echo $this->lang->line('xin_days_per_month'); ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name"><?php echo $this->lang->line('xin_carry_forward_encash'); ?></label>
                  <select class="form-control" data-plugin="select_hrm" name="carry_end_cash" id="carry_end_cash" data-placeholder="<?php echo $this->lang->line('xin_carry_forward_encash'); ?>">
                    <option></option>
                    <option value="1"><?= $this->lang->line('xin_carry_forward'); ?></option>
                    <option value="2"><?= $this->lang->line('xin_encash'); ?></option>
                    <option value="3"><?= $this->lang->line('xin_nothing'); ?></option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name"><?php echo $this->lang->line('xin_paid_not'); ?></label>
                  <select class="form-control" data-plugin="select_hrm" name="paid_not" id="paid_not" data-placeholder="<?php echo $this->lang->line('xin_paid_not'); ?>">
                    <option></option>
                    <option value="1"><?= $this->lang->line('xin_paid'); ?></option>
                    <option value="2"><?= $this->lang->line('xin_not_paid'); ?></option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_leave_type'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_leave_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_leave_type'); ?></th>
                    <th><?php echo $this->lang->line('xin_days_per_year'); ?></th>
                    <th><?php echo $this->lang->line('xin_days_per_month'); ?></th>
                    <th><?php echo $this->lang->line('xin_carry_forward_encash'); ?></th>
                    <th><?php echo $this->lang->line('xin_paid_not'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--------------------------------------- Salary Benefit --------------------------------------->
  <div class="col-md-9 current-tab <?= $get_animate ?>" id="salary_benefit" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_salary_benefit'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'salary_benefit_info', 'id' => 'salary_benefit_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_salary_benefit' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/salary_benefit_info/', $attributes, $hidden); ?>
            <div class="selectdiv">
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_company_name'); ?></label>
                <select class="form-control" name="company_id_salb" data-plugin="select_hrm" id="company_id_salb">
                  <option value=""><?= $this->lang->line('xin_company_name_select') ?></option>
                  <?php foreach ($all_companies as $company) { ?>
                    <option value="<?php echo $company->company_id ?>"><?php echo $company->name ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_salary_benefit_type'); ?></label>
              <select class="form-control" name="salary_benefit_type" data-plugin="select_hrm" id="salary_benefit_type">
                <option value="1"><?= $this->lang->line('xin_salary_allowance') ?></option>
                <option value="2"><?= $this->lang->line('xin_salary_deduction') ?></option>
              </select>
            </div>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_salary_benefit_name'); ?></label>
              <input type="text" class="form-control" name="salary_benefit_name" id="salary_benefit_name" placeholder="<?php echo $this->lang->line('xin_salary_benefit_name'); ?> ">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_salary_benefit'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_salary_benefit">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_salary_benefit_type'); ?></th>
                    <th><?php echo $this->lang->line('xin_salary_benefit_name'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--------------------------------------- Grade Setting --------------------------------------->
  <div class="col-md-9 current-tab <?= $get_animate ?>" id="grade_setting" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_grade_setting'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'grade_setting_info', 'id' => 'grade_setting_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_grade_setting' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/grade_setting_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_company_name'); ?></label>
              <select class="form-control" name="company_id" data-plugin="select_hrm" id="company_id">
                <?php foreach ($all_companies as $company) { ?>
                  <option value="<?php echo $company->company_id ?>"><?php echo $company->name ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_grade_name'); ?></label>
              <input type="text" class="form-control" name="grade_name" id="grade_name" placeholder="<?php echo $this->lang->line('xin_grade_name'); ?> ">
            </div>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_grade_range_from'); ?></label>
              <input type="text" class="form-control" name="grade_range_from" id="grade_range_from" placeholder="<?php echo $this->lang->line('xin_grade_range_from'); ?> " oninput='this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*)\./g, "$1");'>
            </div>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_grade_range_to'); ?></label>
              <input type="text" class="form-control" name="grade_range_to" id="grade_range_to" placeholder="<?php echo $this->lang->line('xin_grade_range_to'); ?> " oninput='this.value = this.value.replace(/[^0-9.]/g, "").replace(/(\..*)\./g, "$1");'>
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_grade_setting'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_grade_setting">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_company_name'); ?></th>
                    <th><?php echo $this->lang->line('xin_grade_name'); ?></th>
                    <th><?php echo $this->lang->line('xin_grade_range_from'); ?></th>
                    <th><?php echo $this->lang->line('xin_grade_range_to'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-------------------------------------- Grade Benefit Setting -------------------------------------->
  <div class="col-md-9 current-tab <?= $get_animate ?>" id="grade_benefit_setting" style="display:none;">
    <div class="row">
      <div class="col-md-4">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_grade_benefit_setting'); ?> </h3>
          </div>
          <div class="box-body selectdiv">
            <?php $attributes = array('name' => 'grade_benefit_setting_info', 'id' => 'grade_benefit_setting_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_grade_setting' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/grade_benefit_setting_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_company_name'); ?></label>
              <select class="form-control" name="company_id_aj" data-plugin="select_hrm" id="company_id_aj">
                <option value=""><?= $this->lang->line('xin_company_name_select') ?></option>
                <?php foreach ($all_companies as $company) { ?>
                  <option value="<?php echo $company->company_id ?>"><?php echo $company->name ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group" id="grade_ajax">
              <label for="name"><?php echo $this->lang->line('xin_grade_name'); ?></label>
              <select class="form-control" name="grade_id" data-plugin="select_hrm" id="grade_id">
                <option value=""><?= $this->lang->line('xin_grade_name_select') ?></option>
              </select>
            </div>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_grade_benefit_type'); ?></label>
              <select name="benefit_type_aj" id="benefit_type_aj" class="form-control" data-plugin="select_hrm">
                <option value=""><?= $this->lang->line('xin_grade_benefit_type_select') ?></option>
                <option value="1"><?= $this->lang->line('xin_salary_allowance') ?></option>
                <option value="2"><?= $this->lang->line('xin_salary_deduction') ?></option>
              </select>
            </div>
            <div class="form-group" id="benefit_aj">
              <label for="name"><?php echo $this->lang->line('xin_grade_benefit_name'); ?></label>
              <select name="benefit_name_aj" id="benefit_name_aj" class="form-control" data-plugin="select_hrm">
                <option value=""><?= $this->lang->line('xin_grade_benefit_name_select'); ?></option>
              </select>
            </div>
            <div class="form-group">
              <label for="name"><?= $this->lang->line('xin_amount_type') ?></label>
              <select name="amount_type" id="amount_type"  data-id="amount_type" class="form-control amounttype" data-plugin="select_hrm">
                <option value=""><?= $this->lang->line('xin_grade_benefit_amount_type_select'); ?></option>
                <option value="1"><?= $this->lang->line('xin_grade_benefit_amount_flat_select'); ?></option>
                <option value="2"><?= $this->lang->line('xin_grade_benefit_amount_pr_select'); ?></option>
                <!-- <option value="3"><?= $this->lang->line('xin_grade_benefit_amount_slab_select'); ?></option> -->
              </select>
            </div>
            <div class="form-group" id="salary_amount">
              <label for="name"><?= $this->lang->line('xin_salary_amount') ?></label>
              <select name="salary_amount_type" id="salary_amount_type"  data-id="salary_amount_type" class="form-control amounttype" data-plugin="select_hrm">
                <option value="1"><?= $this->lang->line('xin_basic_salary'); ?></option>
                <option value="2"><?= $this->lang->line('xin_gross_salary'); ?></option>
              </select>
            </div>
            <div class="form-group">
              <label for="name"><?= $this->lang->line('xin_amount') ?></label>
              <input name="grade_amount" id="grade_amount" class="form-control" placeholder="<?= $this->lang->line('xin_amount') ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_grade_benefit_setting'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_grade_benefit_setting">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_company_name'); ?></th>
                    <th><?php echo $this->lang->line('xin_grade_name'); ?></th>
                    <th><?php echo $this->lang->line('xin_grade_benefit_type'); ?></th>
                    <th><?php echo $this->lang->line('xin_grade_benefit_name'); ?></th>
                    <th><?php echo $this->lang->line('xin_amount'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Warning -->
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="warning_type" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_warning_type'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'warning_type_info', 'id' => 'warning_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_warning_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/warning_type_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_warning_type'); ?></label>
              <input type="text" class="form-control" name="warning_type" placeholder="<?php echo $this->lang->line('xin_warning_type'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_warning_type'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_warning_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_warning_type'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="termination_type" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_termination_type'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'termination_type_info', 'id' => 'termination_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_termination_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/termination_type_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_termination_type'); ?></label>
              <input type="text" class="form-control" name="termination_type" placeholder="<?php echo $this->lang->line('xin_termination_type'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_termination_type'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_termination_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_termination_type'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="expense_type" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_expense_type'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'expense_type_info', 'id' => 'expense_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_expense_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/expense_type_info/', $attributes, $hidden); ?>
            <div class="selectdiv">
              <div class="form-group">
                <label for="company_name"><?php echo $this->lang->line('module_company_title'); ?></label>
                <select class="form-control" name="company" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title'); ?>">
                  <option value=""><?php echo $this->lang->line('xin_select_one'); ?></option>
                  <?php foreach ($all_companies as $company) { ?>
                    <option value="<?php echo $company->company_id; ?>"> <?php echo $company->name; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_expense_type'); ?></label>
              <input type="text" class="form-control" name="expense_type" placeholder="<?php echo $this->lang->line('xin_expense_type'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_expense_type'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_expense_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('left_company'); ?></th>
                    <th><?php echo $this->lang->line('xin_expense_type'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ($moduleInfo[0]->module_recruitment == 'true') { ?>
    <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="job_type" style="display:none;">
      <div class="row">
        <div class="col-md-5">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_job_type'); ?> </h3>
            </div>
            <div class="box-body">
              <?php $attributes = array('name' => 'job_type_info', 'id' => 'job_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
              <?php $hidden = array('set_job_type' => 'UPDATE'); ?>
              <?php echo form_open('admin/settings/job_type_info/', $attributes, $hidden); ?>
              <div class="form-group">
                <label for="name"><?php echo $this->lang->line('xin_job_type'); ?></label>
                <input type="text" class="form-control" name="job_type" placeholder="<?php echo $this->lang->line('xin_job_type'); ?>">
              </div>
              <div class="form-actions box-footer">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_job_type'); ?> </h3>
            </div>
            <div class="box-body">
              <div class="box-datatable table-responsive">
                <table class="datatables-demo table table-striped table-bordered" id="xin_table_job_type">
                  <thead>
                    <tr>
                      <th><?php echo $this->lang->line('xin_action'); ?></th>
                      <th><?php echo $this->lang->line('xin_job_type'); ?></th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="job_categories" style="display:none;">
      <div class="row">
        <div class="col-md-5">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_rec_job_category'); ?> </h3>
            </div>
            <div class="box-body">
              <?php $attributes = array('name' => 'job_category_info', 'id' => 'job_category_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
              <?php $hidden = array('set_job_type' => 'UPDATE'); ?>
              <?php echo form_open('admin/settings/job_category_info/', $attributes, $hidden); ?>
              <div class="form-group">
                <label for="job_category"><?php echo $this->lang->line('xin_rec_job_category'); ?></label>
                <input type="text" class="form-control" name="job_category" placeholder="<?php echo $this->lang->line('xin_rec_job_category'); ?>">
              </div>
              <div class="form-actions box-footer">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_rec_job_categories'); ?> </h3>
            </div>
            <div class="box-body">
              <div class="box-datatable table-responsive">
                <table class="datatables-demo table table-striped table-bordered" id="xin_table_job_category">
                  <thead>
                    <tr>
                      <th><?php echo $this->lang->line('xin_action'); ?></th>
                      <th><?php echo $this->lang->line('xin_job_type'); ?></th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="exit_type" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_exit_type'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'exit_type_info', 'id' => 'exit_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_exit_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/exit_type_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_employee_exit_type'); ?></label>
              <input type="text" class="form-control" name="exit_type" placeholder="<?php echo $this->lang->line('xin_exit_type'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_exit_type'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_exit_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_employee_exit_type'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="travel_arr_type" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_travel_arrangement_type'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'travel_arr_type_info', 'id' => 'travel_arr_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_travel_arr_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/travel_arr_type_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_travel_arrangement_type'); ?></label>
              <input type="text" class="form-control" name="travel_arr_type" placeholder="<?php echo $this->lang->line('xin_travel_arrangement_type'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_travel_arrangement_type'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_travel_arr_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_travel_arrangement_type'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="currency_type" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_currency_type'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'currency_type_info', 'id' => 'currency_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_currency_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/currency_type_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_currency_name'); ?></label>
              <input type="text" class="form-control" name="name" placeholder="<?php echo $this->lang->line('xin_currency_name'); ?>">
            </div>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_currency_code'); ?></label>
              <input type="text" class="form-control" name="code" placeholder="<?php echo $this->lang->line('xin_currency_code'); ?>">
            </div>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_currency_symbol'); ?></label>
              <input type="text" class="form-control" name="symbol" placeholder="<?php echo $this->lang->line('xin_currency_symbol'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_currencies'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_currency_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_name'); ?></th>
                    <th><?php echo $this->lang->line('xin_code'); ?></th>
                    <th><?php echo $this->lang->line('xin_symbol'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="company_type" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_company_type'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'company_type_info', 'id' => 'company_type_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_company_type' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/company_type_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_company_type'); ?></label>
              <input type="text" class="form-control" name="company_type" placeholder="<?php echo $this->lang->line('xin_company_type'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_company_type'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_company_type">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_company_type'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 current-tab <?php echo $get_animate; ?>" id="security_level" style="display:none;">
    <div class="row">
      <div class="col-md-5">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_add_new'); ?> <?php echo $this->lang->line('xin_security_level'); ?> </h3>
          </div>
          <div class="box-body">
            <?php $attributes = array('name' => 'security_level_info', 'id' => 'security_level_info', 'autocomplete' => 'off', 'class' => 'm-b-1 add'); ?>
            <?php $hidden = array('set_security_level' => 'UPDATE'); ?>
            <?php echo form_open('admin/settings/security_level_info/', $attributes, $hidden); ?>
            <div class="form-group">
              <label for="name"><?php echo $this->lang->line('xin_security_level'); ?></label>
              <input type="text" class="form-control" name="security_level" placeholder="<?php echo $this->lang->line('xin_security_level'); ?>">
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo $this->lang->line('xin_list_all'); ?> <?php echo $this->lang->line('xin_security_level'); ?> </h3>
          </div>
          <div class="box-body">
            <div class="box-datatable table-responsive">
              <table class="datatables-demo table table-striped table-bordered" id="xin_table_security_level">
                <thead>
                  <tr>
                    <th><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('xin_security_level'); ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade edit_setting_datail" id="edit_setting_datail" tabindex="-1" role="dialog" aria-labelledby="edit-modal-data" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content" id="ajax_setting_info"></div>
  </div>
</div>
<style type="text/css">
  .table-striped {
    width: 100% !important;
  }
</style>
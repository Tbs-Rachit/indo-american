<?php
/* Attendance view
*/
?>
<?php $session = $this->session->userdata('username'); ?>
<?php $get_animate = $this->Xin_model->get_content_animate(); ?>
<div class="box mb-4 <?php echo $get_animate; ?>">
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <?php $attributes = array('name' => 'attendance_daily_report', 'id' => 'attendance_daily_report', 'autocomplete' => 'off', 'class' => 'add form-hrm'); ?>
        <?php $hidden = array('user_id' => $session['user_id']); ?>
        <?php echo form_open('admin/timesheet/attendance_list', $attributes, $hidden); ?>
        <?php
        $data = array(
          'type'        => 'hidden',
          'name'        => 'date_format',
          'id'          => 'date_format',
          'value'       => $this->Xin_model->set_date_format(date('Y-m-d')),
          'class'       => 'form-control',
        );
        echo form_input($data);
        ?>
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="first_name"><?php echo $this->lang->line('xin_e_details_date'); ?></label>
              <input class="form-control attendance_date" placeholder="<?php echo $this->lang->line('xin_select_date'); ?>" readonly id="attendance_date" name="attendance_date" type="text" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="first_name"><?php echo $this->lang->line('left_company'); ?></label>
              <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company'); ?>">
                <option value=""></option>
                <?php foreach ($get_all_companies as $company) { ?>
                  <option value="<?php echo $company->company_id ?>"><?php echo $company->name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-2" id="department_ajx">
            <div class="form-group">
              <label for="designation"><?php echo $this->lang->line('xin_hr_main_department'); ?></label>
              <select class="select2" disabled data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_department'); ?>" name="department_id" id="aj_departments">
                <option value=""></option>
              </select>
            </div>
          </div>
          <div class="col-md-2" id="employee_ajx">
            <div class="form-group">
              <label for="employee"><?php echo $this->lang->line('xin_employee'); ?></label>
              <select name="employee_id" id="employee_id" disabled class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee'); ?>" required>
                <option value=""></option>
              </select>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-group"> &nbsp;
              <label for="first_name">&nbsp;</label><br />
              <button type="submit" class="btn btn-primary save"><?php echo $this->lang->line('xin_get'); ?></button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</div>
<div class="box <?php echo $get_animate; ?>">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $this->lang->line('xin_daily_attendance_report'); ?></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-xs btn-primary" id="refresh"><?php echo $this->lang->line('xin_refresh'); ?></button>
    </div>
  </div>
  <div class="box-body">
    <div class="box-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table">
        <thead>
          <tr>
            <th colspan="2"><?php echo $this->lang->line('xin_hr_info'); ?></th>
            <th colspan="9"><?php echo $this->lang->line('xin_attendance_report'); ?></th>
          </tr>
          <tr>
            <th style="width:120px;"><?php echo $this->lang->line('xin_employee'); ?></th>
            <th style="width:100px;"><?php echo $this->lang->line('left_company'); ?></th>
            <th style="width:100px;"><?php echo $this->lang->line('xin_e_details_date'); ?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_xin_status'); ?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_clock_in'); ?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_clock_out'); ?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_late'); ?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_early_leaving'); ?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_overtime'); ?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_total_work'); ?></th>
            <th style="width:100px;"><?php echo $this->lang->line('dashboard_total_rest'); ?></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
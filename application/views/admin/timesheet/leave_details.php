<?php
/* Leave Detail view
*/
?>
<?php $session = $this->session->userdata('username'); ?>
<?php $user = $this->Xin_model->read_user_info($session['user_id']); ?>
<?php
$datetime1 = new DateTime($from_date);
$datetime2 = new DateTime($to_date);
$interval = $datetime1->diff($datetime2);

if (strtotime($from_date) == strtotime($to_date)) {
  $no_of_days = 1;
} else {
  $no_of_days = $interval->format('%a') + 1;
}
$leave_user = $this->Xin_model->read_user_info($employee_id);
?>
<?php $role_resources_ids = $this->Xin_model->user_role_resource(); ?>
<div class="row m-b-1">
  <div class="col-md-4">
    <section id="decimal">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> <?php echo $this->lang->line('xin_leave_detail'); ?> </h3>
            </div>
            <div class="box-body">
              <div class="table-responsive" data-pattern="priority-columns">
                <table class="table table-striped m-md-b-0">
                  <tbody>
                    <tr>
                      <th scope="row" style="border-top:0px;"><?php echo $this->lang->line('xin_employee'); ?></th>
                      <td class="text-right"><?php echo $full_name; ?></td>
                    </tr>
                    <tr>
                      <th scope="row" style="border-top:0px;"><?php echo $this->lang->line('left_department'); ?></th>
                      <td class="text-right"><?php echo $department_name; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('xin_leave_type'); ?></th>
                      <td class="text-right"><?php echo $type; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('xin_applied_on'); ?></th>
                      <td class="text-right"><?php echo $this->Xin_model->set_date_format($created_at); ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('xin_start_date'); ?></th>
                      <td class="text-right"><?php echo $this->Xin_model->set_date_format($from_date); ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('xin_end_date'); ?></th>
                      <td class="text-right"><?php echo $this->Xin_model->set_date_format($to_date); ?></td>
                    </tr>
                    <?php if ($is_half_day == '1') : ?> <?php $leave_take = $this->lang->line('xin_hr_leave_first_half_day'); ?> <?php endif; ?>
                    <?php if ($is_half_day == '2') : ?> <?php $leave_take = $this->lang->line('xin_hr_leave_second_half_day'); ?> <?php endif; ?>
                    <?php if ($is_half_day == '3') : ?> <?php $leave_take = $this->lang->line('xin_hr_leave_full_day'); ?> <?php endif; ?>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('xin_hr_leave_take'); ?></th>
                      <td class="text-right"><?php echo $leave_take; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('xin_hrsale_total_days'); ?></th>
                      <td class="text-right">
                        <?php
                        if ($is_half_day == 1 || $is_half_day == 2) {
                          // $leave_day_info = $this->lang->line('xin_hr_leave_half_day');
                          $leave_day_info = '0.5';
                        } else {
                          $leave_day_info = $no_of_days;
                        }
                        echo $leave_day_info; ?>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo $this->lang->line('xin_reason'); ?></th>
                      <td class="text-right"><?php echo $reason; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php //if($user[0]->user_role_id == 1) {
  ?>
  <div class="col-md-4">
    <section id="decimal">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> <?php echo $this->lang->line('xin_update_status'); ?> </h3>
            </div>
            <div class="box-body">
              <?php $attributes = array('name' => 'update_status', 'id' => 'update_status', 'autocomplete' => 'off'); ?>
              <?php $hidden = array('user_id' => $session['user_id'], '_token_status' => $leave_id); ?>
              <?php echo form_open('admin/timesheet/update_leave_status/' . $leave_id, $attributes, $hidden); ?>
              <div class="row">
                <div class="col-md-12">
                  <?php if ($user[0]->user_role_id == 1) { ?>
                    <div class="form-group">
                      <label for="status"><?php echo $this->lang->line('dashboard_xin_status'); ?></label>
                      <select class="form-control" name="status" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_xin_status'); ?>">
                        <option value="1" <?php if ($status == '1') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_pending'); ?></option>
                        <option value="4" <?php if ($status == '4') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_role_first_level_approval'); ?></option>
                        <option value="2" <?php if ($status == '2') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_approved'); ?></option>
                        <option value="3" <?php if ($status == '3') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_rejected'); ?></option>
                      </select>
                    </div>
                  <?php } else { ?>
                    <div class="form-group">
                      <label for="status"><?php echo $this->lang->line('dashboard_xin_status'); ?></label>
                      <select class="form-control" name="status" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('dashboard_xin_status'); ?>">
                        <option value="1" <?php if ($status == '1') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_pending'); ?></option>
                        <?php if (in_array('286', $role_resources_ids)) { ?>
                          <option value="4" <?php if ($status == '4') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_role_first_level_approval'); ?></option>
                        <?php } ?>
                        <?php if (in_array('312', $role_resources_ids)) { ?>
                          <option value="2" <?php if ($status == '2') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_approved'); ?></option>
                        <?php } ?>
                        <?php if (in_array('286', $role_resources_ids) || in_array('312', $role_resources_ids)) { ?>
                          <option value="3" <?php if ($status == '3') : ?> selected <?php endif; ?>><?php echo $this->lang->line('xin_rejected'); ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="remarks"><?php echo $this->lang->line('xin_remarks'); ?></label>
                    <textarea class="form-control textarea" placeholder="<?php echo $this->lang->line('xin_remarks'); ?>" name="remarks" id="remarks" cols="30" rows="5"><?php echo $remarks; ?></textarea>
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
      </div>
    </section>
  </div>
  <?php //} 
  ?>
  <div class="col-md-4">
    <section id="decimal">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> <?php echo $this->lang->line('xin_leave_statistics'); ?> </h3>
            </div>
            <div class="box-body">
              <div class="box-block card-dashboard">
                <?php $leave_categories_ids = explode(',', $leave_user[0]->leave_categories); ?>
                <?php foreach ($all_leave_types as $type) {
                  if (in_array($type->leave_type_id, $leave_categories_ids)) { ?>
                    <?php
                    $hlfcount = 0;
                    //$count_l =0;
                    $leave_halfday_cal = employee_leave_halfday_cal($type->leave_type_id, $employee_id);
                    foreach ($leave_halfday_cal as $lhalfday) :
                      $hlfcount += 0.5;
                    endforeach;
                    /*if($is_half_day == '1' && $type->leave_type_id == $leave_type_id){
						$count_l1 = count_leaves_info($type->leave_type_id,$employee_id);
						$leave_halfday_cal = employee_leave_halfday_cal($type->leave_type_id,$employee_id);
						foreach($leave_halfday_cal as $lhalfday):
							$count_l += 0.5;
						endforeach;
						$count_l = $count_l + $count_l1-1;
					} else {
						$count_l = count_leaves_info($type->leave_type_id,$employee_id);
						$count_l = $count_l;
					}*/
                    $count_l = count_leaves_info($type->leave_type_id, $employee_id);
                    $count_l = $count_l - $hlfcount;
                    ?>
                    <?php
                    $edays_per_year = $type->days_per_year;

                    if ($count_l == 0) {
                      $progress_class = '';
                      $count_data = 0;
                    } else {
                      if ($edays_per_year > 0) {
                        $count_data = $count_l / $edays_per_year * 100;
                      } else {
                        $count_data = 0;
                      }
                      // progress
                      if ($count_data <= 20) {
                        $progress_class = 'progress-success';
                      } else if ($count_data > 20 && $count_data <= 50) {
                        $progress_class = 'progress-info';
                      } else if ($count_data > 50 && $count_data <= 75) {
                        $progress_class = 'progress-warning';
                      } else {
                        $progress_class = 'progress-danger';
                      }
                    }
                    ?>
                    <div id="leave-statistics">
                      <div class="ml-3">
                        <div class="text-muted"><strong><?php echo $type->type_name; ?> (<?php echo $count_l; ?>/<?php echo $edays_per_year; ?>)</strong></div>
                        <div class="text-large">
                          <div class="progress" style="height: 6px;">
                            <div class="progress-bar" style="width: <?php echo $count_data; ?>%;"></div>
                          </div>
                        </div>
                      </div>
                  <?php }
                } ?>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<style type="text/css">
  .trumbowyg-editor {
    min-height: 110px !important;
  }
</style>
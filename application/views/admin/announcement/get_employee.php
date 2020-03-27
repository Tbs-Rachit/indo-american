<?php 
if ($department_id == 0) { ?>

    <?php $result = $this->Xin_model->get_all_employee(); ?>

    <label for="employee_id"><?php echo $this->lang->line('dashboard_single_employee'); ?></label>
    <select multiple="multiple" name="employee_id[]" id="employee_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee'); ?>">
        <option value="">Select Employee</option>
        <option value="0">All</option>
        <?php foreach ($result as $employee) { ?>
            <option value="<?php echo $employee->user_id; ?>"> <?php echo $employee->first_name . ' ' . $employee->last_name; ?></option>
        <?php } ?>
    </select>

<?php } else if ($department_id != 0) { ?>
    <?php $result = $this->Department_model->ajax_department_employee_info($department_id); ?>

    <label for="employee_id"><?php echo $this->lang->line('dashboard_single_employee'); ?></label>
    <select multiple="multiple" name="employee_id[]" id="employee_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee'); ?>">
        <option value="">Select Employee</option>
        <option value="0">All</option>
        <?php foreach ($result as $employee) { ?>
            <option value="<?php echo $employee->user_id; ?>"> <?php echo $employee->first_name . ' ' . $employee->last_name; ?></option>
        <?php } ?>
    </select>

<?php } ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
        $('[data-plugin="select_hrm"]').select2({
            width: '100%'
        });
    });
</script>
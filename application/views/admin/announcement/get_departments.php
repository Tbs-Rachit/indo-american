<?php $result = $this->Company_model->ajax_company_departments_info($company_id); ?>

<!-- <div class="form-group"> -->
<label for="designation"><?php echo $this->lang->line('xin_department'); ?></label>
<select class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_department'); ?>" name="department_id" id="ajx_department">
  <option value="">Select Department</option>
  <option value="0">All</option>
  <?php foreach ($result as $deparment) { ?>
    <option value="<?php echo $deparment->department_id ?>"><?php echo $deparment->department_name ?></option>
  <?php } ?>
</select>
<!-- </div> -->
<?php
//}
?>
<script type="text/javascript">
  $(document).ready(function() {
    $('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
    $('[data-plugin="select_hrm"]').select2({
      width: '100%'
    });

    jQuery("#ajx_department").change(function() {
      jQuery.get(base_url + "/get_employee/" + jQuery(this).val(), function(
        data,
        status
      ) {
        jQuery("#employee_ajax").html(data);
      });
    });
  });
</script>
<?php $result = $this->Company_model->ajax_company_grade_info($company_id); ?>

<!-- <div class="form-group"> -->
    <label for="name"><?php echo $this->lang->line('xin_grade_name'); ?></label>
    <select class="form-control" name="grade_id" data-plugin="select_hrm" id="grade_id">
        <option value=""><?= $this->lang->line('xin_grade_name_select') ?></option>
        <?php foreach ($result as $grade) { ?>
            <option value="<?php echo $grade->grade_id ?>"><?php echo $grade->grade_name ?></option>
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
    });
</script>
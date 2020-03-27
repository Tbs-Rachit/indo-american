<?php $result = $this->Xin_model->ajax_benefit_info($company_id,$benefit_type_id);
?>

<!-- <div class="form-group" > -->
    <label for="name"><?php echo $this->lang->line('xin_grade_benefit_name'); ?></label>
    <select name="benefit_name_aj" id="benefit_name_aj" class="form-control" data-plugin="select_hrm">
    <option value=""><?= $this->lang->line('xin_grade_benefit_name_select'); ?></option>
        <?php foreach ($result as $salary_benefit) { ?>
            <option value="<?php echo $salary_benefit->salary_benefit_id ?>"><?php echo $salary_benefit->salary_benefit_name ?></option>
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
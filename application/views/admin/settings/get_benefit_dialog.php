<?php $result = $this->Xin_model->ajax_benefit_info($company_id, $benefit_type_id);

if ($company_id == 0 && $benefit_type_id == 0) { ?>
    <div class="form-group">
        <label for="name"><?php echo $this->lang->line('xin_grade_benefit_name'); ?></label>
        <select name="benefit_name_aj" id="benefit_name_aj" class="form-control" data-plugin="select_hrm">
            <option value=""><?= $this->lang->line('xin_grade_benefit_name_select'); ?></option>
        </select>
    </div>

<?php } else { ?>
    <div class="form-group">
        <label for="name"><?php echo $this->lang->line('xin_grade_benefit_name'); ?></label>
        <select name="benefit_name_aj" id="benefit_name_aj" class="form-control" data-plugin="select_hrm">
            <option value=""><?= $this->lang->line('xin_grade_benefit_name_select'); ?></option>
            <?php foreach ($result as $salary_benefit) { ?>
                <option value="<?php echo $salary_benefit->salary_benefit_id ?>" <?= $salary_benefit->salary_benefit_id == $benefit_name ? 'Selected' : '';  ?> ><?php echo $salary_benefit->salary_benefit_name ?></option>
            <?php } ?>
        </select>
    </div>
<?php }
?>


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
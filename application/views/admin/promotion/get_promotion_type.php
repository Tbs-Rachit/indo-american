<?php $result = $this->Xin_model->get_promotion_type_on_company($company_id); ?>
<!-- <div class="form-group"> -->
<label for="title"><?php echo $this->lang->line('xin_promotion_title'); ?></label>
<select name="title" id="select2-demo-7" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_promotion_title'); ?>">
    <option value=""></option>
    <?php foreach ($result as $promotion_type) { ?>
        <option value="<?php echo $promotion_type->promotion_type_id; ?>"> <?php echo $promotion_type->name; ?></option>
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
        $('[data-plugin="select_hrm"]').on('change', function () {
		$(this).valid();
	});
    });
</script>
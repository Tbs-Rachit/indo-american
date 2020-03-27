<?php $system = $this->Employees_model->all_document_types_byId($doc_type); ?>
<?php if ($system[0]->is_create_date == 1) : ?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date_of_expiry" class="control-label"><?php echo $this->lang->line('xin_e_details_doc'); ?></label>
            <input class="form-control date" readonly placeholder="<?php echo $this->lang->line('xin_e_details_doc'); ?>" name="date_of_create" id="date_of_create" type="text">
        </div>
    </div>
<?php
endif;
if ($system[0]->is_expiry_date == 1) : ?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date_of_expiry" class="control-label"><?php echo $this->lang->line('xin_e_details_doe'); ?></label>
            <input class="form-control e_date" readonly placeholder="<?php echo $this->lang->line('xin_e_details_doe'); ?>" name="date_of_expiry" type="text" id="date_of_expiry" value="<?php echo $date_of_expiry; ?>">
        </div>
    </div>
<?php endif;
if ($system[0]->is_title == 1) :
?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="title" class="control-label"><?php echo $this->lang->line('xin_e_details_dtitle'); ?></label>
            <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_dtitle'); ?>" name="title" type="text" value="<?php echo $title; ?>">
        </div>
    </div>
<?php endif;
if ($system[0]->is_no == 1) :
?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="title" class="control-label"><?php echo $this->lang->line('xin_e_details_dno'); ?></label>
            <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_dno'); ?>" name="no" type="text">
        </div>
    </div>
<?php
endif;
if ($system[0]->is_notif_email == 1) :
?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email" class="control-label"><?php echo $this->lang->line('xin_e_details_notifyemail'); ?></label>
            <input class="form-control" placeholder="<?php echo $this->lang->line('xin_e_details_notifyemail'); ?>" name="email" type="email" value="<?php echo $notification_email; ?>">
        </div>
    </div>
<?php endif;
if ($system[0]->is_address == 1) :
?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description" class="control-label"><?php echo $this->lang->line('xin_description'); ?></label>
            <textarea class="form-control" placeholder="<?php echo $this->lang->line('xin_description'); ?>" data-show-counter="1" data-limit="300" name="description" cols="30" rows="3" id="d_description"><?php echo $description; ?></textarea>
        </div>
    </div>
<?php endif;
if ($system[0]->is_file == 1) :
?>
    <div class="col-md-6">
        <div class="form-group">
            <fieldset class="form-group">
                <label for="logo"><?php echo $this->lang->line('xin_e_details_document_file'); ?></label>
                <input type="file" class="form-control-file" id="document_file" name="document_file">
                <small><?php echo $this->lang->line('xin_e_details_d_type_file'); ?></small>
                <?php if ($document_file != '' && $document_file != 'no file') { ?>
                    <br />
                    <a href="<?php echo site_url('admin/download/'); ?>?type=document&filename=<?php echo $document_file; ?>"><?php echo $document_file; ?></a>
                <?php } ?>
            </fieldset>
        </div>
    </div>
<?php endif;
if ($system[0]->is_notif_email == 1) :
?>
    <div class="col-md-6">
        <div class="form-group">
            <label for="send_mail"><?php echo $this->lang->line('xin_e_details_send_notifyemail'); ?></label>
            <select name="send_mail" id="send_mail" class="form-control" data-plugin="select_hrm">
                <option value="1" <?php if ($is_alert == '1') { ?> selected="selected" <?php } ?>><?php echo $this->lang->line('xin_yes'); ?></option>
                <option value="2" <?php if ($is_alert == '2') { ?> selected="selected" <?php } ?>><?php echo $this->lang->line('xin_no'); ?></option>
            </select>
        </div>
    </div>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
        $('[data-plugin="select_hrm"]').select2({
            width: '100%'
        });
        $('[data-plugin="select_hrm"]').on('change', function() {
            $(this).valid();
        });
    });

    jQuery('#date_of_create').on('change', function() {
        var date = $(this).val();
        jQuery('#date_of_expiry').datepicker("option", "minDate", date);
    });

    $(".date").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        yearRange: "1990:" + (new Date().getFullYear() + 10)
    }).on('change', function(ev) {
        $(this).valid();
    });


</script>
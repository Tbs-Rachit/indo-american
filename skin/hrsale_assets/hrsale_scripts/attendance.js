$(document).ready(function() {

    xin_table_data()

    function xin_table_data() {
        var xin_table = $('#xin_table').dataTable({
            "bDestroy": true,
            "ajax": {
                url: site_url + "timesheet/attendance_list/?attendance_date=" + $('#attendance_date').val(),
                type: 'GET'
            },
            /*dom: 'lBfrtip',
            "buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
            "fnDrawCallback": function(settings){
            $('[data-toggle="tooltip"]').tooltip();          
            }*/
            'rowCallback': function(row, data, index) {
                if (data[4] != '-') {
                    if (data[5] == '') {
                        $(row).find('td').css('color', 'red');
                    }
                }
                if (data[3] == 'Absent') {
                    $(row).find('td:eq(3)').css('color', 'blue');
                }
                if (data[3] == 'Present') {
                    $(row).find('td:eq(3)').css('color', 'green');
                }
            }
        });
    }
    $('#refresh').click(function() {
        $('.select2-selection__rendered').html('--Select--');
        $('#attendance_daily_report')[0].reset();
        xin_table_data()
            // xin_table.api().ajax.reload(function() {}, true);
    })

    $('.view-modal-data').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var ipaddress = button.data('ipaddress');
        var uid = button.data('uid');
        var start_date = button.data('start_date');
        var att_type = button.data('att_type');
        var modal = $(this);
        $.ajax({
            url: site_url + "timesheet/read_map_info/",
            type: "GET",
            data: 'jd=1&is_ajax=1&mode=modal&data=view_map&type=view_map&ipaddress=' + ipaddress + '&uid=' + uid + '&start_date=' + start_date + '&att_type=' + att_type,
            success: function(response) {
                if (response) {
                    $("#ajax_modal_view").html(response);
                }
            }
        });
    });


    // Month & Year
    $('.attendance_date').datepicker({
        changeMonth: true,
        changeYear: true,
        maxDate: '0',
        dateFormat: 'yy-mm-dd',
        altField: "#date_format",
        altFormat: js_date_format,
        yearRange: '1970:' + new Date().getFullYear(),
        beforeShow: function(input) {
            $(input).datepicker("widget").show();
        }
    });

    /* attendance daily report */
    $("#attendance_daily_report").submit(function(e) {
        /*Form Submit*/
        e.preventDefault();
        var attendance_date = $('#attendance_date').val();
        var date_format = $('#date_format').val();
        if (attendance_date == '') {
            toastr.error('Please select date.');
        } else {
            $('#att_date').html(date_format);
            var xin_table2 = $('#xin_table').dataTable({
                "bDestroy": true,
                "ajax": {
                    url: site_url + "timesheet/attendance_list/?ihr=true&attendance_date=" + $('#attendance_date').val() + "&employee_id=" + $('#employee_id').val() + "&department_id=" + $('#aj_departments').val(),
                    type: 'GET'
                },
                /*dom: 'lBfrtip',
                "buttons": ['csv', 'excel', 'pdf', 'print'], // colvis > if needed
                "fnDrawCallback": function(settings){
                $('[data-toggle="tooltip"]').tooltip();          
                }*/
                'rowCallback': function(row, data, index) {
                    if (data[4] != '-') {
                        if (data[5] == '') {
                            $(row).find('td').css('color', 'red');
                        }
                    }

                    if (data[3] == 'Absent') {
                        $(row).find('td:eq(3)').css('color', 'blue');
                    }
                    if (data[3] == 'Present') {
                        $(row).find('td:eq(3)').css('color', 'green');
                    }
                }
            });
            xin_table2.api().ajax.reload(function() {}, true);
        }
    });


    jQuery("#aj_company").change(function() {
        jQuery.get(escapeHtmlSecure(base_url + "/get_departments/" + jQuery(this).val()), function(data, status) {
            jQuery('#department_ajx').html(data);
            //$('[data-plugin="select_hrm"]').valid();
        });
    });

    $('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
    $('[data-plugin="select_hrm"]').select2({
        width: '100%'
    });

});
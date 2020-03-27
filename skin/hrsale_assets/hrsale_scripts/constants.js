$(document).ready(function() {
    $('[data-plugin="select_hrm"]').select2($(this).attr("data-options"));
    $('[data-plugin="select_hrm"]').select2({ width: "100%" });
    // listing
    // On page load:
    var xin_table_travel_arr_type = $("#xin_table_travel_arr_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/travel_arr_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_exit_type = $("#xin_table_exit_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/exit_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_job_type = $("#xin_table_job_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/job_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
    var xin_table_job_category = $("#xin_table_job_category").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 15,
        aLengthMenu: [
            [15, 30, 50, 100, -1],
            [15, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/job_category_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_expense_type = $("#xin_table_expense_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/expense_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_termination_type = $("#xin_table_termination_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/termination_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_warning_type = $("#xin_table_warning_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/warning_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_leave_type = $("#xin_table_leave_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/leave_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
    var xin_table_salary_benefit = $("#xin_table_salary_benefit").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/salary_benefit_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
    var xin_table_grade_setting = $("#xin_table_grade_setting").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/grade_setting_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
    var xin_table_grade_benefit_setting = $("#xin_table_grade_benefit_setting").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/grade_benefit_setting_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_award_type = $("#xin_table_award_type").dataTable({
        bDestroy: true,
        bFilter: false,
        iDisplayLength: 5,
        bLengthChange: false,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/award_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_document_type = $("#xin_table_document_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/document_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_contract_type = $("#xin_table_contract_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/contract_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_payment_method = $("#xin_table_payment_method").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/payment_method_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_education_level = $("#xin_table_education_level").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/education_level_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_qualification_language = $(
        "#xin_table_qualification_language"
    ).dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/qualification_language_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_qualification_skill = $(
        "#xin_table_qualification_skill"
    ).dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/qualification_skill_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_currency_type = $("#xin_table_currency_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/currency_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_company_type = $("#xin_table_company_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/company_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
    var xin_table_security_level = $("#xin_table_security_level").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/security_level_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });

    var xin_table_promotion_type = $("#xin_table_promotion_type").dataTable({
        bDestroy: true,
        bFilter: false,
        bLengthChange: false,
        iDisplayLength: 5,
        aLengthMenu: [
            [5, 10, 30, 50, 100, -1],
            [5, 10, 30, 50, 100, "All"]
        ],
        ajax: {
            url: site_url + "settings/promotion_type_list/",
            type: "GET"
        },
        fnDrawCallback: function(settings) {
            $('[data-toggle="tooltip"]').tooltip();
        }
    });


    /**document_type_info */
    $("#document_type_info").validate({
        rules: {
            document_type: {
                required: true,
                alphabetsnspace: true
            },
        },
        // Specify validation error messages
        messages: {
            document_type: { required: "Please enter document type" },
        },
        submitHandler: function(form) {
            document_type_info_form(form);
        }
    });

    // jQuery("#document_type_info").submit(function (e) {
    function document_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=15&data=document_type_info&type=document_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_document_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#document_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    /* contract type info */
    $("#contract_type_info").validate({
        rules: {
            contract_type: {
                required: true,
                alphabetsnspace: true
            },
        },
        // Specify validation error messages
        messages: {
            contract_type: { required: "Please enter contract type name" },
        },
        submitHandler: function(form) {
            contract_type_info_form(form);
        }
    });

    // jQuery("#contract_type_info").submit(function (e) {
    function contract_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=16&data=contract_type_info&type=contract_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_contract_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#contract_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    $("#payment_method_info").validate({
        rules: {
            payment_method: {
                required: true,
                letterswithspace: true
            },
            payment_percentage: {
                required: true,
                number: true
            },
            account_number: {
                required: true,
                number: true
            },
        },
        // Specify validation error messages
        messages: {
            payment_method: { required: "Please enter payment method" },
            payment_percentage: { required: "Please enter payment percentage" },
            account_number: { required: "Please enter account number" },
        },
        submitHandler: function(form) {
            payment_method_info_form(form);
        }
    });

    // jQuery("#payment_method_info").submit(function (e) {
    function payment_method_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=17&data=payment_method_info&type=payment_method_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    jQuery(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table_payment_method.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#payment_method_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    /* edu level info */
    $("#edu_level_info").validate({
        rules: {
            name: {
                required: true,
                alphabetsnspace: true
            },
        },
        // Specify validation error messages
        messages: {
            name: { required: "Please enter education level" },
        },
        submitHandler: function(form) {
            edu_level_info_form(form);
        }
    });

    // jQuery("#edu_level_info").submit(function (e) {
    function edu_level_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=18&data=edu_level_info&type=edu_level_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    jQuery(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table_education_level.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#edu_level_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    /* edu_language_info */
    $("#edu_language_info").validate({
        rules: {
            name: {
                required: true,
                alphabetsnspace: true
            },
        },
        // Specify validation error messages
        messages: {
            name: { required: "Please enter language" },
        },
        submitHandler: function(form) {
            edu_language_info_form(form);
        }
    });

    // jQuery("#edu_language_info").submit(function (e) {
    function edu_language_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=19&data=edu_language_info&type=edu_language_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    jQuery(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table_qualification_language.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#edu_language_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    /*edu_skill_info */
    $("#edu_skill_info").validate({
        rules: {
            name: {
                required: true,
            },
        },
        // Specify validation error messages
        messages: {
            name: { required: "Please enter skill name" },
        },
        submitHandler: function(form) {
            edu_skill_info_form(form);
        }
    });

    // jQuery("#edu_skill_info").submit(function (e) {
    function edu_skill_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=20&data=edu_skill_info&type=edu_skill_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    jQuery(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table_qualification_skill.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#edu_skill_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    /**leave_type_info */
    $("#leave_type_info").validate({
        rules: {
            leave_type: {
                required: true,
                alphabetsnspace: true
            },
            days_per_year: {
                required: true,
                number: true
            },
            days_per_month: {
                required: true,
                number: true
            },
        },
        // Specify validation error messages
        messages: {
            leave_type: { required: "Please enter leave type" },
            days_per_year: { required: "Please enter days per year" },
            days_per_month: { required: "Please enter days per month" },
        },
        submitHandler: function(form) {
            leave_type_info_form(form);
        }
    });

    // jQuery("#leave_type_info").submit(function (e) {
    function leave_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=23&data=leave_type_info&type=leave_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    jQuery(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table_leave_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#leave_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    /**salary_benefit_info */
    $("#salary_benefit_info").validate({
        rules: {
            company_id_salb: {
                required: true,
            },
            salary_benefit_name: {
                required: true,
                alphanumerics: true
            },
        },
        // Specify validation error messages
        messages: {
            company_id_salb: { required: "Please enter company name" },
            salary_benefit_name: { required: "Please enter salary benefit name" },
        },
        submitHandler: function(form) {
            salary_benefit_info_form(form);
        }
    });

    // jQuery("#salary_benefit_info").submit(function (e) {
    function salary_benefit_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=23&data=salary_benefit_info&type=salary_benefit_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    jQuery(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table_salary_benefit.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#salary_benefit_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    /**grade_benefit_setting_info */
    $("#grade_benefit_setting_info").validate({
        rules: {
            company_id_aj: { required: true },
            grade_id: { required: true },
            benefit_type_aj: { required: true },
            benefit_name_aj: { required: true },
            amount_type: { required: true },
            grade_amount: {
                required: true,
                number: true
            },
        },
        // Specify validation error messages
        messages: {
            company_id_aj: { required: "Please select company name" },
            grade_id: { required: "Please select grade" },
            benefit_type_aj: { required: "Please select grade benefit type", },
            benefit_name_aj: { required: "Please select grade benefit name", },
            amount_type: { required: "Please select amount type", },
            grade_amount: { required: "Please enter amount", },
        },
        submitHandler: function(form) {
            grade_benefit_setting_info_form(form);
        }
    });

    // jQuery("#grade_benefit_setting_info").submit(function (e) {
    function grade_benefit_setting_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=23&data=grade_benefit_setting_info&type=grade_benefit_setting_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    jQuery(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table_grade_benefit_setting.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    // jQuery("#grade_benefit_setting_info")[0].reset(); // To reset form fields
                    $('#amount_type').val('').trigger("change");
                    $('#salary_amount_type').val(1).trigger("change");
                    jQuery("#grade_amount").val(''); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    /**grade_setting_info */
    $("#grade_setting_info").validate({
        rules: {
            grade_name: {
                required: true,
            },
            grade_range_from: {
                required: true,
            },
            grade_range_to: {
                required: true,
                greaterThanEqual: "#grade_range_from"
            },
        },
        // Specify validation error messages
        messages: {
            grade_name: { required: "Please enter grade name" },
            grade_range_from: { required: "Please enter lower limit" },
            grade_range_to: {
                required: "Please enter upper limit",
                greaterThanEqual: "Must be greater than lower limit",
            },
        },
        submitHandler: function(form) {
            grade_setting_info_form(form);
        }
    });

    // jQuery("#grade_setting_info").submit(function (e) {
    function grade_setting_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=23&data=grade_setting_info&type=grade_setting_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    jQuery(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table_grade_setting.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#grade_setting_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    $("#travel_arr_type_info").validate({
        rules: {
            travel_arr_type: {
                required: true,
                letterswithspace: true
            },
        },
        // Specify validation error messages
        messages: {
            travel_arr_type: { required: "Please enter travel arrangement type" },
        },
        submitHandler: function(form) {
            travel_arr_type_info_form(form);
        }
    });

    // jQuery("#travel_arr_type_info").submit(function (e) {
    function travel_arr_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=45&data=travel_arr_type_info&type=travel_arr_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    jQuery(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table_travel_arr_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#travel_arr_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    /**award_type */
    $("#award_type_info").validate({
        rules: {
            award_type: {
                required: true,
                alphanumerics: true
            },
        },
        // Specify validation error messages
        messages: {
            award_type: { required: "Please enter award type" },
        },
        submitHandler: function(form) {
            award_type_info_form(form);
        }
    });
    // jQuery("#award_type_info").submit(function (e) {
    function award_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=22&data=award_type_info&type=award_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_award_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#award_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    $("#warning_type_info").validate({
        rules: {
            warning_type: {
                required: true,
                letterswithspace: true
            },
        },
        // Specify validation error messages
        messages: {
            warning_type: { required: "Please enter warning type" },
        },
        submitHandler: function(form) {
            warning_type_info_form(form);
        }
    });

    // jQuery("#warning_type_info").submit(function (e) {
    function warning_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=24&data=warning_type_info&type=warning_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_warning_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#warning_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    // termination_type_info

    $("#termination_type_info").validate({
        rules: {
            termination_type: {
                required: true,
                letterswithspace: true
            },
        },
        // Specify validation error messages
        messages: {
            termination_type: {
                required: "Please enter termination type"
            },
        },
        submitHandler: function(form) {
            termination_type_info_form(form);
        }
    });
    // jQuery("#termination_type_info").submit(function (e) {
    function termination_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=25&data=termination_type_info&type=termination_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_termination_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#termination_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    $("#expense_type_info").validate({
        rules: {
            company: { required: true },
            expense_type: {
                required: true,
                letterswithspace: true
            },
        },
        // Specify validation error messages
        messages: {
            company: { required: "Please select company" },
            expense_type: { required: "Please enter expense type" },
        },
        submitHandler: function(form) {
            expense_type_info_form(form);
        }
    });

    // jQuery("#expense_type_info").submit(function (e) {
    function expense_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=26&data=expense_type_info&type=expense_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_expense_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#expense_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    $("#job_type_info").validate({
        rules: {
            job_type: {
                required: true,
                letterswithspace: true
            },
        },
        // Specify validation error messages
        messages: {
            job_type: { required: "Please enter job type" },
        },
        submitHandler: function(form) {
            job_type_info_form(form);
        }
    });

    // jQuery("#job_type_info").submit(function (e) {
    function job_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=27&data=job_type_info&type=job_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_job_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#job_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    $("#job_category_info").validate({
        rules: {
            job_category: {
                required: true,
                letterswithspace: true
            },
        },
        // Specify validation error messages
        messages: {
            job_category: { required: "Please enter job category" },
        },
        submitHandler: function(form) {
            job_category_info_form(form);
        }
    });

    // jQuery("#job_category_info").submit(function (e) {
    function job_category_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=27&data=job_category_info&type=job_category_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_job_category.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#job_category_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    $("#exit_type_info").validate({
        rules: {
            exit_type: {
                required: true,
                letterswithspace: true
            },
        },
        // Specify validation error messages
        messages: {
            exit_type: { required: "Please enter exit type" },
        },
        submitHandler: function(form) {
            exit_type_info_form(form);
        }
    });

    // jQuery("#exit_type_info").submit(function (e) {
    function exit_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=28&data=exit_type_info&type=exit_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_exit_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#exit_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    $("#currency_type_info").validate({
        rules: {
            name: {
                required: true,
                letterswithspace: true
            },
            code: {
                required: true,
                lettersonly: true
            },
            symbol: {
                required: true,
            },
        },
        // Specify validation error messages
        messages: {
            name: { required: "Please enter currency name" },
            code: { required: "Please enter currency code" },
            symbol: { required: "Please enter currency symbol" },
        },
        submitHandler: function(form) {
            currency_type_info_form(form);
        }
    });

    // jQuery("#currency_type_info").submit(function (e) {
    function currency_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=28&data=currency_type_info&type=currency_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_currency_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#currency_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    $("#company_type_info").validate({
        rules: {
            company_type: {
                required: true,
                letterswithspace: true
            },
        },
        // Specify validation error messages
        messages: {
            company_type: { required: "Please enter company type" },
        },
        submitHandler: function(form) {
            company_type_info_form(form);
        }
    });

    // jQuery("#company_type_info").submit(function (e) {
    function company_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=28&data=company_type_info&type=company_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_company_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#company_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    $("#security_level_info").validate({
        rules: {
            security_level: {
                required: true,
                letterswithspace: true
            },
        },
        // Specify validation error messages
        messages: {
            security_level: { required: "Please enter security type" },
        },
        submitHandler: function(form) {
            security_level_info_form(form);
        }
    });

    // jQuery("#security_level_info").submit(function (e) {
    function security_level_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=28&data=security_level_info&type=security_level_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery(".save").prop("disabled", false);
                } else {
                    xin_table_security_level.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#security_level_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });

    /* promotion_type_info */
    $("#promotion_type_info").validate({
        rules: {
            promotion_type: {
                required: true,
                alphabetsnspace: true
            },
        },
        // Specify validation error messages
        messages: {
            promotion_type: { required: "Please enter promotion type" },
        },
        submitHandler: function(form) {
            promotion_type_info_form(form);
        }
    });

    // jQuery("#promotion_type_info").submit(function (e) {
    function promotion_type_info_form(form) {
        /*Form Submit*/
        // e.preventDefault();
        var obj = jQuery(form),
            action = obj.attr("name");
        jQuery(".save").prop("disabled", true);
        $(".icon-spinner3").show();
        jQuery.ajax({
            type: "POST",
            // url: e.target.action,
            url: form.action,
            data: obj.serialize() +
                "&is_ajax=18&data=promotion_type_info&type=promotion_type_info&form=" +
                action,
            cache: false,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    jQuery(".save").prop("disabled", false);
                    $(".icon-spinner3").hide();
                } else {
                    xin_table_promotion_type.api().ajax.reload(function() {
                        toastr.success(JSON.result);
                    }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                    jQuery("#promotion_type_info")[0].reset(); // To reset form fields
                    jQuery(".save").prop("disabled", false);
                }
            }
        });
    }
    // });



    /* Delete data */
    $("#delete_record").submit(function(e) {
        var tk_type = $("#token_type").val();
        $(".icon-spinner3").show();
        if (tk_type == "document_type") {
            var field_add =
                "&is_ajax=9&data=delete_document_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "contract_type") {
            var field_add =
                "&is_ajax=10&data=delete_contract_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "payment_method") {
            var field_add =
                "&is_ajax=11&data=delete_payment_method&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "education_level") {
            var field_add =
                "&is_ajax=12&data=delete_education_level&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "qualification_language") {
            var field_add =
                "&is_ajax=13&data=delete_qualification_language&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "qualification_skill") {
            var field_add =
                "&is_ajax=14&data=delete_qualification_skill&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "award_type") {
            var field_add = "&is_ajax=31&data=delete_award_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "leave_type") {
            var field_add = "&is_ajax=32&data=delete_leave_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "warning_type") {
            var field_add =
                "&is_ajax=33&data=delete_warning_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "termination_type") {
            var field_add =
                "&is_ajax=34&data=delete_termination_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "expense_type") {
            var field_add =
                "&is_ajax=35&data=delete_expense_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "job_type") {
            var field_add = "&is_ajax=36&data=delete_job_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "exit_type") {
            var field_add = "&is_ajax=37&data=delete_exit_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "travel_arr_type") {
            var field_add =
                "&is_ajax=47&data=delete_travel_arr_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "currency_type") {
            var field_add =
                "&is_ajax=47&data=delete_currency_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "company_type") {
            var field_add =
                "&is_ajax=47&data=delete_company_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "job_category") {
            var field_add =
                "&is_ajax=47&data=delete_job_category&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "security_level") {
            var field_add =
                "&is_ajax=47&data=delete_security_level&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "salary_benefit") {
            var field_add =
                "&is_ajax=48&data=delete_salary_benefit&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "grade_setting") {
            var field_add =
                "&is_ajax=48&data=delete_grade_setting&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "grade_benefit_setting") {
            var field_add =
                "&is_ajax=48&data=delete_grade_benefit_setting&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        } else if (tk_type == "promotion_type") {
            var field_add =
                "&is_ajax=49&data=delete_promotion_type&type=delete_record&";
            var tb_name = "xin_table_" + tk_type;
        }

        /*Form Submit*/
        e.preventDefault();
        var obj = $(this),
            action = obj.attr("name");
        $.ajax({
            url: e.target.action,
            type: "post",
            data: "?" + obj.serialize() + field_add + "form=" + action,
            success: function(JSON) {
                if (JSON.error != "") {
                    toastr.error(JSON.error);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                    $(".icon-spinner3").hide();
                } else {
                    $(".delete-modal").modal("toggle");
                    $(".icon-spinner3").hide();
                    $("#" + tb_name)
                        .dataTable()
                        .api()
                        .ajax.reload(function() {
                            toastr.success(JSON.result);
                        }, true);
                    $('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
                }
            }
        });
    });

    $("#edit_setting_datail").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var field_id = button.data("field_id");
        var field_type = button.data("field_type");
        $(".icon-spinner3").show();
        if (field_type == "document_type") {
            var field_add = "&data=ed_document_type&type=ed_document_type&";
        } else if (field_type == "contract_type") {
            var field_add = "&data=ed_contract_type&type=ed_contract_type&";
        } else if (field_type == "payment_method") {
            var field_add = "&data=ed_payment_method&type=ed_payment_method&";
        } else if (field_type == "education_level") {
            var field_add = "&data=ed_education_level&type=ed_education_level&";
        } else if (field_type == "qualification_language") {
            var field_add =
                "&data=ed_qualification_language&type=ed_qualification_language&";
        } else if (field_type == "qualification_skill") {
            var field_add =
                "&data=ed_qualification_skill&type=ed_qualification_skill&";
        } else if (field_type == "award_type") {
            var field_add = "&data=ed_award_type&type=ed_award_type&";
        } else if (field_type == "leave_type") {
            var field_add = "&data=ed_leave_type&type=ed_leave_type&";
        } else if (field_type == "salary_benefit") {
            var field_add = "&data=ed_salary_benefit&type=ed_salary_benefit&";
        } else if (field_type == "grade_setting") {
            var field_add = "&data=ed_grade_setting&type=ed_grade_setting&";
        } else if (field_type == "grade_benefit_setting") {
            var field_add =
                "&data=ed_grade_benefit_setting&type=ed_grade_benefit_setting&";
        } else if (field_type == "warning_type") {
            var field_add = "&data=ed_warning_type&type=ed_warning_type&";
        } else if (field_type == "termination_type") {
            var field_add = "&data=ed_termination_type&type=ed_termination_type&";
        } else if (field_type == "expense_type") {
            var field_add = "&data=ed_expense_type&type=ed_expense_type&";
        } else if (field_type == "job_type") {
            var field_add = "&data=ed_job_type&type=ed_job_type&";
        } else if (field_type == "exit_type") {
            var field_add = "&data=ed_exit_type&type=ed_exit_type&";
        } else if (field_type == "travel_arr_type") {
            var field_add = "&data=ed_travel_arr_type&type=ed_travel_arr_type&";
        } else if (field_type == "currency_type") {
            var field_add = "&data=ed_currency_type&type=ed_currency_type&";
        } else if (field_type == "company_type") {
            var field_add = "&data=ed_company_type&type=ed_company_type&";
        } else if (field_type == "job_category") {
            var field_add = "&data=ed_job_category&type=ed_job_category&";
        } else if (field_type == "security_level") {
            var field_add = "&data=ed_security_level&type=ed_security_level&";
        } else if (field_type == "promotion_type") {
            var field_add = "&data=ed_promotion_type&type=ed_promotion_type&";
        }

        var modal = $(this);
        $.ajax({
            url: site_url + "settings/constants_read/",
            type: "GET",
            data: "jd=1" + field_add + "field_id=" + field_id,
            success: function(response) {
                if (response) {
                    $(".icon-spinner3").hide();
                    $("#ajax_setting_info").html(response);
                }
            }
        });
    });

    $(".nav-tabs-link").click(function() {
        var profile_id = $(this).data("constant");
        var profile_block = $(this).data("constant-block");
        $(".list-group-item").removeClass("active");
        $(".current-tab").hide();
        $("#constant_" + profile_id).addClass("active");
        $("#" + profile_block).show();
    });

    // Ajax

    jQuery("#benefit_type_aj").change(function() {
        jQuery.get(
            base_url +
            "/get_benefits/" +
            jQuery(this).val() +
            "/" +
            jQuery("#company_id_aj").val(),
            function(data, status) {
                jQuery("#benefit_aj").html(data);
            }
        );
    });
    jQuery("#company_id_aj").change(function() {
        jQuery.get(base_url + "/get_grade/" + jQuery(this).val(), function(
            data,
            status
        ) {
            jQuery("#grade_ajax").html(data);
        });
    });


    $('#salary_amount').hide()
    $('#amount_type').change(function() {
        if ($(this).val() == 2) {
            $('#salary_amount').show()
        } else {
            $('#salary_amount').hide()
        }
    });

});
$(document).on("click", ".delete", function() {
    $("input[name=_token]").val($(this).data("record-id"));
    $("input[name=token_type]").val($(this).data("token_type"));
    $("#delete_record").attr(
        "action",
        site_url +
        "settings/delete_" +
        $(this).data("token_type") +
        "/" +
        $(this).data("record-id")
    ) + "/";
});
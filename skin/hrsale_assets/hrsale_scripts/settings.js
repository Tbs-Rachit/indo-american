$(document).ready(function() {
	$('[data-plugin="select_hrm"]').select2($(this).attr("data-options"));
	$('[data-plugin="select_hrm"]').select2({ width: "100%" });

	jQuery("#company_info").validate({
		rules: {
			company_name: {
				required: true,
				letterswithspace: true
			},
			contact_person: {
				required: true,
				alphabetsnspace: true
			},
			email: {
				required: true,
				validemail: true
			},
			phone: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10
			},
			country: {
				required: true
			}
		},
		messages: {
			company_name: {
				required: "Please enter company name"
			},
			contact_person: {
				required: "Please enter contact person name"
			},
			email: {
				required: "Please enter email address"
			},
			phone: {
				required: "Please enter phone number"
			},
			country: {
				required: "Please selecet country"
			}
		},
		submitHandler: function(form) {
			formSubmit(form);
		}
	});

	// Form Submit Function
	function formSubmit(form) {
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		jQuery.ajax({
			type: "POST",
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=1&data=company_info&type=company_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}

	// jQuery("#company_info").submit(function(e) {
	// 	/*Form Submit*/
	// 	e.preventDefault();
	// 	var obj = jQuery(this),
	// 		action = obj.attr("name");
	// 	jQuery(".save").prop("disabled", true);
	// 	$(".icon-spinner3").show();
	// 	jQuery.ajax({
	// 		type: "POST",
	// 		url: e.target.action,
	// 		data:
	// 			obj.serialize() +
	// 			"&is_ajax=1&data=company_info&type=company_info&form=" +
	// 			action,
	// 		cache: false,
	// 		success: function(JSON) {
	// 			if (JSON.error != "") {
	// 				toastr.error(JSON.error);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".icon-spinner3").hide();
	// 				jQuery(".save").prop("disabled", false);
	// 			} else {
	// 				toastr.success(JSON.result);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".icon-spinner3").hide();
	// 				jQuery(".save").prop("disabled", false);
	// 			}
	// 		}
	// 	});
	// });




	// Validation

	jQuery("#file_setting_info").validate({
		rules: {
			maximum_file_size :{
				required : true,
				number : true
			},
			allowed_extensions:{
				required : true,
				minlength : 1
			}
		},
		messages: {
			maximum_file_size : {
				required : "Please select max. file size"
			}
		},
		submitHandler: function(form) {
			fileInfoFormSubmit(form);
			
		}
	});

	// // Form Submit Function
	function fileInfoFormSubmit(form) { 
		var obj = $(form),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		if ($("#view_all_files").is(":checked")) {
			var view_all_files = $("#view_all_files").val();
		} else {
			var view_all_files = "";
		}
		$.ajax({
			type: "POST",
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=2&type=setting_info&form=" +
				action +
				"&view_all_files=" +
				view_all_files,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				}
			}
		});
	}

	// $("#file_setting_info").submit(function(e) {
	// 	/*Form Submit*/
	// 	e.preventDefault();
	// 	var obj = $(this),
	// 		action = obj.attr("name");
	// 	$(".save").prop("disabled", true);
	// 	if ($("#view_all_files").is(":checked")) {
	// 		var view_all_files = $("#view_all_files").val();
	// 	} else {
	// 		var view_all_files = "";
	// 	}
	// 	$.ajax({
	// 		type: "POST",
	// 		url: e.target.action,
	// 		data:
	// 			obj.serialize() +
	// 			"&is_ajax=2&type=setting_info&form=" +
	// 			action +
	// 			"&view_all_files=" +
	// 			view_all_files,
	// 		cache: false,
	// 		success: function(JSON) {
	// 			if (JSON.error != "") {
	// 				toastr.error(JSON.error);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".save").prop("disabled", false);
	// 			} else {
	// 				toastr.success(JSON.result);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".save").prop("disabled", false);
	// 			}
	// 		}
	// 	});
	// });


	jQuery("#is_half_monthly").change(function() {
		var opt = $(this).val();
		if (opt == 1) {
			$("#deduct_options").show();
		} else {
			$("#deduct_options").hide();
		}
	});
	jQuery("#email_type").change(function() {
		var opt = $(this).val();
		if (opt == "smtp") {
			$("#smtp_options").show();
		} else {
			$("#smtp_options").hide();
		}
	});

	// Validation System info

	jQuery("#system_info").validate({
		rules: {
			application_name: {
				required: true,
				letterswithspace: true
			},
			default_currency_symbol: "required",
			show_currency: "required",
			currency_position: "required",
			employee_login_id: "required",
			date_format: "required",
			footer_text: "required",
			system_timezone: "required",
			system_ip_address: "required",
			default_language: "required"
		},
		messages: {
			application_name: {
				required: "Please enter application name"
			},
			default_currency_symbol: "Please select default currency",
			show_currency: "Please select currency symbol / code",
			currency_position: "Please select currency position",
			employee_login_id: "Please select employee login",
			date_format: "Please select date format",
			footer_text: "Please enter footer text",
			system_timezone: "Please select system timezone",
			system_ip_address: "Please enter ip address",
			default_language: "Please select default language"
		},
		submitHandler: function(form) {
			formSubmit(form);
		}
	});

	// Form Submit Function
	function formSubmit(form) {
		if ($("#enable_page_rendered").is(":checked")) {
			var enable_page_rendered = $("#enable_page_rendered").val();
		} else {
			var enable_page_rendered = "";
		}
		if ($("#enable_current_year").is(":checked")) {
			var enable_current_year = $("#enable_current_year").val();
		} else {
			var enable_current_year = "";
		}
		if ($("#enable_auth_background").is(":checked")) {
			var enable_auth_background = $("#enable_auth_background").val();
		} else {
			var enable_auth_background = "";
		}

		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		jQuery.ajax({
			type: "POST",
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=3&data=system_info&type=system_info&form=" +
				action +
				"&enable_page_rendered=" +
				enable_page_rendered +
				"&enable_current_year=" +
				enable_current_year +
				"&enable_auth_background=" +
				enable_auth_background,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
					$(".icon-spinner3").hide();
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
					$(".icon-spinner3").hide();
				}
			}
		});
	}

	// jQuery("#system_info").submit(function(e) {
	// 	/*Form Submit*/
	// 	e.preventDefault();
	// 	if ($("#enable_page_rendered").is(":checked")) {
	// 		var enable_page_rendered = $("#enable_page_rendered").val();
	// 	} else {
	// 		var enable_page_rendered = "";
	// 	}
	// 	if ($("#enable_current_year").is(":checked")) {
	// 		var enable_current_year = $("#enable_current_year").val();
	// 	} else {
	// 		var enable_current_year = "";
	// 	}
	// 	if ($("#enable_auth_background").is(":checked")) {
	// 		var enable_auth_background = $("#enable_auth_background").val();
	// 	} else {
	// 		var enable_auth_background = "";
	// 	}

	// 	var obj = jQuery(this),
	// 		action = obj.attr("name");
	// 	jQuery(".save").prop("disabled", true);
	// 	$(".icon-spinner3").show();
	// 	jQuery.ajax({
	// 		type: "POST",
	// 		url: e.target.action,
	// 		data:
	// 			obj.serialize() +
	// 			"&is_ajax=3&data=system_info&type=system_info&form=" +
	// 			action +
	// 			"&enable_page_rendered=" +
	// 			enable_page_rendered +
	// 			"&enable_current_year=" +
	// 			enable_current_year +
	// 			"&enable_auth_background=" +
	// 			enable_auth_background,
	// 		cache: false,
	// 		success: function(JSON) {
	// 			if (JSON.error != "") {
	// 				toastr.error(JSON.error);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				jQuery(".save").prop("disabled", false);
	// 				$(".icon-spinner3").hide();
	// 			} else {
	// 				toastr.success(JSON.result);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				jQuery(".save").prop("disabled", false);
	// 				$(".icon-spinner3").hide();
	// 			}
	// 		}
	// 	});
	// });

	jQuery("#role_info").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = jQuery(this),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		if ($("#contact_role").is(":checked")) {
			var contact_role = $("#contact_role").val();
		} else {
			var contact_role = "";
		}
		if ($("#edu_role").is(":checked")) {
			var edu_role = $("#edu_role").val();
		} else {
			var edu_role = "";
		}
		if ($("#work_role").is(":checked")) {
			var work_role = $("#work_role").val();
		} else {
			var work_role = "";
		}
		if ($("#doc_role").is(":checked")) {
			var doc_role = $("#doc_role").val();
		} else {
			var doc_role = "";
		}
		if ($("#social_role").is(":checked")) {
			var social_role = $("#social_role").val();
		} else {
			var social_role = "";
		}
		if ($("#pic_role").is(":checked")) {
			var pic_role = $("#pic_role").val();
		} else {
			var pic_role = "";
		}
		if ($("#profile_role").is(":checked")) {
			var profile_role = $("#profile_role").val();
		} else {
			var profile_role = "";
		}
		if ($("#bank_account_role").is(":checked")) {
			var bank_account_role = $("#bank_account_role").val();
		} else {
			var bank_account_role = "";
		}
		jQuery.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=4&data=role_info&type=role_info&form=" +
				action +
				"&employee_manage_own_contact=" +
				contact_role +
				"&employee_manage_own_qualification=" +
				edu_role +
				"&employee_manage_own_work_experience=" +
				work_role +
				"&employee_manage_own_document=" +
				doc_role +
				"&employee_manage_own_social=" +
				social_role +
				"&employee_manage_own_picture=" +
				pic_role +
				"&employee_manage_own_profile=" +
				profile_role +
				"&employee_manage_own_bank_account=" +
				bank_account_role,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
					$(".icon-spinner3").hide();
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
					$(".icon-spinner3").hide();
				}
			}
		});
	});

	jQuery("#attendance_info").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = jQuery(this),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		if ($("#enable_attendances").is(":checked")) {
			var enable_attendance = $("#enable_attendances").val();
		} else {
			var enable_attendance = "";
		}
		if ($("#enable_clock_in_btn").is(":checked")) {
			var enable_clock_in_btn = $("#enable_clock_in_btn").val();
		} else {
			var enable_clock_in_btn = "";
		}

		jQuery.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=5&data=attendance_info&type=attendance_info&form=" +
				action +
				"&enable_attendance=" +
				enable_attendance +
				"&enable_clock_in_btn=" +
				enable_clock_in_btn,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	});

	// Validation

	jQuery("#email_info").validate({
		rules: {
			email_type: {
				required: true
			},
			smtp_host: {
				required: true,
				letterswithdot: true
			},
			smtp_username: {
				required: true,
				validemail: true
			},
			smtp_password: "required",
			smtp_port: {
				required: true,
				number: true,
				minlength: 2,
				maxlength: 4
			}
		},
		messages: {
			email_type: "Please select email type",
			smtp_host: {
				required: "Please enter smtp host"
			},
			smtp_username: {
				required: "Please enter smtp username"
			},
			smtp_password: "Please enter stmp password",
			smtp_port: {
				required: "Please enter smtp port"
			}
		},
		submitHandler: function(form) {
			emailformSubmit(form);
			
		}
	});

	// // Form Submit Function
	function emailformSubmit(form) {
		var obj = jQuery(form),
			action = obj.attr("name");

		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		if ($("#srole_email_notification").is(":checked")) {
			var role_email_notification = $("#srole_email_notification").val();
		} else {
			var role_email_notification = "";
		}
		jQuery.ajax({
			type: "POST",
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=5&data=email_info&type=email_info&form=" +
				action +
				"&enable_email_notification=" +
				role_email_notification,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}

	// jQuery("#email_info").submit(function(e) {
	// 	/*Form Submit*/
	// 	e.preventDefault();
	// 	var obj = jQuery(this),
	// 		action = obj.attr("name");
	// 	jQuery(".save").prop("disabled", true);
	// 	$(".icon-spinner3").show();
	// 	if ($("#srole_email_notification").is(":checked")) {
	// 		var role_email_notification = $("#srole_email_notification").val();
	// 	} else {
	// 		var role_email_notification = "";
	// 	}
	// 	jQuery.ajax({
	// 		type: "POST",
	// 		url: e.target.action,
	// 		data:
	// 			obj.serialize() +
	// 			"&is_ajax=5&data=email_info&type=email_info&form=" +
	// 			action +
	// 			"&enable_email_notification=" +
	// 			role_email_notification,
	// 		cache: false,
	// 		success: function(JSON) {
	// 			if (JSON.error != "") {
	// 				toastr.error(JSON.error);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".icon-spinner3").hide();
	// 				jQuery(".save").prop("disabled", false);
	// 			} else {
	// 				toastr.success(JSON.result);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".icon-spinner3").hide();
	// 				jQuery(".save").prop("disabled", false);
	// 			}
	// 		}
	// 	});
	// });

	jQuery("#payroll_config").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = jQuery(this),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		if ($("#payslip_password_generate").is(":checked")) {
			var p_generate_pass = $("#payslip_password_generate").val();
		} else {
			var p_generate_pass = "";
		}
		jQuery.ajax({
			type: "POST",
			url: site_url + "settings/payroll_config/",
			data:
				obj.serialize() +
				"&is_ajax=6&data=payroll_config&type=payroll_config&form=" +
				action +
				"&payslip_password_generate=" +
				p_generate_pass,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	});

	// Validation

	jQuery("#job_info").validate({
		rules: {
			job_application_format: {
				required: true,
				minlength: 1
			}
		},
		messages: {
			job_application_format: {
				required: "Please select job application file format"
			}
		},
		submitHandler: function(form) {
			formSubmit(form);
		}
	});

	// Form Submit Function
	function formSubmit(form) {
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		if ($("#enable_job2").is(":checked")) {
			var ejob = $("#enable_job2").val();
		} else {
			var ejob = "";
		}
		$(".icon-spinner3").show();
		jQuery.ajax({
			type: "POST",
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=7&data=job_info&type=job_info&form=" +
				action +
				"&enable_job=" +
				ejob,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}

	// jQuery("#job_info").submit(function(e) {
	// 	/*Form Submit*/
	// 	e.preventDefault();
	// 	var obj = jQuery(this),
	// 		action = obj.attr("name");
	// 	jQuery(".save").prop("disabled", true);
	// 	if ($("#enable_job2").is(":checked")) {
	// 		var ejob = $("#enable_job2").val();
	// 	} else {
	// 		var ejob = "";
	// 	}
	// 	$(".icon-spinner3").show();
	// 	jQuery.ajax({
	// 		type: "POST",
	// 		url: e.target.action,
	// 		data:
	// 			obj.serialize() +
	// 			"&is_ajax=7&data=job_info&type=job_info&form=" +
	// 			action +
	// 			"&enable_job=" +
	// 			ejob,
	// 		cache: false,
	// 		success: function(JSON) {
	// 			if (JSON.error != "") {
	// 				toastr.error(JSON.error);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".icon-spinner3").hide();
	// 				jQuery(".save").prop("disabled", false);
	// 			} else {
	// 				toastr.success(JSON.result);
	// 				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
	// 				$(".icon-spinner3").hide();
	// 				jQuery(".save").prop("disabled", false);
	// 			}
	// 		}
	// 	});
	// });

	jQuery("#performance_info").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = jQuery(this),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		jQuery.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=7&data=performance_info&type=performance_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	});

	jQuery("#email_notification_info").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = jQuery(this),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();

		jQuery.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=8&data=email_notification_info&type=email_notification_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	});

	$(".nav-tabs-link").click(function() {
		var profile_id = $(this).data("setting");
		var profile_block = $(this).data("profile-block");
		$(".list-group-item").removeClass("active");
		$(".current-tab").hide();
		$("#setting_" + profile_id).addClass("active");
		$("#" + profile_block).show();
	});
});

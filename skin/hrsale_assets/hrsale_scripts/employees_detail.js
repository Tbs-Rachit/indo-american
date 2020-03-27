$(document).ready(function() {
	// get data
	$(".edit-modal-data").on("show.bs.modal", function(event) {
		var button = $(event.relatedTarget);
		var field_id = button.data("field_id");
		var field_tpe = button.data("field_type");
		if (field_tpe == "contact") {
			var field_add = "&data=emp_contact&type=emp_contact&";
		} else if (field_tpe == "document") {
			var field_add = "&data=emp_document&type=emp_document&";
		} else if (field_tpe == "qualification") {
			var field_add = "&data=emp_qualification&type=emp_qualification&";
		} else if (field_tpe == "work_experience") {
			var field_add = "&data=emp_work_experience&type=emp_work_experience&";
		} else if (field_tpe == "bank_account") {
			var field_add = "&data=emp_bank_account&type=emp_bank_account&";
		} else if (field_tpe == "contract") {
			var field_add = "&data=emp_contract&type=emp_contract&";
		} else if (field_tpe == "leave") {
			var field_add = "&data=emp_leave&type=emp_leave&";
		} else if (field_tpe == "shift") {
			var field_add = "&data=emp_shift&type=emp_shift&";
		} else if (field_tpe == "location") {
			var field_add = "&data=emp_location&type=emp_location&";
		} else if (field_tpe == "imgdocument") {
			var field_add = "&data=e_imgdocument&type=e_imgdocument&";
		} else if (field_tpe == "salary_allowance") {
			var field_add = "&data=e_salary_allowance&type=e_salary_allowance&";
		} else if (field_tpe == "salary_loan") {
			var field_add = "&data=e_salary_loan&type=e_salary_loan&";
		} else if (field_tpe == "emp_overtime") {
			var field_add = "&data=emp_overtime_info&type=emp_overtime_info&";
		} else if (field_tpe == "salary_commissions") {
			var field_add =
				"&data=salary_commissions_info&type=salary_commissions_info&";
		} else if (field_tpe == "salary_statutory_deductions") {
			var field_add =
				"&data=salary_statutory_deductions_info&type=salary_statutory_deductions_info&";
		} else if (field_tpe == "salary_other_payments") {
			var field_add =
				"&data=salary_other_payments_info&type=salary_other_payments_info&";
		} else if (field_tpe == "security_level") {
			var field_add = "&data=esecurity_level_info&type=esecurity_level_info&";
		}
		var modal = $(this);
		$.ajax({
			url: site_url + "employees/dialog_" + field_tpe + "/",
			type: "GET",
			data: "jd=1" + field_add + "field_id=" + field_id,
			success: function(response) {
				if (response) {
					$("#ajax_modal").html(response);
				}
			}
		});
	});

	// Month & Year
	$(".ln_month_year").datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: "yy-mm",
		yearRange: "1900:" + (new Date().getFullYear() + 15),
		beforeShow: function(input) {
			$(input)
				.datepicker("widget")
				.addClass("hide-calendar");
		},
		onClose: function(dateText, inst) {
			var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			$(this).datepicker("setDate", new Date(year, month, 1));
			$(this)
				.datepicker("widget")
				.removeClass("hide-calendar");
			$(this)
				.datepicker("widget")
				.hide();
		}
	});

	$("#basic_info").validate({
		rules: {
			first_name: {
				required: true,
				lettersonly: true
			},
			last_name: {
				required: true,
				lettersonly: true
			},
			email: { email: true },
			company_id: { required: true },
			location_id: { required: true },
			username: { required: true },
			date_of_birth: { required: true },
			contact_no: { required: true },
			employee_id: { required: true },
			date_of_joining: { required: true },
			department_id: { required: true },
			password: { required: true },
			confirm_password: {
				required: true,
				equalTo: "#password"
			},
			role: { required: true },
			marital_status: { required: true },
			estate: {
				required: true
			},
			ecity: {
				required: true
			},
			ezipcode: {
				required: true,
				minlength: 4,
				maxlength: 8
			},
			address: { required: true }
		},
		// Specify validation error messages
		messages: {
			first_name: { required: "Please enter your firstname" },
			last_name: { required: "Please enter Your LastName" },
			email: {
				email: "Please enter a valid e-mail",
				required: "Please enter Your Email"
			},
			company_id: { required: "Please select company" },
			location_id: { required: "Please select location" },
			username: { required: "Please enter your username " },
			date_of_birth: { required: "Please enter your date of birth " },
			contact_no: { required: "Please enter your contact no. " },
			employee_id: { required: "Please enter your employee id." },
			date_of_joining: { required: "Please enter your date of joining." },
			department_id: { required: "Please select department." },
			password: { required: "Please enter your password." },
			confirm_password: {
				required: "Please enter your confirm password.",
				equalTo: "The password and comfirm password do not match."
			},
			role: { required: "Please select role" },
			marital_status: { required: "Please select marital status" },
			estate: {
				required: "Please enter your state."
			},
			ecity: {
				required: "Please enter your city."
			},
			ezipcode: { required: "Please enter your zipcode." },
			address: { required: "Please enter your address." }
		},
		submitHandler: function(form) {
			basic_infoformSubmit(form);
		}
	});

	/* Update basic info */
	// $("#basic_info").submit(function(e) {
	function basic_infoformSubmit(form) {
		var fd = new FormData(form);
		var obj = $(form),
			action = obj.attr("name");
		fd.append("is_ajax", 1);
		fd.append("type", "basic_info");
		fd.append("data", "basic_info");
		fd.append("form", action);
		// e.preventDefault();
		$(".icon-spinner3").show();
		$(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		$.ajax({
			url: form.action,
			type: "POST",
			data: fd,
			contentType: false,
			cache: false,
			processData: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$(".icon-spinner3").hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				} else {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.success(JSON.result);
					$(".icon-spinner3").hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				}
			},
			error: function() {
				//toastr.clear();
				//$('#hrload-img').hide();
				toastr.error(JSON.error);
				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				$(".icon-spinner3").hide();
				$(".save").prop("disabled", false);
			}
		});
		// });
	}

	$("#basic_infoddd").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = $(this),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		$.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=1&data=basic_info&type=basic_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$(".icon-spinner3").hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				} else {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.success(JSON.result);
					$(".icon-spinner3").hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
				}
			}
		});
	});
	// get current val
	$(".basic_salary").keyup(function(e) {
		var to_currency_rate = $("#to_currency_rate").val();
		var curr_val = $(this).val();
		var final_val = to_currency_rate * curr_val;
		var float_val = final_val.toFixed(2);
		$("#current_cur_val").html(float_val);
	});
	$(".daily_wages").keyup(function(e) {
		var to_currency_rate = $("#to_currency_rate").val();
		var curr_val = $(this).val();
		var final_val = to_currency_rate * curr_val;
		var float_val = final_val.toFixed(2);
		$("#current_cur_val2").html(float_val);
	});

	/*jQuery("#wages_type").change(function(){
		var wopt = $(this).val();
		if(wopt == 1){
			$('#deduct_options').show();
			$('#half_monthly_is').show();
		} else {
			$('#deduct_options').hide();
			$('#half_monthly_is').hide();
		}
	});*/

	/* Update profile picture */
	$("#f_profile_picture").submit(function(e) {
		var fd = new FormData(this);
		var user_id = $("#user_id").val();
		var session_id = $("#session_id").val();
		$(".icon-spinner3").show();
		var obj = $(this),
			action = obj.attr("name");
		fd.append("is_ajax", 2);
		fd.append("type", "profile_picture");
		fd.append("data", "profile_picture");
		fd.append("form", action);
		e.preventDefault();
		$(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		$.ajax({
			url: e.target.action,
			type: "POST",
			data: fd,
			contentType: false,
			cache: false,
			processData: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$(".save").prop("disabled", false);
					$(".icon-spinner3").hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				} else {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.success(JSON.result);
					$(".icon-spinner3").hide();
					$("#remove_file").show();
					$(".profile-photo-emp").remove("checked");
					$("#u_file").attr("src", JSON.img);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					if (user_id == session_id) {
						$(".user_avatar").attr("src", JSON.img);
					}
					$(".save").prop("disabled", false);
				}
			},
			error: function() {
				//toastr.clear();
				//$('#hrload-img').hide();
				toastr.error(JSON.error);
				$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
				$(".icon-spinner3").hide();
				$(".save").prop("disabled", false);
			}
		});
	});

	/* Update social networking */
	$("#f_social_networking").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = $(this),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=3&data=social_info&type=social_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					$(".save").prop("disabled", false);
				} else {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					$(".save").prop("disabled", false);
				}
			}
		});
	});

	// get departments
	/*jQuery("#aj_company").change(function(){
		jQuery.get(base_url+"/get_departments/"+jQuery(this).val(), function(data, status){
			jQuery('#department_ajax').html(data);
		});
	});*/
	jQuery("#aj_company").change(function() {
		jQuery.get(
			escapeHtmlSecure(
				base_url + "/get_company_elocations/" + jQuery(this).val()
			),
			function(data, status) {
				jQuery("#location_ajax").html(data);
			}
		);
		$("#is_aj_subdepartments")
			.val(null)
			.trigger("change");
	});
	jQuery("#location_id").change(function() {
		jQuery.get(
			base_url + "/get_location_departments/" + jQuery(this).val(),
			function(data, status) {
				jQuery("#department_ajax").html(data);
			}
		);
	});
	// get sub departments
	jQuery("#aj_subdepartments").change(function() {
		jQuery.get(
			base_url + "/get_sub_departments/" + jQuery(this).val(),
			function(data, status) {
				jQuery("#subdepartment_ajax").html(data);
			}
		);
	});
	// get designations
	jQuery("#aj_subdepartment").change(function() {
		jQuery.get(base_url + "/designation/" + jQuery(this).val(), function(
			data,
			status
		) {
			jQuery("#designation_ajax").html(data);
		});
	});
	jQuery("#is_aj_subdepartments").change(function() {
		jQuery.get(base_url + "/is_designation/" + jQuery(this).val(), function(
			data,
			status
		) {
			jQuery("#designation_ajax").html(data);
		});
	});

	$(".nav-tabs-link").click(function() {
		var profile_id = $(this).data("profile");
		var profile_block = $(this).data("profile-block");
		$(".nav-tabs-link").removeClass("active");
		$(".current-tab").hide();
		$("#user_profile_" + profile_id).addClass("active");
		$("#" + profile_block).show();
	});
	$(".salary-tab").click(function() {
		var profile_id = $(this).data("profile");
		var profile_block = $(this).data("profile-block");
		$(".salary-tab-list").removeClass("active");
		$(".salary-current-tab").hide();
		$("#suser_profile_" + profile_id).addClass("active");
		$("#" + profile_block).show();
	});
	$(".xin-core-hr-opt").click(function() {
		var core_hr_info = $(this).data("core-hr-info");
		var core_profile_block = $(this).data("core-profile-block");
		$(".xin-core-hr-tab").removeClass("active");
		$(".core-current-tab").hide();
		$("#core_hr_" + core_hr_info).addClass("active");
		$("#" + core_profile_block).show();
	});
	$(".core-projects").click(function() {
		var core_project_info = $(this).data("core-project-info");
		var core_projects_block = $(this).data("core-projects-block");
		$(".core-projects-tab").removeClass("active");
		$("#core_projects_" + core_project_info).addClass("active");
		$(".project-current-tab").hide();
		$("#" + core_projects_block).show();
	});

	// On page load: table_contacts
	var xin_table_contact = $("#xin_table_contact").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/contacts/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load > documents
	var xin_table_immigration = $("#xin_table_imgdocument").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/immigration/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load > documents
	var xin_table_document = $("#xin_table_document").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/documents/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load > qualification
	var xin_table_qualification = $("#xin_table_qualification").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/qualification/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load
	var xin_table_work_experience = $("#xin_table_work_experience").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/experience/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load
	var xin_table_bank_account = $("#xin_table_bank_account").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/bank_account/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});
	// On page load
	var xin_table_security_level = $("#xin_table_security_level").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/security_level_list/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load > contract
	var xin_table_contract = $("#xin_table_contract").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/contract/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load > leave
	var xin_table_leave = $("#xin_table_leave").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/leave/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load
	var xin_table_shift = $("#xin_table_shift").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/shift/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load
	var xin_table_location = $("#xin_table_location").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/location/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load
	var xin_table_emp_overtime = $("#xin_table_emp_overtime").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/salary_overtime/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	// On page load
	var xin_table_allowances_ad = $("#xin_table_all_allowances").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/salary_all_allowances/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});
	var xin_table_commissions_ad = $("#xin_table_all_commissions").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/salary_all_commissions/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});
	var xin_table_statutory_deductions_ad = $(
		"#xin_table_all_statutory_deductions"
	).dataTable({
		bDestroy: true,
		ajax: {
			url:
				site_url +
				"employees/salary_all_statutory_deductions/" +
				$("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	var xin_table_other_payments_ad = $(
		"#xin_table_all_other_payments"
	).dataTable({
		bDestroy: true,
		ajax: {
			url:
				site_url + "employees/salary_all_other_payments/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});
	// On page load
	var xin_table_all_deductions = $("#xin_table_all_deductions").dataTable({
		bDestroy: true,
		ajax: {
			url: site_url + "employees/salary_all_deductions/" + $("#user_id").val(),
			type: "GET"
		},
		fnDrawCallback: function(settings) {
			$('[data-toggle="tooltip"]').tooltip();
		}
	});
	// On page load > xin_hrsale_table

	$(".xin_hrsale_table").DataTable();
	/* Add contact info */
	$("#contact_info").validate({
		rules: {
			relation: { required: true },
			contact_name: { required: true },
			work_email: {
				required: true,
				email: true
			},
			mobile_phone: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10
			}
		},
		// Specify validation error messages
		messages: {
			relation: { required: "Please select relation" },
			contact_name: { required: "Please enter Name" },
			work_email: { required: "Please enter work email" },
			mobile_phone: {
				required: "Please enter mobile phone",
				minlength: "Please enter minimum 10 number",
				maxlength: "Please enter Maximum 10 number"
			}
		},
		submitHandler: function(form) {
			contact_infoformSubmit(form);
		}
	});
	/* Add contact info */
	// jQuery("#contact_info").submit(function (e) {
	function contact_infoformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=4&data=contact_info&type=contact_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_contact.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					jQuery("#contact_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	/* Add contact info */
	jQuery("#contact_info2").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = jQuery(this),
			action = obj.attr("name");
		jQuery(".save2").prop("disabled", true);
		$(".icon-spinner33").show();
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=4&data=contact_info&type=contact_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner33").hide();
					jQuery(".save2").prop("disabled", false);
				} else {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner33").hide();
					jQuery(".save2").prop("disabled", false);
				}
			}
		});
	});

	/* Add document info */
	$("#document_info").validate({
		rules: {
			document_type_id: { required: true },
			date_of_create: {
				required: true,
				date: true
			},
			date_of_expiry: {
				required: true,
				date: true
			},
			title: { required: true },
			no : {
				required :true,
				number : true
			},
			email: { required: true }
		},
		// Specify validation error messages
		messages: {
			document_type_id: { required: "Please select document type" },
			ate_of_create : { required : "Please enter document date of create"},
			date_of_expiry: { required: "Please enter document date of expiry" },
			title: { required: "Please enter document title" },
			no : {
				required : "Please enter documnet number"
			},
			email: { required: "Please enter notification email" }
		},
		submitHandler: function(form) {
			document_infoformSubmit(form);
		}
	});
	// $("#document_info").submit(function (e) {
	function document_infoformSubmit(form) {
		var fd = new FormData(form);
		var obj = $(form),
			action = obj.attr("name");
		fd.append("is_ajax", 7);
		fd.append("type", "document_info");
		fd.append("data", "document_info");
		fd.append("form", action);
		// e.preventDefault();
		$(".icon-spinner3").show();
		$(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		$.ajax({
			url: form.action,
			// url: e.target.action,
			type: "POST",
			data: fd,
			contentType: false,
			cache: false,
			processData: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
					$(".icon-spinner3").hide();
				} else {
					xin_table_document.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					$(".icon-spinner3").hide();
					jQuery("#document_info")[0].reset(); // To reset form fields
					$(".save").prop("disabled", false);
				}
			},
			error: function() {
				//toastr.clear();
				//$('#hrload-img').hide();
				toastr.error(JSON.error);
				$(".save").prop("disabled", false);
			}
		});
	}
	// });

	/* Add immigration_info */
	$("#immigration_info").validate({
		rules: {
			document_type_id: { required: true },
			document_number: {
				required: true,
				number: true
			},
			document_file: { required: true },
			issue_date: { required: true },
			expiry_date: {
				required: true,
				greaterThan: "#issue_date"
			},
			eligible_review_date: { required: true },
			country: { required: true }
		},
		// Specify validation error messages
		messages: {
			document_type_id: { required: "Please select document type" },
			document_number: { required: "Please enter your document number" },
			document_file: { required: "Please select document file" },
			issue_date: { required: "Please enter issue date" },
			expiry_date: {
				required: "Please enter expiry date",
				greaterThan: "Expiry date must be after issue date."
			},
			eligible_review_date: { required: "Please enter eligible review date" },
			country: { required: "Please select country" }
		},
		submitHandler: function(form) {
			immigration_infoformSubmit(form);
		}
	});
	/* Add immigration_info */

	// $("#immigration_info").submit(function (e) {
	function immigration_infoformSubmit(form) {
		var fd = new FormData(form);
		var obj = $(form),
			action = obj.attr("name");
		fd.append("is_ajax", 7);
		fd.append("type", "immigration_info");
		fd.append("data", "immigration_info");
		fd.append("form", action);
		// e.preventDefault();
		$(".icon-spinner3").show();
		$(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		$.ajax({
			url: form.action,
			// url: e.target.action,
			type: "POST",
			data: fd,
			contentType: false,
			cache: false,
			processData: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".save").prop("disabled", false);
					$(".icon-spinner3").hide();
				} else {
					xin_table_immigration.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					$(".icon-spinner3").hide();
					jQuery("#document_info")[0].reset(); // To reset form fields
					$(".save").prop("disabled", false);
				}
			},
			error: function() {
				//toastr.clear();
				//$('#hrload-img').hide();
				toastr.error(JSON.error);
				$(".save").prop("disabled", false);
			}
		});
		// });
	}

	/* Add qualification info */
	$("#qualification_info").validate({
		rules: {
			name: { required: true },
			education_level: { required: true },
			from_year: { required: true },
			to_year: {
				required: true,
				greaterThan: "#from_year"
			}
		},
		// Specify validation error messages
		messages: {
			name: { required: "Please enter school/university" },
			education_level: { required: "Please select education level" },
			from_year: { required: "Please enter Form date" },
			to_year: {
				required: "Please enter to date",
				greaterThan: "To date must be after from date."
			}
		},
		submitHandler: function(form) {
			qualification_infoformSubmit(form);
		}
	});

	/* Add qualification info */
	// jQuery("#qualification_info").submit(function (e) {
	function qualification_infoformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=10&data=qualification_info&type=qualification_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
					$(".icon-spinner3").hide();
				} else {
					xin_table_qualification.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					jQuery("#qualification_info")[0].reset(); // To reset form fields
					$(".icon-spinner3").hide();
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	/* Add work experience info */
	$("#work_experience_info").validate({
		rules: {
			company_name: { required: true },
			post: { required: true },
			from_date: { required: true },
			to_date: {
				required: true,
				greaterThan: "#from_date"
			}
		},
		// Specify validation error messages
		messages: {
			company_name: { required: "Please enter company name" },
			post: { required: "Please enter post" },
			from_date: { required: "Please enter Form date" },
			to_date: {
				required: "Please enter to date",
				greaterThan: "To date must be after from date."
			}
		},
		submitHandler: function(form) {
			work_experience_infoformSubmit(form);
		}
	});

	/* Add work experience info */
	// jQuery("#work_experience_info").submit(function (e) {
	function work_experience_infoformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=13&data=work_experience_info&type=work_experience_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
					$(".icon-spinner3").hide();
				} else {
					xin_table_work_experience.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					$(".icon-spinner3").hide();
					jQuery("#work_experience_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	/* Add bank account info */
	$("#bank_account_info").validate({
		rules: {
			account_title: {
				required: true,
				alphabetsnspace: true
			},
			account_number: {
				required: true,
				number: true
			},
			bank_name: {
				required: true,
				alphabetsnspace: true
			},
			bank_code: {
				required: true
			}
		},
		// Specify validation error messages
		messages: {
			account_title: {
				required: "Please enter account title",
				alphabetsnspace: "Please enter letters only"
			},
			account_number: { required: "Please enter account number" },
			bank_name: {
				required: "Please enter bank name",
				alphabetsnspace: "Please enter letters only"
			},
			bank_code: { required: "Please enter to bank code" }
		},
		submitHandler: function(form) {
			bank_account_infoformSubmit(form);
		}
	});

	// jQuery("#bank_account_info").submit(function (e) {
	function bank_account_infoformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=16&data=bank_account_info&type=bank_account_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$(".icon-spinner3").hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_bank_account.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					$(".icon-spinner3").hide();
					jQuery("#bank_account_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	/* Add security level info */
	$("#security_level_info").validate({
		rules: {
			security_level: { required: true },
			expiry_date: { required: true },
			date_of_clearance: { required: true }
		},
		// Specify validation error messages
		messages: {
			security_level: { required: "Please select security level" },
			expiry_date: { required: "Please enter expiry date" },
			date_of_clearance: { required: "Please enter date of clearance" }
		},
		submitHandler: function(form) {
			security_level_infoformSubmit(form);
		}
	});

	// jQuery("#security_level_info").submit(function (e) {
	function security_level_infoformSubmit(form) {
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
			data:
				obj.serialize() +
				"&is_ajax=16&data=security_level_info&type=security_level_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$(".icon-spinner3").hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_security_level.api().ajax.reload(function() {
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					$(".icon-spinner3").hide();
					jQuery("#security_level_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	jQuery("#tax_info_form").submit(function(e) {
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
				"&is_ajax=50&data=tax_info&type=tax_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					toastr.error(JSON.error);
					$(".icon-spinner3").hide();
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					toastr.success(JSON.result);
					$(".icon-spinner3").hide();
					jQuery("#tax_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	});

	/* Add contract info */
	jQuery("#contract_info").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = jQuery(this),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=19&data=contract_info&type=contract_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_contract.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					jQuery("#contract_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	});

	/* Add leave info */
	jQuery("#leave_info").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = jQuery(this),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=22&data=leave_info&type=leave_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_leave.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					jQuery("#leave_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	});

	/* Add shift info */
	jQuery("#shift_info").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = jQuery(this),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=25&data=shift_info&type=shift_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_shift.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					jQuery("#shift_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	});

	/* Add location info */
	jQuery("#location_info").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = jQuery(this),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=28&data=location_info&type=location_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_location.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					jQuery("#location_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	});

	/* Add change password */
	$("#e_change_password").validate({
		rules: {
			new_password: { required: true },
			new_password_confirm: {
				required: true,
				equalTo: "#new_password"
			}
		},
		// Specify validation error messages
		messages: {
			new_password: { required: "Please enter new password" },
			new_password_confirm: {
				required: "Please enter password confirm",
				equalTo: "The password and Confirm password do not match"
			}
		},
		submitHandler: function(form) {
			e_change_passwordformSubmit(form);
		}
	});

	// jQuery("#e_change_password").submit(function (e) {
	function e_change_passwordformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=31&data=e_change_password&type=change_password&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
					$(".icon-spinner3").hide();
				} else {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery("#e_change_password")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	/* */
	$("#employee_update_salary").submit(function(e) {
		/*Form Submit*/
		e.preventDefault();
		var obj = $(this),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		$.ajax({
			type: "POST",
			url: e.target.action,
			data:
				obj.serialize() +
				"&is_ajax=3&data=employee_update_salary&type=employee_update_salary&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					$(".save").prop("disabled", false);
				} else {
					//toastr.clear();
					//$('#hrload-img').hide();
					xin_table_allowances_ad.api().ajax.reload(function() {
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					xin_table_statutory_deductions_ad.api().ajax.reload(function() {
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					toastr.success(JSON.result);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					$(".save").prop("disabled", false);
				}
			}
		});
	});

	/**Add add loan info */
	$("#add_loan_info").validate({
		rules: {
			loan_deduction_title: { required: true },
			monthly_installment: {
				required: true,
				number: true
			},
			start_date: { required: true },
			end_date: {
				required: true,
				greaterThan: "#start_date"
			}
		},
		// Specify validation error messages
		messages: {
			loan_deduction_title: { required: "Please enter title" },
			monthly_installment: { required: "Please enter amount" },
			start_date: { required: "Please enter start date" },
			end_date: {
				required: "Please enter end date",
				greaterThan: "To date must be after from date."
			}
		},
		submitHandler: function(form) {
			add_loan_infoformSubmit(form);
		}
	});
	// $("#add_loan_info").submit(function (e) {
	function add_loan_infoformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = $(form),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		$.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=3&data=loan_info&type=loan_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					$(".save").prop("disabled", false);
				} else {
					xin_table_all_deductions.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery("#add_loan_info")[0].reset(); // To reset form fields
					$(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	/* Add employee_update_allowance info */
	$("#employee_update_allowance").validate({
		rules: {
			salary_allowance: { required: true },
			allowance_amount: {
				required: true,
				number: true
			}
		},
		// Specify validation error messages
		messages: {
			salary_allowance: { required: "Please select salary allowance" },
			allowance_amount: { required: "Please enter amount" }
		},
		submitHandler: function(form) {
			employee_update_allowanceformSubmit(form);
		}
	});
	// jQuery("#employee_update_allowance").submit(function (e) {
	function employee_update_allowanceformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=4&data=employee_update_allowance&type=employee_update_allowance&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_allowances_ad.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					xin_table_statutory_deductions_ad.api().ajax.reload(function() {
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					jQuery("#employee_update_allowance")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	/*add employee update commissions */
	$("#employee_update_commissions").validate({
		rules: {
			title: { required: true },
			amount: {
				required: true,
				number: true
			}
		},
		// Specify validation error messages
		messages: {
			title: { required: "Please enter title" },
			amount: { required: "Please enter amount" }
		},
		submitHandler: function(form) {
			employee_update_commissionsformSubmit(form);
		}
	});

	// jQuery("#employee_update_commissions").submit(function (e) {
	function employee_update_commissionsformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=4&data=employee_update_commissions&type=employee_update_commissions&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_commissions_ad.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					jQuery("#employee_update_commissions")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	/* Add statutory deductions info */
	$("#statutory_deductions_info").validate({
		rules: {
			statutory_options: { required: true },
			amount: {
				required: true,
				number: true
			}
		},
		// Specify validation error messages
		messages: {
			statutory_options: { required: "Please select Deduction" },
			amount: { required: "Please enter amount" }
		},
		submitHandler: function(form) {
			statutory_deductions_infoformSubmit(form);
		}
	});
	// jQuery("#statutory_deductions_info").submit(function (e) {
	function statutory_deductions_infoformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=4&data=statutory_deductions_info&type=statutory_deductions_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_statutory_deductions_ad.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					jQuery("#statutory_deductions_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	/* Add other payments info */
	$("#other_payments_info").validate({
		rules: {
			title: { required: true },
			amount: {
				required: true,
				number: true
			}
		},
		// Specify validation error messages
		messages: {
			title: { required: "Please enter title" },
			amount: { required: "Please enter amount" }
		},
		submitHandler: function(form) {
			other_payments_infoformSubmit(form);
		}
	});

	// jQuery("#other_payments_info").submit(function (e) {
	function other_payments_infoformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = jQuery(form),
			action = obj.attr("name");
		jQuery(".save").prop("disabled", true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		jQuery.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=4&data=other_payments_info&type=other_payments_info&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					jQuery(".save").prop("disabled", false);
				} else {
					xin_table_other_payments_ad.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
						$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					}, true);
					jQuery("#other_payments_info")[0].reset(); // To reset form fields
					jQuery(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	/* Add overtime info */
	$("#overtime_info").validate({
		rules: {
			overtime_type: { required: true },
			no_of_days: {
				required: true,
				number: true
			},
			overtime_hours: {
				required: true,
				number: true
			},
			overtime_rate: {
				required: true,
				number: true
			}
		},
		// Specify validation error messages
		messages: {
			overtime_type: { required: "Please enter overtime title" },
			no_of_days: { required: "Please enter number of day" },
			overtime_hours: { required: "Please enter hours" },
			overtime_rate: { required: "Please enter rate" }
		},
		submitHandler: function(form) {
			overtime_infoformSubmit(form);
		}
	});
	// $("#overtime_info").submit(function (e) {
	function overtime_infoformSubmit(form) {
		/*Form Submit*/
		// e.preventDefault();
		var obj = $(form),
			action = obj.attr("name");
		$(".save").prop("disabled", true);
		$(".icon-spinner3").show();
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		$.ajax({
			type: "POST",
			// url: e.target.action,
			url: form.action,
			data:
				obj.serialize() +
				"&is_ajax=3&data=emp_overtime&type=emp_overtime&form=" +
				action,
			cache: false,
			success: function(JSON) {
				if (JSON.error != "") {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					$(".save").prop("disabled", false);
				} else {
					xin_table_emp_overtime.api().ajax.reload(function() {
						//toastr.clear();
						//$('#hrload-img').hide();
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$(".icon-spinner3").hide();
					jQuery("#overtime_info")[0].reset(); // To reset form fields
					$(".save").prop("disabled", false);
				}
			}
		});
	}
	// });

	$(".view-modal-data").on("show.bs.modal", function(event) {
		var button = $(event.relatedTarget);
		var xfield_id = button.data("xfield_id");
		var field_type = button.data("field_type");
		var field_key = "";
		if (field_type == "awards") {
			var view_info = "view_award";
			var field_key = "award_id";
		} else if (field_type == "travel") {
			var view_info = "view_travel";
			var field_key = "travel_id";
		} else if (field_type == "transfers") {
			var view_info = "view_transfer";
			var field_key = "transfer_id";
		} else if (field_type == "promotion") {
			var view_info = "view_promotion";
			var field_key = "promotion_id";
		} else if (field_type == "complaints") {
			var view_info = "view_complaint";
			var field_key = "complaint_id";
		} else if (field_type == "warning") {
			var view_info = "view_warning";
			var field_key = "warning_id";
		}
		var modal = $(this);
		$.ajax({
			url: site_url + field_type + "/read/",
			type: "GET",
			data:
				"jd=1&is_ajax=1&mode=view_modal&data=" +
				view_info +
				"&" +
				field_key +
				"=" +
				xfield_id,
			success: function(response) {
				if (response) {
					$("#ajax_modal_view").html(response);
				}
			}
		});
	});
	/* Delete data */
	$("#delete_record").submit(function(e) {
		var tk_type = $("#token_type").val();
		if (tk_type == "contact") {
			var field_add = "&is_ajax=6&data=delete_record&type=delete_contact&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "document") {
			var field_add = "&is_ajax=8&data=delete_record&type=delete_document&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "qualification") {
			var field_add =
				"&is_ajax=12&data=delete_record&type=delete_qualification&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "work_experience") {
			var field_add =
				"&is_ajax=15&data=delete_record&type=delete_work_experience&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "bank_account") {
			var field_add =
				"&is_ajax=18&data=delete_record&type=delete_bank_account&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "contract") {
			var field_add = "&is_ajax=21&data=delete_record&type=delete_contract&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "leave") {
			var field_add = "&is_ajax=24&data=delete_record&type=delete_leave&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "shift") {
			var field_add = "&is_ajax=27&data=delete_record&type=delete_shift&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "location") {
			var field_add = "&is_ajax=30&data=delete_record&type=delete_location&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "imgdocument") {
			var field_add = "&is_ajax=30&data=delete_record&type=delete_imgdocument&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "all_allowances") {
			var field_add =
				"&is_ajax=30&data=delete_record&type=delete_salary_allowance&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "all_deductions") {
			var field_add = "&is_ajax=30&data=delete_record&type=delete_salary_loan&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "emp_overtime") {
			var field_add =
				"&is_ajax=30&data=delete_record&type=delete_salary_overtime&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "all_commissions") {
			var field_add =
				"&is_ajax=30&data=delete_record&type=delete_all_commissions&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "all_statutory_deductions") {
			var field_add =
				"&is_ajax=30&data=delete_record&type=delete_all_statutory_deductions&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "all_other_payments") {
			var field_add =
				"&is_ajax=30&data=delete_record&type=delete_all_other_payments&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "security_level") {
			var field_add =
				"&is_ajax=30&data=delete_record&type=delete_security_level&";
			var tb_name = "xin_table_" + tk_type;
		} else if (tk_type == "training_info") {
			var field_add =
				"&is_ajax=30&data=delete_record&type=delete_training_info&";
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
				} else {
					$(".delete-modal").modal("toggle");
					$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
					$("#" + tb_name)
						.dataTable()
						.api()
						.ajax.reload(function() {
							toastr.success(JSON.result);
						}, true);
					if (tk_type == "all_allowances") {
						xin_table_statutory_deductions_ad.api().ajax.reload(function() {
							$('input[name="csrf_hrsale"]').val(JSON.csrf_hash);
						}, true);
					}
				}
			}
		});
	});
});
$(document).ready(function() {
	$('[data-plugin="select_hrm"]').select2($(this).attr("data-options"));
	$('[data-plugin="select_hrm"]').select2({ width: "100%" });

	$(".cont_date").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "yy-mm-dd",
		yearRange: "1990:" + (new Date().getFullYear() + 10)
	});

	$("#is_aadhar_no,#is_pan_no,#is_un_no").click(function() {
		if ($(this).prop("checked") == true) {
			$(this).val(1);
			if (this.id == "is_aadhar_no") {
				$("#aadhar_no").prop("disabled", false);
			} else if (this.id == "is_pan_no") {
				$("#pan_no").prop("disabled", false);
			} else if (this.id == "is_un_no") {
				$("#un_no").prop("disabled", false);
			}
		} else if ($(this).prop("checked") == false) {
			$(this).val(0);
			if (this.id == "is_aadhar_no") {
				$("#aadhar_no").prop("disabled", true);
			} else if (this.id == "is_pan_no") {
				$("#pan_no").prop("disabled", true);
			} else if (this.id == "is_un_no") {
				$("#un_no").prop("disabled", true);
			}
		}
	});

	$("#is_aadhar_no,#is_pan_no,#is_un_no").each(function() {
		if ($(this).prop("checked") == true) {
			$(this).val(1);
			if (this.id == "is_aadhar_no") {
				$("#aadhar_no").prop("disabled", false);
			} else if (this.id == "is_pan_no") {
				$("#pan_no").prop("disabled", false);
			} else if (this.id == "is_un_no") {
				$("#un_no").prop("disabled", false);
			}
		} else if ($(this).prop("checked") == false) {
			$(this).val(0);
			if (this.id == "is_aadhar_no") {
				$("#aadhar_no").prop("disabled", true);
			} else if (this.id == "is_pan_no") {
				$("#pan_no").prop("disabled", true);
			} else if (this.id == "is_un_no") {
				$("#un_no").prop("disabled", true);
			}
		}
	});

	$('[data-id="doc"]').on("change", function() {
		jQuery.get(base_url + "/get_doc_details/" + $(this).val(), function(
			data,
			status
		) {
			jQuery("#doc_details").html(data);
		});
	});
});
/// delete a record
$(document).on("click", ".delete", function() {
	$("input[name=_token]").val($(this).data("record-id"));
	$("input[name=token_type]").val($(this).data("token_type"));
	$("#delete_record").attr(
		"action",
		site_url +
			"employees/delete_" +
			$(this).data("token_type") +
			"/" +
			$(this).data("record-id")
	);
});

// $(document).ready(function() {
// 	$('[data-plugin="select_hrm"]').select2($(this).attr("data-options"));
// 	$('[data-plugin="select_hrm"]').select2({ width: "100%" });

// 	$(".cont_date").datepicker({
// 		changeMonth: true,
// 		changeYear: true,
// 		dateFormat: "yy-mm-dd",
// 		yearRange: "1990:" + (new Date().getFullYear() + 10)
// 	});
// });

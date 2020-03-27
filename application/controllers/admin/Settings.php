<?php

/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the HRSALE License
 * that is bundled with this package in the file license.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.hrsale.com/license.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to hrsalesoft@gmail.com so we can send you a copy immediately.
 *
 * @author   HRSALE
 * @author-email  hrsalesoft@gmail.com
 * @copyright  Copyright © hrsale.com. All Rights Reserved
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		//load the model
		$this->load->model("Employee_exit_model");
		$this->load->model("Xin_model");
		$this->load->model("Employees_model");
		$this->load->model("Finance_model");
		$this->load->model("Company_model");
		$this->load->helper('string');
	}

	/*Function to set JSON output*/
	public function output($Return = array())
	{
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
	}

	public function index()
	{

		$session = $this->session->userdata('username');
		if (empty($session)) {
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('left_settings') . ' | ' . $this->Xin_model->site_title();
		$setting = $this->Xin_model->read_setting_info(1);
		$company_info = $this->Xin_model->read_company_setting_info(1);
		$email_config = $this->Xin_model->read_email_config_info(1);
		$data = array(
			'title' => $this->lang->line('left_settings') . ' | ' . $this->Xin_model->site_title(),
			'company_info_id' => $company_info[0]->company_info_id,
			'logo' => $company_info[0]->logo,
			'logo_second' => $company_info[0]->logo_second,
			'favicon' => $company_info[0]->favicon,
			'sign_in_logo' => $company_info[0]->sign_in_logo,
			'job_logo' => $setting[0]->job_logo,
			'payroll_logo' => $setting[0]->payroll_logo,
			'is_payslip_password_generate' => $setting[0]->is_payslip_password_generate,
			'payslip_password_format' => $setting[0]->payslip_password_format,
			'company_name' => $company_info[0]->company_name,
			'contact_person' => $company_info[0]->contact_person,
			'website_url' => $company_info[0]->website_url,
			'starting_year' => $company_info[0]->starting_year,
			'company_email' => $company_info[0]->company_email,
			'company_contact' => $company_info[0]->company_contact,
			'email' => $company_info[0]->email,
			'phone' => $company_info[0]->phone,
			'address_1' => $company_info[0]->address_1,
			'address_2' => $company_info[0]->address_2,
			'city' => $company_info[0]->city,
			'state' => $company_info[0]->state,
			'zipcode' => $company_info[0]->zipcode,
			'country' => $company_info[0]->country,
			'updated_at' => $company_info[0]->updated_at,
			'application_name' => $setting[0]->application_name,
			'default_currency_symbol' => $setting[0]->default_currency_symbol,
			'show_currency' => $setting[0]->show_currency,
			'currency_position' => $setting[0]->currency_position,
			'date_format_xi' => $setting[0]->date_format_xi,
			'animation_effect' => $setting[0]->animation_effect,
			'animation_effect_topmenu' => $setting[0]->animation_effect_topmenu,
			'animation_effect_modal' => $setting[0]->animation_effect_modal,
			'notification_position' => $setting[0]->notification_position,
			'notification_close_btn' => $setting[0]->notification_close_btn,
			'notification_bar' => $setting[0]->notification_bar,
			'employee_manage_own_bank_account' => $setting[0]->employee_manage_own_bank_account,
			'employee_manage_own_contact' => $setting[0]->employee_manage_own_contact,
			'employee_manage_own_profile' => $setting[0]->employee_manage_own_profile,
			'employee_manage_own_qualification' => $setting[0]->employee_manage_own_qualification,
			'employee_manage_own_work_experience' => $setting[0]->employee_manage_own_work_experience,
			'employee_manage_own_document' => $setting[0]->employee_manage_own_document,
			'employee_manage_own_picture' => $setting[0]->employee_manage_own_picture,
			'employee_manage_own_social' => $setting[0]->employee_manage_own_social,
			'enable_attendance' => $setting[0]->enable_attendance,
			'enable_clock_in_btn' => $setting[0]->enable_clock_in_btn,
			'enable_email_notification' => $setting[0]->enable_email_notification,
			'enable_job_application_candidates' => $setting[0]->enable_job_application_candidates,
			'job_application_format' => $setting[0]->job_application_format,
			'technical_competencies' => $setting[0]->technical_competencies,
			'organizational_competencies' => $setting[0]->organizational_competencies,
			'footer_text' => $setting[0]->footer_text,
			'email_type' => $email_config[0]->email_type,
			'smtp_host' => $email_config[0]->smtp_host,
			'smtp_username' => $email_config[0]->smtp_username,
			'smtp_password' => $email_config[0]->smtp_password,
			'smtp_port' => $email_config[0]->smtp_port,
			'smtp_secure' => $email_config[0]->smtp_secure,
			'enable_page_rendered' => $setting[0]->enable_page_rendered,
			'enable_current_year' => $setting[0]->enable_current_year,
			'employee_login_id' => $setting[0]->employee_login_id,
			'enable_auth_background' => $setting[0]->enable_auth_background,
			'system_timezone' => $setting[0]->system_timezone,
			'system_ip_address' => $setting[0]->system_ip_address,
			'system_ip_restriction' => $setting[0]->system_ip_restriction,
			'google_maps_api_key' => $setting[0]->google_maps_api_key,
			'is_ssl_available' => $setting[0]->is_ssl_available,
			'is_half_monthly' => $setting[0]->is_half_monthly,
			'half_deduct_month' => $setting[0]->half_deduct_month,
			'default_language' => $setting[0]->default_language,
			'statutory_fixed' => $setting[0]->statutory_fixed,
			'all_countries' => $this->Xin_model->get_countries()
		);
		$data['breadcrumbs'] = $this->lang->line('left_settings');
		$data['path_url'] = 'settings';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if (in_array('60', $role_resources_ids)) {
			if (!empty($session)) {
				$data['subview'] = $this->load->view("admin/settings/settings", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	public function payment_gateway()
	{

		$session = $this->session->userdata('username');
		if (empty($session)) {
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('xin_acc_payment_gateway') . ' | ' . $this->Xin_model->site_title();
		$setting = $this->Xin_model->read_setting_info(1);
		$data = array(
			'title' => $this->lang->line('xin_acc_payment_gateway') . ' | ' . $this->Xin_model->site_title(),
			'paypal_email' => $setting[0]->paypal_email,
			'paypal_sandbox' => $setting[0]->paypal_sandbox,
			'paypal_active' => $setting[0]->paypal_active,
			'stripe_secret_key' => $setting[0]->stripe_secret_key,
			'stripe_publishable_key' => $setting[0]->stripe_publishable_key,
			'stripe_active' => $setting[0]->stripe_active,
			'online_payment_account' => $setting[0]->online_payment_account,
			'all_bank_cash' => $this->Finance_model->all_bank_cash()
		);
		$data['breadcrumbs'] = $this->lang->line('xin_acc_payment_gateway');
		$data['path_url'] = 'xin_payment_gateway';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if (in_array('118', $role_resources_ids)) {
			if (!empty($session)) {
				$data['subview'] = $this->load->view("admin/settings/payment_gateway_settings", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}
	// database backup
	public function database_backup()
	{
		$session = $this->session->userdata('username');
		if (empty($session)) {
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('left_db_backup') . ' | ' . $this->Xin_model->site_title();
		$setting = $this->Xin_model->read_setting_info(1);
		$company_info = $this->Xin_model->read_company_setting_info(1);
		$data['breadcrumbs'] = $this->lang->line('left_db_backup');
		$data['path_url'] = 'database_backup';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if (in_array('62', $role_resources_ids)) {
			if (!empty($session)) {
				$data['subview'] = $this->load->view("admin/settings/database_backup", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	// system modules
	public function modules()
	{
		$session = $this->session->userdata('username');
		if (empty($session)) {
			redirect('admin/');
		}
		$setting = $this->Xin_model->read_setting_info(1);
		$data['breadcrumbs'] = $this->lang->line('xin_modules');
		$data['path_url'] = 'modules_setup';
		$data = array(
			'title' => $this->lang->line('xin_modules') . ' | ' . $this->Xin_model->site_title(),
			'path_url' => 'modules_setup',
			'breadcrumbs' => $this->lang->line('xin_modules'),
			'module_recruitment' => $setting[0]->module_recruitment,
			'module_travel' => $setting[0]->module_travel,
			'module_performance' => $setting[0]->module_performance,
			'module_files' => $setting[0]->module_files,
			'module_awards' => $setting[0]->module_awards,
			'module_training' => $setting[0]->module_training,
			'module_inquiry' => $setting[0]->module_inquiry,
			'module_language' => $setting[0]->module_language,
			'module_orgchart' => $setting[0]->module_orgchart,
			'module_accounting' => $setting[0]->module_accounting,
			'module_events' => $setting[0]->module_events,
			'module_goal_tracking' => $setting[0]->module_goal_tracking,
			'module_assets' => $setting[0]->module_assets,
			'module_payroll' => $setting[0]->module_payroll,
			'module_chat_box' => $setting[0]->module_chat_box,
			'is_active_sub_departments' => $setting[0]->is_active_sub_departments,
			'is_active_biometric' => $setting[0]->is_active_biometric,
		);
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if (in_array('93', $role_resources_ids)) {
			if (!empty($session)) {
				$data['subview'] = $this->load->view("admin/settings/modules", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	public function backup_database($directory, $outname, $dbhost, $dbuser, $dbpass, $dbname)
	{

		// check mysqli extension installed
		if (!function_exists('mysqli_connect')) {
			die(' This scripts need mysql extension to be running properly ! please resolve!!');
		}
		$mysqli = @new mysqli($dbhost, $dbuser, $dbpass, $dbname);

		if ($mysqli->connect_error) {
			print_r($mysqli->connect_error);
			return false;
		}
		$dir = $directory;
		$result = '<p> Could not create backup directory on :' . $dir . ' Please Please make sure you have set Directory on 755 or 777 for a while.</p>';
		$res = true;
		if (!is_dir($dir)) {
			if (!@mkdir($dir, 755)) {
				$res = false;
			}
		}
		$n = 1;
		if ($res) {
			$name     = $outname;
			# counts
			if (file_exists($dir . '/' . $name . '.sql.gz')) {
				for ($i = 1; @count(file($dir . '/' . $name . '_' . $i . '.sql.gz')); $i++) {
					$name = $name;
					if (!file_exists($dir . '/' . $name . '_' . $i . '.sql.gz')) {
						$name = $name . '_' . $i;
						break;
					}
				}
			}
			$fullname = $dir . '/' . $name . '.sql.gz'; # full structures
			if (!$mysqli->error) {
				$sql = "SHOW TABLES";
				$show = $mysqli->query($sql);
				while ($r = $show->fetch_array()) {
					$tables[] = $r[0];
				}
				if (!empty($tables)) {
					//cycle through
					$return = '';
					foreach ($tables as $table) {
						$result     = $mysqli->query('SELECT * FROM ' . $table);
						$num_fields = $result->field_count;
						$row2       = $mysqli->query('SHOW CREATE TABLE ' . $table);
						$row2       = $row2->fetch_row();
						$return    .=
							"\n
		-- ---------------------------------------------------------
		--
		-- Table structure for table : `{$table}`
		--
		-- ---------------------------------------------------------
		" . $row2[1] . ";\n";
						for ($i = 0; $i < $num_fields; $i++) {
							$n = 1;
							while ($row = $result->fetch_row()) {

								if ($n++ == 1) { # set the first statements
									$return .=
										"
		--
		-- Dumping data for table `{$table}`
		--
		";
									/**
									 * Get structural of fields each tables
									 */
									$array_field = array(); #reset ! important to resetting when loop 
									while ($field = $result->fetch_field()) # get field
									{
										$array_field[] = '`' . $field->name . '`';
									}
									$array_f[$table] = $array_field;
									// $array_f = $array_f;
									# endwhile
									$array_field = implode(', ', $array_f[$table]); #implode arrays
									$return .= "INSERT INTO `{$table}` ({$array_field}) VALUES\n(";
								} else {
									$return .= '(';
								}
								for ($j = 0; $j < $num_fields; $j++) {

									$row[$j] = str_replace('\'', '\'\'', preg_replace("/\n/", "\\n", $row[$j]));
									if (isset($row[$j])) {
										$return .= is_numeric($row[$j]) ? $row[$j] : '\'' . $row[$j] . '\'';
									} else {
										$return .= '\'\'';
									}
									if ($j < ($num_fields - 1)) {
										$return .= ', ';
									}
								}
								$return .= "),\n";
							}
							# check matching
							@preg_match("/\),\n/", $return, $match, false, -3); # check match
							if (isset($match[0])) {
								$return = substr_replace($return, ";\n", -2);
							}
						}

						$return .= "\n";
					}
					$return =
						"-- ---------------------------------------------------------
		--
		-- SIMPLE SQL Dump
		-- 
		-- nawa (at) yahoo (dot) com
		--
		-- Host Connection Info: " . $mysqli->host_info . "
		-- Generation Time: " . date('F d, Y \a\t H:i A ( e )') . "
		-- PHP Version: " . PHP_VERSION . "
		--
		-- ---------------------------------------------------------\n\n
		SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
		SET time_zone = \"+00:00\";
		/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
		/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
		/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
		/*!40101 SET NAMES utf8 */;
		" . $return . "
		/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
		/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
		/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
					# end values result
					@ini_set('zlib.output_compression', 'Off');

					$gzipoutput = gzencode($return, 9);
					if (@file_put_contents($fullname, $gzipoutput)) { # 9 as compression levels

						$result = $name . '.sql.gz'; # show the name

					} else { # if could not put file , automaticly you will get the file as downloadable
						$result = false;
						// various headers, those with # are mandatory
						header('Content-Type: application/x-gzip'); // change it to mimetype
						header("Content-Description: File Transfer");
						header('Content-Encoding: gzip'); #
						header('Content-Length: ' . strlen($gzipoutput)); #
						header('Content-Disposition: attachment; filename="' . $name . '.sql.gz' . '"');
						header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
						header('Connection: Keep-Alive');
						header("Content-Transfer-Encoding: binary");
						header('Expires: 0');
						header('Pragma: no-cache');

						echo $gzipoutput;
					}
				} else {
					$result = '<p>Error when executing database query to export.</p>' . $mysqli->error;
				}
			}
		} else {
			$result = '<p>Wrong mysqli input</p>';
		}

		if ($mysqli && !$mysqli->error) {
			@$mysqli->close();
		}
		return $result;
	}

	public function create_database_backup()
	{
		$data['title'] = $this->Xin_model->site_title();
		if ($this->input->post('type') === 'backup') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			$db = array('default' => array());
			// get db credentials
			require 'application/config/database.php';
			$hostname = $db['default']['hostname'];
			$username = $db['default']['username'];
			$password = $db['default']['password'];
			$database = $db['default']['database'];

			$dir  = 'uploads/dbbackup/'; // directory files
			$name = 'backup_' . date('d-m-Y_H_i_s'); // name sql backup
			$this->backup_database($dir, $name, $hostname, $username, $password, $database); // execute

			$fname = $name . '.sql.gz';

			$data = array(
				'backup_file' => $fname,
				'created_at' => date('d-m-Y H:i:s')
			);

			$result = $this->Xin_model->add_backup($data);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_database_backup_generated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	public function delete_db_backup()
	{
		if ($this->input->post('type') === 'delete_old_backup') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/*Delete backup*/
			$result = $this->Xin_model->delete_all_backup_record();
			$baseurl = base_url();
			$files = glob('uploads/dbbackup/*'); //get all file names
			foreach ($files as $file) {
				if (is_file($file))
					unlink($file); //delete file
			}

			$Return['result'] = $this->lang->line('xin_success_database_old_backup_deleted');
			$this->output($Return);
			exit;
		}
	}

	// backup list
	public function database_backup_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/database_backup", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$db_backup = $this->Xin_model->all_db_backup();

		$data = array();

		foreach ($db_backup->result() as $r) {

			$created_at = $this->Xin_model->set_date_format($r->created_at);

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_download') . '"><a href="' . site_url() . 'admin/download?type=dbbackup&filename=' . $r->backup_file . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light"><span class="fa fa-download"></span></button></a></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->backup_id . '"><span class="fa fa-trash"></span></button></span>',
				$r->backup_file,
				$created_at
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $db_backup->num_rows(),
			"recordsFiltered" => $db_backup->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function email_template()
	{

		$session = $this->session->userdata('username');
		if (empty($session)) {
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('left_email_templates') . ' | ' . $this->Xin_model->site_title();
		$data['breadcrumbs'] = $this->lang->line('left_email_templates');
		$data['path_url'] = 'email_template';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if (in_array('63', $role_resources_ids)) {
			if (!empty($session)) {
				$data['subview'] = $this->load->view("admin/settings/email_template", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	// email templates > list
	public function email_template_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/email_template", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$email_template = $this->Xin_model->get_email_templates();

		$data = array();

		foreach ($email_template->result() as $r) {

			if ($r->status == 1) {
				$status = '<span class="badge badge-pill badge-success">' . $this->lang->line('xin_employees_active') . '</span>';
			} else {
				$status = '<span class="badge badge-pill badge-warning">' . $this->lang->line('xin_employees_inactive') . '</span>';
			}

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light"  data-toggle="modal" data-target=".edit-modal-data"  data-template_id="' . $r->template_id . '"><span class="fa fa-pencil"></span></button></span>',
				$r->name,
				$r->subject,
				$status
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $email_template->num_rows(),
			"recordsFiltered" => $email_template->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function read_tempalte()
	{
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('template_id');
		$result = $this->Xin_model->read_email_template_info($id);
		$data = array(
			'template_id' => $result[0]->template_id,
			'template_code' => $result[0]->template_code,
			'name' => $result[0]->name,
			'subject' => $result[0]->subject,
			'message' => $result[0]->message,
			'status' => $result[0]->status
		);
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view('admin/settings/dialog_email_template', $data);
		} else {
			redirect('admin/');
		}
	}

	public function password_read()
	{
		$data['title'] = $this->Xin_model->site_title();
		$id = $this->input->get('user_id');
		$result = $this->Xin_model->read_user_info($id);
		$data = array(
			'user_id' => $result[0]->user_id,
		);
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view('admin/settings/dialog_constants', $data);
		} else {
			redirect('admin/');
		}
	}

	public function policy_read()
	{
		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view('admin/settings/dialog_constants', $data);
		} else {
			redirect('admin/');
		}
	}

	// Validate and update info in database
	public function update_template()
	{

		if ($this->input->post('edit_type') == 'update_template') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_name_field');
			} else if ($this->input->post('subject') === '') {
				$Return['error'] = $this->lang->line('xin_employee_error_subject');
			} else if ($this->input->post('status') === '') {
				$Return['error'] = $this->lang->line('xin_error_template_status');
			} else if ($this->input->post('message') === '') {
				$Return['error'] = $this->lang->line('xin_project_message');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$message = $this->input->post('message');
			$new_message = htmlspecialchars(addslashes($message), ENT_QUOTES);

			$data = array(
				'name' => $this->input->post('name'),
				'subject' => $this->input->post('subject'),
				'status' => $this->input->post('status'),
				'message' => $new_message
			);

			$result = $this->Xin_model->update_email_template_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_email_template_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// get all constants > all types
	public function constants()
	{
		$session = $this->session->userdata('username');
		if (empty($session)) {
			redirect('admin/');
		}
		$data['title'] = $this->lang->line('left_constants') . ' | ' . $this->Xin_model->site_title();
		//$setting = $this->Xin_model->read_setting_info(1);
		$company_info = $this->Xin_model->read_company_setting_info(1);
		$data['breadcrumbs'] = $this->lang->line('left_constants');
		$data['all_companies'] = $this->Xin_model->get_companies();
		$data['path_url'] = 'constants';
		$role_resources_ids = $this->Xin_model->user_role_resource();
		if (in_array('61', $role_resources_ids)) {
			if (!empty($session)) {
				$data['subview'] = $this->load->view("admin/settings/constants", $data, TRUE);
				$this->load->view('admin/layout/layout_main', $data); //page load
			} else {
				redirect('admin/');
			}
		} else {
			redirect('admin/dashboard');
		}
	}

	// Validate and update info in database
	public function company_info()
	{

		if ($this->input->post('type') == 'company_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			if ($this->input->post('company_name') === '') {
				$Return['error'] = $this->lang->line('xin_employee_error_company_name');
			} else if ($this->input->post('website') === '') {
				$Return['error'] = $this->lang->line('xin_error_website_field');
			} else if ($this->input->post('contact_person') === '') {
				$Return['error'] = $this->lang->line('xin_error_contact_person');
			} else if ($this->input->post('email') === '') {
				$Return['error'] = $this->lang->line('xin_error_cemail_field');
			} else if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
				$Return['error'] = $this->lang->line('xin_employee_error_invalid_email');
			} else if ($this->input->post('phone') === '') {
				$Return['error'] = $this->lang->line('xin_error_phone_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'company_name' => $this->input->post('company_name'),
				'contact_person' => $this->input->post('contact_person'),
				'website_url' => $this->input->post('website'),
				'starting_year' => $this->input->post('starting_year'),
				'company_email' => $this->input->post('company_email'),
				'company_contact' => $this->input->post('company_contact'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'address_1' => $this->input->post('address_1'),
				'address_2' => $this->input->post('address_2'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'zipcode' => $this->input->post('zipcode'),
				'country' => $this->input->post('country'),
			);

			$result = $this->Xin_model->update_company_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_company_info_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function logo_info()
	{

		if ($this->input->post('type') == 'logo_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			if ($_FILES['p_file']['size'] == 0) {
				$Return['error'] = $this->lang->line('xin_error_select_first_logo');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			if (is_uploaded_file($_FILES['p_file']['tmp_name'])) {
				//checking image type
				$allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif');
				$filename = $_FILES['p_file']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);

				if (in_array($ext, $allowed)) {
					$tmp_name = $_FILES["p_file"]["tmp_name"];
					$profile = "uploads/logo/";
					$set_img = base_url() . "uploads/logo/";
					// basename() may prevent filesystem traversal attacks;
					// further validation/sanitation of the filename may be appropriate
					$name = basename($_FILES["p_file"]["name"]);
					$newfilename = 'logo_' . round(microtime(true)) . '.' . $ext;
					move_uploaded_file($tmp_name, $profile . $newfilename);
					$fname = $newfilename;
				} else {
					$Return['error'] = $this->lang->line('xin_error_logo_first_attachment');
				}
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'logo' => $fname,
			);
			$result = $this->Xin_model->update_company_info_record($data, $id);
			if ($result == TRUE) {
				$Return['img'] = $set_img . $fname;
				$Return['result'] = $this->lang->line('xin_success_system_logo_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function logo_favicon()
	{

		if ($this->input->post('type') == 'logo_favicon') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			if ($_FILES['favicon']['size'] == 0) {
				$Return['error'] = $this->lang->line('xin_error_select_favicon');
			}
			if ($Return['error'] != '') {
				$this->output($Return);
			}

			if (is_uploaded_file($_FILES['favicon']['tmp_name'])) {
				//checking image type
				$allowed3 =  array('png', 'jpg', 'gif', 'ico');
				$filename3 = $_FILES['favicon']['name'];
				$ext3 = pathinfo($filename3, PATHINFO_EXTENSION);

				if (in_array($ext3, $allowed3)) {
					$tmp_name3 = $_FILES["favicon"]["tmp_name"];
					$profile3 = "uploads/logo/favicon/";
					$set_img3 = base_url() . "uploads/logo/favicon/";
					// basename() may prevent filesystem traversal attacks;
					// further validation/sanitation of the filename may be appropriate
					$name = basename($_FILES["favicon"]["name"]);
					$newfilename3 = 'favicon_' . round(microtime(true)) . '.' . $ext3;
					move_uploaded_file($tmp_name3, $profile3 . $newfilename3);
					$fname3 = $newfilename3;
				} else {
					$Return['error'] = $this->lang->line('xin_error_logo_favicon_attachment');
				}
			}


			$data = array(
				'favicon' => $fname3
			);
			$result = $this->Xin_model->update_company_info_record($data, $id);
			if ($result == TRUE) {
				$Return['img3'] = $set_img3 . $fname3;
				$Return['result'] = $this->lang->line('xin_success_system_logo_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function profile_background()
	{

		if ($this->input->post('type') == 'profile_background') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');

			$id = $this->input->post('user_id');

			if ($_FILES['p_file']['size'] == 0) {
				$Return['csrf_hash'] = $this->security->get_csrf_hash();
				$Return['error'] = $this->lang->line('xin_error_select_profile_cover');
			} else {
				if (is_uploaded_file($_FILES['p_file']['tmp_name'])) {
					//checking image type
					$allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif');
					$filename = $_FILES['p_file']['name'];
					$ext = pathinfo($filename, PATHINFO_EXTENSION);

					if (in_array($ext, $allowed)) {
						$tmp_name = $_FILES["p_file"]["tmp_name"];
						$profile = "uploads/profile/background/";
						$set_img = base_url() . "uploads/profile/background/";
						// basename() may prevent filesystem traversal attacks;
						// further validation/sanitation of the filename may be appropriate
						$name = basename($_FILES["p_file"]["name"]);
						$newfilename = 'profile_background_' . round(microtime(true)) . '.' . $ext;
						move_uploaded_file($tmp_name, $profile . $newfilename);
						$fname = $newfilename;

						$data = array(
							'profile_background' => $fname
						);
						$result = $this->Employees_model->basic_info($data, $id);
						if ($result == TRUE) {
							$Return['profile_background'] = $set_img . $fname;
							$Return['result'] = $this->lang->line('xin_success_profile_background_updated');
						} else {
							$Return['error'] = $this->lang->line('xin_error_msg');
						}
						$Return['csrf_hash'] = $this->security->get_csrf_hash();
						$this->output($Return);
						exit;
					} else {
						$Return['csrf_hash'] = $this->security->get_csrf_hash();
						$Return['error'] = $this->lang->line('xin_error_attatchment_type');
					}
				}
			}

			if ($Return['error'] != '') {
				$Return['csrf_hash'] = $this->security->get_csrf_hash();
				$this->output($Return);
			}
		}
	}

	// Validate and update info in database
	public function payroll_config()
	{

		if ($this->input->post('type') == 'payroll_config') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			$data = array(
				'is_payslip_password_generate' => $this->input->post('payslip_password_generate'),
				'payslip_password_format' => $this->input->post('payslip_password_format'),
				'is_half_monthly' => $this->input->post('is_half_monthly'),
				'half_deduct_month' => $this->input->post('half_deduct_month')
			);
			$result = $this->Xin_model->update_setting_info_record($data, $id);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_payroll_config_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;

			if ($Return['error'] != '') {
				$this->output($Return);
			}
		}
	}

	// Validate and update info in database
	public function system_info()
	{

		if ($this->input->post('type') == 'system_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			if (trim($this->input->post('application_name')) === '') {
				$Return['error'] = $this->lang->line('xin_error_application_name_field');
			} else if ($this->input->post('default_currency_symbol') === '') {
				$Return['error'] = $this->lang->line('xin_error_default_currency_field');
			} else if ($this->input->post('show_currency') === '') {
				$Return['error'] = $this->lang->line('xin_error_default_currency_symbol');
			} else if ($this->input->post('currency_position') === '') {
				$Return['error'] = $this->lang->line('xin_error_currency_position');
			} else if ($this->input->post('date_format') === '') {
				$Return['error'] = $this->lang->line('xin_error_date_format_field');
			} else if ($this->input->post('footer_text') === '') {
				$Return['error'] = $this->lang->line('xin_error_footer_text');
			} else if ($this->input->post('employee_login_id') === '') {
				$Return['error'] = $this->lang->line('xin_error_employee_login_id_field');
			} else if ($this->input->post('system_timezone') === '') {
				$Return['error'] = $this->lang->line('xin_error_timezone_field');
			} else if ($this->input->post('system_ip_address') === '') {
				$Return['error'] = $this->lang->line('xin_error_sys_ip_address_field');
			} else if ($this->input->post('google_maps_api_key') === '') {
				$Return['error'] = $this->lang->line('xin_error_gmap_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'application_name' => $this->input->post('application_name'),
				'default_currency_symbol' => $this->input->post('default_currency_symbol'),
				'default_currency' => $this->input->post('default_currency_symbol'),
				'show_currency' => $this->input->post('show_currency'),
				'currency_position' => $this->input->post('currency_position'),
				'date_format_xi' => $this->input->post('date_format'),
				'footer_text' => $this->input->post('footer_text'),
				'enable_page_rendered' => $this->input->post('enable_page_rendered'),
				'enable_current_year' => $this->input->post('enable_current_year'),
				'employee_login_id' => $this->input->post('employee_login_id'),
				'enable_auth_background' => $this->input->post('enable_auth_background'),
				'system_timezone' => $this->input->post('system_timezone'),
				'system_ip_address' => $this->input->post('system_ip_address'),
				'google_maps_api_key' => $this->input->post('google_maps_api_key'),
				'is_ssl_available' => $this->input->post('is_ssl_available'),
				'default_language' => $this->input->post('default_language'),
				'statutory_fixed' => $this->input->post('statutory_fixed'),
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_system_configuration_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function modules_info()
	{

		if ($this->input->get('type') == 'modules_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			$data = array(
				'module_recruitment' => $this->input->get('mrecruitment'),
				'module_travel' => $this->input->get('mtravel'),
				'module_files' => $this->input->get('mfiles'),
				'module_language' => $this->input->get('mlanguage'),
				'module_orgchart' => $this->input->get('morgchart'),
				'module_events' => $this->input->get('mevents'),
				'module_chat_box' => $this->input->get('chatbox'),
				'is_active_sub_departments' => $this->input->get('is_sub_departments'),
				'module_payroll' => $this->input->get('module_payroll'),
				'module_performance' => $this->input->get('module_performance'),
				'is_active_biometric' => $this->input->get('is_biometric'),
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_system_modules_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function layout_skin_info()
	{

		if ($this->input->get('type') == 'hrsale_layout_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = $this->input->get('user_session_id');

			$data = array(
				'fixed_header' => $this->input->get('fixed_layout_hrsale'),
				'boxed_wrapper' => $this->input->get('boxed_layout_hrsale'),
				'compact_sidebar' => $this->input->get('sidebar_layout_hrsale')
			);

			$result = $this->Employees_model->basic_info($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_system_layout_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function role_info()
	{

		if ($this->input->post('type') == 'role_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			$data = array(
				'employee_manage_own_contact' => $this->input->post('employee_manage_own_contact'),
				'employee_manage_own_social' => $this->input->post('employee_manage_own_social'),
				'employee_manage_own_bank_account' => $this->input->post('employee_manage_own_bank_account'),
				'employee_manage_own_qualification' => $this->input->post('employee_manage_own_qualification'),
				'employee_manage_own_work_experience' => $this->input->post('employee_manage_own_work_experience'),
				'employee_manage_own_document' => $this->input->post('employee_manage_own_document'),
				'employee_manage_own_picture' => $this->input->post('employee_manage_own_picture'),
				'employee_manage_own_profile' => $this->input->post('employee_manage_own_profile'),
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_role_config_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function sidebar_setting_info()
	{

		if ($this->input->post('type') == 'other_settings') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			$data = array(
				'enable_attendance' => $this->input->post('enable_attendance'),
				'enable_job_application_candidates' => $this->input->post('enable_job'),
				'enable_profile_background' => $this->input->post('enable_profile_background'),
				'enable_email_notification' => $this->input->post('role_email_notification'),
				'notification_close_btn' => $this->input->post('close_btn'),
				'notification_bar' => $this->input->post('notification_bar'),
				'enable_policy_link' => $this->input->post('role_policy_link'),
				'enable_layout' => $this->input->post('enable_layout'),
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_setting_config_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function attendance_info()
	{

		if ($this->input->post('type') == 'attendance_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			$data = array(
				'enable_attendance' => $this->input->post('enable_attendance'),
				'enable_clock_in_btn' => $this->input->post('enable_clock_in_btn')
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_attendance_config_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function email_info()
	{

		if ($this->input->post('type') == 'email_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			$data = array(
				'enable_email_notification' => $this->input->post('enable_email_notification')
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);
			$cdata = array(
				'email_type' => $this->input->post('email_type'),
				'smtp_host' => $this->input->post('smtp_host'),
				'smtp_username' => $this->input->post('smtp_username'),
				'smtp_password' => $this->input->post('smtp_password'),
				'smtp_port' => $this->input->post('smtp_port'),
				'smtp_secure' => $this->input->post('smtp_secure')
			);
			$this->Xin_model->update_email_config_record($cdata, 1);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_email_notify_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function job_info()
	{

		if ($this->input->post('type') == 'job_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			if ($this->input->post('job_application_format') === '') {
				$Return['error'] = $this->lang->line('xin_error_job_app_format');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}
			$job_format = str_replace(array('php', '', 'js', '', 'html', ''), '', $this->input->post('job_application_format'));
			$id = 1;

			$data = array(
				'enable_job_application_candidates' => $this->input->post('enable_job'),
				'job_application_format' => $job_format
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_job_config_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function performance_info()
	{

		if ($this->input->post('type') == 'performance_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			if ($this->input->post('technical_competencies') === '') {
				$Return['error'] = $this->lang->line('xin_performance_technical_error_field');
			} else if ($this->input->post('organizational_competencies') === '') {
				$Return['error'] = $this->lang->line('xin_performance_org_error_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}
			$technical_competencies = str_replace(array('php', '', 'js', '', 'html', ''), '', $this->input->post('technical_competencies'));
			$organizational_competencies = str_replace(array('php', '', 'js', '', 'html', ''), '', $this->input->post('organizational_competencies'));
			$id = 1;

			$data = array(
				'technical_competencies' => $technical_competencies,
				'organizational_competencies' => $organizational_competencies
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_performance_config_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function animation_effect_info()
	{

		if ($this->input->post('type') == 'animation_effect_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			$data = array(
				'animation_effect' => $this->input->post('animation_effect'),
				'animation_effect_topmenu' => $this->input->post('animation_effect_topmenu'),
				'animation_effect_modal' => $this->input->post('animation_effect_modal')
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_animation_config_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function notification_position_info()
	{

		if ($this->input->post('type') == 'notification_position_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			if ($this->input->post('notification_position') === '') {
				$Return['error'] = $this->lang->line('xin_error_notify_position');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}
			$id = 1;

			$data = array(
				'notification_position' => $this->input->post('notification_position'),
				'notification_close_btn' => $this->input->post('notification_close_btn'),
				'notification_bar' => $this->input->post('notification_bar')
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_notify_position_config_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	public function delete_single_backup()
	{
		/* Define return | here result is used to return user data and error for error message */
		$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
		$id = $this->uri->segment(4);
		$Return['csrf_hash'] = $this->security->get_csrf_hash();
		$result = $this->Xin_model->delete_single_backup_record($id);
		if (isset($id)) {
			$Return['result'] = $this->lang->line('xin_success_database_backup_deleted');
		} else {
			$Return['error'] = $this->lang->line('xin_error_msg');
		}
		$this->output($Return);
	}

	/*  ALL CONSTANTS */

	// Contract Type > list
	public function contract_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$contract_type = $this->Xin_model->get_contract_types();

		$data = array();

		foreach ($contract_type->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->contract_type_id . '" data-field_type="contract_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->contract_type_id . '" data-token_type="contract_type"><span class="fa fa-trash"></span></button></span>',
				$r->name,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $contract_type->num_rows(),
			"recordsFiltered" => $contract_type->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Education Level > list
	public function education_level_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_qualification_education();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->education_level_id . '" data-field_type="education_level"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->education_level_id . '" data-token_type="education_level"><span class="fa fa-trash"></span></button></span>',
				$r->name,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Language > list
	public function qualification_language_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_qualification_language();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->language_id . '" data-field_type="qualification_language"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->language_id . '"  data-token_type="qualification_language"><span class="fa fa-trash"></span></button></span>',
				$r->name,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Skill > list
	public function qualification_skill_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_qualification_skill();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->skill_id . '" data-field_type="qualification_skill"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->skill_id . '" data-token_type="qualification_skill"><span class="fa fa-trash"></span></button></span>',
				$r->name,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Document Type > list
	public function document_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_document_type();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->document_type_id . '" data-field_type="document_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->document_type_id . '" data-token_type="document_type"><span class="fa fa-trash"></span></button></span>',
				$r->document_type,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Award Type > list
	public function award_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_award_type();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->award_type_id . '" data-field_type="award_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->award_type_id . '" data-token_type="award_type"><span class="fa fa-trash"></span></button></span>',
				$r->award_type,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Leave Type > list
	public function leave_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_leave_type();

		$data = array();

		foreach ($constant->result() as $r) {
			// Carry forward or end cash
			if ($r->is_carry_end_cash == 1) : $is_carry_end_cash = '<span class="badge bg-green">' . $this->lang->line('xin_carry_forward') . '</span>';
			elseif ($r->is_carry_end_cash == 2) : $is_carry_end_cash = '<span class="badge bg-blue">' . $this->lang->line('xin_encash') . '</span>';
			elseif ($r->is_carry_end_cash == 3) : $is_carry_end_cash = '<span class="badge bg-red">' . $this->lang->line('xin_nothing') . '</span>';
			endif;
			// Paid or Not Paid
			if ($r->is_paid_not == 1) : $is_paid_not = '<span class="badge bg-green">' . $this->lang->line('xin_paid') . '</span>';
			elseif ($r->is_paid_not == 2) : $is_paid_not = '<span class="badge bg-red">' . $this->lang->line('xin_not_paid') . '</span>';
			endif;


			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->leave_type_id . '" data-field_type="leave_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->leave_type_id . '" data-token_type="leave_type"><span class="fa fa-trash"></span></button></span>',
				$r->type_name,
				$r->days_per_year,
				$r->days_per_month,
				$is_carry_end_cash,
				$is_paid_not,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}
	public function salary_benefit_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_salary_benefit();

		$data = array();

		foreach ($constant->result() as $r) {
			if ($r->salary_benefit_type == 1) {
				$type =	 $this->lang->line('xin_salary_allowance');
			} else if ($r->salary_benefit_type == 2) {
				$type = $this->lang->line('xin_salary_deduction');
			} else {
				$type = "N/A";
			}
			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '">
					<button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->salary_benefit_id . '" data-field_type="salary_benefit">
						<span class="fa fa-pencil"></span>
					</button>
				</span>
				<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '">
					<button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->salary_benefit_id . '" data-token_type="salary_benefit">
						<span class="fa fa-trash"></span>
					</button>
				</span>',

				$type,

				$r->salary_benefit_name,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// List Grade Setting
	public function grade_setting_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_grade();

		$data = array();

		foreach ($constant->result() as $r) {

			$get_company =  $this->Xin_model->read_company_info($r->company_id);
			$company_name = $get_company[0]->name;
			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '">
					<button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->grade_id . '" data-field_type="grade_setting">
						<span class="fa fa-pencil"></span>
					</button>
				</span>
				<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '">
					<button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->grade_id . '" data-token_type="grade_setting">
						<span class="fa fa-trash"></span>
					</button>
				</span>',
				$company_name,
				$r->grade_name,
				$r->grade_range_from,
				$r->grade_range_to,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// List Grade Benefit Setting
	public function grade_benefit_setting_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_grade_benefit();

		$data = array();

		foreach ($constant->result() as $r) {

			$get_company =  $this->Xin_model->read_company_info($r->company_id);
			$company_name = $get_company[0]->name;
			$get_grade = $this->Xin_model->read_grade_info($r->grade_id);
			if ($r->grade_benefit_type == 1) {
				$grade_benefit_type = $this->lang->line('xin_salary_allowance');
			} else if ($r->grade_benefit_type == 2) {
				$grade_benefit_type = $this->lang->line('xin_salary_deduction');
			}

			$get_benefit_name =  $this->Xin_model->read_benefit_info($r->benefit_id);
			if ($r->grade_amount_type == 1) {
				$benefit_name = $get_benefit_name[0]->salary_benefit_name;
			} else if ($r->grade_amount_type == 2) {
				$benefit_name = $get_benefit_name[0]->salary_benefit_name . ' (%)';
			}

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '">
					<button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->grade_benefit_id . '" data-field_type="grade_benefit_setting">
						<span class="fa fa-pencil"></span>
					</button>
				</span>
				<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '">
					<button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->grade_benefit_id . '" data-token_type="grade_benefit_setting">
						<span class="fa fa-trash"></span>
					</button>
				</span>',
				$company_name,
				$get_grade[0]->grade_name,
				$grade_benefit_type,
				$benefit_name,
				number_format($r->grade_amount, 2),
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	/**promotion_type_list */

	public function promotion_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$promotion_type = $this->Xin_model->get_promotion_types();

		$data = array();

		foreach ($promotion_type->result() as $r) {
			$get_company =  $this->Xin_model->read_company_info($r->company_id);
			$company_name = $get_company[0]->name;
			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->promotion_type_id . '" data-field_type="promotion_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->promotion_type_id . '" data-token_type="promotion_type"><span class="fa fa-trash"></span></button></span>',
				$company_name,
				$r->name,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $promotion_type->num_rows(),
			"recordsFiltered" => $promotion_type->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}


	// Warning Type > list
	public function warning_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_warning_type();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->warning_type_id . '" data-field_type="warning_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->warning_type_id . '" data-token_type="warning_type"><span class="fa fa-trash"></span></button></span>',
				$r->type
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Termination Type > list
	public function termination_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_termination_type();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->termination_type_id . '" data-field_type="termination_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->termination_type_id . '" data-token_type="termination_type"><span class="fa fa-trash"></span></button></span>',
				$r->type
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Expense Type > list
	public function expense_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_expense_type();

		$data = array();

		foreach ($constant->result() as $r) {
			// get company
			$company = $this->Xin_model->read_company_info($r->company_id);
			if (!is_null($company)) {
				$comp_name = $company[0]->name;
			} else {
				$comp_name = '--';
			}

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->expense_type_id . '" data-field_type="expense_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->expense_type_id . '" data-token_type="expense_type"><span class="fa fa-trash"></span></button></span>',
				$comp_name,
				$r->name
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Job Type > list
	public function job_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_job_type();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->job_type_id . '" data-field_type="job_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->job_type_id . '" data-token_type="job_type"><span class="fa fa-trash"></span></button></span>',
				$r->type
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Job Categories > list
	public function job_category_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_job_categories();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->category_id . '" data-field_type="job_category"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->category_id . '" data-token_type="job_category"><span class="fa fa-trash"></span></button></span>',
				$r->category_name
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Exit Type > list
	public function exit_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_exit_type();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->exit_type_id . '" data-field_type="exit_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->exit_type_id . '" data-token_type="exit_type"><span class="fa fa-trash"></span></button></span>',
				$r->type
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Travel Arrangement Type > list
	public function travel_arr_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_travel_type();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->arrangement_type_id . '" data-field_type="travel_arr_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->arrangement_type_id . '" data-token_type="travel_arr_type"><span class="fa fa-trash"></span></button></span>',
				$r->type
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Payment Method > list
	public function payment_method_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_payment_method();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->payment_method_id . '" data-field_type="payment_method"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->payment_method_id . '" data-token_type="payment_method"><span class="fa fa-trash"></span></button></span>',
				$r->method_name,
				$r->payment_percentage . '%',
				$r->account_number
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Currency type > list
	public function currency_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_currency_types();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->currency_id . '" data-field_type="currency_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->currency_id . '" data-token_type="currency_type"><span class="fa fa-trash"></span></button></span>',
				$r->name,
				$r->code,
				$r->symbol
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	// Company type > list
	public function company_type_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_company_type();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->type_id . '" data-field_type="company_type"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->type_id . '" data-token_type="company_type"><span class="fa fa-trash"></span></button></span>',
				$r->name
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}
	// security level type > list
	public function security_level_list()
	{

		$data['title'] = $this->Xin_model->site_title();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view("admin/settings/constants", $data);
		} else {
			redirect('admin/');
		}
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$constant = $this->Xin_model->get_security_level_type();

		$data = array();

		foreach ($constant->result() as $r) {

			$data[] = array(
				'<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".edit_setting_datail" data-field_id="' . $r->type_id . '" data-field_type="security_level"><span class="fa fa-pencil"></span></button></span><span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->type_id . '" data-token_type="security_level"><span class="fa fa-trash"></span></button></span>',
				$r->name
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $constant->num_rows(),
			"recordsFiltered" => $constant->num_rows(),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	/*  Add constant data */

	// Validate and add info in database
	public function contract_type_info()
	{

		if ($this->input->post('type') == 'contract_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('contract_type') === '') {
				$Return['error'] = $this->lang->line('xin_employee_error_contract_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'name' => $this->input->post('contract_type'),
				'created_at' => date('d-m-Y h:i:s')
			);
			$result = $this->Xin_model->add_contract_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_contract_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function document_type_info()
	{

		if ($this->input->post('type') == 'document_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('document_type') === '') {
				$Return['error'] = $this->lang->line('xin_employee_error_d_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}
			$title = $this->input->post('title') == 'on' ? 1 : 0;
			$address = $this->input->post('address') == 'on' ? 1 : 0;
			$no = $this->input->post('no') == 'on' ? 1 : 0;
			$create_date = $this->input->post('date_of_create') == 'on' ? 1 : 0;
			$expiry_date = $this->input->post('date_of_expiry') == 'on' ? 1 : 0;
			$email = $this->input->post('email') == 'on' ? 1 : 0;
			$file = $this->input->post('file') == 'on' ? 1 : 0;

			$data = array(
				'document_type' => $this->input->post('document_type'),
				'is_title' => $title,
				'is_address' => $address,
				'is_no' => $no,
				'is_create_date' => $create_date,
				'is_expiry_date' => $expiry_date,
				'is_notif_email' => $email,
				'is_file' => $file,
				'created_at' => date('d-m-Y h:i:s')
			);
			$result = $this->Xin_model->add_document_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_document_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function edu_level_info()
	{

		if ($this->input->post('type') == 'edu_level_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_education_level');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'name' => $this->input->post('name'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_edu_level($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_education_level_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function edu_language_info()
	{

		if ($this->input->post('type') == 'edu_language_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_education_language');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'name' => $this->input->post('name'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_edu_language($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_education_language_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function edu_skill_info()
	{

		if ($this->input->post('type') == 'edu_skill_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_education_skill');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'name' => $this->input->post('name'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_edu_skill($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_education_skill_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function payment_method_info()
	{

		if ($this->input->post('type') == 'payment_method_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('payment_method') === '') {
				$Return['error'] = $this->lang->line('xin_error_payment_method');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'method_name' => $this->input->post('payment_method'),
				'payment_percentage' => $this->input->post('payment_percentage'),
				'account_number' => $this->input->post('account_number'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_payment_method($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_payment_method_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function award_type_info()
	{

		if ($this->input->post('type') == 'award_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('award_type') === '') {
				$Return['error'] = $this->lang->line('xin_award_error_award_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'award_type' => $this->input->post('award_type'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_award_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_award_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function leave_type_info()
	{

		if ($this->input->post('type') == 'leave_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('leave_type') === '') {
				$Return['error'] = $this->lang->line('xin_error_leave_type_field');
			} else if ($this->input->post('days_per_year') === '') {
				$Return['error'] = $this->lang->line('xin_error_days_per_year');
			} else if ($this->input->post('days_per_year') < 1) {
				$Return['error'] = $this->lang->line('xin_error_days_per_year_check_value');
			} else if ($this->input->post('days_per_month') === '') {
				$Return['error'] = $this->lang->line('xin_error_days_per_month');
			} else if ($this->input->post('days_per_month') > $this->input->post('days_per_year')) {
				$Return['error'] = $this->lang->line('xin_error_days_per_month_year');
			} else if ($this->input->post('days_per_year') < 1) {
				$Return['error'] = $this->lang->line('xin_error_days_per_month_check_value');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'type_name' => $this->input->post('leave_type'),
				'days_per_year' => $this->input->post('days_per_year'),
				'days_per_month' => $this->input->post('days_per_month'),
				'is_carry_end_cash' => $this->input->post('carry_end_cash'),
				'is_paid_not' => $this->input->post('paid_not'),
				'created_at' => date('d-m-Y h:i:s')
			);


			$result = $this->Xin_model->add_leave_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_leave_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}
	public function salary_benefit_info()
	{
		if ($this->input->post('type') == 'salary_benefit_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('company_id_salb') === '') {
				$Return['error'] = $this->lang->line('xin_error_company_name_field');
			} else if ($this->input->post('salary_benefit_type') === '') {
				$Return['error'] = $this->lang->line('xin_error_salary_benefit_type_field');
			} else if ($this->input->post('salary_benefit_name') === '') {
				$Return['error'] = $this->lang->line('xin_error_salary_benefit_name');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'company_id' =>  $this->input->post('company_id_salb'),
				'salary_benefit_type' => $this->input->post('salary_benefit_type'),
				'salary_benefit_name' => $this->input->post('salary_benefit_name'),
			);

			$result = $this->Xin_model->add_salary_benefit($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_salary_benefit_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Info Grade Setting
	public function grade_setting_info()
	{

		if ($this->input->post('type') == 'grade_setting_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('company_id') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_comnpany_name_field');
			} else if ($this->input->post('grade_name') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_name_field');
			} else if ($this->input->post('grade_range_from') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_range_from_field');
			} else if ($this->input->post('grade_range_to') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_range_to_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'company_id' => $this->input->post('company_id'),
				'grade_name' => $this->input->post('grade_name'),
				'grade_range_from' => $this->input->post('grade_range_from'),
				'grade_range_to' => $this->input->post('grade_range_to'),
			);

			$result = $this->Xin_model->add_grade_setting($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_grade_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Info Grade Benefit Setting
	public function grade_benefit_setting_info()
	{
		if ($this->input->post('type') == 'grade_benefit_setting_info') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$grade_benefts = $this->Xin_model->check_grade_benefits($this->input->post('grade_id'), $this->input->post('benefit_name_aj'), $this->input->post('company_id_aj'));

			/* Server side PHP input validation */
			if ($this->input->post('company_id_aj') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_comnpany_name_field');
			} else if ($this->input->post('grade_id') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_name_field');
			} else if ($this->input->post('benefit_type_aj') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_benefit_type_field');
			} else if ($this->input->post('benefit_name_aj') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_benefit_name_field');
			} else if ($this->input->post('amount_type') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_benefit_amount_type_field');
			} else if ($this->input->post('grade_amount') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_benefit_amount_field');
			} else if ($grade_benefts > 0) {
				if ($this->input->post('benefit_type_aj') == 1) {
					$Return['error'] = $this->lang->line('xin_employee_set_allowance_added_error');
				} else {
					$Return['error'] = $this->lang->line('xin_employee_set_deduction_added_error');
				}
			}
			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'company_id' => $this->input->post('company_id_aj'),
				'grade_id' => $this->input->post('grade_id'),
				'grade_benefit_type' => $this->input->post('benefit_type_aj'),
				'benefit_id' => $this->input->post('benefit_name_aj'),
				'grade_amount_type' => $this->input->post('amount_type'),
				'salary_amount_type' => $this->input->post('salary_amount_type'),
				'grade_amount' => $this->input->post('grade_amount'),
			);

			// Change Calculation in Empployee 


			$result = $this->Xin_model->add_grade_benefit_setting($data);

			$get_employee = $this->Employees_model->get_employees_on_grade($this->input->post('grade_id'));
			if (!empty($get_employee)) {
				foreach ($get_employee as $employee) {

					$employee_id = $employee->user_id;
					$grade_id = $employee->grade_id;
					$basic_salary = $employee->basic_salary;
					$salary_amount_type =  $this->input->post('salary_amount_type');

					$this->Employees_model->insert_grade_data($employee_id, $grade_id, $basic_salary, $salary_amount_type);
				}
			}
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_grade_benefit_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	public function promotion_type_info()
	{

		if ($this->input->post('type') == 'promotion_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('promotion_type') === '') {
				$Return['error'] = $this->lang->line('xin_employee_error_promotion_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'company_id' => $this->input->post('company_id'),
				'name' => $this->input->post('promotion_type'),
				'created_at' => date('d-m-Y h:i:s')
			);
			$result = $this->Xin_model->add_promotion_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_promotion_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}


	// Validate and add info in database
	public function warning_type_info()
	{

		if ($this->input->post('type') == 'warning_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('warning_type') === '') {
				$Return['error'] = $this->lang->line('xin_employee_error_warning_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'type' => $this->input->post('warning_type'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_warning_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_warning_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function termination_type_info()
	{

		if ($this->input->post('type') == 'termination_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('termination_type') === '') {
				$Return['error'] = $this->lang->line('xin_error_termination_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'type' => $this->input->post('termination_type'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_termination_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_termination_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function expense_type_info()
	{

		if ($this->input->post('type') == 'expense_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('company') === '') {
				$Return['error'] = $this->lang->line('error_company_field');
			} else if ($this->input->post('expense_type') === '') {
				$Return['error'] = $this->lang->line('xin_error_expense_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'name' => $this->input->post('expense_type'),
				'company_id' => $this->input->post('company'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_expense_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_expense_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function job_type_info()
	{

		if ($this->input->post('type') == 'job_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('job_type') === '') {
				$Return['error'] = $this->lang->line('xin_error_jobpost_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}
			$jurl = random_string('alnum', 40);
			$data = array(
				'type' => $this->input->post('job_type'),
				'type_url' => $jurl,
				'company_id' => 1,
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_job_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_job_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}
	// Validate and add info in database
	public function job_category_info()
	{

		if ($this->input->post('type') == 'job_category_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('job_category') === '') {
				$Return['error'] = $this->lang->line('xin_error_job_category');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}
			$jurl = random_string('alnum', 40);
			$data = array(
				'category_name' => $this->input->post('job_category'),
				'category_url' => $jurl,
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_job_category($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_job_category_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function exit_type_info()
	{

		if ($this->input->post('type') == 'exit_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('exit_type') === '') {
				$Return['error'] = $this->lang->line('xin_error_exit_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'type' => $this->input->post('exit_type'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_exit_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_error_education_level');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function travel_arr_type_info()
	{

		if ($this->input->post('type') == 'travel_arr_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('travel_arr_type') === '') {
				$Return['error'] = $this->lang->line('xin_error_travel_arrangment_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'type' => $this->input->post('travel_arr_type'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_travel_arr_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_travel_arrangment_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function company_type_info()
	{

		if ($this->input->post('type') == 'company_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('company_type') === '') {
				$Return['error'] = $this->lang->line('xin_error_ctype_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'name' => $this->input->post('company_type'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_company_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_company_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}
	// Validate and add info in database
	public function security_level_info()
	{

		if ($this->input->post('type') == 'security_level_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('security_level') === '') {
				$Return['error'] = $this->lang->line('xin_error_security_level_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'name' => $this->input->post('security_level'),
				'created_at' => date('d-m-Y h:i:s')
			);

			$result = $this->Xin_model->add_security_level($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_security_level_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and add info in database
	public function currency_type_info()
	{

		if ($this->input->post('type') == 'currency_type_info') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_currency_name_field');
			} else if ($this->input->post('code') === '') {
				$Return['error'] = $this->lang->line('xin_error_currency_code_field');
			} else if ($this->input->post('symbol') === '') {
				$Return['error'] = $this->lang->line('xin_error_currency_symbol_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'name' => $this->input->post('name'),
				'code' => $this->input->post('code'),
				'symbol' => $this->input->post('symbol')
			);

			$result = $this->Xin_model->add_currency_type($data);
			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_currency_type_added');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	/*  DELETE CONSTANTS */
	// delete constant record > table
	public function delete_contract_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_contract_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_contract_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_document_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_document_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_document_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_payment_method()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_payment_method_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_payment_method_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_education_level()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_education_level_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_education_level_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_qualification_language()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_qualification_language_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_qualification_lang_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_qualification_skill()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_qualification_skill_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_qualification_skill_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_award_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_award_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_award_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_leave_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_leave_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_leave_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	// delete constant record > table
	public function delete_salary_benefit()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_salary_benefit_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_salary_benefit_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	// delete Grade Setting constant record > table
	public function delete_grade_setting()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_grade_setting_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_grade_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	// delete Grade Benefit Setting constant record > table
	public function delete_grade_benefit_setting()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			$get_grade = $this->Employees_model->get_employees_on_grade_benefit($id);
			$result = $this->Xin_model->delete_grade_benefit_setting_record($id);

			$get_employee = $this->Employees_model->get_employees_on_grade($get_grade[0]->grade_id);
			if (!empty($get_employee)) {
				foreach ($get_employee as $employee) {

					$employee_id = $employee->user_id;
					$grade_id = $employee->grade_id;
					$basic_salary = $employee->basic_salary;

					$this->Employees_model->insert_grade_data($employee_id, $grade_id, $basic_salary);
				}
			}
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_grade_benefit_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_promotion_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_promotion_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_promotion_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_warning_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_warning_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_warning_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_termination_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_termination_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_termination_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_expense_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_expense_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_expense_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_job_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_job_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_job_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_job_category()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_job_category_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_job_category_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}
	// delete constant record > table
	public function delete_security_level()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_security_level_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_security_level_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_exit_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_exit_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_exit_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_travel_arr_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_travel_arr_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_travel_arrtype_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_currency_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_currency_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_success_currency_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// delete constant record > table
	public function delete_company_type()
	{

		if ($this->input->post('type') == 'delete_record') {
			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$id = $this->uri->segment(4);
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$result = $this->Xin_model->delete_company_type_record($id);
			if (isset($id)) {
				$Return['result'] = $this->lang->line('xin_company_type_deleted');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
		}
	}

	// read and view all constants data > modal form
	public function constants_read()
	{
		$data['title'] = $this->Xin_model->site_title();
		$data['all_companies'] = $this->Xin_model->get_companies();
		$session = $this->session->userdata('username');
		if (!empty($session)) {
			$this->load->view('admin/settings/dialog_constants', $data);
		} else {
			redirect('admin/');
		}
	}

	/*  UPDATE RECORD > CONSTANTS*/

	// Validate and update info in database
	public function update_document_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_employee_error_d_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$title = $this->input->post('title') == 'on' ? 1 : 0;
			$address = $this->input->post('address') == 'on' ? 1 : 0;
			$no = $this->input->post('no') == 'on' ? 1 : 0;
			$create_date = $this->input->post('date_of_create') == 'on' ? 1 : 0;
			$expiry_date = $this->input->post('date_of_expiry') == 'on' ? 1 : 0;
			$email = $this->input->post('email') == 'on' ? 1 : 0;
			$file = $this->input->post('file') == 'on' ? 1 : 0;


			$data = array(
				'document_type' => $this->input->post('name'),
				'company_id' => $this->input->post('company'),
				'is_title' => $title,
				'is_address' => $address,
				'is_no' => $no,
				'is_create_date' => $create_date,
				'is_expiry_date' => $expiry_date,
				'is_notif_email' => $email,
				'is_file' => $file,
			);

			$result = $this->Xin_model->update_document_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_document_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_contract_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_employee_error_contract_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'name' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_contract_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_contract_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_payment_method()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_payment_method');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'method_name' => $this->input->post('name'),
				'payment_percentage' => $this->input->post('payment_percentage'),
				'account_number' => $this->input->post('account_number')
			);

			$result = $this->Xin_model->update_payment_method_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_payment_method_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_education_level()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_education_level');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'name' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_education_level_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_education_level_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_qualification_language()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_education_language');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'name' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_qualification_language_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_qualification_lang_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_qualification_skill()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_education_skill');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'name' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_qualification_skill_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_qualification_skill_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_award_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_award_error_award_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'award_type' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_award_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_award_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_leave_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_leave_type_field');
			} else if ($this->input->post('days_per_year') === '') {
				$Return['error'] = $this->lang->line('xin_error_days_per_year');
			} else if ($this->input->post('days_per_year') < 1) {
				$Return['error'] = $this->lang->line('xin_error_days_per_year_check_value');
			} else if ($this->input->post('days_per_month') === '') {
				$Return['error'] = $this->lang->line('xin_error_days_per_month');
			} else if ($this->input->post('days_per_month') > $this->input->post('days_per_year')) {
				$Return['error'] = $this->lang->line('xin_error_days_per_month_year');
			} else if ($this->input->post('days_per_year') < 1) {
				$Return['error'] = $this->lang->line('xin_error_days_per_month_check_value');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'type_name' => $this->input->post('name'),
				'days_per_year' => $this->input->post('days_per_year'),
				'days_per_month' => $this->input->post('days_per_month'),
				'is_carry_end_cash' => $this->input->post('carry_end_cash'),
				'is_paid_not' => $this->input->post('paid_not'),
			);

			$result = $this->Xin_model->update_leave_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_leave_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}
	public function update_salary_benefit()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('company_id_salb') === '') {
				$Return['error'] = $this->lang->line('xin_error_company_name_field');
			} else if ($this->input->post('salary_benefit_type') === '') {
				$Return['error'] = $this->lang->line('xin_error_salary_benefit_type_field');
			} else if ($this->input->post('salary_benefit_name') === '') {
				$Return['error'] = $this->lang->line('xin_error_salary_benefit_name');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'salary_benefit_type' => $this->input->post('salary_benefit_type'),
				'salary_benefit_name' => $this->input->post('salary_benefit_name'),
			);

			$result = $this->Xin_model->update_salary_benefit_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_salary_benefit_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Update Grade Setting
	public function update_gade_setting()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('company_id') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_comnpany_name_field');
			} else if ($this->input->post('grade_name') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_name_field');
			} else if ($this->input->post('grade_range_from') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_range_from_field');
			} else if ($this->input->post('grade_range_to') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_range_to_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'company_id' => $this->input->post('company_id'),
				'grade_name' => $this->input->post('grade_name'),
				'grade_range_from' => $this->input->post('grade_range_from'),
				'grade_range_to' => $this->input->post('grade_range_to'),
			);
			$result = $this->Xin_model->update_grade_setting_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_grade_setting_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}
	public function update_gade_benefit_setting()
	{
		if ($this->input->post('type') == 'edit_record') {


			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('company_id') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_comnpany_name_field');
			} else if ($this->input->post('grade_name') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_name_field');
			} else if ($this->input->post('grade_range_from') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_range_from_field');
			} else if ($this->input->post('grade_range_to') === '') {
				$Return['error'] = $this->lang->line('xin_error_grade_setting_range_to_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}
			if ($this->input->post('salary_amount_type') !== '') {
				$salary_amount_type = $this->input->post('salary_amount_type');
			} else {
				$salary_amount_type = 1;
			}
			$data = array(
				'company_id' => $this->input->post('company_id_aj_d'),
				'grade_id' => $this->input->post('grade_id_d'),
				'grade_benefit_type' => $this->input->post('benefit_type_aj_d'),
				'benefit_id' => $this->input->post('benefit_name_aj'),
				'grade_amount_type' => $this->input->post('amount_type'),
				'salary_amount_type' => $salary_amount_type,
				'grade_amount' => $this->input->post('grade_amount'),
			);
			$result = $this->Xin_model->update_grade_benefit_setting_record($data, $id);


			$get_employee = $this->Employees_model->get_employees_on_grade($this->input->post('grade_id_d'));
			foreach ($get_employee as $employee) {

				$employee_id = $employee->user_id;
				$grade_id = $employee->grade_id;
				$basic_salary = $employee->basic_salary;

				$this->Employees_model->insert_grade_data($employee_id, $grade_id, $basic_salary);
				// $this->Employees_model->parth($employee_id, $grade_id, $basic_salary, $salary_amount_type);
			}


			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_grade_setting_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	public function update_promotion_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('company_id') === '') {
				$Return['error'] = $this->lang->line('xin_error_company_name_field');
			} else if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_employee_error_promotion_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'company_id' => $this->input->post('company_id'),
				'name' => $this->input->post('name'),
			);

			$result = $this->Xin_model->update_promotion_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_salary_benefit_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}


	// Validate and update info in database
	public function update_warning_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_employee_error_warning_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'type' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_warning_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_warning_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_termination_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_termination_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'type' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_termination_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_termination_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_expense_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('company') === '') {
				$Return['error'] = $this->lang->line('error_company_field');
			} else if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_expense_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'company_id' => $this->input->post('company'),
				'name' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_expense_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_expense_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_job_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_jobpost_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'type' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_job_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_job_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_job_category()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('job_category') === '') {
				$Return['error'] = $this->lang->line('xin_error_job_category');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'category_name' => $this->input->post('job_category')
			);

			$result = $this->Xin_model->update_job_category_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_job_category_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_exit_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_exit_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'type' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_exit_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_exit_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_travel_arr_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_travel_arrangment_type');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'type' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_travel_arr_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_travel_arrtype_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_company_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_ctype_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'name' => $this->input->post('name')
			);

			$result = $this->Xin_model->update_company_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_company_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}
	// Validate and update info in database
	public function update_security_level()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('security_level') === '') {
				$Return['error'] = $this->lang->line('xin_error_security_level_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(
				'name' => $this->input->post('security_level')
			);

			$result = $this->Xin_model->update_security_level_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_security_level_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}

	// Validate and update info in database
	public function update_currency_type()
	{

		if ($this->input->post('type') == 'edit_record') {

			$id = $this->uri->segment(4);

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();

			/* Server side PHP input validation */
			if ($this->input->post('name') === '') {
				$Return['error'] = $this->lang->line('xin_error_currency_name_field');
			} else if ($this->input->post('code') === '') {
				$Return['error'] = $this->lang->line('xin_error_currency_code_field');
			} else if ($this->input->post('symbol') === '') {
				$Return['error'] = $this->lang->line('xin_error_currency_symbol_field');
			}

			if ($Return['error'] != '') {
				$this->output($Return);
			}

			$data = array(

				'name' => $this->input->post('name'),
				'code' => $this->input->post('code'),
				'symbol' => $this->input->post('symbol')
			);

			$result = $this->Xin_model->update_currency_type_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_success_currency_type_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}
	// Validate and update info in database
	public function update_payment_gateway()
	{

		if ($this->input->post('type') == 'payment_gateway') {

			/* Define return | here result is used to return user data and error for error message */
			$Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
			$Return['csrf_hash'] = $this->security->get_csrf_hash();
			$id = 1;

			$data = array(
				'paypal_email' => $this->input->post('paypal_email'),
				'paypal_sandbox' => $this->input->post('paypal_sandbox'),
				'paypal_active' => $this->input->post('paypal_active'),
				'stripe_secret_key' => $this->input->post('stripe_secret_key'),
				'stripe_publishable_key' => $this->input->post('stripe_publishable_key'),
				'stripe_active' => $this->input->post('stripe_active'),
				'online_payment_account' => $this->input->post('bank_cash_id'),
			);

			$result = $this->Xin_model->update_setting_info_record($data, $id);

			if ($result == TRUE) {
				$Return['result'] = $this->lang->line('xin_acc_payment_gateway_info_updated');
			} else {
				$Return['error'] = $this->lang->line('xin_error_msg');
			}
			$this->output($Return);
			exit;
		}
	}


	// Ajax

	public function get_grade()
	{
		$data['title'] = $this->Xin_model->site_title();
		$keywords = preg_split("/[\s,]+/", $this->uri->segment(4));
		if (is_numeric($keywords[0])) {
			$id = $keywords[0];

			$data = array(
				'company_id' => $id
			);
			$session = $this->session->userdata('username');
			if (!empty($session)) {
				$data = $this->security->xss_clean($data);
				$this->load->view("admin/settings/get_grade", $data);
			} else {
				redirect('admin/setting');
			}
		}
	}
	public function get_grade_d()
	{
		$data['title'] = $this->Xin_model->site_title();
		$keywords = preg_split("/[\s,]+/", $this->uri->segment(4));
		$keywords1 = preg_split("/[\s,]+/", $this->uri->segment(5));
		if (is_numeric($keywords[0])) {
			$id = $keywords[0];
			$grade_id = $keywords1[0];
			$data = array(
				'company_id' => $id,
				'grade_id' => $grade_id
			);
			$session = $this->session->userdata('username');
			if (!empty($session)) {
				$data = $this->security->xss_clean($data);
				$this->load->view("admin/settings/get_grade_dialog", $data);
			} else {
				redirect('admin/setting');
			}
		} else {
			$data = array(
				'company_id' => 0,
			);
			$session = $this->session->userdata('username');
			if (!empty($session)) {
				$data = $this->security->xss_clean($data);
				$this->load->view("admin/settings/get_grade_dialog", $data);
			} else {
				redirect('admin/setting');
			}
		}
	}

	public function get_benefits()
	{
		$data['title'] = $this->Xin_model->site_title();
		$keywords = preg_split("/[\s,]+/", $this->uri->segment(4));
		$keywords2 = preg_split("/[\s,]+/", $this->uri->segment(5));
		if (is_numeric($keywords[0])) {
			$id = $keywords[0];
			$g_id = $keywords2[0];

			$data = array(
				'company_id' => $g_id,
				'benefit_type_id' => $id
			);
			$session = $this->session->userdata('username');
			if (!empty($session)) {
				$data = $this->security->xss_clean($data);
				$this->load->view("admin/settings/get_benefits", $data);
			} else {
				redirect('admin/setting');
			}
		}
	}
	public function get_benefits_d()
	{
		$data['title'] = $this->Xin_model->site_title();
		$keywords = preg_split("/[\s,]+/", $this->uri->segment(4)); // Benefit Type
		$keywords1 = preg_split("/[\s,]+/", $this->uri->segment(6)); // Grade Id
		$keywords2 = preg_split("/[\s,]+/", $this->uri->segment(5)); // Company Id
		$keywords3 = preg_split("/[\s,]+/", $this->uri->segment(7)); // Benefit Name 
		if (is_numeric($keywords[0])) {
			$id = $keywords[0];
			$g_id = $keywords1[0];
			$c_id = $keywords2[0];
			$b_name = $keywords3[0];
			$data = array(
				'company_id' => $c_id,
				'grade_id' => $g_id,
				'benefit_type_id' => $id,
				'benefit_name' => $b_name
			);
			$session = $this->session->userdata('username');
			if (!empty($session)) {
				$data = $this->security->xss_clean($data);
				$this->load->view("admin/settings/get_benefit_dialog", $data);
			} else {
				redirect('admin/setting');
			}
		}
	}
}

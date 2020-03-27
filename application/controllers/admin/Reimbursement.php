<?php

/**
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the HRSALE licence
 * that is bundled with this packege in the file license.txt.
 * It is also available through the world-wide-web ar this URL:
 * http://wwww.hesale.com/license.txt
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to hrsale@gmail.com so we can send you a copy immediately.
 * 
 * @author HRSALE
 * @author-email hrsalesoft@gmail.com
 * @copyright Copyright © hrsale.com. All Rights Reserved
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Reimbursement extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load the model
        $this->load->model("Department_model");
        $this->load->model("Reimbursement_model");
        $this->load->model("Xin_model");
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

    public function  index()
    {
        $session = $this->session->userdata('username');
        if (empty($session)) {
            redirect('admin/');
        }
        $data['title'] = $this->lang->line('left_reimbursement') . ' | ' . $this->Xin_model->site_title();
        $data['breadcrumbs'] = $this->lang->line('left_reimbursement');
        $data['all_employees'] = $this->Xin_model->all_employees();
        $data['get_all_companies'] = $this->Xin_model->get_companies();
        $data['path_url'] = 'reimbursement';
        $role_resources_ids = $this->Xin_model->user_role_resource();
        if (in_array('444', $role_resources_ids)) {
            if (!empty($session)) {
                $data['subview'] = $this->load->view("admin/reimbursement/reimbursement_list", $data, TRUE);
                $this->load->view('admin/layout/layout_main', $data); //page load
            } else {
                redirect('admin/');
            }
        } else {
            redirect('admin/dashboard');
        }
    }

    // get company employees
    public function get_employees()
    {

        $data['title'] = $this->Xin_model->site_title();
        $id = $this->uri->segment(4);

        $data = array(
            'company_id' => $id
        );
        $session = $this->session->userdata('username');
        if (!empty($session)) {
            $this->load->view("admin/reimbursement/get_employees", $data);
        } else {
            redirect('admin/');
        }
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
    }


    public function add_reimbursement()
    {
        if ($this->input->post('add_type') == 'reimbursement') {

            $Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
            $Return['csrf_hash'] = $this->security->get_csrf_hash();
            /* Server side PHP input validation */
            // print_r('ok');die;
            $description = $this->input->post('description');
            $qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
            if ($this->input->post('company_id') === '') {
                $Return['error'] = $this->lang->line('error_company_field');
            } else if ($this->input->post('employee_id') === '') {
                $Return['error'] = $this->lang->line('xin_error_employee_id');
            } else if ($this->input->post('reimbursement_date') === '') {
                $Return['error'] = $this->lang->line('xin_error_reimbursement_date');
            } else if ($this->input->post('amount') === '') {
                $Return['error'] = $this->lang->line('xin_error_amount');
            } else {
                if (is_uploaded_file($_FILES['reimbursement_file']['tmp_name'])) {
                    $allowed =  array('png', 'jpg', 'jpeg', 'pdf', 'gif');
                    $filename = $_FILES['reimbursement_file']['name'];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);

                    if (in_array($ext, $allowed)) {
                        $tmp_name = $_FILES["reimbursement_file"]["tmp_name"];
                        $profile = "uploads/reimbursement/";
                        $set_img = base_url() . "uploads/reimbursement/";
                        $name = basename($_FILES["reimbursement_file"]["name"]);
                        $newfilename = 'reimbursement_' . round(microtime(true)) . '.' . $ext;
                        move_uploaded_file($tmp_name, $profile . $newfilename);
                        $fname = $newfilename;
                    } else {
                        $Return['error'] = $this->lang->line('xin_error_attatchment_type');
                    }
                } else {
                    $fname = '';
                }
            }

            if ($Return['error'] != '') {
                $this->output($Return);
            }
            $user_info = $this->Xin_model->read_user_info($this->input->post('user_id'));
            $role_resources_ids = $this->Xin_model->user_role_resource();
            $session = $this->session->userdata('username');

            if ($user_info[0]->user_role_id == 1 || !in_array('444', $role_resources_ids)) {
                $employee_id = $this->input->post('employee_id');
                $company_id =  $this->input->post('company_id');
            } else {

                $employee_id = $session['user_id'];
                $company_id = $session['company_id'];
            }
            $data = array(
                'company_id' => $company_id,
                'employee_id' => $employee_id,
                'reimbursement_date' => $this->input->post('reimbursement_date'),
                'amount' => $this->input->post('amount'),
                'reimbursement_doc' => $fname,
                'description' => $qt_description,
                'status' => '1',
            );
            $result = $this->Reimbursement_model->add($data);
            if ($result == TRUE) {
                $Return['result'] = $this->lang->line('xin_success_termination_added');
            } else {
                $Return['error'] = $this->lang->line('xin_error_msg');
            }
            $this->output($Return);
            exit;
        }
    }
    public function read()
    {
        $data['title'] = $this->Xin_model->site_title();
        $id = $this->input->get('reimbursement_id');
        $result = $this->Reimbursement_model->read_reimbursement_information($id);

        $data = array(
            'id' => $result[0]->id,
            'company_id' => $result[0]->company_id,
            'employee_id' => $result[0]->employee_id,
            'reimbursement_date' => $result[0]->reimbursement_date,
            'reimbursement_doc' => $result[0]->reimbursement_doc,
            'amount' => $result[0]->amount,
            'description' => $result[0]->description,
            'status' => $result[0]->status,
            'all_employees' => $this->Xin_model->all_employees(),
            'get_all_companies' => $this->Xin_model->get_companies(),
        );
        $session = $this->session->userdata('username');
        if (!empty($session)) {
            $this->load->view('admin/reimbursement/dialog_reimbursement', $data);
        } else {
            redirect('admin/');
        }
    }
    public function reimbursement_list()
    {
        $data['title'] = $this->Xin_model->site_title();
        $session = $this->session->userdata('username');
        if (!empty($session)) {
            $this->load->view("admin/termination/termination_list", $data);
        } else {
            redirect('admin/');
        }
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $role_resources_ids = $this->Xin_model->user_role_resource();
        $user_info = $this->Xin_model->read_user_info($session['user_id']);
        if ($user_info[0]->user_role_id == 1) {
            $reimbursement = $this->Reimbursement_model->get_reimbursement();
        } else {
            if (in_array('448', $role_resources_ids)) {
                $reimbursement = $this->Reimbursement_model->get_company_reimbursement($user_info[0]->company_id);
            } else {
                $reimbursement = $this->Reimbursement_model->get_employee_reimbursement($session['user_id']);
            }
        }

        $data = array();

        foreach ($reimbursement->result() as $r) {
            $euser = $this->Xin_model->read_user_info($r->employee_id);
            // user full name
            if (!is_null($euser)) {
                $ful_name = $euser[0]->first_name . ' ' . $euser[0]->last_name;
            } else {
                $ful_name = '--';
            }

            if ($r->status == 1) : $status = '<span class="badge bg-orange">' . $this->lang->line('xin_pending') . '</span>';
            elseif ($r->status == 2) : $status = '<span class="badge bg-green">' . $this->lang->line('xin_accepted') . '</span>';
            else : $status = '<span class="badge bg-red">' . $this->lang->line('xin_rejected') . '</span>';
            endif;



            $company = $this->Xin_model->read_company_info($r->company_id);
            if (!is_null($company)) {
                $comp_name = $company[0]->name;
            } else {
                $comp_name = '--';
            }

            $reimbursement_date = $this->Xin_model->set_date_format($r->reimbursement_date);
            $amount =  $this->Xin_model->currency_sign($r->amount);

            if (in_array('446', $role_resources_ids)) { //edit
                $edit = '<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_edit') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light"  data-toggle="modal" data-target=".edit-modal-data"  data-reimbursement_id="' . $r->id . '"><span class="fa fa-pencil"></span></button></span>';
            } else {
                $edit = '';
            }
            if (in_array('447', $role_resources_ids)) { // delete
                $delete = '<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_delete') . '"><button type="button" class="btn icon-btn btn-xs btn-danger waves-effect waves-light delete" data-toggle="modal" data-target=".delete-modal" data-record-id="' . $r->id . '"><span class="fa fa-trash"></span></button></span>';
            } else {
                $delete = '';
            }
            if (in_array('448', $role_resources_ids)) { //view
                $view = '<span data-toggle="tooltip" data-placement="top" title="' . $this->lang->line('xin_view') . '"><button type="button" class="btn icon-btn btn-xs btn-default waves-effect waves-light" data-toggle="modal" data-target=".view-modal-data" data-reimbursement_id="' . $r->id . '"><span class="fa fa-eye"></span></button></span>';
            } else {
                $view = '';
            }

            $iful_name = $ful_name . '<br><small class="text-muted"><i>' . $status . '<i></i></i></small>';

            $combhr = $edit . $view . $delete;

            $data[] = array(
                $combhr,
                $iful_name,
                $comp_name,
                $reimbursement_date,
                $amount,
            );
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $reimbursement->num_rows(),
            "recordsFiltered" => $reimbursement->num_rows(),
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }

    public function update()
    {
        if ($this->input->post('edit_type') == 'reimbursement') {

            $id = $this->uri->segment(4);
            $data = '';
            /* Define return | here result is used to return user data and error for error message */
            $Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
            $Return['csrf_hash'] = $this->security->get_csrf_hash();

            /* Server side PHP input validation */

            $description = $this->input->post('description');
            $qt_description = htmlspecialchars(addslashes($description), ENT_QUOTES);
            if ($this->input->post('company_id') === '') {
                $Return['error'] = $this->lang->line('error_company_field');
            } else if ($this->input->post('employee_id') === '') {
                $Return['error'] = $this->lang->line('xin_error_employee_id');
            } else if ($this->input->post('reimbursement_date') === '') {
                $Return['error'] = $this->lang->line('xin_error_reimbursement_date');
            } else if ($this->input->post('amount') === '') {
                $Return['error'] = $this->lang->line('xin_error_amount');
            }
            

            if ($Return['error'] != '') {
                $this->output($Return);
            }
            $session = $this->session->userdata('username');
            $user_info = $this->Xin_model->read_user_info($session['user_id']);
            $role_resources_ids = $this->Xin_model->user_role_resource();

            if ($user_info[0]->user_role_id == 1 || !in_array('444', $role_resources_ids)) {
                $employee_id = $this->input->post('employee_id');
                $company_id =  $this->input->post('company_id');
            } else {

                $employee_id = $session['user_id'];
                $company_id = $session['company_id'];
            }
            $result = '';
            if ($_FILES['reimbursement_file']['size'] == 0) {

                $data = array(
                    'company_id' => $company_id,
                    'employee_id' => $employee_id,
                    'reimbursement_date' => $this->input->post('reimbursement_date'),
                    'amount' => $this->input->post('amount'),
                    'description' => $qt_description,
                    'status' => $this->input->post('status'),
                );
            } else {
                if (is_uploaded_file($_FILES['reimbursement_file']['tmp_name'])) {
                    $allowed =  array('png', 'jpg', 'jpeg', 'gif');
                    $filename = $_FILES['reimbursement_file']['name'];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (in_array($ext, $allowed)) {
                        $tmp_name = $_FILES["reimbursement_file"]["tmp_name"];
                        $bill_copy = "uploads/reimbursement/";
                        // basename() may prevent filesystem traversal attacks;
                        // further validation/sanitation of the filename may be appropriate
                        $lname = basename($_FILES["reimbursement_file"]["name"]);
                        $newfilename = 'reimbursement__' . round(microtime(true)) . '.' . $ext;
                        move_uploaded_file($tmp_name, $bill_copy . $newfilename);
                        $fname = $newfilename;
                       
                        $data = array(
                            'company_id' => $company_id,
                            'employee_id' => $employee_id,
                            'reimbursement_date' => $this->input->post('reimbursement_date'),
                            'amount' => $this->input->post('amount'),
                            'reimbursement_doc' => $fname,
                            'description' => $qt_description,
                            'status' => $this->input->post('status'),
                        );
                       
                    }
                }
            }
            $result = $this->Reimbursement_model->update_record($data, $id);
            if ($result == TRUE) {
                $Return['result'] = $this->lang->line('xin_success_reimbursement_updated');
            } else {
                $Return['error'] = $this->lang->line('xin_error_msg');
            }
            $this->output($Return);
            exit;
        }
    }

    public function delete()
    {
        /* Define return | here result is used to return user data and error for error message */
        $Return = array('result' => '', 'error' => '', 'csrf_hash' => '');
        $id = $this->uri->segment(4);
        $Return['csrf_hash'] = $this->security->get_csrf_hash();
        $result = $this->Reimbursement_model->delete_record($id);
        if (isset($id)) {
            $Return['result'] = $this->lang->line('xin_success_reimbursement_deleted');
        } else {
            $Return['error'] = $this->lang->line('xin_error_msg');
        }
        $this->output($Return);
    }
}

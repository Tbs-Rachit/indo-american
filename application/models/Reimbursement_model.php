<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reimbursement_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_reimbursement()
	{
		return $this->db->get("xin_reimbursement");
	}

	public function add($data)
	{
		$this->db->insert('xin_reimbursement', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_company_reimbursement($company_id)
	{

		$sql = 'SELECT * FROM xin_reimbursement WHERE company_id = ?';
		$binds = array($company_id);
		$query = $this->db->query($sql, $binds);
		return $query;
	}

	public function get_employee_reimbursement($id)
	{

		$sql = 'SELECT * FROM xin_reimbursement WHERE employee_id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);
		return $query;
	}

	public function read_reimbursement_information($id)
	{

		$sql = 'SELECT * FROM xin_reimbursement WHERE id = ?';
		$binds = array($id);
		$query = $this->db->query($sql, $binds);

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return null;
		}
	}

	// Function to update record in table
	public function update_record($data, $id)
	{
		$this->db->where('id', $id);
		if ($this->db->update('xin_reimbursement', $data)) {
			return true;
		} else {
			return false;
		}
	}

		// Function to Delete selected record from table
		public function delete_record($id){
			$this->db->where('id', $id);
			$this->db->delete('xin_reimbursement');
			
		}
}

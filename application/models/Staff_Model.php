<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	 * Staff Model
	 */
	class Staff_Model extends CI_Model
	{
		public function create_staff($formArray)
		{
			$this->db->insert('tbl_staff', $formArray);
		}

		public function fetch_all_staff()
		{
			$this->db->select('*');
			$this->db->from('tbl_staff');
			$this->db->join('tbl_branch', 'tbl_branch.branch_id = tbl_staff.branch_id', 'left');
			$staff = $this->db->get();
			return $staff->result();
		}

		public function fetch_single_staff($staff_id)
		{
			$this->db->where('staff_id', $staff_id);
			return $staff = $this->db->get('tbl_staff')->row();
		}

		public function update_staff($staff_id, $formArray)
		{
			$this->db->where('staff_id', $staff_id);
			$this->db->update('tbl_staff', $formArray);
		}

		public function delete_staff($staff_id)
		{
			$this->db->where('staff_id', $staff_id);
			$this->db->delete('tbl_staff');
		}
	}
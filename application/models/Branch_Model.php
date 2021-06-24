<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Branch Class
	 */
	class Branch_Model extends CI_Model
	{
		public function create_branch($formArray)
		{
			$this->db->insert('tbl_branch', $formArray);
		}

		public function fetch_all_branch()
		{
			$this->db->select('*');
			$this->db->from('tbl_branch');
			$this->db->join('tbl_area', 'tbl_area.area_id = tbl_branch.area_id', 'left');
			$branch = $this->db->get();
			return $branch->result();
		}

		public function fetch_single_branch($branch_id)
		{
			$this->db->where('branch_id', $branch_id);
			return $branch = $this->db->get('tbl_branch')->row();
		}

		public function update_branch($branch_id, $formArray)
		{
			$this->db->where('branch_id', $branch_id);
			$this->db->update('tbl_branch', $formArray);
		}
	}
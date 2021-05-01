<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * Operations Model
	 */
	class Operations_Model extends CI_Model
	{
		public function create_staff($formArray)
		{
			$this->db->insert('tbl_staff', $formArray);
		}

		public function fetch_all_staff()
		{
			return $staff = $this->db->get('tbl_staff')->result();
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

		public function create_branch($formArray)
		{
			$this->db->insert('tbl_branch', $formArray);
		}

		public function fetch_all_branch()
		{
			return $branch = $this->db->get('tbl_branch')->result();
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

		public function create_area($formArray)
		{
			$this->db->insert('tbl_area', $formArray);
		}

		public function fetch_all_area()
		{
			return $area = $this->db->get('tbl_area')->result();
		}

		public function update_area($area_id, $formArray)
		{
			$this->db->where('area_id', $area_id);
			$this->db->update('tbl_area', $formArray);
		}

		public function fetch_single_area($area_id)
		{
			$this->db->where('area_id', $area_id);
			return $area = $this->db->get('tbl_area')->row();
		}

		public function delete_area($area_id)
		{
			$this->db->where('area_id', $area_id);
			$this->db->delete('tbl_area');
		}

	}
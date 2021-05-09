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

		public function create_voip($formArray)
		{
			$this->db->insert('tbl_voip', $formArray);
		}

		public function fetch_all_voip()
		{
			return $voip = $this->db->get('tbl_voip')->result();
		}

		public function fetch_single_voip($voip_id)
		{
			$this->db->where('voip_id', $voip_id);
			return $voip = $this->db->get('tbl_voip')->row();
		}

		public function update_voip($voip_id, $formArray)
		{
			$this->db->where('voip_id', $voip_id);
			$this->db->update('tbl_voip', $formArray);
		}

		public function create_internet($formArray)
		{
			$this->db->insert('tbl_internet', $formArray);
		}

		public function fetch_all_internet_plan()
		{
			return $net = $this->db->get('tbl_internet')->result();
		}

		public function fetch_single_internet_plan($plan_id)
		{
			$this->db->where('plan_id', $plan_id);
			return $net = $this->db->get('tbl_internet')->row();
		}

		public function update_internet($plan_id, $formArray)
		{
			$this->db->where('plan_id', $plan_id);
			$this->db->update('tbl_internet', $formArray);
		}

		public function delete_internet($plan_id)
		{
			$this->db->where('plan_id', $plan_id);
			$this->db->delete('tbl_internet');
		}

		public function create_user($formArray)
		{
			$this->db->insert('tbl_user', $formArray);
		}

		public function fetch_all_user()
		{
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->join('tbl_area', 'tbl_area.area_id = tbl_user.area_id', 'left');
			$user = $this->db->get();
			return $user->result();
		}

		public function fetch_profile_detail($user_id)
		{
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->join('tbl_area', 'tbl_area.area_id = tbl_user.area_id', 'left');
			$this->db->where('user_id', $user_id);
			$user = $this->db->get();
			return $user->row();
		}

	}
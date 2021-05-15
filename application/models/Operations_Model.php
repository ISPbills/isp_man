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

		public function create_package($formArray)
		{
			$this->db->insert('tbl_cable', $formArray);
		}

		public function fetch_all_package()
		{
			return $cable = $this->db->get('tbl_cable')->result();
		}

		public function create_user($formArray)
		{
			$this->db->insert('tbl_user', $formArray);
		}

		public function fetch_all_user()
		{
			// Mock Query
			// select * from tbl_services sr
			// right join tbl_user us on us.user_id = sr.user_id
			// left join tbl_internet it on it.plan_id = sr.plan_id
			// left join tbl_voip vp on vp.voip_id = sr.voip_id
			// left join tbl_area ar on ar.area_id = us.area_id
			// group by us.user_id

			$fields = array(
							'tbl_user.user_id',
							'tbl_user.username',
							'tbl_user.first_name',
							'tbl_user.last_name',
							'tbl_user.contact_no',
							'tbl_user.email',
							'tbl_user.bill_address',
							'tbl_user.user_status',
							'tbl_area.area_name',
							'tbl_internet.plan_id',
							'tbl_internet.plan_name',
							'tbl_voip.voip_id'
							);

			$this->db->select($fields);
			$this->db->from('tbl_services');
			$this->db->join('tbl_user', 'tbl_user.user_id = tbl_services.user_id', 'right');
			$this->db->join('tbl_internet', 'tbl_internet.plan_id = tbl_services.plan_id', 'left');
			$this->db->join('tbl_voip', 'tbl_voip.voip_id = tbl_services.voip_id', 'left');
			$this->db->join('tbl_area', 'tbl_area.area_id = tbl_user.area_id', 'left');
			$this->db->group_by('tbl_user.user_id');
			$user = $this->db->get();
			return $user->result();
		}

		public function fetch_profile_detail($user_id) // Left Quick Summary Section
		{
			// Mock Query
			// select * from tbl_services sr
			// right join tbl_user us on us.user_id = sr.user_id
			// left join tbl_internet it on it.plan_id = sr.plan_id
			// left join tbl_voip vp on vp.voip_id = sr.voip_id
			// left join tbl_area ar on ar.area_id = us.area_id

			$this->db->select('*');
			$this->db->from('tbl_services');
			$this->db->join('tbl_user', 'tbl_user.user_id = tbl_services.user_id', 'right');
			$this->db->join('tbl_area', 'tbl_area.area_id = tbl_user.area_id', 'left');
			$this->db->join('tbl_area', 'tbl_area.area_id = tbl_user.area_id', 'left');
			$this->db->join('tbl_area', 'tbl_area.area_id = tbl_user.area_id', 'left');
			$this->db->where('user_id', $user_id);
			$user = $this->db->get();
			return $user->row();
		}

		public function assign_plan($formArray)
		{
			$this->db->insert('tbl_services', $formArray);
		}

	}
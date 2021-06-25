<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	 * User Model
	 */
	class User_Model extends CI_Model
	{
		public function create_user($formArray)
		{
			$this->db->insert('tbl_user', $formArray);
		}

		public function fetch_user_stb($user_id)
		{
			$this->db->select('*');
			$this->db->from('tbl_services');
			$this->db->join('tbl_user', 'tbl_user.user_id = tbl_services.user_id', 'right');
			$this->db->join('tbl_stb', 'tbl_stb.stb_id = tbl_services.stb_id', 'left');
			$this->db->join('tbl_cable', 'tbl_cable.pack_id = tbl_stb.pack_id', 'left');
			$this->db->where('tbl_services.user_id', $user_id);
			$stb = $this->db->get();
			return $stb->result();

		}

		public function additional_stb($formArray)
		{
			$this->db->insert('tbl_services', $formArray);
		}

		public function fetch_all_user()
		{
			$fields = array(
							'tbl_user.user_id',
							'count(tbl_services.plan_id) as net',
							'count(tbl_services.voip_id) as voip',
							'count(tbl_services.stb_id) as cable',
							'tbl_user.username',
							'tbl_user.first_name',
							'tbl_user.last_name',
							'tbl_user.contact_no',
							'tbl_user.email',
							'tbl_user.bill_address',
							'tbl_user.user_status',
							'tbl_area.area_name',
							'tbl_internet.plan_name'
							);

			$this->db->select($fields);
			$this->db->from('tbl_services');
			$this->db->join('tbl_user', 'tbl_user.user_id = tbl_services.user_id', 'right');
			$this->db->join('tbl_internet', 'tbl_internet.plan_id = tbl_services.plan_id', 'left');
			$this->db->join('tbl_voip', 'tbl_voip.voip_id = tbl_services.voip_id', 'left');
			$this->db->join('tbl_stb', 'tbl_stb.stb_id = tbl_services.stb_id', 'left');
			$this->db->join('tbl_area', 'tbl_area.area_id = tbl_user.area_id', 'left');
			$this->db->group_by('tbl_user.user_id',
								'tbl_user.username',
								'tbl_user.first_name',
								'tbl_user.last_name',
								'tbl_user.contact_no',
								'tbl_user.email',
								'tbl_user.bill_address',
								'tbl_user.user_status',
								'tbl_area.area_name',
								'tbl_internet.plan_name');
			$user = $this->db->get();
			return $user->result();
		}

		public function fetch_profile_detail($user_id) // Left Side Profile Strip
		{
			$fields = array(
							'tbl_user.user_id',
							'tbl_user.username',
							'tbl_user.first_name',
							'tbl_user.last_name',
							'tbl_user.contact_no',
							'tbl_user.bill_address',
							'tbl_area.area_name',
							'tbl_services.plan_id',
							'tbl_internet.plan_name',
							'tbl_internet.plan_rate',
							'tbl_services.voip_id',
							'tbl_voip.voip_no',
							'tbl_services.stb_id',
							'tbl_stb.stb_no',
							'tbl_cable.pack_name'
							);

			$this->db->select($fields);
			$this->db->from('tbl_services');
			$this->db->join('tbl_user', 'tbl_user.user_id = tbl_services.user_id', 'right');
			$this->db->join('tbl_internet', 'tbl_internet.plan_id = tbl_services.plan_id', 'left');
			$this->db->join('tbl_voip', 'tbl_voip.voip_id = tbl_services.voip_id', 'left');
			$this->db->join('tbl_stb', 'tbl_stb.stb_id = tbl_services.stb_id', 'left');
			$this->db->join('tbl_cable', 'tbl_cable.pack_id = tbl_cable.pack_id', 'left');
			$this->db->join('tbl_area', 'tbl_area.area_id = tbl_user.area_id', 'left');
			$this->db->where('tbl_user.user_id', $user_id);
			$user = $this->db->get();
			return $user->row();
		}

		public function fetch_user_services()
		{
			
		}

		public function assign_plan($services, $charges)
		{
			$this->db->insert('tbl_services', $services);
			$this->db->insert('tbl_charges', $charges);
		}
	}
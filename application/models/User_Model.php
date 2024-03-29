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

		public function fetch_all_user()
		{
			$fields = array(
							'tbl_services.service_id',
							'tbl_user.user_id',
							'count(tbl_services.plan_id) as net',
							'count(tbl_services.voip_id) as voip',
							'count(tbl_services.stb_id) as cable',
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

		public function fetch_user_detail($user_id) // Left Side Profile Strip
		{
			$this->db->select('*');
			$this->db->from('tbl_user');
			$this->db->join('tbl_area', 'tbl_area.area_id = tbl_user.area_id', 'left');
			$this->db->where('tbl_user.user_id', $user_id);
			$user = $this->db->get();
			return $user->row();
		}

		public function fetch_user_stb($user_id)
		{
			$this->db->select('*');
			$this->db->from('tbl_services');
			$this->db->join('tbl_user', 'tbl_user.user_id = tbl_services.user_id', 'right');
			$this->db->join('tbl_stb', 'tbl_stb.stb_id = tbl_services.stb_id', 'right');
			$this->db->join('tbl_cable', 'tbl_cable.pack_id = tbl_stb.pack_id', 'right');
			$this->db->where('tbl_services.user_id', $user_id);
			$this->db->group_by('tbl_services.stb_id');
			$stb = $this->db->get();
			return $stb->result();
		}

		public function fetch_user_net($user_id)
		{
			$this->db->select('*');
			$this->db->from('tbl_services');
			$this->db->join('tbl_user', 'tbl_user.user_id = tbl_services.user_id', 'left');
			$this->db->join('tbl_internet', 'tbl_internet.user_id = tbl_services.user_id', 'right');
			$this->db->where('tbl_services.user_id', $user_id);
			$this->db->group_by('tbl_services.user_id');
			$net = $this->db->get();
			return $net->result();
		}

		public function add_cable($services, $charges)
		{
			$this->db->insert('tbl_services', $services);
			$this->db->insert('tbl_cable_info', $charges);
		}

		public function add_net($services, $charges)
		{
			$this->db->insert('tbl_services', $services);
			$this->db->insert('tbl_internet_info', $charges);
		}

		public function add_voip($services, $charges)
		{
			$this->db->insert('tbl_services', $services);
			$this->db->insert('tbl_voip_info', $charges);
		}

	}
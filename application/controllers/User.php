<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * Operations Controller
	 */
	class User extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->logged_id();
			$this->load->model('Operations_Model');
		}

		private function logged_id()
		{
			if(!$this->session->userdata('authenticated'))
			{
				redirect(base_url());
			}
		}

		public function user_list()
		{
			$data = array();
			$data['user'] = $this->Operations_Model->fetch_all_user();

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('user/user_list', $data);
			$this->load->view('layouts/footer');
		}

		public function create_user()
		{
			// For Area Dropdown
			$data = array();
			$data['area'] = $this->Operations_Model->fetch_all_area();

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('contact_no', 'Contact #', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
			$this->form_validation->set_rules('bill_address', 'Billing Address', 'required');
			$this->form_validation->set_rules('install_address', 'Installation Address', 'required');
			$this->form_validation->set_rules('area_id', 'Area', 'required');
			$this->form_validation->set_rules('user_status', 'User Status', 'required');
			$this->form_validation->set_rules('connection_type', 'Connection Type', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('user/create_user', $data);
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['username'] = $this->input->post('username');
				$formArray['password'] = $this->input->post('password');
				$formArray['first_name'] = $this->input->post('first_name');
				$formArray['last_name'] = $this->input->post('last_name');
				$formArray['contact_no'] = $this->input->post('contact_no');
				$formArray['email'] = $this->input->post('email');
				$formArray['bill_address'] = $this->input->post('bill_address');
				$formArray['install_address'] = $this->input->post('install_address');
				$formArray['area_id'] = $this->input->post('area_id');
				$formArray['business_name'] = $this->input->post('business_name');
				$formArray['business_gst'] = $this->input->post('business_gst');
				$formArray['user_status'] = $this->input->post('user_status');
				$formArray['connection_type'] = $this->input->post('connection_type');

				$this->Operations_Model->create_user($formArray);
				$this->session->set_flashdata('success', 'User Added Successfully');
				redirect(base_url('User/assign_plan/' . $this->db->insert_id()));
			}
		}

		public function assign_plan($user_id)
		{
			$data = array();
			$data['title'] = 'Assign Plan';
			$data['user'] = $this->Operations_Model->fetch_profile_detail($user_id);
			$data['net'] = $this->Operations_Model->fetch_all_internet_plan();
			$data['voip'] = $this->Operations_Model->fetch_all_voip();
			$data['stb'] = $this->Operations_Model->fetch_all_stb();
			$data['userstb'] = $this->Operations_Model->fetch_user_stb($user_id);

			$this->form_validation->set_rules('plan_id', 'Internet Plan', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('user/profile_base', $data);
				$this->load->view('user/profile_plan_add');
				$this->load->view('layouts/footer');
			}
			else
			{
				$services = array();
				$services['user_id'] = $user_id;
				$services['plan_id'] = $this->input->post('plan_id');
				$services['voip_id'] = !empty($this->input->post('voip_id')) ? $this->input->post('voip_id') : NULL;
				$services['stb_id'] = !empty($this->input->post('stb_id')) ? $this->input->post('stb_id') : NULL;
				
				$charges = array();
				$charges['user_id'] = $user_id;
				$charges['install_charge'] = $this->input->post('install_charge');
				$charges['install_refund'] = $this->input->post('install_refund');
				$charges['router_charge'] = $this->input->post('router_charge');
				$charges['router_refund'] = $this->input->post('router_refund');
				$charges['voip_charge'] = $this->input->post('voip_charge');
				$charges['voip_refund'] = $this->input->post('voip_refund');
				$charges['stb_charge'] = $this->input->post('stb_charge');
				$charges['stb_refund'] = $this->input->post('stb_refund');
				$charges['cable_wire'] = $this->input->post('cable_wire');

				$this->Operations_Model->assign_plan($services, $charges);
				$this->session->set_flashdata('success', 'Plan has successfully been assigned');
				redirect('User/assign_validity/' . $user_id);
			}
		}

		public function additional_stb($user_id)
		{
			$data = array();
			$data['title'] = 'Additional STB';
			$data['user'] = $this->Operations_Model->fetch_profile_detail($user_id);
			$data['stb'] = $this->Operations_Model->fetch_all_stb();
			$data['userstb'] = $this->Operations_Model->fetch_user_stb($user_id);

			$this->form_validation->set_rules('stb_id', 'STB #', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('user/profile_base', $data);
				$this->load->view('user/profile_additional_stb');
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['user_id'] = $user_id;
				$formArray['stb_id'] = $this->input->post('stb_id');
				$formArray['plan_id'] = NULL;
				$formArray['voip_id'] = NULL;

				$this->Operations_Model->additional_stb($formArray);
				$this->session->set_flashdata('success', 'STB has been Added Successfully');
				redirect('User/user_list');
			}

		}

		public function assign_validity($user_id)
		{
			$data = array();
			$data['title'] = 'Assign Validity';
			$data['user'] = $this->Operations_Model->fetch_profile_detail($user_id);
			$data['userstb'] = $this->Operations_Model->fetch_user_stb($user_id);

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('user/profile_base', $data);
			$this->load->view('user/profile_validity_add');
			$this->load->view('layouts/footer');
		}
	}
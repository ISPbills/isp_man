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
			$this->load->model('User_Model');
			$this->load->model('Area_Model');
			$this->load->model('Internet_Model');
			$this->load->model('Voip_Model');
			$this->load->model('Stb_Model');
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
			$data['user'] = $this->User_Model->fetch_all_user();

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('user/user_list', $data);
			$this->load->view('layouts/footer');
		}

		public function create_user()
		{
			// For Area Dropdown
			$data = array();
			$data['area'] = $this->Area_Model->fetch_all_area();

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

				$this->User_Model->create_user($formArray);
				$this->session->set_flashdata('success', 'User Added Successfully');
				redirect(base_url('assign_plan/' . $this->db->insert_id()));
			}
		}

		public function choose_service($user_id)
		{

			$data = array();
			$data['title'] = 'Assign Services';
			$data['user'] = $this->User_Model->fetch_user_detail($user_id);
			$data['net'] = $this->Internet_Model->fetch_all_internet_plan();
			$data['voip'] = $this->Voip_Model->fetch_all_voip();
			$data['stb'] = $this->Stb_Model->fetch_all_stb();
			$data['userstb'] = $this->User_Model->fetch_user_stb($user_id);

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('user/profile_base', $data);
			$this->load->view('user/choose_service');
			$this->load->view('layouts/footer');

		}

		public function stb_availability()
		{
			if($this->Stb_Model->stb_availability($this->input->post('stb_no')))
			{
				echo '<strong class="text-danger">STB Not Available</strong>';
			}
			else
			{
				echo '<strong class="text-success">STB Available</strong>';
			}
		}

		public function add_cable($user_id)
		{
			$data = array();
			$data['title'] = 'Cable TV Connection';
			$data['user'] = $this->User_Model->fetch_user_detail($user_id);
			$data['stb'] = $this->Stb_Model->fetch_all_stb();
			$data['userstb'] = $this->User_Model->fetch_user_stb($user_id);

			$this->form_validation->set_rules('stb_no', 'STB #', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('user/profile_base', $data);
				$this->load->view('user/add_cable');
				$this->load->view('layouts/footer');
			}
			else
			{
				$res = $this->Stb_Model->fetch_stb_id($this->input->post('stb_no')); // Getting STB ID from STB Number
				$services = array();
				$services['user_id'] = $user_id;
				$services['stb_id'] = $res->stb_id;
				$services['plan_id'] = NULL;
				$services['voip_id'] = NULL;

				$charges = array();
				$charges['user_id'] = $user_id;
				$charges['stb_charge'] = $this->input->post('stb_charge');
				$charges['stb_refund'] = $this->input->post('stb_refund');
				$charges['cable_wire'] = $this->input->post('cable_wire');

				$this->User_Model->add_cable($services, $charges);
				$this->session->set_flashdata('success', 'Plan has successfully been assigned');
				redirect('assign_validity/' . $user_id);
			}
		}

		public function add_net($user_id)
		{
			$data = array();
			$data['title'] = 'Broadband Connection';
			$data['user'] = $this->User_Model->fetch_user_detail($user_id);
			$data['net'] = $this->Internet_Model->fetch_all_internet_plan();
			$data['userstb'] = $this->User_Model->fetch_user_stb($user_id);

			$this->form_validation->set_rules('plan_id', 'Internet Plan', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('user/profile_base', $data);
				$this->load->view('user/add_net');
				$this->load->view('layouts/footer');
			}
			else
			{
				$services = array();
				$services['user_id'] = $user_id;
				$services['stb_id'] = NULL;
				$services['plan_id'] = $this->input->post('plan_id');
				$services['voip_id'] = NULL;

				$charges = array();
				$charges['user_id'] = $user_id;
				$charges['install_charge'] = $this->input->post('install_charge');
				$charges['install_refund'] = $this->input->post('install_refund');
				$charges['router_charge'] = $this->input->post('router_charge');
				$charges['router_refund'] = $this->input->post('router_refund');

				$this->User_Model->add_net($services, $charges);
				$this->session->set_flashdata('success', 'Plan has successfully been assigned');
				redirect('assign_validity/' . $user_id);
			}
		}

		public function voip_availability()
		{
			if($this->Voip_Model->voip_availability($this->input->post('voip_no')))
			{
				echo '<strong class="text-danger">VoIP Unavailable</strong>';
			}
			else
			{
				echo '<strong class="text-success">VoIP Available</strong>';
			}
		}

		public function add_voip($user_id)
		{
			$data = array();
			$data['title'] = 'VoIP Connection';
			$data['user'] = $this->User_Model->fetch_user_detail($user_id);
			$data['net'] = $this->Internet_Model->fetch_all_internet_plan();
			$data['voip'] = $this->Voip_Model->fetch_all_voip();
			$data['userstb'] = $this->User_Model->fetch_user_stb($user_id);

			$this->form_validation->set_rules('plan_id', 'Internet Plan', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('user/profile_base', $data);
				$this->load->view('user/add_voip');
				$this->load->view('layouts/footer');
			}
			else
			{
				$services = array();
				$services['user_id'] = $user_id;
				$services['stb_id'] = NULL;
				$services['plan_id'] = NULL;
				$services['voip_id'] = NULL;

				$charges = array();
				$charges['user_id'] = $user_id;
				$charges['voip_charge'] = $this->input->post('voip_charge');
				$charges['voip_refund'] = $this->input->post('voip_refund');

				$this->User_Model->add_voip($services, $charges);
				$this->session->set_flashdata('success', 'Plan has successfully been assigned');
				redirect('assign_validity/' . $user_id);
			}
		}

		public function assign_validity($user_id)
		{
			$data = array();
			$data['title'] = 'Select Service';
			$data['user'] = $this->User_Model->fetch_user_detail($user_id);
			$data['userstb'] = $this->User_Model->fetch_user_stb($user_id);

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('user/profile_base', $data);
			$this->load->view('user/choose_renewals');
			$this->load->view('layouts/footer');
		}
	}
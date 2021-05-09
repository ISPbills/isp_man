<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * Operations Controller
	 */
	class Operations extends CI_Controller
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

		public function read_staff()
		{
			$staff = $this->Operations_Model->fetch_all_staff();
			$data = array();
			$data['staff'] = $staff;

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('staff/list_staff', $data);
			$this->load->view('layouts/footer');
		}

		public function create_staff()
		{

			// Validation on Create
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('contact_no', 'Contact #', 'required');
			$this->form_validation->set_rules('staff_role', 'Staff Role', 'required');
			$this->form_validation->set_rules('branch_id', 'Branch ID', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('staff/create_staff');
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
				$formArray['staff_role'] = $this->input->post('staff_role');
				$formArray['branch_id'] = $this->input->post('branch_id');

				$this->Operations_Model->create_staff($formArray);

				$this->session->set_flashdata('success', 'Staff Added Successfully');
				redirect(base_url('Operations/read_staff'));
			}

		}

		public function update_staff($staff_id)
		{
			$staff = $this->Operations_Model->fetch_single_staff($staff_id);
			$data = array();
			$data['staff'] = $staff;

			// Validation on Update
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			$this->form_validation->set_rules('contact_no', 'Contact #', 'required');
			$this->form_validation->set_rules('staff_role', 'Staff Role', 'required');
			$this->form_validation->set_rules('branch_id', 'Branch ID', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('staff/update_staff', $data);
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
				$formArray['staff_role'] = $this->input->post('staff_role');
				$formArray['branch_id'] = $this->input->post('branch_id');
				
				$this->Operations_Model->update_staff($staff_id, $formArray);
				$this->session->set_flashdata('success', 'Staff Update Successfully');
				redirect(base_url('Operations/read_staff'));
			}
		}

		public function delete_staff($staff_id)
		{
			$staff = $this->Operations_Model->fetch_single_staff($staff_id);
			
			if(empty($staff))
			{
				$this->session->set_flashdata('error', 'Record Unavailable to Delete');
				redirect(base_url('Operations/read_staff'));
			}
			else
			{
				$this->Operations_Model->delete_staff($staff_id);
				$this->session->set_flashdata('success', 'Record Deleted Successfully');
				redirect(base_url('Operations/read_staff'));
			}
		}

		public function read_branch()
		{
			$branch = $this->Operations_Model->fetch_all_branch();
			$data = array();
			$data['branch'] = $branch;

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('branch/list_branch', $data);
			$this->load->view('layouts/footer');
		}

		public function create_branch()
		{
			// For Area Dropdown
			$area = $this->Operations_Model->fetch_all_area();
			$data = array();
			$data['area'] = $area;

			$this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
			$this->form_validation->set_rules('business_gst', '15 digit GST Number', 'required');
			$this->form_validation->set_rules('branch_address', 'Branch Address', 'required');
			$this->form_validation->set_rules('area_id', 'Branch Area', 'required');
			$this->form_validation->set_rules('branch_landline', 'Landline #', 'required');
			$this->form_validation->set_rules('branch_mobile', 'Mobile #', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('branch/create_branch', $data);
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['branch_name'] = $this->input->post('branch_name');
				$formArray['business_gst'] = $this->input->post('business_gst');
				$formArray['branch_address'] = $this->input->post('branch_address');
				$formArray['area_id'] = $this->input->post('area_id');
				$formArray['branch_landline'] = $this->input->post('branch_landline');
				$formArray['branch_mobile'] = $this->input->post('branch_mobile');

				$this->Operations_Model->create_branch($formArray);

				$this->session->set_flashdata('success', 'Branch Added Successfully');
				redirect('Operations/read_branch');
			}
		}

		public function update_branch($branch_id)
		{
			$branch = $this->Operations_Model->fetch_single_branch($branch_id);
			$data = array();
			$data['branch'] = $branch;

			$this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
			$this->form_validation->set_rules('business_gst', '15 digit GST Number', 'required');
			$this->form_validation->set_rules('branch_address', 'Branch Address', 'required');
			$this->form_validation->set_rules('branch_area', 'Branch Area', 'required');
			$this->form_validation->set_rules('branch_landline', 'Landline #', 'required');
			$this->form_validation->set_rules('branch_mobile', 'Mobile #', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('branch/update_branch', $data);
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['branch_name'] = $this->input->post('branch_name');
				$formArray['business_gst'] = $this->input->post('business_gst');
				$formArray['branch_address'] = $this->input->post('branch_address');
				$formArray['branch_area'] = $this->input->post('branch_area');
				$formArray['branch_landline'] = $this->input->post('branch_landline');
				$formArray['branch_mobile'] = $this->input->post('branch_mobile');
				
				$this->Operations_Model->update_branch($branch_id, $formArray);
				$this->session->set_flashdata('success', 'Branch Updated Successfully');
				redirect(base_url('Operations/read_branch'));
			}
		}

		public function read_area()
		{
			$area = $this->Operations_Model->fetch_all_area();
			$data = array();
			$data['area'] = $area;

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('area/list_area', $data);
			$this->load->view('layouts/footer');
		}

		public function create_area()
		{
			$this->form_validation->set_rules('area_name', 'Area Name', 'required');
			$this->form_validation->set_rules('area_district', 'Area District', 'required');
			$this->form_validation->set_rules('area_city', 'Area City', 'required');
			$this->form_validation->set_rules('area_state', 'Area State', 'required');
			$this->form_validation->set_rules('area_pin', 'Area Pin Code', 'required');
			$this->form_validation->set_rules('area_country', 'Area Country', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('area/create_area');
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['area_name'] = $this->input->post('area_name');
				$formArray['area_district'] = $this->input->post('area_district');
				$formArray['area_city'] = $this->input->post('area_city');
				$formArray['area_state'] = $this->input->post('area_state');
				$formArray['area_pin'] = $this->input->post('area_pin');
				$formArray['area_country'] = $this->input->post('area_country');

				$this->Operations_Model->create_area($formArray);
				$this->session->set_flashdata('success', 'Area Added Successfully');
				redirect(base_url('Operations/read_area'));
			}
		}

		public function update_area($area_id)
		{
			$area = $this->Operations_Model->fetch_single_area($area_id);
			$data = array();
			$data['area'] = $area;

			$this->form_validation->set_rules('area_name', 'Area Name', 'required');
			$this->form_validation->set_rules('area_district', 'Area District', 'required');
			$this->form_validation->set_rules('area_city', 'Area City', 'required');
			$this->form_validation->set_rules('area_state', 'Area State', 'required');
			$this->form_validation->set_rules('area_pin', 'Area Pin Code', 'required');
			$this->form_validation->set_rules('area_country', 'Area Country', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('area/update_area', $data);
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['area_name'] = $this->input->post('area_name');
				$formArray['area_district'] = $this->input->post('area_district');
				$formArray['area_city'] = $this->input->post('area_city');
				$formArray['area_state'] = $this->input->post('area_state');
				$formArray['area_pin'] = $this->input->post('area_pin');
				$formArray['area_country'] = $this->input->post('area_country');
				
				$this->Operations_Model->update_area($area_id, $formArray);
				$this->session->set_flashdata('success', 'Area Updated Successfully');
				redirect(base_url('Operations/read_area'));				
			}
		}

		public function delete_area($area_id)
		{
			$area = $this->Operations_Model->fetch_single_area($area_id);
			
			if(empty($area))
			{
				$this->session->set_flashdata('error', 'Record Unavailable to Delete');
				redirect(base_url('Operations/read_area'));
			}
			else
			{
				$this->Operations_Model->delete_area($area_id);
				$this->session->set_flashdata('success', 'Record Deleted Successfully');
				redirect(base_url('Operations/read_area'));
			}
		}

		public function read_voip()
		{
			$voip = $this->Operations_Model->fetch_all_voip();
			$data = array();
			$data['voip'] = $voip;

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('voip/list_voip', $data);
			$this->load->view('layouts/footer');
		}

		public function create_voip()
		{
			$this->form_validation->set_rules('voip_no', 'VoIP', 'required|is_unique[tbl_voip.voip_no]');
			$this->form_validation->set_rules('voip_desc', 'VoIP Description', 'required');
			$this->form_validation->set_rules('user_id', 'User ID', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			$this->form_validation->set_rules('vendor_rate', 'Vendor Rate', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('voip/create_voip');
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['voip_no'] = $this->input->post('voip_no');
				$formArray['voip_desc'] = $this->input->post('voip_desc');
				$formArray['user_id'] = $this->input->post('user_id');
				$formArray['password'] = $this->input->post('password');
				$formArray['vendor_name'] = $this->input->post('vendor_name');
				$formArray['vendor_rate'] = $this->input->post('vendor_rate');

				$this->Operations_Model->create_voip($formArray);
				$this->session->set_flashdata('success', 'VoIP Added Successfully');
				redirect(base_url('Operations/read_voip'));
			}
		}

		public function update_voip($voip_id)
		{
			$voip = $this->Operations_Model->fetch_single_voip($voip_id);
			$data = array();
			$data['voip'] = $voip;

			$this->form_validation->set_rules('voip_no', 'VoIP', 'required|is_unique[tbl_voip.voip_no]');
			$this->form_validation->set_rules('voip_desc', 'VoIP Description', 'required');
			$this->form_validation->set_rules('user_id', 'User ID', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			$this->form_validation->set_rules('vendor_rate', 'Vendor Rate', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('voip/update_voip', $data);
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['voip_no'] = $this->input->post('voip_no');
				$formArray['voip_desc'] = $this->input->post('voip_desc');
				$formArray['user_id'] = $this->input->post('user_id');
				$formArray['password'] = $this->input->post('password');
				$formArray['vendor_name'] = $this->input->post('vendor_name');
				$formArray['vendor_rate'] = $this->input->post('vendor_rate');

				$this->Operations_Model->update_voip($voip_id, $formArray);
				$this->session->set_flashdata('success', 'VoIP # Updated Successfully');
				redirect(base_url('Operations/read_voip'));
			}
		}

		public function read_internet()
		{

			$net = $this->Operations_Model->fetch_all_internet_plan();
			$data['net'] = array();
			$data['net'] = $net;

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('internet/list_internet', $data);
			$this->load->view('layouts/footer');
		}

		public function create_internet()
		{
			$this->form_validation->set_rules('plan_name', 'Plan Name', 'required');
			$this->form_validation->set_rules('plan_desc', 'Plan Description', 'required');
			$this->form_validation->set_rules('vendor_name', 'Vendor Rate', 'required');
			$this->form_validation->set_rules('vendor_rate', 'Vendor Rate', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('internet/create_internet');
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['plan_name'] = $this->input->post('plan_name');
				$formArray['plan_desc'] = $this->input->post('plan_desc');
				$formArray['vendor_name'] = $this->input->post('vendor_name');
				$formArray['vendor_rate'] = $this->input->post('vendor_rate');

				$this->Operations_Model->create_internet($formArray);
				$this->session->set_flashdata('success', 'Internet Plan Added Successfully');
				redirect(base_url('Operations/read_internet'));
			}
		}

		public function update_internet($plan_id)
		{
			$net = $this->Operations_Model->fetch_single_internet_plan($plan_id);
			$data = array();
			$data['net'] = $net;

			$this->form_validation->set_rules('plan_name', 'Plan Name', 'required');
			$this->form_validation->set_rules('plan_desc', 'Plan Description', 'required');
			$this->form_validation->set_rules('vendor_name', 'Vendor Rate', 'required');
			$this->form_validation->set_rules('vendor_rate', 'Vendor Rate', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('internet/update_internet', $data);
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['plan_name'] = $this->input->post('plan_name');
				$formArray['plan_desc'] = $this->input->post('plan_desc');
				$formArray['vendor_name'] = $this->input->post('vendor_name');
				$formArray['vendor_rate'] = $this->input->post('vendor_rate');

				$this->Operations_Model->update_internet($plan_id, $formArray);
				$this->session->set_flashdata('success', 'Internet Plan Updated Successfully');
				redirect(base_url('Operations/read_internet'));
			}
		}

		public function delete_internet($plan_id)
		{
			$net = $this->Operations_Model->fetch_single_internet_plan($plan_id);
			
			if(empty($net))
			{
				$this->session->set_flashdata('error', 'Record Unavailable to Delete');
				redirect(base_url('Operations/read_internet'));
			}
			else
			{
				$this->Operations_Model->delete_internet($plan_id);
				$this->session->set_flashdata('success', 'Record Deleted Successfully');
				redirect(base_url('Operations/read_internet'));
			}
		}

		public function read_user()
		{
			$user = $this->Operations_Model->fetch_all_user();
			$data = array();
			$data['user'] = $user;

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('user/list_user', $data);
			$this->load->view('layouts/footer');
		}

		public function create_user()
		{
			// For Area Dropdown
			$area = $this->Operations_Model->fetch_all_area();
			$data = array();
			$data['area'] = $area;

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
				redirect(base_url('Operations/manage_plan/' . $this->db->insert_id()));
			}
		}

		public function manage_plan($user_id)
		{
			$user = $this->Operations_Model->fetch_profile_detail($user_id);
			$data = array();
			$data['user'] = $user;

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('user/manage_plan', $data);
			$this->load->view('layouts/footer');
		}

	}
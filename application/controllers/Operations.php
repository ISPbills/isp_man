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
				$this->load->view('branch/create_branch');
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

				$this->Operations_Model->create_branch($formArray);

				$this->session->set_flashdata('success', 'Branch Added Successfully');
				redirect('Operations/read_branch');
			}

		}

	}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Staff Class
	 */
	class Staff extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->logged_id();
			$this->load->model('Staff_Model');
			$this->load->model('Area_Model');
			$this->load->model('Branch_Model');
		}

		private function logged_id()
		{
			if(!$this->session->userdata('authenticated'))
			{
				redirect(base_url());
			}
		}

		public function staff_list()
		{
			$data = array();
			$data['staff'] = $this->Staff_Model->fetch_all_staff();

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('staff/staff_list', $data);
			$this->load->view('layouts/footer');
		}

		public function create_staff()
		{
			$data = array();
			$data['branch'] = $this->Branch_Model->fetch_all_branch();

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
				$this->load->view('staff/create_staff', $data);
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

				$this->Staff_Model->create_staff($formArray);

				$this->session->set_flashdata('success', 'Staff Added Successfully');
				redirect(base_url('staff_list'));
			}

		}

		public function update_staff($staff_id)
		{
			$data = array();
			$data['staff'] = $this->Staff_Model->fetch_single_staff($staff_id);

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
				
				$this->Staff_Model->update_staff($staff_id, $formArray);
				$this->session->set_flashdata('success', 'Staff Update Successfully');
				redirect(base_url('staff_list'));
			}
		}

		public function delete_staff($staff_id)
		{
			$staff = $this->Staff_Model->fetch_single_staff($staff_id);
			
			if(empty($staff))
			{
				$this->session->set_flashdata('error', 'Record Unavailable to Delete');
				redirect(base_url('staff_list'));
			}
			else
			{
				$this->Staff_Model->delete_staff($staff_id);
				$this->session->set_flashdata('success', 'Record Deleted Successfully');
				redirect(base_url('staff_list'));
			}
		}

	}
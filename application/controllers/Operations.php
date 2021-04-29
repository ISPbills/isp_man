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
			$this->load->model('Operations_Model');
		}

		public function create_staff()
		{

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
				$this->load->view('create_staff');
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

		public function read_staff()
		{
			$staff = $this->Operations_Model->fetch_all_staff();
			$data = array();
			$data['staff'] = $staff;

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('list_staff', $data);
			$this->load->view('layouts/footer');
		}

		public function update_staff($staff_id)
		{
			$staff = $this->Operations_Model->fetch_single_staff($staff_id);

			$data = array();
			$data['staff'] = $staff;

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('update_staff', $data);
			$this->load->view('layouts/footer');
		}

	}
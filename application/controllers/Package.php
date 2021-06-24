<?php

	/**
	 * Cable Package
	 */
	class Package extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->logged_id();
			$this->load->model('Package_Model');
		}

		private function logged_id()
		{
			if(!$this->session->userdata('authenticated'))
			{
				redirect(base_url());
			}
		}

		public function package_list()
		{
			$data = array();
			$data['cable'] = $this->Package_Model->fetch_all_package();

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('cable/package_list', $data);
			$this->load->view('layouts/footer');
		}

		public function create_package()
		{
			$this->form_validation->set_rules('pack_name', 'Package Name', 'required');
			$this->form_validation->set_rules('pack_rate', 'Package Rate', 'required');
			$this->form_validation->set_rules('pack_type', 'Package Type', 'required');
			$this->form_validation->set_rules('pack_duration', 'Package Duration', 'required');
			$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			$this->form_validation->set_rules('vendor_rate', 'Vendor Rate', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('cable/create_package');
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['pack_name'] = $this->input->post('pack_name');
				$formArray['pack_rate'] = $this->input->post('pack_rate');
				$formArray['pack_type'] = $this->input->post('pack_type');
				$formArray['pack_duration'] = $this->input->post('pack_duration');
				$formArray['vendor_name'] = $this->input->post('vendor_name');
				$formArray['vendor_rate'] = $this->input->post('vendor_rate');

				$this->Package_Model->create_package($formArray);
				$this->session->set_flashdata('success', 'Cable Package Added Successfully');
				redirect('package_list');
			}
		}
	}
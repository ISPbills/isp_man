<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Branch Class
	 */
	class Branch extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->logged_id();
			$this->load->model('Branch_Model');
			$this->load->model('Area_Model');
		}

		private function logged_id()
		{
			if(!$this->session->userdata('authenticated'))
			{
				redirect(base_url());
			}
		}

		public function branch_list()
		{
			$data = array();
			$data['branch'] = $this->Branch_Model->fetch_all_branch();

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('branch/branch_list', $data);
			$this->load->view('layouts/footer');
		}

		public function create_branch()
		{
			// For Area Dropdown
			$data = array();
			$data['area'] = $this->Area_Model->fetch_all_area();

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

				$this->Branch_Model->create_branch($formArray);

				$this->session->set_flashdata('success', 'Branch Added Successfully');
				redirect('branch_list');
			}
		}

		public function update_branch($branch_id)
		{
			$data = array();
			$data['branch'] = $this->Branch_Model->fetch_single_branch($branch_id);
			$data['area'] = $this->Area_Model->fetch_all_area();

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
				
				$this->Branch_Model->update_branch($branch_id, $formArray);
				$this->session->set_flashdata('success', 'Branch Updated Successfully');
				redirect(base_url('Administration/branch_list'));
			}
		}
	}
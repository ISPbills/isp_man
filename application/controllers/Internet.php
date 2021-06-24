<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Internet Class
	 */
	class Internet extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->logged_id();
			$this->load->model('Internet_Model');
		}

		private function logged_id()
		{
			if(!$this->session->userdata('authenticated'))
			{
				redirect(base_url());
			}
		}
		public function internet_list()
		{
			$data['net'] = array();
			$data['net'] = $this->Internet_Model->fetch_all_internet_plan();

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('internet/internet_list', $data);
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

				$this->Internet_Model->create_internet($formArray);
				$this->session->set_flashdata('success', 'Internet Plan Added Successfully');
				redirect(base_url('internet_list'));
			}
		}

		public function update_internet($plan_id)
		{
			$data = array();
			$data['net'] = $this->Internet_Model->fetch_single_internet_plan($plan_id);

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

				$this->Internet_Model->update_internet($plan_id, $formArray);
				$this->session->set_flashdata('success', 'Internet Plan Updated Successfully');
				redirect(base_url('internet_list'));
			}
		}

		public function delete_internet($plan_id)
		{
			$net = $this->Internet_Model->fetch_single_internet_plan($plan_id);
			
			if(empty($net))
			{
				$this->session->set_flashdata('error', 'Record Unavailable to Delete');
				redirect(base_url('internet_list'));
			}
			else
			{
				$this->Internet_Model->delete_internet($plan_id);
				$this->session->set_flashdata('success', 'Record Deleted Successfully');
				redirect(base_url('internet_list'));
			}
		}
	}
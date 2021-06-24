<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * VoIP Class
	 */
	class Voip extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->logged_id();
			$this->load->model('Voip_Model');
		}

		private function logged_id()
		{
			if(!$this->session->userdata('authenticated'))
			{
				redirect(base_url());
			}
		}
		public function voip_list()
		{
			$data = array();
			$data['voip'] = $this->Voip_Model->fetch_all_voip();

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('voip/voip_list', $data);
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

				$this->Voip_Model->create_voip($formArray);
				$this->session->set_flashdata('success', 'VoIP Added Successfully');
				redirect(base_url('voip_list'));
			}
		}

		public function update_voip($voip_id)
		{
			$data = array();
			$data['voip'] = $this->Voip_Model->fetch_single_voip($voip_id);

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

				$this->Voip_Model->update_voip($voip_id, $formArray);
				$this->session->set_flashdata('success', 'VoIP # Updated Successfully');
				redirect(base_url('voip_list'));
			}
		}
	}
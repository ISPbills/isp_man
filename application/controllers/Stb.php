<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * STB Class
	 */
	class Stb extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->logged_id();
			$this->load->model('Stb_Model');
			$this->load->model('Package_Model');
		}

		private function logged_id()
		{
			if(!$this->session->userdata('authenticated'))
			{
				redirect(base_url());
			}
		}

		public function stb_list()
		{

			$data = array();
			$data['stb'] = $this->Stb_Model->fetch_all_stb();

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('stb/stb_list', $data);
			$this->load->view('layouts/footer');
		}

		public function create_stb()
		{
			$data = array();
			$data['cable'] = $this->Package_Model->fetch_all_package();

			$this->form_validation->set_rules('stb_no', 'Set-Top Box #', 'required|is_unique[tbl_stb.stb_no]');
			$this->form_validation->set_rules('stb_type', 'Set-Top Box Type', 'required');
			$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
			$this->form_validation->set_rules('stb_rate', 'STB Rate', 'required');
			$this->form_validation->set_rules('stb_warranty', 'STB Warranty', 'required');
			$this->form_validation->set_rules('pack_id', 'Package ID', 'required');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('stb/create_stb', $data);
				$this->load->view('layouts/footer');
			}
			else
			{
				$formArray = array();
				$formArray['stb_no'] = strtoupper($this->input->post('stb_no'));
				$formArray['stb_type'] = $this->input->post('stb_type');
				$formArray['vendor_name'] = $this->input->post('vendor_name');
				$formArray['stb_rate'] = $this->input->post('stb_rate');
				$formArray['stb_warranty'] = $this->input->post('stb_warranty');
				$formArray['pack_id'] = $this->input->post('pack_id');

				$this->Stb_Model->create_stb($formArray);
				$this->session->set_flashdata('success', 'STB Added Successfully');
				redirect('stb_list');
			}

		}
	}
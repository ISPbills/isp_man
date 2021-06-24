<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Area Class
	 */
	class Area extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->logged_id();
			$this->load->model('Area_Model');
		}

		private function logged_id()
		{
			if(!$this->session->userdata('authenticated'))
			{
				redirect(base_url());
			}
		}
		public function area_list()
		{
			$data = array();
			$data['area'] = $this->Area_Model->fetch_all_area();

			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('area/area_list', $data);
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

				$this->Area_Model->create_area($formArray);
				$this->session->set_flashdata('success', 'Area Added Successfully');
				redirect(base_url('area_list'));
			}
		}

		public function update_area($area_id)
		{
			$data = array();
			$data['area'] = $this->Area_Model->fetch_single_area($area_id);

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
				
				$this->Area_Model->update_area($area_id, $formArray);
				$this->session->set_flashdata('success', 'Area Updated Successfully');
				redirect(base_url('area_list'));				
			}
		}

		public function delete_area($area_id)
		{
			$area = $this->Area_Model->fetch_single_area($area_id);
			
			if(empty($area))
			{
				$this->session->set_flashdata('error', 'Record Unavailable to Delete');
				redirect(base_url('read_area'));
			}
			else
			{
				$this->Area_Model->delete_area($area_id);
				$this->session->set_flashdata('success', 'Record Deleted Successfully');
				redirect(base_url('read_area'));
			}
		}
	}
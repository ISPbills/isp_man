<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * Dashboard Controller
	 */
	class Dashboard extends CI_Controller
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

		public function index()
		{

			$data = array();
			$data['users'] = $this->Operations_Model->count_user();
			$data['plans'] = $this->Operations_Model->count_plan();
			$data['voips'] = $this->Operations_Model->count_voip();
			$data['packs'] = $this->Operations_Model->count_packs();


			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('dashboard');
			$this->load->view('layouts/footer');
		}

	}
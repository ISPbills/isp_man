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
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('dashboard');
			$this->load->view('layouts/footer');
		}

	}
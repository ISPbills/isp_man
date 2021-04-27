<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * Dashboard Controller
	 */
	class Dashboard extends CI_Controller
	{
		public function index()
		{
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('dashboard');
			$this->load->view('layouts/footer');
		}
	}
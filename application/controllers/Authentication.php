<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * Authentication Controller
	 */
	class Authentication extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
		}

		public function index()
		{
			$title['title'] = 'ISP Man | Login';
			$this->load->view('login', $title);
		}

		public function login()
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() == false)
		{
			$title['title'] = 'ISP Man | Login';
			$this->load->view('login', $title);
		}
		else
		{
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));

			$user = $this->Auth_Model->login($username, $password);

			if($user)
			{
				$userdata = array(
					'id' => $staff_id,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'authenticated' => TRUE,
				);

				$this->session->set_userdata($userdata);

				redirect('dashboard');

			}

		}

		}

	}
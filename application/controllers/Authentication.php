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
			$this->load->model('Auth_Model');
		}

		public function index()
		{
			$this->load->view('login');
		}

		public function login()
		{
			if($this->session->userdata('authenticated'))
			{
				redirect('dashboard');
			}

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));

			$user = $this->Auth_Model->login($username, $password);

			if($user)
			{
				$userdata = array(
					'staff_id' => $user->staff_id,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
					'authenticated' => TRUE,
				);

				$this->session->set_userdata($userdata);

				redirect('dashboard');

			}
			else
			{
				$this->session->set_flashdata('message', 'Invalid Credentials');
				redirect(base_url());
			}

		}

		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url());
		}

	}
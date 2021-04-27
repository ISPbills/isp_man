<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * Authentication Controller
	 */
	class Authentication extends CI_Controller
	{
		public function index()
		{
			$title['title'] = 'ISP Man | Login';
			$this->load->view('login', $title);
		}
	}
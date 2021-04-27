<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * Auth Model
	 */
	class Auth_Model extends CI_Model
	{
		public function login($username, $password)
		{
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$query = $this->db->get('tbl_staff');

			if($query->num_rows() == 1)
			{
				return $query->row();
			}
			else
			{
				return false;
			}
		}
	}
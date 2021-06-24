<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	 * Package Model
	 */
	class Package_Model extends CI_Model
	{
		public function create_package($formArray)
		{
			$this->db->insert('tbl_cable', $formArray);
		}

		public function fetch_all_package()
		{
			return $cable = $this->db->get('tbl_cable')->result();
		}
	}
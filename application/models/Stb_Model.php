<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	 * STB Model
	 */
	class Stb_Model extends CI_Model
	{
		public function create_stb($formArray)
		{
			$this->db->insert('tbl_stb', $formArray);
		}

		public function fetch_all_stb()
		{
			$this->db->select('*');
			$this->db->from('tbl_stb');
			$this->db->join('tbl_cable', 'tbl_cable.pack_id = tbl_stb.pack_id', 'left');
			return $this->db->get()->result();
		}
	}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * VoIP Model
	 */
	class Voip_Model extends CI_Model
	{
		public function create_voip($formArray)
		{
			$this->db->insert('tbl_voip', $formArray);
		}

		public function fetch_all_voip()
		{
			return $voip = $this->db->get('tbl_voip')->result();
		}

		public function fetch_single_voip($voip_id)
		{
			$this->db->where('voip_id', $voip_id);
			return $voip = $this->db->get('tbl_voip')->row();
		}

		public function update_voip($voip_id, $formArray)
		{
			$this->db->where('voip_id', $voip_id);
			$this->db->update('tbl_voip', $formArray);
		}
	}
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

		public function fetch_voip_id($voip_no)
		{
			$this->db->select('voip_id');
			$this->db->from('tbl_voip');
			$this->db->where('voip_no', $voip_no);
			$result = $this->db->get();
			return $result->row();
		}

		public function voip_availability($voip_no)
		{
			$this->db->where('voip_no', $voip_no);
			$query = $this->db->get('tbl_voip');
			
			if($query->num_rows() > 0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

	}
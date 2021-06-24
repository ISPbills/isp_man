<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	/**
	 * Internet Model
	 */
	class Internet_Model extends CI_Model
	{
		public function create_internet($formArray)
		{
			$this->db->insert('tbl_internet', $formArray);
		}

		public function fetch_all_internet_plan()
		{
			return $net = $this->db->get('tbl_internet')->result();
		}

		public function fetch_single_internet_plan($plan_id)
		{
			$this->db->where('plan_id', $plan_id);
			return $net = $this->db->get('tbl_internet')->row();
		}

		public function update_internet($plan_id, $formArray)
		{
			$this->db->where('plan_id', $plan_id);
			$this->db->update('tbl_internet', $formArray);
		}

		public function delete_internet($plan_id)
		{
			$this->db->where('plan_id', $plan_id);
			$this->db->delete('tbl_internet');
		}
	}
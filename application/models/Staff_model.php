<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class Staff_model extends CI_Model
	{
		function __construct()
		{
			$this->load->database();
			parent::__construct();
		}

		public function get_all()
		{
			$query = $this->db->get('staff');
			return $query->result_array(); 
		}
		
		public function get_by_id($id)
		{
			$this->db->where('id_staff', $id);
			$query = $this->db->get('staff');
			return $query->row();
		}
	

	
		public function update($id, $data)
		{
			$this->db->where('id_staff', $id);
			return $this->db->update('staff', $data);
		}


		public function addStaff($data)
		{
			return $this->db->insert('staff', $data);
		}
	
		public function loadTableStaff()
		{
			$dataStaff = $this->db->get('staff');
			if ($dataStaff->num_rows() > 0) {
				return $dataStaff->result();
			} else {
				return false;
			}
		}
	
		public function rsdelStaff($id)
		{
			$this->db->where('id_staff', $id);
			return $this->db->delete('staff');
		}
	}
?>

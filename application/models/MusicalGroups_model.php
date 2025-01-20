<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MusicalGroups_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        $this->db->select('musical_groups.*, staff.last_name AS representative_last_name, staff.firs_name AS representative_first_name');
        $this->db->join('staff', 'musical_groups.representative = staff.id_staff', 'left');
        $query = $this->db->get('musical_groups');
        return $query->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->where('id_musical', $id);
        $query = $this->db->get('musical_groups');
        return $query->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('musical_groups', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_musical', $id);
        return $this->db->update('musical_groups', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_musical', $id);
        return $this->db->delete('musical_groups');
    }
}

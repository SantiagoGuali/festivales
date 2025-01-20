<?php
class MusicalGroups_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Cargar la base de datos
    }

    public function insertar($datos) {
        return $this->db->insert('musical_groups', $datos);
    }

    public function obtenerTodo() {
        $query = $this->db->get('musical_groups');
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function eliminarPorId($id) {
        $this->db->where('id_musical', $id);
        return $this->db->delete('musical_groups');
    }

    public function update_group($id, $datos) {
        $this->db->where('id_musical', $id);
        return $this->db->update('musical_groups', $datos);
    }
}
?>

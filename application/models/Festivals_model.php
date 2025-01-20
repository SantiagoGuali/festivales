<?php
class Festivals_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertar($datos) {
        return $this->db->insert('festivals', $datos);
    }

    public function obtenerTodo() {
        $query = $this->db->get('festivals');
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function eliminarPorId($id) {
        $this->db->where('id_festival', $id);
        return $this->db->delete('festivals');
    }
    public function actualizar($id, $datos) {
        $this->db->where('id_festival', $id);
        return $this->db->update('festivals', $datos);
    }
    
}
?>

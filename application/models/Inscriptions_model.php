<?php
class Inscriptions_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertar($datos) {
        return $this->db->insert('inscriptions', $datos);
    }

    public function obtenerTodo() {
        $query = $this->db->get('inscriptions');
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function eliminarPorId($id) {
        $this->db->where('id_inscription', $id);
        return $this->db->delete('inscriptions');
    }
    public function actualizar($id, $datos) {
        $this->db->where('id_inscription', $id);
        return $this->db->update('inscriptions', $datos);
    }
    
}
?>

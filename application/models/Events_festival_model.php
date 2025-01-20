<?php
class Events_festival_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertar($datos) {
        return $this->db->insert('eventsFestival', $datos);
    }

    public function obtenerTodo() {
        $query = $this->db->get('eventsFestival');
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function eliminarPorId($id) {
        $this->db->where('id_event', $id);
        return $this->db->delete('eventsFestival');
    }

    public function actualizar($id, $datos) {
        $this->db->where('id_event', $id);
        return $this->db->update('eventsFestival', $datos);
    }
}
?>

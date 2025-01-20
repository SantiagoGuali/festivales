<?php 
class Staff_model extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Carga la base de datos
    }

    // Inserción de datos en la tabla staff
    public function insertar($datos) {
        return $this->db->insert('staff', $datos); // Inserta los datos en la tabla staff
    }

    // Consulta de todos los registros en staff
    public function obtenerTodo() {
        $query = $this->db->get('staff'); // SELECT * FROM staff
        return $query->num_rows() > 0 ? $query->result() : false; // Retorna registros si existen
    }

    // Consulta de un registro específico por ID
    public function consultarPorId($id) {
        $this->db->where('id_staff', $id); // WHERE id_staff = ?
        $query = $this->db->get('staff');
        return $query->num_rows() > 0 ? $query->row() : false; // Retorna el registro como objeto
    }

    // Actualización de un registro por ID
    public function update_staff($id, $datos) {
        $this->db->where('id_staff', $id); // WHERE id_staff = ?
        return $this->db->update('staff', $datos); // Actualiza los datos
    }

    // Eliminación de datos por ID
    public function eliminarPorId($id) {
        $this->db->where('id_staff', $id); // WHERE id_staff = ?
        return $this->db->delete('staff'); // Elimina el registro
    }

    // Reporte personalizado (opcional)
    public function reportesStaff() {
        $this->db->select('id_card, last_name, firs_name, mail, role, state'); // Seleccionar campos específicos
        $query = $this->db->get('staff');
        return $query->result(); // Retorna el resultado como un array de objetos
    }
}

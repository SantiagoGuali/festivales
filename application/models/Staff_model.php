<?php 
    class Staff_model extends CI_Model {
        // Constructor
        function __construct() {
            parent::__construct();
            $this->load->database(); // Carga la base de datos
        }

        // Inserción de datos en la tabla staff
        function insertar($datos) {
            return $this->db->insert('staff', $datos); // Inserta los datos en la tabla staff
        }

        // Consulta de todos los registros en staff
        function obtenerTodo() {
            $listadoStaff = $this->db->get('staff'); // SELECT * FROM staff
            // Validación si existen datos en la tabla staff
            if ($listadoStaff->num_rows() > 0) {
                return $listadoStaff->result(); // Retorna el listado de registros si existen
            } else {
                return false; // Retorna falso si no hay registros
            }
        }

        // Eliminación de datos por ID
        function eliminarPorId($id) {
            // DELETE FROM staff WHERE id_staff = ?
            $this->db->where('id_staff', $id);
            return $this->db->delete('staff'); // Elimina el registro con el ID especificado
        }


    } // Cierre de la clase
?>

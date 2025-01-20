<?php
class Musical_group extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Cargar el modelo
        $this->load->model('MusicalGroups_model');
    }

    public function index() {
        // Obtener todos los registros desde el modelo
        $data['musical_groups'] = $this->MusicalGroups_model->obtenerTodo();

        // Cargar las vistas
        $this->load->view('header');
        $this->load->view('Musical_groups/index', $data);
        $this->load->view('footer');
    }

    public function guardar() {
        // Recoger los datos del formulario
        $datos = array(
            'name' => $this->input->post('name'),
            'num_members' => $this->input->post('num_members'),
            'region' => $this->input->post('region'),
            'representative' => $this->input->post('representative'),
        );

        // Insertar datos en la tabla musical_groups
        $this->MusicalGroups_model->insertar($datos);

        // Redirigir al index
        redirect('Musical_group/index');
    }

    public function eliminar($id) {
        // Eliminar el registro por ID
        if ($this->MusicalGroups_model->eliminarPorId($id)) {
            redirect('Musical_group/index');
        } else {
            echo "Error al eliminar";
        }
    }

    public function guardarCambios() {
        // Obtener el ID del formulario
        $id = $this->input->post('id_musical');

        // Validar que el ID esté definido
        if (!$id) {
            show_error("ID no proporcionado para actualizar.");
        }

        // Recoger los datos del formulario
        $datos = array(
            'name' => $this->input->post('name'),
            'num_members' => $this->input->post('num_members'),
            'region' => $this->input->post('region'),
            'representative' => $this->input->post('representative'),
        );

        // Actualizar los datos
        if ($this->MusicalGroups_model->update_group($id, $datos)) {
            redirect('Musical_group/index');
        } else {
            echo "Error al actualizar el registro.";
        }
    }
}
?>

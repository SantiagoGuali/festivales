<?php
class Inscriptions extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Inscriptions_model');
    }

    public function index() {
        $data['inscriptions'] = $this->Inscriptions_model->obtenerTodo();
        $this->load->view('header');
        $this->load->view('Inscriptions/index', $data);
        $this->load->view('footer');
    }

    public function guardar() {
        $datos = array(
            'group_id' => $this->input->post('group_id'),
            'state' => $this->input->post('state'),
        );
        $this->Inscriptions_model->insertar($datos);
        redirect('Inscriptions/index');
    }

    public function eliminar($id) {
        $this->Inscriptions_model->eliminarPorId($id);
        redirect('Inscriptions/index');
    }
    public function guardarCambios() {
        $id = $this->input->post('id_inscription');
    
        // Validar que el ID esté presente
        if (!$id) {
            show_error("ID no proporcionado para actualizar.");
        }
    
        $datos = array(
            'group_id' => $this->input->post('group_id'),
            'state' => $this->input->post('state'),
        );
    
        // Actualizar los datos
        if ($this->Inscriptions_model->actualizar($id, $datos)) {
            redirect('Inscriptions/index');
        } else {
            echo "Error al actualizar la inscripción.";
        }
    }
    
}
?>

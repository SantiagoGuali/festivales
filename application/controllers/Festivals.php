<?php
class Festivals extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Festivals_model');
    }

    public function index() {
        $data['festivals'] = $this->Festivals_model->obtenerTodo();
        $this->load->view('header');
        $this->load->view('Festivals/index', $data);
        $this->load->view('footer');
    }

    public function guardar() {
        $datos = array(
            'name' => $this->input->post('name'),
            'date_festival' => $this->input->post('date_festival'),
            'location' => $this->input->post('location'),
            'state' => $this->input->post('state'),
        );
        $this->Festivals_model->insertar($datos);
        redirect('Festivals/index');
    }

    public function eliminar($id) {
        $this->Festivals_model->eliminarPorId($id);
        redirect('Festivals/index');
    }
    public function guardarCambios() {
        $id = $this->input->post('id_festival');
    
        // Validar que el ID esté presente
        if (!$id) {
            show_error("ID no proporcionado para actualizar.");
        }
    
        $datos = array(
            'name' => $this->input->post('name'),
            'date_festival' => $this->input->post('date_festival'),
            'location' => $this->input->post('location'),
            'state' => $this->input->post('state'),
        );
    
        // Actualizar los datos
        if ($this->Festivals_model->actualizar($id, $datos)) {
            redirect('Festivals/index');
        } else {
            echo "Error al actualizar el festival.";
        }
    }
    
}
?>

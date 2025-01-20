<?php
class Events_festival extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Events_festival_model');
    }

    public function index() {
        $data['events'] = $this->Events_festival_model->obtenerTodo();
        $this->load->view('header');
        $this->load->view('Events_festival/index', $data);
        $this->load->view('footer');
    }

    public function guardar() {
        $datos = array(
            'eventFestival' => $this->input->post('eventFestival'),
            'hour_start' => $this->input->post('hour_start'),
            'hour_end' => $this->input->post('hour_end'),
        );
        $this->Events_festival_model->insertar($datos);
        redirect('Events_festival/index');
    }

    public function eliminar($id) {
        $this->Events_festival_model->eliminarPorId($id);
        redirect('Events_festival/index');
    }

    public function guardarCambios() {
        $id = $this->input->post('id_event');
        $datos = array(
            'eventFestival' => $this->input->post('eventFestival'),
            'hour_start' => $this->input->post('hour_start'),
            'hour_end' => $this->input->post('hour_end'),
        );
        $this->Events_festival_model->actualizar($id, $datos);
        redirect('Events_festival/index');
    }
}
?>

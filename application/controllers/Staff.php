<?php
// Definimos la clase Staff
class Staff extends CI_Controller {
    // Constructor
    public function __construct() {
        // Invocar a la clase padre para el constructor
        parent::__construct();
        // Cargar el modelo
        $this->load->model('Staff_model');
    }

    // Función para renderizar el index
    public function index() {
        // Obtener todos los registros del modelo
        $staff = $this->Staff_model->obtenerTodo();
        // Pasar los datos a la vista
        $data['staff'] = $staff;
        $this->load->view('header');
        $this->load->view('Staff/index', $data);
        $this->load->view('footer');
    }

    // Función para recibir datos y guardarlos en la base de datos
    public function guardar() {
        $datos = array(
            'id_card' => $this->input->post('id_card'),
            'last_name' => $this->input->post('last_name'),
            'firs_name' => $this->input->post('firs_name'),
            'mail' => $this->input->post('mail'),
            'phone' => $this->input->post('phone'),
            'user_name' => $this->input->post('user_name'),
            'pass' => $this->input->post('pass'),
            'role' => $this->input->post('role'),
            'state' => $this->input->post('state'),
        );
        // Insertar datos en la tabla staff
        $this->Staff_model->insertar($datos);
        // Redirigir al index
        redirect('Staff/index');
    }

    // Función para eliminar un registro (recibe el ID)
    public function eliminar($id) {
        if ($this->Staff_model->eliminarPorId($id)) {
            // Redirigir al index si se elimina correctamente
            redirect('Staff/index');
        } else {
            echo "Error al eliminar";
        }
    }


    // Función para generar un reporte general
    public function reporteGeneral() {
        $data['staff'] = $this->Staff_model->reportesStaff();
        $this->load->view('header');
        $this->load->view('Staff/reporteGeneral', $data);
        $this->load->view('footer');
    }
}
?>

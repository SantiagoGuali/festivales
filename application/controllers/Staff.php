<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class Staff extends CI_Controller
	{
		public function __construct()
		{
			parent:: __construct();
			$this->load->model('Staff_model');
		}

		public function index()
		{
			$staff = $this->Staff_model->loadTableStaff();
			$data['staff'] = $staff;
			$this->load-> view("header");
			$this->load-> view("Staff/staff", $data);
			$this->load-> view("footer");
		}


		public function add()
		{
			$data['is_update'] = false;
			$this->load->view('header.php');
			$this->load->view('Staff/form.php', $data);
			$this->load->view('footer.php');
		}
		public function saveStaff()
		{
			$data = array(
				"id_card" => $this->input->post("id_card"),
				"last_name" => $this->input->post("last_name"),
				"firs_name" => $this->input->post("firs_name"),
				"mail" => $this->input->post("mail"),
				"phone" => $this->input->post("phone"),
				"user_name" => $this->input->post("user_name"),
				"pass" => password_hash($this->input->post("pass"), PASSWORD_BCRYPT),
				"role" => $this->input->post("role"),
				"state" => $this->input->post("state") ? 1 : 0,
			);
	
			$this->Staff_model->addStaff($data);
			redirect("Staff/index");
		}

		    public function edit($id)
    {
        $data['is_update'] = true;
        $data['staff'] = $this->Staff_model->get_by_id($id);
        $this->load->view('header');
        $this->load->view('Staff/form', $data);
        $this->load->view('footer.php');
    }

    public function update($id)
    {
        $data = array(
            'id_card' => $this->input->post('id_card'),
            'last_name' => $this->input->post('last_name'),
            'firs_name' => $this->input->post('firs_name'),
            'mail' => $this->input->post('mail'),
            'phone' => $this->input->post('phone'),
            'user_name' => $this->input->post('user_name'),
            'role' => $this->input->post('role'),
            'state' => $this->input->post('state'),
        );
        $this->Staff_model->update($id, $data);
        redirect('Staff/index');
    }
	
		public function delStaff($id)
		{
			if ($this->Staff_model->rsdelStaff($id)) {
				redirect("Staff/index");
			} else {
				echo "Error al eliminar";
			}
		}
	}
?>

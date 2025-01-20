<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MusicalGroups extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MusicalGroups_model');
        $this->load->model('Staff_model');
    }

    public function index()
    {
        $data['musical_groups'] = $this->MusicalGroups_model->get_all();
        $this->load->view('header');
        $this->load->view('musical_groups/list', $data);
        $this->load->view('footer');
    }

    public function add()
    {
        $data['is_update'] = false;
        $data['staff'] = $this->Staff_model->get_all(); 
        $this->load->view('header');
        $this->load->view('musical_groups/form', $data);
        $this->load->view('footer');
    }

    public function save()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'num_members' => $this->input->post('num_members'),
            'region' => $this->input->post('region'),
            'representative' => $this->input->post('representative')
        );

        $this->MusicalGroups_model->insert($data);
        redirect('musicalgroups');
    }

    public function edit($id)
    {
        $data['is_update'] = true;
        $data['musical_group'] = $this->MusicalGroups_model->get_by_id($id);
        $data['staff'] = $this->Staff_model->get_all(); 
        $this->load->view('header');
        $this->load->view('musical_groups/form', $data);
        $this->load->view('footer');
    }

    public function update($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'num_members' => $this->input->post('num_members'),
            'region' => $this->input->post('region'),
            'representative' => $this->input->post('representative')
        );

        $this->MusicalGroups_model->update($id, $data);
        redirect('musicalgroups');
    }

    public function delete($id)
    {
        $this->MusicalGroups_model->delete($id);
        redirect('musicalgroups');
    }
}

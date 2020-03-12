<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman user',
            'userall' => $this->user_model->getAll(),
        ];
        if ($this->input->post('keyword')) {
            $data['userall'] = $this->user_model->search();
        }
        $this->load->view('template/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $data = [
            'title' => 'Insert user',
            'action' => '',
            'disabled' => '',
            'nama' => '',
            'username' => '',
            'password' => '',
            'level' => $this->user_model->level(),
        ];

        $this->form_validation->set_rules('user_nama', 'nama user', 'required');
        $this->form_validation->set_rules('user_username', 'username', 'required|is_unique[user.user_username]');
        $this->form_validation->set_rules('user_password', 'password', 'required');
        $this->form_validation->set_rules('user_password2', 'password', 'required|matches[user_password]');

        if ($this->form_validation->run() == true) {
            $this->user_model->insert();
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('user/form', $data);
            $this->load->view('template/footer');
        }
    }

    public function update($id)
    {
        $row = $this->user_model->getById($id);
        if ($row) {
            $data = [
                'title' => 'Update user',
                'action' => '',
                'disabled' => 'disabled',
                'nama' => set_value('user_nama', $row['user_nama']),
                'username' => set_value('user_nama', $row['user_username']),
                'password' => '******',
                'level' => $this->user_model->level(),
                'level_id' => $row['level_id'],
            ];
        }

        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == true) {
            $this->user_model->update($id);
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('user/form', $data);
            $this->load->view('template/footer');
        }
    }

    public function delete($id)
    {
        $this->user_model->delete($id);
    }
}

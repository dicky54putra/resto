<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('meja_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Kategori makanan',
            'mejaall' => $this->meja_model->getAll(),
        ];
        if ($this->input->post('keyword')) {
            $data['mejaall'] = $this->meja_model->search();
        }
        $this->load->view('template/header', $data);
        $this->load->view('meja/index', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $data = [
            'title' => 'Insert meja',
            'action' => '',
            'nama' => '',
        ];

        $this->form_validation->set_rules('meja_nama', 'nomer meja', 'required');

        if ($this->form_validation->run() == true) {
            $this->meja_model->insert();
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('meja/form', $data);
            $this->load->view('template/footer');
        }
    }

    public function update($id)
    {
        $row = $this->meja_model->getById($id);
        if ($row) {
            $data = [
                'title' => 'Update meja',
                'action' => '',
                'nama' => set_value('meja_nama', $row['no_nama'])
            ];
        }

        $this->form_validation->set_rules('meja_nama', 'nomer meja', 'required');

        if ($this->form_validation->run() == true) {
            $this->meja_model->update($id);
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('meja/form', $data);
            $this->load->view('template/footer');
        }
    }

    public function delete($id)
    {
        $this->meja_model->delete($id);
    }
}

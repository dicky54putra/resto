<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masakan_kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mk_model');
        if (!$this->session->userdata('login') == 'login') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Kategori makanan',
            'mkall' => $this->mk_model->getAll(),
        ];
        if ($this->input->post('keyword')) {
            $data['mkall'] = $this->mk_model->search();
        }
        $this->load->view('template/header', $data);
        $this->load->view('mk/index', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $data = [
            'title' => 'Insert kategori makanan',
            'action' => '',
            'nama' => '',
        ];

        $this->form_validation->set_rules('mk_nama', 'nama mkategori makanan', 'required');

        if ($this->form_validation->run() == true) {
            $this->mk_model->insert();
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('mk/form', $data);
            $this->load->view('template/footer');
        }
    }

    public function update($id)
    {
        $row = $this->mk_model->getById($id);
        if ($row) {
            $data = [
                'title' => 'Update kategori makanan',
                'action' => '',
                'nama' => set_value('mk_nama', $row['mk_nama'])
            ];
        }

        $this->form_validation->set_rules('mk_nama', 'nama mk', 'required');

        if ($this->form_validation->run() == true) {
            $this->mk_model->update($id);
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('mk/form', $data);
            $this->load->view('template/footer');
        }
    }

    public function delete($id)
    {
        $this->mk_model->delete($id);
    }
}

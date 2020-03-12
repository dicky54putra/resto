<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('masakan_model');
        if (!$this->session->userdata('login') == 'login') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman masakan',
            'masakanall' => $this->masakan_model->getAll(),
        ];
        if ($this->input->post('keyword')) {
            $data['masakanall'] = $this->masakan_model->search();
        }
        $this->load->view('template/header', $data);
        $this->load->view('masakan/index', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $data = [
            'title' => 'Insert masakan',
            'action' => site_url('masakan/insert'),
            'mk' => $this->masakan_model->mk(),
            'nama' => '',
            'harga' => '',
            'status' => ''
        ];

        $this->form_validation->set_rules('masakan_nama', 'nama masakan', 'required');
        $this->form_validation->set_rules('masakan_harga', 'harga masakan', 'required');

        if ($this->form_validation->run() == true) {
            $this->masakan_model->insert();
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('masakan/form', $data);
            $this->load->view('template/footer');
        }
    }

    public function update($id)
    {
        $row = $this->masakan_model->getById($id);
        if ($row) {
            $data = [
                'title' => 'Update masakan',
                'action' => '',
                'nama' => set_value('masakan_nama', $row['masakan_nama']),
                'harga' => set_value('masakan_nama', $row['masakan_harga']),
                'mk' => $this->masakan_model->mk(),
                'mk_id' => $row['mk_id'],
                'status' => set_value('status', $row['masakan_status'])
            ];
        }

        $this->form_validation->set_rules('masakan_nama', 'nama masakan', 'required');
        $this->form_validation->set_rules('masakan_harga', 'harga masakan', 'required');

        if ($this->form_validation->run() == true) {
            $this->masakan_model->update($id);
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('masakan/form', $data);
            $this->load->view('template/footer');
        }
    }

    public function delete($id)
    {
        $this->masakan_model->delete($id);
    }
}

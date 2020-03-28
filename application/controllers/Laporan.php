<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_model');
        if ($this->session->userdata('login') != 'login') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman laporan',
            'hidden' => 'hidden',
            'laporan' => $this->laporan_model->getAll(),
            'total' => $this->laporan_model->getTotal()
        ];
        if (!empty($this->input->get('tglawal') && $this->input->get('tglawal'))) {
            $data = [
                'title' => 'Halaman laporan',
                'hidden' => '',
                'laporan' => $this->laporan_model->search(),
                'total' => $this->laporan_model->getTotal()
            ];
        }
        $this->load->view('template/header', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('template/footer');
    }
}

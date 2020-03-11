<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('masakan_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman masakan',
            'masakanall' => $this->masakan_model->getAllMasakan()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('masakan/index', $data);
        $this->load->view('template/footer');
    }
}

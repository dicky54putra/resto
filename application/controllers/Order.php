<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        if (!$this->session->userdata('login')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman order',
            'orderall' => $this->order_model->getAllOrder(),
            'user' => $this->db->get_where('user', ['user_username' => $this->session->userdata('user_username')])->row_array()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('order/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah_order()
    {
        $data = [
            'title' => 'Halaman tambah order',
            'user' => $this->db->get_where('user', ['user_username' => $this->session->userdata('user_username')])->row_array()
        ];

        $this->form_validation->set_rules('no_meja', 'nomor meja', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('order/tambah_order', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'no_meja' => $this->input->post('no_meja'),
                'order_tanggal' => date('d/m/y'),
                'user_id' => $data['user']['user_id'],
                'order_keterangan' => $this->input->post('order_keterangan'),
                'order_status' => 0,
            ];
            // var_dump($data);
            // die;
            $this->db->insert('order', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success"> Orderan Berhasil!</div>');
            redirect('order/index');
        }
    }

    public function od($id)
    {
        $data = [
            'title' => 'Halaman tambah order detail',
            'user' => $this->db->get_where('user', ['user_username' => $this->session->userdata('user_username')])->row_array()
        ];
        $this->load->view('template/header', $data);
        $this->load->view('order/tambah_order', $data);
        $this->load->view('template/footer');
    }
}

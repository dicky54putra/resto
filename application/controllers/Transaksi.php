<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        if (!$this->session->userdata('login') == 'login') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman transaksi',
            'mejaall' => $this->transaksi_model->getMejaAll()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $order = $this->transaksi_model->getOrderByID($id);
        $this->db->select_sum('od_harga');
        $q = $this->db->get_where('order_detail', ['order_id' => $order['order_id']])->row_array();
        $data = [
            'title' => 'Halaman transaksi',
            'meja_no' => $id,
            'od' => $this->transaksi_model->getAllOd($id),
            'total_harga' => $q,
            'order' => $order
        ];

        $this->form_validation->set_rules('bayar', 'uang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('transaksi/detail', $data);
            $this->load->view('template/footer');
        } else {
            $uang = $this->input->post('bayar');
            if ($uang < $data['total_harga']['od_harga']) {
                $k = (int) $data['total_harga']['od_harga'] - (int) $uang;
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert"><strong> Uangnya kurang Rp.' . $k . ' bro!</strong></div>');
                redirect('transaksi/detail/' . $id);
            } else {
                $data = [
                    'user_id' => $order['user_id'],
                    'order_id' => $order['order_id'],
                    'transaksi_tanggal' => date('Y-m-d'),
                    'transaksi_total_bayar' => $data['total_harga']['od_harga'],
                    'uang_bayar' => $this->input->post('bayar'),
                    'uang_kembali' => $this->input->post('bayar') - $data['total_harga']['od_harga']
                ];
                // var_dump($data);
                // die;
                $this->db->insert('transaksi', $data);
                $this->db->where('meja_no', $id);
                $this->db->update('meja', ['meja_status' => 1]);
                redirect('transaksi/detail/' . $id);
            }
        }
    }

    public function struk($id)
    {
        $d = [
            'tr' => $this->transaksi_model->getTransByID($id),
            'od' => $this->transaksi_model->getOd($id)
        ];
        $this->load->view('transaksi/struk', $d);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        if (!$this->session->userdata('login') == 'login') {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman order',
            'mejaall' => $this->order_model->getAllMeja(),
            'user' => $this->session->userdata('user_id')
        ];

        $this->load->view('template/header', $data);
        $this->load->view('order/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah_order()
    {
        $data = [
            'meja_id' => $this->input->post('meja_id'),
            'order_tanggal' => date('Y-m-d'),
            'user_id' => $this->input->post('user_id'),
            'order_keterangan' => $this->input->post('keterangan'),
            'order_status' => 0
        ];
        // var_dump($data);
        // die;
        $this->db->insert('order', $data);
        $this->db->where('meja_id', $this->input->post('meja_id'));
        $this->db->update('meja', ['meja_status' => 0]);
        redirect('order/detail/' . $this->input->post('meja_no'));
    }

    public function detail($id)
    {
        $order = $this->order_model->getOrderByID($id);
        $this->db->select_sum('od_harga');
        $query = $this->db->get_where('order_detail', ['order_id' => $order['order_id']])->row_array();
        $data = [
            'title' => 'Halaman order',
            'mejaall' => $this->order_model->getAllMeja(),
            'meja_no' => $id,
            'keterangan' => $order['order_keterangan'],
            'order_id' => $order['order_id'],
            'masakan' => $this->order_model->getAllMasakan(),
            'od' => $this->order_model->getAllOd($id),
            'total_harga' => $query,
        ];
        // var_dump($data);
        // die;

        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('order/detail', $data);
            $this->load->view('template/footer');
        } else {
            $masakan = $this->db->get_where('masakan', ['masakan_id' => $this->input->post('masakan')])->row_array();
            $data = [
                'masakan_id' => $this->input->post('masakan'),
                'order_id' => $this->input->post('order_id'),
                'od_jumlah' => $this->input->post('jumlah'),
                'od_harga' => $this->input->post('jumlah') * $masakan['masakan_harga'],
                'od_keterangan' => $this->input->post('keterangan'),
            ];
            // var_dump($data);
            // die;
            $this->db->insert('order_detail', $data);
            redirect('order/detail/' . $id);
        }

        if (!empty($this->uri->segment(4))) {
            $this->db->delete('order_detail', ['od_id' => $this->uri->segment(4)]);;
            redirect('order/detail/' . $id);
        }
    }


    // public function hapus_detail($id)
    // {
    //     $id2 = $this->uri->segment(3);
    // }
}

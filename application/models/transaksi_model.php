<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_model extends CI_Model
{
    public function getMejaAll()
    {
        return $this->db->get_where('meja', ['meja_status' => 0])->result_array();
    }

    public function getOrderByID($id)
    {
        return $this->db->get_where('order', ['meja_id' => $id])->row_array();
    }
    public function getAllOd($id)
    {
        $order = $this->transaksi_model->getOrderByID($id);
        return $this->db->get_where('od_view', ['order_id' => $order['order_id']])->result_array();
    }

    public function getTransByID($id)
    {
        $this->db->select('transaksi_id, user_nama, meja_no, order.order_id, transaksi_tanggal, transaksi_total_bayar, uang_bayar, uang_kembali');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.user_id=user.user_id', 'INNER')->join('order', 'transaksi.order_id=order.order_id', 'INNER')->join('meja', 'order.meja_id=meja.meja_id', 'INNER');
        return $this->db->get()->row_array();
    }

    public function getOd($id)
    {
        return $this->db->get_where('od_view', ['order_id' => $id])->result_array();
    }
}

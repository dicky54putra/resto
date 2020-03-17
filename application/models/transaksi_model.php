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
}

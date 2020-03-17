<?php
defined('BASEPATH') or exit('No direct script access allowed');

class order_model extends CI_Model
{
    public function getAllMeja()
    {
        return $this->db->get_where('meja', ['meja_status' => 1])->result_array();
    }

    public function getOrderById($id)
    {
        return $this->db->get_where('order', ['meja_id' => $id])->row_array();
    }

    public function getAllMasakan()
    {
        return $this->db->get('masakan')->result_array();
    }

    public function getAllOd($id)
    {
        $order = $this->order_model->getOrderByID($id);
        return $this->db->get_where('od_view', ['order_id' => $order['order_id']])->result_array();
    }
    public function totalHarga($id)
    {
        $order = $this->order_model->getOrderByID($id);
        $this->db->select_sum('od_harga');
        $query = $this->db->get_where('order_detail', ['order_id' => $order['order_id']])->row_array();
    }
}

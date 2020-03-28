<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan_model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('transaksi_id, user_nama, order_keterangan, transaksi_tanggal, transaksi_total_bayar, uang_bayar, uang_kembali, meja_no');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.user_id=user.user_id', 'INNER')->join('order', 'transaksi.order_id=order.order_id', 'inner')->join('meja', 'order.meja_id=meja.meja_id', 'inner');
        return $this->db->get()->result_array();
    }

    public function getTotal()
    {
        $tglawal = $this->input->get('tglawal');
        $tglakhir = $this->input->get('tglakhir');
        $this->db->select_sum('transaksi_total_bayar');
        $this->db->where('transaksi_tanggal >=', $tglawal);
        $this->db->where('transaksi_tanggal <=', $tglakhir);
        return $this->db->get('transaksi')->row_array();
    }

    public function search()
    {
        $tglawal = $this->input->get('tglawal');
        $tglakhir = $this->input->get('tglakhir');
        $this->db->select('transaksi_id, user_nama, order_keterangan, transaksi_tanggal, transaksi_total_bayar, uang_bayar, uang_kembali, meja_no');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.user_id=user.user_id', 'INNER')->join('order', 'transaksi.order_id=order.order_id', 'inner')->join('meja', 'order.meja_id=meja.meja_id', 'inner');
        $this->db->where('transaksi_tanggal >=', $tglawal);
        $this->db->where('transaksi_tanggal <=', $tglakhir);
        return $this->db->get()->result_array();
    }
}

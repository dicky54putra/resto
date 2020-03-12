<?php
defined('BASEPATH') or exit('No direct script access allowed');

class masakan_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('masakan_view')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('masakan', ['masakan_id' => $id])->row_array();
    }

    public function mk()
    {
        return $this->db->get('masakan_kategori')->result_array();
    }

    public function search()
    {
        $key = $this->input->post('keyword', true);
        $this->db->like('masakan_nama', $key);
        $this->db->or_like('masakan_harga', $key);
        $this->db->or_like('mk_nama', $key);
        return $this->db->get('masakan_view')->result_array();
    }

    public function insert()
    {
        $data = [
            'masakan_nama' => $this->input->post('masakan_nama'),
            'masakan_harga' => $this->input->post('masakan_harga'),
            'mk_id' => $this->input->post('mk'),
            'masakan_status' => $this->input->post('masakan_status')
        ];
        // var_dump($data);
        // die;
        $this->db->insert('masakan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil ditambahkan!</strong></div>');
        redirect('masakan');
    }

    public function update($id)
    {
        $data = [
            'masakan_nama' => $this->input->post('masakan_nama'),
            'masakan_harga' => $this->input->post('masakan_harga'),
            'mk_id' => $this->input->post('mk'),
            'masakan_status' => $this->input->post('masakan_status')
        ];
        // var_dump($data);
        // die;
        $this->db->where('masakan_id', $id);
        $this->db->update('masakan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil diperbarui!</strong></div>');
        redirect('masakan');
    }

    public function delete($id)
    {
        $this->db->delete('masakan', ['masakan_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil dihapus!</strong></div>');
        redirect('masakan');
    }
}

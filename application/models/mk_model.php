<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mk_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('masakan_kategori')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('masakan_kategori', ['mk_id' => $id])->row_array();
    }

    public function search()
    {
        $key = $this->input->post('keyword', true);
        $this->db->like('mk_nama', $key);
        return $this->db->get('masakan_kategori')->result_array();
    }

    public function insert()
    {
        $data = [
            'mk_nama' => $this->input->post('mk_nama'),
        ];
        // var_dump($data);
        // die;
        $this->db->insert('masakan_kategori', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil ditambahkan!</strong></div>');
        redirect('masakan_kategori');
    }

    public function update($id)
    {
        $data = [
            'mk_nama' => $this->input->post('mk_nama')
        ];
        // var_dump($data);
        // die;
        $this->db->where('mk_id', $id);
        $this->db->update('masakan_kategori', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil diperbarui!</strong></div>');
        redirect('masakan_kategori');
    }

    public function delete($id)
    {
        $this->db->delete('masakan_kategori', ['mk_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil dihapus!</strong></div>');
        redirect('masakan_kategori');
    }
}

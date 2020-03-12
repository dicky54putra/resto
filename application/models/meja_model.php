<?php
defined('BASEPATH') or exit('No direct script access allowed');

class meja_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('meja')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('meja', ['meja_id' => $id])->row_array();
    }

    public function search()
    {
        $key = $this->input->post('keyword', true);
        $this->db->like('meja_no', $key);
        return $this->db->get('meja')->result_array();
    }

    public function insert()
    {
        $data = [
            'meja_no' => $this->input->post('meja_nama'),
        ];
        // var_dump($data);
        // die;
        $this->db->insert('meja', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil ditambahkan!</strong></div>');
        redirect('meja');
    }

    public function update($id)
    {
        $data = [
            'meja_no' => $this->input->post('meja_nama')
        ];
        // var_dump($data);
        // die;
        $this->db->where('meja_id', $id);
        $this->db->update('meja', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil diperbarui!</strong></div>');
        redirect('meja');
    }

    public function delete($id)
    {
        $this->db->delete('meja', ['meja_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil dihapus!</strong></div>');
        redirect('meja');
    }
}

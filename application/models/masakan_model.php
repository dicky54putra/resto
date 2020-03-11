<?php
defined('BASEPATH') or exit('No direct script access allowed');

class masakan_model extends CI_Model
{
    public function getAllMasakan()
    {
        return $this->db->get('masakan_view')->result_array();
    }

    public function getMasakanById($id)
    {
        return $this->db->get_where('masakan', ['masakan_id' => $id])->row_array();
    }

    public function insert()
    {
        $data = [
            'masakan_nama' => '',
            'masakan_harga' => '',
            'mk_id' => '',
            'masakan_status' => 1
        ];
        $this->db->insert('masakan', $data);
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
        redirect('masakan');
    }

    public function update($id)
    {
        $data = [
            'masakan_nama' => '',
            'masakan_harga' => '',
            'mk_id' => '',
            'masakan_status' => ''
        ];
        $this->db->where('masakan_id', $id);
        $this->db->update('masakan', $data);
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
        redirect('masakan');
    }

    public function delete($id)
    {
        $this->db->delete('masakan', ['masakan_id' => $id]);
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
        redirect('masakan');
    }
}

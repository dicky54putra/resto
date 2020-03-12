<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('user_view')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('user', ['user_id' => $id])->row_array();
    }

    public function level()
    {
        return $this->db->get('level')->result_array();
    }

    public function search()
    {
        $key = $this->input->post('keyword', true);
        $this->db->like('user_nama', $key);
        $this->db->or_like('user_username', $key);
        $this->db->or_like('level_nama', $key);
        return $this->db->get('user_view')->result_array();
    }

    public function insert()
    {
        $data = [
            'user_nama' => $this->input->post('user_nama'),
            'user_username' => $this->input->post('user_username'),
            'user_password' => $this->input->post('user_password'),
            'level_id' => $this->input->post('level')
        ];
        // var_dump($data);
        // die;
        $this->db->insert('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil ditambahkan!</strong></div>');
        redirect('user');
    }

    public function update($id)
    {
        $data = [
            'level_id' => $this->input->post('level')
        ];
        // var_dump($data);
        // die;
        $this->db->where('user_id', $id);
        $this->db->update('user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil diperbarui!</strong></div>');
        redirect('user');
    }

    public function delete($id)
    {
        $this->db->delete('user', ['user_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Data berhasil dihapus!</strong></div>');
        redirect('user');
    }
}

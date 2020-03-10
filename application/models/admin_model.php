<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function getAllLevel()
    {
        return $this->db->get('level')->result_array();
    }
    public function getMasakanById($id)
    {
        return $this->db->get_where('masakan', ['masakan_id' => $id])->row_array();
    }
    public function tambah_masakan()
    {
        $data = [
            'masakan_nama' => $this->input->post('masakan_nama'),
            'masakan_harga' => $this->input->post('masakan_harga'),
            'masakan_status' => 1
        ];
        $this->db->insert('masakan', $data);
        redirect('admin/masakan');
    }

    public function tambah_user()
    {
        $data = [
            'user_nama' => $this->input->post('user_nama'),
            'user_username' => $this->input->post('user_username'),
            'user_password' => $this->input->post('user_password'),
            'level_id' => $this->input->post('level_id')
        ];
        var_dump($data);
        die;
        $this->db->insert('user', $data);
        redirect('admin');
    }
}

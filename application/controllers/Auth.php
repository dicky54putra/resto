<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Halaman login'
        ];

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/_header', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('template/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['user_username' => $username])->row_array();

            // cek user apaka usernya ada
            if ($user) {
                if ($password == $user['user_password']) {
                    $data = [
                        'user_nama' => $user['user_nama'],
                        'user_username' => $user['user_username'],
                        'level_id' => $user['level_id'],
                        'login' => 'login'
                    ];
                    $this->session->set_userdata($data);
                    redirect('masakan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert"><strong> Password salah!</strong></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert"><strong> Username salah!</strong></div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $data = [
            'user_nama' => 'user_nama',
            'user_username' => 'user_username',
            'level_id' => 'level_id',
            'login' => 'login'
        ];
        $this->session->unset_userdata($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert"><strong> Logout berhasil!</strong></div>');
        redirect('auth');
    }
}

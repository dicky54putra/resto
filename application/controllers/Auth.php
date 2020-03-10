<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            if ($this->session->userdata('level_id') == 1) {
                redirect('admin');
            }
        }
        $data = [
            'title' => 'Halaman Login'
        ];

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/head', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('template/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['user_username' => $username])->row_array();

            // jika username ada 
            if ($user) {
                if ($password == $user['user_password']) {
                    $data = [
                        'user_username' => $user['user_username'],
                        'level_id' => $user['level_id'],
                        'login' => 'login'
                    ];
                    $this->session->set_userdata($data);

                    if ($user['level_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['level_id'] == 2) {
                        redirect('admin');
                    } elseif ($user['level_id'] == 3) {
                        redirect('admin');
                    } elseif ($user['level_id'] == 4) {
                        redirect('admin');
                    } elseif ($user['level_id'] == 5) {
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger"> Password salah!</div>');
                    redirect('auth/index');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger"> Username tidak ada!</div>');
                redirect('auth/index');
            }
        }
    }

    public function logout()
    {
        $data = ['user_username', 'level_id', 'login'];
        $this->session->unset_userdata($data);
        $this->session->set_flashdata('message', 'berhasil logout.');
        redirect('auth');
    }
}

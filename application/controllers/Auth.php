<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->get_by_username($username);

            if ($user && password_verify($password, $user->password)) {
                $this->session->set_userdata('user_id', $user->id);
                // Cek role
                if ($user->role_id == 1) {
                    redirect('admin/index');
                } elseif ($user->role_id == 2) {
                    redirect('user/index');
                } else {
                    $this->session->set_flashdata('error', 'Role tidak dikenal.');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau password salah');
                redirect('auth/login');
            }
        }

        $this->load->view('auth/login');
    }

    public function register()
    {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data = [
                'username' => $username,
                'password' => $password,
                'role_id' => 2 // Default role
            ];

            $this->User_model->insert_user($data);
            $this->session->set_flashdata('success', 'Registrasi berhasil, silakan login');
            redirect('auth/login');
        }

        $this->load->view('auth/register');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}

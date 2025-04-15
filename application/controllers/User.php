<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Candidate_model', 'Vote_model']);
        $this->load->library('session');
    }

    public function index()
    {
        // Cek sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');

        // Cek apakah sudah memilih
        if ($this->Vote_model->has_voted($user_id)) {
            $data['voted'] = true;
            $data['candidate'] = $this->Vote_model->get_vote_by_user($user_id);
        } else {
            $data['voted'] = false;
            $data['candidates'] = $this->Candidate_model->get_all();
        }

        $this->load->view('user/index', $data);
    }

    public function pilih($candidate_id)
    {
        $user_id = $this->session->userdata('user_id');

        if (!$this->Vote_model->has_voted($user_id)) {
            $this->Vote_model->insert_vote($user_id, $candidate_id);
        }

        redirect('user');
    }

    public function hasil()
    {
        $data['results'] = $this->Vote_model->get_vote_count();
        $this->load->view('user/result', $data);
    }
}

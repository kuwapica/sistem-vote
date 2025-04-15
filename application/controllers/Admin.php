<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Candidate_model');
    }

    public function index()
    {
        $data['candidate'] = $this->Candidate_model->get_all();
        $this->load->view('admin/index', $data);
    }

    public function tambah()
    {
        $this->load->view('admin/tambah');
    }

    public function simpan()
    {
        $data = [
            'nama_kandidat' => $this->input->post('nama_kandidat'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi')
        ];
        $this->Candidate_model->insert($data);
        redirect('admin');
    }

    public function edit($id)
    {
        $data['k'] = $this->Candidate_model->get($id);
        $this->load->view('admin/tambah', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_kandidat' => $this->input->post('nama_kandidat'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi')
        ];
        $this->Candidate_model->update($id, $data);
        redirect('admin');
    }

    public function hapus($id)
    {
        $this->Candidate_model->delete($id);
        redirect('admin');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peran_pengguna extends CI_Controller 
{
  private $profile;

  public function __construct()
	{
		parent::__construct();

        if (!$this->session->has_userdata('pengguna_id')) {
            $this->session->set_flashdata('error', 'silahkan login terlebih dahulu');
            redirect('auth/login');
        }

        $this->profile = $this->profile_model->getByIdQuery($this->session->userdata('pengguna_id'));

        $this->load->model('peran_pengguna_model');
      
	}

    public function index()
    {
    

        $data = [
          'judul' => 'Data Peran Pengguna',
          'profile' => $this->profile,
           'peran_penggunas' => $this->peran_pengguna_model->getAll()
         ];

    $this->load->view('layout/header', $data);
    $this->load->view('layout/topbar');
    $this->load->view('layout/sidebar');
    $this->load->view('peran_pengguna/index');
    $this->load->view('layout/footer');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();

        $this->load->model('profile_model');

        if (!$this->session->has_userdata('pengguna_id')) {
            $this->session->set_flashdata('error', 'silahkan login terlebih dahulu');
            redirect('auth/login');
        }

        $this->profile = $this->profile_model->getByIdQuery($this->session->userdata('pengguna_id'));
        

	}

    public function index()
    {
        
        $data = [
            'judul' => 'Profile',
            'profile' => $this->profile
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('profile/index');
        $this->load->view('layout/footer');
    }
}
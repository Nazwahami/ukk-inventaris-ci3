<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
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

        $this->load->model('dashboard_model');
        

	}

    public function index()
    {

        
        $data = [
            'judul' => 'Dashboard',
            'profile' => $this->profile,
            'count_kategori' => $this->dashboard_model->count_kategori(),
            'count_satuan' => $this->dashboard_model->count_satuan(),
            'count_barang' => $this->dashboard_model->count_barang(),
            'count_pengguna' => $this->dashboard_model->count_pengguna(),
        ];

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('dashboard/index');
        $this->load->view('layout/footer');
    }
}
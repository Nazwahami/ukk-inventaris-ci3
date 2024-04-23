<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller 
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
		

		$this->load->model('pengguna_model');
        $this->load->model('peran_pengguna_model');
	}

	
	public function index()
	{

		$data = [
			'judul' => 'Data Pengguna',
			'profile' => $this->profile,
			'penggunas' => $this->pengguna_model->getAllQuery()
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('pengguna/index');
		$this->load->view('layout/footer');
	}

    public function create()
	{

		$data = [
			'judul' => 'Tambah Pengguna',
			'profile' => $this->profile
		];

        $this->form_validation->set_rules([
            [
                'field'  => 'nama_pengguna',
				'label'  => 'Nama Pengguna',
				'rules'  => 'trim|required',
				'errors' => [
					        'required'  => '%s tidak boleh kosong',
					        ]
            ],
            [
                'field'  => 'email',
                'label'  => 'Email',
                'rules'  => 'trim|required|valid_email|is_unique[pengguna.email]',
                'errors' => [
                    'required'  => '%s tidak boleh kosong',
                    'valid_email' => 'Format %s tidak valid',
                    'is_unique' => '%s sudah ada',
                ]
            ],
            [
                'field'  => 'password',
                'label'  => 'Password',
                'rules'  => 'trim|required|min_length[6]',
                'errors' => [
                    'required' => '%s tidak boleh kosong',
                    'min_length' => '%s minimal 6 karakter',
                ]
            ]
        ]);


        if ($this->form_validation->run() == false) {
		$this->load->view('layout/header', $data);
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('pengguna/create');
		$this->load->view('layout/footer');
        } else {
            $this->pengguna_model->save();
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('pengguna');
        }
	}

    public function edit($id = null)
	{

		if ($id == null) {
			redirect('pengguna');
		}

		$pengguna = $this->pengguna_model->getByIdQuery($id);

		if ($pengguna == null){
			redirect('pengguna');
		}

		$data = [
			'judul' => 'Edit Pengguna',
			'profile' => $this->profile,
			'pengguna' => $pengguna

		];

        $this->form_validation->set_rules([
            [
                'field'  => 'password',
                'label'  => 'Password',
                'rules'  => 'trim|required|min_length[6]',
                'errors' => [
                    'required' => '%s tidak boleh kosong',
                    'min_length' => '%s minimal 6 karakter'
                ]
            ]
        ]);

        if ($this->form_validation->run() == false) {
        $this->load->view('layout/header', $data);
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('pengguna/edit');
		$this->load->view('layout/footer');
        } else {
            $this->pengguna_model->update($id);
            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('pengguna');
        }
    }

    public function delete($id = null)
	{

		if ($id == null) {
			redirect('pengguna');
		}

		$pengguna = $this->pengguna_model->getByIdQuery($id);

		if ($pengguna == null){
			redirect('pengguna');
		}

		$this->pengguna_model->delete($id);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('pengguna');
	}
}
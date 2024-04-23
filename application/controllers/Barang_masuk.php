<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends CI_Controller 
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
        

        $this->load->model('satuan_model');
        $this->load->model('kategori_model');
        $this->load->model('barang_model');
        $this->load->model('barang_masuk_model');
    }

    public function index()
    {
        $data = [
            'judul' => 'Data Barang Masuk',
            'profile' => $this->profile,
            'kategoris' => $this->kategori_model->getAll(),
            'satuans' => $this->satuan_model->getAll(),
            'barang_masuks' => $this->barang_masuk_model->getAllQuery()
        ];

        $this->load->view('layout/header', $data);
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('barang_masuk/index');
		$this->load->view('layout/footer');
    }

    public function create()
    {
        $data = [
            'judul' => 'Tambah Barang Masuk',
            'profile' => $this->profile,
            'barangs' => $this->barang_model->getAllQuery()
        ];

        $this->form_validation->set_rules([
            [
                'field'  => 'barang_id',
                'label'  => 'Nama Barang',
                'rules'  => 'trim|required',
                'errors' => [
                    'required'  => '%s tidak boleh kosong'
                ]
            ],
                
            [
                'field'  => 'jumlah',
                'label'  => 'Jumlah',
                'rules'  => 'trim|required',
                'errors' => [
                    'required'  => '%s tidak boleh kosong',
                ]
            ],
            [
                'field'  => 'tanggal_masuk',
                'label'  => 'Tanggal Masuk',
                'rules'  => 'trim|required',
                'errors' => [
                    'required'  => '%s tidak boleh kosong',
                ]
            ],

        ]
        );

        if ($this->form_validation->run() == false) {
        $this->load->view('layout/header', $data);
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('barang_masuk/create');
		$this->load->view('layout/footer');
        } else {
            $this->barang_masuk_model->save();
            $barang_id = htmlspecialchars(trim($this->input->post('barang_id')));
            $jumlah = htmlspecialchars(trim($this->input->post('jumlah')));
            $this->barang_masuk_model->update_stock($barang_id, $jumlah);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('barang_masuk');

        }
    }


}
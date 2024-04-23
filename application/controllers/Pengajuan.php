<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller 
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
        $this->load->model('pengajuan_model');
    }

    public function index()
    {
        if ($this->profile->peran_pengguna == 'user') {
            $pengajuans = $this->pengajuan_model->getAllQueryAdmin();
        } else {
            $pengajuans = $this->pengajuan_model->getAllQueryMember($this->profile->id);
        }
        $data = [
            'judul' => 'Data Pengajuan',
            'profile' => $this->profile,
            'kategoris' => $this->kategori_model->getAll(),
            'satuans' => $this->satuan_model->getAll(),
            'pengajuans' => $pengajuans
        ];

        $this->load->view('layout/header', $data);
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('pengajuan/index');
		$this->load->view('layout/footer');
    }

    public function create()
    {
        $data = [
            'judul' => 'Tambah Pengajuan',
            'profile' => $this->profile,
            'barangs' => $this->barang_model->getAllQuery()
        ];

        if ($this->input->method() == 'post'){
            $barang_id = htmlspecialchars(trim($this->input->post('barang_id')));
            $barang = $this->barang_model->getByIdQuery($barang_id);
            $stok = $barang != null ? $barang->stok : 0;
        } else {
            $stok = 0;
        }

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
                'rules'  => 'trim|required|greater_than[0]|less_than_equal_to['. $stok .']',
                'errors' => [
                    'required'  => '%s tidak boleh kosong',
                    'greater_than' => '%s tidak boleh nol',
                    'less_than_equal_to' => '%s melebihi dari stok'
                ]
                ]

            
            ]);

        if ($this->form_validation->run() == false) {
        $this->load->view('layout/header', $data);
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('pengajuan/create');
		$this->load->view('layout/footer');
        } else {
            $this->pengajuan_model->save();
            $this->pengajuan_model->update_stok();
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('pengajuan');
        }
    }

    public function disetujui($id = null)
    {
        if ($this->profile->peran_pengguna == 'anggota') {
            redirect('dashboard');
        }

        if ($id == null) {
            redirect('pengajuan');
        }

        $pengajuan = $this->pengajuan_model->getByIdQuery($id);

        if ($pengajuan == null){
            redirect('pengajuan');
        }

        $this->pengajuan_model->disetujui($id);
        $this->session->set_flashdata('success', 'Data pengajuan berhasil disetujui');
        redirect('pengajuan/index/' . $id);
    }

}
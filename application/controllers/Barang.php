<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller 
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
		

		$this->load->model('barang_model');
		$this->load->model('kategori_model');
		$this->load->model('satuan_model');
	}

	
	public function index()
	{

		$data = [
			'judul' => 'Data Barang',
			'profile' => $this->profile,
			'barangs' => $this->barang_model->getAllQuery()
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('barang/index');
		$this->load->view('layout/footer');
	}

	public function create()
	{

		$data = [
			'judul' 	=> 'Tambah Barang',
			'profile' => $this->profile,
			'kategoris' => $this->kategori_model->getAll(),
			'satuans'   => $this->satuan_model->getAll(),
		];

		$this->form_validation->set_rules([
				[
					'field'  => 'nama_barang',
					'label'  => 'Nama Barang',
					'rules'  => 'trim|required|is_unique[barang.nama_barang]',
					'errors' => [
						'required'  => '%s tidak boleh kosong',
						'is_unique' => '%s sudah ada.'
					]
				],
					
				[
					'field'  => 'merk',
					'label'  => 'Merk',
					'rules'  => 'trim|required',
					'errors' => [
						'required'  => '%s tidak boleh kosong',
					]
				],
				[
					'field'  => 'satuan_id',
					'label'  => 'Satuan',
					'rules'  => 'trim|required',
					'errors' => [
						'required'  => '%s tidak boleh kosong',
					]
				],
				[
					'field'  => 'kategori_id',
					'label'  => 'Kategori',
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
			$this->load->view('barang/create');
			$this->load->view('layout/footer');
		} else {
			$this->barang_model->save();
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan.');
			redirect('barang');
		}
		
	}

	public function edit($id = null)
	{

		if ($id == null) {
			redirect('barang');
		}

		$barang = $this->barang_model->getByIdQuery($id);

		if ($barang == null){
			redirect('barang');
		}

		$data = [
			'judul' => 'Edit Barang',
			'profile' => $this->profile,
			'barang' => $barang,
			'satuans' => $this->satuan_model->getAll(),
			'kategoris' => $this->kategori_model->getAll()

		];

		if ($this->input->method() == 'post') {
			$rules_nama_barang = $barang->nama_barang == htmlspecialchars(trim($this->input->post('nama_barang'))) ? 'trim|required' : 'trim|required|is_unique[barang.nama_barang]';
		

		$this->form_validation->set_rules([
			 [
				'field' => 'nama_barang', 
				'label' => 'Nama Barang',
				'rules' => $rules_nama_barang,
				'errors' => [
					'required' => '%s wajib diisi',
					'is_unique' => '%s sudah ada.'
				]
			],
			[
				'field' => 'merk', 
				'label' => 'Merk',
				'rules' => 'trim|required',
				'errors' => [
					'required' => '%s wajib diisi'
				]
			],
			[
				'field' => 'satuan_id', 
				'label' => 'Satuan',
				'rules' => 'trim|required',
				'errors' => [
					'required' => '%s wajib diisi'
				]
			],
			[
				'field' => 'kategori_id', 
				'label' => 'Kategori',
				'rules' => 'trim|required',
				'errors' => [
					'required' => '%s wajib diisi'
				]
			]
		]);
	}

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('barang/edit');
			$this->load->view('layout/footer');
		}
		else {
			$this->barang_model->update_data($id);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('barang');
		}
	}

	public function delete($id = null)
	{

		if ($id == null) {
			redirect('barang');
		}

		$barang = $this->barang_model->getByIdQuery($id);

		if ($barang == null){
			redirect('barang');
		}

		$this->barang_model->delete($id);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('barang');
	}
}

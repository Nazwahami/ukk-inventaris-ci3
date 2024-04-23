<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller 
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
		
		
		$this->load->model('kategori_model');
	}

	
	public function index()
	{

		$data = [
			'judul' => 'Data Kategori',
			'profile' => $this->profile,
			'kategoris' => $this->kategori_model->getAll()
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('kategori/index');
		$this->load->view('layout/footer');
	}

	public function create()
	{

		$data = [
			'judul' => 'Tambah Kategori',
			'profile' => $this->profile
		];

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required|is_unique[kategori.nama_kategori]', ['required'=> '%s tidak boleh kosong', 'is_unique' => '%s sudah ada.']);
		
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('kategori/create');
			$this->load->view('layout/footer');
		} else {
			$this->kategori_model->save();
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan.');
			redirect('kategori');
		}
		
	}

	public function edit($id = null)
	{

		if ($id == null) {
			redirect('kategori');
		}

		$kategori = $this->kategori_model->getById($id);

		if ($kategori == null){
			redirect('kategori');
		}

		$data = [
			'judul' => 'Edit Kategori',
			'profile' => $this->profile,
			'kategori' => $kategori
		];

		$rules = $kategori->nama_kategori == htmlspecialchars(trim($this->input->post('nama_kategori'))) ? 'trim|required' : 'trim|required|is_unique[kategori.nama_kategori]';

		$this->form_validation->set_rules([
			 [
				'field' => 'nama_kategori', 
				'label' => 'Nama Kategori',
				'rules' => $rules,
				'errors' => [
					'required' => '%s wajib diisi',
					'is_unique' => '%s sudah ada.'
				]
			]
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('kategori/edit');
			$this->load->view('layout/footer');
		}
		else {
			$this->kategori_model->update($id);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('kategori');
		}
	}

	public function delete($id = null)
	{
		$this->load->model('barang_model');

		if ($id == null) {
			redirect('kategori');
		}

		$kategori = $this->kategori_model->getById($id);

		if ($kategori == null){
			redirect('kategori');
		}
		$count_kategori = $this->barang_model->getCountKategori($id);

		if ($count_kategori > 0){
			$this->session->set_flashdata('error', 'Data Kategori tidak dapat dihapus karena sedang digunakan pada data barang');
			redirect('kategori');
		} else {

		$this->kategori_model->delete($id);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('kategori');
		}
	}
}

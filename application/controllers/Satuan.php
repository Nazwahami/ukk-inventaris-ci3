<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller 
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
	}

	
	public function index()
	{

		$data = [
			'judul' => 'Data Satuan',
			'profile' => $this->profile,
			'satuans' => $this->satuan_model->getAll()
		];

		$this->load->view('layout/header', $data);
		$this->load->view('layout/topbar');
		$this->load->view('layout/sidebar');
		$this->load->view('satuan/index');
		$this->load->view('layout/footer');
	}

	public function create()
	{

		$data = [
			'judul' => 'Tambah Satuan',
			'profile' => $this->profile
		];

		$this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'trim|required|is_unique[satuan.nama_satuan]', ['required'=> '%s tidak boleh kosong', 'is_unique' => '%s sudah ada.']);
		
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/topbar');
			$this->load->view('layout/sidebar');
			$this->load->view('satuan/create');
			$this->load->view('layout/footer');
		} else {
			$this->satuan_model->save();
			$this->session->set_flashdata('success', 'Data Berhasil ditambahkan.');
			redirect('satuan');
		}
		
	}

	public function edit($id = null)
	{

		if ($id == null) {
			redirect('satuan');
		}

		$satuan = $this->satuan_model->getById($id);

		if ($satuan == null){
			redirect('satuan');
		}

		$data = [
			'judul' => 'Edit Satuan',
			'profile' => $this->profile,
			'satuan' => $satuan
		];

		$rules = $satuan->nama_satuan == htmlspecialchars(trim($this->input->post('nama_satuan'))) ? 'trim|required' : 'trim|required|is_unique[satuan.nama_satuan]';

		$this->form_validation->set_rules([
			 [
				'field' => 'nama_satuan', 
				'label' => 'Nama Satuan',
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
			$this->load->view('satuan/edit');
			$this->load->view('layout/footer');
		}
		else {
			$this->satuan_model->update($id);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('satuan');
		}
	}

	public function delete($id = null)
	{
		$this->load->model('barang_model');

		if ($id == null) {
			redirect('satuan');
		}

		$satuan = $this->satuan_model->getById($id);

		if ($satuan == null){
			redirect('satuan');
		}

		$count_satuan = $this->barang_model->getCountSatuan($id);

		if ($count_satuan > 0){
			$this->session->set_flashdata('error', 'Data Satuan tidak dapat dihapus karena sedang digunakan pada data barang');
			redirect('satuan');
		} else {
		$this->satuan_model->delete($id);
		$this->session->set_flashdata('success', 'Data Satuan berhasil dihapus');
		redirect('satuan');
		}
	}
}

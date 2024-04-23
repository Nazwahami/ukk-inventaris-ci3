<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    private $_tabel = 'kategori';

    public function getAll()
    {
        return $this->db->get($this->_tabel)->result();
    }


    public function getById($id)
    {
        return $this->db->get_where($this->_tabel, ['id' => $id])->row();
    }

    public function save() {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'created_at' => time(),
            'updated_at' => time()
        ];

        $this->db->insert($this->_tabel, $data);
    }

    public function update($id)
    {
        $data = [
            'nama_kategori' => htmlspecialchars(trim($this->input->post('nama_kategori'))),
            'updated_at' => time()
        ];

        $this->db->update($this->_tabel, $data, ['id' => $id]);
    }

    public function delete($id)
	{
		return $this->db->delete($this->_tabel, ['id' => $id]);
	}
}

?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
    private $_tabel = 'pengguna';

    public function getAllQuery()
    {
        $query = "SELECT pengguna.*, peran_pengguna.peran_pengguna
                  FROM pengguna
                  INNER JOIN peran_pengguna ON pengguna.peran_pengguna_id = peran_pengguna.id";

        return $this->db->query($query)->result();
    }

    public function getByIdQuery($id)
    {
        return $this->db->get_where($this->_tabel, ['id' => $id])->row();
    }

    public function save() {
        $data = [
            'nama_pengguna' => htmlspecialchars(trim($this->input->post('nama_pengguna'))),
            'email' => htmlspecialchars(trim($this->input->post('email'))),
            'password' => password_hash(htmlspecialchars(trim($this->input->post('password'))), PASSWORD_DEFAULT),
            'peran_pengguna_id' => 3, //angota
            'created_at'  => time(),
            'updated_at'  => time()
        ];

        $this->db->insert('pengguna', $data);
    }

    public function update($id)
    {
        $data = [
            'password' => htmlspecialchars(trim($this->input->post('password')))
        ];

        $this->db->update('pengguna', $data, ['id' => $id]);
    }

    public function delete($id)
	{
		return $this->db->delete($this->_tabel, ['id' => $id]);
	}
}
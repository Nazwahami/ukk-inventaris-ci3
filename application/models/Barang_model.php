<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    private $_tabel = 'barang';

    public function getAllQuery()
    {
        $query = "SELECT barang.*, kategori.nama_kategori, satuan.nama_satuan 
                  FROM barang
                  INNER JOIN kategori ON barang.kategori_id = kategori.id
                  INNER JOIN satuan ON barang.satuan_id = satuan.id";

        return $this->db->query($query)->result();
    }


    public function getByIdQuery($id)
    {
        return $this->db->get_where($this->_tabel, ['id' => $id])->row();
    }

    public function save() {
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'merk'        => $this->input->post('merk'),
            'kategori_id' => $this->input->post('kategori_id'),
            'stok'        => 0,
            'satuan_id'   => $this->input->post('satuan_id'),
            'created_at'  => time(),
            'updated_at'  => time()
        ];

        $this->db->insert($this->_tabel, $data);
    }

    public function update_data($id)
    {
        $data = [
            'nama_barang' => htmlspecialchars(trim($this->input->post('nama_barang'))),
            'merk' => htmlspecialchars(trim($this->input->post('merk'))),
            'kategori_id' => htmlspecialchars(trim($this->input->post('kategori_id'))),
            'satuan_id' => htmlspecialchars(trim($this->input->post('satuan_id'))),
            'updated_at' => time()
        ];

        $this->db->update($this->_tabel, $data, ['id' => $id]);
    }

    public function delete($id)
	{
		return $this->db->delete($this->_tabel, ['id' => $id]);
    }

    public function getCountSatuan($satuan_id)
    {
        return $this->db->query("SELECT * FROM barang WHERE satuan_id = $satuan_id")->num_rows();
    }

    public function getCountKategori($kategori_id)
    {
        return $this->db->query("SELECT * FROM barang WHERE kategori_id = $kategori_id")->num_rows();
    }
}

?>
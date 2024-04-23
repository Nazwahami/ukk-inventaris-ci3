<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_masuk_model extends CI_Model
{
    private $_table = 'barang_masuk';

    public function getAllQuery()
    {
        $query = "SELECT $this->_table.*, barang.nama_barang, barang.merk, barang.kategori_id, barang.satuan_id
        FROM barang_masuk
        INNER JOIN barang ON barang_masuk.barang_id = barang.id";

    return $this->db->query($query)->result();
    }

    public function save()
    {
        $data = [
            'barang_id' => htmlspecialchars(trim($this->input->post('barang_id'))),
            'jumlah' => htmlspecialchars(trim($this->input->post('jumlah'))),
            'tanggal_masuk' => strtotime(htmlspecialchars(trim($this->input->post('tanggal_masuk'))))
        ];

        return $this->db->insert($this->_table, $data);
}

public function update_stock($barang_id, $jumlah)
{
    $old_stock = $this->db->query("SELECT * FROM barang WHERE id = $barang_id")->row()->stok;
    $new_stock = $old_stock + $jumlah;

    return $this->db->update('barang', ['stok' => $new_stock], ['id' => $barang_id]);
}
}
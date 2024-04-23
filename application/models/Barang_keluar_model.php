<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_keluar_model extends CI_Model
{
    public function getAllQuery()
    {
        $query = "SELECT barang_keluar.id, pengguna.nama_pengguna, barang_keluar.jumlah, barang_keluar.status, barang_keluar.tanggal_pengajuan, barang.nama_barang, barang.satuan_id
                  FROM barang_keluar 
                  INNER JOIN barang ON barang_keluar.barang_id = barang.id
                  INNER JOIN pengguna ON barang_keluar.pengguna_id = pengguna.id
                  WHERE barang_keluar.status = 'disetujui'";
            return $this->db->query($query)->result();
    }


    public function getByIdQuery($id)
    {
        $query = "SELECT barang_keluar.id, barang_keluar.barang_id, barang_keluar.jumlah, barang_keluar.status, barang_keluar.tanggal_keluar, barang_keluar.tanggal_pengajuan, barang.nama_barang, barang.merk, barang.satuan_id, barang.kategori_id
                  FROM barang_keluar INNER JOIN barang ON barang_keluar.barang_id = barang.id
                  WHERE barang_keluar.id = $id";
            return $this->db->query($query)->result();
    }


}
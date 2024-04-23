<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_model extends CI_Model
{
    public function getAllQueryAdmin()
    {
        $query = "SELECT barang_keluar.id, pengguna.nama_pengguna, barang_keluar.jumlah, barang_keluar.status, barang_keluar.tanggal_pengajuan, barang.nama_barang, barang.satuan_id
                  FROM barang_keluar 
                  INNER JOIN barang ON barang_keluar.barang_id = barang.id
                  INNER JOIN pengguna ON barang_keluar.pengguna_id = pengguna.id
                  WHERE barang_keluar.status = 'pending'";
            return $this->db->query($query)->result();
    }

    public function getAllQueryMember($pengguna_id)
    {
        $query = "SELECT barang_keluar.id, pengguna.nama_pengguna, barang_keluar.jumlah, barang_keluar.status, barang_keluar.tanggal_pengajuan, barang.nama_barang, barang.satuan_id
                  FROM barang_keluar 
                  INNER JOIN barang ON barang_keluar.barang_id = barang.id
                  INNER JOIN pengguna ON barang_keluar.pengguna_id = pengguna.id
                  WHERE barang_keluar.pengguna_id = $pengguna_id";
            return $this->db->query($query)->result();
    }

    public function getByIdQuery($id)
    {
        $query = "SELECT barang_keluar.id, barang_keluar.barang_id, barang_keluar.jumlah, barang_keluar.status, barang_keluar.tanggal_keluar, barang_keluar.tanggal_pengajuan, barang.nama_barang, barang.merk, barang.satuan_id, barang.kategori_id
                  FROM barang_keluar INNER JOIN barang ON barang_keluar.barang_id = barang.id
                  WHERE barang_keluar.id = $id";
            return $this->db->query($query)->result();
    }



    public function save()
    {
        $data = [
            'barang_id' => htmlspecialchars(trim($this->input->post('barang_id'))),
            'jumlah' => htmlspecialchars(trim($this->input->post('jumlah'))),
            'status' => 'pending',
            'tanggal_pengajuan' => time(),
            'tanggal_keluar' => time(),
            'pengguna_id' => $this->session->userdata('pengguna_id'),
        ];

        $this->db->insert('barang_keluar', $data);
    }

    public function update_stok()
    {
        $barang_id = htmlspecialchars(trim($this->input->post('barang_id')));
        $barang = $this->barang_model->getByIdQuery($barang_id);
        $stok = $barang->stok;
        $jumlah = htmlspecialchars(trim($this->input->post('jumlah')));

        $new_stok = $stok - $jumlah;

        $this->db->update('barang', ['stok' => $new_stok], ['id' => $barang_id]);
    }

    public function disetujui($id)
    {
        $this->db->update('barang_keluar', ['status' => 'disetujui'], ['id' => $id]);
    }

}
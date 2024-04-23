<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function count_satuan()
    {
        return $this->db->query("SELECT * FROM satuan")->num_rows();
    }

    public function count_kategori()
    {
        return $this->db->query("SELECT * FROM kategori")->num_rows();
    }

    public function count_barang()
    {
        return $this->db->query("SELECT * FROM barang")->num_rows();
    }

    public function count_pengguna()
    {
        return $this->db->query("SELECT * FROM pengguna")->num_rows();
    }
}
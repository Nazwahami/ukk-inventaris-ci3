<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peran_pengguna_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->query("SELECT * FROM peran_pengguna")->result();
    }
}
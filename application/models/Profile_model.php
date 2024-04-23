<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function getByIdQuery($pengguna_id)
    {
        $query = "SELECT pengguna.*, peran_pengguna FROM pengguna 
                  INNER JOIN peran_pengguna ON pengguna.peran_pengguna_id = peran_pengguna.id
                  WHERE pengguna.id = '$pengguna_id'";
        return $this->db->query($query)->row();
    }
}
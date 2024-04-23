<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getByEmail($email)
    {
        $query = "SELECT * FROM pengguna WHERE email = '$email'";
        return $this->db->query($query)->row();
    }
}
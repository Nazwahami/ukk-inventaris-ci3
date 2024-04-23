<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    private $profile;
    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        if ($this->session->has_userdata('pengguna_id')) {
            redirect('dashboard');
        }

        $this->profile = $this->profile_model->getByIdQuery($this->session->userdata('pengguna_id'));

        $this->load->model('auth_model');

        $this->form_validation->set_rules([
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' =>'trim|required|valid_email',
            'errors' => [
                'required' => '%s wajib diisi',
                'valid_email' => 'Format %s tidak valid'
            ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' =>'trim|required',
                'errors' => [
                    'required' => '%s wajib diisi'
                ]
            ]
    ]);

    if ($this->form_validation->run() == false) {
    $this->load->view('auth/login');
    } else {
        $email = htmlspecialchars(trim($this->input->post('email')));
        $password = htmlspecialchars(trim($this->input->post('password')));

        $pengguna = $this->auth_model->getByEmail($email);

        if ($pengguna == null) {
            $this->session->set_flashdata('error', 'email tidak terdaftar');
            redirect('auth/login');
        }

        if (password_verify($password, $pengguna->password) == false) {
            $this->session->set_flashdata('error', 'password salah');
            redirect('auth/login');
        } else {
            $this->session->set_userdata('pengguna_id', $pengguna->id);
            redirect('dashboard');
        }
    }
    }

    public function logout()
    {
        if ($this->session->has_userdata('pengguna_id')) {
            $this->session->unset_userdata('pengguna_id');
            $this->session->set_flashdata('success', 'anda berhasil logout');
        }
        redirect('auth/login');
    }
}
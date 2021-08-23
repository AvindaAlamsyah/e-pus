<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user');
    }


    public function index()
    {
        $nisn = $this->session->userdata('nisn');

        $data_siswa = $this->model_user->select_where(array('nisn' => $nisn));

        $this->load->view('profile', $data_siswa);
    }

    public function pengaturan()
    {
        $nisn = $this->session->userdata('nisn');

        $data_siswa = $this->model_user->select_where(array('nisn' => $nisn));

        $this->load->view('akun', $data_siswa);
    }

    public function ganti_password()
    {
        $old = $this->input->post('old-password');
        $new = $this->input->post('confirm-password');

        $nisn = $this->session->userdata('nisn');

        $data_siswa = $this->model_user->select_where(array('nisn' => $nisn));
        if (password_verify($old, $data_siswa->password)) {
            if ($this->model_user->update(array('password' => password_hash($new, PASSWORD_ARGON2I)), array('nisn' => $nisn))) {
                $data['pesan'] =  '<div class="alert alert-success" role="alert">Berhasil update password.</div>';
                $this->load->view('akun', $data);
            } else {
                $error = $this->db->error();
                $data['pesan'] =  '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                $this->load->view('akun', $data);
            }
        } else {
            $data['pesan'] =  '<div class="alert alert-danger" role="alert">Maaf, password lama anda salah!</div>';
            $this->load->view('akun', $data);
        }
    }
}

/* End of file Akun.php */

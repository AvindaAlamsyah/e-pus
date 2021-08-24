<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru/model_guru');
    }


    public function index()
    {
        $this->load->view('guru/akun');
    }

    public function ganti_password()
    {
        $id = $this->session->userdata('id');
        $old = $this->input->post('old-password');
        $new = $this->input->post('confirm-password');

        $data_guru = $this->model_guru->get_where(array('id_guru' => $id));
        if (password_verify($old, $data_guru['password'])) {
            if ($this->model_guru->update(array('password' => password_hash($new, PASSWORD_ARGON2I)), array('id_guru' => $id))) {
                $data['pesan'] =  '<div class="alert alert-success" role="alert">Berhasil update password.</div>';
                $this->load->view('guru/akun', $data);
            } else {
                $error = $this->db->error();
                $data['pesan'] =  '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                $this->load->view('guru/akun', $data);
            }
        } else {
            $data['pesan'] =  '<div class="alert alert-danger" role="alert">Maaf, password lama anda salah!</div>';
            $this->load->view('guru/akun', $data);
        }
    }
}

/* End of file Akun.php */
